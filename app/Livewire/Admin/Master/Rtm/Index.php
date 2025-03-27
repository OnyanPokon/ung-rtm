<?php

namespace App\Livewire\Admin\Master\Rtm;

use App\Models\RTM;
use App\Services\AmiService;
use App\Services\SurveiService;
use Livewire\Component;

class Index extends Component
{
    public $showNavbar = true;
    public $showFooter = true;
    public $master = 'RTM';
    public $data = [];
    private $view = "livewire.admin.master.rtm.index";

    //CURRENT ATTRIBUTE
    public $anchor_ami = [];
    public $anchor_survei = [];
    public $anchor_akreditas = [];

    public $rtm = [
        'name' => '',
        'tahun' => '',
        'ami_anchor' => [],
        'survei_anchor' => [],
        'akreditas_anchor' => [],
    ];


    public $rtmReport = [
        'ketua_upm' => '',
        'dekan' => '',
        'lampiran' => '',
        'pemimpin_rapat' => '',
        'notulis' => '',
        'tanggal_pelaksanaan' => '',
        'waktu_pelaksanaan' => '',
        'tempat_pelaksanaan' => '',
        'agenda' => '',
        'peserta' => ''
    ];

    public function mount(AmiService $amiService, SurveiService $surveiService)
    {
        // $this->anchor_ami = $amiService->getAnchor()['data'];
        // $this->anchor_survei = $surveiService->getAnchor()['data'];
        $this->data = RTM::all();
    }

    public function render()
    {
        return view($this->view)
            ->layout('components.layouts.app', ['showNavbar' => $this->showNavbar, 'showFooter' => $this->showFooter])
            ->title('UNG RTM - Master RTM');
    }

    public function submit()
    {
        $this->validate([
            'rtm.name' => 'required|string|max:255',
            'rtm.tahun' => 'required|integer',
            'rtm.ami_anchor' => 'array',
            'rtm.survei_anchor' => 'array',
            'rtm.akreditas_anchor' => 'array',
        ]);

        RTM::create($this->rtm);

        session()->flash('toastMessage', 'RTM berhasil ditambahkan!');
        session()->flash('toastType', 'success');

        return redirect()->route('dashboard.master.rtm.index');
    }

    public function downloadDocument()
    {
        $pdfMerger = PDFMerger::init();

        $cover = PDF::loadView('pdf.cover')->setPaper('a4', 'potrait')->output();
        $pdfMerger->addString($cover);

        $lembaran_pengesahan = PDF::loadView('pdf.lembaran_pengesahan')->setPaper('a4', 'potrait')->output();
        $pdfMerger->addString($lembaran_pengesahan);

        $bab1 = PDF::loadView('pdf.bab1')->setPaper('a4', 'potrait')->output();
        $pdfMerger->addString($bab1);

        $lampiran = PDF::loadView('pdf.lampiran')->setPaper('a4', 'potrait')->output();
        $pdfMerger->addString($lampiran);

        $filePath = storage_path('app/public/Laporan_SURVEI_.pdf');
        $pdfMerger->merge();
        $pdfMerger->save($filePath);

        // Cek apakah file berhasil dibuat
        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            return response()->json(['error' => 'Failed to generate PDF'], 500);
        }
    }
}
