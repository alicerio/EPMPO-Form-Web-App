@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><b>Change Password</b></div>
                <div class="card-body">
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <input type="text" name="name" class="form-control" value="{{ $user->name }}" hidden>
                        <input type="text" name="type" class="form-control" value="{{ $user->type }}" hidden>
                        <input type="text" name="email" class="form-control" value="{{ $user->email }}" hidden>
                        <input type="text" name="email_verified_at" class="form-control" value="{{ $user->email_verified_at }}" hidden>
                        <input type="text" name="agency_id" class="form-control" value="{{ $user->agency_id }}" hidden>

                        <label>
                            Password
                        </label>
                        {{-- FIX: empty password overwrites current password --}}
                        <input type="password" name="password" class="form-control">
                        <button class="btn btn-primary mt-1 float-right">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection