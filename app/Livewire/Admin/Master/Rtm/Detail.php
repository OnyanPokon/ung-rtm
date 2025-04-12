<?php

namespace App\Livewire\Admin\Master\Rtm;

use App\Models\RTM;
use App\Services\AmiService;
use App\Services\SurveiService;
use Livewire\Component;

class Detail extends Component
{
    public $showNavbar = true;
    public $showFooter = true;
    public $master = 'RTM';
    public $rtm =null;
    private $view = "livewire.admin.master.rtm.detail";
    public $fakultas = [];

    public $prodi = [];
    public $akreditasi = [];
    public $survei = [];
    public $ami = [];

    public $anchor_ami = [];
    public $anchor_survei = [];
    public $anchor_akreditas = [];
    //CURRENT ATTRIBUTE
 
    public function mount(AmiService $amiService, SurveiService $surveiService, $id)
    {
        $this->anchor_ami = $amiService->getAnchor()['data'];
        $this->anchor_survei = $surveiService->getAnchor()['data'];
        $this->rtm = RTM::find($id);
        // foreach ($this->rtm->ami_anchor as $key => $value) {
        //     dd($amiService->getDetail($value));
        // }
        // dd($this->anchor_ami);
    }
    public function render()
    {
        return view($this->view)
            ->layout('components.layouts.app', ['showNavbar' => $this->showNavbar, 'showFooter' => $this->showFooter])
            ->title('UNG RTM - Master RTM');
    }

    public function download()
    {
        
    }
}
