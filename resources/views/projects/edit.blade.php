@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Electornic Project Request Form (ePRF)
                </div>
                <div class="card-body">
                    <form action="{{ route('projects.update', $project->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <label>
                            MPO ID
                        </label>
                        <input type="text" class="form-control" name="mpo_id" value="{{ $project->mpo_id }}" readonly>
                        
                        <label>
                            CSJ or CN
                        </label>
                        <input type="text" class="form-control" name="csj_cn" value="{{ $project->csj_cn }}" readonly>

                        <label>
                            Name
                        </label>
                        <input type="text" class="form-control" name="name" value="{{ $project->name }}">

                        <label>
                            Description
                        </label>
                        <input type="text" class="form-control" name="description" value="{{ $project->description }}">

                        <label>
                            Limit From
                        </label>
                        <input type="text" class="form-control" name="limit_from" value="{{ $project->limit_from }}">

                        <label>
                            Limit To
                        </label>
                        <input type="text" class="form-control" name="limit_to" value="{{ $project->limit_to }}">

                        <h4 class="mt-3">Definition of Regionally Significant Roadway: 23 CFR § 450.104</h4>
                        <p>Regionally significant project means a transportation project (other than projects that may be grouped in the TIP and/or STIP or exempt projects as defined in EPA's transportation conformity regulation (40 CFR part 93)) that is on a facility which serves regional transportation needs (such as access to and from the area outside the region; major activity centers in the region; major planned developments such as new retail malls, sports complexes, or employment centers; or transportation terminals) and would normally be included in the modeling of the metropolitan area's transportation network. At a minimum, this includes all principal arterial highways and all fixed guideway transit facilities that offer a significant alternative to regional highway travel. </p>

                        <label>
                            Describe the relationship of this project to the definition of Regionally Significant Roadway or exempt projects:
                        </label>
                        <textarea name="relationship_description" class="form-control">{{ $project->relationship_description }}</textarea>

                        <label>
                            Need and Purpose:
                        </label>
                        <textarea name="need_purpose" class="form-control">{{ $project->need_purpose }}</textarea>

                        <label>
                            Agency Comments:
                        </label>
                        <textarea name="agency_comments" class="form-control">{{ $project->agency_comments }}</textarea value="{{ $project->form }}">

                        <hr>

                        <label>
                            <input type="checkbox" name="hwrw_funds_request" autocomplete="off" {{ $project->hwrw_funds_request == true ? 'checked' : '' }}>
                            Requesting Highway/Roadway funds for this project/program (FHWA,State and/or Local Funds) 
                        </label>

                        <label>
                            <input type="checkbox" name="transit_funds_request" autocomplete="off" {{ $project->transit_funds_request == true ? 'checked' : '' }}>
                            Requesting Transit funds for his project/program (FTA, State and/or Local Funds) 
                        </label>

                        <br>

                        <div class="form-row">
                            <div class="col">
                                <label class="font-weight-bold">
                                    Federal Fiscal Year(FY):
                                </label>
                                <input type="number" name="fiscal_year" class="form-control" autocomplete="off" value="{{ $project->fiscal_year }}">
                            </div>
                            <div class="col">
                                <label>
                                    Highway/Roadway Name:
                                </label>
                                <input type="text" name="hwrw_name" class="form-control" autocomplete="off" value="{{ $project->hwrw_name }}">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <label>
                                    Network Year
                                </label>
                                <select name="network_year" class="form-control">
                                    <option>----</option>
                                    <option value="2020" {{ $project->network_year == 2020 ? 'selected' : ''}}>2020</option>
                                    <option value="2030" {{ $project->network_year == 2030 ? 'selected' : ''}}>2030</option>
                                    <option value="2040" {{ $project->network_year == 2040 ? 'selected' : ''}}>2040</option>
                                    <option value="2045" {{ $project->network_year == 2045 ? 'selected' : ''}}>2045</option>
                                </select>
                            </div>
                            <div class="col">
                                <label>
                                    Type of Project
                                </label>
                                <select name="type" class="form-control">
                                    <option>----</option>
                                    <option value="1" {{ $project->type == 1 ? 'selected' : '' }}>Additional Lanes</option>
                                    <option value="2" {{ $project->type == 2 ? 'selected' : '' }}>Aesthetics</option>
                                    <option value="3" {{ $project->type == 3 ? 'selected' : '' }}>Bikeway</option>
                                    <option value="4" {{ $project->type == 4 ? 'selected' : '' }}>Bus Purchase</option>
                                    <option value="5" {{ $project->type == 5 ? 'selected' : '' }}>Bus Service</option>
                                    <option value="6" {{ $project->type == 6 ? 'selected' : '' }}>Enhancements</option>
                                    <option value="7" {{ $project->type == 7 ? 'selected' : '' }}>inter-modal</option>
                                    <option value="8" {{ $project->type == 8 ? 'selected' : '' }}>ITS</option>
                                    <option value="9" {{ $project->type == 9 ? 'selected' : '' }}>Multi-modal</option>
                                    <option value="10" {{ $project->type == 10 ? 'selected' : '' }}>New Road</option>
                                    <option value="11" {{ $project->type == 11 ? 'selected' : '' }}>pedestrian</option>
                                    <option value="12" {{ $project->type == 12 ? 'selected' : '' }}>Plan</option>
                                    <option value="13" {{ $project->type == 13 ? 'selected' : '' }}>Port of Entry</option>
                                    <option value="14" {{ $project->type == 14 ? 'selected' : '' }}>Program</option>
                                    <option value="15" {{ $project->type == 15 ? 'selected' : '' }}>Rail</option>
                                    <option value="16" {{ $project->type == 16 ? 'selected' : '' }}>Rehabilitation</option>
                                    <option value="17" {{ $project->type == 17 ? 'selected' : '' }}>Signals</option>
                                    <option value="18" {{ $project->type == 18 ? 'selected' : '' }}>Study</option>
                                    <option value="19" {{ $project->type == 19 ? 'selected' : '' }}>Transit</option>
                                    <option value="20" {{ $project->type == 20 ? 'selected' : '' }}>Transit Terminal</option>
                                    <option value="21" {{ $project->type == 21 ? 'selected' : '' }}>Other, Specify</option>
                                  </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <label>
                                    <input type="checkbox" name="on_state" autocomplete="off" {{ $project->on_state == true ? 'checked' : '' }}>
                                    ON-State System Road
                                </label><br>
                                <label>
                                    <input type="checkbox" name="off_state" autocomplete="off" {{ $project->off_state == true ? 'checked' : '' }}>
                                    OFF-State System Road
                                </label><br>
                                <label>
                                    <input type="checkbox" name="capacity_project" autocomplete="off" {{ $project->capacity_project == true ? 'checked' : '' }}>
                                    Capacity Project (Additional through lanes)
                                </label>
                            </div>
                            <div class="col">
                                <label>
                                    Fedearl Functional Classificaiton (<a href="https://www.txdot.gov/apps/statewide_mapping/StatewidePlanningMap.html" target="_blank">Texas</a>, <a href="http://www.elpasompo.org/civicax/filebank/blobdload.aspx?BlobID=23410" target="_blank">New Mexico</a>):
                                </label>
                                <select name="classification" class="form-control">
                                    <option>----</option>
                                    <option value="1" {{ $project->classification == 1 ? 'selected' : '' }}>Interstate</option>
                                    <option value="2" {{ $project->classification == 2 ? 'selected' : '' }}>Freeway/Expressway</option>
                                    <option value="3" {{ $project->classification == 3 ? 'selected' : '' }}>Principal Arterial</option>
                                    <option value="4" {{ $project->classification == 4 ? 'selected' : '' }}>Minor Arterial</option>
                                    <option value="5" {{ $project->classification == 5 ? 'selected' : '' }}>Major Collector</option>
                                    <option value="6" {{ $project->classification == 6 ? 'selected' : '' }}>Minor Collector</option>
                                    <option value="7" {{ $project->classification == 7 ? 'selected' : '' }}>Local</option>
                                    <option value="8" {{ $project->classification == 8 ? 'selected' : '' }}>Other, specift</option>
                                    <option value="9" {{ $project->classification == 9 ? 'selected' : '' }}>Not Federally Functional Classified</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <label>
                                    Number of Existing Lanes
                                </label>
                                <input type="number" name="existing_lanes" class="form-control" autocomplete="off" value="{{ $project->existing_lanes }}">
                            </div>
                            <div class="col">
                                <label>
                                    DOT District:
                                </label>
                                <select name="district" class="form-control">
                                    <option>----</option>
                                    <option value="1" {{ $project->district == 1 ? 'selected' : '' }}>TX Dist.24</option>
                                    <option value="2" {{ $project->district == 2 ? 'selected' : '' }}>NM Dist. 1</option>
                                    <option value="3" {{ $project->district == 3 ? 'selected' : '' }}>NM Dist.2</option>
                                  </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <label>
                                    Number of Projected Lanes:
                                </label>
                                <input type="number" name="projected_lanes" class="form-control" autocomplete="off" value="{{ $project->projected_lanes }}">
                            </div>
                            <div class="col">
                                <label>
                                    County:
                                </label>
                                <select name="county" class="form-control">
                                    <option>----</option>
                                    <option value="1" {{ $project->county == 1 ? 'selected' : '' }}>El Paso</option>
                                    <option value="2" {{ $project->county == 2 ? 'selected' : '' }}>Doña Ana</option>
                                    <option value="3" {{ $project->county == 3 ? 'selected' : '' }}>Otero</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <label>
                                    Number of Miles:
                                </label>
                                <input type="number" name="miles" class="form-control" autocomplete="off" value="{{ $project->miles }}">
                            </div>
                            <div class="col">
                                <label>
                                    Incorporated City:
                                </label>
                                <select name="incorporated_city" class="form-control">
                                    <option>----</option>
                                    <option value="1" {{ $project->incorporated_city == 1 ? 'selected' : '' }}>Anthony TX</option>
                                    <option value="2" {{ $project->incorporated_city == 2 ? 'selected' : '' }}>Anthony NM</option>
                                    <option value="3" {{ $project->incorporated_city == 3 ? 'selected' : '' }}>Clint</option>
                                    <option value="4" {{ $project->incorporated_city == 4 ? 'selected' : '' }}>El Paso</option>
                                    <option value="5" {{ $project->incorporated_city == 5 ? 'selected' : '' }}>Horizon City</option>
                                    <option value="6" {{ $project->incorporated_city == 6 ? 'selected' : '' }}>Socorro</option>
                                    <option value="7" {{ $project->incorporated_city == 7 ? 'selected' : '' }}>San Elizario</option>
                                    <option value="8" {{ $project->incorporated_city == 8 ? 'selected' : '' }}>Sunland Park NM</option>
                                    <option value="9" {{ $project->incorporated_city == 9 ? 'selected' : '' }}>Vinton, TX</option>
                                    <option value="10 {{ $project->incorporated_city == 10 ? 'selected' : '' }}">N/A</option>
                                    <option value="11 {{ $project->incorporated_city == 11 ? 'selected' : '' }}">Other</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                            </div>
                            <div class="col">
                                <label>
                                    Sponsor Entity:
                                </label>
                            <input type="text" name="sponsor_entity" class="form-control" autocomplete="off" value="{{ $project->sponsor_entity }}">
                            </div>
                        </div>

                        <a href="http://www.elpasompo.org/civicax/filebank/blobdload.aspx?BlobID=23410"> Click here for Project Selection Process diagram and presentation (PDF) </a>

                        <hr>

                        <h3>Project Selection Process</h3>

                        <div class="form-row mb-1">
                            <div class="col-sm-1">
                                <select name="psp_1" class="form-control">
                                    <option>----</option>
                                    <option value="1" {{ $project->psp_1 == 1 ? 'selected' : '' }}>Yes</option>
                                    <option value="2" {{ $project->psp_1 == 2 ? 'selected' : '' }}>No</option>
                                </select>
                            </div>
                            <div class="col">
                                Will this project achieve a significant reduction in traffic fatalities or serious injuries? If yes, please provide link or attachment with supporting data 
                            </div>
                        </div>

                        <div class="form-row mb-1">
                            <div class="col-sm-1">
                                <select name="psp_2" class="form-control">
                                    <option>----</option>
                                    <option value="1" {{ $project->psp_2 == 1 ? 'selected' : '' }}>Yes</option>
                                    <option value="2" {{ $project->psp_2 == 2 ? 'selected' : '' }}>No</option>
                                </select>
                            </div>
                            <div class="col">
                                Is this project from an updated comprehensive plan, thoroughfare plan, feasibility or corridor study? If yes, please provide link or attachment: Excerpt from corridor plan attached (too large to attach whole document) 
                            </div>
                        </div>

                        <div class="form-row mb-1">
                            <div class="col-sm-1">
                                <select name="psp_3" class="form-control">
                                    <option>----</option>
                                    <option value="1" {{ $project->psp_3 == 1 ? 'selected' : '' }}>Yes</option>
                                    <option value="2" {{ $project->psp_3 == 2 ? 'selected' : '' }}>No</option>
                                </select>
                            </div>
                            <div class="col">
                                Is this project on the National Highway System NHS?
                            </div>
                        </div>

                        <div class="form-row mb-1">
                            <div class="col-sm-1">
                                <select name="psp_4" class="form-control">
                                    <option>----</option>
                                    <option value="1" {{ $project->psp_4 == 1 ? 'selected' : '' }}>Yes</option>
                                    <option value="2" {{ $project->psp_4 == 2 ? 'selected' : '' }}>No</option>
                                </select>
                            </div>
                            <div class="col">
                                Will this project achieve a significant reduction in traffic fatalities or serious injuries? If yes, please provide link or attachment with supporting data
                            </div>
                        </div>

                        <div class="form-row mb-1">
                            <div class="col-sm-1">
                                <select name="psp_5" class="form-control">
                                    <option>----</option>
                                    <option value="1" {{ $project->psp_5 == 1 ? 'selected' : '' }}>Yes</option>
                                    <option value="2" {{ $project->psp_5 == 2 ? 'selected' : '' }}>No</option>
                                </select>
                            </div>
                            <div class="col">
                                Is this project part of TPB resolution for the Active Transportation System?
                            </div>
                        </div>

                        <div class="form-row mb-1">
                            <div class="col-sm-1">
                                <select name="psp_6" class="form-control">
                                    <option>----</option>
                                    <option value="1" {{ $project->psp_6 == 1 ? 'selected' : '' }}>Yes</option>
                                    <option value="2" {{ $project->psp_6 == 2 ? 'selected' : '' }}>No</option>
                                </select>
                            </div>
                            <div class="col">
                                Is this project part of TPB resolution for a Comprehensive Mobility Plan (CMP)?asdads
                            </div>
                        </div>
                        <br>
                        {{-- Goals and Strategies --}}

                        <div class="form-row mb-1 justify-content-center">
                            <div class="col">
                                <h3><a href="http://www.elpasompo.org/civicax/filebank/blobdload.aspx?BlobID=23375" target="_blank">National Goals</a></h3>
                                <label>
                                    <input type="checkbox" name="goal_1" onclick="toggleTA(this.name);" autocomplete="off" {{ $project->goal_1 == true ? 'checked' : '' }}>
                                    Safety
                                </label><br>
                                <textarea name="description_goal_1" class="form-control" style="width: 22rem; {{ $project->goal_1 == true ? '' : 'display: none;' }}" placeholder="How does this project meet this goal?">{{ $project->description_goal_1 }}</textarea>
                                <label>
                                    <input type="checkbox" name="goal_2" onclick="toggleTA(this.name);" autocomplete="off" {{ $project->goal_2 == true ? 'checked' : '' }}>
                                    Infrastructure Condition
                                </label><br>
                                <textarea name="description_goal_2" class="form-control" style="width: 22rem; {{ $project->goal_2 == true ? '' : 'display: none;' }}" placeholder="How does this project meet this goal?">{{ $project->description_goal_2 }}</textarea>
                                <label>
                                    <input type="checkbox" name="goal_3" onclick="toggleTA(this.name);" autocomplete="off" {{ $project->goal_3 == true ? 'checked' : '' }}>
                                    Congestion Reduction
                                </label><br>
                                <textarea name="description_goal_3" class="form-control" style="width: 22rem; {{ $project->goal_3 == true ? '' : 'display: none;' }}" placeholder="How does this project meet this goal?">{{ $project->description_goal_3 }}</textarea>
                                <label>
                                    <input type="checkbox" name="goal_4" onclick="toggleTA(this.name);" autocomplete="off" {{ $project->goal_4 == true ? 'checked' : '' }}>
                                    System Reliability
                                </label><br>
                                <textarea name="description_goal_4" class="form-control" style="width: 22rem; {{ $project->goal_4 == true ? '' : 'display: none;' }}" placeholder="How does this project meet this goal?">{{ $project->description_goal_4 }}</textarea>
                                <label>
                                    <input type="checkbox" name="goal_5" onclick="toggleTA(this.name);" autocomplete="off" {{ $project->goal_5 == true ? 'checked' : '' }}>
                                    Freight Movement and Economic Vitality
                                </label><br>
                                <textarea name="description_goal_5" class="form-control" style="width: 22rem; {{ $project->goal_5 == true ? '' : 'display: none;' }}" placeholder="How does this project meet this goal?">{{ $project->description_goal_5 }}</textarea>
                                <label>
                                    <input type="checkbox" name="goal_6" onclick="toggleTA(this.name);" autocomplete="off" {{ $project->goal_6 == true ? 'checked' : '' }}>
                                    Environmental Sustainability
                                </label><br>
                                <textarea name="description_goal_6" class="form-control mb-1" style="width: 22rem; {{ $project->goal_6 == true ? '' : 'display: none;' }}" placeholder="How does this project meet this goal?">{{ $project->description_goal_6 }}</textarea>

                                <div class="card" style="width: 22rem;">
                                    <div class="card-body">

                                        <h5 class="card-title text-center">CMAQ Analysis</h5>
                                        <h6 class="card-subtitle mb-2 text-muted text-center">*Air Quality Analysis MUST accompany request for CMAQ Funds.</h6>

                                        <label>VOC (Kgs/day)</label>
                                        <input type="text" name="voc" class="form-control" autocomplete="off" value="{{ $project->voc }}">
                                        <label>C0 (Kgs/day)</label>
                                        <input type="text" name="c0" class="form-control" autocomplete="off" value="{{ $project->c0 }}">
                                        <label>NOX (Kgs/day)</label>
                                        <input type="text" name="nox" class="form-control" autocomplete="off" value="{{ $project->nox }}">
                                        <label>PM10 (Kgs/day)</label>
                                        <input type="text" name="pm10" class="form-control" autocomplete="off" value="{{ $project->pm10 }}">
                                        <label>Prepared By</label>
                                        <input type="text" name="prepared_by" class="form-control" autocomplete="off" value="{{ $project->prepared_by }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <h3><a href="http://www.elpasompo.org/civicax/filebank/blobdload.aspx?BlobID=23375" target="_blank">Congestion Management Process Strategies</a></h3>
                                <label>
                                    <input type="checkbox" name="strategy_1" onclick="toggleTA(this.name);" autocomplete="off" {{ $project->strategy_1 == true ? 'checked' : '' }}>
                                    Travel Demand Management Strategies
                                </label><br>
                                <textarea name="description_strategy_1" class="form-control" style="width: 22rem; {{ $project->strategy_1 == true ? '' : 'display: none;' }}" placeholder="How does this project meet this strategy?">{{ $project->description_strategy_1 }}</textarea>
                                <label>
                                    <input type="checkbox" name="strategy_2" onclick="toggleTA(this.name);" autocomplete="off" {{ $project->strategy_2 == true ? 'checked' : '' }}>
                                    Traffic Operations Strategies
                                </label><br>
                                <textarea name="description_strategy_2" class="form-control" style="width: 22rem; {{ $project->strategy_2 == true ? '' : 'display: none;' }}" placeholder="How does this project meet this strategy?">{{ $project->description_strategy_2 }}</textarea>
                                <label>
                                    <input type="checkbox" name="strategy_3" onclick="toggleTA(this.name);" autocomplete="off" {{ $project->strategy_3 == true ? 'checked' : '' }}>
                                    Public Transportation Strategies
                                </label><br>
                                <textarea name="description_strategy_3" class="form-control" style="width: 22rem; {{ $project->strategy_3 == true ? '' : 'display: none;' }}" placeholder="How does this project meet this strategy?">{{ $project->description_strategy_3 }}</textarea>
                                <label>
                                    <input type="checkbox" name="strategy_4" onclick="toggleTA(this.name);" autocomplete="off" {{ $project->strategy_4 == true ? 'checked' : '' }}>
                                    System Reliabilit
                                </label><br>
                                <textarea name="description_strategy_4" class="form-control" style="width: 22rem; {{ $project->strategy_4 == true ? '' : 'display: none;' }}" placeholder="How does this project meet this strategy?">{{ $project->description_strategy_4 }}</textarea>
                                <label>
                                    <input type="checkbox" name="strategy_5" onclick="toggleTA(this.name);" autocomplete="off" {{ $project->strategy_5 == true ? 'checked' : '' }}>
                                    Road Capacity Strategies
                                </label><br>
                                <textarea name="description_strategy_5" class="form-control" style="width: 22rem; {{ $project->strategy_5 == true ? '' : 'display: none;' }}" placeholder="How does this project meet this strategy?">{{ $project->description_strategy_5 }}</textarea>
                                <label>
                                    <input type="checkbox" name="strategy_6" onclick="toggleTA(this.name);" autocomplete="off" {{ $project->strategy_6 == true ? 'checked' : '' }}>
                                    Non-CMP Strategies
                                </label><br>
                                <textarea name="description_strategy_6" class="form-control mb-1" style="width: 22rem; {{ $project->strategy_6 == true ? '' : 'display: none;' }}" placeholder="How does this project meet this strategy?">{{ $project->description_strategy_6 }}</textarea>

                                <div class="card" style="width: 22rem;">
                                    <div class="card-body">

                                        <h5 class="card-title text-center">**Transit Only</h5>

                                        <label>Section 5309 ID</label>
                                        <input type="text" name="section_5309" class="form-control" autocomplete="off" value="{{ $project->section_5309 }}">
                                        <label>Apportionment Year</label>
                                        <input type="text" name="appointment_year" class="form-control" autocomplete="off" value="{{ $project->appointment_year }}">
                                        <label>TDC Award Amount</label>
                                        <input type="text" name="tdc_award_amount" class="form-control" autocomplete="off" value="{{ $project->tdc_award_amount }}">
                                        <label>TDC Award Date</label>
                                        <input type="text" name="tdw_award_date" class="form-control" autocomplete="off" value="{{ $project->tdw_award_date }}">
                                        <label>TDC Amount Requested</label>
                                        <input type="text" name="tdc_amount_requested" class="form-control" autocomplete="off" value="{{ $project->tdc_amount_requested }}"><br>

                                        <h4>Project Type:</h4>

                                        <label>
                                            <input type="checkbox" name="type_capital" autocomplete="off" {{ $project->type_capital == true ? 'checked' : '' }}>
                                            Capital
                                        </label><br>
                                        <label>
                                            <input type="checkbox" name="type_operating" autocomplete="off" {{ $project->type_operating == true ? 'checked' : '' }}>
                                            Operating
                                        </label><br>
                                        <label>
                                            <input type="checkbox" name="type_planning" autocomplete="off" {{ $project->type_planning == true ? 'checked' : '' }}>
                                            Planning
                                        </label><br>
                                        <label>
                                            <input type="checkbox" name="type_administration" autocomplete="off" {{ $project->type_administration == true ? 'checked' : '' }}>
                                            Administration
                                        </label><br>


                                    </div>
                                </div>
                            </div>
                        </div>

                        Projects will be examined at the corridor level to determine multimodal needs. Which best describes this projects. <a href="http://www.elpasompo.org/civicax/filebank/blobdload.aspx?BlobID=23409" target="_blank">Block System:</a><br>

                        <label><input type="radio" name="block_system" value="1" {{ $project->block_system == 1 ? 'checked' : '' }}> Within Community</label autocomplete="off">
                        <label><input type="radio" name="block_system" value="2" {{ $project->block_system == 2 ? 'checked' : '' }}> Community to community</label autocomplete="off">
                        <label><input type="radio" name="block_system" value="3" {{ $project->block_system == 3 ? 'checked' : '' }}> Community to region</label autocomplete="off">
                        <label><input type="radio" name="block_system" value="4" {{ $project->block_system == 4 ? 'checked' : '' }}> Region to region</label autocomplete="off">

                        <hr>

                        <h4>Project Readiness Elements:</h4>
                        <p>"Overall" Estimate of Preliminary Engineering (PE) Examples include: Project Initiation/Planning, Initial Design, Environmental Document, PS&E, etc.</p>

                        <div class="card">
                            <div class="card-header">
                                <div class="form-row">
                                    <div class="col-sm-3">
                                        Element
                                    </div>
                                    <div class="col-sm-2">
                                        Est. Start Date
                                    </div>
                                    <div class="col-sm-2">
                                        Est. End Date
                                    </div>
                                    <div class="col-sm-1">
                                        Progress
                                    </div>
                                    <div class="col-sm-2">
                                        Resp. Agency
                                    </div>
                                    <div class="col-sm-2">
                                        Comments
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                {{-- Schematic --}}
                                <div class="form-row mb-1">
                                    <div class="col-sm-3">
                                        Schematic
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="schematic_start_date" class="form-control" autocomplete="off" value="{{ $project->schematic_start_date }}">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="schematic_end_date" class="form-control" autocomplete="off" value="{{ $project->schematic_end_date }}">
                                    </div>
                                    <div class="col-sm-1">
                                        <select name="schematic_progress" class="form-control" autocomplete="off">
                                            <option>----</option>
                                            <option value="1" {{ $project->schematic_progress == 1 ? 'selected' : ''  }}>0%</option>
                                            <option value="2" {{ $project->schematic_progress == 2 ? 'selected' : ''  }}>30%</option>
                                            <option value="3" {{ $project->schematic_progress == 3 ? 'selected' : ''  }}>60%</option>
                                            <option value="4" {{ $project->schematic_progress == 4 ? 'selected' : ''  }}>90%</option>
                                            <option value="5" {{ $project->schematic_progress == 5 ? 'selected' : ''  }}>100%</option>
                                            <option value="6" {{ $project->schematic_progress == 6 ? 'selected' : ''  }}>N/A</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <select name="schematic_agency" class="form-control" autocomplete="off">
                                            <option>----</option>
                                            <option value="1" {{ $project->schematic_agency == 1 ? 'selected' : '' }}>TxDOT</option>
                                            <option value="2" {{ $project->schematic_agency == 2 ? 'selected' : '' }}>Local</option>
                                            <option value="3" {{ $project->schematic_agency == 3 ? 'selected' : '' }}>Other</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="schematic_comments" class="form-control" autocomplete="off" value="{{ $project->schematic_comments }}">
                                    </div>
                                </div>
                                {{-- Env. Doc. Type --}}
                                <div class="form-row mb-1">
                                    <div class="col-sm-3">
                                        Env. Doc. Type
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="envdoctype_start_date" class="form-control" autocomplete="off" value="{{ $project->envdoctype_start_date }}">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="envdoctype_end_date" class="form-control" autocomplete="off" value="{{ $project->envdoctype_end_date }}">
                                    </div>
                                    <div class="col-sm-1">
                                        <select name="envdoctype_progress" class="form-control" autocomplete="off">
                                            <option>----</option>
                                            <option value="1" {{ $project->envdoctype_progress == 1 ? 'selected' : ''  }}>0%</option>
                                            <option value="2" {{ $project->envdoctype_progress == 2 ? 'selected' : ''  }}>30%</option>
                                            <option value="3" {{ $project->envdoctype_progress == 3 ? 'selected' : ''  }}>60%</option>
                                            <option value="4" {{ $project->envdoctype_progress == 4 ? 'selected' : ''  }}>90%</option>
                                            <option value="5" {{ $project->envdoctype_progress == 5 ? 'selected' : ''  }}>100%</option>
                                            <option value="6" {{ $project->envdoctype_progress == 6 ? 'selected' : ''  }}>N/A</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <select name="envdoctype_agency" class="form-control" autocomplete="off">
                                            <option>----</option>
                                            <option value="1" {{ $project->envdoctype_agency == 1 ? 'selected' : '' }}>TxDOT</option>
                                            <option value="2" {{ $project->envdoctype_agency == 2 ? 'selected' : '' }}>Local</option>
                                            <option value="3" {{ $project->envdoctype_agency == 3 ? 'selected' : '' }}>Other</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="envdoctype_comments" class="form-control" autocomplete="off" value="{{ $project->envdoctype_comments }}">
                                    </div>
                                </div>
                                {{-- Environmental Doc --}}
                                <div class="form-row mb-1">
                                    <div class="col-sm-3">
                                        Environmental Doc
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="envdoc_start_date" class="form-control" autocomplete="off" value="{{ $project->envdoc_start_date }}">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="envdoc_end_date" class="form-control" autocomplete="off" value="{{ $project->envdoc_end_date }}">
                                    </div>
                                    <div class="col-sm-1">
                                        <select name="envdoc_progress" class="form-control" autocomplete="off">
                                            <option>----</option>
                                            <option value="1" {{ $project->envdoc_progress == 1 ? 'selected' : ''  }}>0%</option>
                                            <option value="2" {{ $project->envdoc_progress == 2 ? 'selected' : ''  }}>30%</option>
                                            <option value="3" {{ $project->envdoc_progress == 3 ? 'selected' : ''  }}>60%</option>
                                            <option value="4" {{ $project->envdoc_progress == 4 ? 'selected' : ''  }}>90%</option>
                                            <option value="5" {{ $project->envdoc_progress == 5 ? 'selected' : ''  }}>100%</option>
                                            <option value="6" {{ $project->envdoc_progress == 6 ? 'selected' : ''  }}>N/A</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <select name="envdoc_agency" class="form-control" autocomplete="off">
                                            <option>----</option>
                                            <option value="1" {{ $project->envdoc_agency == 1 ? 'selected' : '' }}>TxDOT</option>
                                            <option value="2" {{ $project->envdoc_agency == 2 ? 'selected' : '' }}>Local</option>
                                            <option value="3" {{ $project->envdoc_agency == 3 ? 'selected' : '' }}>Other</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="envdoc_comments" class="form-control" autocomplete="off" value="{{ $project->envdoc_comments }}">
                                    </div>
                                </div>
                                {{-- PS&E --}}
                                <div class="form-row mb-1">
                                    <div class="col-sm-3">
                                        PS&E
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="pse_start_date" class="form-control" autocomplete="off" value="{{ $project->pse_start_date }}">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="pse_end_date" class="form-control" autocomplete="off" value="{{ $project->pse_end_date }}">
                                    </div>
                                    <div class="col-sm-1">
                                        <select name="pse_progress" class="form-control" autocomplete="off">
                                            <option>----</option>
                                            <option value="1" {{ $project->pse_progress == 1 ? 'selected' : ''  }}>0%</option>
                                            <option value="2" {{ $project->pse_progress == 2 ? 'selected' : ''  }}>30%</option>
                                            <option value="3" {{ $project->pse_progress == 3 ? 'selected' : ''  }}>60%</option>
                                            <option value="4" {{ $project->pse_progress == 4 ? 'selected' : ''  }}>90%</option>
                                            <option value="5" {{ $project->pse_progress == 5 ? 'selected' : ''  }}>100%</option>
                                            <option value="6" {{ $project->pse_progress == 6 ? 'selected' : ''  }}>N/A</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <select name="pse_agency" class="form-control" autocomplete="off">
                                            <option>----</option>
                                            <option value="1" {{ $project->pse_agency == 1 ? 'selected' : '' }}>TxDOT</option>
                                            <option value="2" {{ $project->pse_agency == 2 ? 'selected' : '' }}>Local</option>
                                            <option value="3" {{ $project->pse_agency == 3 ? 'selected' : '' }}>Other</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="pse_comments" class="form-control" autocomplete="off" value="{{ $project->pse_comments }}">
                                    </div>
                                </div>
                                {{-- ROW Map --}}
                                <div class="form-row mb-1">
                                    <div class="col-sm-3">
                                        ROW Map(s)
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="rowmap_start_date" class="form-control" autocomplete="off" value="{{ $project->rowmap_start_date }}">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="rowmap_end_date" class="form-control" autocomplete="off" value="{{ $project->rowmap_end_date }}">
                                    </div>
                                    <div class="col-sm-1">
                                        <select name="rowmap_progress" class="form-control" autocomplete="off">
                                            <option>----</option>
                                            <option value="1" {{ $project->rowmap_progress == 1 ? 'selected' : ''  }}>0%</option>
                                            <option value="2" {{ $project->rowmap_progress == 2 ? 'selected' : ''  }}>30%</option>
                                            <option value="3" {{ $project->rowmap_progress == 3 ? 'selected' : ''  }}>60%</option>
                                            <option value="4" {{ $project->rowmap_progress == 4 ? 'selected' : ''  }}>90%</option>
                                            <option value="5" {{ $project->rowmap_progress == 5 ? 'selected' : ''  }}>100%</option>
                                            <option value="6" {{ $project->rowmap_progress == 6 ? 'selected' : ''  }}>N/A</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <select name="rowmap_agency" class="form-control" autocomplete="off">
                                            <option>----</option>
                                            <option value="1" {{ $project->rowmap_agency == 1 ? 'selected' : '' }}>TxDOT</option>
                                            <option value="2" {{ $project->rowmap_agency == 2 ? 'selected' : '' }}>Local</option>
                                            <option value="3" {{ $project->rowmap_agency == 3 ? 'selected' : '' }}>Other</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="rowmap_comments" class="form-control" autocomplete="off" value="{{ $project->rowmap_comments }}">
                                    </div>
                                </div>
                                {{-- ROW Acquired --}}
                                <div class="form-row mb-1">
                                    <div class="col-sm-3">
                                        ROW Acquired
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="rowacq_start_date" class="form-control" autocomplete="off" value="{{ $project->rowacq_start_date }}">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="rowacq_end_date" class="form-control" autocomplete="off" value="{{ $project->rowacq_end_date }}">
                                    </div>
                                    <div class="col-sm-1">
                                        <select name="rowacq_progress" class="form-control" autocomplete="off">
                                            <option>----</option>
                                            <option value="1" {{ $project->rowacq_progress == 1 ? 'selected' : ''  }}>0%</option>
                                            <option value="2" {{ $project->rowacq_progress == 2 ? 'selected' : ''  }}>30%</option>
                                            <option value="3" {{ $project->rowacq_progress == 3 ? 'selected' : ''  }}>60%</option>
                                            <option value="4" {{ $project->rowacq_progress == 4 ? 'selected' : ''  }}>90%</option>
                                            <option value="5" {{ $project->rowacq_progress == 5 ? 'selected' : ''  }}>100%</option>
                                            <option value="6" {{ $project->rowacq_progress == 6 ? 'selected' : ''  }}>N/A</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <select name="rowacq_agency" class="form-control" autocomplete="off">
                                            <option>----</option>
                                            <option value="1" {{ $project->rowacq_agency == 1 ? 'selected' : '' }}>TxDOT</option>
                                            <option value="2" {{ $project->rowacq_agency == 2 ? 'selected' : '' }}>Local</option>
                                            <option value="3" {{ $project->rowacq_agency == 3 ? 'selected' : '' }}>Other</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="rowacq_comments" class="form-control" autocomplete="off" value="{{ $project->rowacq_comments }}">
                                    </div>
                                </div>
                                {{-- Utilities --}}
                                <div class="form-row mb-1">
                                    <div class="col-sm-3">
                                        Utilities
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="utilities_start_date" class="form-control" autocomplete="off" value="{{ $project->utilities_start_date }}">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="utilities_end_date" class="form-control" autocomplete="off" value="{{ $project->utilities_end_date }}">
                                    </div>
                                    <div class="col-sm-1">
                                        <select name="utilities_progress" class="form-control" autocomplete="off">
                                            <option>----</option>
                                            <option value="1" {{ $project->utilities_progress == 1 ? 'selected' : ''  }}>0%</option>
                                            <option value="2" {{ $project->utilities_progress == 2 ? 'selected' : ''  }}>30%</option>
                                            <option value="3" {{ $project->utilities_progress == 3 ? 'selected' : ''  }}>60%</option>
                                            <option value="4" {{ $project->utilities_progress == 4 ? 'selected' : ''  }}>90%</option>
                                            <option value="5" {{ $project->utilities_progress == 5 ? 'selected' : ''  }}>100%</option>
                                            <option value="6" {{ $project->utilities_progress == 6 ? 'selected' : ''  }}>N/A</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <select name="utilities_agency" class="form-control" autocomplete="off">
                                            <option>----</option>
                                            <option value="1" {{ $project->utilities_agency == 1 ? 'selected' : '' }}>TxDOT</option>
                                            <option value="2" {{ $project->utilities_agency == 2 ? 'selected' : '' }}>Local</option>
                                            <option value="3" {{ $project->utilities_agency == 3 ? 'selected' : '' }}>Other</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="utilities_comments" class="form-control" autocomplete="off" value="{{ $project->utilities_comments }}">
                                    </div>
                                </div>
                                {{-- Public Involvement --}}
                                <div class="form-row mb-1">
                                    <div class="col-sm-3">
                                        Public Involvement
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="pubinv_start_date" class="form-control" autocomplete="off" value="{{ $project->pubinv_start_date }}">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="pubinv_end_date" class="form-control" autocomplete="off" value="{{ $project->pubinv_end_date }}">
                                    </div>
                                    <div class="col-sm-1">
                                        <select name="pubinv_progress" class="form-control" autocomplete="off">
                                            <option>----</option>
                                            <option value="1" {{ $project->pubinv_progress == 1 ? 'selected' : ''  }}>0%</option>
                                            <option value="2" {{ $project->pubinv_progress == 2 ? 'selected' : ''  }}>30%</option>
                                            <option value="3" {{ $project->pubinv_progress == 3 ? 'selected' : ''  }}>60%</option>
                                            <option value="4" {{ $project->pubinv_progress == 4 ? 'selected' : ''  }}>90%</option>
                                            <option value="5" {{ $project->pubinv_progress == 5 ? 'selected' : ''  }}>100%</option>
                                            <option value="6" {{ $project->pubinv_progress == 6 ? 'selected' : ''  }}>N/A</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <select name="pubinv_agency" class="form-control" autocomplete="off">
                                            <option>----</option>
                                            <option value="1" {{ $project->pubinv_agency == 1 ? 'selected' : '' }}>TxDOT</option>
                                            <option value="2" {{ $project->pubinv_agency == 2 ? 'selected' : '' }}>Local</option>
                                            <option value="3" {{ $project->pubinv_agency == 3 ? 'selected' : '' }}>Other</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="pubinv_comments" class="form-control" autocomplete="off" value="{{ $project->pubinv_comments }}">
                                    </div>
                                </div>
                                {{-- District Review --}}
                                <div class="form-row mb-1">
                                    <div class="col-sm-3">
                                        District Review
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="distrev_start_date" class="form-control" autocomplete="off" value="{{ $project->distrev_start_date }}">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="distrev_end_date" class="form-control" autocomplete="off" value="{{ $project->distrev_end_date }}">
                                    </div>
                                    <div class="col-sm-1">
                                        <select name="distrev_progress" class="form-control" autocomplete="off">
                                            <option>----</option>
                                            <option value="1" {{ $project->distrev_progress == 1 ? 'selected' : ''  }}>0%</option>
                                            <option value="2" {{ $project->distrev_progress == 2 ? 'selected' : ''  }}>30%</option>
                                            <option value="3" {{ $project->distrev_progress == 3 ? 'selected' : ''  }}>60%</option>
                                            <option value="4" {{ $project->distrev_progress == 4 ? 'selected' : ''  }}>90%</option>
                                            <option value="5" {{ $project->distrev_progress == 5 ? 'selected' : ''  }}>100%</option>
                                            <option value="6" {{ $project->distrev_progress == 6 ? 'selected' : ''  }}>N/A</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <select name="distrev_agency" class="form-control" autocomplete="off">
                                            <option>----</option>
                                            <option value="1" {{ $project->distrev_agency == 1 ? 'selected' : '' }}>TxDOT</option>
                                            <option value="2" {{ $project->distrev_agency == 2 ? 'selected' : '' }}>Local</option>
                                            <option value="3" {{ $project->distrev_agency == 3 ? 'selected' : '' }}>Other</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="distrev_comments" class="form-control" autocomplete="off" value="{{ $project->distrev_comments }}">
                                    </div>
                                </div>
                                {{-- Agreement --}}
                                <div class="form-row mb-1">
                                    <div class="col-sm-3">
                                        Agreement (LPFA)
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="agree_start_date" class="form-control" autocomplete="off" value="{{ $project->agree_start_date }}">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="agree_end_date" class="form-control" autocomplete="off" value="{{ $project->agree_end_date }}">
                                    </div>
                                    <div class="col-sm-1">
                                        <select name="agree_progress" class="form-control" autocomplete="off">
                                            <option>----</option>
                                            <option value="1" {{ $project->agree_progress == 1 ? 'selected' : ''  }}>0%</option>
                                            <option value="2" {{ $project->agree_progress == 2 ? 'selected' : ''  }}>30%</option>
                                            <option value="3" {{ $project->agree_progress == 3 ? 'selected' : ''  }}>60%</option>
                                            <option value="4" {{ $project->agree_progress == 4 ? 'selected' : ''  }}>90%</option>
                                            <option value="5" {{ $project->agree_progress == 5 ? 'selected' : ''  }}>100%</option>
                                            <option value="6" {{ $project->agree_progress == 6 ? 'selected' : ''  }}>N/A</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <select name="agree_agency" class="form-control" autocomplete="off">
                                            <option>----</option>
                                            <option value="1" {{ $project->agree_agency == 1 ? 'selected' : '' }}>TxDOT</option>
                                            <option value="2" {{ $project->agree_agency == 2 ? 'selected' : '' }}>Local</option>
                                            <option value="3" {{ $project->agree_agency == 3 ? 'selected' : '' }}>Other</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="agree_comments" class="form-control" autocomplete="off" value="{{ $project->agree_comments }}">
                                    </div>
                                </div>
                                {{-- Procurement Process --}}
                                <div class="form-row mb-1">
                                    <div class="col-sm-3">
                                        Procurement Process
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="procpro_start_date" class="form-control" autocomplete="off" value="{{ $project->procpro_start_date }}">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="procpro_end_date" class="form-control" autocomplete="off" value="{{ $project->procpro_end_date }}">
                                    </div>
                                    <div class="col-sm-1">
                                        <select name="procpro_progress" class="form-control" autocomplete="off">
                                            <option>----</option>
                                            <option value="1" {{ $project->procpro_progress == 1 ? 'selected' : ''  }}>0%</option>
                                            <option value="2" {{ $project->procpro_progress == 2 ? 'selected' : ''  }}>30%</option>
                                            <option value="3" {{ $project->procpro_progress == 3 ? 'selected' : ''  }}>60%</option>
                                            <option value="4" {{ $project->procpro_progress == 4 ? 'selected' : ''  }}>90%</option>
                                            <option value="5" {{ $project->procpro_progress == 5 ? 'selected' : ''  }}>100%</option>
                                            <option value="6" {{ $project->procpro_progress == 6 ? 'selected' : ''  }}>N/A</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <select name="procpro_agency" class="form-control" autocomplete="off">
                                            <option>----</option>
                                            <option value="1" {{ $project->procpro_agency == 1 ? 'selected' : '' }}>TxDOT</option>
                                            <option value="2" {{ $project->procpro_agency == 2 ? 'selected' : '' }}>Local</option>
                                            <option value="3" {{ $project->procpro_agency == 3 ? 'selected' : '' }}>Other</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="procpro_comments" class="form-control" autocomplete="off" value="{{ $project->procpro_comments }}">
                                    </div>
                                </div>
                                {{-- Let Date --}}
                                <div class="form-row mb-1">
                                    <div class="col-sm-3">
                                        Let Date
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="letdate_start_date" class="form-control" autocomplete="off" value="{{ $project->letdate_start_date }}">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="letdate_end_date" class="form-control" autocomplete="off" value="{{ $project->letdate_end_date }}">
                                    </div>
                                    <div class="col-sm-1">
                                        <select name="letdate_progress" class="form-control" autocomplete="off">
                                            <option>----</option>
                                            <option value="1" {{ $project->letdate_progress == 1 ? 'selected' : ''  }}>0%</option>
                                            <option value="2" {{ $project->letdate_progress == 2 ? 'selected' : ''  }}>30%</option>
                                            <option value="3" {{ $project->letdate_progress == 3 ? 'selected' : ''  }}>60%</option>
                                            <option value="4" {{ $project->letdate_progress == 4 ? 'selected' : ''  }}>90%</option>
                                            <option value="5" {{ $project->letdate_progress == 5 ? 'selected' : ''  }}>100%</option>
                                            <option value="6" {{ $project->letdate_progress == 6 ? 'selected' : ''  }}>N/A</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <select name="letdate_agency" class="form-control" autocomplete="off">
                                            <option>----</option>
                                            <option value="1" {{ $project->letdate_agency == 1 ? 'selected' : '' }}>TxDOT</option>
                                            <option value="2" {{ $project->letdate_agency == 2 ? 'selected' : '' }}>Local</option>
                                            <option value="3" {{ $project->letdate_agency == 3 ? 'selected' : '' }}>Other</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="letdate_comments" class="form-control" autocomplete="off" value="{{ $project->letdate_comments }}">
                                    </div>
                                </div>
                                {{-- Construction Performance End Date --}}
                                <div class="form-row mb-1">
                                    <div class="col-sm-3">
                                        Construction Performance End Date
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="consper_end_date_start_date" class="form-control" autocomplete="off" value="{{ $project->consper_end_date_start_date }}">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="consper_end_date_end_date" class="form-control" autocomplete="off" value="{{ $project->consper_end_date_end_date }}">
                                    </div>
                                    <div class="col-sm-1">
                                        <select name="consper_end_date_progress" class="form-control" autocomplete="off">
                                            <option>----</option>
                                            <option value="1" {{ $project->consper_end_date_progress == 1 ? 'selected' : ''  }}>0%</option>
                                            <option value="2" {{ $project->consper_end_date_progress == 2 ? 'selected' : ''  }}>30%</option>
                                            <option value="3" {{ $project->consper_end_date_progress == 3 ? 'selected' : ''  }}>60%</option>
                                            <option value="4" {{ $project->consper_end_date_progress == 4 ? 'selected' : ''  }}>90%</option>
                                            <option value="5" {{ $project->consper_end_date_progress == 5 ? 'selected' : ''  }}>100%</option>
                                            <option value="6" {{ $project->consper_end_date_progress == 6 ? 'selected' : ''  }}>N/A</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <select name="consper_end_date_agency" class="form-control" autocomplete="off">
                                            <option>----</option>
                                            <option value="1" {{ $project->consper_end_date_agency == 1 ? 'selected' : '' }}>TxDOT</option>
                                            <option value="2" {{ $project->consper_end_date_agency == 2 ? 'selected' : '' }}>Local</option>
                                            <option value="3" {{ $project->consper_end_date_agency == 3 ? 'selected' : '' }}>Other</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="consper_end_date_comments" class="form-control" autocomplete="off" value="{{ $project->consper_end_date_comments }}">
                                    </div>
                                </div>
                                {{-- PE Performance --}}
                                <div class="form-row mb-1">
                                    <div class="col-sm-3">
                                        PE Performance End Date
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="peperf_start_date" class="form-control" autocomplete="off" value="{{ $project->peperf_start_date }}">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="peperf_end_date" class="form-control" autocomplete="off" value="{{ $project->peperf_end_date }}">
                                    </div>
                                    <div class="col-sm-1">
                                        <select name="peperf_progress" class="form-control" autocomplete="off">
                                            <option>----</option>
                                            <option value="1" {{ $project->peperf_progress == 1 ? 'selected' : ''  }}>0%</option>
                                            <option value="2" {{ $project->peperf_progress == 2 ? 'selected' : ''  }}>30%</option>
                                            <option value="3" {{ $project->peperf_progress == 3 ? 'selected' : ''  }}>60%</option>
                                            <option value="4" {{ $project->peperf_progress == 4 ? 'selected' : ''  }}>90%</option>
                                            <option value="5" {{ $project->peperf_progress == 5 ? 'selected' : ''  }}>100%</option>
                                            <option value="6" {{ $project->peperf_progress == 6 ? 'selected' : ''  }}>N/A</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <select name="peperf_agency" class="form-control" autocomplete="off">
                                            <option>----</option>
                                            <option value="1" {{ $project->peperf_agency == 1 ? 'selected' : '' }}>TxDOT</option>
                                            <option value="2" {{ $project->peperf_agency == 2 ? 'selected' : '' }}>Local</option>
                                            <option value="3" {{ $project->peperf_agency == 3 ? 'selected' : '' }}>Other</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="peperf_comments" class="form-control" autocomplete="off" value="{{ $project->peperf_comments }}">
                                    </div>
                                </div>
                                <div class="form-row mb-1">
                                    <div class="col-sm-3">
                                        Transit Only
                                        "Anticipated Dates"
                                    </div>
                                </div>
                                {{-- FTA Transfer--}}
                                <div class="form-row mb-1">
                                    <div class="col-sm-3">
                                        FTA Transfer Process (If applicable)
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="fta_trans_start_date" class="form-control" autocomplete="off" value="{{ $project->fta_trans_start_date }}">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="fta_trans_end_date" class="form-control" autocomplete="off" value="{{ $project->fta_trans_end_date }}">
                                    </div>
                                    <div class="col-sm-1">
                                        <select name="fta_trans_progress" class="form-control" autocomplete="off">
                                            <option>----</option>
                                            <option value="1" {{ $project->fta_trans_progress == 1 ? 'selected' : ''  }}>0%</option>
                                            <option value="2" {{ $project->fta_trans_progress == 2 ? 'selected' : ''  }}>30%</option>
                                            <option value="3" {{ $project->fta_trans_progress == 3 ? 'selected' : ''  }}>60%</option>
                                            <option value="4" {{ $project->fta_trans_progress == 4 ? 'selected' : ''  }}>90%</option>
                                            <option value="5" {{ $project->fta_trans_progress == 5 ? 'selected' : ''  }}>100%</option>
                                            <option value="6" {{ $project->fta_trans_progress == 6 ? 'selected' : ''  }}>N/A</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <select name="fta_trans_agency" class="form-control" autocomplete="off">
                                            <option>----</option>
                                            <option value="1" {{ $project->fta_trans_agency == 1 ? 'selected' : '' }}>TxDOT</option>
                                            <option value="2" {{ $project->fta_trans_agency == 2 ? 'selected' : '' }}>Local</option>
                                            <option value="3" {{ $project->fta_trans_agency == 3 ? 'selected' : '' }}>Other</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="fta_trans_comments" class="form-control" autocomplete="off" value="{{ $project->fta_trans_comments }}">
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col">
                                <a class="btn btn-primary btn-block" href="{{route('project.excel')}}" role="button">Export to Excel</a>
                            </div>
                            <div class="col">
                                <a class="btn btn-primary btn-block" href="{{route('project.pdf')}}" role="button">Export to PDF</a>
                            </div>
                            <div class="col">
                                <select name="status"  class="form-control" autocomplete="off">
                                    <option value="0" selected>Save Progress</option>
                                    <option value="1">Request PM Review</option>
                                </select>
                            </div>
                            <div class="col">
                                <button class="btn btn-primary btn-block mt-1 float-right">Submit</button>
                            </div>
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
@endsection
