<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth as Login;
class Auth extends Component
{
    public $credential;
    public $password;
    public $showNavbar = false;
    public $showFooter = false;
    public function render()
    {
        return view('livewire.auth.auth')
        ->layout('components.layouts.app', ['showNavbar' => $this->showNavbar], ['showFooter' => $this->showFooter])
        ->title('UNG Survey - Auth');
    }
    public function handleLogin(){
        // $this->validate([
        //     'credential' => 'required|email',
        //     'password' => 'required',
        // ]);
        
        try {
            if (Login::attempt(['email' => $this->credential, 'password' => $this->password])) {
                session()->regenerate();
                $role = Login::user()->role->slug;
                session()->flash('toastMessage', 'Autentikasi berhasil');
                session()->flash('toastType', 'success');
                return redirect()->to('dashboard');
            } else {
                session()->flash('toastMessage', 'Email atau Password tidak valid');
                session()->flash('toastType', 'error');
                return redirect()->to('login');
            }
        } catch (\Exception $e) {
            session()->flash('toastMessage', 'Terjadi kesalahan: ' . $e->getMessage());
            session()->flash('toastType', 'error');
        }

    }
}
