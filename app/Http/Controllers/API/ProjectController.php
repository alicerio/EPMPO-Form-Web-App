<?php

namespace App\Http\Controllers\API;

use App\Project;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Project::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'parent_id' => ['nullable', 'integer'],
            'mpo_id' => ['nullable'],
            'csj_cn' => ['nullable'],
            'name' => ['required'],
            'description' => ['required'],
            'limit_from' => ['required'],
            'limit_to' => ['required'],
            'relationship_description' => ['required'],
            'need_purpose' => ['required'],
            'agency_comments' => ['required'],
            'existing_lanes' => ['required', 'integer', 'max:12'],
            'projected_lanes' => ['required', 'integer', 'max:12'],
        ]);

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }

        $project = new Project();

        $project->parent_id = request('parent_id');
        $project->mpo_id = request('mpo_id');
        $project->csj_cn = request('csj_cn');
        $project->name = request('name');
        $project->description = request('description');
        $project->limit_from = request('limit_from');
        $project->limit_to = request('limit_to');
        $project->relationship_description = request('relationship_description');
        $project->need_purpose = request('need_purpose');
        $project->agency_comments = request('agency_comments');
        $project->existing_lanes = request('existing_lanes');
        $project->projected_lanes = request('projected_lanes');

        $project->save();

        return response('Project: '. $project->name .' created', 200)->header('Content-Type', 'text/plain');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Project::find($id) ? Project::find($id) : response()->json(['error' => 'Not Found'], 404);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $name = $project->name;
        $project->delete();
        return response('Project: '. $name .' was deleted', 200)->header('Content-Type', 'text/plain');
    }
}
