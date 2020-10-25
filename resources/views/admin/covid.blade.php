@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">COVID19 Document List</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <ul class="list-group">
                            @foreach($files as $file)
                                <Covid19 covid="{{$file[1]}}"
                                         id="{{$file[0]}}"
                                         :is-covid="{{$file[2]}}"
                                         accept-endpoint="{{route('admin.covid19.accept')}}"
                                ></Covid19>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
