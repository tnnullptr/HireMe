@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach($Jobs as $job)
                    <div class="card w-100">
                        <div class="card-body">
                            <h5 class="card-title">{{$job['name']}}</h5>
                            <h6 class="card-subtitle mb-2 text-muted"><i class="fa fa-money"></i>: {{$job['salary']}}</h6>
                            <p class="card-text"><i class="fa fa-location-arrow"></i> {{$job['location']}} </p>
                            <p class="card-text"><i class="fa fa-bookmark"></i> {{$job['type'] | }} </p>
                            <p class="card-text">{{$job['context']}} </p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
