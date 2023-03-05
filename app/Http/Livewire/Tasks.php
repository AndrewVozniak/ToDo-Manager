<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task;
use Auth;

class Tasks extends Component
{

    public $name;
    public $term;
    public $status;
    public $tasks;
    public $test;

    public function add() {
        $task = new Task;

        $task->user_id = Auth::user()->id;
        $task->name = $this->name;
        $task->term = $this->term;
        $task->status = "Waiting...";

        if($this->status) {
            $task->status = $this->status;
        }
        
        $task->save();
    }

    public function render()
    {
        $this->tasks = Task::where('user_id', '=', Auth::user()->id)->get();
        return view('livewire.tasks');
    }
}
