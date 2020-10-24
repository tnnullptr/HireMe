@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Modify Skill</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        Hello, admin
                        <ul class="list-group">
                            @foreach($skills as $skill)
                            <Skill skill="{{$skill}}"
                                   :admin="{{$admin}}"
                                   accept-endpoint="{{route('admin.skills.accept')}}"
                            >
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
