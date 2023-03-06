<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subtask;

class SubtaskController extends Controller
{
    public function getSubtasksByTaskID(Request $req, $task_id) {
        // ACCEPT NONE|| URL: api/subtasks/get/{task_id} || Method: GET
        $subtasks = Subtask::where('task_id', '=', $task_id)->get();

        if(!$subtasks->isEmpty()) {
            return response()->json($subtasks, 200);
        }

        return response()->json(['error' => true, 'message' => 'Not Found'], 404);
    }

    public function getSubtaskByID(Request $req, $subtask_id) {
        // ACCEPT NONE || URL: api/subtask/get/{subtask_id} || Method: GET
        $subtask = Subtask::find($subtask_id);

        if($subtask) {
            return response()->json($subtask, 200);
        }
        return response()->json(['error' => true, 'message' => 'Not Found'], 404);
    }

    public function createSubtask(Request $req) {
        // ACCEPT JSON (task_id (bigint), name (str), description (str), term ( date ), status(str) | default: Waiting ) || URL: api/subtask/create || Method: POST
        try {
            $subtask = Subtask::create($req->all());
            return response()->json($subtask, 201);

        } catch (\Throwable $th) {
            return response()->json(['error' => true, 'message' => $th], 500);
        }
    }

    public function updateSubtask(Request $req, $task_id) {
        // ACCEPT JSON (user_id (bigint), name (str), term ( date ), status(str) ) || URL: api/subtask/update/{task_id} || Method: PUT
        $subtask = Subtask::find($task_id);

        if($subtask) {
            $subtask->update($req->all());
            return response()->json($subtask, 200);
        }

        return response()->json(['error' => true, 'message' => 'Not Found'], 404);
    }

    public function deleteSubtask($task_id) {
        // ACCEPT NONE || URL: api/subtask/delete/{task_id} || Method: DELETE
        $subtask = Subtask::find($task_id);

        if($subtask) {
            $subtask->delete();
            return response()->json($subtask, 204);
        }

        return response()->json(['error' => true, 'message' => 'Not Found'], 404);
    }

}
