<!-- 
We took advantage of the blade programming style.
Depending what state or status you are in, the front end changes.

select_Action is very special: 
    - toggles states
    - toggles required fields
-->
<div class="row col-12">
    <script>
        /* don't forget that when we import buttons_edit
           a project JS variable already exists.
           This is to help JS know current project
        */
       console.log(project);
        let project_type = project.project_type; 

    </script>
    @include('projects.buttons_shared')
    <?php
        
    ?>
    @if($project->status !=3)
    <select id="select_Action" style='height:40px;margin-top:1%;' class="mx-1"
        onchange="set_required_helper($('#'+this.id+ ' option:selected').text(),'{{$project->project_type}}' ); changeButtonText('select_Action','button_text_changer')" name="status" class="form-control"
        autocomplete="off">
        <option></option>
        <option value="{{ $project->status }}">Save Progress</option>

        {{-- Project is in progress --}}
        @if($project->status == 0 || $project->status == 4)
        <option value="1">Request PM Review</option>
        @endif
        {{-- Project needs to be signed off by submitter --}}
        @if($project->status == 1 && auth()->user()->type >= 1)
        <option value="2">Sign Off</option>
        @endif
    </select>
    <button id="button_text_changer" class="btn btn-primary mx-1" type="submit">
        Save Progress
    </button>
    @endif

    @if($project->status ==3 && auth()->user()->type == 2 )
    <select id="select_Action" style='height:40px;margin-top:1%; visibility:hidden' name="status">
        <option value="4">Return for Revision</option>

    </select>
    <button class="btn btn-danger"
        onclick="return confirm('Are you sure you want to return this Approved form?');">Return for Revision</button>
    @endif



    <button onclick="toggleComment()" class="btn btn-info" rows="5" id="toggleCommentsButton" type="button">Show Comments</button>
    <textarea name="comments" id="commentS" style="display:none;" class="form-control" rows="5"
        placeholder="Comments" readonly>{{$project->comments ?? '' }}</textarea>




</div>
<style>
    #show_anchor1,
    #select_Action {
        height: 40px;
        margin-top: 1%;
    }
</style>