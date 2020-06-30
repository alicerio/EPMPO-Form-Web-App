<div class="card">
    <div class="card-body">
        <div class="form-row mb-1 justify-content-center">
            <div class="col">
                <h3><a href="https://www.fhwa.dot.gov/tpm/about/goals.cfm" target="_blank">National Goals</a></h3>
                <label>
                    <input type="checkbox" name="goal_1" onclick="toggleTA(this.name);" autocomplete="off" {{ $project->goal_1 ?? '' == true ? 'checked' : '' }} disabled>
                    Safety
                </label><br>
                <textarea disabled name="description_goal_1" class="form-control" style="width: 22rem; {{ $project->goal_1 ?? '' == true ? '' : 'display: none;' }}" placeholder="How does this project meet this goal?">{{ $project->description_goal_1 ?? '' }}</textarea>
                <label>
                    <input type="checkbox" name="goal_2" onclick="toggleTA(this.name);" autocomplete="off" {{ $project->goal_2 ?? '' == true ? 'checked' : '' }} disabled>
                    Infrastructure Condition 
                </label><br>
                <textarea disabled name="description_goal_2" class="form-control" style="width: 22rem;{{ $project->goal_2 ?? '' == true ? '' : 'display: none;' }}" placeholder="How does this project meet this goal?">{{ $project->description_goal_2 ?? '' }}</textarea>
                <label>
                    <input type="checkbox" name="goal_3" onclick="toggleTA(this.name);" autocomplete="off" {{ $project->goal_3 ?? '' == true ? 'checked' : '' }} disabled>
                    Congestion Reduction
                </label><br>
                <textarea disabled name="description_goal_3" class="form-control" style="width: 22rem;{{ $project->goal_3 ?? '' == true ? '' : 'display: none;' }}" placeholder="How does this project meet this goal?">{{ $project->description_goal_3 ?? '' }}</textarea>
                <label>
                    <input type="checkbox" name="goal_4" onclick="toggleTA(this.name);" autocomplete="off" {{ $project->goal_4 ?? '' == true ? 'checked' : '' }} disabled>
                    System Reliability
                </label><br>
                <textarea disabled name="description_goal_4" class="form-control" style="width: 22rem;{{ $project->goal_4 ?? '' == true ? '' : 'display: none;' }}" placeholder="How does this project meet this goal?">{{ $project->description_goal_4 ?? '' }}</textarea>
                <label>
                    <input type="checkbox" name="goal_5" onclick="toggleTA(this.name);" autocomplete="off" {{ $project->goal_5  ?? ''== true ? 'checked' : '' }} disabled>
                    Freight Movement and Economic Vitality
                </label><br>
                <textarea disabled name="description_goal_5" class="form-control" style="width: 22rem;{{ $project->goal_5 ?? '' == true ? '' : 'display: none;' }}" placeholder="How does this project meet this goal?">{{ $project->description_goal_5 ?? '' }}</textarea>
                <label>
                    <input type="checkbox" name="goal_6" onclick="toggleTA(this.name);" autocomplete="off" {{ $project->goal_6 ?? '' == true ? 'checked' : '' }} disabled>
                    Environmental Sustainability
                </label><br>
                <textarea disabled name="description_goal_6" class="form-control" style="width: 22rem;{{ $project->goal_6 ?? '' == true ? '' : 'display: none;' }}" placeholder="How does this project meet this goal?">{{ $project->description_goal_6 ?? '' }}</textarea>
            </div>
            <div class="col">
                <h3><a href="http://www.elpasompo.org/civicax/filebank/blobdload.aspx?BlobID=23375" target="_blank">Congestion Management Project Strategies</a></h3>
                <div class="form-row mb-1">
                    <div class="col">
                        1. Project exempt under 40CFR 93.126?
                        <h6><a href="http://www.elpasompo.org/civicax/filebank/blobdload.aspx?BlobID=23375" target="_blank">Helpful Link</a></h6>
                        ​A detailed analysis is required to justify the exemption of all individual projects being proposed under 40CFR 93.126. 
                        Example: If a project is being considered as exempt for safety due to the project being proposed as a road diet: 
                        Identify locations and limits of proposed road diet sections and the number of travel lanes impacted.  
                        Include traffic counts, fatalities and serious injuries resulting from motorized and non-motorized crashes and source of data.  
                        Distinguish between road diets for bicycle lanes and parking.  
                        Is this project consistent with MPO documents, project agreements and environmental documents, El Paso MPO Travel Demand Model (TDM)? 
                        <h6><a href="http://www.elpasompo.org/scroll_bar_area/conformity_/transportation_conformity_report_2015_naaqs_appendices.htm" target="_blank">Helpful link (TDM Shapefile Appendix H): </a></h6>
                        <textarea name="description_strategy_1" class="form-control" style="width: 22rem;{{ $project->strategy_1 ?? '' == 1 ? '' : 'display: none;' }}" placeholder="Please explain based on 40CFR 93.126.">{{ $project->description_strategy_1 ?? '' }}</textarea>
                    </div>      
                    <div class="col-sm-2">
                        <select name="strategy_1" class="form-control" onchange="displayBox(this.name);">
                            <option selected>----</option>
                            <option value="1" {{ $project->strategy_1 ?? '' == 1 ? 'selected' : '' }}>Yes</option>
                            <option value="2" {{ $project->strategy_1 ?? '' == 2 ? 'selected' : '' }}>No</option>
                        </select>
                    </div>     
                </div>
                <div class="form-row mb-1">
                    <div class="col">
                        2. Project addressing congestion
                        <textarea name="description_strategy_2" class="form-control" style="width: 22rem;{{ $project->strategy_2 ?? '' == 1 ? '' : 'display: none;' }}" placeholder="Please provide analysis from corridor study or similar study that will show the project will address congestion.">{{ $project->description_strategy_2 ?? '' }}</textarea>
                    </div>   
                    <div class="col-sm-2">
                        <select name="strategy_2" class="form-control" onchange="displayBox(this.name);">
                            <option selected>----</option>
                            <option value="1" {{ $project->strategy_2 ?? '' == 1 ? 'selected' : '' }}>Yes</option>
                            <option value="2" {{ $project->strategy_2 ?? '' == 2 ? 'selected' : '' }}>No</option>
                        </select>
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
            </div>
        </div>
        Projects will be examined at the corridor level to determine multimodal needs. Which best describes this projects. <a href="http://www.elpasompo.org/civicax/filebank/blobdload.aspx?BlobID=23409" target="_blank">Block System:</a><br>
        <label><input type="radio" name="block_system" value="1" {{ $project->block_system ?? '' == 1 ? 'checked' : '' }}> Within Community</label autocomplete="off" disabled>
        <label><input type="radio" name="block_system" value="2" {{ $project->block_system ?? '' == 2 ? 'checked' : '' }}> Community to community</label autocomplete="off" disabled>
        <label><input type="radio" name="block_system" value="3" {{ $project->block_system ?? '' == 3 ? 'checked' : '' }}> Community to region</label autocomplete="off" disabled>
        <label><input type="radio" name="block_system" value="4" {{ $project->block_system ?? '' == 4 ? 'checked' : '' }}> Region to region</label autocomplete="off" disabled>
        <hr>

        Have the above dates been reviewed by TXDOT or NMDOT?
        <label><input type="radio" name="reviewed_dates" value="1" {{ $project->reviewed_dates ?? '' == 1 ? 'checked' : '' }}> Yes</label autocomplete="off" disabled>
        <label><input type="radio" name="reviewed_dates" value="2" {{ $project->reviewed_dates ?? '' == 2 ? 'checked' : '' }}> No</label autocomplete="off" disabled>
        <label><input type="radio" name="reviewed_dates" value="3" {{ $project->reviewed_dates ?? '' == 3 ? 'checked' : '' }}> N/A</label autocomplete="off" disabled>
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

<script>
    const displayBox = (name) => {
        if($('select[name="'+name +'"]').val() == 1) {
            $('textarea[name="description_' + name +'"]').show();
        }
        else {
            $('textarea[name="description_' + name +'"]').hide();
        }
    };
</script>