<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use App\Models\SkillType;
use Auth;
use Illuminate\Support\Facades\Storage;

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

        $path = "";
        if($request->file('covid19_doc')) {
            $path = $request->file('covid19_doc')->storeAs(
                'covid19', $request->user()->id.'.pdf',
                ['disk' => 'public']
            );
        }

        return $this->index();
    }

    public function index() {
        $skill_types = SkillType::all();
        $skill_own   = Skill::where('user_id',Auth::user()->id)->get();

        $owning_skill = [];
        foreach($skill_own as $skill){
            $owning_skill[$skill->priority] = $skill->skill_type;
        }

        $filePath = "";
        if(Storage::exists('public/covid19/'.Auth::user()->id.'.pdf')){
            $filePath = Storage::url('public/covid19/'.Auth::user()->id.'.pdf');
        }

        return view('personal.home')
            ->with('skills', $skill_types)
            ->with('personal_skills',$owning_skill)
            ->with('file_path',$filePath)
            ->with('is_covid',Auth::user()->covid19);
    }
}
