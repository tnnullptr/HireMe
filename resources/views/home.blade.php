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
                                <div class="card-header">
                                    {{$job['name']}}
                                </div>
                                <div class="card-body">
                                    <p class="card-text">{{$job['context']}} </p>
                                </div>
                                <div class="card-footer">
                                    <p class="card-subtitle mb-2 text-muted"><i
                                            class="fa fa-money"></i> {{$job['salary']}}</p>
                                    <p class="card-subtitle mb-2 text-muted"><i
                                            class="fa fa-location-arrow"></i> {{$job['location']}} </p>
                                    <p class="card-subtitle mb-2 text-muted"><i
                                            class="fa fa-bookmark"></i> {{$job['type'] == "PARTTIME" ? "兼職" : ($job['type'] == "FULLTIME" ? "全職" : "政府官方")}}
                                    </p>
                                    <!--<p class="card-subtitle mb-2 text-muted"><i class="fa fa-bookmark"></i> </p>-->
                                </div>
                            </div>
                            <br>
                        @endforeach
                        @if(sizeof($Jobs)==0)
                            No jobs available
                        @endif

                        @foreach($Special as $job)
                            <div class="card w-100">
                                <div class="card-header">
                                    {{$job['title']}}
                                </div>
                                <div class="card-body">
                                    <p class="card-text">{{$job['徵才條件'].$job['報名方式']}} </p>
                                </div>
                                <div class="card-footer">
                                    <p class="card-subtitle mb-2 text-muted"><i
                                            class="fa fa-money"></i> </p>
                                    <p class="card-subtitle mb-2 text-muted"><i
                                            class="fa fa-location-arrow"></i> {{$job['工作地點']}} </p>
                                    <p class="card-subtitle mb-2 text-muted"><i
                                            class="fa fa-bookmark"></i> {{$job['職缺單位']}}
                                    </p>
                                    <!--<p class="card-subtitle mb-2 text-muted"><i class="fa fa-bookmark"></i> </p>-->
                                </div>
                            </div>
                            <br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
