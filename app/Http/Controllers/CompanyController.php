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
        $context    = $request->input("context");

        $job = new Job;
        $job->name = $name;
        $job->salary = $salary;
        $job->location = $loc;
        $job->type = $type;
        $job->company_id = Auth::user()->id;
        $job->context = $context;
        $job->save();

        $skills = [
            $request->input('skill_1'),
            $request->input('skill_2'),
            $request->input('skill_3'),
            $request->input('skill_4'),
            $request->input('skill_5'),
        ];

        foreach (range(1, 5) as $i) {
            JobSkill::updateOrInsert([
                'job_id' => $job->id,
                'priority' => $i
            ], [
                'job_id' => $job->id,
                'priority' => $i,
                'skill_type'=>$skills[$i-1]
            ]);

        }

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
