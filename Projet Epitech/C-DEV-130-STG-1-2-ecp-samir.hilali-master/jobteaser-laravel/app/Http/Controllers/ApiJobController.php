<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class ApiJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::all();

        return response()->json([
        "success" => true,
        "message" => "Job List",
        "data" => $jobs
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = Job::find($id);
        if (is_null($job)) {
        return $this->sendError('Job not found.');
        }
        return response()->json([
        "success" => true,
        "message" => "Job retrieved successfully.",
        "data" => $job
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $job = Job::create($input);
        return response()->json([
        "success" => true,
        "message" => "Job created successfully.",
        "data" => $job
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $job = Job::findOrFail($id);
        $input = $request->all();
        $job->title = $input['title'];
        $job->location = $input['location'];
        $job->work_type = $input['work_type'];
        $job->description = $input['description'];
        $job->experience = $input['experience'];
        $job->dedline = $input['dedline'];
        $job->save();

        return response()->json([
        "success" => true,
        "message" => "Job updated successfully.",
        "data" => $job
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $job = Job::findOrFail($id);
        $job->delete();
        return response()->json([
        "success" => true,
        "message" => "Job deleted successfully.",
        "data" => $job
        ]);
    }
}
