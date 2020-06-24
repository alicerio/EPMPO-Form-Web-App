<div class="row col-12">
    <div class="col-3">
        <a class="btn btn-primary mt-1" href="{{route('project.excel')}}" role="button">Export to Excel</a>
    </div>
    <div class="col-3">
        <a class="btn btn-primary mt-1" onclick="print()" role="button">Export to PDF</a>
    </div>
    <div class="col-3">
        <select name="status" class="mx-1" onchange="changeButtonText('select_Action','button_text_changer')"autocomplete="off">
            <option value="{{ $project->status }}" selected>Save Progress</option>
            {{-- Project is in progress --}}
            @if($project->status == 0 || $project->status == 4)
            <option value="1">Request PM Review</option>
            @endif
            {{-- Project needs to be signed off by submitter --}}
            @if($project->status == 1 && auth()->user()->type >= 1)
            <option value="2">Sign Off</option>
            @endif
            @if(($project->status == 2 || $project->status == 3) && auth()->user()->type == 2)
            <option value="3">Approve</option>
            <option value="4">Decline</option>
            @endif
        </select>
    </div>

    <div class="col-3">
        @auth
        @if (auth()->user()->type == 1)
        <button class="btn btn-primary mt-1" type="sumbit">
            Submit
        </button>
        @else
        <button class="btn btn-primary mt-1" type="sumbit">
            Save
        </button>
        @endif
        @endauth
    </div>

</div>