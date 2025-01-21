<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Jurusan;
use App\Models\Fakultas;
use Illuminate\Support\Facades\DB;


class EditJurusan extends Component
{
    public $showNavbar = true;
    public $showFooter = true;
    public $master = 'Jurusan';

    public $jurusan = [];
    public $dataFakultas;

    public function mount($id)
    {
        $this->dataFakultas = Fakultas::all();
        $jurusan = Jurusan::findOrFail($id);

        // Assign all data to the jurusan property
        $this->jurusan = $jurusan->toArray();
    }

    public function render()
    {
        return view('livewire.admin.master.jurusan.edit-jurusan')
        ->layout('components.layouts.app', ['showNavbar' => $this->showNavbar, 'showFooter' => $this->showFooter])
        ->title('UNG Survey - Master Jurusan');
    }

    public function updateJurusan()
    {
        $jurusan = Jurusan::findOrFail($this->jurusan['id']);

        $this->validate([
            'jurusan.name' => 'required|string|max:255',
            'jurusan.code' => 'required|string|max:10|unique:jurusans,code,' . $this->jurusan['id'],
            'jurusan.fakultas_id' => 'required|exists:fakultas,id',
        ]);

        try
        {
            DB::beginTransaction();

            $jurusan->update($this->jurusan);

            DB::commit();

            session()->flash('toastMessage', 'Data berhasil diedit');
            session()->flash('toastType', 'success');
            
        } catch (\Exception $e) {
            DB::rollBack();

            session()->flash('toastMessage', 'Terjadi kesalahan: ' . $e->getMessage());
            session()->flash('toastType', 'error');
        }
       
        return redirect()->to('master_jurusan');
    }

    public function redirectToAdd()
    {
        return redirect()->to('master_jurusan');
    }
}
