<div class="card">
    <div class="card-body">
        <div class="national_goals">
                <div class="form-row mb-1 justify-content-center">
                    <div class="col">
                        <h3><a href="https://www.fhwa.dot.gov/tpm/about/goals.cfm" target="_blank">National Goals</a></h3>
                        <label>
                            <input type="checkbox" name="goal_1" onclick="toggleTA(this.name);" autocomplete="off"
                                {{ $project->goal_1 ?? '' == true ? 'checked' : '' }} disabled>
                            Safety
                        </label><br>
                        <textarea disabled name="description_goal_1" id="description_goal_1" class="form-control"
                            style="width: 22rem; {{ $project->goal_1 ?? '' == true ? '' : 'display: none;' }}"
                            placeholder="How does this project meet this goal?">{{ $project->description_goal_1 ?? '' }}</textarea>
                        <label>
                            <input type="checkbox" name="goal_2" onclick="toggleTA(this.name);" autocomplete="off"
                                {{ $project->goal_2 ?? '' == true ? 'checked' : '' }} disabled>
                            Infrastructure Condition
                        </label><br>
                        <textarea disabled name="description_goal_2" id="description_goal_2" class="form-control"
                            style="width: 22rem;{{ $project->goal_2 ?? '' == true ? '' : 'display: none;' }}"
                            placeholder="How does this project meet this goal?">{{ $project->description_goal_2 ?? '' }}</textarea>
                        <label>
                            <input type="checkbox" name="goal_3" onclick="toggleTA(this.name);" autocomplete="off"
                                {{ $project->goal_3 ?? '' == true ? 'checked' : '' }} disabled>
                            Congestion Reduction
                        </label><br>
                        <textarea disabled name="description_goal_3" id="description_goal_3" class="form-control"
                            style="width: 22rem;{{ $project->goal_3 ?? '' == true ? '' : 'display: none;' }}"
                            placeholder="How does this project meet this goal?">{{ $project->description_goal_3 ?? '' }}</textarea>
                        <label>
                            <input type="checkbox" name="goal_4" onclick="toggleTA(this.name);" autocomplete="off"
                                {{ $project->goal_4 ?? '' == true ? 'checked' : '' }} disabled>
                            System Reliability
                        </label><br>
                        <textarea disabled name="description_goal_4" id="description_goal_4" class="form-control"
                            style="width: 22rem;{{ $project->goal_4 ?? '' == true ? '' : 'display: none;' }}"
                            placeholder="How does this project meet this goal?">{{ $project->description_goal_4 ?? '' }}</textarea>
                        <label>
                            <input type="checkbox" name="goal_5" onclick="toggleTA(this.name);" autocomplete="off"
                                {{ $project->goal_5  ?? ''== true ? 'checked' : '' }} disabled>
                            Freight Movement and Economic Vitality
                        </label><br>
                        <textarea disabled name="description_goal_5" id="description_goal_5" class="form-control"
                            style="width: 22rem;{{ $project->goal_5 ?? '' == true ? '' : 'display: none;' }}"
                            placeholder="How does this project meet this goal?">{{ $project->description_goal_5 ?? '' }}</textarea>
                        <label>
                            <input type="checkbox" name="goal_6" onclick="toggleTA(this.name);" autocomplete="off"
                                {{ $project->goal_6 ?? '' == true ? 'checked' : '' }} disabled>
                            Environmental Sustainability
                        </label><br>
                        <textarea disabled name="description_goal_6" id="description_goal_6" class="form-control"
                            style="width: 22rem;{{ $project->goal_6 ?? '' == true ? '' : 'display: none;' }}"
                            placeholder="How does this project meet this goal?">{{ $project->description_goal_6 ?? '' }}</textarea>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="required_cmp">
                <h3>Congestion Management Process</h3>
                    <h6><a href="http://www.elpasompo.org/civicax/filebank/blobdload.aspx?BlobID=23375"
                            target="_blank">Helpful Link</a></h6>
                    <div class="form-row mb-1">
                        <div class="col">
                            1. Is the project exempt under <a
                                href="https://www.govinfo.gov/content/pkg/CFR-2012-title40-vol21/pdf/CFR-2012-title40-vol21-sec93-126.pdf"
                                target="_blank">40CFR 93.126?</a>
                            <h6><a href="http://www.elpasompo.org/civicax/filebank/blobdload.aspx?BlobID=23375"
                                    target="_blank">Helpful Link</a></h6>
                            ​A detailed analysis is required to justify the exemption of all individual projects being
                            proposed under 40CFR 93.126.
                            Example: If a project is being considered as exempt for safety due to the project being
                            proposed as a road diet:
                            Identify locations and limits of proposed road diet sections and the number of travel lanes
                            impacted. 
                            Include traffic counts, fatalities and serious injuries resulting from motorized and
                            non-motorized crashes and source of data. 
                            Distinguish between road diets for bicycle lanes and parking. 
                            Is this project consistent with MPO documents, project agreements and environmental
                            documents, El Paso MPO Travel Demand Model (TDM)? <i class="fa fa-asterisk" style="font-size:10px;color:red"></i>
                            <h6><a href="http://www.elpasompo.org/scroll_bar_area/conformity_/transportation_conformity_report_2015_naaqs_appendices.htm"
                                    target="_blank">Helpful link (TDM Shapefile Appendix H): </a></h6>
                            <textarea id="description_strategy_1" name="description_strategy_1" class="form-control"
                                style="width: 22rem;{{ $project->strategy_1 ?? '' == 1 ? '' : 'display: none;' }}"
                                placeholder="Please explain based on 40CFR 93.126.">{{ $project->description_strategy_1 ?? '' }}</textarea>
                        </div>
                        <div class="col-sm-2">
                            <select disabled name="strategy_1" class="form-control" onchange="displayBox(this.name);">
                                <option></option>
                                {{$temp = $project->strategy_1 ?? ''}}
                                <option value="1" {{ $temp == 1 ? 'selected' : '' }}>Yes</option>
                                <option value="2" {{ $temp == 2 ? 'selected' : '' }}>No</option>
                            </select>
                            <!-- Tool tip ---->
                            <div class="tip">
                                <div>
                                    <p>If “yes”, the project is exempt from further CMP analysis, please explain based
                                        on <a
                                            href="https://www.govinfo.gov/content/pkg/CFR-2012-title40-vol21/pdf/CFR-2012-title40-vol21-sec93-126.pdf"
                                            target="_blank">40CFR 93.126</a>.</p>
                                </div><svg style="color:blue" width="1em" height="1em" viewBox="0 0 16 16"
                                    class="bi bi-question-circle" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path
                                        d="M5.25 6.033h1.32c0-.781.458-1.384 1.36-1.384.685 0 1.313.343 1.313 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.007.463h1.307v-.355c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.326 0-2.786.647-2.754 2.533zm1.562 5.516c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="form-row mb-1">
                        <div class="col">
                            2. Is the project addressing congestion?
                            <br>
                            Instructions: Please provide analysis from corridor study or similar study that will show
                            the project will address congestion.
                            <i class="fa fa-asterisk" style="font-size:10px;color:red"></i>
                            <textarea id="description_strategy_2" name="description_strategy_2" class="form-control"
                                style="width: 22rem;{{ $project->strategy_2 ?? '' == 1 ? '' : 'display: none;' }}"
                                placeholder="Please provide analysis from corridor study or similar study that will show the project will address congestion.">{{ $project->description_strategy_2 ?? '' }}</textarea>
                        </div>
                        <div class="col-sm-2">
                            <select disabled name="strategy_2" class="form-control" onchange="displayBox(this.name); display4To10(this.name);">
                                <option></option>
                                {{$temp = $project->strategy_2 ?? ''}}
                                <option value="1" {{ $temp == 1 ? 'selected' : '' }}>Yes</option>
                                <option value="2" {{ $temp == 2 ? 'selected' : '' }}>No</option>
                            </select>
                            <div class="tip">
                                <div>
                                    <p>If “yes”, please provide a quantitative analysis if existing for use in CMP.</p>
                                </div><svg style="color:blue" width="1em" height="1em" viewBox="0 0 16 16"
                                    class="bi bi-question-circle" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path
                                        d="M5.25 6.033h1.32c0-.781.458-1.384 1.36-1.384.685 0 1.313.343 1.313 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.007.463h1.307v-.355c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.326 0-2.786.647-2.754 2.533zm1.562 5.516c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="form-row mb-1">
                        <div class="col">
                            3. Does the project add roadway capacity?
                            <br>
                            Instructions: Significant SOV capacity-adding projects impact regional or corridor travel
                            patterns.
                            Project descriptions typically include a new roadway or bypass, major or minor road widening
                            to add additional through lanes on an existing highway,
                            major roadway reconstruction, adding capacity to a corridor by improving many related
                            intersections.
                            <i class="fa fa-asterisk" style="font-size:10px;color:red"></i>
                            <textarea id="description_strategy_3" name="description_strategy_3" class="form-control"
                                style="width: 22rem;{{ $project->strategy_3 ?? '' == 1 ? '' : 'display: none;' }}"
                                placeholder="Please explain.">{{ $project->description_strategy_3 ?? '' }}</textarea>
                        </div>
                        <div class="col-sm-2">
                            <select disabled name="strategy_3" class="form-control" onchange="displayBox(this.name);display4To10(this.name);">
                                <option></option>
                                {{$temp = $project->strategy_3 ?? ''}}
                                <option value="1" {{ $temp == 1 ? 'selected' : '' }}>Yes</option>
                                <option value="2" {{ $temp == 2 ? 'selected' : '' }}>No</option>
                            </select>
                        </div>
                    </div>
                    <div id="4To10Holder" hidden>
                    <p>If the answer is “Yes” for either question(s) 2 or 3 please answer the questions below </p>
                    <div class="form-row mb-1">
                        <div class="col">
                            4. Are there other congestion mitigation projects (e.g., transportation demand management,
                            land use, public transportation, ITS and operations, pricing, bicycle and pedestrian, and
                            bottleneck relief)
                            within the project corridor that are programmed into the current MTP?
                            <br>
                            Instructions: Check project list in EPMPO’s current MTP to identify committed projects.​
                            <h6><a href="http://www.elpasompo.org/scroll_bar_area/mtp/default.htm"
                                    target="_blank">Helpful link</a></h6>
                            <textarea id="description_strategy_4" name="description_strategy_4" class="form-control"
                                style="width: 22rem;{{ $project->strategy_4 ?? '' == 1 ? '' : 'display: none;' }}"
                                placeholder="If yes, identify the project name(s), state project identification number (CSJ number), and MPO ID.">{{ $project->description_strategy_4 ?? '' }}</textarea>
                        </div>
                        <div class="col-sm-2">
                            <select disabled name="strategy_4" id="strategy_4" class="form-control" onchange="displayBox(this.name);">
                                <option></option>
                                {{$temp = $project->strategy_4 ?? ''}}
                                <option value="1" {{ $temp == 1 ? 'selected' : '' }}>Yes</option>
                                <option value="2" {{ $temp == 2 ? 'selected' : '' }}>No</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row mb-1">
                        <div class="col">
                            5. Using the 2019 CMP Report, is the corridor identified as a congested segment?
                            <br>
                            Instructions: See congestion problems and needs section of the 2019 CMP Report (page 21) to
                            identify congested segments.
                            <h6><a href="http://www.elpasompo.org/other/congestion_management_process_/default.htm"
                                    target="_blank">Helpful link</a></h6>
                            <textarea id="description_strategy_5" name="description_strategy_5" class="form-control"
                                style="width: 22rem;{{ $project->strategy_5 ?? '' == 1 ? '' : 'display: none;' }}">{{ $project->description_strategy_5 ?? '' }}</textarea>
                        </div>
                        <div class="col-sm-2">
                            <select disabled name="strategy_5" id="strategy_5" class="form-control" onchange="displayBox(this.name);">
                                <option></option>
                                {{$temp = $project->strategy_5 ?? ''}}
                                <option value="1" {{ $temp == 1 ? 'selected' : '' }}>Yes</option>
                                <option value="2" {{ $temp == 2 ? 'selected' : '' }}>No</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row mb-1">
                        <div class="col">
                            6. Can the congestion be addressed without building more road capacity?
                            <br>
                            Instructions: Using simulation or other appropriate analysis tool, conduct an alternatives
                            analysis to determine whether
                            the problem/deficiency can be addressed without building more road capacity.
                            <textarea id="description_strategy_6" name="description_strategy_6" class="form-control"
                                style="width: 22rem;{{ $project->strategy_6 ?? '' == 1 ? '' : 'display: none;' }}">{{ $project->description_strategy_6 ?? '' }}</textarea>
                        </div>
                        <div class="col-sm-2">
                            <select disabled name="strategy_6" id="strategy_6" class="form-control" onchange="displayBox(this.name);">
                                <option></option>
                                {{$temp = $project->strategy_6 ?? ''}}
                                <option value="1" {{ $project->strategy_6 ?? '' == 1 ? 'selected' : '' }}>Yes</option>
                                <option value="2" {{ $project->strategy_6 ?? '' == 2 ? 'selected' : '' }}>No</option>
                            </select>
                        </div>
                    </div>
                    <p> 7. Describe any congestion mitigation alternatives to the proposed improvement that have been
                        considered or will be evaluated to correct the deficiencies and manage the
                        facility effectively (or facilitate its management in the future).
                        <br>
                        Instructions: Using regional CMP Strategies identified in the 2019 CMP (pg. 27), identify
                        corridor-level congestion mitigation strategies that will be evaluated to address the problems
                        and deficiencies in the corridor.
                        Consider strategies as an alternative to the added capacity project, and/or bundle congestion
                        mitigation strategies into the added capacity project.</p>
                    <h6><a href="http://www.elpasompo.org/other/congestion_management_process_/default.htm"
                            target="_blank">Helpful link</a></h6>
                    <textarea id="description_strategy_7" name="description_strategy_7" class="form-control"
                        style="width: 22rem;">{{ $project->description_strategy_7 ?? '' }}</textarea>
                    <p>8. Specify congestion mitigation strategies that will be implemented as part of the project.
                        <br>
                        Instructions: Identify which congestion mitigation strategies will be implemented as part of the
                        project.
                        Using regional CMP Strategies identified in the 2019 CMP (pg. 27) (For example bike lanes, ITS,
                        operational improvements, etc.)
                    </p>
                    <h6><a href="http://www.elpasompo.org/other/congestion_management_process_/default.htm"
                            target="_blank">Helpful link</a></h6>
                    <textarea id="description_strategy_8" name="description_strategy_8" class="form-control"
                        style="width: 22rem;">{{ $project->description_strategy_8 ?? '' }}</textarea>
                    <p>9. What are the specific congestion reduction impacts of the implemented strategies?
                        <br>
                        Instructions: Based on the results of the congestion mitigation analysis, document the benefits
                        in terms of specific CMP performance measures when possible.
                        <br>
                        To aid in responding question # 9 if there is no existing congestion mitigation analysis.
                        Complete the following qualitative criteria for the strategy type(s) encompassed by the project/program:
                        <a href="/MPO_Projects/EPMPO_Form/public/documents/Revised_CMP_Qualitative.pdf" target="_blank">Helpful Link</a>
                    </p>
                    <textarea id="description_strategy_9" name="description_strategy_9" class="form-control"
                        style="width: 22rem;">{{ $project->description_strategy_9 ?? '' }}</textarea>
                    <p>10. If not implementing a congestion mitigation strategy as part of the project, please explain
                        reason.
                        <br>
                        Instructions: Include an explanation that highlights the reason why no congestion mitigation
                        strategies are feasible or warranted as part of the project.
                    </p>
                    <textarea id="description_strategy_10" name="description_strategy_10" class="form-control"
                        style="width: 22rem;">{{ $project->description_strategy_10 ?? '' }}</textarea>
            </div>
            <hr>
            <br>
            Projects will be examined at the corridor level to determine multimodal needs. Which best describes this
            projects. <i class="fa fa-asterisk" style="font-size:10px;color:red"></i>
            <a href="http://www.elpasompo.org/civicax/filebank/blobdload.aspx?BlobID=23409"
                target="_blank">Block System:</a><br>
            <label><input type="radio" name="block_system" value="1"
                    {{ $project->block_system ?? '' == 1 ? 'checked' : '' }}> Within Community</label autocomplete="off"
                disabled>
            <label><input type="radio" name="block_system" value="2"
                    {{ $project->block_system ?? '' == 2 ? 'checked' : '' }}> Community to community</label
                autocomplete="off" disabled>
            <label><input type="radio" name="block_system" value="3"
                    {{ $project->block_system ?? '' == 3 ? 'checked' : '' }}> Community to region</label
                autocomplete="off" disabled>
            <label><input type="radio" name="block_system" value="4"
                    {{ $project->block_system ?? '' == 4 ? 'checked' : '' }}> Region to region</label autocomplete="off"
                disabled>
            </div>
            <div class="form-row mb-1">
                <div class="col-sm-3">
                    <p>Have the above dates been reviewed by TXDOT or NMDOT? <i class="fa fa-asterisk" style="font-size:10px;color:red"></i></p>
                    <label><input type="radio" name="reviewed_dates" value="1"
                            {{ $project->reviewed_dates ?? '' == 1 ? 'checked' : '' }}> Yes</label autocomplete="off" disabled></label>
                    <label><input type="radio" name="reviewed_dates" value="2"
                            {{ $project->reviewed_dates ?? '' == 2 ? 'checked' : '' }}> No</label autocomplete="off" disabled></label>
                    <label><input type="radio" name="reviewed_dates" value="3"
                            {{ $project->reviewed_dates ?? '' == 3 ? 'checked' : '' }}> N/A</label autocomplete="off" disabled></label>
                </div>
                <div class="col-sm-3">
                    <label for="date_reviewed">Date Reviewed</label>
                    <input id="dates" type="date" name="date_reviewed" class="form-control" autocomplete="off" value="{{ $project->date_reviewed ?? ''}}"
                        disabled>
                </div>
                <div class="col-sm-3">
                    <label>Reviewed By</label>
                    <input type="text" name="reviewed_by" class="form-control" autocomplete="off" value="{{ $project->reviewed_by ?? ''}}" disabled>
                </div>
                <div class="col-sm-3">
                    <label>Agency</label>
                    <input type="text" name="reviewed_agency" class="form-control" autocomplete="off" value="{{ $project->reviewed_agency ?? ''}}" disabled>
                </div>
            </div>
</div>