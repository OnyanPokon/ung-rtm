<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth as Login;
use Webklex\PDFMerger\Facades\PDFMergerFacade as PDFMerger;
use Barryvdh\DomPDF\Facade\Pdf;

class Dashboard extends Component
{
    public $showNavbar = true;
    public $showFooter = true;

    public $userRole;

    public $dataAdmin = [
        [
            'icon' => 'fas fa-university',
            'value' => 12,
            'label' => 'Total Fakultas'
        ],
        [
            'icon' => 'fas fa-graduation-cap',
            'value' => 24,
            'label' => 'Total Prodi'
        ],
        [
            'icon' => 'fas fa-clipboard-check',
            'value' => 50,
            'label' => 'Total Survey'
        ],
        [
            'icon' => 'fas fa-users',
            'value' => 560,
            'label' => 'Total Responden'
        ],
    ];

    public function mount()
    {
        $user = Login::user();
        $this->userRole = $user ? $user->role->slug : 'guest'; // Default to 'guest' if user is not authenticated
    }

    public function render()
    {
        switch ($this->userRole) {
            case 'universitas':
                return view('livewire.admin.admin-dashboard')
                    ->layout('components.layouts.app', ['showNavbar' => $this->showNavbar, 'showFooter' => $this->showFooter])
                    ->title('UNG RTM - Admin Dashboard');
            case 'fakultas':
                return view('livewire.fakultas.fakultas-dashboard')
                    ->layout('components.layouts.app', ['showNavbar' => $this->showNavbar, 'showFooter' => $this->showFooter])
                    ->title('UNG RTM - Fakultas Dashboard');
            case 'prodi':
                return view('livewire.prodi.prodi-dashboard')
                    ->layout('components.layouts.app', ['showNavbar' => $this->showNavbar, 'showFooter' => $this->showFooter])
                    ->title('UNG RTM - Jurusan Dashboard');
            default:
                abort(403, 'Unauthorized');
        }
    }

    
}
