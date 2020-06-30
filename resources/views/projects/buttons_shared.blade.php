<style>
    #show_anchor2,
    #show_anchor3 {
        height: 40px;
        margin-top: 1%;
    }
</style>
    <!-- These buttons are on every project
        To do: Find a way to send the current project to excel to print 
        the current project -->
<a id="show_anchor2" class="btn btn-primary mx-1" href="{{route('project.excel')}}" role="button">Export to
    Excel</a>
<button id="show_anchor3" class="btn btn-primary mx-1" onclick="print()" type="button">Export to PDF</button> 