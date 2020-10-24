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
        $acceptSalary = [
            '0~100','100~200','200~300','300~400'
        ];

        $name    = $request->input("name");
        $salary = $request->input("salary");
        if(!in_array($salary,$acceptSalary)) $salary = 'not set';

        $loc    = $request->input("location");
        $type    = $request->input("type");

        $job = new Job;
        $job->name = $name;
        $job->salary = $salary;
        $job->location = $loc;
        $job->type = $type;
        $job->company_id = Auth::user()->id;
        $job->save();

        return $this->index();
    }

    public function index() {
        $jobs = Job::where('company_id',Auth::user()->id)->get();
        return view('company.home')
            ->with('jobs', $jobs)
            ->with('admin',Gate::check('is-admin'));
    }
}
