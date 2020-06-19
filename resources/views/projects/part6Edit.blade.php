{{--Project Funding--}}
<h3>Project Funding</h3>
<label>
    <input type="checkbox" name="mpo_funds" autocomplete="off" {{ $project->mpo_funds ?? ''== true ? 'checked' : '' }}>
    Requesting MPO Funds (For long range planning, beyond TIP years, funding category may not be identified, MPO will
    make final recommendation)
</label><br>
<label>
    <input type="number" name="yoe_cost" id="yoe_check" autocomplete="off" value="{{ $project->yoe_cost ?? ''}}" readonly>
    YOE Cost
</label><br>
<div class="card">
    <div class="card-header">
        <div class="form-row">
            <div class="col-sm-2">
                Funding Category
            </div>
            <div class="col-sm-2">
                Federal Share Usually 80%
            </div>
            <div class="col-sm-2">
                State Share
            </div>
            <div class="col-sm-2">
                Local Share Usually 20%
            </div>
            <div class="col-sm-2">
                Local Contribution
                Beyond Local Share
            </div>
            <div class="col-sm-2">
                Total Share
            </div>
        </div>
    </div>
    <div class="card-body">
        <div id="project_funding">
            <div class="form-row mb-1">
                <table id="projectFundingTablePg1">
                    @foreach(explode(',', $project->funding_category ?? '') as $index => $categories)
                    <tr id='pfrow' class="pftpg1">
                        <td><input type="text" name="funding_category[]" class="form-control"
                                value="{{ explode(',', $project->funding_category ?? '')[$index] }}"></td>
                        <td><input onchange="project_funding_table()" id="federal" type="number"
                                name="funding_federal[]" class="form-control"
                                value="{{ explode(',', $project->funding_federal ?? '')[$index] }}"></td>
                        <td><input onchange="project_funding_table()" id="state" type="number" name="funding_state[]"
                                class="form-control" value="{{ explode(',', $project->funding_state ?? '')[$index] }}"></td>
                        <td><input onchange="project_funding_table()" id="local" type="number" name="funding_local[]"
                                class="form-control" value="{{ explode(',', $project->funding_local ?? '')[$index] }}"></td>
                        <td><input onchange="project_funding_table()" id="local_cont" type="number"
                                name="funding_local_beyond[]" class="form-control"
                                value="{{ explode(',', $project->funding_local_beyond ?? '')[$index] }}"></td>
                        <td><input type="number" name="funding_total" id="pftpg1_tot0" class="form-control" readonly>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div id="" class="form-row mb-1">
            <div class="col-sm-2">
                Total Funding By Share
            </div>
            <div class="col-sm-2">
                <input type="number" name="funding_federal_result" id="federal_total" class="form-control"
                    value="{{ $project->funding_federal_result ?? '' }}" readonly>
            </div>
            <div class="col-sm-2">
                <input type="number" name="funding_state_result" id="state_total" class="form-control"
                    value="{{ $project->funding_state_result ?? ''}}" readonly>
            </div>
            <div class="col-sm-2">
                <input type="number" name="funding_local_result" id="local_total" class="form-control"
                    value="{{ $project->funding_local_result ?? '' }}" readonly>
            </div>
            <div class="col-sm-2">
                <input type="number" name="funding_local_beyond_result" id="local_beyond_total" class="form-control"
                    value="{{ $project->funding_local_beyond_result ?? ''}}" readonly>
            </div>
            <div class="col-sm-2">
                <input type="number" name="funding_total_result" id="total_total" class="form-control"
                    value="{{ $project->funding_total_result ?? '' }}" readonly>
            </div>
        </div>
        <a onclick="addRow()" id="addFundBtn" class="btn btn-primary" title="Add a new row." role="button">Add Funding</a>
        <a onclick= "deleteRow()"class="btn btn-primary"  id="removeFundBtn" title="Delete the last row." role="button">Remove Funding</a>
    </div>
</div>
<br>