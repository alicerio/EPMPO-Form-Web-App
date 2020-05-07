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
                <table class="table table-dark">
                    <thead>
                        <tr>
                        <th scope="col">Project</th>
                        <th scope="col">Agency</th>
                        <th scope="col">Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
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
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
