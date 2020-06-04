@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            @include('projects.part1')
        </div>
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        @auth
                        @if(auth()->user()->type == 2)
                        <textarea placeholder="Comments" class="pb-cmnt-textarea" name="comments_1"
                            value="{{$project->comments_1 }}"></textarea>
                        <button class="btn btn-primary d-flex justify-content-center" type="button">Add Comment</button>
                        @else
                        <textarea placeholder="Comments" class="pb-cmnt-textarea" readonly></textarea>
                        @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="space"></div>

    <div class="row">
        <div class="col-md-9">
            @include('projects.part2')
        </div>
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        @auth
                        @if(auth()->user()->type == 2)
                        <textarea placeholder="Comments" class="pb-cmnt-textarea" name="comments_1"
                            value="{{$project->comments_1 }}"></textarea>
                        <button class="btn btn-primary d-flex justify-content-center" type="button">Add Comment</button>
                        @else
                        <textarea placeholder="Comments" class="pb-cmnt-textarea" readonly></textarea>
                        @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="space"></div>

    <div class="row">
        <div class="col-md-9">
            @include('projects.part3')
        </div>
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        @auth
                        @if(auth()->user()->type == 2)
                        <textarea placeholder="Comments" class="pb-cmnt-textarea" name="comments_1"
                            value="{{$project->comments_1 }}"></textarea>
                        <button class="btn btn-primary d-flex justify-content-center" type="button">Add Comment</button>
                        @else
                        <textarea placeholder="Comments" class="pb-cmnt-textarea" readonly></textarea>
                        @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="space"></div>

    <div class="row">
        <div class="col-md-9">
            @include('projects.part4')
        </div>
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        @auth
                        @if(auth()->user()->type == 2)
                        <textarea placeholder="Comments" class="pb-cmnt-textarea" name="comments_1"
                            value="{{$project->comments_1 }}"></textarea>
                        <button class="btn btn-primary d-flex justify-content-center" type="button">Add Comment</button>
                        @else
                        <textarea placeholder="Comments" class="pb-cmnt-textarea" readonly></textarea>
                        @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="space"></div>

    <div class="row">
        <div class="col-md-9">
            @include('projects.part5')
        </div>
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        @auth
                        @if(auth()->user()->type == 2)
                        <textarea placeholder="Comments" class="pb-cmnt-textarea" name="comments_1"
                            value="{{$project->comments_1 }}"></textarea>
                        <button class="btn btn-primary d-flex justify-content-center" type="button">Add Comment</button>
                        @else
                        <textarea placeholder="Comments" class="pb-cmnt-textarea" readonly></textarea>
                        @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="space"></div>
    <div class="row">
        <div class="col-md-9">
            @include('projects.part6')
        </div>
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        @auth
                        @if(auth()->user()->type == 2)
                        <textarea placeholder="Comments" class="pb-cmnt-textarea" name="comments_1"
                            value="{{$project->comments_1 }}"></textarea>
                        <button class="btn btn-primary d-flex justify-content-center" type="button">Add Comment</button>
                        @else
                        <textarea placeholder="Comments" class="pb-cmnt-textarea" readonly></textarea>
                        @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if($project->status == 2)
    <a class="btn btn-primary" href="{{ url()->previous() }}" role="button">Comments</a>
    @endif
</div>

<style>
    button {
        margin: 1%;
    }

    #space {
        margin: 5%;
    }

    .pb-cmnt-container {
        font-family: Lato;
        margin-top: 100px;
    }

    .pb-cmnt-textarea {
        resize: none;
        padding: 20px;
        height: 15%;
        width: 100%;
        border: 1px solid #F2F2F2;
    }
</style>
<script src="{{ asset('docs/js/logOfChangesLogic.js')}}"></script>
<script src="{{ asset('docs/js/form1FrontEndLogic.js')}}"></script>
@endsection