<?php

namespace App\Http\Controllers\Api;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $task=Task::all();
        if($task->count()>0){
            return response()->json([
                'status'=>200,
                'message'=>$task
            ],200);
        }else{
            return response()->json([
                'status'=>404,
                'message'=>'No records Found'
            ],404);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json(['message' => 'Open form to create a new task']);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'title'=>'required|string|max:191',
            'description'=>'required|string|max:191',
            'priority'=>'required|string|max:191',
            'type'=>'required|string|max:191',
            'due_date'=>'required|date',
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>422,
                'errors'=>$validator->messages()
            ],422);
        }else{
            $task= Task::create([
                'title'=>$request->title,
                'description'=>$request->description,
                'priority'=>$request->priority,
                'type'=>$request->type,
                'due_date'=>$request->due_date,
            ]); 
        }

        if($task){
            return response()->json([
                'status'=>200,
                'message'=>'Task created successfully',
            ],200);
        }else{
            return response()->json([
                'status'=>500,
                'message'=>'Something went wrong'
            ],500);
        }
}

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $task=Task::find($id);

        if($task){
            return response()->json([
                'status'=>200,
                'message'=>$task
            ],200);
        }else {
            return response()->json([
                'status'=>404,
                'message'=>'No such task found!'
            ],404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task=Task::find($id);

        if($task){
            return response()->json([
                'status'=>200,
                'message'=>$task
            ],200);
        }else {
            return response()->json([
                'status'=>404,
                'message'=>'No such task found!'
            ],404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator=Validator::make($request->all(),[
            'title'=>'required|string|max:191',
            'description'=>'required|string|max:191',
            'priority'=>'required|string|max:191',
            'type'=>'required|string|max:191',
            'due_date'=>'required|date',
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>422,
                'message'=>$validator->messages()
            ],422);
        }else{
            $task=Task::find($id);
            
            if($task){
                $task->update([
                    'title'=>$request->title,
                    'description'=>$request->description,
                    'priority'=>$request->priority,
                    'type'=>$request->type,
                    'due_date'=>$request->due_date,
                ]);

                return response()->json([
                    'status'=>200,
                    'message'=>'Task updated successfully',
                ],200);
            }else{
                return response()->json([
                    'status'=>404,
                    'message'=>'No Such Task Found!'
                ],404);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task=Task::find($id);
        if($task){
            $task->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Task deleted successfully!'
            ],200);

        }else{
            return response()->json([
                'status'=>404,
                'message'=>'No Such Task Found!'
            ],404);
        }
    }
}
