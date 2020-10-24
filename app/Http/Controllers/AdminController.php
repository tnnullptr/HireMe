<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\SkillType;
use Gate;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }


    public function skill_accept(Request $request)
    {
        $status = $request->input("status");
        $title  = $request->input("title");
        filter_var($status, FILTER_VALIDATE_BOOLEAN);
        $id = $request->input('id');

        if (Gate::check('is-admin')) {
            SkillType::where('id', $id)
                ->updateOrInsert([
                    'id' => $id
                ], [
                    'title'=>$title,
                    'verified' => $status
                ]);
            return response()->json([
                'id' => $id,
                'status' => "ok",
                'msg'=>"OK! \n(ID:{$id})"
            ]);
        }else{
            return response()->json([
                'status' => "fail",
                'msg'=>'Permission Denied'
            ]);
        }
    }

    public function skill_add(Request $request)
    {
        $title = $request->input("title");
        $skill = new SkillType;
        if (Gate::check('is-admin')) {
            $skill->title = $title;
            $skill->verified = true;
            $skill->save();
            return $this->index();
        }else{
            $skill->title = $title;
            $skill->verified = false;
            $skill->save();
            return $this->skill();
        }
    }

    public function skill()
    {
        $skills = SkillType::all();
        return view('admin.skills.home')
            ->with('skills',$skills)
            ->with('admin',Gate::check('is-admin'));
    }

    public function index()
    {
        return view('admin.home');
    }
}
