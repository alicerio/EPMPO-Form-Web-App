<div class="card">
    <div class="card-body">
        {{--Project Phases and Transit only--}}
        <div class="form-row mb-1">
            <div class="col">
                <h3>Project Phase(s)</h3>
                <p>**Only checked phase(s) will be consider for funding (Year of Expenditure (YOE)
                    Cost). If a phase has been or will be completed with local funds or resources,
                    please do not check. Please enter cost information for each Phase checked.</p>
                <label>
                    <input type="checkbox" name="capital" autocomplete="off" {{ $project->capital ?? '' == true ? 'checked' : '' }} disabled>
                    Capital
                </label><br>
                <label>
                    <input type="checkbox" name="operations" autocomplete="off" {{ $project->operations ?? '' == true ? 'checked' : '' }} disabled>
                    Operations
                </label><br>
                <label>
                    <input type="checkbox" name="c" autocomplete="off" {{ $project->c ?? '' == true ? 'checked' : '' }} disabled>
                    C
                </label><br>
                <label>
                    <input type="checkbox" name="nonc" autocomplete="off" {{ $project->nonc ?? '' == true ? 'checked' : '' }} disabled>
                    Non-C
                </label><br>
                <label>
                    <input type="checkbox" name="pe" autocomplete="off" {{ $project->pe ?? '' == true ? 'checked' : '' }} disabled>
                    PE
                <label>
                    <input type="checkbox" name="env" autocomplete="off" {{ $project->env ?? '' == true ? 'checked' : '' }} disabled>
                    E:Env
                </label><br>
                <label>
                    <input type="checkbox" name="eng" autocomplete="off" {{ $project->eng ?? '' == true ? 'checked' : '' }} disabled>
                    E:Eng
                </label><br>
                <label>
                    <input type="checkbox" name="r" autocomplete="off" {{ $project->r ?? '' == true ? 'checked' : '' }} disabled>
                    R
                </label><br>
                <label>
                    <input type="checkbox" name="acq" autocomplete="off" {{ $project->acq ?? '' == true ? 'checked' : '' }} disabled>
                    R:Acq
                </label><br>
                <label>
                    <input type="checkbox" name="utl" autocomplete="off" {{ $project->utl ?? '' == true ? 'checked' : '' }} disabled>
                    R:Utl
                </label><br>
            </div>
            <div class="col">
                <div class="card" style="width: 22rem;">
                    <div class="card-body" id="transit_only">
                        <h5 class="card-title text-center">**Transit Only</h5>
                        <label>Apportionment Year</label>
                        <input type="text" name="appointment_year" class="form-control" autocomplete="off" value="{{ $project->appointment_year ?? '' }}" disabled>
                        <label>TDC Award Amount</label>
                        <input onchange="addMoneySign(this.value, this.id)" id="tdc" type="text" name="tdc_award_amount" class="form-control" autocomplete="off" value="{{ $project->tdc_award_amount ?? '' }}" disabled>
                        <label>TDC Award Date</label>
                        <input type="text" name="tdw_award_date" class="form-control" autocomplete="off" value="{{ $project->tdw_award_date ?? '' }}" disabled>
                        <label>TDC Amount Requested</label>
                        <input onchange="addMoneySign(this.value, this.id)" id="tdc_a" type="text" name="tdc_amount_requested" class="form-control" autocomplete="off" value="{{ $project->tdc_amount_requested ?? '' }}" disabled><br>

                        <h4>Project Type:</h4>

                        <label>
                            <input type="checkbox" name="type_capital" autocomplete="off" {{ $project->type_capital ?? '' == true ? 'checked' : '' }} disabled>
                            Capital
                        </label><br>
                        <label>
                            <input type="checkbox" name="type_operating" autocomplete="off" {{ $project->type_operating ?? '' == true ? 'checked' : '' }} disabled>
                            Operating
                        </label><br>
                        <label>
                            <input type="checkbox" name="type_planning" autocomplete="off" {{ $project->type_planning ?? '' == true ? 'checked' : '' }} disabled>
                            Planning
                        </label><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>