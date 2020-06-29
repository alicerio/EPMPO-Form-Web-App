<div class="row col-12">
    @include('projects.buttons_shared')
    <!-- These options change depending on view. 
        The reason why they are not on the same file is becase on create it crashes since we would check other views that have an existing project -->
    <select id="select_Action" style="height:40px;margin-top:1%"class="mx-1" onchange="changeButtonText('select_Action','button_text_changer')" name="status"
        class="form-control" autocomplete="off">
        <option value="0" selected>Save Progress</option>
        <option value="1">Request PM Review</option>
    </select>
  <!--  @auth
    @if (auth()->user()->type == 1)
    <button class="btn btn-primary mx-1" type="submit">
        Submit
    </button>
    @else -->
    <button id="button_text_changer" class="btn btn-primary mx-1" type="submit">
        Save Progress
    </button>
   <!-- @endif
    @endauth -->
</div>
