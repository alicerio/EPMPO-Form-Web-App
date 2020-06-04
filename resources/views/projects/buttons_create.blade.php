@auth
@if(auth()->user()->type < 3) <div class="form-group">
    <input type="text" name="signature" class="form-control" autocomplete="off">
    </div>
    @else
    <div class="form-group">
        <input type="text" name="signature" class="form-control" autocomplete="off" title="Only a submitter can sign"
            readonly>
    </div>
    @endif
    @endauth
    <p>Save your form before signing, all fields will be locked after signature is provided.</p>
    <br>
    <div class="row mt-1">
        <div class="col">
            <a class="btn btn-primary btn-block" href="{{route('project.excel')}}" role="button">Export to Excel</a>
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