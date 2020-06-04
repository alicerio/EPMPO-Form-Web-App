<div class="card">
    <h4 class="mt-3">Definition of Regionally Significant Roadway: 23 CFR § 450.104</h4>
    <p>Regionally significant project means a transportation project (other than projects that may be
        grouped in the TIP and/or STIP or exempt projects as defined in EPA's transportation conformity
        regulation (40 CFR part 93)) that is on a facility which serves regional transportation needs (such
        as access to and from the area outside the region; major activity centers in the region; major
        planned developments such as new retail malls, sports complexes, or employment centers; or
        transportation terminals) and would normally be included in the modeling of the metropolitan area's
        transportation network. At a minimum, this includes all principal arterial highways and all fixed
        guideway transit facilities that offer a significant alternative to regional highway travel. </p>

    <label>
        Describe the relationship of this project to the definition of Regionally Significant Roadway or
        exempt projects:
    </label>
    <textarea disabled name="relationship_description"
        class="form-control">{{ $project->relationship_description ?? ''}}</textarea>

    <label>
        Need and Purpose:
    </label>
    <textarea disabled name="need_purpose" class="form-control">{{ $project->need_purpose ?? '' }}</textarea>

    <label>
        Agency Comments:
    </label>
    <textarea disabled name="agency_comments" class="form-control">{{ $project->agency_comments ?? '' }}</textarea value="{{ $project->form ?? ''}}">

                    <label>
                        <input type="checkbox" name="hwrw_funds_request" autocomplete="off" {{$project->hwrw_funds_request ?? '' == true ? 'checked' : '' }} disabled>
                        Requesting Highway/Roadway funds for this project/program (FHWA,State and/or Local Funds) 
                    </label>

                    <label>
                        <input type="checkbox" name="transit_funds_request" autocomplete="off" {{ $project->transit_funds_request ?? '' == true ? 'checked' : '' }} disabled>
                        Requesting Transit funds for his project/program (FTA, State and/or Local Funds) 
                    </label>

                    <br>

                    <div class="form-row">
                        <div class="col">
                            <label class="font-weight-bold">
                                Federal Fiscal Year(FY):
                            </label>
                            <input type="number" name="fiscal_year" class="form-control" autocomplete="off" value="{{ $project->fiscal_year ?? '' }}" disabled>
                        </div>
                        <div class="col">
                            <label>
                                Highway/Roadway Name:
                            </label>
                            <input type="text" name="hwrw_name" class="form-control" autocomplete="off" value="{{ $project->hwrw_name ?? ''}}" disabled>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <label>
                                Network Year
                            </label>
                            <select disabled name="network_year" class="form-control">
                                <option>----</option>
                                <option value="2020" {{ $project->network_year ?? '' == 2020 ? 'selected' : ''}}>2020</option>
                                <option value="2030" {{ $project->network_year ?? '' == 2030 ? 'selected' : ''}}>2030</option>
                                <option value="2040" {{ $project->network_year ?? '' == 2040 ? 'selected' : ''}}>2040</option>
                                <option value="2045" {{ $project->network_year ?? '' == 2045 ? 'selected' : ''}}>2045</option>
                            </select>
                        </div>
                        <div class="col">
                            <label>
                                Type of Project
                            </label>
                            <select disabled name="type" class="form-control">
                                <option>----</option>
                                <option value="1" {{ $project->type ?? '' == 1 ? 'selected' : '' }}>Additional Lanes</option>
                                <option value="2" {{ $project->type ?? '' == 2 ? 'selected' : '' }}>Aesthetics</option>
                                <option value="3" {{ $project->type ?? '' == 3 ? 'selected' : '' }}>Bikeway</option>
                                <option value="4" {{ $project->type ?? '' == 4 ? 'selected' : '' }}>Bus Purchase</option>
                                <option value="5" {{ $project->type ?? '' == 5 ? 'selected' : '' }}>Bus Service</option>
                                <option value="6" {{ $project->type ?? '' == 6 ? 'selected' : '' }}>Enhancements</option>
                                <option value="7" {{ $project->type ?? '' == 7 ? 'selected' : '' }}>inter-modal</option>
                                <option value="8" {{ $project->type ?? '' == 8 ? 'selected' : '' }}>ITS</option>
                                <option value="9" {{ $project->type ?? '' == 9 ? 'selected' : '' }}>Multi-modal</option>
                                <option value="10" {{ $project->type ?? '' == 10 ? 'selected' : '' }}>New Road</option>
                                <option value="11" {{ $project->type ?? '' == 11 ? 'selected' : '' }}>pedestrian</option>
                                <option value="12" {{ $project->type ?? '' == 12 ? 'selected' : '' }}>Plan</option>
                                <option value="13" {{ $project->type ?? '' == 13 ? 'selected' : '' }}>Port of Entry</option>
                                <option value="14" {{ $project->type ?? '' == 14 ? 'selected' : '' }}>Program</option>
                                <option value="15" {{ $project->type ?? '' == 15 ? 'selected' : '' }}>Rail</option>
                                <option value="16" {{ $project->type ?? '' == 16 ? 'selected' : '' }}>Rehabilitation</option>
                                <option value="17" {{ $project->type ?? '' == 17 ? 'selected' : '' }}>Signals</option>
                                <option value="18" {{ $project->type ?? '' == 18 ? 'selected' : '' }}>Study</option>
                                <option value="19" {{ $project->type ?? '' == 19 ? 'selected' : '' }}>Transit</option>
                                <option value="20" {{ $project->type ?? '' == 20 ? 'selected' : '' }}>Transit Terminal</option>
                                <option value="21" {{ $project->type ?? '' == 21 ? 'selected' : '' }}>Other, Specify</option>
                              </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <label>
                                <input type="checkbox" name="on_state" autocomplete="off" {{ $project->on_state ?? '' == true ? 'checked' : '' }} disabled>
                                ON-State System Road
                            </label><br>
                            <label>
                                <input type="checkbox" name="off_state" autocomplete="off" {{ $project->off_state ?? '' == true ? 'checked' : '' }} disabled>
                                OFF-State System Road
                            </label><br>
                            <label>
                                <input type="checkbox" name="capacity_project" autocomplete="off" {{ $project->capacity_project ?? '' == true ? 'checked' : '' }} disabled>
                                Capacity Project (Additional through lanes)
                            </label>
                        </div>
                        <div class="col">
                            <label>
                                Fedearl Functional Classificaiton (<a href="https://www.txdot.gov/apps/statewide_mapping/StatewidePlanningMap.html" target="_blank">Texas</a>, <a href="http://www.elpasompo.org/civicax/filebank/blobdload.aspx?BlobID=23410" target="_blank">New Mexico</a>):
                            </label>
                            <select disabled name="classification" class="form-control">
                                <option>----</option>
                                <option value="1" {{ $project->classification ?? '' == 1 ? 'selected' : '' }}>Interstate</option>
                                <option value="2" {{ $project->classification ?? '' == 2 ? 'selected' : '' }}>Freeway/Expressway</option>
                                <option value="3" {{ $project->classification ?? '' == 3 ? 'selected' : '' }}>Principal Arterial</option>
                                <option value="4" {{ $project->classification ?? '' == 4 ? 'selected' : '' }}>Minor Arterial</option>
                                <option value="5" {{ $project->classification ?? '' == 5 ? 'selected' : '' }}>Major Collector</option>
                                <option value="6" {{ $project->classification ?? '' == 6 ? 'selected' : '' }}>Minor Collector</option>
                                <option value="7" {{ $project->classification ?? '' == 7 ? 'selected' : '' }}>Local</option>
                                <option value="8" {{ $project->classification ?? '' == 8 ? 'selected' : '' }}>Other, specift</option>
                                <option value="9" {{ $project->classification ?? '' == 9 ? 'selected' : '' }}>Not Federally Functional Classified</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <label>
                                Number of Existing Lanes
                            </label>
                            <input type="number" name="existing_lanes" class="form-control" autocomplete="off" value="{{ $project->existing_lanes  ?? ''}}" disabled>
                        </div>
                        <div class="col">
                            <label>
                                DOT District:
                            </label>
                            <select disabled name="district" class="form-control">
                                <option>----</option>
                                <option value="1" {{ $project->district ?? '' == 1 ? 'selected' : '' }}>TX Dist.24</option>
                                <option value="2" {{ $project->district ?? '' == 2 ? 'selected' : '' }}>NM Dist. 1</option>
                                <option value="3" {{ $project->district ?? '' == 3 ? 'selected' : '' }}>NM Dist.2</option>
                              </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <label>
                                Number of Projected Lanes:
                            </label>
                            <input type="number" name="projected_lanes" class="form-control" autocomplete="off" value="{{ $project->projected_lanes  ?? ''}}" disabled>
                        </div>
                        <div class="col">
                            <label>
                                County:
                            </label>
                            <select disabled name="county" class="form-control">
                                <option>----</option>
                                <option value="1" {{ $project->county ?? '' == 1 ? 'selected' : '' }}>El Paso</option>
                                <option value="2" {{ $project->county ?? '' == 2 ? 'selected' : '' }}>Doña Ana</option>
                                <option value="3" {{ $project->county ?? '' == 3 ? 'selected' : '' }}>Otero</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <label>
                                Number of Miles:
                            </label>
                            <input type="number" name="miles" class="form-control" autocomplete="off" value="{{ $project->miles  ?? ''}}" disabled>
                        </div>
                        <div class="col">
                            <label>
                                Incorporated City:
                            </label>
                            <select disabled name="incorporated_city" class="form-control">
                                <option>----</option>
                                <option value="1" {{ $project->incorporated_city ?? '' == 1 ? 'selected' : '' }}>Anthony TX</option>
                                <option value="2" {{ $project->incorporated_city ?? '' == 2 ? 'selected' : '' }}>Anthony NM</option>
                                <option value="3" {{ $project->incorporated_city ?? '' == 3 ? 'selected' : '' }}>Clint</option>
                                <option value="4" {{ $project->incorporated_city ?? '' == 4 ? 'selected' : '' }}>El Paso</option>
                                <option value="5" {{ $project->incorporated_city ?? '' == 5 ? 'selected' : '' }}>Horizon City</option>
                                <option value="6" {{ $project->incorporated_city ?? '' == 6 ? 'selected' : '' }}>Socorro</option>
                                <option value="7" {{ $project->incorporated_city ?? '' == 7 ? 'selected' : '' }}>San Elizario</option>
                                <option value="8" {{ $project->incorporated_city ?? '' == 8 ? 'selected' : '' }}>Sunland Park NM</option>
                                <option value="9" {{ $project->incorporated_city ?? '' == 9 ? 'selected' : '' }}>Vinton, TX</option>
                                <option value="10" {{ $project->incorporated_city ?? '' == 10 ? 'selected' : ''  ?? ''}}">N/A</option>
                                <option value="11" {{ $project->incorporated_city ?? '' == 11 ? 'selected' : ''  ?? ''}}">Other</option>
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
                        <input type="text" name="sponsor_entity" class="form-control" autocomplete="off" value="{{ $project->sponsor_entity ?? '' }}" disabled>
                        </div>
                    </div>

                    <a href="http://www.elpasompo.org/civicax/filebank/blobdload.aspx?BlobID=23410"> Click here for Project Selection Process diagram and presentation (PDF) </a>
        </div>