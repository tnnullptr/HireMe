<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use App\Models\JobSkill;
use App\Models\Job;
use App\Models\Skill;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $allPost = [];
        $hsinchu_work = Http::get('http://www.hsinchu.gov.tw/OpenData.aspx?SN=D824FB1AC7C4B039')->json();

        $usr_skill = Skill::where('user_id',Auth::user()->id)
            ->orderBy('priority')
            ->get();
        $UE = [];
        foreach ($usr_skill as $skill){
            array_push($UE,$skill->skill_type);
        }

        $jobs = Job::all();
        $jobs_skill = JobSkill::all();

        $SE = [];
        foreach($jobs_skill as $job){
            if(isset($SE[$job->job_id])){
                array_push($SE[$job->job_id],$job->skill_type);
            }else{
                $SE[$job->job_id] = [$job->skill_type];
            }
        }
        $newSE = [];
        foreach($SE as $i => $job){
            array_push($newSE,[
               'id'=>$i,
               'data'=>$job
            ]);
        }


        usort($newSE, function ($a, $b) use ($UE) {
            foreach($UE as $uskill){
                if(in_array($uskill,$a['data']) && in_array($uskill,$b['data'])){
                    continue;
                }else{
                    return in_array($uskill,$a['data']) > in_array($uskill,$b['data']);
                }
            }
            return 1;
        });

        $job2info = [];
        foreach($jobs as $item){
            $job2info[$item->id] = $item;
        }

        $nnSE = [];
        foreach($newSE as $job){
            array_push($nnSE,$job2info[$job['id']]);
        }

        var_dump($nnSE);
        $AD = [];
        foreach($hsinchu_work as $work){
            $t = new Job;
            $t->name = $work['title'];
            $t->context = $work['徵才條件'].$work['報名方式'];
            $t->location = $work['工作地點'];
            $t->salary = 'not set';
            $t->company_id = 1;
            $t->type = "GOV";
            //var_dump($t);
            //array_splice( $nnSE, rand ( 0 , sizeof($nnSE)), 0, $t );
        }

        /*var_dump($newSE);
        echo "<br>";
        var_dump($job2info);*/
        return view('home')
            ->with('Jobs',$nnSE)
            ->with('Info',$job2info)
            ->with('Special',$AD);
    }
}
