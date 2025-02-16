<?php

namespace App\Livewire;

use App\Models\Fakultas;
use Livewire\Component;
use App\Models\Prodi;
use App\Models\Jurusan;
use Illuminate\Support\Facades\DB;

class EditProdi extends Component
{
    public $showNavbar = true;
    public $showFooter = true;
    public $master = 'Prodi';

    public $prodi = [];
    public $dataFakultas;

    public function mount($id)
    {
        $this->dataFakultas = Fakultas::all();
        $prodi = Prodi::findOrFail($id);

        // Assign all data to the jurusan property
        $this->prodi = $prodi->toArray();
    }

    public function render()
    {
        return view('livewire.admin.master.prodi.edit-prodi')
        ->layout('components.layouts.app', ['showNavbar' => $this->showNavbar, 'showFooter' => $this->showFooter])
        ->title('UNG RTM - Master Prodi');
    }

    public function updateProdi()
    {
        $prodi = Prodi::findOrFail($this->prodi['id']);

        $this->validate([
            'prodi.name' => 'required|string|max:255',
            'prodi.code' => 'required|string|max:10|unique:prodis,code,' . $this->prodi['id'],
            'prodi.fakultas_id' => 'required|exists:fakultas,id',
        ]);

        try {
            DB::beginTransaction();
    
            $prodi->update($this->prodi);

            DB::commit();

            session()->flash('toastMessage', 'Data berhasil diedit');
            session()->flash('toastType', 'success');

        } catch (\Exception $e) {
            DB::rollBack();

            session()->flash('toastMessage', 'Terjadi kesalahan: ' . $e->getMessage());
            session()->flash('toastType', 'error');
        }

        return redirect()->to('master_prodi');
    }

    public function redirectToAdd()
    {
        return redirect()->to('master_prodi');
    }
}
