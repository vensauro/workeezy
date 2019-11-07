<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();

        return response()->json([
            'erro' => false,
            'data' => $tasks
        ], 200);
    }

    public function userTasks(Request $request, $id)
    {
        $tasks = Task::where('user_id', $id)->get();

        return response()->json([
            'erro' => false,
            'data' => $tasks
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tasks = Task::create($request->all());

        return response()->json([
            'error' => false,
            'data'  => $tasks,
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return response()->json([
            'error' => false,
            'data'  => $task,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $task->fill($request->all());
        $task->save();

        return response()->json([
            'error' => false,
            'data'  => $task,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return response()->json([
            'error' => false,
            'message'  => "The task with the id $task->id has successfully been deleted.",
        ], 200);
    }
}
