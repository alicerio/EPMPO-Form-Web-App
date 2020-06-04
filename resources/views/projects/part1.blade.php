<div class="card">
    <div class="card-header">
        Electornic Project Request Form (ePRF)
    </div>
    <div class="card-body">
        <label>
            MPO ID
        </label>
        <input id="mpo_id" type="text" class="form-control" name="mpo_id" value="{{ $project->mpo_id ?? '' }}" readonly>

        <label>
            CSJ or CN
        </label>
        <input id="scj" type="text" class="form-control" name="csj_cn" value="{{ $project->csj_cn ?? ''}}" readonly>

        <label>
            Name
        </label>
        <input type="text" class="form-control" name="name" value="{{ $project->name ?? ''}}" disabled>

        <label>
            Description
        </label>
        <input type="text" class="form-control" name="description" value="{{ $project->description ?? ''}}" disabled>

        <label>
            Limit From
        </label>
        <input type="text" class="form-control" name="limit_from" value="{{ $project->limit_from ?? ''}}" disabled>

        <label>
            Limit To
        </label>
        <input type="text" class="form-control" name="limit_to" value="{{ $project->limit_to ?? ''}}" disabled>
    </div>
</div>