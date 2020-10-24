<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use App\Models\SkillType;
use Auth;

class PersonalController extends Controller {
    public function set_skill(Request $request) {
        $skills = [
            $request->input('skill_1'),
            $request->input('skill_2'),
            $request->input('skill_3'),
            $request->input('skill_4'),
            $request->input('skill_5'),
        ];

        foreach (range(1, 5) as $i) {
            Skill::updateOrInsert([
                'user_id' => Auth::user()->id,
                'priority' => $i
            ], [
                'user_id' => Auth::user()->id,
                'priority' => $i,
                'skill_type'=>$skills[$i-1]
            ]);

        }
        return $this->index();
    }

    public function index() {
        $skill_types = SkillType::all();
        $skill_own   = Skill::where('user_id',Auth::user()->id);

        $owning_skill = [];
        foreach($skill_own as $skill){
            $owning_skill[$skill->priority] = $skill->skill_type;
        }

        return view('personal.home')
            ->with('skills', $skill_types)
            ->with('personal_skills',$owning_skill);
    }
}
