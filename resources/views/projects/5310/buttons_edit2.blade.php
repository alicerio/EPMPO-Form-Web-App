<div class="row">
    <div class="col">
        <a class="btn btn-primary btn-block" href="{{route('project.excel')}}" role="button">Export to Excel</a>
    </div>
    <div class="col">
        <a class="btn btn-primary btn-block" onclick="print()" role="button">Export to PDF</a>
    </div>
    <div class="col">
        <select name="status" class="form-control" autocomplete="off">
            <option value="{{ $bProject->status }}" selected>Save Progress</option>
            {{-- Project is in progress --}}
            @if($bProject->status == 0 || $project->status == 4)
            <option value="1">Request PM Review</option>
            @endif
            {{-- Project needs to be signed off by submitter --}}
            @if($bProject->status == 1 && auth()->user()->type >= 1)
            <option value="2">Sign Off</option>
            @endif
            @if(($bProject->status == 2 || $project->status == 3) && auth()->user()->type == 2)
            <option value="3">Approve</option>
            <option value="4">Decline</option>
            @endif
        </select>
    </div>
    <div class="col">
        @auth
        @if (auth()->user()->type == 1)
        <button class="btn btn-primary mt-1 btn-block" type="sumbit">
            Submit
        </button>
        @else
        <button class="btn btn-primary mt-1 btn-block" type="sumbit">
            Save
        </button>
        @endif
        @endauth
    </div>
</div>