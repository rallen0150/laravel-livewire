<?php

namespace App\Http\Livewire\Todo;

use Livewire\Component;
use App\Models\Task;

class Show extends Component
{
    protected $listeners = ['saved'];

    public function render($list = [])
    {
        $user = auth()->user();
        $user_id = $user->id;
        if (sizeof($list) == 0) $list = Task::where('user_id', $user_id)->orderByDesc('created_at')->paginate(25);

        return view('livewire.todo.show', [ 'list' => $list]);
    }

    public function searchTask($field, $val) 
    {
        $user = auth()->user();
        $user_id = $user->id;

        $list = Task::where('user_id', $user_id)->where($field, 'like', $val)->orderByDesc('created_at')->paginate(25);
        $this->render($list);
    }

    public function filterStatus($status) 
    {
        $user = auth()->user();
        $user_id = $user->id;

        $list = Task::where('user_id', $user_id)->where('status', $status)->orderByDesc('created_at')->paginate(25);
        $this->render($list);
    }

    public function saved()
    {
        $this->render();
    }

    public function markAsDone(Task $item)
    {
        $item->status = 'finished';
        $item->save();
    }

    public function markAsToDo(Task $item)
    {
        $item->status = 'pending';
        $item->save();
    }

    public function deleteItem(Task $item)
    {
        $item->delete();
    }
}
