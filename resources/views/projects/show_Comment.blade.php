@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{route('projects.project_comments',$project->id)}}'" method="POST">
        @csrf
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
                        <textarea name="comments_1" class="form-control" placeholder="Comments">{{$project->comments_1 ?? '' }}</textarea>
                        @else
                        <textarea name="comments_1" class="form-control" placeholder="Comments" readonly>{{$project->comments_1 ?? '' }}</textarea>
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
                        <textarea name="comments_2" class="form-control" placeholder="Comments">{{$project->comments_2 ?? '' }}</textarea>
                        @else
                        <textarea name="comments_2" class="form-control" placeholder="Comments" readonly>{{$project->comments_2 ?? '' }}</textarea>
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
                        <textarea name="comments_3" class="form-control" placeholder="Comments">{{$project->comments_3 ?? '' }}</textarea>
                        @else
                        <textarea name="comments_3" class="form-control" placeholder="Comments" readonly>{{$project->comments_3 ?? '' }}</textarea>
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
                        <textarea name="comments_4" class="form-control" placeholder="Comments">{{$project->comments_4 ?? '' }}</textarea>
                        @else
                        <textarea name="comments_4" class="form-control" placeholder="Comments" readonly>{{$project->comments_4 ?? '' }}</textarea>
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
                        <textarea name="comments_5" class="form-control" placeholder="Comments">{{$project->comments_5 ?? '' }}</textarea>
                        @else
                        <textarea name="comments_5" class="form-control" placeholder="Comments" readonly>{{$project->comments_5 ?? '' }}</textarea>
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
                        <textarea name="comments_6" class="form-control" placeholder="Comments">{{$project->comments_6 ?? '' }}</textarea>
                        @else
                        <textarea name="comments_6" class="form-control" placeholder="Comments" readonly>{{$project->comments_6 ?? '' }}</textarea>
                        @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if($project->status == 2)
    <a class="btn btn-primary" href="{{ url()->previous() }}" role="button">Comments</a>
    <button class="btn btn-primary mt-1 float-right">Submit Comments</button>
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