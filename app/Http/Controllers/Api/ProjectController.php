<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Projet;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  
    public function index()
    {
        try{
            $projects = Projet::all();
            return response()->json($projects);
        }
        catch(\Exception $e){
            return response()->json(['message' => 'Projects not found!'], 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json(['message' => 'Open form to create a new project']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return response()->json(['message' => 'Project created successfully']);
        try {
            $project = Projet::create($request->all());
            $project->save();
            return response()->json(['message' => 'Project created successfully', 'project' => $project], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while creating the project'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       try{
        $project = Projet::findOrFail($id);
        $project->update($request->all());
        return response()->json(['message' => 'Project updated successfully', 'project' => $project]);
    } catch (\Exception $e) {
        return response()->json(['error' => 'An error occurred while updating the project'], 500);
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        //
    }
    public function delete(Request $request, $id)
    {
        try{
            $project = Projet::findOrFail($id);
            $project->delete();
            return response()->json(['status'=>true,'message'=>'deleted successfully'], 200);
        }
        catch(\Exception $e){
            return response()->json(['message' => 'Project not found!'], 404);
        }
    }
}
