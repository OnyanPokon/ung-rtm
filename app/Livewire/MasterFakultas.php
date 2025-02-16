<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Fakultas;
use Illuminate\Support\Facades\DB;

class MasterFakultas extends Component
{
    public $showNavbar = true;
    public $showFooter = true;
    public $master = 'Fakultas';

    public $fakultas = [
        'nama' => '',
        'kode' => '',
    ];

    public $dataFakultas;
    public $toastMessage = '';
    public $toastType = '';

    public function mount()
    {
        // Dekode data JSON
        $this->dataFakultas = Fakultas::all();
    }

    public function render()
    {
        return view('livewire.admin.master.fakultas.master-fakultas')
        ->layout('components.layouts.app', ['showNavbar' => $this->showNavbar , 'showFooter' => $this->showFooter])
        ->title('UNG RTM - Master Fakultas');
    }

    public function addFakultas()
    {
        $this->validate([
            'fakultas.nama' => 'required|string|max:255',
            'fakultas.kode' => 'required|string|max:10|unique:fakultas,code',
        ]);
        
        try {
            DB::beginTransaction();

            Fakultas::create([
                'name' => $this->fakultas['nama'],
                'code' => $this->fakultas['kode'],
            ]);

            DB::commit();

            session()->flash('toastMessage', 'Data berhasil ditambahkan');
            session()->flash('toastType', 'success');

        } catch (\Exception $e) {
            DB::rollBack(); 

            session()->flash('toastMessage', 'Terjadi kesalahan: ' . $e->getMessage());
            session()->flash('toastType', 'error');
        }

        return redirect()->to('master_fakultas');
    }

    public function deleteFakultas($id)
    {
        try {
            DB::beginTransaction();

            Fakultas::findOrFail($id)->delete();

            DB::commit();

            session()->flash('toastMessage', 'Data berhasil dihapus');
            session()->flash('toastType', 'success');
            
        } catch (\Exception $e) {
            DB::rollBack();

            session()->flash('toastMessage', 'Terjadi kesalahan: ' . $e->getMessage());
            session()->flash('toastType', 'error');
        }

        return redirect()->to('master_fakultas');
    }

}
