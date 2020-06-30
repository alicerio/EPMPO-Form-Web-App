<div class="card">
    <h3>Project Selection Process</h3>
    <div class="form-row mb-1">
        <div class="col-sm-1">
            <select disabled name="psp_1" class="form-control">
                <option>----</option>
                <option value="1" {{ $project->psp_1 ?? '' == 1  ? 'selected' : '' }}>Yes</option>
                <option value="2" {{ $project->psp_1 ?? '' == 2  ? 'selected' : '' }}>No</option>
            </select>
        </div>
        <div class="col">
            Will this project achieve a significant reduction in traffic fatalities or serious injuries? If yes,
            please provide link or attachment with supporting data
        </div>
    </div>

    <div class="form-row mb-1">
        <div class="col-sm-1">
            <select disabled name="psp_2" class="form-control">
                <option>----</option>
                <option value="1" {{ $project->psp_2 ?? '' == 1 ? 'selected' : '' }}>Yes</option>
                <option value="2" {{ $project->psp_2 ?? '' == 2 ? 'selected' : '' }}>No</option>
            </select>
        </div>
        <div class="col">
            Is this project from an updated comprehensive plan, thoroughfare plan, feasibility or corridor
            study? If yes, please provide link or attachment: Excerpt from corridor plan attached (too large to
            attach whole document)
        </div>
    </div>

    <div class="form-row mb-1">
        <div class="col-sm-1">
            <select disabled name="psp_3" class="form-control">
                <option>----</option>
                <option value="1" {{ $project->psp_3 ?? '' == 1 ? 'selected' : '' }}>Yes</option>
                <option value="2" {{ $project->psp_3 ?? '' == 2 ? 'selected' : '' }}>No</option>
            </select>
        </div>
        <div class="col">
            Is this project on the National Highway System NHS?
        </div>
    </div>

    <div class="form-row mb-1">
        <div class="col-sm-1">
            <select disabled name="psp_4" class="form-control">
                <option>----</option>
                <option value="1" {{ $project->psp_4 ?? '' == 1  ? 'selected' : '' }}>Yes</option>
                <option value="2" {{ $project->psp_4 ?? '' == 2  ? 'selected' : '' }}>No</option>
            </select>
        </div>
        <div class="col">
            Will this project achieve a significant reduction in traffic fatalities or serious injuries? If yes,
            please provide link or attachment with supporting data
        </div>
    </div>

    <div class="form-row mb-1">
        <div class="col-sm-1">
            <select disabled name="psp_5" class="form-control">
                <option>----</option>
                <option value="1" {{ $project->psp_5 ?? '' == 1  ? 'selected' : '' }}>Yes</option>
                <option value="2" {{ $project->psp_5 ?? '' == 2  ? 'selected' : '' }}>No</option>
            </select>
        </div>
        <div class="col">
            Is this project part of TPB resolution for the Active Transportation System?
        </div>
    </div>

    <div class="form-row mb-1">
        <div class="col-sm-1">
            <select disabled name="psp_6" class="form-control">
                <option>----</option>
                <option value="1" {{ $project->psp_6 ?? '' == 1  ? 'selected' : '' }}>Yes</option>
                <option value="2" {{ $project->psp_6 ?? '' == 2  ? 'selected' : '' }}>No</option>
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
            <h3><a href="http://www.elpasompo.org/civicax/filebank/blobdload.aspx?BlobID=23375" target="_blank">National
                    Goals</a></h3>
            <label>
                <input type="checkbox" name="goal_1" onclick="toggleTA(this.name);" autocomplete="off"
                    {{ $project->goal_1 ?? '' == true ? 'checked' : '' }} disabled>
                Safety
            </label><br>
            <textarea disabled name="description_goal_1" class="form-control"
                style="width: 22rem; {{ $project->goal_1 ?? ''  == true ? '' : 'display: none;' }}"
                placeholder="How does this project meet this goal?">{{ $project->description_goal_1 ?? '' }}</textarea>
            <label>
                <input type="checkbox" name="goal_2" onclick="toggleTA(this.name);" autocomplete="off"
                    {{ $project->goal_2 ?? '' == true ? 'checked' : '' }} disabled>
                Infrastructure Condition
            </label><br>
            <textarea disabled name="description_goal_2" class="form-control"
                style="width: 22rem; {{ $project->goal_2 ?? '' == true ? '' : 'display: none;' }}"
                placeholder="How does this project meet this goal?">{{ $project->description_goal_2 ?? '' }}</textarea>
            <label>
                <input type="checkbox" name="goal_3" onclick="toggleTA(this.name);" autocomplete="off"
                    {{ $project->goal_3 ?? '' == true ? 'checked' : '' }} disabled>
                Congestion Reduction
            </label><br>
            <textarea disabled name="description_goal_3" class="form-control"
                style="width: 22rem; {{ $project->goal_3 ?? '' == true ? '' : 'display: none;' }}"
                placeholder="How does this project meet this goal?">{{ $project->description_goal_3 ?? ''}}</textarea>
            <label>
                <input type="checkbox" name="goal_4" onclick="toggleTA(this.name);" autocomplete="off"
                    {{ $project->goal_4 ?? '' == true ? 'checked' : '' }} disabled>
                System Reliability
            </label><br>
            <textarea disabled name="description_goal_4" class="form-control"
                style="width: 22rem; {{ $project->goal_4 ?? '' == true ? '' : 'display: none;' }}"
                placeholder="How does this project meet this goal?">{{ $project->description_goal_4 ?? ''}}</textarea>
            <label>
                <input type="checkbox" name="goal_5" onclick="toggleTA(this.name);" autocomplete="off"
                    {{ $project->goal_5 ?? '' == true ? 'checked' : '' }} disabled>
                Freight Movement and Economic Vitality
            </label><br>
            <textarea disabled name="description_goal_5" class="form-control"
                style="width: 22rem; {{ $project->goal_5 ?? '' == true ? '' : 'display: none;' }}"
                placeholder="How does this project meet this goal?">{{ $project->description_goal_5 ?? '' }}</textarea>
            <label>
                <input type="checkbox" name="goal_6" onclick="toggleTA(this.name);" autocomplete="off"
                    {{ $project->goal_6 ?? '' == true ? 'checked' : '' }} disabled>
                Environmental Sustainability
            </label><br>
            <textarea disabled name="description_goal_6" class="form-control mb-1"
                style="width: 22rem; {{ $project->goal_6 ?? '' == true ? '' : 'display: none;' }}"
                placeholder="How does this project meet this goal?">{{ $project->description_goal_6 ?? '' }}</textarea>

            <div class="card" style="width: 22rem;">
                <div class="card-body">

                    <h5 class="card-title text-center">CMAQ Analysis</h5>
                    <h6 class="card-subtitle mb-2 text-muted text-center">*Air Quality Analysis MUST accompany
                        request for CMAQ Funds.</h6>

                    <label>VOC (Kgs/day)</label>
                    <input type="text" name="voc" class="form-control" autocomplete="off" value="{{ $project->voc ?? ''}}"
                        disabled>
                    <label>C0 (Kgs/day)</label>
                    <input type="text" name="c0" class="form-control" autocomplete="off" value="{{ $project->c0 ?? '' }}"
                        disabled>
                    <label>NOX (Kgs/day)</label>
                    <input type="text" name="nox" class="form-control" autocomplete="off" value="{{ $project->nox ?? ''}}"
                        disabled>
                    <label>PM10 (Kgs/day)</label>
                    <input type="text" name="pm10" class="form-control" autocomplete="off" value="{{ $project->pm10 ?? ''}}"
                        disabled>
                    <label>Prepared By</label>
                    <input type="text" name="prepared_by" class="form-control" autocomplete="off"
                        value="{{ $project->prepared_by ?? '' }}" disabled>
                </div>
            </div>
        </div>
        <div id = "congestionDiv" class="col">
            <h3><a href="http://www.elpasompo.org/civicax/filebank/blobdload.aspx?BlobID=23375"
                    target="_blank">Congestion Management Process Strategies</a></h3>
                <div class="form-row mb-1">
                    <div class="col-sm-2">
                        <select name="strategy_1" class="form-control" onchange="displayBox(this.name);">
                            <option selected>----</option>
                            <option value="1" {{ $project->strategy_1 ?? '' == 1 ? 'selected' : '' }}>Yes</option>
                            <option value="2" {{ $project->strategy_1 ?? '' == 2 ? 'selected' : '' }}>No</option>
                        </select>
                        <textarea name="description_strategy_1" class="form-control" style="width: 22rem;{{ $project->strategy_1 ?? '' == 1 ? '' : 'display: none;' }}" placeholder="Please explain based on 40CFR 93.126.">{{ $project->description_strategy_1 ?? '' }}</textarea>
                    </div>
                    <div class="col">
                        1. Project exempt under 40CFR 93.126?
                    </div>            
                </div>
                <div class="form-row mb-1">
                    <div class="col-sm-2">
                        <select name="strategy_2" class="form-control" onchange="displayBox(this.name);">
                            <option selected>----</option>
                            <option value="1" {{ $project->strategy_2 ?? '' == 1 ? 'selected' : '' }}>Yes</option>
                            <option value="2" {{ $project->strategy_2 ?? '' == 2 ? 'selected' : '' }}>No</option>
                        </select>
                        <textarea name="description_strategy_2" class="form-control" style="width: 22rem;{{ $project->strategy_2 ?? '' == 1 ? '' : 'display: none;' }}" placeholder="Please provide analysis from corridor study or similar study that will show the project will address congestion.">{{ $project->description_strategy_2 ?? '' }}</textarea>
                    </div>
                    <div class="col">
                        2. Project addressing congestion
                    </div>            
                </div>
                <div class="form-row mb-1">
                    <div class="col-sm-2">
                        <select name="strategy_3" class="form-control" onchange="displayBox(this.name);">
                            <option selected>----</option>
                            <option value="1" {{ $project->strategy_3 ?? '' == 1 ? 'selected' : '' }}>Yes</option>
                            <option value="2" {{ $project->strategy_3 ?? '' == 2 ? 'selected' : '' }}>No</option>
                        </select>
                        <textarea name="description_strategy_3" class="form-control" style="width: 22rem;{{ $project->strategy_3 ?? '' == 1 ? '' : 'display: none;' }}" placeholder="Please explain.">{{ $project->description_strategy_3 ?? '' }}</textarea>
                    </div>
                    <div class="col">
                        3. Project adds roadway capacity
                    </div>            
                </div>
                <p>If either question 2 or 3 is YES, please answer the questions below.</p>
                <div class="form-row mb-1">
                    <div class="col-sm-2">
                        <select name="strategy_4" class="form-control" onchange="displayBox(this.name);">
                            <option selected>----</option>
                            <option value="1" {{ $project->strategy_4 ?? '' == 1 ? 'selected' : '' }}>Yes</option>
                            <option value="2" {{ $project->strategy_4 ?? '' == 2 ? 'selected' : '' }}>No</option>
                        </select>
                        <textarea name="description_strategy_4" class="form-control" style="width: 22rem;{{ $project->strategy_4 ?? '' == 1 ? '' : 'display: none;' }}" placeholder="If yes, identify the project name(s), state project identification number (CSJ number), and MPO ID.">{{ $project->description_strategy_4 ?? '' }}</textarea>
                    </div>
                    <div class="col">
                        4. Are there other congestion mitigation projects (e.g., transportation demand management, land use, public transportation, ITS and operations, pricing, bicycle and pedestrian, and bottleneck relief) 
                        within the project corridor that are programmed into the current MTP?
                    </div>            
                </div>
                <div class="form-row mb-1">
                    <div class="col-sm-2">
                        <select name="strategy_5" class="form-control">
                            <option selected>----</option>
                            <option value="1" {{ $project->strategy_5 ?? '' == 1 ? 'selected' : '' }}>Yes</option>
                            <option value="2" {{ $project->strategy_5 ?? '' == 2 ? 'selected' : '' }}>No</option>
                        </select>
                    </div>
                    <div class="col">
                        5. Using the 2019 CMP Report, is the corridor identified as a congested segment?
                    </div>            
                </div>
                <div class="form-row mb-1">
                    <div class="col-sm-2">
                        <select name="strategy_6" class="form-control">
                            <option selected>----</option>
                            <option value="1" {{ $project->strategy_6 ?? '' == 1 ? 'selected' : '' }}>Yes</option>
                            <option value="2" {{ $project->strategy_6 ?? '' == 2 ? 'selected' : '' }}>No</option>
                        </select>
                    </div>
                    <div class="col">
                        6. Can the congestion be addressed without building more road capacity?
                    </div>            
                </div>
                <p> 7. Describe any congestion mitigation alternatives to the proposed improvement that have been considered or will be evaluated to correct the deficiencies and manage the 
                    facility effectively (or facilitate its management in the future).</p>
                <textarea name="description_strategy_7" class="form-control" style="width: 22rem;">{{ $project->description_strategy_7 ?? '' }}</textarea>
                <p>8. Specify congestion mitigation strategies that will be implemented as part of the project.</p>
                <textarea name="description_strategy_8" class="form-control" style="width: 22rem;">{{ $project->description_strategy_8 ?? '' }}</textarea>
                <p>9. What are the specific congestion reduction impacts of the implemented strategies?</p>
                <textarea name="description_strategy_9" class="form-control" style="width: 22rem;">{{ $project->description_strategy_9 ?? '' }}</textarea>
                <p>10. If not implementing a congestion mitigation strategy as part of the project, please explain reason.</p>
                <textarea name="description_strategy_10" class="form-control" style="width: 22rem;">{{ $project->description_strategy_10 ?? '' }}</textarea>
                <br>
                <div class="card" style="width: 22rem;">
                    <div class="card-body">
                        <h5 class="card-title text-center">**Transit Only</h5>
                        <label>Section 5309 ID</label>
                        <input type="text" name="section_5309" class="form-control" autocomplete="off"
                            value="{{ $project->section_5309 ?? '' }}" disabled>
                        <label>Apportionment Year</label>
                        <input type="text" name="appointment_year" class="form-control" autocomplete="off"
                            value="{{ $project->appointment_year ?? '' }}" disabled>
                        <label>TDC Award Amount</label>
                        <input type="text" name="tdc_award_amount" class="form-control" autocomplete="off"
                            value="{{ $project->tdc_award_amount ?? '' }}" disabled>
                        <label>TDC Award Date</label>
                        <input type="text" name="tdw_award_date" class="form-control" autocomplete="off"
                            value="{{ $project->tdw_award_date ?? '' }}" disabled>
                        <label>TDC Amount Requested</label>
                        <input type="text" name="tdc_amount_requested" class="form-control" autocomplete="off"
                            value="{{ $project->tdc_amount_requested ?? '' }}" disabled><br>

                    <h4>Project Type:</h4>

                    <label>
                        <input type="checkbox" name="type_capital" autocomplete="off"
                            {{ $project->type_capital ?? '' == true ? 'checked' : '' }} disabled>
                        Capital
                    </label><br>
                    <label>
                        <input type="checkbox" name="type_operating" autocomplete="off"
                            {{ $project->type_operating ?? '' == true ? 'checked' : '' }} disabled>
                        Operating
                    </label><br>
                    <label>
                        <input type="checkbox" name="type_planning" autocomplete="off"
                            {{ $project->type_planning ?? '' == true ? 'checked' : '' }} disabled>
                        Planning
                    </label><br>
                    <label>
                        <input type="checkbox" name="type_administration" autocomplete="off"
                            {{ $project->type_administration ?? '' == true ? 'checked' : '' }} disabled>
                        Administration
                    </label><br>
                </div>
            </div>
        </div>
    </div>

    Projects will be examined at the corridor level to determine multimodal needs. Which best describes this
    projects. <a href="http://www.elpasompo.org/civicax/filebank/blobdload.aspx?BlobID=23409" target="_blank">Block
        System:</a><br>

    <label><input type="radio" name="block_system" value="1" {{ $project->block_system ?? '' == 1 ? 'checked' : '' }}
            disabled> Within Community</label autocomplete="off">
    <label><input type="radio" name="block_system" value="2" {{ $project->block_system ?? '' == 2 ? 'checked' : '' }}
            disabled> Community to community</label autocomplete="off">
    <label><input type="radio" name="block_system" value="3" {{ $project->block_system ?? '' == 3 ? 'checked' : '' }}
            disabled> Community to region</label autocomplete="off">
    <label><input type="radio" name="block_system" value="4" {{ $project->block_system ?? '' == 4 ? 'checked' : '' }}
            disabled> Region to region</label autocomplete="off">
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

<script>
    const displayBox = (name) => {
        if($('select[name="'+name +'"]').val() == 1) {
            console.log("displaying");
            $('textarea[name="description_' + name +'"]').show();
        }
    };
</script>
