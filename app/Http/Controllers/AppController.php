<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Subtask;
use Auth;

class AppController extends Controller
{
    public function indexPage() {
        return view('welcome');
    }

    public function deleteTask($id) {
        $task = Task::find($id);
        $task->delete();   
        return redirect()->back(); 
    }

    public function editTask(Request $req, $id) {
        $task = Task::find($id);
        $task->name = $req->input('name');
        $task->term = $req->input('term');
        $task->status = $req->input('status');

        $task->save();

        return redirect()->back(); 
    }

    public function addSubtask(Request $req, $task_id) {
        $subtask = new Subtask;

        $subtask->task_id = $task_id;
        $subtask->name = $req->input('name');
        $subtask->description = $req->input('description');
        $subtask->term = $req->input('term');
        $subtask->status = $req->input('status');

        $subtask->save();

        return redirect()->back(); 
    }

    public function editSubtask(Request $req, $id) {
        $subtask = Subtask::find($id);
        $subtask->name = $req->input('name');
        $subtask->description = $req->input('description');
        $subtask->term = $req->input('term');
        $subtask->status = $req->input('status');

        $subtask->save();

        return redirect()->back(); 
    }

    public function deleteSubtask($id) {
        $subtask = Subtask::find($id);
        $subtask->delete();   
        return redirect()->back(); 
    }
}
