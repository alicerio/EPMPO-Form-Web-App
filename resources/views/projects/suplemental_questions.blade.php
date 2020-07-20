<div id="suppQ" style="display:none;">
    <h4>Transportation Demand Management Strategies</h4>
    <div class="form-row mb-1">
        <div class="col">
            <p>Does the project strongly support or enhance travel demand management programs that 
                are already in place and that have regional significance?</p>
            <textarea id="description_sqq_1" name="description_sqq_1" class="form-control"
                placeholder="Please explain." style="width: 22rem;{{ $project->description_sqq_1 ?? '' == 1 ? '' : 'display: none;' }}">{{ $project->description_sqq_1 ?? '' }}</textarea>
        </div>
        <div class="col-sm-2">
            <select disabled name="sqq_1" id="sqq_1" class="form-control"
                onchange="displayBox(this.name);">
                <option></option>
                {{$temp = $project->sqq_1 ?? ''}}
                <option value="1" {{ $temp == 1 ? 'selected' : '' }}>Yes</option>
                <option value="2" {{ $temp == 2 ? 'selected' : '' }}>No</option>
            </select>
        </div>
    </div>

    <div class="form-row mb-1">
        <div class="col">
            <p>Will the project reduce traffic congestion by reducing vehicle trips or VMT?</p>
            <textarea id="description_sqq_2" name="description_sqq_2" class="form-control"
                placeholder="Please explain." style="width: 22rem;{{ $project->description_sqq_2 ?? '' == 1 ? '' : 'display: none;' }}">{{ $project->description_sqq_2 ?? '' }}</textarea>
        </div>
        <div class="col-sm-2">
            <select disabled name="sqq_2" id="sqq_2" class="form-control"
                onchange="displayBox(this.name);">
                <option></option>
                {{$temp = $project->sqq_2 ?? ''}}
                <option value="1" {{ $temp == 1 ? 'selected' : '' }}>Yes</option>
                <option value="2" {{ $temp == 2 ? 'selected' : '' }}>No</option>
            </select>
        </div>
    </div>

    <div class="form-row mb-1">
        <div class="col">
            <p>Will the project reduce vehicle emissions?</p>
            <textarea id="description_sqq_3" name="description_sqq_3" class="form-control"
                placeholder="Please explain." style="width: 22rem;{{ $project->description_sqq_3 ?? '' == 1 ? '' : 'display: none;' }}">{{ $project->description_sqq_3 ?? '' }}</textarea>
        </div>
        <div class="col-sm-2">
            <select disabled name="sqq_3" id="sqq_3" class="form-control"
                onchange="displayBox(this.name);">
                <option></option>
                {{$temp = $project->sqq_3 ?? ''}}
                <option value="1" {{ $temp == 1 ? 'selected' : '' }}>Yes</option>
                <option value="2" {{ $temp == 2 ? 'selected' : '' }}>No</option>
            </select>
        </div>
    </div>

    <div class="form-row mb-1">
        <div class="col">
            <p>Does the project include marketing, education and incentive programs that encourage shift to alternative modes?</p>
            <textarea id="description_sqq_4" name="description_sqq_4" class="form-control"
                placeholder="Please explain." style="width: 22rem;{{ $project->description_sqq_4 ?? '' == 1 ? '' : 'display: none;' }}">{{ $project->description_sqq_4 ?? '' }}</textarea>
        </div>
        <div class="col-sm-2">
            <select disabled name="sqq_4" id="sqq_4" class="form-control"
                onchange="displayBox(this.name);">
                <option></option>
                {{$temp = $project->sqq_4 ?? ''}}
                <option value="1" {{ $temp == 1 ? 'selected' : '' }}>Yes</option>
                <option value="2" {{ $temp == 2 ? 'selected' : '' }}>No</option>
            </select>
        </div>
    </div>

    <h4>Land Use Improvements</h4>

    <div class="form-row mb-1">
        <div class="col">
            <p>Does the project provide or demonstrate the potential for a transit connection?</p>
            <textarea id="description_sqq_5" name="description_sqq_5" class="form-control"
                placeholder="Please explain." style="width: 22rem;{{ $project->description_sqq_5 ?? '' == 1 ? '' : 'display: none;' }}">{{ $project->description_sqq_5 ?? '' }}</textarea>
        </div>
        <div class="col-sm-2">
            <select disabled name="sqq_5" id="sqq_5" class="form-control"
                onchange="displayBox(this.name);">
                <option></option>
                {{$temp = $project->sqq_5 ?? ''}}
                <option value="1" {{ $temp == 1 ? 'selected' : '' }}>Yes</option>
                <option value="2" {{ $temp == 2 ? 'selected' : '' }}>No</option>
            </select>
        </div>
    </div>

    <div class="form-row mb-1">
        <div class="col">
            <p>Does the project provide an accessible pedestrian/bicyclist environment that meets or exceeds TxDOT’s policy for Bicycle and Pedestrian Accommodation?</p>
            <textarea id="description_sqq_6" name="description_sqq_6" class="form-control"
                placeholder="Please explain." style="width: 22rem;{{ $project->description_sqq_6 ?? '' == 1 ? '' : 'display: none;' }}">{{ $project->description_sqq_6 ?? '' }}</textarea>
        </div>
        <div class="col-sm-2">
            <select disabled name="sqq_6" id="sqq_6" class="form-control"
                onchange="displayBox(this.name);">
                <option></option>
                {{$temp = $project->sqq_6 ?? ''}}
                <option value="1" {{ $temp == 1 ? 'selected' : '' }}>Yes</option>
                <option value="2" {{ $temp == 2 ? 'selected' : '' }}>No</option>
            </select>
        </div>
    </div>

    <div class="form-row mb-1">
        <div class="col">
            <p>Is the project identified within a comparable multi-jurisdictional or local plan study?</p>
            <textarea id="description_sqq_7" name="description_sqq_7" class="form-control"
                placeholder="Please explain." style="width: 22rem;{{ $project->description_sqq_7 ?? '' == 1 ? '' : 'display: none;' }}">{{ $project->description_sqq_7 ?? '' }}</textarea>
        </div>
        <div class="col-sm-2">
            <select disabled name="sqq_7" id="sqq_7" class="form-control"
                onchange="displayBox(this.name);">
                <option></option>
                {{$temp = $project->sqq_7 ?? ''}}
                <option value="1" {{ $temp == 1 ? 'selected' : '' }}>Yes</option>
                <option value="2" {{ $temp == 2 ? 'selected' : '' }}>No</option>
            </select>
        </div>
    </div>

    <h4>Public Transportation Improvements</h4>

    <div class="form-row mb-1">
        <div class="col">
            <p>Does the project provide connection to other transit services?</p>
            <textarea id="description_sqq_8" name="description_sqq_8" class="form-control"
                placeholder="Please explain." style="width: 22rem;{{ $project->description_sqq_8 ?? '' == 1 ? '' : 'display: none;' }}">{{ $project->description_sqq_8 ?? '' }}</textarea>
        </div>
        <div class="col-sm-2">
            <select disabled name="sqq_8" id="sqq_8" class="form-control"
                onchange="displayBox(this.name);">
                <option></option>
                {{$temp = $project->sqq_8 ?? ''}}
                <option value="1" {{ $temp == 1 ? 'selected' : '' }}>Yes</option>
                <option value="2" {{ $temp == 2 ? 'selected' : '' }}>No</option>
            </select>
        </div>
    </div>

    <div class="form-row mb-1">
        <div class="col">
            <p>Does the project include pedestrian and bicycle accommodations?</p>
            <textarea id="description_sqq_9" name="description_sqq_9" class="form-control"
                placeholder="Please explain." style="width: 22rem;{{ $project->description_sqq_9 ?? '' == 1 ? '' : 'display: none;' }}">{{ $project->description_sqq_9 ?? '' }}</textarea>
        </div>
        <div class="col-sm-2">
            <select disabled name="sqq_9" id="sqq_9" class="form-control"
                onchange="displayBox(this.name);">
                <option></option>
                {{$temp = $project->sqq_9 ?? ''}}
                <option value="1" {{ $temp == 1 ? 'selected' : '' }}>Yes</option>
                <option value="2" {{ $temp == 2 ? 'selected' : '' }}>No</option>
            </select>
        </div>
    </div>

    <div class="form-row mb-1">
        <div class="col">
            <p>Is the project an intrinsic part or demonstrate the potential for Transit Oriented Development?</p>
            <textarea id="description_sqq_10" name="description_sqq_10" class="form-control"
                placeholder="Please explain." style="width: 22rem;{{ $project->description_sqq_10 ?? '' == 1 ? '' : 'display: none;' }}">{{ $project->description_sqq_10 ?? '' }}</textarea>
        </div>
        <div class="col-sm-2">
            <select disabled name="sqq_10" id="sqq_10" class="form-control"
                onchange="displayBox(this.name);">
                <option></option>
                {{$temp = $project->sqq_10 ?? ''}}
                <option value="1" {{ $temp == 1 ? 'selected' : '' }}>Yes</option>
                <option value="2" {{ $temp == 2 ? 'selected' : '' }}>No</option>
            </select>
        </div>
    </div>

    <div class="form-row mb-1">
        <div class="col">
            <p>Does the project provide access to job opportunities, unmet or enhanced needs?</p>
            <textarea id="description_sqq_11" name="description_sqq_11" class="form-control"
                placeholder="Please explain." style="width: 22rem;{{ $project->description_sqq_11 ?? '' == 1 ? '' : 'display: none;' }}">{{ $project->description_sqq_11 ?? '' }}</textarea>
        </div>
        <div class="col-sm-2">
            <select disabled name="sqq_11" id="sqq_11" class="form-control"
                onchange="displayBox(this.name);">
                <option></option>
                {{$temp = $project->sqq_11 ?? ''}}
                <option value="1" {{ $temp == 1 ? 'selected' : '' }}>Yes</option>
                <option value="2" {{ $temp == 2 ? 'selected' : '' }}>No</option>
            </select>
        </div>
    </div>

    <div class="form-row mb-1">
        <div class="col">
            <p>Does the project use intelligent transportation systems and other operation/service enhancing technologies?</p>
            <textarea id="description_sqq_12" name="description_sqq_12" class="form-control"
                placeholder="Please explain." style="width: 22rem;{{ $project->description_sqq_12 ?? '' == 1 ? '' : 'display: none;' }}">{{ $project->description_sqq_12 ?? '' }}</textarea>
        </div>
        <div class="col-sm-2">
            <select disabled name="sqq_12" id="sqq_12" class="form-control"
                onchange="displayBox(this.name);">
                <option></option>
                {{$temp = $project->sqq_12 ?? ''}}
                <option value="1" {{ $temp == 1 ? 'selected' : '' }}>Yes</option>
                <option value="2" {{ $temp == 2 ? 'selected' : '' }}>No</option>
            </select>
        </div>
    </div>

    <div class="form-row mb-1">
        <div class="col">
            <p>Does the project address a need for expanded transit service capacity?</p>
            <textarea id="description_sqq_13" name="description_sqq_13" class="form-control"
                placeholder="Please explain." style="width: 22rem;{{ $project->description_sqq_13 ?? '' == 1 ? '' : 'display: none;' }}">{{ $project->description_sqq_13 ?? '' }}</textarea>
        </div>
        <div class="col-sm-2">
            <select disabled name="sqq_13" id="sqq_13" class="form-control"
                onchange="displayBox(this.name);">
                <option></option>
                {{$temp = $project->sqq_13 ?? ''}}
                <option value="1" {{ $temp == 1 ? 'selected' : '' }}>Yes</option>
                <option value="2" {{ $temp == 2 ? 'selected' : '' }}>No</option>
            </select>
        </div>
    </div>

    <h4>Bicycle/Pedestrian Improvements</h4>

    <div class="form-row mb-1">
        <div class="col">
            <p>Does the proposed facility meet or exceed TxDOT’s policy for Bicycle 
                and Pedestrian Accommodation and AASHTO design guidelines for pedestrian and/or bicycle facilities?</p>
            <textarea id="description_sqq_14" name="description_sqq_14" class="form-control"
                placeholder="Please explain." style="width: 22rem;{{ $project->description_sqq_14 ?? '' == 1 ? '' : 'display: none;' }}">{{ $project->description_sqq_14 ?? '' }}</textarea>
        </div>
        <div class="col-sm-2">
            <select disabled name="sqq_14" id="sqq_14" class="form-control"
                onchange="displayBox(this.name);">
                <option></option>
                {{$temp = $project->sqq_14 ?? ''}}
                <option value="1" {{ $temp == 1 ? 'selected' : '' }}>Yes</option>
                <option value="2" {{ $temp == 2 ? 'selected' : '' }}>No</option>
            </select>
        </div>
    </div>

    <div class="form-row mb-1">
        <div class="col">
            <p>Does the proposed facility provide safe and convenient routes across barriers, such as freeways, railroads, 
                and waterways, or does it close a gap in the existing bicycle network that aligns with a regional bikeway Plan?</p>
            <textarea id="description_sqq_15" name="description_sqq_15" class="form-control"
                placeholder="Please explain." style="width: 22rem;{{ $project->description_sqq_15 ?? '' == 1 ? '' : 'display: none;' }}">{{ $project->description_sqq_15 ?? '' }}</textarea>
        </div>
        <div class="col-sm-2">
            <select disabled name="sqq_15" id="sqq_15" class="form-control"
                onchange="displayBox(this.name);">
                <option></option>
                {{$temp = $project->sqq_15 ?? ''}}
                <option value="1" {{ $temp == 1 ? 'selected' : '' }}>Yes</option>
                <option value="2" {{ $temp == 2 ? 'selected' : '' }}>No</option>
            </select>
        </div>
    </div>

    <div class="form-row mb-1">
        <div class="col">
            <p>Does the proposed facility provide or demonstrate the potential for a transit connection?</p>
            <textarea id="description_sqq_16" name="description_sqq_16" class="form-control"
                placeholder="Please explain." style="width: 22rem;{{ $project->description_sqq_16 ?? '' == 1 ? '' : 'display: none;' }}">{{ $project->description_sqq_16 ?? '' }}</textarea>
        </div>
        <div class="col-sm-2">
            <select disabled name="sqq_16" id="sqq_16" class="form-control"
                onchange="displayBox(this.name);">
                <option></option>
                {{$temp = $project->sqq_16 ?? ''}}
                <option value="1" {{ $temp == 1 ? 'selected' : '' }}>Yes</option>
                <option value="2" {{ $temp == 2 ? 'selected' : '' }}>No</option>
            </select>
        </div>
    </div>

    <div class="form-row mb-1">
        <div class="col">
            <p>Does the proposed facility provide connections to regional destinations?</p>
            <textarea id="description_sqq_17" name="description_sqq_17" class="form-control"
                placeholder="Please explain." style="width: 22rem;{{ $project->description_sqq_17 ?? '' == 1 ? '' : 'display: none;' }}">{{ $project->description_sqq_17 ?? '' }}</textarea>
        </div>
        <div class="col-sm-2">
            <select disabled name="sqq_17" id="sqq_17" class="form-control"
                onchange="displayBox(this.name);">
                <option></option>
                {{$temp = $project->sqq_17 ?? ''}}
                <option value="1" {{ $temp == 1 ? 'selected' : '' }}>Yes</option>
                <option value="2" {{ $temp == 2 ? 'selected' : '' }}>No</option>
            </select>
        </div>
    </div>

    <div class="form-row mb-1">
        <div class="col">
            <p>Is the project identified within a multi-jurisdictional or local plan study?</p>
            <textarea id="description_sqq_18" name="description_sqq_18" class="form-control"
                placeholder="Please explain." style="width: 22rem;{{ $project->description_sqq_18 ?? '' == 1 ? '' : 'display: none;' }}">{{ $project->description_sqq_18 ?? '' }}</textarea>
        </div>
        <div class="col-sm-2">
            <select disabled name="sqq_18" id="sqq_18" class="form-control"
                onchange="displayBox(this.name);">
                <option></option>
                {{$temp = $project->sqq_18 ?? ''}}
                <option value="1" {{ $temp == 1 ? 'selected' : '' }}>Yes</option>
                <option value="2" {{ $temp == 2 ? 'selected' : '' }}>No</option>
            </select>
        </div>
    </div>

    <h4>Intelligent Transportation Systems (ITS) and Operations Strategies</h4>

    <div class="form-row mb-1">
        <div class="col">
            <p>Is the project an integral part of an incident management system, or will it contribute to a reduction in incident clearance time?</p>
            <textarea id="description_sqq_19" name="description_sqq_19" class="form-control"
                placeholder="Please explain." style="width: 22rem;{{ $project->description_sqq_19 ?? '' == 1 ? '' : 'display: none;' }}">{{ $project->description_sqq_19 ?? '' }}</textarea>
        </div>
        <div class="col-sm-2">
            <select disabled name="sqq_19" id="sqq_19" class="form-control"
                onchange="displayBox(this.name);">
                <option></option>
                {{$temp = $project->sqq_19 ?? ''}}
                <option value="1" {{ $temp == 1 ? 'selected' : '' }}>Yes</option>
                <option value="2" {{ $temp == 2 ? 'selected' : '' }}>No</option>
            </select>
        </div>
    </div>

    <div class="form-row mb-1">
        <div class="col">
            <p>Will the system utilize dynamic management of the facility to enhance travel time reliability 
                (e.g., ramp metering, variable speed limits, variable pricing, etc.)?</p>
            <textarea id="description_sqq_20" name="description_sqq_20" class="form-control"
                placeholder="Please explain." style="width: 22rem;{{ $project->description_sqq_20 ?? '' == 1 ? '' : 'display: none;' }}">{{ $project->description_sqq_20 ?? '' }}</textarea>
        </div>
        <div class="col-sm-2">
            <select disabled name="sqq_20" id="sqq_20" class="form-control"
                onchange="displayBox(this.name);">
                <option></option>
                {{$temp = $project->sqq_20 ?? ''}}
                <option value="1" {{ $temp == 1 ? 'selected' : '' }}>Yes</option>
                <option value="2" {{ $temp == 2 ? 'selected' : '' }}>No</option>
            </select>
        </div>
    </div>

    <div class="form-row mb-1">
        <div class="col">
            <p>Does the project/program coordinate traffic signal systems across jurisdictional boundaries and improve progression?</p>
            <textarea id="description_sqq_21" name="description_sqq_21" class="form-control"
                placeholder="Please explain." style="width: 22rem;{{ $project->description_sqq_21 ?? '' == 1 ? '' : 'display: none;' }}">{{ $project->description_sqq_21 ?? '' }}</textarea>
        </div>
        <div class="col-sm-2">
            <select disabled name="sqq_21" id="sqq_21" class="form-control"
                onchange="displayBox(this.name);">
                <option></option>
                {{$temp = $project->sqq_21 ?? ''}}
                <option value="1" {{ $temp == 1 ? 'selected' : '' }}>Yes</option>
                <option value="2" {{ $temp == 2 ? 'selected' : '' }}>No</option>
            </select>
        </div>
    </div>

    <div class="form-row mb-1">
        <div class="col">
            <p>Does the project/program improve accuracy, timeliness, and availability of real-time information to the public?</p>
            <textarea id="description_sqq_22" name="description_sqq_22" class="form-control"
                placeholder="Please explain." style="width: 22rem;{{ $project->description_sqq_22 ?? '' == 1 ? '' : 'display: none;' }}">{{ $project->description_sqq_22 ?? '' }}</textarea>
        </div>
        <div class="col-sm-2">
            <select disabled name="sqq_22" id="sqq_22" class="form-control"
                onchange="displayBox(this.name);">
                <option></option>
                {{$temp = $project->sqq_22 ?? ''}}
                <option value="1" {{ $temp == 1 ? 'selected' : '' }}>Yes</option>
                <option value="2" {{ $temp == 2 ? 'selected' : '' }}>No</option>
            </select>
        </div>
    </div>

    <div class="form-row mb-1">
        <div class="col">
            <p>Does the project improve automated traffic data collection and archiving ability?</p>
            <textarea id="description_sqq_23" name="description_sqq_23" class="form-control"
                placeholder="Please explain." style="width: 22rem;{{ $project->description_sqq_23 ?? '' == 1 ? '' : 'display: none;' }}">{{ $project->description_sqq_23 ?? '' }}</textarea>
        </div>
        <div class="col-sm-2">
            <select disabled name="sqq_23" id="sqq_23" class="form-control"
                onchange="displayBox(this.name);">
                <option></option>
                {{$temp = $project->sqq_23 ?? ''}}
                <option value="1" {{ $temp == 1 ? 'selected' : '' }}>Yes</option>
                <option value="2" {{ $temp == 2 ? 'selected' : '' }}>No</option>
            </select>
        </div>
    </div>

    <div class="form-row mb-1">
        <div class="col">
            <p>Will the project give priority to emergency vehicles, transit, or high occupancy vehicles?</p>
            <textarea id="description_sqq_24" name="description_sqq_24" class="form-control"
                placeholder="Please explain." style="width: 22rem;{{ $project->description_sqq_24 ?? '' == 1 ? '' : 'display: none;' }}">{{ $project->description_sqq_24 ?? '' }}</textarea>
        </div>
        <div class="col-sm-2">
            <select disabled name="sqq_24" id="sqq_24" class="form-control"
                onchange="displayBox(this.name);">
                <option></option>
                {{$temp = $project->sqq_24 ?? ''}}
                <option value="1" {{ $temp == 1 ? 'selected' : '' }}>Yes</option>
                <option value="2" {{ $temp == 2 ? 'selected' : '' }}>No</option>
            </select>
        </div>
    </div>

    <div class="form-row mb-1">
        <div class="col">
            <p>Is the project consistent with the Regional ITS Architecture?</p>
            <textarea id="description_sqq_25" name="description_sqq_25" class="form-control"
                placeholder="Please explain." style="width: 22rem;{{ $project->description_sqq_25 ?? '' == 1 ? '' : 'display: none;' }}">{{ $project->description_sqq_25 ?? '' }}</textarea>
        </div>
        <div class="col-sm-2">
            <select disabled name="sqq_25" id="sqq_25" class="form-control"
                onchange="displayBox(this.name);">
                <option></option>
                {{$temp = $project->sqq_25 ?? ''}}
                <option value="1" {{ $temp == 1 ? 'selected' : '' }}>Yes</option>
                <option value="2" {{ $temp == 2 ? 'selected' : '' }}>No</option>
            </select>
        </div>
    </div>

    <h4>Roadway/Mobility Improvements (Non-ITS)</h4>

    <div class="form-row mb-1">
        <div class="col">
            <p>Will the project improve operational efficiency/reliability on a designated freight corridor?</p>
            <textarea id="description_sqq_26" name="description_sqq_26" class="form-control"
                placeholder="Please explain." style="width: 22rem;{{ $project->description_sqq_26 ?? '' == 1 ? '' : 'display: none;' }}">{{ $project->description_sqq_26 ?? '' }}</textarea>
        </div>
        <div class="col-sm-2">
            <select disabled name="sqq_26" id="sqq_26" class="form-control"
                onchange="displayBox(this.name);">
                <option></option>
                {{$temp = $project->sqq_26 ?? ''}}
                <option value="1" {{ $temp == 1 ? 'selected' : '' }}>Yes</option>
                <option value="2" {{ $temp == 2 ? 'selected' : '' }}>No</option>
            </select>
        </div>
    </div>

    <div class="form-row mb-1">
        <div class="col">
            <p>Will the project improve a roadway on which fixed route transit service is being provided 
                or otherwise used by other transit services outside of a fixed route service area?</p>
            <textarea id="description_sqq_27" name="description_sqq_27" class="form-control"
                placeholder="Please explain." style="width: 22rem;{{ $project->description_sqq_27 ?? '' == 1 ? '' : 'display: none;' }}">{{ $project->description_sqq_27 ?? '' }}</textarea>
        </div>
        <div class="col-sm-2">
            <select disabled name="sqq_27" id="sqq_27" class="form-control"
                onchange="displayBox(this.name);">
                <option></option>
                {{$temp = $project->sqq_27 ?? ''}}
                <option value="1" {{ $temp == 1 ? 'selected' : '' }}>Yes</option>
                <option value="2" {{ $temp == 2 ? 'selected' : '' }}>No</option>
            </select>
        </div>
    </div>

    <div class="form-row mb-1">
        <div class="col">
            <p>Does the project incorporate access management principles such as raised medians, turn lanes, 
                sharing/combining access points between businesses, or innovative intersections to reduce conflict points 
                (e.g., roundabout, diverging diamond, single point urban interchange, etc.)?</p>
            <textarea id="description_sqq_28" name="description_sqq_28" class="form-control"
                placeholder="Please explain." style="width: 22rem;{{ $project->description_sqq_28 ?? '' == 1 ? '' : 'display: none;' }}">{{ $project->description_sqq_28 ?? '' }}</textarea>
        </div>
        <div class="col-sm-2">
            <select disabled name="sqq_28" id="sqq_28" class="form-control"
                onchange="displayBox(this.name);">
                <option></option>
                {{$temp = $project->sqq_28 ?? ''}}
                <option value="1" {{ $temp == 1 ? 'selected' : '' }}>Yes</option>
                <option value="2" {{ $temp == 2 ? 'selected' : '' }}>No</option>
            </select>
        </div>
    </div>

    <div class="form-row mb-1">
        <div class="col">
            <p>Does the project include pedestrian/bicycle accommodations that meet or exceed TxDOT’s policy 
                for Bicycle and Pedestrian Accommodation and AASHTO design guidelines?</p>
            <textarea id="description_sqq_29" name="description_sqq_29" class="form-control"
                placeholder="Please explain." style="width: 22rem;{{ $project->description_sqq_29 ?? '' == 1 ? '' : 'display: none;' }}">{{ $project->description_sqq_29 ?? '' }}</textarea>
        </div>
        <div class="col-sm-2">
            <select disabled name="sqq_29" id="sqq_29" class="form-control"
                onchange="displayBox(this.name);">
                <option></option>
                {{$temp = $project->sqq_29 ?? ''}}
                <option value="1" {{ $temp == 1 ? 'selected' : '' }}>Yes</option>
                <option value="2" {{ $temp == 2 ? 'selected' : '' }}>No</option>
            </select>
        </div>
    </div>

    <div class="form-row mb-1">
        <div class="col">
            <p>Does the project integrate complete streets design principles?</p>
            <textarea id="description_sqq_30" name="description_sqq_30" class="form-control"
                placeholder="Please explain." style="width: 22rem;{{ $project->description_sqq_30 ?? '' == 1 ? '' : 'display: none;' }}">{{ $project->description_sqq_30 ?? '' }}</textarea>
        </div>
        <div class="col-sm-2">
            <select disabled name="sqq_30" id="sqq_30" class="form-control"
                onchange="displayBox(this.name);">
                <option></option>
                {{$temp = $project->sqq_30 ?? ''}}
                <option value="1" {{ $temp == 1 ? 'selected' : '' }}>Yes</option>
                <option value="2" {{ $temp == 2 ? 'selected' : '' }}>No</option>
            </select>
        </div>
    </div>

    <h4>Roadway Capacity Expansion (Capacity-adding projects that are not located on the CMP Network)</h4>

    <div class="form-row mb-1">
        <div class="col">
            <p>Does the project provide a needed connection or additional capacity as identified in an adopted Thoroughfare Plan?</p>
            <textarea id="description_sqq_31" name="description_sqq_31" class="form-control"
                placeholder="Please explain." style="width: 22rem;{{ $project->description_sqq_31 ?? '' == 1 ? '' : 'display: none;' }}">{{ $project->description_sqq_31 ?? '' }}</textarea>
        </div>
        <div class="col-sm-2">
            <select disabled name="sqq_31" id="sqq_31" class="form-control"
                onchange="displayBox(this.name);">
                <option></option>
                {{$temp = $project->sqq_31 ?? ''}}
                <option value="1" {{ $temp == 1 ? 'selected' : '' }}>Yes</option>
                <option value="2" {{ $temp == 2 ? 'selected' : '' }}>No</option>
            </select>
        </div>
    </div>

    <div class="form-row mb-1">
        <div class="col">
            <p>Does the project include segments of high congestion, and will the project help to mitigate this congestion?</p>
            <textarea id="description_sqq_32" name="description_sqq_32" class="form-control"
                placeholder="Please explain." style="width: 22rem;{{ $project->description_sqq_32 ?? '' == 1 ? '' : 'display: none;' }}">{{ $project->description_sqq_32 ?? '' }}</textarea>
        </div>
        <div class="col-sm-2">
            <select disabled name="sqq_32" id="sqq_32" class="form-control"
                onchange="displayBox(this.name);">
                <option></option>
                {{$temp = $project->sqq_32 ?? ''}}
                <option value="1" {{ $temp == 1 ? 'selected' : '' }}>Yes</option>
                <option value="2" {{ $temp == 2 ? 'selected' : '' }}>No</option>
            </select>
        </div>
    </div>

    <div class="form-row mb-1">
        <div class="col">
            <p>Does the project provide access to existing and/or future business and job activity centers, 
                shopping, educational, cultural, and recreational opportunities?</p>
            <textarea id="description_sqq_33" name="description_sqq_33" class="form-control"
                placeholder="Please explain." style="width: 22rem;{{ $project->description_sqq_33 ?? '' == 1 ? '' : 'display: none;' }}">{{ $project->description_sqq_33 ?? '' }}</textarea>
        </div>
        <div class="col-sm-2">
            <select disabled name="sqq_33" id="sqq_33" class="form-control"
                onchange="displayBox(this.name);">
                <option></option>
                {{$temp = $project->sqq_33 ?? ''}}
                <option value="1" {{ $temp == 1 ? 'selected' : '' }}>Yes</option>
                <option value="2" {{ $temp == 2 ? 'selected' : '' }}>No</option>
            </select>
        </div>
    </div>

    <div class="form-row mb-1">
        <div class="col">
            <p>Will the project accommodate or create significant benefits to at least two additional modes of travel, 
                or complete a link to intermodal or freight facilities of regional importance?</p>
            <textarea id="description_sqq_34" name="description_sqq_34" class="form-control"
                placeholder="Please explain." style="width: 22rem;{{ $project->description_sqq_34 ?? '' == 1 ? '' : 'display: none;' }}">{{ $project->description_sqq_34 ?? '' }}</textarea>
        </div>
        <div class="col-sm-2">
            <select disabled name="sqq_34" id="sqq_34" class="form-control"
                onchange="displayBox(this.name);">
                <option></option>
                {{$temp = $project->sqq_34 ?? ''}}
                <option value="1" {{ $temp == 1 ? 'selected' : '' }}>Yes</option>
                <option value="2" {{ $temp == 2 ? 'selected' : '' }}>No</option>
            </select>
        </div>
    </div>

    <div class="form-row mb-1">
        <div class="col">
            <p>Does the project impact a network-level change in congestion?</p>
            <textarea id="description_sqq_35" name="description_sqq_35" class="form-control"
                placeholder="Please explain." style="width: 22rem;{{ $project->description_sqq_35 ?? '' == 1 ? '' : 'display: none;' }}">{{ $project->description_sqq_35 ?? '' }}</textarea>
        </div>
        <div class="col-sm-2">
            <select disabled name="sqq_35" id="sqq_35" class="form-control"
                onchange="displayBox(this.name);">
                <option></option>
                {{$temp = $project->sqq_35 ?? ''}}
                <option value="1" {{ $temp == 1 ? 'selected' : '' }}>Yes</option>
                <option value="2" {{ $temp == 2 ? 'selected' : '' }}>No</option>
            </select>
        </div>
    </div>

    <div class="form-row mb-1">
        <div class="col">
            <p>What are the specific congestion reduction impacts of the implemented strategies?</p>
            <textarea id="description_sqq_36" name="description_sqq_36" class="form-control"
                style="width: 22rem;">{{ $project->description_sqq_36 ?? '' }}</textarea>
        </div>
    </div>
</div>