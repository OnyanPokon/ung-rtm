<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Fakultas;
use Illuminate\Support\Facades\DB;


class EditFakultas extends Component
{
    public $showNavbar = true;
    public $showFooter = true;
    public $master = 'Fakultas';

    public $fakultas = [];

    public function mount($id)
    {
        // Fetch fakultas data by ID from the model
        $fakultas = Fakultas::findOrFail($id);
        // Assign all data to the fakultas property
        $this->fakultas = $fakultas->toArray();
    }

    public function render()
    {
        return view('livewire.admin.master.fakultas.edit-fakultas')
        ->layout('components.layouts.app', ['showNavbar' => $this->showNavbar, 'showFooter' => $this->showFooter])
        ->title('UNG Survey - Master Fakultas');
    }

    public function updateFakultas(){
        
        $fakultas = Fakultas::findOrFail($this->fakultas['id']);

        $this->validate([
            'fakultas.name' => 'required|string|max:255',
            'fakultas.code' => 'required|string|max:10|unique:fakultas,code,' . $this->fakultas['id'],
        ]);

        try
        {
            DB::beginTransaction();

            $fakultas->update($this->fakultas);

            DB::commit();

            session()->flash('toastMessage', 'Data berhasil diedit');
            session()->flash('toastType', 'success');
            
        } catch (\Exception $e) {
            DB::rollBack();

            session()->flash('toastMessage', 'Terjadi kesalahan: ' . $e->getMessage());
            session()->flash('toastType', 'error');
        }
       

        return redirect()->to('master_fakultas');
    }

    public function redirectToAdd()
    {
        return redirect()->to('master_fakultas');
    }

}
