@section('content')
<div class="container">
    @if(auth()->user()->type==2)
    <h2 class="text-center"><b>Projects</b></h2>
    @else
    <h2 class="text-center"><b>{{auth()->user()->agency->name}} Projects</b></h2>
    @endif
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
            <table class="table table-bordered table-hover">
                <thead  class="thead-light">
                    <tr>
                        <th scope="col">Project</th>
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
                                        <p hidden>{{$project->id = $temp_parent_id}}</p>
                                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST" 
                                            onclick="return confirm('Are you sure you want to continue with the deletion?')">
                                            @csrf
                                            @method('delete')
                                            <button class="dropdown-item" type="submit">
                                                Delete Project
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