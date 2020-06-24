<style>
    #show_anchor1,#show_anchor2,#show_anchor3, #select_Action {
        height:40px;
        margin-top: 1%;
    }
    </style>
<div class="row col-12">
        @if(auth()->user()->type == 2)
        <select id="select_Action" class="mx-1" onchange="changeButtonText('select_Action','button_text_changer')" name="status"
            class="form-control" autocomplete="off">
            <option value="{{ $project->status }}" selected>---</option>
            @if(($project->status == 2 || $project->status == 3))
            <option value="3">Approve</option>
            <option value="4">Decline</option>
            @endif
        </select>

        <button id="button_text_changer" class="btn btn-primary mx-1" type="submit">
            ---
        </button>
        <button class="btn btn-primary mx-1" name="data" type="button" onclick="displayChanges(obj)">Log of changes</button>
        @endif
   
        <a id ="show_anchor1" class="btn btn-primary mx-1" href="{{route('projects.project_comments',$project->id)}}" role="button">Comments</a>

        <a id ="show_anchor2" class="btn btn-primary mx-1" href="{{route('project.excel')}}" role="button">Export to
            Excel</a>
  
        <button id ="show_anchor3" class="btn btn-primary mx-1" onclick="print()" type="button">Export to PDF</button>

    <!--
@auth
@if (auth()->user()->type == 1)
<button class="btn btn-primary mt-1 float-right" type="submit">
    Submit
</button>
@else
<button class="btn btn-primary mt-1 float-right" type="submit">
    Update
</button>
@endif
@endauth
-->
</div>

