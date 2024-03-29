<?php

namespace App\Livewire\Forms;

use App\Models\Cliente;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ClientesForm extends Form
{
    public ?Cliente $cliente;

    public $name;
    public $email;
    public $telefono;
    public $pais;
    public $ciudad;
    public $numero_impuesto;
    public $direccion;

    public function set(Cliente $cliente){
        $this->cliente = $cliente;
        $this->name = $cliente->name;
        $this->email = $cliente->email;
        $this->telefono = $cliente->telefono;
        $this->pais = $cliente->pais;
        $this->ciudad = $cliente->ciudad;
        $this->numero_impuesto = $cliente->numero_impuesto;
        $this->direccion = $cliente->direccion;
    }

    public function update(){
        $this->validate(['name'=> 'required']);
        $this->cliente->update($this->all());
    }

    public function store()
    {
        $this->validate(['name'=> 'required']);
        Cliente::create($this->all());
    }
}
