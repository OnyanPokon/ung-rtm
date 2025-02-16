<?php

namespace App\Livewire;
use App\Models\Fakultas;
use App\Models\Jurusan;
use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;


class UserFakultas extends Component
{
    public $showNavbar = true;
    public $showFooter = true;
    public $master = 'User Fakultas';
    
    public $userFakultas = [
        'nama' => '',
        'email' => '',
        'password' => '',
        'fakultas_id' => '',
    ];

    public $dataUserFakultas = [];

    public $dataFakultas;

    public function mount()
    {
        $this->dataFakultas = Fakultas::all();   
        $this->dataUserFakultas = User::where('role_id', '2')->get();   
    }
    public function render()
    {
        return view('livewire.admin.pengguna.fakultas.user-fakultas')
        ->layout('components.layouts.app', ['showNavbar' => $this->showNavbar, 'showFooter' => $this->showFooter])
        ->title('UNG RTM - Pengguna Fakultas');
    }

    public function addUserFakultas()
    {
        // Validate the input
        $this->validate([
            'userFakultas.nama' => 'required|string|max:255',
            'userFakultas.email' => 'required|string|email|max:255|unique:users,email',
            'userFakultas.password' => 'required|string|min:8',
            'userFakultas.fakultas_id' => 'required|exists:fakultas,id',
        ]);

        try {
            DB::beginTransaction(); 

            User::create([
                'name' => $this->userFakultas['nama'],
                'email' => $this->userFakultas['email'],
                'password' => bcrypt($this->userFakultas['password']),
                'role_id' => 2,
                'fakultas_id' => $this->userFakultas['fakultas_id'],
            ]);

            DB::commit();

            session()->flash('toastMessage', 'Data berhasil ditambahkan');
            session()->flash('toastType', 'success');
            
        } catch (\Exception $e) {
            DB::rollBack();

            session()->flash('toastMessage', 'Terjadi kesalahan: ' . $e->getMessage());
            session()->flash('toastType', 'error');
        }
        
        return redirect()->to('user_fakultas');
    }

    public function export()
    {
        return Excel::download(new \App\Exports\UserFakultas(), 'user_fakultas.xlsx');
    }

    public function deleteUser($id)
    {
        try {
            DB::beginTransaction();
            
            User::findOrFail($id)->delete();

            DB::commit();

            session()->flash('toastMessage', 'Data berhasil dihapus');
            session()->flash('toastType', 'success');
            
        } catch (\Exception $e) {
            DB::rollBack();

            session()->flash('toastMessage', 'Terjadi kesalahan: ' . $e->getMessage());
            session()->flash('toastType', 'error');
        }

        return redirect()->to('user_fakultas');
    }

    
}
