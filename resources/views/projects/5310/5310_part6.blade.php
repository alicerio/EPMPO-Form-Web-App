<div class="card">
    <div class="card-body">
        <h3>Contact information <i class="fa fa-asterisk" style="font-size:10px;color:red"></i></h3>
        <div class="card">
            <div class="card-header">
                <div class="form-row">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-2">
                        Name 
                    </div>
                    <div class="col-sm-2">
                        Phone Number 
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
                <div class="required_contact">
                    <div class="form-row mb-1">
                        <div class="col-sm-2">
                            Sponsor
                        </div>
                        <div class="col-sm-2">
                            <input type="text" name="contact_name" class="form-control" value="{{ $project->contact_name ?? ''  }}" disabled>
                        </div>
                        <div class="col-sm-2">
                            <input type="tel" name="contact_phone" class="form-control" value="{{ $project->contact_phone ?? ''  }}" disabled>
                        </div>
                        <div class="col-sm-2">
                            <input type="email" name="contact_email" class="form-control" value="{{ $project->contact_email ?? '' }}" disabled>
                        </div>
                        <div class="col-sm-2">
                            <input type="text" name="contact_agency" class="form-control" value="{{ $project->contact_agency ?? ''  }}" disabled>
                        </div>
                        <div class="col-sm-2">
                            <input type="text" name="contact_title" class="form-control" value="{{ $project->contact_title ?? ''  }}" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        {{--Attachments--}}
        <h3>Attachments (CMAQ Analysis, Cost Estimate, Schematic/Design Concept, etc. ).</h3>
        <div class="form-group">
            @php
              date_default_timezone_set("America/Denver");
              $time = date("Y/m/d") . " " . date("h:i:sa") .  "\n" ;   
            @endphp
          <textarea class="form-control" id="attachments_textarea" rows="5" disabled>{{$project->file ?? '' }}</textarea>
        </div>
        <div class="form-group">
            <label for="file"></label>
            <input id="add_file" type="file" name="file" class="form-control" value="{{$project->file ?? ''}}" disabled>
        </div>
        <div class="form-row">
            <a id="showBtn" class="btn btn-primary mt-1 float-right" href="{{route('projects.download',$project->file ?? '')}}" role="button">
                Download File
            </a>
        </div>
        <p>*Only Adobe Acrobat users may be able to attach files to this form. If you are not able to attach files, please send them via e-mail.
            <br>
            *This form does not guarantee the funds requested nor the approval of the project in the MTP/TIP.
            <br>
            *By signing this Project Request Form you certify that the project Description and limits are within the scope of work of the project.
        </p>
        <p>*Please fill out this form entirely, and sign (digital signature). If "Signed By" field is blank, the form will not be accepted.</p>
        <h4>Signed By <i class="fa fa-asterisk" style="font-size:10px;color:red"></i></h4>
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
        @auth
            @if (auth()->user()->type != 2)
                <h5>Do not forget to save progress first before sending the form to MPO.</h5>
            @endif
        @endauth
    </div>
    @include('projects/logOfChanges_messages')
</div>
