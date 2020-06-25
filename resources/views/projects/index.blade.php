@extends('layouts.app')

@section('content')
@if(auth()->user()->type!=2)
@extends('projects.index_NonAdmin')

@else
<div class="container">
    <h2 class="text-center"><b>Projects</b></h2>
    <div class="row">
        <div class="col-md-12">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle float-right" type="button" id="user_edit_options"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    New Project
                </button>
                <div class="dropdown-menu" aria-labelledby="user_edit_options">
                    <a class="dropdown-item" href="{{ route('projects.create') }}">TASA</a>
                    <a class="dropdown-item" href="{{ route('bprojects.create') }}">5310</a>
                </div>
            </div>
        </div>
        <div style="padding-top: 5%;"></div>
        <div class="col-md-12">
            @if(count($projects) == 0)
            <div class="alert alert-secondary text-center" role="alert">
                No projects have been submitted
            </div>
            @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Project</th>
                        <th scope="col">Agency</th>
                        <th scope="col">Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Project Type</th>
                        <th scole="col">editor</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                    @if($project->agency_id != auth()->user()->agency->id && auth()->user()->type!=2)
                    @else
                    <tr>
                        <td>
                            <a href="{{ route('projects.revisions', $project->id) }}">
                                {{ $project->name }}
                            </a>
                        </td>
                        @foreach ($agencies as $agency)
                        @if($agency->id == $project->agency_id)
                        <td>{{ $agency->name }}</td>
                        @endif
                        @endforeach
                        <td>{{ $project->author }}</td>
                        @if($project->agency_id<=6) <td>{{ $statuses[$project->status] }}</td>
                            @else
                            <td>{{ $statuses[$project->status] }}</td>
                            @endif
                    <td>{{ $project->project_type}}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                        id="user_edit_options" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Options
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="user_edit_options">
                                        <!--    <a class="dropdown-item"
                                            href="{{ route('projects.edit', $project->id) }}">Edit</a> -->
                                        @if(auth()->user()->type == 2)
                                        <a class="dropdown-item"
                                            href="{{ route('projects.editInfo', $project) }}">Update MPO
                                            ID</a>
                                        @endif
                                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST"
                                            onclick="return confirm('Delete Project?')">
                                            @csrf
                                            @method('delete')
                                            <button class="dropdown-item" type="submit" )>
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
</div>
@endsection
@endif