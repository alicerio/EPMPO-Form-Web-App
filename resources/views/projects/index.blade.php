@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('projects.create') }}" class="btn btn-primary mb-1 float-right">
                New Project
            </a>
        </div>
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
                        <th scope="col">MPO/CSJ</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                        @if($project->agency_id != auth()->user()->agency->id && auth()->user()->type!=2)
                        @else
                        <tr>
                            <td>
                                <a href="{{ route('projects.show', $project->id) }}">
                                    {{ $project->name }}
                                </a>
                            </td>
                            {{-- TODO: FIX AGENCY NAME --}}
                            <td>{{ auth()->user()->agency->name }}</td>
                            <td>{{ auth()->user()->name }}</td>
                            <td>{{ $statuses[0] }}</td>
                            @if(auth()->user()->type!=2)
                                <td>{{ $project->mpo_id }}</td>
                                <td>{{ $project->csj_cn }}</td>
                                <td></td>
                            @else
                                <form action="{{ route('projects.updateMPO', $project->id) }}" method="POST">
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
                                    <td>
                                        <button class="btn btn-light btn-block" type="submit">
                                                Update MPO ID
                                        </button>
                                    </td>
                                </form>
                            @endif
                            <td>
                                <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-primary btn-block">
                                    Edit
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('projects.destroy', $project->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-block" type="submit">
                                        Delete
                                    </button>
                                </form>
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
