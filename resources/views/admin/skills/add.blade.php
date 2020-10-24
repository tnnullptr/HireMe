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
                            <form method="POST" action="{{route('admin.skills.action.add')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="title">Skill Title</label>
                                    <input id="title" type="text" name="title">
                                </div>
                                <input type="submit" id="btn_submit" class="btn btn-info">
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
