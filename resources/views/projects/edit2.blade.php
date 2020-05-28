@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Electronic Project Request Form (5310 ePRF)
                </div>
                <div class="card-body">
                    <!--UPDATE ROUTE NAME-->
                    <form action="{{route('projects.update',$project2->id)}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <label>
                            MPO ID
                        </label>
                        <input type="text" class="form-control" name="mpo_id" autocomplete="off" value="{{ $project2->mpo_id }}" readonly>
                        <label>
                            CSJ or CN
                        </label>
                        <input type="text" class="form-control" name="csj_cn" autocomplete="off" value="{{ $project2->csj_cn }}" readonly>
                        <label>
                            Project Name
                        </label>
                        <input type="text" class="form-control" name="name" autocomplete="off" value="{{ $project2->name }}">
                        <label>
                            Project Description
                        </label>
                        <input type="text" class="form-control" name="description" autocomplete="off" value="{{ $project2->description }}">
                        <label>
                            Limit From
                        </label>
                        <input type="text" class="form-control" name="limit_from" autocomplete="off" value="{{ $project2->limit_from }}">
                        <label>
                            Limit To
                        </label>
                        <input type="text" class="form-control" name="limit_to" autocomplete="off" value="{{ $project2->limit_to }}">
                        <label>
                            Need and Purpose:
                        </label>
                        <textarea name="need_purpose" class="form-control" {{ $project2->need_purpose }}></textarea>
                        <label>
                            Agency Comments:
                        </label>
                        <textarea name="agency_comments" class="form-control" {{ $project2->agency_comments }}></textarea>
                        <hr>
                        <label>
                            <input type="checkbox" name="transit_funds_request" autocomplete="off" {{ $project2->transit_funds_request == true ? 'checked' : '' }}>
                            Requesting Transit funds for his project/program (FTA, State and/or Local Funds)
                        </label>
                        <br>

                        <div class="form-row">
                            <div class="col">
                                <label class="font-weight-bold">
                                    Federal Fiscal Year(FY):
                                </label>
                                <input type="number" name="fiscal_year" class="form-control" autocomplete="off" value="{{ $project2->fiscal_year }}">
                            </div>
                            <div class="col">
                                <label>
                                    Network Year
                                </label>
                                <select name="network_year" class="form-control">
                                    <option>----</option>
                                    <option value="2020" {{ $project2->network_year == 2020 ? 'selected' : ''}}>2020</option>
                                    <option value="2030" {{ $project2->network_year == 2030 ? 'selected' : ''}}>2030</option>
                                    <option value="2040" {{ $project2->network_year == 2040 ? 'selected' : ''}}>2040</option>
                                    <option value="2045" {{ $project2->network_year == 2045 ? 'selected' : ''}}>2045</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        {{--Project Selection Process--}}
                        <h3>Project Selection Process</h3>

                        <div class="form-row mb-1">
                            <div class="col-sm-1">
                                <select name="psp_1" class="form-control">
                                    <option selected>----</option>
                                    <option value="1" {{ $project2->psp_1 == 1 ? 'selected' : '' }}>Yes</option>
                                    <option value="2" {{ $project2->psp_1 == 2 ? 'selected' : '' }}>No</option>
                                </select>
                            </div>
                            <div class="col">
                                Will this project achieve goals as identified in the Regional Transportation Plan?
                                If yes, please provide attachment with supporting information:
                            </div>
                        </div>

                        <div class="form-row mb-1">
                            <div class="col-sm-1">
                                <select name="psp_2" class="form-control">
                                    <option selected>----</option>
                                    <option value="1" {{ $project2->psp_2 == 1 ? 'selected' : '' }}>Yes</option>
                                    <option value="2" {{ $project2->psp_2 == 2 ? 'selected' : '' }}>No</option>
                                </select>
                            </div>
                            <div class="col">
                                Is this project from an updated comprehensive plan, thoroughfare plan, feasibility or corridor study? 
                                If yes, please provide link or attachment: How does this project address congestion, mobility, accessibility, and reliability of NHS?
                            </div>
                        </div>

                        <div class="form-row mb-1">
                            <div class="col-sm-1">
                                <select name="psp_3" class="form-control">
                                    <option selected>----</option>
                                    <option value="1" {{ $project2->psp_3 == 1 ? 'selected' : '' }}>Yes</option>
                                    <option value="2" {{ $project2->psp_3 == 2 ? 'selected' : '' }}>No</option>
                                </select>
                            </div>
                            <div class="col">
                                Is this project part of TPB resolution for a Comprehensive Mobility Plan (CMP)?
                            </div>            
                        </div>

                        <div class="form-row mb-1">
                            <div class="col-sm-1">
                                <select name="psp_4" class="form-control">
                                    <option selected>----</option>
                                    <option value="1" {{ $project2->psp_4 == 1 ? 'selected' : '' }}>Yes</option>
                                    <option value="2" {{ $project2->psp_4 == 2 ? 'selected' : '' }}>No</option>
                                </select>
                            </div>
                            <div class="col">
                                Is this decision making/governing body committed to the local/state share (match)? 
                                Attach documentation. E.g. Resolution, Financial Plan, etc.
                            </div>            
                        </div>

                        <div class="form-row mb-1">
                            <div class="col-sm-1">
                                <select name="psp_5" class="form-control">
                                    <option selected>----</option>
                                    <option value="1" {{ $project2->psp_5 == 1 ? 'selected' : '' }}>Yes</option>
                                    <option value="2" {{ $project2->psp_5 == 2 ? 'selected' : '' }}>No</option>
                                </select>
                            </div>
                            <div class="col">
                                Sponsor's investment to construction cost. (Excluding required local/state share)
                            </div>            
                        </div>
                        <br>

                        {{--Goals and Strategies--}}

                        <div class="form-row mb-1 justify-content-center">
                            <div class="col">
                                <h3><a href="https://www.fhwa.dot.gov/tpm/about/goals.cfm" target="_blank">National Goals</a></h3>
                                <label>
                                    <input type="checkbox" name="goal_1" onclick="toggleTA(this.name);" autocomplete="off" {{ $project2->goal_1 == true ? 'checked' : '' }}>
                                    Safety
                                </label><br>
                                <textarea name="description_goal_1" class="form-control" style="width: 22rem; {{ $project2->goal_1 == true ? '' : 'display: none;' }}" placeholder="How does this project meet this goal?">{{ $project2->description_goal_1 }}</textarea>
                                <label>
                                    <input type="checkbox" name="goal_2" onclick="toggleTA(this.name);" autocomplete="off" {{ $project2->goal_2 == true ? 'checked' : '' }}>
                                    Infrastructure Condition 
                                </label><br>
                                <textarea name="description_goal_2" class="form-control" style="width: 22rem;{{ $project2->goal_2 == true ? '' : 'display: none;' }}" placeholder="How does this project meet this goal?">{{ $project2->description_goal_2 }}</textarea>
                                <label>
                                    <input type="checkbox" name="goal_3" onclick="toggleTA(this.name);" autocomplete="off" {{ $project2->goal_3 == true ? 'checked' : '' }}>
                                    Congestion Reduction
                                </label><br>
                                <textarea name="description_goal_3" class="form-control" style="width: 22rem;{{ $project2->goal_3 == true ? '' : 'display: none;' }}" placeholder="How does this project meet this goal?">{{ $project2->description_goal_3 }}</textarea>
                                <label>
                                    <input type="checkbox" name="goal_4" onclick="toggleTA(this.name);" autocomplete="off" {{ $project2->goal_4 == true ? 'checked' : '' }}>
                                    System Reliability
                                </label><br>
                                <textarea name="description_goal_4" class="form-control" style="width: 22rem;{{ $project2->goal_4 == true ? '' : 'display: none;' }}" placeholder="How does this project meet this goal?">{{ $project2->description_goal_4 }}</textarea>
                                <label>
                                    <input type="checkbox" name="goal_5" onclick="toggleTA(this.name);" autocomplete="off" {{ $project2->goal_5 == true ? 'checked' : '' }}>
                                    Freight Movement and Economic Vitality
                                </label><br>
                                <textarea name="description_goal_5" class="form-control" style="width: 22rem;{{ $project2->goal_5 == true ? '' : 'display: none;' }}" placeholder="How does this project meet this goal?">{{ $project2->description_goal_5 }}</textarea>
                                <label>
                                    <input type="checkbox" name="goal_6" onclick="toggleTA(this.name);" autocomplete="off" {{ $project2->goal_6 == true ? 'checked' : '' }}>
                                    Environmental Sustainability
                                </label><br>
                                <textarea name="description_goal_6" class="form-control" style="width: 22rem;{{ $project2->goal_6 == true ? '' : 'display: none;' }}" placeholder="How does this project meet this goal?">{{ $project2->description_goal_6 }}</textarea>
                            </div>
                            <div class="col">
                                <h3><a href="http://www.elpasompo.org/civicax/filebank/blobdload.aspx?BlobID=23375" target="_blank">Congestion Management Project Strategies</a></h3>
                                <label>
                                    <input type="checkbox" name="strategy_1" onclick="toggleTA(this.name);" autocomplete="off" {{ $project2->strategy_1 == true ? 'checked' : '' }}>
                                    Travel Demand Management Strategies
                                </label><br>
                                <textarea name="description_strategy_1" class="form-control" style="width: 22rem;{{ $project2->strategy_1 == true ? '' : 'display: none;' }}" placeholder="How does this project meet this strategy?">{{ $project2->description_strategy_1 }}</textarea>
                                <label>
                                    <input type="checkbox" name="strategy_2" onclick="toggleTA(this.name);" autocomplete="off" {{ $project2->strategy_2 == true ? 'checked' : '' }}>
                                    Traffic Operations Strategies
                                </label><br>
                                <textarea name="description_strategy_2" class="form-control" style="width: 22rem;{{ $project2->strategy_2 == true ? '' : 'display: none;' }}" placeholder="How does this project meet this strategy?">{{ $project2->description_strategy_2 }}</textarea>
                                <label>
                                    <input type="checkbox" name="strategy_3" onclick="toggleTA(this.name);" autocomplete="off" {{ $project2->strategy_3 == true ? 'checked' : '' }}>
                                    Public Transportation Strategies
                                </label><br>
                                <textarea name="description_strategy_3" class="form-control" style="width: 22rem;{{ $project2->strategy_3 == true ? '' : 'display: none;' }}" placeholder="How does this project meet this strategy?">{{ $project2->description_strategy_3 }}</textarea>
                                <label>
                                    <input type="checkbox" name="strategy_4" onclick="toggleTA(this.name);" autocomplete="off" {{ $project2->strategy_4 == true ? 'checked' : '' }}>
                                    Road Capacity Strategies
                                </label><br>
                                <textarea name="description_strategy_4" class="form-control" style="width: 22rem;{{ $project2->strategy_4 == true ? '' : 'display: none;' }}" placeholder="How does this project meet this strategy?">{{ $project2->description_strategy_4 }}</textarea>
                                <label>
                                    <input type="checkbox" name="strategy_5" onclick="toggleTA(this.name);" autocomplete="off" {{ $project2->strategy_5 == true ? 'checked' : '' }}>
                                    Non-CMP Strategies
                                </label><br>
                                <textarea name="description_strategy_5" class="form-control" style="width: 22rem;{{ $project2->strategy_5 == true ? '' : 'display: none;' }}" placeholder="How does this project meet this strategy?">{{ $project2->description_strategy_5 }}</textarea>
                            </div>
                        </div>

                        Projects will be examined at the corridor level to determine multimodal needs. Which best describes this projects. <a href="http://www.elpasompo.org/civicax/filebank/blobdload.aspx?BlobID=23409" target="_blank">Block System:</a><br>
                        <label><input type="radio" name="block_system" value="1" {{ $project2->block_system == 1 ? 'checked' : '' }}> Within Community</label autocomplete="off">
                        <label><input type="radio" name="block_system" value="2" {{ $project2->block_system == 2 ? 'checked' : '' }}> Community to community</label autocomplete="off">
                        <label><input type="radio" name="block_system" value="3" {{ $project2->block_system == 3 ? 'checked' : '' }}> Community to region</label autocomplete="off">
                        <label><input type="radio" name="block_system" value="4" {{ $project2->block_system == 4 ? 'checked' : '' }}> Region to region</label autocomplete="off">
                        <hr>

                        Have the above dates been reviewed by TXDOT or NMDOT?
                        <label><input type="radio" name="reviewed_dates" value="1" {{ $project2->reviewed_dates == 1 ? 'checked' : '' }}> Yes</label autocomplete="off">
                        <label><input type="radio" name="reviewed_dates" value="2" {{ $project2->reviewed_dates == 2 ? 'checked' : '' }}> No</label autocomplete="off">
                        <label><input type="radio" name="reviewed_dates" value="3" {{ $project2->reviewed_dates == 3 ? 'checked' : '' }}> N/A</label autocomplete="off">
                        <br>

                        {{--Project Phases and Transit only--}}
                        <div class="form-row mb-1">
                            <div class="col">
                                <h3>Project Phase(s)</h3>
                                <p>**Only checked phase(s) will be consider for funding (Year of Expenditure (YOE)
                                    Cost). If a phase has been or will be completed with local funds or resources,
                                    please do not check. Please enter cost information for each Phase checked.</p>
                                <label>
                                    <input type="checkbox" name="capital" autocomplete="off" {{ $project2->capital == true ? 'checked' : '' }}>
                                    Capital
                                </label><br>
                                <label>
                                    <input type="checkbox" name="operations" autocomplete="off" {{ $project2->operations == true ? 'checked' : '' }}>
                                    Operations
                                </label><br>
                                <label>
                                    <input type="checkbox" name="c" autocomplete="off" {{ $project2->c == true ? 'checked' : '' }}>
                                    C
                                </label><br>
                                <label>
                                    <input type="checkbox" name="nonc" autocomplete="off" {{ $project2->nonc == true ? 'checked' : '' }}>
                                    Non-C
                                </label><br>
                                <label>
                                    <input type="checkbox" name="pe" autocomplete="off" {{ $project2->pe == true ? 'checked' : '' }}>
                                    PE
                                <label>
                                    <input type="checkbox" name="env" autocomplete="off" {{ $project2->env == true ? 'checked' : '' }}>
                                    E:Env
                                </label><br>
                                <label>
                                    <input type="checkbox" name="eng" autocomplete="off" {{ $project2->eng == true ? 'checked' : '' }}>
                                    E:Eng
                                </label><br>
                                <label>
                                    <input type="checkbox" name="r" autocomplete="off" {{ $project2->r == true ? 'checked' : '' }}>
                                    R
                                </label><br>
                                <label>
                                    <input type="checkbox" name="acq" autocomplete="off" {{ $project2->acq == true ? 'checked' : '' }}>
                                    R:Acq
                                </label><br>
                                <label>
                                    <input type="checkbox" name="utl" autocomplete="off" {{ $project2->utl == true ? 'checked' : '' }}>
                                    R:Utl
                                </label><br>
                            </div>
                            <div class="col">
                                <div class="card" style="width: 22rem;">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">**Transit Only</h5>

                                        <label>Apportionment Year</label>
                                        <input type="text" name="appointment_year" class="form-control" autocomplete="off" value="{{ $project2->appointment_year }}">
                                        <label>TDC Award Amount</label>
                                        <input type="text" name="tdc_award_amount" class="form-control" autocomplete="off" value="{{ $project2->tdc_award_amount }}">
                                        <label>TDC Award Date</label>
                                        <input type="text" name="tdw_award_date" class="form-control" autocomplete="off" value="{{ $project2->tdw_award_date }}">
                                        <label>TDC Amount Requested</label>
                                        <input type="text" name="tdc_amount_requested" class="form-control" autocomplete="off" value="{{ $project2->tdc_amount_requested }}"><br>

                                        <h4>Project Type:</h4>

                                        <label>
                                            <input type="checkbox" name="type_capital" autocomplete="off" {{ $project2->type_capital == true ? 'checked' : '' }}>
                                            Capital
                                        </label><br>
                                        <label>
                                            <input type="checkbox" name="type_operating" autocomplete="off" {{ $project2->type_operating == true ? 'checked' : '' }}>
                                            Operating
                                        </label><br>
                                        <label>
                                            <input type="checkbox" name="type_planning" autocomplete="off" {{ $project2->type_planning == true ? 'checked' : '' }}>
                                            Planning
                                        </label><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--Project Funding--}}
                        <h3>Project Funding</h3>
                        <label>
                            <input type="checkbox" name="mpo_funds" autocomplete="off" {{ $project2->mpo_funds == true ? 'checked' : '' }}>
                            Requesting MPO Funds
                        </label><br>
                        <label>
                            <input type="number" name="yoe_cost_vehicles" id = "yoe_check_vehicles" autocomplete="off" value="{{ $project2->yoe_cost_vehicles }}" readonly>
                            YOE Cost
                        </label><br>
                        <div class="card">
                            <div class="card-header">
                                <div class="form-row">
                                    <div class="col-sm-2">
                                        Capital(Refurnishing of Vehicles & Soft.)
                                    </div>
                                    <div class="col-sm-2">
                                        Federal Share Usually 80%
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
                                    <div class="col-sm-2">
                                        TDC Amount Requested
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id = "funding_vehicles">
                                    <div class="form-row mb-1">
                                        <div class="col-sm-2">
                                            <input type="text" name="funding_category_vehicles" class="form-control" value="{{ $project2->funding_category_vehicles }}">
                                        </div>
                                        <div class="col-sm-2">
                                            <input onchange="funding_vehicles_table()" id="federal_vehicles" type="number" name="funding_federal_vehicles" class="form-control" value="{{ $project2->funding_federal_vehicles }}">
                                        </div>
                                        <div class="col-sm-2">
                                            <input onchange="funding_vehicles_table()" id = "local_vehicles" type="number" name="funding_local_vehicles" class="form-control" value="{{ $project2->funding_local_vehicles }}">
                                        </div>
                                        <div class="col-sm-2">
                                            <input onchange="funding_vehicles_table()" id = "local_beyond_vehicles" type="number" name="funding_local_beyond_vehicles" class="form-control" value="{{ $project2->funding_local_beyond_vehicles }}">
                                        </div>
                                        <div class="col-sm-2">
                                            <input id = "total_vehicles" type="number" name="funding_total_vehicles" class="form-control" value="{{ $project2->funding_total_vehicles }}" readonly>
                                        </div>
                                        <div class="col-sm-2">
                                            <input onchange="funding_vehicles_table()" id = "tdc_vehicles" type="number" name="funding_tdc_vehicles" class="form-control" value="{{ $project2->funding_tdc_vehicles }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row mb-1">
                                    <div class="col-sm-2">
                                        Total Funding By Share
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="number" name="funding_federal_vehicles_total" id = "federal_vehicles_total" class="form-control" value="{{ $project2->funding_federal_vehicles_total }}" readonly>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="number" name="funding_local_vehicles_total" id = "local_vehicles_total" class="form-control" value="{{ $project2->funding_local_vehicles_total }}" readonly>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="number" name="funding_local_beyond_vehicles_total" id = "local_beyond_vehicles_total" class="form-control" value="{{ $project2->funding_local_beyond_vehicles_total }}" readonly>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="number" name="funding_total_vehicles_total" id = "total_vehicles_total" class="form-control" value="{{ $project2->funding_total_vehicles_total }}" readonly>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="number" name="funding_tdc_vehicles_total" id = "tdc_vehicles_total" class="form-control" value="{{ $project2->funding_tdc_vehicles_total }}" readonly>
                                    </div>
                                </div>
                                <a class="btn btn-primary" role="button">Add Funding</a>
                                <a class="btn btn-primary" role="button">Remove Funding</a>
                            </div>
                        </div>
                        <br>
                        <label>
                            <input type="number" id="yoe_check_bus" name="yoe_cost_bus" autocomplete="off" value="{{ $project2->yoe_cost_bus }}" readonly>
                            YOE Cost
                        </label><br>
                        <div class="card">
                            <div class="card-header">
                                <div class="form-row">
                                    <div class="col-sm-2">
                                        Capital(New Bus Purchase)
                                    </div>
                                    <div class="col-sm-2">
                                        Federal Share Usually 85%
                                    </div>
                                    <div class="col-sm-2">
                                        Local Share Usually 15%
                                    </div>
                                    <div class="col-sm-2">
                                        Local Contribution
                                        Beyond Local Share
                                    </div>
                                    <div class="col-sm-2">
                                        Total Share
                                    </div>
                                    <div class="col-sm-2">
                                        TDC Amount Requested
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id = "funding_bus">
                                    <div class="form-row mb-1">
                                        <div class="col-sm-2">
                                            <input type="text" name="funding_category_bus" class="form-control" value="{{ $project2->funding_category_bus }}">
                                        </div>
                                        <div class="col-sm-2">
                                            <input onchange="funding_bus_table()" id = "federal_bus" type="number" name="funding_federal_bus" class="form-control" value="{{ $project2->funding_federal_bus }}">
                                        </div>
                                        <div class="col-sm-2">
                                            <input onchange="funding_bus_table()" id = "local_bus" type="number" name="funding_local_bus" class="form-control" value="{{ $project2->funding_local_bus }}">
                                        </div>
                                        <div class="col-sm-2">
                                            <input onchange="funding_bus_table()" id = "local_beyond_bus" type="number" name="funding_local_beyond_bus" class="form-control" value="{{ $project2->funding_local_beyond_bus }}">
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="number" id="total_bus" name="funding_total_bus" class="form-control" value="{{ $project2->funding_total_bus }}" readonly>
                                        </div>
                                        <div class="col-sm-2">
                                            <input onchange="funding_bus_table()" id = "tdc_bus" type="number" name="funding_tdc_bus" class="form-control" value="{{ $project2->funding_tdc_bus }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row mb-1">
                                    <div class="col-sm-2">
                                        Total Funding By Share
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="number" id = "federal_bus_total" name="funding_federal_bus_total" class="form-control" value="{{ $project2->funding_federal_bus_total }}" readonly>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="number" id="local_bus_total" name="funding_local_bus_total" class="form-control" value="{{ $project2->funding_local_bus_total }}" readonly>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="number" id="local_beyond_bus_total" name="funding_local_beyond_bus_total" class="form-control" value="{{ $project2->funding_local_beyond_bus_total }}" readonly>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="number" id="total_bus_total" name="funding_total_bus_total" class="form-control" value="{{ $project2->funding_total_bus_total }}" readonly>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="number" id="tdc_bus_total" name="funding_tdc_bus_total" class="form-control" value="{{ $project2->funding_tdc_bus_total }}" readonly>
                                    </div>
                                </div>
                                <a class="btn btn-primary" role="button">Add Funding</a>
                                <a class="btn btn-primary" role="button">Remove Funding</a>
                            </div>
                        </div>
                        <br>

                        <label>
                            <input type="number" id="yoe_check_operations" name="yoe_cost_operations" autocomplete="off" value="{{ $project2->yoe_cost_operations }}" readonly>
                            YOE Cost
                        </label><br>
                        <div class="card">
                            <div class="card-header">
                                <div class="form-row">
                                    <div class="col-sm-2">
                                        Operations
                                    </div>
                                    <div class="col-sm-3">
                                        Federal Share Usually 50%
                                    </div>
                                    <div class="col-sm-3">
                                        Local Share Usually 50%
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
                                <div id="funding_operations">
                                    <div class="form-row mb-1">
                                        <div class="col-sm-2">
                                            <input type="text" name="funding_category_operations" class="form-control">
                                        </div>
                                        <div class="col-sm-3">
                                            <input onchange="funding_operations_table()" id = "federal_operations" type="number" name="funding_federal_operations" class="form-control" value="{{ $project2->funding_federal_operations }}">
                                        </div>
                                        <div class="col-sm-3">
                                            <input onchange="funding_operations_table()" id = "local_operations" type="number" name="funding_local_operations" class="form-control" value="{{ $project2->funding_local_operations }}">
                                        </div>
                                        <div class="col-sm-2">
                                            <input onchange="funding_operations_table()" id = "local_beyond_operations" type="number" name="funding_local_beyond_operations" class="form-control" value="{{ $project2->funding_local_beyond_operations }}">
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="number" id="total_operations" name="funding_total_operations" class="form-control" value="{{ $project2->funding_total_operations }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row mb-1">
                                    <div class="col-sm-2">
                                        Total Funding By Share
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="number" id="federal_operations_total" name="funding_federal_operations_total" class="form-control" value="{{ $project2->funding_federal_operations_total }}" readonly>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="number" id="local_operations_total" name="funding_local_operations_total" class="form-control" value="{{ $project2->funding_local_operations_total }}" readonly>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="number" id="local_beyond_operations_total" name="funding_local_beyond_operations_total" class="form-control" value="{{ $project2->funding_local_beyond_operations_total }}" readonly>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="number" id="total_operations_total" name="funding_total_operations_total" class="form-control" value="{{ $project2->funding_total_operations_total }}" readonly>
                                    </div>
                                </div>
                                <a class="btn btn-primary" role="button">Add Funding</a>
                                <a class="btn btn-primary" role="button">Remove Funding</a>
                            </div>
                        </div>
                        <br>
                        {{--Contact Information--}}
                        <h3>Contact information</h3>
                        <div class="card">
                            <div class="card-header">
                                <div class="form-row">
                                    <div class="col-sm-2">
                                        Sponsor
                                    </div>
                                    <div class="col-sm-2">
                                        Name
                                    </div>
                                    <div class="col-sm-2">
                                        Phone Number
                                    </div>
                                    <div class="col-sm-2">
                                        eMail
                                    </div>
                                    <div class="col-sm-2">
                                        Agency
                                    </div>
                                    <div class="col-sm-2">
                                        Title
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-row mb-1">
                                    <div class="col-sm-2">
                                        <input type="text" name="sponsor" class="form-control" value="{{ $project2->sponsor }}" readonly>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="contact_name" class="form-control" value="{{ $project2->contact_name }}">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="tel" name="contact_phone" class="form-control" value="{{ $project2->contact_phone }}">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="email" name="contact_email" class="form-control" value="{{ $project2->contact_email }}">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="contact_agency" class="form-control" value="{{ $project2->contact_agency }}">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="contact_title" class="form-control" value="{{ $project2->contact_title }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        {{--Attachments--}}
                        <h3>Attachments (Include a map of your service area or other documents).</h3>
                        <div class="form-group">
                            <textarea class="form-control" id="attachments_textarea" rows="5" readonly></textarea>
                        </div>
                        <div class="form-row">
                            <p>Files Attached&nbsp;</p>
                            <button class="btn btn-primary mt-1 float-right">
                                Add File
                            </button>
                            <button class="btn btn-primary mt-1 float-right">
                                Open File
                            </button>
                            <button class="btn btn-primary mt-1 float-right">
                                Remove File
                            </button>
                            <button class="btn btn-primary mt-1 float-right">
                                Show Attachment Name and Size
                            </button>
                        </div>
                        <p>*Only Adobe Acrobat users may be able to attach files to this form. If you are not able to attach files, please send them via e-mail.
                            <br>
                            *This form does not guarantee the funds requested nor the approval of the project in the MTP/TIP.
                            <br>
                            *By signing this Project Request Form you certify that the project Description and limits are within the scope of work of the project.
                        </p>
                        <p>*Please fill out this form entirely, and sign (digital signature). If "Signed By" field is blank, the form will not be accepted.</p>
                        <h4>Signed By</h4>
                        @auth
                            @if(auth()->user()->type == 1)
                                <div class="form-group">
                                    <textarea class="form-control" id="signed_textarea" name = "signature" rows="2"></textarea>
                                </div>
                            @else
                                <div class="form-group">
                                    <textarea class="form-control" id="signed_textarea" name = "signature" title="Only a submitter can sign this form." rows="2" readonly></textarea>
                                </div>
                            @endif                            
                        @endauth
                        <p>Save your form before signing, all fields will be locked after signature is provided.</p>
                        <br>
                        @auth
                            @if (auth()->user()->type == 1)
                            <button class="btn btn-primary mt-1 float-right" type="submit">
                                Submit
                            </button>
                            @else
                                <button class="btn btn-primary mt-1 float-right" type="submit">
                                    Save
                                </button>
                            @endif
                        @endauth
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const toggleTA = (name) => {
        if($('input[name="'+ name +'"]').is(':checked')) {
            console.log('checked');
            $('textarea[name="description_'+ name +'"]').show();
        }else{
            console.log('not checked');
            $('textarea[name="description_'+ name +'"]').hide();
        }
    };
</script>

<script src="{{ asset('docs/js/form2FrontEndLogic.js')}}"></script>

@endsection