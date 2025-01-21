<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Jurusan;
use App\Models\Fakultas;
use Illuminate\Support\Facades\DB;


class MasterJurusan extends Component
{
    public $showNavbar = true;
    public $showFooter = true;
    public $master = 'Jurusan';

    public $jurusan = [
        'nama' => '',
        'kode' => '',
        'fakultas_id' => '',
    ];

    public $dataJurusan;
    public $dataFakultas;

    public function mount()
    {
        // Dekode data JSON
        $this->dataJurusan = Jurusan::all();
        $this->dataFakultas = Fakultas::all();
    }

    public function render()
    {
        return view('livewire.admin.master.jurusan.master-jurusan')
        ->layout('components.layouts.app', ['showNavbar' => $this->showNavbar , 'showFooter' => $this->showFooter])
        ->title('UNG Survey - Master Jurusan');
    }

    public function addJurusan()
    {
        $this->validate([
            'jurusan.nama' => 'required|string|max:255',
            'jurusan.kode' => 'required|string|max:10|unique:jurusans,code',
            'jurusan.fakultas_id' => 'required|exists:fakultas,id',
        ]);
        
        try
        {
            DB::beginTransaction();
    
            Jurusan::create([
                'name' => $this->jurusan['nama'],
                'code' => $this->jurusan['kode'],
                'fakultas_id' => $this->jurusan['fakultas_id'],
            ]);   

            DB::commit();

            session()->flash('toastMessage', 'Data berhasil ditambahkan');
            session()->flash('toastType', 'success');
            
        } catch (\Exception $e) {
            DB::rollBack();

            session()->flash('toastMessage', 'Terjadi kesalahan: ' . $e->getMessage());
            session()->flash('toastType', 'error');
        }
    
        return redirect()->to('master_jurusan');
    }

    public function deleteJurusan($id)
    {
        try
        {
            DB::beginTransaction();

            Jurusan::findOrFail($id)->delete();

            DB::commit();

            session()->flash('toastMessage', 'Data berhasil dihapus');
            session()->flash('toastType', 'success');
        } catch (\Exception $e) {
            DB::rollBack();

            session()->flash('toastMessage', 'Terjadi kesalahan: ' . $e->getMessage());
            session()->flash('toastType', 'error');
        }
        return redirect()->to('master_jurusan');
    }

}
