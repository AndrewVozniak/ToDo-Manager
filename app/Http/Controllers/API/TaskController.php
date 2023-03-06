<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function getTasks(Request $req, $user_id) {
        // ACCEPT JSON (user_id (bigint) ) || URL: api/tasks/get/{user_id} || Method: GET
        $tasks = Task::where('user_id', '=', $user_id)->get();

        if(!$tasks->isEmpty()) {
            return response()->json($tasks, 200);
        }

        return response()->json(['error' => true, 'message' => 'Not Found'], 404);
    }

    public function getTaskByID(Request $req, $task_id) {
        // ACCEPT JSON (user_id (bigint) ) || URL: api/task/get/{task_id} || Method: GET
        $task = Task::find($task_id);

        if($task) {
            return response()->json($task, 200);
        }
        return response()->json(['error' => true, 'message' => 'Not Found'], 404);
    }

    public function createTask(Request $req) {
        // ACCEPT JSON (user_id (bigint), name (str), term ( date ), status(str) | default: Waiting ) || URL: api/task/create || Method: POST
        try {
            $task = Task::create($req->all());
            return response()->json($task, 201);

        } catch (\Throwable $th) {
            return response()->json(['error' => true, 'message' => $th], 500);
        }
    }

    public function updateTask(Request $req, $task_id) {
        // ACCEPT JSON (user_id (bigint), name (str), term ( date ), status(str) ) || URL: api/task/update/{task_id} || Method: PUT
        $task = Task::find($task_id);

        if($task) {
            $task->update($req->all());
            return response()->json($task, 200);
        }

        return response()->json(['error' => true, 'message' => 'Not Found'], 404);
    }

    public function deleteTask($task_id) {
        // ACCEPT NONE || URL: api/task/delete/{task_id} || Method: DELETE
        $task = Task::find($task_id);

        if($task) {
            $task->delete();
            return response()->json($task, 204);
        }

        return response()->json(['error' => true, 'message' => 'Not Found'], 404);
    }
}
