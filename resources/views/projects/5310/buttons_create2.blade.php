<div class="row mt-1">
    <div class="col">
        <a id="show_anchor2" class="btn btn-primary mx-1" href="{{route('project.excel',$project ?? '')}}" role="button">Export to
            Excel</a>
    </div>
    <div class="col">
        <a class="btn btn-primary btn-block" onclick="print()" role="button">Export to PDF</a>
    </div>
    <div class="col">
        <select name="status" class="form-control" autocomplete="off">
            <option value="0" selected>Save Progress</option>
            <option value="1">Request PM Review</option>
        </select>
    </div>
    <div class="col">
        @auth
            @if (auth()->user()->type == 1)
                <button class="btn btn-primary mt-1 btn-block" type="submit">
                    Submit
                </button>
            @else
                <button class="btn btn-primary mt-1 btn-block" type="submit">
                    Save
                </button>
            @endif
        @endauth
    </div>
</div>