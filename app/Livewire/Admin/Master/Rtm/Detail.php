<?php

namespace App\Livewire\Admin\Master\Rtm;

use App\Models\Fakultas;
use App\Models\RTM;
use App\Models\RtmLampiran;
use App\Services\AmiService;
use App\Services\SurveiService;
use Livewire\Component;
use Livewire\WithFileUploads;
use Barryvdh\DomPDF\Facade\Pdf;
use Webklex\PDFMerger\Facades\PDFMergerFacade as PDFMerger;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\returnArgument;
use App\Models\RtmReport;

class Detail extends Component
{
    use WithFileUploads;

    public $showNavbar = true;
    public $showFooter = true;
    public $master = 'RTM';
    public $rtm = null;
    private $view = "livewire.admin.master.rtm.detail";
    public $fakultas = [];

    public $prodi = [];
    public $akreditasi = [];
    public $survei = [];
    public $ami = [];

    public $anchor_ami = [];
    public $anchor_survei = [];
    public $anchor_akreditas = [];

    public $selectedFakultas = null;
    public $reportFakultas = null;
    public $surveyFakultas = null;
    public $surveyData = [];
    public $dataParameter = [];

    public $rtmReport = [
        'mengetahui1_nama' => '',
        'mengetahui1_jabatan' => '',
        'mengetahui1_nip' => '',
        'mengetahui2_nama' => '',
        'mengetahui2_jabatan' => '',
        'mengetahui2_nip' => '',
        'pemimpin_rapat' => '',
        'notulis' => '',
        'tanggal_pelaksanaan' => '',
        'waktu_pelaksanaan' => '',
        'tempat_pelaksanaan' => '',
        'agenda' => '',
        'peserta' => '',
        'tahun_akademik' => ''
    ];

    // New lampiran properties
    public $newLampiran = [
        'judul' => '',
        'file' => null,
    ];

    public $lampiran = [];

    protected $listeners = ['refreshLampiran' => 'loadLampiran', 'updatedSelectedFakultas' => 'loadLampiran'];

    public function mount(AmiService $amiService, SurveiService $surveiService, $id)
    {
        $this->anchor_ami = $amiService->getAnchor()['data'];
        $this->anchor_survei = $surveiService->getAnchor()['data'];
        $this->rtm = RTM::find($id);
        $this->fakultas = Fakultas::all();
        $this->loadLampiran();
    }

    public function loadLampiran()
    {
        $query = RtmLampiran::where('rtm_id', $this->rtm->id);
        
        // Filter by fakultas if selected, including null (university-wide attachments)
        if ($this->selectedFakultas) {
            $query->where('fakultas_id', $this->selectedFakultas);
        }
        else {
            $query->whereNull('fakultas_id');
        }
        
        $this->lampiran = $query->get();
    }

    public function resetFilter()
    {
        $this->selectedFakultas = null;
        $this->loadLampiran();
    }

    public function render()
    {
        // Always reload lampiran on render to ensure it's filtered by current selectedFakultas
        $this->loadLampiran();
        
        return view($this->view)
            ->layout('components.layouts.app', ['showNavbar' => $this->showNavbar, 'showFooter' => $this->showFooter])
            ->title('UNG RTM - Master RTM');
    }

    public function updatedSelectedFakultas()
    {
        $this->loadLampiran();
    }

    public function uploadLampiran()
    {
        $this->validate([
            'newLampiran.judul' => 'required|string|max:255',
            'newLampiran.file' => 'required|file|max:10240', // 10MB max file size
        ]);

        try {
            $file = $this->newLampiran['file'];
            $originalName = $file->getClientOriginalName();
            $fileType = $file->getClientOriginalExtension();
            $fileSize = $file->getSize();

            $fileName = 'lampiran_rtm_' . $this->rtm->id . '_' . time() . '.' . $fileType;
            $path = $file->storeAs('public/rtm_lampiran', $fileName);

            $fakultasId = null; // Default for university level

            // Use the selectedFakultas for fakultasId if it's set
            if ($this->selectedFakultas) {
                $fakultasId = $this->selectedFakultas;
            }

            // Save to database
            RtmLampiran::create([
                'rtm_id' => $this->rtm->id,
                'fakultas_id' => $fakultasId,
                'judul' => $this->newLampiran['judul'],
                'file_path' => $path,
                'file_name' => $originalName,
                'file_type' => $fileType,
                'file_size' => $fileSize
            ]);

            // Reset the form
            $this->newLampiran = [
                'judul' => '',
                'file' => null,
            ];

            // Refresh lampiran list
            $this->loadLampiran();

            session()->flash('toastMessage', 'Lampiran berhasil diunggah');
            session()->flash('toastType', 'success');
        } catch (\Exception $e) {
            session()->flash('toastMessage', 'Gagal mengunggah lampiran: ' . $e->getMessage());
            session()->flash('toastType', 'error');
        }
    }

    public function deleteLampiran($id)
    {
        try {
            $lampiran = RtmLampiran::findOrFail($id);

            // Delete the physical file
            if (\Storage::exists($lampiran->file_path)) {
                \Storage::delete($lampiran->file_path);
            }

            // Delete the record
            $lampiran->delete();

            // Refresh lampiran list
            $this->loadLampiran();

            session()->flash('toastMessage', 'Lampiran berhasil dihapus');
            session()->flash('toastType', 'success');
        } catch (\Exception $e) {
            session()->flash('toastMessage', 'Gagal menghapus lampiran: ' . $e->getMessage());
            session()->flash('toastType', 'error');
        }
    }

    public function generateReport()
    {
        $this->validate([
            'rtmReport.mengetahui1_nama' => 'required|string',
            'rtmReport.mengetahui1_jabatan' => 'required|string',
            'rtmReport.mengetahui1_nip' => 'required|string',
            'rtmReport.mengetahui2_nama' => 'required|string',
            'rtmReport.mengetahui2_jabatan' => 'required|string',
            'rtmReport.mengetahui2_nip' => 'required|string',
            'rtmReport.pemimpin_rapat' => 'required|string',
            'rtmReport.notulis' => 'required|string',
            'rtmReport.tanggal_pelaksanaan' => 'required|date',
            'rtmReport.waktu_pelaksanaan' => 'required',
            'rtmReport.tempat_pelaksanaan' => 'required|string',
            'rtmReport.agenda' => 'required|string',
            'rtmReport.peserta' => 'required|string',
            'rtmReport.tahun_akademik' => 'required|string',
        ]);

        try {
            // Use the reportFakultas if it's set
            $fakultasId = null;
            if ($this->reportFakultas) {
                $fakultasId = $this->reportFakultas;
            }
            
            // Save report data to database
            RtmReport::create([
                'rtm_id' => $this->rtm->id,
                'fakultas_id' => $fakultasId,
                'mengetahui1_nama' => $this->rtmReport['mengetahui1_nama'],
                'mengetahui1_jabatan' => $this->rtmReport['mengetahui1_jabatan'],
                'mengetahui1_nip' => $this->rtmReport['mengetahui1_nip'],
                'mengetahui2_nama' => $this->rtmReport['mengetahui2_nama'],
                'mengetahui2_jabatan' => $this->rtmReport['mengetahui2_jabatan'],
                'mengetahui2_nip' => $this->rtmReport['mengetahui2_nip'],
                'pemimpin_rapat' => $this->rtmReport['pemimpin_rapat'],
                'notulis' => $this->rtmReport['notulis'],
                'tanggal_pelaksanaan' => $this->rtmReport['tanggal_pelaksanaan'],
                'waktu_pelaksanaan' => $this->rtmReport['waktu_pelaksanaan'],
                'tempat_pelaksanaan' => $this->rtmReport['tempat_pelaksanaan'],
                'agenda' => $this->rtmReport['agenda'],
                'peserta' => $this->rtmReport['peserta'],
                'tahun_akademik' => $this->rtmReport['tahun_akademik']
            ]);
            
            // Generate the PDF report with any lampiran files stored in database
            return $this->downloadDocument();
            
        } catch (\Exception $e) {
            session()->flash('toastMessage', 'Gagal membuat laporan: ' . $e->getMessage());
            session()->flash('toastType', 'error');
        }
    }

    private function resetReportForm()
    {
        $this->rtmReport = [
            'mengetahui1_nama' => '',
            'mengetahui1_jabatan' => '',
            'mengetahui1_nip' => '',
            'mengetahui2_nama' => '',
            'mengetahui2_jabatan' => '',
            'mengetahui2_nip' => '',
            'pemimpin_rapat' => '',
            'notulis' => '',
            'tanggal_pelaksanaan' => '',
            'waktu_pelaksanaan' => '',
            'tempat_pelaksanaan' => '',
            'agenda' => '',
            'peserta' => '',
            'tahun_akademik' => ''
        ];
    }

    public function downloadDocument()
    {
        try {
            // Get the service from container instead of storing it as a property
            $amiService = app(AmiService::class);
            
            // Get AMI data by looping through the ami_anchor values
            $ami_data = [];
            if (!empty($this->rtm->ami_anchor)) {
                foreach ($this->rtm->ami_anchor as $anchorId) {
                    $amiResult = $amiService->getAmi($anchorId, $this->selectedFakultas ? $this->selectedFakultas : 'null');
                    if (isset($amiResult['data']) && !empty($amiResult['data'])) {
                        $ami_data = array_merge($ami_data, $amiResult['data']);
                    }
                }
            }
            
            // Create a new PDF merger instance
            $pdfMerger = PDFMerger::init();
            
            // Prepare data for PDF views
            $data = [
                'rtm' => $this->rtm,
                'reportData' => $this->rtmReport,
                'tanggal' => !empty($this->rtmReport['tanggal_pelaksanaan']) ?
                    Carbon::parse($this->rtmReport['tanggal_pelaksanaan'])->format('d F Y') :
                    Carbon::now()->format('d F Y'),
                'waktu' => !empty($this->rtmReport['waktu_pelaksanaan']) ?
                    Carbon::parse($this->rtmReport['waktu_pelaksanaan'])->format('H:i') :
                    Carbon::now()->format('H:i'),
                'fakultas' => $this->selectedFakultas ? Fakultas::find($this->selectedFakultas)->name : 'Semua Fakultas',
                'lampiran' => $this->lampiran,
                'ami' => $ami_data
            ];

            // Create temporary files for merged PDFs
            $tempFiles = [];

            // Try to generate each PDF section
            try {
                // Helper function to generate and save a PDF file
                $generatePdfFile = function ($view, $title) use ($data, &$tempFiles) {
                    try {
                        $tempFile = tempnam(sys_get_temp_dir(), 'rtm_pdf_');
                        $pdf = Pdf::loadView($view, $data)
                            ->setPaper('a4', 'portrait')
                            ->save($tempFile);
                        $tempFiles[] = $tempFile;
                        return $tempFile;
                    } catch (\Exception $e) {
                        throw new \Exception("Error generating $title: " . $e->getMessage());
                    }
                };
                // Generate all PDF sections
                $pdfFiles = [
                    $generatePdfFile('pdf.cover', 'Cover'),
                    $generatePdfFile('pdf.lembaran_pengesahan', 'Lembar Pengesahan'),
                    $generatePdfFile('pdf.bab1', 'Bab 1'),
                    $generatePdfFile('pdf.lampiran', 'Lampiran'),
                ];

                // Add all PDF files to merger
                foreach ($pdfFiles as $pdfFile) {
                    $pdfMerger->addPDF($pdfFile, 'all');
                }

                // Add lampiran files from database if available
                foreach ($this->lampiran as $lampiran) {
                    if (\Storage::exists($lampiran->file_path) && in_array($lampiran->file_type, ['pdf'])) {
                        $pdfMerger->addPDF(storage_path('app/' . $lampiran->file_path), 'all');
                    }
                }

            } catch (\Exception $e) {
                // Log the error and continue
                dd($e);
                \Log::error('PDF generation error: ' . $e->getMessage());
                session()->flash('toastMessage', 'Peringatan: Beberapa bagian PDF tidak dapat dibuat: ' . $e->getMessage());
                session()->flash('toastType', 'warning');
            }

            // Generate filename with RTM name, timestamp
            $filename = 'Laporan_RTM_' . str_replace(' ', '_', $this->rtm->name) . '_' . Carbon::now()->format('Ymd_His') . '.pdf';
            $filePath = storage_path('app/public/' . $filename);

            // Merge PDFs and save file
            $pdfMerger->merge();

            // Clean up temporary files
            foreach ($tempFiles as $tempFile) {
                if (file_exists($tempFile)) {
                    unlink($tempFile);
                }
            }
            $pdfMerger->setFileName('Laporan RTM ' . $this->rtm->name . ' Tahun ' . $this->rtm->tahun . '.pdf');

            return $pdfMerger->download();

            // Reset form after successful generation

            session()->flash('toastMessage', 'Laporan RTM berhasil dibuat!');
            session()->flash('toastType', 'success');

            // Check if file exists and return download response
            if (file_exists($filePath)) {
                return response()->download($filePath)->deleteFileAfterSend(true);
            } else {
                session()->flash('toastMessage', 'File PDF tidak ditemukan setelah pembuatan');
                session()->flash('toastType', 'error');
                return null;
            }
        } catch (\Exception $e) {
            dd($e);
            session()->flash('toastMessage', 'Gagal membuat PDF: ' . $e->getMessage());
            session()->flash('toastType', 'error');
            return null;
        }
    }

    public function updateSurvey()
    {
        try {
            $this->surveyData = app(SurveiService::class)->getSurvei(
                $this->rtm->survei_id, 
                $this->surveyFakultas
            );

            // Merge the survey data for each parameter with the existing $dataParameter
            $surveyDataByParameter = collect($this->surveyData)->groupBy('parameter_id');
            foreach ($this->dataParameter as $key => $parameter) {
                $parameterSurveyData = $surveyDataByParameter->get($parameter['id'], collect());
                $this->dataParameter[$key]['survey_data'] = $parameterSurveyData->toArray();
            }

            session()->flash('message', 'Data survei berhasil dimuat.');
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal memuat data survei: ' . $e->getMessage());
        }
    }
}
