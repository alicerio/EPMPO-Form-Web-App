@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
     
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle float-right" type="button" id="user_edit_options" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        New Project
                    </button>
                    <div class="dropdown-menu" aria-labelledby="user_edit_options">
                        <a class="dropdown-item" href="{{ route('projects.create') }}">Project A</a>
                        <a class="dropdown-item" href="#">Project B</a>
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
                        <th scope="col">MPO ID</th>
                        <th scope="col">CSJ</th>
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
                            <td>{{ auth()->user()->name }}</td>
                            @if($project->agency_id<=6)
                                <td>{{ $statuses[$project->status] }}</td>
                            @else
                                <td>{{ $statuses[$project->status] }}</td>
                            @endif
                            @if(auth()->user()->type!=2)
                                <td>{{ $project->mpo_id }}</td>
                                <td>{{ $project->csj_cn }}</td>
                                <td></td>
                            @else
                                <form action="{{ route('projects.updateMPO', $project->id) }}" method="POST" name="inline_form">
                                    @csrf
                                    @method('PATCH')
                                    <input type="text" name="name" hidden value="{{ $project->name }}">
                                    <input type="text" name="agency_id" hidden value="{{ $project->agency_id }}">
                                    <td>
                                        <input type="text" class="form-control" name="mpo_id" value="{{ $project->mpo_id }}">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="csj_cn" value="{{ $project->csj_cn }}">
                                    </td>
                                </form>
                            @endif
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="user_edit_options" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Options
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="user_edit_options">
                                        <a class="dropdown-item" href="{{ route('projects.edit', $project->id) }}">Edit</a>
                                        @if(auth()->user()->type == 2)
                                            <a class="dropdown-item" onclick="document.inline_form.submit();">Update MPO ID</a>
                                        @endif
                                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="dropdown-item" type="submit">
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
