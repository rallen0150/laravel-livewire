<?php

namespace App\Http\Livewire\Todo;

use Livewire\Component;
use App\Models\Task;

class Form extends Component
{
    public $description;

    protected $rules = [
        'description' => 'required'
    ];

    public function render()
    {
        return view('livewire.todo.form');
    }

    public function createItem()
    {
        $this->validate();

        $item = new Task();
        $item->description = $this->description;
        $user = auth()->user();
        $item->user_id = $user->id;
        $item->save();

        $this->emit('saved');
    }
}
