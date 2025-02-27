<?php

namespace App\Livewire;

use App\Services\AmiService;
use Livewire\Component;

class FakultasAudit extends Component
{
    public $showNavbar = true;
    public $showFooter = true;
    public $master = 'Fakultas Audit';

    public $dataMasterFakultasAudit = [];

    protected $amiService;

    public function mount(AmiService $amiService)
    {
        $this->amiService = $amiService;
        $this->dataMasterFakultasAudit = $this->amiService->getAllFaculty();
    }

    public function render()
    {
        return view('livewire.admin.master.audit.fakultas-audit')
            ->layout('components.layouts.app', [
                'showNavbar' => $this->showNavbar,
                'showFooter' => $this->showFooter
            ])
            ->title('UNG RTM - Master Audit');
    }
}
