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
        filter_var($status, FILTER_VALIDATE_BOOLEAN);
        $id = $request->input('id');

        if (Gate::check('is-admin')) {
            SkillType::where('id', $id)
                ->updateOrInsert([
                    'id' => $id
                ], [
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

    public function skill()
    {
        $skills = SkillType::all();
        return view('admin.skills.home')
            ->with('skills',$skills)
            ->with('admin',Gate::check('is-admin'));
    }

    public function index()
    {
        return view('admin.home')
            ->with('');
    }
}
