@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Personal Panel</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="post" enctype="multipart/form-data" action="{{route('personal.setSkill')}}">
                            @csrf
                            <div class="form-group">
                                <label for="skill_lb_1">能力第一順位</label>
                                <select class="form-control" id="skill_lb_1" name="skill_1">
                                    @foreach($skills as $skill)
                                        @if(isset($personal_skills[1]) && $personal_skills[1] == $skill->id)
                                            <option value="{{$skill->id}}" selected>{{$skill->title}}</option>
                                        @else
                                            <option value="{{$skill->id}}">{{$skill->title}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="skill_lb_2">能力第二順位</label>
                                <select class="form-control" id="skill_lb_2" name="skill_2">
                                    @foreach($skills as $skill)
                                        @if(isset($personal_skills[2]) && $personal_skills[2] == $skill->id)
                                            <option value="{{$skill->id}}" selected>{{$skill->title}}</option>
                                        @else
                                            <option value="{{$skill->id}}">{{$skill->title}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="skill_lb_3">能力第三順位</label>
                                <select class="form-control" id="skill_lb_3" name="skill_3">
                                    @foreach($skills as $skill)
                                        @if(isset($personal_skills[3]) && $personal_skills[3] == $skill->id)
                                            <option value="{{$skill->id}}" selected>{{$skill->title}}</option>
                                        @else
                                            <option value="{{$skill->id}}">{{$skill->title}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="skill_lb_4">能力第四順位</label>
                                <select class="form-control" id="skill_lb_4" name="skill_4">
                                    @foreach($skills as $skill)
                                        @if(isset($personal_skills[4]) && $personal_skills[4] == $skill->id)
                                            <option value="{{$skill->id}}" selected>{{$skill->title}}</option>
                                        @else
                                            <option value="{{$skill->id}}">{{$skill->title}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="skill_lb_5">能力第五順位</label>
                                <select class="form-control" id="skill_lb_5" name="skill_5">
                                    @foreach($skills as $skill)
                                        @if(isset($personal_skills[5]) && $personal_skills[5] == $skill->id)
                                            <option value="{{$skill->id}}" selected>{{$skill->title}}</option>
                                        @else
                                            <option value="{{$skill->id}}">{{$skill->title}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="covid19_doc">COVID-19 證明文件</label>
                                @if($file_path != "")
                                (<a href="{{$file_path}}">先前上傳的文件</a>)
                                @endif

                                @if($is_covid)
                                <i class="fa fa-check-circle text-success"
                                   data-toggle="tooltip" data-placement="top" title="Verified COVID19 Influenced Person"
                                   ></i>
                                @else
                                <i class="fa fa-times-circle text-danger"
                                   data-toggle="tooltip" data-placement="top" title="Unverified COVID19 Influenced Person"
                                   ></i>
                                @endif

                                <input type="file" class="form-control-file" id="covid19_doc" name="covid19_doc">
                            </div>
                            <button type="submit" class="btn btn-success" >Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
