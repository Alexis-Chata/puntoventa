<?php

namespace App\Livewire;

use App\Livewire\Forms\AlmacenForm;
use App\Models\Almacen;
use Livewire\Component;

class GestionarAlmacen extends Component
{
    public AlmacenForm $almacenForm;
    public $almacens;
    public $titlemodal;

    public function mount()
    {
        $this->almacens = Almacen::all();
        $this->titlemodal = 'Añadir';
    }

    public function editar(Almacen $almacen_id)
    {
        $this->titlemodal = 'Editar';
        $this->almacenForm->set($almacen_id);
    }

    public function guardar()
    {
        $this->almacenForm->store();
        $this->almacenForm->reset();
    }

    public function render()
    {
        return view('livewire.gestionar-almacen');
    }
}
