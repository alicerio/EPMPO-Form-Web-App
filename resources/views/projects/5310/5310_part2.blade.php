<div class="card">
    <div class="card-body">
        <div class="required_psp">
            <div class="form-row mb-1">
                <div class="col-sm-1">
                    <select disabled name="psp_1" class="form-control">
                        <option></option>
                        {{$temp = $project->psp_1 ?? ''}}
                        <option value="1" {{ $temp == 1 ? 'selected' : '' }}>Yes</option>
                        <option value="2" {{ $temp == 2 ? 'selected' : '' }}>No</option>
                    </select>
                </div>
                <div class="col">
                    Will this project achieve goals as identified in the Regional Transportation Plan?
                    If yes, please provide attachment with supporting information:
                </div>
            </div>
            <div class="form-row mb-1">
                <div class="col-sm-1">
                    <select disabled name="psp_2" class="form-control">
                        <option></option>
                        {{$temp = $project->psp_2 ?? ''}}
                        <option value="1" {{ $temp == 1 ? 'selected' : '' }}>Yes</option>
                        <option value="2" {{ $temp == 2 ? 'selected' : '' }}>No</option>
                    </select>
                </div>
                <div class="col">
                    Is this project from an updated comprehensive plan, thoroughfare plan, feasibility or corridor study? 
                    If yes, please provide link or attachment: How does this project address congestion, mobility, accessibility, and reliability of NHS?
                </div>
            </div>

            <div class="form-row mb-1">
                <div class="col-sm-1">
                    <select disabled name="psp_3" class="form-control">
                        <option></option>
                        {{$temp = $project->psp_3 ?? ''}}
                        <option value="1" {{ $temp == 1 ? 'selected' : '' }}>Yes</option>
                        <option value="2" {{ $temp == 2 ? 'selected' : '' }}>No</option>
                    </select>
                </div>
                <div class="col">
                    Is this project part of TPB resolution for a Comprehensive Mobility Plan (CMP)?
                </div>            
            </div>

            <div class="form-row mb-1">
                <div class="col-sm-1">
                    <select disabled name="psp_4" class="form-control">
                        <option></option>
                        {{$temp = $project->psp_4 ?? ''}}
                        <option value="1" {{ $temp == 1 ? 'selected' : '' }}>Yes</option>
                        <option value="2" {{ $temp == 2 ? 'selected' : '' }}>No</option>
                    </select>
                </div>
                <div class="col">
                    Is this decision making/governing body committed to the local/state share (match)? 
                    Attach documentation. E.g. Resolution, Financial Plan, etc.
                </div>            
            </div>

            <div class="form-row mb-1">
                <div class="col-sm-1">
                    <select disabled name="psp_5" class="form-control">
                        <option></option>
                        {{$temp = $project->psp_5 ?? ''}}
                        <option value="1" {{ $temp == 1 ? 'selected' : '' }}>Yes</option>
                        <option value="2" {{ $temp == 2 ? 'selected' : '' }}>No</option>
                    </select>
                </div>
                <div class="col">
                    Sponsor's investment to construction cost. (Excluding required local/state share)
                </div>            
            </div>
        </div>
    </div>
    <br>
</div>