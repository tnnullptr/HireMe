@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Company Panel</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <form method="POST" action="{{route('company.job.action.add')}}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Job Name</label>
                                <input id="name" type="text" name="name">
                            </div>
                            <div class="form-group">
                                <label for="salary">Salary/hr</label>
                                <select name="salary">
                                    <option value="0~100">0~100</option>
                                    <option value="100~200">100~200</option>
                                    <option value="200~300">200~300</option>
                                    <option value="300~400">300~400</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="location">Location</label>
                                <input id="location" type="text" name="location">
                            </div>
                            <div class="form-group">
                                <label for="type">Type</label>
                                <select name="type">
                                    <option value="PARTTIME">兼職</option>
                                    <option value="FULLTIME">全職</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="context">簡介</label>
                                <textarea name="context" id="context"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="skill_lb_1">能力第一順位</label>
                                <select class="form-control" id="skill_lb_1" name="skill_1">
                                    @foreach($skills as $skill)
                                        <option value="{{$skill->id}}" selected>{{$skill->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="skill_lb_2">能力第二順位</label>
                                <select class="form-control" id="skill_lb_2" name="skill_2">
                                    @foreach($skills as $skill)
                                        <option value="{{$skill->id}}" selected>{{$skill->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="skill_lb_3">能力第三順位</label>
                                <select class="form-control" id="skill_lb_3" name="skill_3">
                                    @foreach($skills as $skill)
                                        <option value="{{$skill->id}}" selected>{{$skill->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="skill_lb_4">能力第四順位</label>
                                <select class="form-control" id="skill_lb_4" name="skill_4">
                                    @foreach($skills as $skill)
                                        <option value="{{$skill->id}}" selected>{{$skill->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="skill_lb_5">能力第五順位</label>
                                <select class="form-control" id="skill_lb_5" name="skill_5">
                                    @foreach($skills as $skill)
                                        <option value="{{$skill->id}}" selected>{{$skill->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="submit" id="btn_submit" class="btn btn-info">
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
