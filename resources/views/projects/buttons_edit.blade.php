<div class="row col-12">
    @include('projects.buttons_shared')

    <select id="select_Action" style="height:40px;margin-top:1%" class="mx-1"
        onchange="changeButtonText('select_Action','button_text_changer')" name="status" class="form-control"
        autocomplete="off">
        <option value="{{ $project->status }}" selected>Save Progress</option>
        {{-- Project is in progress --}}
        @if($project->status == 0 || $project->status == 4)
        <option value="1">Request PM Review</option>
        @endif
        {{-- Project needs to be signed off by submitter --}}
        @if($project->status == 1 && auth()->user()->type >= 1)
        <option value="2">Sign Off</option>
        @endif
    </select>

    <button id="button_text_changer" class="btn btn-primary mx-1" type="sumbit">
        Save Progress
    </button>


</div>

</div>