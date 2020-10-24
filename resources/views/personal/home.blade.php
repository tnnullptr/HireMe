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
                        <form method="post" action="{{route('personal.setSkill')}}">

                            <div class="form-group">
                                <label for="skill_lb_1">能力第一順位</label>
                                <select class="form-control" id="skill_lb_1" name="skill_1">
                                    @foreach($skills as $skill)
                                        <option value="{{$skill->id}}">{{$skill->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="skill_lb_2">能力第二順位</label>
                                <select class="form-control" id="skill_lb_2" name="skill_2">
                                    @foreach($skills as $skill)
                                        <option value="{{$skill->id}}">{{$skill->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="skill_lb_3">能力第三順位</label>
                                <select class="form-control" id="skill_lb_3" name="skill_3">
                                    @foreach($skills as $skill)
                                        <option value="{{$skill->id}}">{{$skill->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="skill_lb_4">能力第四順位</label>
                                <select class="form-control" id="skill_lb_4" name="skill_4">
                                    @foreach($skills as $skill)
                                        <option value="{{$skill->id}}">{{$skill->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="skill_lb_5">能力第五順位</label>
                                <select class="form-control" id="skill_lb_5" name="skill_5">
                                    @foreach($skills as $skill)
                                        <option value="{{$skill->id}}">{{$skill->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
