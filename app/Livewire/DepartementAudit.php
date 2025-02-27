<?php

namespace App\Livewire;

use App\Services\AmiService;
use Livewire\Component;

class DepartementAudit extends Component
{
    public $showNavbar = true;
    public $showFooter = true;
    public $master = 'Departement Audit';

    public $dataMasterDepartementAudit = [];

    protected $amiService;

    public function mount(AmiService $amiService)
    {
        $this->amiService = $amiService;
        $this->dataMasterDepartementAudit = $this->amiService->getAllFaculty();
    }

    public function render()
    {
        return view('livewire.admin.master.audit.departement-audit')
            ->layout('components.layouts.app', [
                'showNavbar' => $this->showNavbar,
                'showFooter' => $this->showFooter
            ])
            ->title('UNG RTM - Master Audit');
    }
}
