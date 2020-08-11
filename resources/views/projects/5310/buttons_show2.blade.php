@auth
@if (auth()->user()->type == 2 && $project->status == 2)
<script>
    var obj = <?php echo json_encode($logOfChanges);?>;
</script>
<button class="btn btn-primary" name="data" type="button" onclick="displayChanges(obj)">Log of changes</button>
@else
@endif
@endauth


<a class="btn btn-primary" href="{{route('project.excel')}}" role="button">Export to
    Excel</a>
<a class="btn btn-primary" onclick="print()" role="button">Export to PDF</a>
@auth
@if (auth()->user()->type == 1)
<button class="btn btn-primary mt-1 float-right" type="submit">
    Submit
</button>
@else
<button class="btn btn-primary mt-1 float-right" type="submit">
    Update
</button>
@endif
@endauth