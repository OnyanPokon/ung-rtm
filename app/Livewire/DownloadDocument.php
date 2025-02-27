<?php

namespace App\Livewire;

use Livewire\Component;

class DownloadDocument extends Component
{
    public $showNavbar = true;
    public $showFooter = true;
    public $master = 'Download Document';

    public $downloadDocument = [
        'ketua_upm' => '',
        'dekan' => '',
        'tempat' => '',
        'waktu' => '',
        'hari_tanggal' => '',
        'agenda' => '',
        'pemimpin_rapat' => '',
        'notulis' => '',
    ];

    protected $rules = [
        'downloadDocument.ketua_upm' => 'required',
        'downloadDocument.dekan' => 'required',
        'downloadDocument.tempat' => 'required',
        'downloadDocument.waktu' => 'required',
        'downloadDocument.hari_tanggal' => 'required',
        'downloadDocument.agenda' => 'required',
        'downloadDocument.pemimpin_rapat' => 'required',
        'downloadDocument.notulis' => 'required',
    ];


    public function render()
    {
        return view('livewire.download-document')
            ->layout('components.layouts.app', ['showNavbar' => $this->showNavbar, 'showFooter' => $this->showFooter])
            ->title('UNG Survey - Unduh Dokumen');
    }

    public function submitDocument()
    {
        $this->validate();
        dd($this->downloadDocument);
    }
}
