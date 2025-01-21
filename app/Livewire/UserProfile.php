<?php

namespace App\Livewire;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

use App\Models\User;


class UserProfile extends Component
{
    public $showNavbar = true;
    public $showFooter = true;
    public $master = 'User Profile';

    public $user = [];

    public function mount()
    {
        $this->user = Auth::user()->toArray();

    }

    public function render()
    {
        return view('livewire.profile-settings.user-profile')
        ->layout('components.layouts.app', ['showNavbar' => $this->showNavbar, 'showFooter' => $this->showFooter])
        ->title('UNG Survey - User Profile');
    }

    public function changePassword()
    {
        $this->validate([
            'user.currentpass' => 'required',
            'user.newpass' => 'required|min:8',
            'user.confirmnewpass' => 'required|same:user.newpass',
        ]);

        if (!Hash::check($this->user['currentpass'], Auth::user()->password)) {
            session()->flash('toastMessage', 'Gagal, Password saat ini salah.');
            session()->flash('toastType', 'error');
            return redirect()->to('user_profile'); 
        }  

        try {
            DB::beginTransaction();

            $dataUser = User::findOrFail($this->user['id']);
            $dataUser->update(['password' => Hash::make($this->user['newpass'])]);

            DB::commit();
            session()->flash('toastMessage', 'Password berhasil diubah.');
            session()->flash('toastType', 'success');
            
        } catch (\Exception $e) {
            DB::rollBack();

            session()->flash('toastMessage', 'Terjadi kesalahan: ' . $e->getMessage());
            session()->flash('toastType', 'error');
        }

        
        return redirect()->to('user_profile'); 

    }

    public function changeUserProfile()
    {
        $this->validate([
            'user.name' => 'required',
            'user.email' => 'required|min:8',
        ]);

        try{
            DB::beginTransaction();

            $dataUser = User::findOrFail($this->user['id']);
            $dataUser->update([
                'name' => $this->user['name'],
                'email' => $this->user['email']
            ]);

            DB::commit();
            session()->flash('toastMessage', 'Data user berhasil diubah.');
            session()->flash('toastType', 'success');

        } catch (\Exception $e) {
            DB::rollBack();

            session()->flash('toastMessage', 'Terjadi kesalahan: ' . $e->getMessage());
            session()->flash('toastType', 'error');
        }

       
        
        return redirect()->to('user_profile');
    }
}
