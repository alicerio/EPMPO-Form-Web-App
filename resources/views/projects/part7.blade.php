<div class="card">
    <div class="card-body">
        {{--Contact Information--}}
        <h3>Contact Information <i class="fa fa-asterisk"
            style="font-size:10px;color:red"></i></h3>
        <div class="card">
            <div class="card-header">
                <div class="form-row">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-2">
                        Name
                    </div>
                    <div class="col-sm-2">
                        Phone No.
                    </div>
                    <div class="col-sm-2">
                        eMail
                    </div>
                    <div class="col-sm-2">
                        Agency
                    </div>
                    <div class="col-sm-2">
                        Title
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-row mb-1">
                    <div class="col-sm-2">
                        Local PM
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="local_pm_name" class="form-control"
                            value="{{ $project->local_pm_name ?? ''}}" disabled>
                    </div>
                    <div class="col-sm-2">
                        <input type="tel" name="local_pm_phone" class="form-control"
                            value="{{ $project->local_pm_phone ?? ''}}" disabled>
                    </div>
                    <div class="col-sm-2">
                        <input type="email" name="local_pm_email" class="form-control"
                            value="{{ $project->local_pm_email ?? ''}}" disabled>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="local_pm_agency" class="form-control"
                            value="{{ $project->local_pm_agency ?? '' }}" disabled>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="local_pm_title" class="form-control"
                            value="{{ $project->local_pm_title ?? ''}}" disabled>
                    </div>
                </div>
                <div class="form-row mb-1">
                    <div class="col-sm-2">
                        State PM
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="state_pm_name" class="form-control"
                            value="{{ $project->state_pm_name ?? ''}}" disabled>
                    </div>
                    <div class="col-sm-2">
                        <input type="tel" name="state_pm_phone" class="form-control"
                            value="{{ $project->state_pm_phone ?? ''}}" disabled>
                    </div>
                    <div class="col-sm-2">
                        <input type="email" name="state_pm_email" class="form-control"
                            value="{{ $project->state_pm_email ?? ''}}" disabled>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="state_pm_agency" class="form-control"
                            value="{{ $project->state_pm_agency ?? ''}}" disabled>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="state_pm_title" class="form-control"
                            value="{{ $project->state_pm_title ?? ''}}" disabled>
                    </div>
                </div>
                <div class="form-row mb-1">
                    <div class="col-sm-2">
                        Sponsor
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="sponsor_name" class="form-control"
                            value="{{ $project->sponsor_name ?? ''}}" disabled>
                    </div>
                    <div class="col-sm-2">
                        <input type="tel" name="sponsor_phone" class="form-control"
                            value="{{ $project->sponsor_phone ?? ''}}" disabled>
                    </div>
                    <div class="col-sm-2">
                        <input type="email" name="sponsor_email" class="form-control"
                            value="{{ $project->sponsor_email ?? '' }}" disabled>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="sponsor_agency" class="form-control"
                            value="{{ $project->sponsor_agency ?? ''}}" disabled>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="sponsor_title" class="form-control"
                            value="{{ $project->sponsor_title ?? ''}}" disabled>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <h3>Attachments (CMAQ Analysis, Cost Estimate, Schematic/Design Concept, etc. ).</h3>
        <div class="form-group">
            <textarea class="form-control" id="attachments_textarea" rows="5" disabled>{{$project->file ?? ''}}</textarea>
        </div>
        <div class="form-group">
            <label for="file"></label>
            <input type="file" name="file" class="form-control" value="{{$project->file ?? ''}}" disabled>
            <a href="{{route('projects.download',$project->file ?? '')}}">Download</a>
        </div>
        <div class="form-row">
            <p>Files Attached&nbsp;</p>
            <button id="addFileBtn" class="btn btn-primary mt-1 float-right" type="button">
                Add File
            </button>
            <button id="openBtn" class="btn btn-primary mt-1 float-right" type="button">
                Open File
            </button>
            <button id="removeBtn" class="btn btn-primary mt-1 float-right" type="button">
                Remove File
            </button>
            <button id="showBtn" class="btn btn-primary mt-1 float-right" type="button">
                Show Attachment Name and Size
            </button>
        </div>
        <p>*Please attach any supporting documents to this form, if possible (CMAQ Analysis, Cost
            Estimate, Environmental Document, or other).
            <br>
            *Only Adobe Acrobat users may be able to attach files to this form. If you are not able
            to
            attach files, please send them via e-mail.
            <br>
            *This form does not guarantee the funds requested nor the approval of the project in the
            MTP/TIP.
            <br>
            *By signing this Project Request Form you certify that the project Description and
            limits
            are within the scope of work of the project
        </p>
        <p>*Please fill out this form entirely, and sign (digital signature). If "Signed By" field
            is
            blank, the form will not be accepted.</p>
        <h4>Signed By <i class="fa fa-asterisk"
            style="font-size:10px;color:red"></i></h4>
            @auth
            @if(auth()->user()->type == 1)
                <div class="form-group">
                    <input type="text" name="signature" class="form-control" value="{{ $project->signature ?? ''  }}" disabled>

                </div>
            @else
                <div class="form-group">
                    <input type="text" name="signature" class="form-control" title="Only a Submitter can sign" value="{{ $project->signature ?? ''  }}" readonly>
                </div>
            @endif                            
        @endauth
        <p>Save your form before signing, all fields will be locked after signature is provided.</p>
        <br>
    </div>
    @include('projects/logOfChanges_messages')
</div>