<?php

namespace App\Http\Controllers\Api;

use App\Models\Technologie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TechnologieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologie=Technologie::all();
        // $technologie =Technologie::with('project')->get(); // Eager load the role relationship
        if($technologie->count()>0){
            return response()->json([
                'status'=>200,
                'message'=>$technologie
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
        return response()->json(['message' => 'Open form to create a new technologie']);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'name'=>'required|string|max:191',

        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>422,
                'errors'=>$validator->messages()
            ],422);
        }else{
            $technologie= Technologie::create([
                'name'=>$request->name,
            ]); 
        }

        if($technologie){
            return response()->json([
                'status'=>200,
                'message'=>'Technologie created successfully',
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
        $technologie=Technologie::find($id);

        if($technologie){
            return response()->json([
                'status'=>200,
                'message'=>$technologie
            ],200);
        }else {
            return response()->json([
                'status'=>404,
                'message'=>'No such technologie found!'
            ],404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $technologie=Technologie::find($id);

        if($technologie){
            return response()->json([
                'status'=>200,
                'message'=>$technologie
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
    public function update(Request $request, int $id)
    {
        $validator=Validator::make($request->all(),[
            'name'=>'required|string|max:191',

        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>422,
                'message'=>$validator->messages()
            ],422);
        }else{
            $technologie=Technologie::find($id);
            
            if($technologie){
                $technologie->update([
                    'name'=>$request->name,

                ]);

                return response()->json([
                    'status'=>200,
                    'message'=>'Technologie updated successfully',
                ],200);
            }else{
                return response()->json([
                    'status'=>404,
                    'message'=>'No Such Technologie Found!'
                ],404);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $technologie=Technologie::find($id);
        if($technologie){
            $technologie->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Technologie deleted successfully!'
            ],200);

        }else{
            return response()->json([
                'status'=>404,
                'message'=>'No Such Technologie Found!'
            ],404);
        }
    }
}
