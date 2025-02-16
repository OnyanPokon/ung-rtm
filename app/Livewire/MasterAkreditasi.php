<?php

namespace App\Livewire;

use Livewire\Component;

class MasterAkreditasi extends Component
{
    public $showNavbar = true;
    public $showFooter = true;
    public $master = 'Akreditasi';

    // FIXME : TARO DISINI DATA COLLECTION
    public $dataMasterSurvei = [];
    
    public function mount()
    {
        // FIXME: KALO BA AMBE DATA MASTER BUTUH LOGIC TARO DISINI
    }

    public function render()
    {
        return view('livewire.admin.master.survei.master-survei')
        ->layout('components.layouts.app', ['showNavbar' => $this->showNavbar, 'showFooter' => $this->showFooter])
        ->title('UNG RTM - Master Survei');
    }

}
