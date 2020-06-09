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
                    <input type="checkbox" name="capital" autocomplete="off" {{ $bProject->capital ?? '' == true ? 'checked' : '' }} disabled>
                    Capital
                </label><br>
                <label>
                    <input type="checkbox" name="operations" autocomplete="off" {{ $bProject->operations ?? '' == true ? 'checked' : '' }} disabled>
                    Operations
                </label><br>
                <label>
                    <input type="checkbox" name="c" autocomplete="off" {{ $bProject->c ?? '' == true ? 'checked' : '' }} disabled>
                    C
                </label><br>
                <label>
                    <input type="checkbox" name="nonc" autocomplete="off" {{ $bProject->nonc ?? '' == true ? 'checked' : '' }} disabled>
                    Non-C
                </label><br>
                <label>
                    <input type="checkbox" name="pe" autocomplete="off" {{ $bProject->pe ?? '' == true ? 'checked' : '' }} disabled>
                    PE
                <label>
                    <input type="checkbox" name="env" autocomplete="off" {{ $bProject->env ?? '' == true ? 'checked' : '' }} disabled>
                    E:Env
                </label><br>
                <label>
                    <input type="checkbox" name="eng" autocomplete="off" {{ $bProject->eng ?? '' == true ? 'checked' : '' }} disabled>
                    E:Eng
                </label><br>
                <label>
                    <input type="checkbox" name="r" autocomplete="off" {{ $bProject->r ?? '' == true ? 'checked' : '' }} disabled>
                    R
                </label><br>
                <label>
                    <input type="checkbox" name="acq" autocomplete="off" {{ $bProject->acq ?? '' == true ? 'checked' : '' }} disabled>
                    R:Acq
                </label><br>
                <label>
                    <input type="checkbox" name="utl" autocomplete="off" {{ $bProject->utl ?? '' == true ? 'checked' : '' }} disabled>
                    R:Utl
                </label><br>
            </div>
            <div class="col">
                <div class="card" style="width: 22rem;">
                    <div class="card-body">
                        <h5 class="card-title text-center">**Transit Only</h5>

                        <label>Apportionment Year</label>
                        <input type="text" name="appointment_year" class="form-control" autocomplete="off" value="{{ $bProject->appointment_year ?? '' }}" disabled>
                        <label>TDC Award Amount</label>
                        <input type="text" name="tdc_award_amount" class="form-control" autocomplete="off" value="{{ $bProject->tdc_award_amount ?? '' }}" disabled>
                        <label>TDC Award Date</label>
                        <input type="text" name="tdw_award_date" class="form-control" autocomplete="off" value="{{ $bProject->tdw_award_date ?? '' }}" disabled>
                        <label>TDC Amount Requested</label>
                        <input type="text" name="tdc_amount_requested" class="form-control" autocomplete="off" value="{{ $bProject->tdc_amount_requested ?? '' }}" disabled><br>

                        <h4>Project Type:</h4>

                        <label>
                            <input type="checkbox" name="type_capital" autocomplete="off" {{ $bProject->type_capital ?? '' == true ? 'checked' : '' }} disabled>
                            Capital
                        </label><br>
                        <label>
                            <input type="checkbox" name="type_operating" autocomplete="off" {{ $bProject->type_operating ?? '' == true ? 'checked' : '' }} disabled>
                            Operating
                        </label><br>
                        <label>
                            <input type="checkbox" name="type_planning" autocomplete="off" {{ $bProject->type_planning ?? '' == true ? 'checked' : '' }} disabled>
                            Planning
                        </label><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>