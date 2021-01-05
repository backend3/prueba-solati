<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;



class ApiTaskController extends Controller
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
            'success' => true,
            'data' => $tasks
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $task = new Task();
            $task->description = $request['description'];
            $task->save();
            return response()->json([
                'success' => true,
                'data' => $task
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th
            ], 500);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);
        if(!is_null($task)) {
            return response()->json([
                'success' => true,
                'data' => $task
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'La tarea no existe'
            ], 400);
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $task = Task::find($id);
        if(!is_null($task)) {
            $task->description = $request['description'];
            $task->status = $request['status'];
            $task->update();
            return response()->json([
                'success' => true,
                'data' => $task
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'La tarea no existe'
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        if(!is_null($task)) {
            $task->delete();
            return response()->json([
                'success' => true,
                'message' => 'Tarea eliminada con exito'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'La tarea no existe'
            ], 400);
        }
    }
}
