<?php

namespace App\Livewire;
use App\Models\User;
use App\Models\Fakultas;
use App\Models\Jurusan;
use Livewire\Component;
use Illuminate\Support\Facades\DB;


class EditUserFakultas extends Component
{
    public $showNavbar = true;
    public $showFooter = true;
    public $master = 'User Fakultas';

    public $userFakultas = [];

    public $dataFakultas;

    public function mount($id)
    {
       $this->userFakultas = User::FindOrFail($id)->toArray();
       $this->dataFakultas = Fakultas::all(); 
    }
    public function render()
    {
        return view('livewire.admin.pengguna.fakultas.edit-user-fakultas')
        ->layout('components.layouts.app', ['showNavbar' => $this->showNavbar, 'showFooter' => $this->showFooter])
        ->title('UNG Survey - User Fakultas');
    }

    public function updateUserFakultas()
    {
        $this->validate([
            'userFakultas.name' => 'required|string|max:255',
            'userFakultas.fakultas_id' => 'required|exists:fakultas,id',
            'userFakultas.email' => 'required|email|max:255',
            'userFakultas.newpass' => 'nullable|min:8',
            'userFakultas.password_confirmation' => 'same:userFakultas.newpass',
        ]);

        $user = User::findOrFail($this->userFakultas['id']);
        // dd($this->userFakultas);

        // dd($this->userFakultas['newpass']);
        try{
            DB::beginTransaction();

            $user->update([
                'name' => $this->userFakultas['name'],
                'fakultas_id' => $this->userFakultas['fakultas_id'],
                'email' => $this->userFakultas['email'],
                'password' => isset($this->userFakultas['newpass']) ? bcrypt($this->userFakultas['newpass']) : $user->password,
            ]);

            DB::commit();

            session()->flash('toastMessage', 'Data berhasil diedit');
            session()->flash('toastType', 'success');
        } catch (\Exception $e) {
            DB::rollBack();

            session()->flash('toastMessage', 'Terjadi kesalahan: ' . $e->getMessage());
            session()->flash('toastType', 'error');
        }

        return redirect()->route('user_fakultas');
    }
}
