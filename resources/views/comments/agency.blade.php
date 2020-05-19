@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
           
                <div class="card-body">
                    <form>
                        @csrf
                        <!-- <label>
                            Agency Name:
                        </label> -->
                        <textarea id="w3mission" rows="4" cols="80" class="form-control">Date Version X</textarea>
                     

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
