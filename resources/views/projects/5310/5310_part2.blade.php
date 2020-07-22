<div class="card">
    <div class="card-body">
        <div class="required_psp">
            <div class="form-row mb-1">
                <div class="col-sm-1">
                    <select disabled name="psp_1" class="form-control" onchange="displayBox(this.name);">
                        <option></option>
                        {{$temp = $project->psp_1 ?? ''}}
                        <option value="1" {{ $temp == 1 ? 'selected' : '' }}>Yes</option>
                        <option value="2" {{ $temp == 2 ? 'selected' : '' }}>No</option>
                    </select>
                </div>
                <div class="col">
                    Will this project achieve goals as identified in the Regional Transportation Plan?
                    If yes, please provide attachment with supporting information:
                    <i class="fa fa-asterisk" style="font-size:10px;color:red"></i>
                    <textarea id="description_psp_1" name="description_psp_1" class="form-control"
                    style="width: 30rem;{{ $project->psp_1 ?? '' == 1 ? '' : 'display: none;' }}"
                    placeholder="Please provide link or attachment.">{{ $project->description_psp_1 ?? '' }}</textarea>
                </div>
            </div>
            <div class="form-row mb-1">
                <div class="col-sm-1">
                    <select disabled name="psp_2" class="form-control" onchange="displayBox(this.name);">
                        <option></option>
                        {{$temp = $project->psp_2 ?? ''}}
                        <option value="1" {{ $temp == 1 ? 'selected' : '' }}>Yes</option>
                        <option value="2" {{ $temp == 2 ? 'selected' : '' }}>No</option>
                    </select>
                </div>
                <div class="col">
                    Is this project from an updated comprehensive plan, thoroughfare plan, resilience plan, feasibility or corridor study? 
                    If yes, please provide link or attachment.
                    <i class="fa fa-asterisk" style="font-size:10px;color:red"></i>
                    <textarea id="description_psp_2" name="description_psp_2" class="form-control"
                    style="width: 30rem;{{ $project->psp_2 ?? '' == 1 ? '' : 'display: none;' }}"
                    placeholder="Please provide link or attachment.">{{ $project->description_psp_2 ?? '' }}</textarea>
                </div>
            </div>

            <div class="form-row mb-1">
                <div class="col-sm-1">
                </div>
                <div class="col">
                    How does this project address congestion, mobility, accessibility, and reliability of NHS?
                    <i class="fa fa-asterisk" style="font-size:10px;color:red"></i>
                    <textarea id="description_psp_3" name="description_psp_3" class="form-control" style="width: 30rem;"
                    placeholder="Explain.">{{ $project->description_psp_3 ?? '' }}</textarea>
                </div>
            </div>

            <div class="form-row mb-1">
                <div class="col-sm-1">
                    <select disabled name="psp_4" class="form-control" onchange="displayBox(this.name);">
                        <option></option>
                        {{$temp = $project->psp_4 ?? ''}}
                        <option value="1" {{ $temp == 1 ? 'selected' : '' }}>Yes</option>
                        <option value="2" {{ $temp == 2 ? 'selected' : '' }}>No</option>
                    </select>
                </div>
                <div class="col">
                    Is this project part of TPB approved <a href="http://www.elpasompo.org/civicax/filebank/blobdload.aspx?t=62130.51&BlobID=25024"
                target="_blank">Regional Mobility Strategy (RMS) 2020?</a>
                <i class="fa fa-asterisk" style="font-size:10px;color:red"></i>
                    <textarea id="description_psp_4" name="description_psp_4" class="form-control"
                    style="width: 30rem;{{ $project->psp_4 ?? '' == 1 ? '' : 'display: none;' }}"
                    placeholder="Please provide link or attachment.">{{ $project->description_psp_4 ?? '' }}</textarea>
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
                    Is this decision making/governing body committed to the local/state share (match)? 
                    Attach documentation. E.g. Resolution, Financial Plan, etc.
                    <i class="fa fa-asterisk" style="font-size:10px;color:red"></i>
                </div>            
            </div>

            <div class="form-row mb-1">
                <div class="col-sm-2">
                    <select disabled name="psp_amount" class="form-control">
                        <option></option>
                        {{$temp = $project->psp_amount ?? ''}}
                        <option value="1" {{ $temp == 1 ? 'selected' : '' }}>0%</option>
                        <option value="2" {{ $temp == 2 ? 'selected' : '' }}>≥1% &lt10%</option>
                        <option value="3" {{ $temp == 3 ? 'selected' : '' }}>≥10% &lt20%</option>
                        <option value="4" {{ $temp == 4 ? 'selected' : '' }}>≥20% &lt30%</option>
                        <option value="5" {{ $temp == 5 ? 'selected' : '' }}>≥30% &lt40%</option>
                        <option value="6" {{ $temp == 6 ? 'selected' : '' }}>≥40%</option>
                    </select>
                </div>
                <div class="col">
                    Sponsor's investment to construction cost. (Excluding required local/state share)<i class="fa fa-asterisk" style="font-size:10px;color:red"></i>
                </div>            
            </div>
        </div>
    </div>
    <br>
</div>