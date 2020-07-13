{{--Project Funding--}}
<div id="project_funding_section">
    <h3>Project Funding</h3>
    <label>
        <input disabled type="checkbox" name="mpo_funds" autocomplete="off"
            {{ $project->mpo_funds ?? ''== true ? 'checked' : '' }}>
        Requesting MPO Funds (For long range planning, beyond TIP years, funding category may not be identified, MPO
        will
        make final recommendation)
    </label><br>
    <label>
        <input  type="text" onchange="addMoneySign(this.value, this.id)" name="yoe_cost" id="yoe_check" autocomplete="off" value="{{ $project->yoe_cost ?? ''}}"
            readonly>
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
                    <table id="projectFundingTablePg1" onchange="project_funding_table();">
                        @if ($project->funding_federal != null)
                        @foreach($project->funding_federal ?? '' as $index => $categories)
                        <tr id='pfrow' class="pftpg1">
                            <td><input onchange="addMoneySign(this.value, this.id)" type="text" name="funding_category[]" class="form-control"
                                    value="{{$project->funding_category[$index]}}"></td>
                            <td><input id="federal" onchange="addMoneySign(this.value, this.id)" type="text" name="funding_federal[]" class="form-control"
                                    value="{{$project->funding_federal[$index]}}"></td>
                            <td><input id="state"  onchange="addMoneySign(this.value, this.id)" type="text" name="funding_state[]" class="form-control"
                                    value="{{$project->funding_state[$index]}}"></td>
                            <td><input id="local" onchange="addMoneySign(this.value, this.id)" type="text" name="funding_local[]" class="form-control"
                                    value="{{$project->funding_local[$index]}}"></td>
                            <td><input id="local_cont" onchange="addMoneySign(this.value, this.id)" type="text" name="funding_local_beyond[]" class="form-control"
                                    value="{{$project->funding_local_beyond[$index]}}"></td>
                            <td><input onchange="addMoneySign(this.value, this.id)" type="text" name="funding_total[]" id="pftpg1_tot0" class="form-control"
                                    value="{{$project->funding_total[$index]}}" readonly>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </table>
                </div>
            </div>
            <div id="" class="form-row mb-1">
                <div class="col-sm-2">
                    Total Funding By Share
                </div>
                <div class="col-sm-2">
                    <input type="string" name="funding_federal_result" id="federal_total" class="form-control"
                        value="{{ $project->funding_federal_result ?? '' }}" readonly>
                </div>
                <div class="col-sm-2">
                    <input type="string" name="funding_state_result" id="state_total" class="form-control"
                        value="{{ $project->funding_state_result ?? ''}}" readonly>
                </div>
                <div class="col-sm-2">
                    <input type="string" name="funding_local_result" id="local_total" class="form-control"
                        value="{{ $project->funding_local_result ?? '' }}" readonly>
                </div>
                <div class="col-sm-2">
                    <input type="string" name="funding_local_beyond_result" id="local_beyond_total" class="form-control"
                        value="{{ $project->funding_local_beyond_result ?? ''}}" readonly>
                </div>
                <div class="col-sm-2">
                    <input type="string" name="funding_total_result" id="total_total" class="form-control"
                        value="{{ $project->funding_total_result ?? '' }}" readonly>
                </div>
            </div>
            <button onclick="addRow()" id="addFundBtn" class="btn btn-primary" title="Add a new row." type="button">Add
                Funding</button>
            <button onclick="deleteRow()" class="btn btn-primary" id="removeFundBtn" title="Delete the last row."
                type="button">Remove Funding</button>
        </div>
    </div>
</div>
<br>