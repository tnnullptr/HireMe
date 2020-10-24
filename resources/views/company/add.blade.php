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

                            <input type="submit" id="btn_submit" class="btn btn-info">
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
