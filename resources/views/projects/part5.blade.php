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
            <div class="col" id = "YOE_sectionHolder">
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
                                <input id="yoe_cs_tot" type="text" name="subtotal_amount"
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
                                    <input onchange="yoe_table();addMoneySign(this.value, this.id)" id="yoe_cs_1" type="text"
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
                                    <input onchange="yoe_table();addMoneySign(this.value, this.id)" id="yoe_cs_2" type="text" name="construction_amount"
                                        class="form-control" value="{{ $project->construction_amount  ?? ''}}" disabled>
                                </div>
                            </div>
                            {{--CE--}}
                            <div class="form-row mb-1">
                                <div class="col-sm-6">
                                    Construction Engineering (CE)
                                </div>
                                <div class="col-sm-6">
                                    <input onchange="yoe_table();addMoneySign(this.value, this.id)" id="yoe_cs_3" type="text" name="ce_amount"
                                        class="form-control" value="{{ $project->ce_amount  ?? '' }}" disabled>
                                </div>
                            </div>
                            {{--Contingencies--}}
                            <div class="form-row mb-1">
                                <div class="col-sm-6">
                                    Contingencies
                                </div>
                                <div class="col-sm-6">
                                    <input onchange="yoe_table();addMoneySign(this.value, this.id)" id="yoe_cs_4" type="text"
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
                                    <input onchange="yoe_table();addMoneySign(this.value, this.id)" id="yoe_cs_5" type="text" name="change_order_amount"
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
                                    <input onchange="yoe_table();addMoneySign(this.value, this.id)" type="text" id = "PE_amount" name="PE_amount" class="form-control"
                                        value="{{ $project->change_order_amount  ?? ''}}" disabled>
                                </div>
                            </div>
                            {{--Indirects--}}
                            <div class="form-row mb-1">
                                <div class="col-sm-6">
                                    Indirects
                                </div>
                                <div class="col-sm-6">
                                    <input onchange="yoe_table();addMoneySign(this.value, this.id)" id = "indirects_amount"  type="text" name="indirects_amount"
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
                                    <input onchange="yoe_table();addMoneySign(this.value, this.id)" type="text" id = "ROW_amount" name="ROW_amount" class="form-control"
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
                                    <input onchange="yoe_table();addMoneySign(this.value, this.id)"  id = "transfer_amount" type="text" name="transfer_amount"
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
                                <input id="tot_yoe" type="text" name="total_amount" title="Sumation of all fields."
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
                    {{$temp = $project->costs_1 ?? ''}}
                    <option></option>
                    <option value="1" {{ $temp == 1 ? 'selected' : ''  }}>Yes</option>
                    <option value="2" {{ $temp == 2 ? 'selected' : ''  }}>No</option>
                </select>
            </div>
            <div class="col">
                Is the sponsor paying for 100% of PE? <i class="fa fa-asterisk"
                style="font-size:10px;color:red"></i>
            </div>
        </div>

        <div class="form-row mb-1">
            <div class="col-sm-1">
                <select disabled name="costs_2" class="form-control">
                    {{$temp = $project->costs_2 ?? ''}}
                    <option></option>
                    <option value="1" {{ $temp == 1 ? 'selected' : ''  }}>Yes</option>
                    <option value="2" {{ $temp == 2 ? 'selected' : ''  }}>No</option>
                </select>
            </div>
            <div class="col">
                Is this sponsor paying for 100% of the ROW and utility relocation?<i class="fa fa-asterisk"
                style="font-size:10px;color:red"></i>
            </div>
        </div>

        <div class="form-row mb-1">
            <div class="col-sm-1">
                <select disabled name="costs_3" class="form-control">
                    {{$temp = $project->costs_3 ?? ''}}
                    <option></option>
                    <option value="1" {{ $temp == 1 ? 'selected' : ''  }}>Yes</option>
                    <option value="2" {{ $temp == 2 ? 'selected' : ''  }}>No</option>
                </select>
            </div>
            <div class="col">
                Is this decision making/governing body committed to the local/state share (match)? <i class="fa fa-asterisk"
                style="font-size:10px;color:red"></i>
                <br>
                Attach documentation. Eg. Resolution, Financial Plan, etc. 
            </div>
        </div>

        <div class="form-row mb-1">
            <div class="col-sm-2">
                <select disabled name="costs_4" class="form-control">
                    {{$temp = $project->costs_4 ?? ''}}
                    <option></option>
                    <option value="1" {{ $temp == 1 ? 'selected' : '' }}>0%</option>
                    <option value="2" {{ $temp == 2 ? 'selected' : '' }}>≥1% &lt10%</option>
                    <option value="3" {{ $temp == 3 ? 'selected' : '' }}>≥10% &lt20%</option>
                    <option value="4" {{ $temp == 4 ? 'selected' : '' }}>≥20% &lt30%</option>
                    <option value="5" {{ $temp == 5 ? 'selected' : '' }}>≥30% &lt40%</option>
                    <option value="6" {{ $temp == 6 ? 'selected' : '' }}>≥40%</option>
                </select>
            </div>
            <div class="col">
                Sponsor's investment to construction cost. (Excluding required local/state share)<i class="fa fa-asterisk"
                style="font-size:10px;color:red"></i>
            </div>
        </div>


    </div>
</div>