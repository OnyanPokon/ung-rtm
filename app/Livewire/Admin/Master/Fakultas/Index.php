<?php

namespace App\Livewire\Admin\Master\Fakultas;

use Livewire\Component;
use App\Models\Fakultas;
use App\Services\AmiService;
use App\Services\SurveiService;
use Illuminate\Support\Facades\DB;

class Index extends Component
{
    public $showNavbar = true;
    public $showFooter = true;
    public $master = 'Fakultas';

    public $anchor_ami = [];
    public $anchor_survei = [];
    public $anchor_akreditas = [];

    public $fakultas = [
        'nama' => '',
        'kode' => '',
        'ami_anchor' => [],
        'survei_anchor' => [],
        'akreditas_anchor' => [],
    ];

    public $dataFakultas;
    public $toastMessage = '';
    public $toastType = '';

    public function mount()
    {
        // Dekode data JSON
         // $this->anchor_ami = $amiService->getAnchor()['data'];
        // $this->anchor_survei = $surveiService->getAnchor()['data'];
        $this->dataFakultas = Fakultas::all();
    }

    public function render()
    {
        return view('livewire.admin.master.fakultas.index')
            ->layout('components.layouts.app', ['showNavbar' => $this->showNavbar, 'showFooter' => $this->showFooter])
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
