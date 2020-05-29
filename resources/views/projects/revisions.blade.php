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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $index => $project)
                            @if($project->agency_id == auth()->user()->agency->id && auth()->user()->type == 2)
                                <tr class="{{ ($project->parent_id == null) ? 'table-info' : '' }}">
                                    <td>
                                        @if($index == count($projects) - 1)
                                            <a href="{{ route('projects.edit', $project->id) }}">
                                                {{ $statuses[$project->status] }}
                                                {{ ($statuses[$project->status] == 'Submitted') ? 'v' . ++$counts[$project->status] : '' }}
                                            </a>
                                        @else
                                            <a href="{{ route('projects.show', $project->id) }}">
                                                {{ $statuses[$project->status] }}
                                                {{ ($statuses[$project->status] == 'Submitted') ? 'v' . ++$counts[$project->status] : '' }}
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $project->created_at }}
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
