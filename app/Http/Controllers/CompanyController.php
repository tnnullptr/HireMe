<?php

namespace App\Http\Controllers;

use App\Models\JobSkill;
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
        $skill   = $request->input('skill');

        $job = new Job;
        $job->name = $name;
        $job->salary = $salary;
        $job->location = $loc;
        $job->type = $type;
        $job->company_id = Auth::user()->id;
        $job->save();

        $job_skill = new JobSkill;
        $job_skill->job_id = $job->id;
        $job_skill->skill_type = $skill;
        $job_skill->save();

        return $this->index();
    }

    public function jobAddUI(){
        $skill_types = SkillType::all();
        return view('company.add')
            ->with('skills', $skill_types);
    }

    public function index() {
        $jobs = Job::where('company_id',Auth::user()->id)->get();

        $skills = [];
        foreach ($jobs as $job){
            $_ = [];
            $a =JobSkill::where('job_id',$job->id)->get();
            foreach($a as $__){
                array_push($_,$__->skill_type);
            }
            $skills[$job->id] = $_;
        }


        return view('company.home')
            ->with('jobs', $jobs)
            ->with('admin',Gate::check('is-admin'))
            ->with('skill',$skills);
    }
}
