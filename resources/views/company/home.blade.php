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
                        <a href="{{route('company.job.add')}}" class="btn btn-success">Add Job</a>
                    @foreach($jobs as $job)
                        <Job
                            jobs="{{$job}}"
                            :admin="{{$admin}}"
                            skill="{{json_encode($skill[$job->id])}}"
                        ></Job>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
