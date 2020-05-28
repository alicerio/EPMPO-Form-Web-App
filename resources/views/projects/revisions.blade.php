@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

        </div>
        <div style="padding-top: 5%;"></div>
        <div class="col-md-12">
            @if(count($projects) == 0)
                <div class="alert alert-secondary text-center" role="alert">
                    No projects have been submitted
              </div>
            @else
                <h3 class="float-left">Project: {{ $projects[0]->name }}</h3>
                <h3 class="float-right">Status: {{ $statuses[$projects[count($projects) - 1]->status] }}</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Submitted</th>
                            <th scope="col">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            @if($project->agency_id != auth()->user()->agency->id && auth()->user()->type!=2)

                            @else
                                <tr class="{{ ($project->parent_id == null) ? 'table-info' : '' }}">
                                    <td>
                                        <a href="{{ route('projects.show', $project->id) }}">
                                            {{ $statuses[$project->status] }}
                                            {{ ($statuses[$project->status] == 'Submitted') ? 'v' . ++$counts[$project->status] : '' }}
                                        </a>
                                    </td>
                                    <td>
                                        {{ $project->created_at }}
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="user_edit_options" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Options
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="user_edit_options">
                                                {{-- Project is in progress --}}
                                                @if($project->status == 0 || $project->status == 4)
                                                    <a class="dropdown-item" href="{{ route('projects.edit', $project->id) }}">Edit</a>
                                                @endif
                                                {{-- Project needs to be signed off by submitter --}}
                                                @if($project->status == 1 && auth()->user()->type >= 1)
                                                    <form action="{{ route('projects.update', $project->id) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="text" name="status" value="2" hidden>
                                                        <button class="dropdown-item" type="submit">
                                                            Sign Off
                                                        </button>
                                                    </form>
                                                @endif
                                                {{-- Project needs to be approved / declined by mpo --}}
                                                @if($project->status == 2 && auth()->user()->type == 2)
                                                    <form action="{{ route('projects.update', $project->id) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="text" name="status" value="3" hidden>
                                                        <button class="dropdown-item" type="submit">
                                                            Approve
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('projects.update', $project->id) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="text" name="status" value="4" hidden>
                                                        <button class="dropdown-item" type="submit">
                                                            Decline
                                                        </button>
                                                    </form>
                                                @endif
                                                {{-- Only mpo admins can delete projects --}}
                                                @if(auth()->user()->type == 2)
                                                <form action="{{ route('projects.destroy', $project->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="dropdown-item" type="submit">
                                                        Delete
                                                    </button>
                                                </form>
                                                @endif
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
