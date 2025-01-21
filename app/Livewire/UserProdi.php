<?php

namespace App\Livewire;
use App\Models\Jurusan;
use App\Models\Fakultas;
use App\Models\Prodi;
use App\Models\User;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Support\Facades\DB;

class UserProdi extends Component
{
    public $showNavbar = true;
    public $showFooter = true;
    public $master = 'User Prodi';
    
    public $userProdi = [
        'nama' => '',
        'email' => '',
        'password' => '',
        'prodi_id' => '',
        'fakultas_id' => '',
    ];
    
    public $dataUserProdi = [];

    public $dataProdi = [];
    public $dataJurusan = [];
    public $dataFakultas;

    public function mount()
    {
        $this->dataFakultas = Fakultas::all();
        $this->dataUserProdi = User::where('role_id', '4')->get();
    }
    public function render()
    {
        return view('livewire.admin.pengguna.prodi.user-prodi')
        ->layout('components.layouts.app', ['showNavbar' => $this->showNavbar, 'showFooter' => $this->showFooter])
        ->title('UNG Survey - Pengguna Prodi');
    }

    public function getProdiByFakultas()
    {
        $fakultasId = $this->userProdi['fakultas_id'];
        $this->dataProdi = Prodi::where('fakultas_id', $fakultasId)->get();
    }

    public function addUserProdi()
    {
        // Validate the input
        $this->validate([
            'userProdi.nama' => 'required|string|max:255',
            'userProdi.email' => 'required|string|email|max:255|unique:users,email',
            'userProdi.password' => 'required|string|min:8',
            'userProdi.fakultas_id' => 'required|exists:fakultas,id',
            'userProdi.prodi_id' => 'required|exists:prodis,id',
        ]);

        try {
            DB::beginTransaction();

            User::create([
                'name' => $this->userProdi['nama'],
                'email' => $this->userProdi['email'],
                'password' => bcrypt($this->userProdi['password']),
                'role_id' => 4,
                'fakultas_id' => $this->userProdi['fakultas_id'],
                'prodi_id' => $this->userProdi['prodi_id'],
            ]);

            DB::commit();

            session()->flash('toastMessage', 'Data berhasil ditambahkan');
            session()->flash('toastType', 'success');

        } catch (\Exception $e) {
            DB::rollBack();

            session()->flash('toastMessage', 'Terjadi kesalahan: ' . $e->getMessage());
            session()->flash('toastType', 'error');
        }
        
        return redirect()->to('user_prodi');
    }

    public function export()
    {
        return Excel::download(new \App\Exports\UserProdi(), 'user_prodi.xlsx');
    }

    public function deleteUser($id)
    {
        try{
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
        return redirect()->to('user_prodi');
    }
}
