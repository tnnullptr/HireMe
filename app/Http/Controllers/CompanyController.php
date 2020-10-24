<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use App\Models\SkillType;
use Auth;
use Gate;
use App\Models\Job;

class CompanyController extends Controller {
    public function job_add(Request $request)
    {
        $name    = $request->input("name");
        $salary = $request->input("salary");
        $loc    = $request->input("location");
        $type    = $request->input("type");

        $job = new Job;
        $job->name = $name;
        $job->salary = $salary;
        $job->location = $loc;
        $job->type = $type;
        $job->company_id = Auth::user()->id;
        $job->save();
    }

    public function index() {
        $jobs = Job::where('company_id',Auth::user()->id)->get();
        return view('company.home')
            ->with('jobs', $jobs)
            ->with('admin',Gate::check('is-admin'));
    }
}
