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
                    <form action="{{ route('projects.store') }}" method="POST">
                        @csrf
                        <label>
                            MPO ID
                        </label>
                        <input type="text" class="form-control" name="mpo_id" title="Only MPO staff can fill this field." autocomplete="off" readonly>
                        
                        <label>
                            CSJ or CN
                        </label>
                        <input type="text" class="form-control" name="csj_cn" title = "Only MPO staff can fill this field." autocomplete="off" readonly>

                        <label>
                            Project Name
                        </label>
                        <input type="text" class="form-control" name="name" autocomplete="off">

                        <label>
                            Project Description
                        </label>
                        <input type="text" class="form-control" name="description" autocomplete="off">

                        <label>
                            Limit From
                        </label>
                        <input type="text" class="form-control" name="limit_from" autocomplete="off">

                        <label>
                            Limit To
                        </label>
                        <input type="text" class="form-control" name="limit_to" autocomplete="off">

                        <h4 class="mt-3">Definition of Regionally Significant Roadway: 23 CFR § 450.104</h4>
                        <p>Regionally significant project means a transportation project (other than projects that may be grouped in the TIP and/or STIP or exempt projects as defined in EPA's transportation conformity regulation (40 CFR part 93)) that is on a facility which serves regional transportation needs (such as access to and from the area outside the region; major activity centers in the region; major planned developments such as new retail malls, sports complexes, or employment centers; or transportation terminals) and would normally be included in the modeling of the metropolitan area's transportation network. At a minimum, this includes all principal arterial highways and all fixed guideway transit facilities that offer a significant alternative to regional highway travel. </p>

                        <label>
                            Describe the relationship of this project to the definition of Regionally Significant Roadway or exempt projects:
                        </label>
                        <textarea name="relationship_description" class="form-control"></textarea>

                        <label>
                            Need and Purpose:
                        </label>
                        <textarea name="need_purpose" class="form-control"></textarea>

                        <label>
                            Agency Comments:
                        </label>
                        <textarea name="agency_comments" class="form-control"></textarea>

                        <hr>

                        <label>
                            <input type="checkbox" name="hwrw_funds_request" autocomplete="off">
                            Requesting Highway/Roadway funds for this project/program (FHWA,State and/or Local Funds) 
                        </label>

                        <label>
                            <input type="checkbox" name="transit_funds_request" autocomplete="off">
                            Requesting Transit funds for his project/program (FTA, State and/or Local Funds) 
                        </label>

                        <br>

                        <div class="form-row">
                            <div class="col">
                                <label class="font-weight-bold">
                                    Federal Fiscal Year(FY):
                                </label>
                                <input type="number" name="fiscal_year" class="form-control" autocomplete="off">
                            </div>
                            <div class="col">
                                <label>
                                    Highway/Roadway Name:
                                </label>
                                <input type="text" name="hwrw_name" class="form-control" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <label>
                                    Network Year
                                </label>
                                <select name="network_year" class="form-control">
                                    <option></option>
                                    <option value="2020">2020</option>
                                    <option value="2030">2030</option>
                                    <option value="2040">2040</option>
                                    <option value="2045">2045</option>
                                </select>
                            </div>
                            <div class="col">
                                <label>
                                    Type of Project
                                </label>
                                <select name="type" class="form-control">
                                    <option></option>
                                    <option value="1">Additional Lanes</option>
                                    <option value="2">Aesthetics</option>
                                    <option value="3">Bikeway</option>
                                    <option value="4">Bus Purchase</option>
                                    <option value="5">Bus Service</option>
                                    <option value="6">Enhancements</option>
                                    <option value="7">inter-modal</option>
                                    <option value="8">ITS</option>
                                    <option value="9">Multi-modal</option>
                                    <option value="10">New Road</option>
                                    <option value="11">pedestrian</option>
                                    <option value="12">Plan</option>
                                    <option value="13">Port of Entry</option>
                                    <option value="14">Program</option>
                                    <option value="15">Rail</option>
                                    <option value="16">Rehabilitation</option>
                                    <option value="17">Signals</option>
                                    <option value="18">Study</option>
                                    <option value="19">Transit</option>
                                    <option value="20">Transit Terminal</option>
                                    <option value="21">Other, Specify</option>
                                  </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <label>
                                    <input type="checkbox" name="on_state" autocomplete="off">
                                    ON-State System Road
                                </label><br>
                                <label>
                                    <input type="checkbox" name="off_state" autocomplete="off">
                                    OFF-State System Road
                                </label><br>
                                <label>
                                    <input type="checkbox" name="capacity_project" autocomplete="off">
                                    Capacity Project (Additional through lanes)
                                </label>
                            </div>
                            <div class="col">
                                <label>
                                    Federal Functional Classificaiton (<a href="https://www.txdot.gov/apps/statewide_mapping/StatewidePlanningMap.html" target="_blank">Texas</a>, <a href="http://www.elpasompo.org/civicax/filebank/blobdload.aspx?BlobID=23410" target="_blank">New Mexico</a>):
                                </label>
                                <select name="classification" class="form-control">
                                    <option></option>
                                    <option value="1">Interstate</option>
                                    <option value="2">Freeway/Expressway</option>
                                    <option value="3">Principal Arterial</option>
                                    <option value="4">Minor Arterial</option>
                                    <option value="5">Major Collector</option>
                                    <option value="6">Minor Collector</option>
                                    <option value="7">Local</option>
                                    <option value="8">Other, specify</option>
                                    <option value="9">Not Federally Functional Classified</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <label>
                                    Number of Existing Lanes
                                </label>
                                <input type="number" name="existing_lanes" class="form-control" autocomplete="off">
                            </div>
                            <div class="col">
                                <label>
                                    DOT District:
                                </label>
                                <select name="district" class="form-control">
                                    <option></option>
                                    <option value="1">TX Dist.24</option>
                                    <option value="2">NM Dist. 1</option>
                                    <option value="3">NM Dist.2</option>
                                  </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <label>
                                    Number of Projected Lanes:
                                </label>
                                <input type="number" name="projected_lanes" class="form-control" autocomplete="off">
                            </div>
                            <div class="col">
                                <label>
                                    County:
                                </label>
                                <select name="county" class="form-control">
                                    <option></option>
                                    <option value="1">El Paso</option>
                                    <option value="2">Doña Ana</option>
                                    <option value="3">Otero</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <label>
                                    Number of Miles:
                                </label>
                                <input type="number" name="miles" class="form-control" autocomplete="off">
                            </div>
                            <div class="col">
                                <label>
                                    Incorporated City:
                                </label>
                                <select name="incorporated_city" class="form-control">
                                    <option></option>
                                    <option value="1">Anthony TX</option>
                                    <option value="2">Anthony NM</option>
                                    <option value="3">Clint</option>
                                    <option value="4">El Paso</option>
                                    <option value="5">Horizon City</option>
                                    <option value="6">Socorro</option>
                                    <option value="7">San Elizario</option>
                                    <option value="8">Sunland Park NM</option>
                                    <option value="9">Vinton, TX</option>
                                    <option value="10">N/A</option>
                                    <option value="11">Other</option>
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
                                <input type="text" name="sponsor_entity" class="form-control" autocomplete="off">
                            </div>
                        </div>

                        <a href="http://www.elpasompo.org/civicax/filebank/blobdload.aspx?BlobID=23410" target="_blank"> Click here for Project Selection Process diagram and presentation (PDF) </a>

                        <hr>

                        <h3>Project Selection Process</h3>

                        <div class="form-row mb-1">
                            <div class="col-sm-1">
                                <select name="psp_1" class="form-control">
                                    <option></option>
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                            <div class="col">
                                Will this project achieve a significant reduction in traffic fatalities or serious injuries? If yes, please provide link or attachment with supporting data 
                            </div>
                        </div>

                        <div class="form-row mb-1">
                            <div class="col-sm-1">
                                <select name="psp_2" class="form-control">
                                    <option></option>
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                            <div class="col">
                                Is this project from an updated comprehensive plan, thoroughfare plan, feasibility or corridor study? If yes, please provide link or attachment: Excerpt from corridor plan attached (too large to attach whole document) 
                            </div>
                        </div>

                        <div class="form-row mb-1">
                            <div class="col-sm-1">
                                <select name="psp_3" class="form-control">
                                    <option></option>
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                            <div class="col">
                                Is this project on the National Highway System NHS?
                            </div>
                        </div>

                        <div class="form-row mb-1">
                            <div class="col-sm-1">
                                <select name="psp_4" class="form-control">
                                    <option></option>
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                            <div class="col">
                                Will this project achieve a significant reduction in traffic fatalities or serious injuries? If yes, please provide link or attachment with supporting data
                            </div>
                        </div>

                        <div class="form-row mb-1">
                            <div class="col-sm-1">
                                <select name="psp_5" class="form-control">
                                    <option></option>
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                            <div class="col">
                                Is this project part of TPB resolution for the Active Transportation System?
                            </div>
                        </div>

                        <div class="form-row mb-1">
                            <div class="col-sm-1">
                                <select name="psp_6" class="form-control">
                                    <option></option>
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
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
                                    <input type="checkbox" name="goal_1" onclick="toggleTA(this.name);" autocomplete="off">
                                    Safety
                                </label><br>
                                <textarea name="description_goal_1" class="form-control" style="width: 22rem; display: none;" placeholder="How does this project meet this goal?"></textarea>
                                <label>
                                    <input type="checkbox" name="goal_2" onclick="toggleTA(this.name);" autocomplete="off">
                                    Infrastructure Condition
                                </label><br>
                                <textarea name="description_goal_2" class="form-control" style="width: 22rem; display: none;" placeholder="How does this project meet this goal?"></textarea>
                                <label>
                                    <input type="checkbox" name="goal_3" onclick="toggleTA(this.name);" autocomplete="off">
                                    Congestion Reduction
                                </label><br>
                                <textarea name="description_goal_3" class="form-control" style="width: 22rem; display: none;" placeholder="How does this project meet this goal?"></textarea>
                                <label>
                                    <input type="checkbox" name="goal_4" onclick="toggleTA(this.name);" autocomplete="off">
                                    System Reliability
                                </label><br>
                                <textarea name="description_goal_4" class="form-control" style="width: 22rem; display: none;" placeholder="How does this project meet this goal?"></textarea>
                                <label>
                                    <input type="checkbox" name="goal_5" onclick="toggleTA(this.name);" autocomplete="off">
                                    Freight Movement and Economic Vitality
                                </label><br>
                                <textarea name="description_goal_5" class="form-control" style="width: 22rem; display: none;" placeholder="How does this project meet this goal?"></textarea>
                                <label>
                                    <input type="checkbox" name="goal_6" onclick="toggleTA(this.name);" autocomplete="off">
                                    Environmental Sustainability
                                </label><br>
                                <textarea name="description_goal_6" class="form-control mb-1" style="width: 22rem; display: none;" placeholder="How does this project meet this goal?"></textarea>

                                <div class="card" style="width: 22rem;">
                                    <div class="card-body">

                                        <h5 class="card-title text-center">CMAQ Analysis</h5>
                                        <h6 class="card-subtitle mb-2 text-muted text-center">*Air Quality Analysis MUST accompany request for CMAQ Funds.</h6>

                                        <label>VOC (Kgs/day)</label>
                                        <input type="text" name="voc" class="form-control" autocomplete="off">
                                        <label>C0 (Kgs/day)</label>
                                        <input type="text" name="c0" class="form-control" autocomplete="off">
                                        <label>NOX (Kgs/day)</label>
                                        <input type="text" name="nox" class="form-control" autocomplete="off">
                                        <label>PM10 (Kgs/day)</label>
                                        <input type="text" name="pm10" class="form-control" autocomplete="off">
                                        <label>Prepared By</label>
                                        <input type="text" name="prepared_by" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <h3><a href="http://www.elpasompo.org/civicax/filebank/blobdload.aspx?BlobID=23375" target="_blank">Congestion Management Process Strategies</a></h3>
                                <label>
                                    <input type="checkbox" name="strategy_1" onclick="toggleTA(this.name);" autocomplete="off">
                                    Travel Demand Management Strategies
                                </label><br>
                                <textarea id = "description_strategy_1" name="description_strategy_1" class="form-control" style="width: 22rem; display: none;" placeholder="How does this project meet this strategy?"></textarea>
                                <label>
                                    <input type="checkbox" name="strategy_2" onclick="toggleTA(this.name);" autocomplete="off">
                                    Traffic Operations Strategies
                                </label><br>
                                <textarea  id = "description_strategy_2" name="description_strategy_2" class="form-control" style="width: 22rem; display: none;" placeholder="How does this project meet this strategy?"></textarea>
                                <label>
                                    <input type="checkbox" name="strategy_3" onclick="toggleTA(this.name);" autocomplete="off">
                                    Public Transportation Strategies
                                </label><br>
                                <textarea id = "description_strategy_3" name="description_strategy_3" class="form-control" style="width: 22rem; display: none;" placeholder="How does this project meet this strategy?"></textarea>
                                <label>
                                    <input type="checkbox" name="strategy_4" onclick="toggleTA(this.name);" autocomplete="off">
                                    System Reliability
                                </label><br>
                                <textarea id = "description_strategy_4" name="description_strategy_4" class="form-control" style="width: 22rem; display: none;" placeholder="How does this project meet this strategy?"></textarea>
                                <label>
                                    <input type="checkbox" name="strategy_5" onclick="toggleTA(this.name);" autocomplete="off">
                                    Road Capacity Strategies
                                </label><br>
                                <textarea id = "description_strategy_5" name="description_strategy_5" class="form-control" style="width: 22rem; display: none;" placeholder="How does this project meet this strategy?"></textarea>
                                <label>
                                    <input type="checkbox" name="strategy_6" onclick="toggleTA(this.name);" autocomplete="off">
                                    Non-CMP Strategies
                                </label><br>
                                <textarea id = "description_strategy_6" name="description_strategy_6" class="form-control mb-1" style="width: 22rem; display: none;" placeholder="How does this project meet this strategy?"></textarea>

                                <div class="card" style="width: 22rem;">
                                    <div class="card-body">

                                        <h5 class="card-title text-center">**Transit Only</h5>

                                        <label>Section 5309 ID</label>
                                        <input type="text" name="section_5309" class="form-control" autocomplete="off">
                                        <label>Apportionment Year</label>
                                        <input type="text" name="appointment_year" class="form-control" autocomplete="off">
                                        <label>TDC Award Amount</label>
                                        <input type="text" name="tdc_award_amount" class="form-control" autocomplete="off">
                                        <label>TDC Award Date</label>
                                        <input type="text" name="tdw_award_date" class="form-control" autocomplete="off">
                                        <label>TDC Amount Requested</label>
                                        <input type="text" name="tdc_amount_requested" class="form-control" autocomplete="off"><br>

                                        <h4>Project Type:</h4>

                                        <label>
                                            <input type="checkbox" name="type_capital" autocomplete="off">
                                            Capital
                                        </label><br>
                                        <label>
                                            <input type="checkbox" name="type_operating" autocomplete="off">
                                            Operating
                                        </label><br>
                                        <label>
                                            <input type="checkbox" name="type_planning" autocomplete="off">
                                            Planning
                                        </label><br>
                                        <label>
                                            <input type="checkbox" name="type_administration" autocomplete="off">
                                            Administration
                                        </label><br>
                                    </div>
                                </div>
                            </div>
                        </div>

                        Projects will be examined at the corridor level to determine multimodal needs. Which best describes this projects. <a href="http://www.elpasompo.org/civicax/filebank/blobdload.aspx?BlobID=23409" target="_blank">Block System:</a><br>

                        <label><input type="radio" name="block_system" value="1"> Within Community</label autocomplete="off">
                        <label><input type="radio" name="block_system" value="2"> Community to community</label autocomplete="off">
                        <label><input type="radio" name="block_system" value="3"> Community to region</label autocomplete="off">
                        <label><input type="radio" name="block_system" value="4"> Region to region</label autocomplete="off">

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
                                        <input type="date" name="schematic_start_date" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="schematic_end_date" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="col-sm-1">
                                        <select name="schematic_progress" class="form-control" autocomplete="off">
                                            <option></option>
                                            <option value="1">0%</option>
                                            <option value="2">30%</option>
                                            <option value="3">60%</option>
                                            <option value="4">90%</option>
                                            <option value="5">100%</option>
                                            <option value="6">N/A</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <select name="schematic_agency" class="form-control" autocomplete="off">
                                            <option></option>
                                            <option value="1">TxDOT</option>
                                            <option value="2">Local</option>
                                            <option value="3">Other</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="schematic_comments" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                                {{-- Env. Doc. Type --}}
                                <div class="form-row mb-1">
                                    <div class="col-sm-3">
                                        Env. Doc. Type
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="envdoctype_start_date" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="envdoctype_end_date" class="form-control" autocomplete="off" disabled>
                                    </div>
                                    <div class="col-sm-1">
                                        <select disabled name="envdoctype_progress" class="form-control" autocomplete="off">
                                            <option></option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <select disabled name="envdoctype_agency" class="form-control" autocomplete="off">
                                            <option></option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="envdoctype_comments" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                                {{-- Environmental Doc --}}
                                <div class="form-row mb-1">
                                    <div class="col-sm-3">
                                        Environmental Doc
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="envdoc_start_date" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="envdoc_end_date" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="col-sm-1">
                                        <select name="envdoc_progress" class="form-control" autocomplete="off">
                                            <option></option>
                                            <option value="1">0%</option>
                                            <option value="2">30%</option>
                                            <option value="3">60%</option>
                                            <option value="4">90%</option>
                                            <option value="5">100%</option>
                                            <option value="6">N/A</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <select name="envdoc_agency" class="form-control" autocomplete="off">
                                            <option></option>
                                            <option value="1">TxDOT</option>
                                            <option value="2">Local</option>
                                            <option value="3">Other</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="envdoc_comments" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                                {{-- PS&E --}}
                                <div class="form-row mb-1">
                                    <div class="col-sm-3">
                                        PS&E
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="pse_start_date" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="pse_end_date" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="col-sm-1">
                                        <select name="pse_progress" class="form-control" autocomplete="off">
                                            <option></option>
                                            <option value="1">0%</option>
                                            <option value="2">30%</option>
                                            <option value="3">60%</option>
                                            <option value="4">90%</option>
                                            <option value="5">100%</option>
                                            <option value="6">N/A</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <select name="pse_agency" class="form-control" autocomplete="off">
                                            <option></option>
                                            <option value="1">TxDOT</option>
                                            <option value="2">Local</option>
                                            <option value="3">Other</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="pse_comments" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                                {{-- ROW Map --}}
                                <div class="form-row mb-1">
                                    <div class="col-sm-3">
                                        ROW Map(s)
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="rowmap_start_date" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="rowmap_end_date" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="col-sm-1">
                                        <select name="rowmap_progress" class="form-control" autocomplete="off">
                                            <option></option>
                                            <option value="1">0%</option>
                                            <option value="2">30%</option>
                                            <option value="3">60%</option>
                                            <option value="4">90%</option>
                                            <option value="5">100%</option>
                                            <option value="6">N/A</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <select name="rowmap_agency" class="form-control" autocomplete="off">
                                            <option></option>
                                            <option value="1">TxDOT</option>
                                            <option value="2">Local</option>
                                            <option value="3">Other</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="rowmap_comments" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                                {{-- ROW Acquired --}}
                                <div class="form-row mb-1">
                                    <div class="col-sm-3">
                                        ROW Acquired
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="rowacq_start_date" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="rowacq_end_date" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="col-sm-1">
                                        <select name="rowacq_progress" class="form-control" autocomplete="off">
                                            <option></option>
                                            <option value="1">0%</option>
                                            <option value="2">30%</option>
                                            <option value="3">60%</option>
                                            <option value="4">90%</option>
                                            <option value="5">100%</option>
                                            <option value="6">N/A</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <select name="rowacq_agency" class="form-control" autocomplete="off">
                                            <option></option>
                                            <option value="1">TxDOT</option>
                                            <option value="2">Local</option>
                                            <option value="3">Other</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="rowacq_comments" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                                {{-- Utilities --}}
                                <div class="form-row mb-1">
                                    <div class="col-sm-3">
                                        Utilities
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="utilities_start_date" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="utilities_end_date" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="col-sm-1">
                                        <select name="utilities_progress" class="form-control" autocomplete="off">
                                            <option></option>
                                            <option value="1">0%</option>
                                            <option value="2">30%</option>
                                            <option value="3">60%</option>
                                            <option value="4">90%</option>
                                            <option value="5">100%</option>
                                            <option value="6">N/A</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <select name="utilities_agency" class="form-control" autocomplete="off">
                                            <option></option>
                                            <option value="1">TxDOT</option>
                                            <option value="2">Local</option>
                                            <option value="3">Other</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="utilities_comments" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                                {{-- Public Involvement --}}
                                <div class="form-row mb-1">
                                    <div class="col-sm-3">
                                        Public Involvement
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="pubinv_start_date" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="pubinv_end_date" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="col-sm-1">
                                        <select name="pubinv_progress" class="form-control" autocomplete="off">
                                            <option></option>
                                            <option value="1">0%</option>
                                            <option value="2">30%</option>
                                            <option value="3">60%</option>
                                            <option value="4">90%</option>
                                            <option value="5">100%</option>
                                            <option value="6">N/A</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <select name="pubinv_agency" class="form-control" autocomplete="off">
                                            <option></option>
                                            <option value="1">TxDOT</option>
                                            <option value="2">Local</option>
                                            <option value="3">Other</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="pubinv_comments" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                                {{-- District Review --}}
                                <div class="form-row mb-1">
                                    <div class="col-sm-3">
                                        District Review
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="distrev_start_date" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="distrev_end_date" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="col-sm-1">
                                        <select name="distrev_progress" class="form-control" autocomplete="off">
                                            <option></option>
                                            <option value="1">0%</option>
                                            <option value="2">30%</option>
                                            <option value="3">60%</option>
                                            <option value="4">90%</option>
                                            <option value="5">100%</option>
                                            <option value="6">N/A</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <select name="distrev_agency" class="form-control" autocomplete="off">
                                            <option></option>
                                            <option value="1">TxDOT</option>
                                            <option value="2">Local</option>
                                            <option value="3">Other</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="distrev_comments" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                                {{-- Agreement --}}
                                <div class="form-row mb-1">
                                    <div class="col-sm-3">
                                        Agreement (LPFA)
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="agree_start_date" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="agree_end_date" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="col-sm-1">
                                        <select name="agree_progress" class="form-control" autocomplete="off">
                                            <option></option>
                                            <option value="1">0%</option>
                                            <option value="2">30%</option>
                                            <option value="3">60%</option>
                                            <option value="4">90%</option>
                                            <option value="5">100%</option>
                                            <option value="6">N/A</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <select name="agree_agency" class="form-control" autocomplete="off">
                                            <option></option>
                                            <option value="1">TxDOT</option>
                                            <option value="2">Local</option>
                                            <option value="3">Other</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="agree_comments" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                                {{-- Procurement Process --}}
                                <div class="form-row mb-1">
                                    <div class="col-sm-3">
                                        Procurement Process
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="procpro_start_date" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="procpro_end_date" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="col-sm-1">
                                        <select name="procpro_progress" class="form-control" autocomplete="off">
                                            <option></option>
                                            <option value="1">0%</option>
                                            <option value="2">30%</option>
                                            <option value="3">60%</option>
                                            <option value="4">90%</option>
                                            <option value="5">100%</option>
                                            <option value="6">N/A</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <select name="procpro_agency" class="form-control" autocomplete="off">
                                            <option></option>
                                            <option value="1">TxDOT</option>
                                            <option value="2">Local</option>
                                            <option value="3">Other</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="procpro_comments" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                                {{-- Let Date --}}
                                <div class="form-row mb-1">
                                    <div class="col-sm-3">
                                        Let Date
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="letdate_start_date" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="letdate_end_date" class="form-control" autocomplete="off" readonly>
                                    </div>
                                    <div class="col-sm-1">
                                        <select disabled name="letdate_progress" class="form-control" autocomplete="off">
                                            <option></option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <select disabled name="letdate_agency" class="form-control" autocomplete="off">
                                            <option></option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="letdate_comments" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                                {{-- Construction Performance End Date --}}
                                <div class="form-row mb-1">
                                    <div class="col-sm-3">
                                        Construction Performance End Date
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="consper_end_date_start_date" class="form-control" autocomplete="off" disabled>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="consper_end_date_end_date" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="col-sm-1">
                                        <select disabled name="consper_end_date_progress" class="form-control" autocomplete="off">
                                            <option></option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <select disabled name="consper_end_date_agency" class="form-control" autocomplete="off">
                                            <option></option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="consper_end_date_comments" class="form-control" autocomplete="off" disabled>
                                    </div>
                                </div>
                                {{-- PE Performance --}}
                                <div class="form-row mb-1">
                                    <div class="col-sm-3">
                                        PE Performance End Date
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="peperf_start_date" class="form-control" autocomplete="off" disabled>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="peperf_end_date" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="col-sm-1">
                                        <select disabled name="peperf_progress" class="form-control" autocomplete="off">
                                            <option></option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <select disabled name="peperf_agency" class="form-control" autocomplete="off">
                                            <option></option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="peperf_comments" class="form-control" autocomplete="off" readonly>
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
                                        <input type="date" name="fta_trans_start_date" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="fta_trans_end_date" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="col-sm-1">
                                        <select name="fta_trans_progress" class="form-control" autocomplete="off">
                                            <option></option>
                                            <option value="1">0%</option>
                                            <option value="2">30%</option>
                                            <option value="3">60%</option>
                                            <option value="4">90%</option>
                                            <option value="5">100%</option>
                                            <option value="6">N/A</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <select name="fta_trans_agency" class="form-control" autocomplete="off">
                                            <option></option>
                                            <option value="1">TxDOT</option>
                                            <option value="2">Local</option>
                                            <option value="3">Other</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="fta_trans_comments" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                                {{--Active FTA--}}
                                <div class="form-row mb-1">
                                    <div class="col-sm-3">
                                        Active in FTA System
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="active_fta_start_date" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="active_fta_end_date" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="col-sm-1">
                                        <select name="active_fta_progress" class="form-control" autocomplete="off">
                                            <option></option>
                                            <option value="1">0%</option>
                                            <option value="2">30%</option>
                                            <option value="3">60%</option>
                                            <option value="4">90%</option>
                                            <option value="5">100%</option>
                                            <option value="6">N/A</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <select name="active_fta_agency" class="form-control" autocomplete="off">
                                            <option></option>
                                            <option value="1">TxDOT</option>
                                            <option value="2">Local</option>
                                            <option value="3">Other</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="active_fta_comments" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                                {{--Bus Purchase--}}
                                <div class="form-row mb-1">
                                    <div class="col-sm-3">
                                        Contract Excluded for Bus Purchase
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="bus_start_date" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="bus_end_date" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="col-sm-1">
                                        <select name="bus_progress" class="form-control" autocomplete="off">
                                            <option></option>
                                            <option value="1">0%</option>
                                            <option value="2">30%</option>
                                            <option value="3">60%</option>
                                            <option value="4">90%</option>
                                            <option value="5">100%</option>
                                            <option value="6">N/A</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <select name="bus_agency" class="form-control" autocomplete="off">
                                            <option></option>
                                            <option value="1">TxDOT</option>
                                            <option value="2">Local</option>
                                            <option value="3">Other</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="bus_comments" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                                {{--Bus Delivery--}}
                                <div class="form-row mb-1">
                                    <div class="col-sm-3">
                                        Bus Delivery Date
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="delivery_start_date" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="delivery_end_date" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="col-sm-1">
                                        <select name="delivery_progress" class="form-control" autocomplete="off">
                                            <option></option>
                                            <option value="1">0%</option>
                                            <option value="2">30%</option>
                                            <option value="3">60%</option>
                                            <option value="4">90%</option>
                                            <option value="5">100%</option>
                                            <option value="6">N/A</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <select name="delivery_agency" class="form-control" autocomplete="off">
                                            <option></option>
                                            <option value="1">TxDOT</option>
                                            <option value="2">Local</option>
                                            <option value="3">Other</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="delivery_comments" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                                {{--Other--}}
                                <div class="form-row mb-1">
                                    <div class="col-sm-3">
                                        Other
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="other_start_date" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="other_end_date" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="col-sm-1">
                                        <select name="other_progress" class="form-control" autocomplete="off">
                                            <option></option>
                                            <option value="1">0%</option>
                                            <option value="2">30%</option>
                                            <option value="3">60%</option>
                                            <option value="4">90%</option>
                                            <option value="5">100%</option>
                                            <option value="6">N/A</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <select name="other_agency" class="form-control" autocomplete="off">
                                            <option></option>
                                            <option value="1">TxDOT</option>
                                            <option value="2">Local</option>
                                            <option value="3">Other</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="other_comments" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                                {{--Reviewed Dates--}}
                                <div class="form-row mb-1">
                                    <div class="col-sm-3">
                                        Have the above dates been reviewed by TXDOT or NMDOT
                                    </div>
                                    <div class="col-sm-2">
                                        <label>
                                            <input type="checkbox" name="reviewed_yes" autocomplete="off">
                                                Yes
                                        </label><br>
                                    </div>
                                    <div class="col-sm-2">
                                        <label>
                                            <input type="checkbox" name="reviewed_no" autocomplete="off">
                                                No
                                        </label><br>
                                    </div>
                                    <div class="col-sm-2">
                                        <label>
                                            <input type="checkbox" name="reviewed_na" autocomplete="off">
                                                N/A
                                        </label><br>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="date_reviewed">Date Reviewed</label>
                                        <input type="date" name="date_reviewed" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        {{--Project Phases and Cost--}}
                        <div class="form-row mb-1">
                            <div class="col">
                                <h3>Project Phase(s)</h3>
                                <p>**Only checked phase(s) will be consider for funding (Year of Expenditure (YOE)
                                    Cost). If a phase has been or will be completed with local funds or resources,
                                    please do not check. Please enter cost information for each Phase checked.</p>
                                <label>
                                    <input type="checkbox" name="fta_transfer" autocomplete="off">
                                    FTA Transfer Requested
                                </label><br>
                                <label>
                                    <input type="checkbox" name="c" autocomplete="off">
                                    C
                                </label><br>
                                <label>
                                    <input type="checkbox" name="nonc" autocomplete="off">
                                    Non-C
                                </label><br>
                                <label>
                                    <input type="checkbox" name="pe" autocomplete="off">
                                    PE
                                </label><br>
                                <label>
                                    <input type="checkbox" name="env" autocomplete="off">
                                    E:Env
                                </label><br>
                                <label>
                                    <input type="checkbox" name="eng" autocomplete="off">
                                    E:Eng
                                </label><br>
                                <label>
                                    <input type="checkbox" name="r" autocomplete="off">
                                    R
                                </label><br>
                                <label>
                                    <input type="checkbox" name="acq" autocomplete="off">
                                    R:Acq
                                </label><br>
                                <label>
                                    <input type="checkbox" name="utl" autocomplete="off">
                                    R:Utl
                                </label><br>
                            </div>
                            <div class="col">
                                <h3>YOE and Total Project Cost Information</h3>
                                <p>**All Costs should account for inflation within TIP years.
                                    Beyond TIP years inflation will be applied.
                                    <br>
                                    **For Total Project Cost include all cost, whether it is a phase of the project or not.
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
                                                    <input id = "yoe_cs_tot" type="number" name="subtotal_amount" title = "Sumation of first five(5) categories."
                                                    class="form-control" readonly>
                                                </div>
                                            </div>
                                        <div id = "Yoe_cost">
                                            {{--Non-Construction--}}
                                            <div class="form-row mb-1">
                                                <div class="col-sm-6">
                                                    Non-Construction Project
                                                </div>
                                                <div class="col-sm-6">
                                                    <input onchange="yoe_table()" id = "yoe_cs_1" type="number" name="non_construction_amount" class="form-control">
                                                </div>
                                            </div>
                                            {{--Construction--}}
                                            <div class="form-row mb-1">
                                                <div class="col-sm-6">
                                                    Construction
                                                </div>
                                                <div class="col-sm-6">
                                                    <input onchange="yoe_table()" id = "yoe_cs_2" type="number" name="construction_amount" class="form-control">
                                                </div>
                                            </div>
                                            {{--CE--}}
                                            <div class="form-row mb-1">
                                                <div class="col-sm-6">
                                                    Construction Engineering (CE)
                                                </div>
                                                <div class="col-sm-6">
                                                    <input onchange="yoe_table()" id = "yoe_cs_3" type="number" name="ce_amount" class="form-control">
                                                </div>
                                            </div>
                                            {{--Contingencies--}}
                                            <div class="form-row mb-1">
                                                <div class="col-sm-6">
                                                    Contingencies
                                                </div>
                                                <div class="col-sm-6">
                                                    <input onchange="yoe_table()" id = "yoe_cs_4" type="number" name="contingencies_amount" class="form-control">
                                                </div>
                                            </div>
                                            {{--Change Order--}}
                                            <div class="form-row mb-1">
                                                <div class="col-sm-6">
                                                    Potential Change Order
                                                </div>
                                                <div class="col-sm-6">
                                                    <input onchange="yoe_table()" id = "yoe_cs_5" type="number" name="change_order_amount" class="form-control">
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
                                                    <input onchange="yoe_table()" type="number" name="PE_amount" class="form-control">
                                                </div>
                                            </div>
                                            {{--Indirects--}}
                                            <div class="form-row mb-1">
                                                <div class="col-sm-6">
                                                    Indirects
                                                </div>
                                                <div class="col-sm-6">
                                                    <input onchange="yoe_table()" type="number" name="indirects_amount" class="form-control">
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
                                                    <input onchange="yoe_table()"  type="number" name="ROW_amount" class="form-control">
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
                                                    <input onchange="yoe_table()" type="number" name="transfer_amount" class="form-control">
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
                                                <input id= "tot_yoe" type="number" name="total_amount" title = "Sumation of all fields." class="form-control" readonly>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--Cost Selections--}}
                        <div class="form-row mb-1">
                            <div class="col-sm-1">
                                <select name="costs_1" class="form-control">
                                    <option></option>
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                            <div class="col">
                                Is the sponsor paying for 100% of PE?
                            </div>
                        </div>

                        <div class="form-row mb-1">
                            <div class="col-sm-1">
                                <select name="costs_2" class="form-control">
                                    <option></option>
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                            <div class="col">
                                Is this sponsor paying for 100% of the ROW and utility relocation?
                            </div>
                        </div>

                        <div class="form-row mb-1">
                            <div class="col-sm-1">
                                <select name="costs_3" class="form-control">
                                    <option></option>
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
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
                                <select name="costs_4" class="form-control">
                                    <option></option>
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                            <div class="col">
                                Sponsor's investment to construction cost. (Excluding required local/state share)
                            </div>
                        </div>
                        {{--Project Funding--}}
                        <h3>Project Funding</h3>
                        <label>
                            <input type="checkbox" name="mpo_funds" autocomplete="off">
                            Requesting MPO Funds (For long range planning, beyond TIP years, funding category may not be identified, MPO will make final recommendation)
                        </label><br>
                        <label>
                            <input type="number" name="yoe_cost" id = "yoe_check" autocomplete="off" readonly>
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
                                <div id = "project_funding">
                                    <div class="form-row mb-1">
                                            <table id = "projectFundingTablePg1">
                                                <tr id='pfrow' class ="pftpg1">
                                                    <td><input type="text" name="funding_category[]" class="form-control"></td>
                                                    <td><input onchange="project_funding_table()" id="federal" type="number" name="funding_federal[]" class="form-control"></td>
                                                    <td><input onchange="project_funding_table()" id="state" type="number" name="funding_state[]" class="form-control"></td>
                                                    <td><input onchange="project_funding_table()" id="local" type="number" name="funding_local[]" class="form-control"></td>
                                                    <td><input onchange="project_funding_table()" id="local_cont" type="number" name="funding_local_beyond[]" class="form-control"></td>
                                                    <td><input type="number" name="funding_total" id="pftpg1_tot0" class="form-control" readonly></td>
                                                </tr>
                                            </table>
                                    </div>
                                </div>
                                
                                <div id = "" class="form-row mb-1">
                                    <div class="col-sm-2">
                                        Total Funding By Share
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="number" name="funding_federal_result" id = "federal_total" class="form-control" readonly>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="number" name="funding_state_result" id="state_total" class="form-control" readonly>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="number" name="funding_local_result" id="local_total" class="form-control" readonly>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="number" name="funding_local_beyond_result" id="local_beyond_total" class="form-control" readonly>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="number" name="funding_total_result" id ="total_total" class="form-control" readonly>
                                    </div>
                                </div>
                                <a onclick = "addRow()"class="btn btn-primary" title="Add a new row." role="button">Add Funding</a>
                                <a class="btn btn-primary" title="Delete the last row." role="button">Remove Funding</a>
                            </div>
                        </div>
                        <br>
                        {{--Contact Information--}}
                        <h3>Contact Information</h3>
                        <div class="card">
                            <div class="card-header">
                                <div class="form-row">
                                    <div class="col-sm-2">
                                    </div>
                                    <div class="col-sm-2">
                                        Name
                                    </div>
                                    <div class="col-sm-2">
                                        Phone No.
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
                                        Local PM
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="local_pm_name" class="form-control">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="tel" name="local_pm_phone" class="form-control">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="email" name="local_pm_email" class="form-control">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="local_pm_agency" class="form-control">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="local_pm_title" class="form-control">
                                    </div>
                                </div>
                                <div class="form-row mb-1">
                                    <div class="col-sm-2">
                                        State PM
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="state_pm_name" class="form-control">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="tel" name="state_pm_phone" class="form-control">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="email" name="state_pm_email" class="form-control">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="state_pm_agency" class="form-control">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="state_pm_title" class="form-control">
                                    </div>
                                </div>
                                <div class="form-row mb-1">
                                    <div class="col-sm-2">
                                        Sponsor
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="sponsor_name" class="form-control">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="tel" name="sponsor_phone" class="form-control">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="email" name="sponsor_email" class="form-control">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="sponsor_agency" class="form-control">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="sponsor_title" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <h3>Attachments (CMAQ Analysis, Cost Estimate, Schematic/Design Concept, etc. ).</h3>
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
                        <p>*Please attach any supporting documents to this form, if possible (CMAQ Analysis, Cost Estimate, Environmental Document, or other).
                            <br>
                            *Only Adobe Acrobat users may be able to attach files to this form. If you are not able to attach files, please send them via e-mail.
                            <br>
                            *This form does not guarantee the funds requested nor the approval of the project in the MTP/TIP.
                            <br>
                            *By signing this Project Request Form you certify that the project Description and limits are within the scope of work of the project
                        </p>
                        <p>*Please fill out this form entirely, and sign (digital signature). If "Signed By" field is blank, the form will not be accepted.</p>
                        <h4>Signed By</h4>
                        @auth
                            @if(auth()->user()->type < 3)
                                <div class="form-group">
                                    <input type="text" name="signature" class="form-control" autocomplete="off">
                                </div>
                            @else
                                <div class="form-group">
                                    <input type="text" name="signature" class="form-control" autocomplete="off" title="Only a submitter can sign" readonly>
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
                                <select name="status"  class="form-control" autocomplete="off">
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // const toggleTA = (name) => {
    //     if($('input[name="'+ name +'"]').is(':checked')) {
    //         console.log('checked');
    //         $('textarea[name="description_'+ name +'"]').show();
    //     }else{
    //         console.log('not checked');
    //         $('textarea[name="description_'+ name +'"]').hide();
    //     }
    // };
</script>
<script src="{{ asset('docs/js/form1FrontEndLogic.js')}}"></script>
<style>
    button{
        margin:1%;
    }
</style>

@endsection