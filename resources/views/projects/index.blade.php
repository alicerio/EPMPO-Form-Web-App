@extends('layouts.app')

@section('content')

@if(auth()->user()->type!=2)
@extends('projects.index_NonAdmin')
@else
<div class="container">
    <h2 class="text-center"><b>Projects</b></h2>
    <div class="row">
        <div class="col-md-4">
            <input type="text" class="form-control" id="input" onkeyup="searchProject()" placeholder="Search for project name." title="Type in project name." size="10">
        </div>
        <div class="col-md-12">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle float-right" type="button" id="user_edit_options"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    New Project
                </button>
                <div class="dropdown-menu" aria-labelledby="user_edit_options">
                    <a class="dropdown-item" href="{{ route('projects.create') }}">PRF</a>
                    <a class="dropdown-item" href="{{ route('bprojects.create') }}">5310 PRF</a>
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
            <table class="table table-bordered table-hover" id="project_table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Projects</th>
                        <th scope="col">Agency</th>
                        <th scope="col">Last Updated By</th>
                        <th scope="col">Status</th>
                        <th scope="col">Project Type</th>
                        <th scope="col">editor</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($youngerChildren as $project)
                    @if($project->agency_id != auth()->user()->agency->id && auth()->user()->type!=2)
                    @else
                    <tr>
                        <td>
                            <p hidden>{{$temp_id = $project->id}}</p>
                            @if($project->parent_id != null)
                                <p hidden>{{$project->id =  $project->parent_id}}</p>
                                <p hidden>{{$temp_parent_id = $project->parent_id}}</p>
                            @else
                            <p hidden>{{$temp_parent_id = $project->id}}</p>
                            @endif

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
                                        <p hidden>{{$project->id = $temp_id}}</p>
                                        {{ route('projects.edit', $project->id) }}
                                        @if(auth()->user()->type == 2)
                                        <a class="dropdown-item" href="{{ route('projects.editInfo', $project->id) }}"
                                            method="POST">Update MPO ID</a>
                                        @endif
                                        <p hidden>{{$project->id = $temp_parent_id}}</p>
                                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST"
                                            onclick="return confirm('Are you sure you want to continue with the deletion?')">
                                            @csrf
                                            @method('delete')
                                            <button class="dropdown-item" type="submit" )>
                                                Delete Project
                                            </button>
                                        </form>
                                        <form action="{{ route('projects.destroyNonSubmissions', $project->id) }}"
                                            method="POST"
                                            onclick="return confirm('Are you sure you want to continue with the deletion?')">
                                            @csrf
                                            @method('delete')
                                            <button class="dropdown-item" type="submit" )>
                                                Delete Non Submissions
                                            </button>
                                        </form>
                                        <form action="{{ route('projects.leaveApproved', $project->id) }}" method="POST"
                                            onclick="return confirm('Are you sure you want to continue with the deletion?')">
                                            @csrf
                                            @method('delete')
                                            <button class="dropdown-item" type="submit" )>
                                                Delete Non Approved
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

<script>
    function searchProject() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("input");
        filter = input.value.toUpperCase();
        table = document.getElementById("project_table");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }       
        }
    }
</script>