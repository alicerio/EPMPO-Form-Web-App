<div class="card">
    <div class="card-header">
        Electronic Project Request Form (5310 ePRF)
    </div>
    <div class="card-body">
        <label>
            MPO ID
        </label>
        <input id = "mpo_id" type="text" class="form-control" name="mpo_id" autocomplete="off" value="{{ $bProject->mpo_id ?? '' }}" readonly>
        <label>
            CSJ or CN
        </label>
        <input id="scj" type="text" class="form-control" name="csj_cn" autocomplete="off" value="{{ $bProject->csj_cn ?? '' }}" readonly>
        <label>
            Project Name
        </label>
        <input type="text" class="form-control" name="name" autocomplete="off" value="{{ $bProject->name ?? '' }}" disabled>
        <label>
            Project Description
        </label>
        <input type="text" class="form-control" name="description" autocomplete="off" value="{{ $bProject->description ?? '' }}" disabled>
        <label>
            Limit From
        </label>
        <input type="text" class="form-control" name="limit_from" autocomplete="off" value="{{ $bProject->limit_from ?? '' }}" disabled>
        <label>
            Limit To
        </label>
        <input type="text" class="form-control" name="limit_to" autocomplete="off" value="{{ $bProject->limit_to ?? '' }}" disabled>
        <label>
            Need and Purpose:
        </label>
        <textarea disabled name="need_purpose" class="form-control" {{ $bProject->need_purpose ?? '' }}></textarea>
        <label>
            Agency Comments:
        </label>
        <textarea disabled name="agency_comments" class="form-control" {{ $bProject->agency_comments ?? '' }}></textarea>
        <hr>
        <label>
            <input type="checkbox" name="transit_funds_request" autocomplete="off" {{ $bProject->transit_funds_request ?? '' == true ? 'checked' : '' }} disabled>
            Requesting Transit funds for his project/program (FTA, State and/or Local Funds)
        </label>
        <br>
        <div class="form-row">
            <div class="col">
                <label class="font-weight-bold">
                    Federal Fiscal Year(FY):
                </label>
                <input type="number" name="fiscal_year" class="form-control" autocomplete="off" value="{{ $bProject->fiscal_year ?? '' }}" disabled>
            </div>
            <div class="col">
                <label>
                    Network Year
                </label>
                <select disabled name="network_year" class="form-control">
                    <option>----</option>
                    <option value="2020" {{ $bProject->network_year ?? '' == 2020 ? 'selected' : ''}}>2020</option>
                    <option value="2030" {{ $bProject->network_year ?? '' == 2030 ? 'selected' : ''}}>2030</option>
                    <option value="2040" {{ $bProject->network_year ?? '' == 2040 ? 'selected' : ''}}>2040</option>
                    <option value="2045" {{ $bProject->network_year ?? '' == 2045 ? 'selected' : ''}}>2045</option>
                </select>
            </div>
        </div>
    </div>
</div>