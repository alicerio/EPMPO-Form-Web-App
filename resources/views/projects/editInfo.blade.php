@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{route('projects.editInfo',$project->id)}}'" method="PATCH">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Project Info</div>
                        <div class="card-body">
                            <label>
                                MPO ID:
                            </label>
                            <input type="text" name="mpo_id" class="form-control" value="{{ $project->mpo_id ?? '' }}">
                            <label>
                                CSJ:
                            </label>
                            <input type="text" name="csj_cn" class="form-control" value="{{ $project->csj_cn ?? '' }}">
                            <button class="btn btn-primary mt-1 float-right" type="submit" onclick="showMessage()">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

<script type="text/javascript">
    function showMessage(){
        alert("You have successfully updated the fields.");
    }
</script>
