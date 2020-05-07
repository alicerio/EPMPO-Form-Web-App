@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    New Agency
                </div>
                <div class="card-body">
                    <form action="{{ route('agencies.store') }}" method="POST">
                        @csrf
                        <label>
                            Agency Name:
                        </label>
                        <input type="text" class="form-control" required name="name">

                        <button class="btn btn-primary mt-1 float-right" type="submit">
                            Save
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
