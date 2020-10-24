@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Skills List</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        Hello, admin

                            <br>
                            <a href="{{route('admin.skills.add')}}" class="btn btn-success">Add Skill</a>
                        <ul class="list-group">

                        </ul>
                            @foreach($skills as $skill)
                                <Skill skill="{{$skill}}"
                                       :admin="{{$admin}}"
                                       accept-endpoint="{{route('admin.skills.action.add')}}"
                                ></Skill>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
