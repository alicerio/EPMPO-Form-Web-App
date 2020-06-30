<div class="row" id="commentHolder">
    <div class="col-md-12">
        <div class="form-group">
        @auth
        @if(auth()->user()->type == 2 && $project->status == 2)
            <button class="btn btn-info" rows = "5" id="toggleCommentsButton" type="button">Add Comments</button>
            <textarea name="comments" id="commentS" style="display:none;" class="form-control" rows="5" placeholder="Add Comments">{{$project->comments ?? ''}}</textarea>
        @elseif(auth()->user()->type != 2 && $project->status == 2)
            <button class="btn btn-info" rows = "5" id="toggleCommentsButton" type="button">Show Comments</button>
            <textarea name="comments" id="commentS" style="display:none;" class="form-control" rows="5" placeholder="Show Comments" readonly>{{$project->comments ?? ''}}</textarea>
        @endif
        @endauth
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
    $("#toggleCommentsButton").click(function(){
       $("#commentS").toggle( 'slow', function(){
       });
    });
 });
</script> 