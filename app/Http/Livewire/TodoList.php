<?php

namespace App\Http\Livewire;

use App\Models\Todo;
use Livewire\Component;
use Livewire\WithPagination;

class TodoList extends Component
{
    use WithPagination;
    public $name;
    public $search;
    protected $rules = [
        'name' => 'required|min:3|max:50',
    ];
    public function create()
    {
        //validate
        $validated = $this->validateOnly('name');

        //create the todo
        Todo::create($validated);

        // clear the input
        $this->reset('name');

        //send flash message
        session()->flash('success', 'Created');
    }

    public function delete($todoID)
    {
        Todo::find($todoID)->delete();
    }
    public function render()
    {

        return view('livewire.todo-list', [
            'todos' => Todo::latest()->where('name', 'like', "%{$this->search}%")->paginate(5)
        ]);
    }
}
