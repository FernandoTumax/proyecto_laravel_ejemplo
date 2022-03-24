<?php

namespace App\Http\Controllers;

use App\Campu;
use App\JobTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobTitleController extends Controller{

    public function index(){

        $jobs = JobTitle::all();

        return view('jobs.index', compact('jobs'));
    }

    public function show(JobTitle $job){

        $campus = $job->campus;

        return view('jobs.show', compact('job', 'campus'));
    }

    public function destroy(JobTitle $job){

        $job->delete();

        return redirect()->route('jobs.index');
    }

    public function create(){

        $campus = Campu::all();

        return view('jobs.create', compact('campus'));
    }

    public function store(Request $request){

        $job = JobTitle::create($request->all());

        if($request->campus){
            $job->campus()->attach($request->campus);
        }

        return redirect()->route('jobs.show', $job);

        // return $request;
    }

    public function edit(JobTitle $job){

        $campus = $job->campus;

        $allCampus = Campu::all();

        $noCampus = $allCampus->diff($campus);

        return view('jobs.edit', compact('job', 'campus','noCampus'));
    }

    public function update(Request $request, JobTitle $job){

        $job->update($request->all());

        if($request->campus){
            $job->campus()->attach($request->campus);
        }

        return redirect()->route('jobs.show', $job);

    }

    public function validJob(Request $request)
    {
        $job_id = $request->get('job_id');
        $job = DB::table('job_titles')
            ->where('code_job', $request->get('code_job'))
            ->where('id', '!=', $job_id)
            ->first();

        return isset($job) ? 'false' : 'true';
    }
}
