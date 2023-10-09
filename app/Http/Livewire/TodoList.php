<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TodoList extends Component
{
    public $name;
    public function create()
    {
        dd('sdaf');
    }
    public function render()
    {
        return view('livewire.todo-list');
    }
}
