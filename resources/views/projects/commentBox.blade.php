<div class="col-md-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-info">
                @auth
                    @if(auth()->user()->type == 2)     
                        <textarea placeholder="Comments" class="pb-cmnt-textarea" name="comments_1" value="{{$project->comments_1 }}"></textarea>
                        <button class="btn btn-primary d-flex justify-content-center" type="button">Add Comment</button>
                    @else
                        <textarea placeholder="Comments" class="pb-cmnt-textarea" readonly></textarea>
                    @endif
                @endauth
            </div>
        </div>
    </div>
</div>