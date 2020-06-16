<div class="card">
    <div class="card-body">
        <h3>Project Funding</h3>
        <label>
            <input type="checkbox" name="mpo_funds" autocomplete="off" {{ $project->mpo_funds ?? '' == true ? 'checked' : '' }} disabled>
            Requesting MPO Funds
        </label><br>
        <label>
            <input type="number" name="yoe_cost_vehicles" id = "yoe_check_vehicles" autocomplete="off" value="{{ $project->yoe_cost_vehicles ?? '' }}" readonly>
            YOE Cost
        </label><br>
        <div class="card">
            <div class="card-header">
                <div class="form-row">
                    <div class="col-sm-2">
                        Capital(Refurnishing of Vehicles & Soft.)
                    </div>
                    <div class="col-sm-2">
                        Federal Share Usually 80%
                    </div>
                    <div class="col-sm-2">
                        Local Share Usually 20%
                    </div>
                    <div class="col-sm-2">
                        Local Contribution
                        Beyond Local Share
                    </div>
                    <div class="col-sm-2">
                        Total Share
                    </div>
                    <div class="col-sm-2">
                        TDC Amount Requested
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div id = "funding_vehicles">
                    <div class="form-row mb-1">
                        <table id="fundingVehiclesTable">
                            @foreach(explode(',', $project->funding_category_vehicles ?? '') as $index => $categories)
                            <tr id="fvtrow" class="fvt1">                                            
                                <td><input type="text" name="funding_category_vehicles[]" class="form-control" 
                                    value="{{ explode(',', $project->funding_category_vehicles ?? '')[$index] }}">
                                </td>
                                <td><input onchange="funding_vehicles_table()" id="federal_vehicles" type="number" 
                                    name="funding_federal_vehicles[]" class="form-control" 
                                    value="{{ explode(',', $project->funding_federal_vehicles ?? '')[$index] }}">
                                </td>
                                <td><input onchange="funding_vehicles_table()" id = "local_vehicles" type="number" 
                                    name="funding_local_vehicles[]" class="form-control" 
                                    value="{{ explode(',', $project->funding_local_vehicles ?? '')[$index] }}">
                                </td>
                                <td><input onchange="funding_vehicles_table()" id = "local_beyond_vehicles" type="number" 
                                    name="funding_local_beyond_vehicles[]" class="form-control"  
                                    value="{{ explode(',', $project->funding_local_beyond_vehicles ?? '')[$index] }}">
                                </td>    
                                <td><input type="number" name="funding_total_vehicles" id="fvt1_tot0" class="form-control" readonly>
                                </td>
                                <td><input onchange="funding_vehicles_table()" id = "tdc_vehicles" type="number" 
                                    name="funding_tdc_vehicles[]" class="form-control" 
                                    value="{{ explode(',', $project->funding_tdc_vehicles ?? '')[$index] }}">
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div id="" class="form-row mb-1">
                    <div class="col-sm-2">
                        Total Funding By Share
                    </div>
                    <div class="col-sm-2">
                        <input type="number" name="funding_federal_vehicles_total" id = "federal_vehicles_total" class="form-control" value="{{ $project->funding_federal_vehicles_total ?? '' }}" disabled>
                    </div>
                    <div class="col-sm-2">
                        <input type="number" name="funding_local_vehicles_total" id = "local_vehicles_total" class="form-control" value="{{ $project->funding_local_vehicles_total ?? '' }}" disabled>
                    </div>
                    <div class="col-sm-2">
                        <input type="number" name="funding_local_beyond_vehicles_total" id = "local_beyond_vehicles_total" class="form-control" value="{{ $project->funding_local_beyond_vehicles_total ?? '' }}" disabled>
                    </div>
                    <div class="col-sm-2">
                        <input type="number" name="funding_total_vehicles_total" id = "total_vehicles_total" class="form-control" value="{{ $project->funding_total_vehicles_total ?? '' }}" disabled>
                    </div>
                    <div class="col-sm-2">
                        <input type="number" name="funding_tdc_vehicles_total" id = "tdc_vehicles_total" class="form-control" value="{{ $project->funding_tdc_vehicles_total ?? '' }}" disabled>
                    </div>
                </div>
                <a onclick = "addRow_1()" class="btn btn-primary" role="button">Add Funding</a>
                <a class="btn btn-primary" role="button">Remove Funding</a>
            </div>
        </div>
        <br>
        <label>
            <input type="number" id="yoe_check_bus" name="yoe_cost_bus" autocomplete="off" value="{{ $project->yoe_cost_bus ?? '' }}" readonly>
            YOE Cost
        </label><br>
        <div class="card">
            <div class="card-header">
                <div class="form-row">
                    <div class="col-sm-2">
                        Capital(New Bus Purchase)
                    </div>
                    <div class="col-sm-2">
                        Federal Share Usually 85%
                    </div>
                    <div class="col-sm-2">
                        Local Share Usually 15%
                    </div>
                    <div class="col-sm-2">
                        Local Contribution
                        Beyond Local Share
                    </div>
                    <div class="col-sm-2">
                        Total Share
                    </div>
                    <div class="col-sm-2">
                        TDC Amount Requested
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div id = "funding_bus">
                    <div class="form-row mb-1">
                        <table id="fundingBusTable">
                            @foreach(explode(',', $project->funding_category_bus ?? '') as $index => $categories)
                            <tr id="fbtrow" class="fbt1">   
                                <td><input type="text" name="funding_category_bus[]" class="form-control" value="{{ explode(',', $project->funding_category_bus ?? '')[$index] }}">
                                </td>                                            
                                <td><input onchange="funding_bus_table()" id = "federal_bus" type="number" name="funding_federal_bus[]" class="form-control" value="{{ explode(',', $project->funding_federal_bus ?? '')[$index] }}">
                                </td>                                               
                                <td><input onchange="funding_bus_table()" id = "local_bus" type="number" name="funding_local_bus[]" class="form-control" value="{{ explode(',', $project->funding_local_bus ?? '')[$index] }}">
                                </td>                                                
                                <td><input onchange="funding_bus_table()" id = "local_beyond_bus" type="number" name="funding_local_beyond_bus[]" class="form-control" value="{{ explode(',', $project->funding_local_beyond_bus ?? '')[$index] }}">
                                </td>                                                
                                <td><input type="number" id="fbt1_tot0" name="funding_total_bus" class="form-control" readonly>
                                </td>
                                <td><input onchange="funding_bus_table()" id = "tdc_bus" type="number" name="funding_tdc_bus[]" class="form-control" value="{{ explode(',', $project->funding_tdc_bus ?? '')[$index] }}">
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="form-row mb-1">
                    <div class="col-sm-2">
                        Total Funding By Share
                    </div>
                    <div class="col-sm-2">
                        <input type="number" id = "federal_bus_total" name="funding_federal_bus_total" class="form-control" value="{{ $project->funding_federal_bus_total ?? '' }}" disabled>
                    </div>
                    <div class="col-sm-2">
                        <input type="number" id="local_bus_total" name="funding_local_bus_total" class="form-control" value="{{ $project->funding_local_bus_total ?? '' }}" disabled>
                    </div>
                    <div class="col-sm-2">
                        <input type="number" id="local_beyond_bus_total" name="funding_local_beyond_bus_total" class="form-control" value="{{ $project->funding_local_beyond_bus_total ?? '' }}" disabled>
                    </div>
                    <div class="col-sm-2">
                        <input type="number" id="total_bus_total" name="funding_total_bus_total" class="form-control" value="{{ $project->funding_total_bus_total ?? '' }}" disabled>
                    </div>
                    <div class="col-sm-2">
                        <input type="number" id="tdc_bus_total" name="funding_tdc_bus_total" class="form-control" value="{{ $project->funding_tdc_bus_total ?? '' }}" disabled>
                    </div>
                </div>
                <a onclick = "addRow_2()" class="btn btn-primary" role="button">Add Funding</a>
                <a class="btn btn-primary" role="button">Remove Funding</a>
            </div>
        </div>
        <br>
        <label>
            <input type="number" id="yoe_check_operations" name="yoe_cost_operations" autocomplete="off" value="{{ $project->yoe_cost_operations ?? '' }}" readonly>
            YOE Cost
        </label><br>
        <div class="card">
            <div class="card-header">
                <div class="form-row">
                    <div class="col-sm-2">
                        Operations
                    </div>
                    <div class="col-sm-2">
                        Federal Share Usually 50%
                    </div>
                    <div class="col-sm-2">
                        Local Share Usually 50%
                    </div>
                    <div class="col-sm-2">
                        Local Contribution
                        Beyond Local Share
                    </div>
                    <div class="col-sm-2">
                        Total Share
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div id="funding_operations">
                    <div class="form-row mb-1">
                        <table id="fundingOperationsTable">
                            @foreach(explode(',', $project->funding_category_operations ?? '') as $index => $categories)
                            <tr id="fotrow" class="fot1"> 
                                <td><input type="text" name="funding_category_operations[]" class="form-control" value="{{ explode(',', $project->funding_category_operations ?? '')[$index] }}">
                                </td>
                                <td><input onchange="funding_operations_table()" id = "federal_operations" type="number" name="funding_federal_operations[]" class="form-control" value="{{ explode(',', $project->funding_federal_operations ?? '')[$index] }}">
                                </td>
                                <td><input onchange="funding_operations_table()" id = "local_operations" type="number" name="funding_local_operations[]" class="form-control" value="{{ explode(',', $project->funding_local_operations ?? '')[$index] }}">
                                </td>
                                <td><input onchange="funding_operations_table()" id = "local_beyond_operations" type="number" name="funding_local_beyond_operations[]" class="form-control" value="{{ explode(',', $project->funding_local_beyond_operations ?? '')[$index] }}">
                                </td>
                                <td><input type="number" id="fot1_tot0" name="funding_total_operations" class="form-control" readonly>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            
                <div class="form-row mb-1">
                    <table>
                        <td>Total Funding By Share&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>              
                        <td><input type="number" id="federal_operations_total" name="funding_federal_operations_total" class="form-control" value="{{ $project->funding_federal_operations_total ?? '' }}" disabled>
                        </td>
                        <td><input type="number" id="local_operations_total" name="funding_local_operations_total" class="form-control" value="{{ $project->funding_local_operations_total ?? '' }}" disabled >
                        </td>
                        <td><input type="number" id="local_beyond_operations_total" name="funding_local_beyond_operations_total" class="form-control" value="{{ $project->funding_local_beyond_operations_total ?? '' }}" disabled>
                        </td>
                        <td><input type="number" id="total_operations_total" name="funding_total_operations_total" class="form-control" value="{{ $project->funding_total_operations_total ?? '' }}" disabled>
                        </td>
                    </table>
                </div>
                <a onclick = "addRow_3()" class="btn btn-primary" role="button">Add Funding</a>
                <a class="btn btn-primary" role="button">Remove Funding</a>
            </div>
        </div>
    </div>
</div>