<div class="card">
    <div class="card-body">
        {{--Project Phases and Cost--}}
        <div class="form-row mb-1">
            <div class="col">
                <h3>Project Phase(s)</h3>
                <p>**Only checked phase(s) will be consider for funding (Year of Expenditure (YOE)
                    Cost). If a phase has been or will be completed with local funds or resources,
                    please do not check. Please enter cost information for each Phase checked.</p>
                <label>
                    <input disabled type="checkbox" name="fta_transfer" autocomplete="off"
                        {{ $project->fta_transfer ?? ''== true ? 'checked' : '' }}>
                    FTA Transfer Requested
                </label><br>
                <label>
                    <input disabled type="checkbox" name="c" autocomplete="off"
                        {{ $project->c  ?? '' == true ? 'checked' : '' }}>
                    C
                </label><br>
                <label>
                    <input disabled type="checkbox" name="nonc" autocomplete="off"
                        {{ $project->nonc  ?? '' == true ? 'checked' : '' }}>
                    Non-C
                </label><br>
                <label>
                    <input disabled type="checkbox" name="pe" autocomplete="off"
                        {{ $project->pe  ?? '' == true ? 'checked' : '' }}>
                    PE
                </label><br>
                <label>
                    <input disabled type="checkbox" name="env" autocomplete="off"
                        {{ $project->env  ?? '' == true ? 'checked' : '' }}>
                    E:Env
                </label><br>
                <label>
                    <input disabled type="checkbox" name="eng" autocomplete="off"
                        {{ $project->eng  ?? '' == true ? 'checked' : '' }}>
                    E:Eng
                </label><br>
                <label>
                    <input disabled type="checkbox" name="r" autocomplete="off"
                        {{ $project->r  ?? '' == true ? 'checked' : '' }}>
                    R
                </label><br>
                <label>
                    <input disabled type="checkbox" name="acq" autocomplete="off"
                        {{ $project->acq  ?? '' == true ? 'checked' : '' }}>
                    R:Acq
                </label><br>
                <label>
                    <input disabled type="checkbox" name="utl" autocomplete="off"
                        {{ $project->utl  ?? '' == true ? 'checked' : '' }}>
                    R:Utl
                </label><br>
            </div>
            <div class="col">
                <h3>YOE and Total Project Cost Information</h3>
                <p>**All Costs should account for inflation within TIP years.
                    Beyond TIP years inflation will be applied.
                    <br>
                    **For Total Project Cost include all cost, whether it is a phase of the project
                    or
                    not.
                </p>
                <div class="card">
                    <div class="card-header">
                        <div class="form-row">
                            <div class="col-sm-6">
                                Category
                            </div>
                            <div class="col-sm-6">
                                Amount
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        {{--Construction Subtotal--}}
                        <div class="form-row mb-1">
                            <div class="col-sm-6">
                                Construction Subtotal
                            </div>
                            <div class="col-sm-6">
                                <input id="yoe_cs_tot" type="number" name="subtotal_amount"
                                    title="Sumation of first five(5) categories." class="form-control"
                                    value="{{ $project->subtotal_amount  ?? '' }}" disabled>
                            </div>
                        </div>
                        <div id="Yoe_cost">
                            {{--Non-Construction--}}
                            <div class="form-row mb-1">
                                <div class="col-sm-6">
                                    Non-Construction Project
                                </div>
                                <div class="col-sm-6">
                                    <input onchange="yoe_table()" id="yoe_cs_1" type="number"
                                        name="non_construction_amount" class="form-control"
                                        value="{{ $project->non_construction_amount  ?? '' }}" disabled>
                                </div>
                            </div>
                            {{--Construction--}}
                            <div class="form-row mb-1">
                                <div class="col-sm-6">
                                    Construction
                                </div>
                                <div class="col-sm-6">
                                    <input onchange="yoe_table()" id="yoe_cs_2" type="number" name="construction_amount"
                                        class="form-control" value="{{ $project->construction_amount  ?? ''}}" disabled>
                                </div>
                            </div>
                            {{--CE--}}
                            <div class="form-row mb-1">
                                <div class="col-sm-6">
                                    Construction Engineering (CE)
                                </div>
                                <div class="col-sm-6">
                                    <input onchange="yoe_table()" id="yoe_cs_3" type="number" name="ce_amount"
                                        class="form-control" value="{{ $project->ce_amount  ?? '' }}" disabled>
                                </div>
                            </div>
                            {{--Contingencies--}}
                            <div class="form-row mb-1">
                                <div class="col-sm-6">
                                    Contingencies
                                </div>
                                <div class="col-sm-6">
                                    <input onchange="yoe_table()" id="yoe_cs_4" type="number"
                                        name="contingencies_amount" class="form-control"
                                        value="{{ $project->contingencies_amount  ?? ''}}" disabled>
                                </div>
                            </div>
                            {{--Change Order--}}
                            <div class="form-row mb-1">
                                <div class="col-sm-6">
                                    Potential Change Order
                                </div>
                                <div class="col-sm-6">
                                    <input onchange="yoe_table()" id="yoe_cs_5" type="number" name="change_order_amount"
                                        class="form-control" value="{{ $project->change_order_amount  ?? ''}}" disabled>
                                </div>
                            </div>
                            {{--PE--}}
                            <div class="form-row mb-1">
                                <div class="col-sm-6">
                                    Preliminary Engineering
                                    <br>
                                    (Check mark PE phase to enable, if applicable)
                                </div>
                                <div class="col-sm-6">
                                    <input onchange="yoe_table()" type="number" name="PE_amount" class="form-control"
                                        value="{{ $project->change_order_amount  ?? ''}}" disabled>
                                </div>
                            </div>
                            {{--Indirects--}}
                            <div class="form-row mb-1">
                                <div class="col-sm-6">
                                    Indirects
                                </div>
                                <div class="col-sm-6">
                                    <input onchange="yoe_table()" type="number" name="indirects_amount"
                                        class="form-control" value="{{ $project->indirects_amount  ?? '' }}" disabled>
                                </div>
                            </div>
                            {{--ROW--}}
                            <div class="form-row mb-1">
                                <div class="col-sm-6">
                                    Right-Of-Way
                                    <br>
                                    (Acq+Utl; Check mark R phase to enable, if applicable)
                                </div>
                                <div class="col-sm-6">
                                    <input onchange="yoe_table()" type="number" name="ROW_amount" class="form-control"
                                        value="{{ $project->ROW_amount  ?? ''}}" disabled>
                                </div>
                            </div>
                            {{--Transfer--}}
                            <div class="form-row mb-1">
                                <div class="col-sm-6">
                                    FTA Transfer
                                    <br>
                                    (Check mark T to enable, if applicable)
                                </div>
                                <div class="col-sm-6">
                                    <input onchange="yoe_table()" type="number" name="transfer_amount"
                                        class="form-control" value="{{ $project->transfer_amount  ?? '' }}" disabled>
                                </div>
                            </div>
                        </div>


                        {{-------------------------------------------------------------------------------}
                                        {{--Total Cost--}}
                        <div class="form-row mb-1">
                            <div class="col-sm-6">
                                Total Project Cost
                            </div>
                            <div class="col-sm-6">
                                <input id="tot_yoe" type="number" name="total_amount" title="Sumation of all fields."
                                    class="form-control" value="{{ $project->total_amount  ?? '' }}" disabled>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        {{--Cost Selections--}}
        <div class="form-row mb-1">
            <div class="col-sm-1">
                <select disabled name="costs_1" class="form-control">
                    <option></option>
                    <option value="1" {{ $project->costs_1  ?? '' == 1 ? 'selected' : ''  }}>Yes</option>
                    <option value="2" {{ $project->costs_1  ?? '' == 2 ? 'selected' : ''  }}>No</option>
                </select>
            </div>
            <div class="col">
                Is the sponsor paying for 100% of PE?
            </div>
        </div>

        <div class="form-row mb-1">
            <div class="col-sm-1">
                <select disabled name="costs_2" class="form-control">
                    <option></option>
                    <option value="1" {{ $project->costs_2  ?? '' == 1 ? 'selected' : ''  }}>Yes</option>
                    <option value="2" {{ $project->costs_2  ?? '' == 2 ? 'selected' : ''  }}>No</option>
                </select>
            </div>
            <div class="col">
                Is this sponsor paying for 100% of the ROW and utility relocation?
            </div>
        </div>

        <div class="form-row mb-1">
            <div class="col-sm-1">
                <select disabled name="costs_3" class="form-control">
                    <option></option>
                    <option value="1" {{ $project->costs_3  ?? '' == 1 ? 'selected' : ''  }}>Yes</option>
                    <option value="2" {{ $project->costs_3  ?? '' == 2 ? 'selected' : ''  }}>No</option>
                </select>
            </div>
            <div class="col">
                Is this decision making/governing body committed to the local/state share (match)?
                <br>
                Attach documentation. Eg. Resolution, Financial Plan, etc.
            </div>
        </div>

        <div class="form-row mb-1">
            <div class="col-sm-1">
                <select disabled name="costs_4" class="form-control">
                    <option></option>
                    <option value="1" {{ $project->costs_4  ?? '' == 1 ? 'selected' : ''  }}>Yes</option>
                    <option value="2" {{ $project->costs_4  ?? '' == 2 ? 'selected' : ''  }}>No</option>
                </select>
            </div>
            <div class="col">
                Sponsor's investment to construction cost. (Excluding required local/state share)
            </div>
        </div>


    </div>
</div>