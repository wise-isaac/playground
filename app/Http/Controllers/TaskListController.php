<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Task::where('deleted', 0)
            ->orderBy('completed', 'asc')
            ->get();
        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = (new Task())->create([
            'description' => $request->description,
        ]);
        return response()->json('Task created', 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $task = Task::where('id', $id)->firstOrFail();
        $task->update([
            'completed' => (int) $request->completed
        ]);
        return response()->json('Task updated', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::where('id', $id)->firstOrFail();
        $task->update([
            'deleted' => 1,
        ]);
        return response()->json('Success', 200);
    }
}
