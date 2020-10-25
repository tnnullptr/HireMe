@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Admin Panel</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        Hello, admin<br>
                        <ul class="list-group">
                            <a href="{{route('admin.skills.home')}}" class="list-group-item">Skills List</a>
                            <a href="{{route('admin.covid19.home')}}" class="list-group-item">COVID19 Document List</a>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
