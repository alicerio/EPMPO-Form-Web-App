@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Project Info</div>
                <div class="card-body">
                    <form  method="POST">
                        @csrf
                        @method('PATCH')
                        <label>
                           MPO ID:
                        </label>
                        <input type="text" name="name" class="form-control" value="{{ $project->name ?? '' }}">

                        <label>
                            CSJ:
                        </label>
                        <input type="text" name="name" class="form-control" value="{{ $user->name ?? '' }}">

                        <button class="btn btn-primary mt-1 float-right">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
