<?php

namespace App\Livewire;
use Illuminate\Support\Facades\Auth as Login;
use Livewire\Component;

class Navbar extends Component
{
    public $menuItems;

    public function mount()
    {
        // Ambil data menu dari file JSON atau sumber lainnya
        $menuJson = file_get_contents(resource_path('js/menu.json'));
        $menuData = json_decode($menuJson, true);
        
        // Tentukan peran pengguna, misalnya 'admin' atau 'user'
        $user = Login::user();
        $userRole = 'guest';

        if ($user && $user->role) {
            $role = $user->role->slug;

            switch ($role) {
                case 'universitas':
                    $userRole = 'admin';
                    break;
                case 'fakultas':
                    $userRole = 'fakultas';
                    break;
                case 'prodi':
                    $userRole = 'prodi';
                    break;
                default :
                    $userRole = 'guest';
                    break;
            }
        }

        // Pastikan peran pengguna adalah kunci yang valid dalam data menu
        if (array_key_exists($userRole, $menuData)) {
            $this->menuItems = $menuData[$userRole];
        } else {
            // Jika peran pengguna tidak valid atau tidak memiliki menu yang terkait, atur $menuItems menjadi array kosong
            $this->menuItems = [];
        }
    }

    public function render()
    {
        return view('livewire.navbar');
    }
    
    public function handleLogout()
    {
        Login::logout();
        return redirect()->route('home');
    }
}
