<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use App\Models\SkillType;

class PersonalController extends Controller
{
    public function set_skill(Request $request){
        $skill1 = $request->input('skill_1');
        $skill2 = $request->input('skill_2');
        $skill3 = $request->input('skill_3');
        $skill4 = $request->input('skill_4');
        $skill5 = $request->input('skill_5');

    }

    public function index(){
        $skills = SkillType::all();
        return view('personal.home')
            ->with('skills',$skills);
    }
}
