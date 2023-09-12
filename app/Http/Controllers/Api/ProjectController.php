<?php

namespace App\Http\Controllers\Api;

use App\Models\Projet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $project = Projet::with('technologies')->get();
        if ($project->count() > 0) {
            return response()->json([
                'status' => 200,
                'message' => $project

            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No records Found'
            ], 404);
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
        $validator = Validator::make($request->project, [
            'title' => 'required|string|max:191',
            'description' => 'required|string|max:191',
            'slug' => 'required|string|max:191',
            'status' => 'required|string|max:191',
            'url' => 'required|string|max:191',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
            $project = Projet::create([
                'title' => $request->project['title'],
                'description' => $request->project['description'],
                'slug' => $request->project['slug'],
                'status' => $request->project['status'],
                'url' => $request->project['url'],
            ]);

            $project->technologies()->attach($request->selectedTechnologies);


            if ($project) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Project created successfully',
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => 'Something went wrong'
                ], 500);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $projet = Projet::find($id);

        if ($projet) {
            return response()->json([
                'status' => 200,
                'message' => $projet
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No such project found!'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $projet = Projet::find($id);

        if ($projet) {
            return response()->json([
                'status' => 200,
                'message' => $projet
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No such project found!'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $validator = Validator::make($request->project, [
            'title' => 'required|string|max:191',
            'description' => 'required|string|max:191',
            'slug' => 'required|string|max:191',
            'status' => 'required|string|max:191',
            'url' => 'required|string|max:191',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'message' => $validator->messages()
            ], 422);
        } else {
            $project = Projet::find($id);


            if ($project) {

                $project->update([
                    'title' => $request->project['title'],
                    'description' => $request->project['description'],
                    'slug' => $request->project['slug'],
                    'status' => $request->project['status'],
                    'url' => $request->project['url'],
                ]);

                $project->technologies()->sync($request->selectedTechnologies);

                return response()->json([
                    'status' => 200,
                    'message' => 'Project updated successfully',
                ], 200);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'No Such Project Found!'
                ], 404);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $project = Projet::find($id);
        if ($project) {
            $project->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Project deleted successfully!'
            ], 200);

        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Such Project Found!'
            ], 404);
        }
    }
    public function delete(Request $request, $id)
    {

    }
}