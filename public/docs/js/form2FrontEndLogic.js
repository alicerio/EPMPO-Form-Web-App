function funding_vehicles_table() {
    let federal_sum = 0;
    let local_sum = 0;
    let local_beyond_sum = 0;
    let total_sum = 0;
    let tdc_sum = 0;

    var inputValues = $('#funding_vehicles :input').map(function() {
        let h = "";
        h = parseInt($(this).val());

        if($(this).attr("id")== "federal_vehicles"){
            console.log($(this).attr("id"));
            if(h >= 0){
                federal_sum+=h;
                total_sum+=h;
            }
        }

        else if($(this).attr("id")== "local_vehicles"){
            console.log($(this).attr("id"));
            if(h >= 0){
                local_sum+=h;
                total_sum+=h;

            }
        }

        else if($(this).attr("id")== "local_beyond_vehicles"){
            console.log($(this).attr("id"));
            if(h >= 0){
                local_beyond_sum+=h;
                total_sum+=h;

            }
        }

        else if($(this).attr("id")== "tdc_vehicles"){
            console.log($(this).attr("id"));
            if(h >= 0){
                tdc_sum+=h;
            }
        }
    })
    document.getElementById("federal_vehicles_total").value = federal_sum;
    document.getElementById("local_vehicles_total").value = local_sum;
    document.getElementById("local_beyond_vehicles_total").value = local_beyond_sum;
    document.getElementById("tdc_vehicles_total").value = tdc_sum;
    document.getElementById("total_vehicles_total").value = total_sum;
    document.getElementById("yoe_check_vehicles").value = total_sum;
}

function rowSumMaster() {
    var table = document.getElementById("fundingVehiclesTable")
    for(let i = 0; i < table.rows.length; i++) {
        var row = table.rows[i];
        rowSum(row.id,i);
    }
}

function rowSum(idName, index) {
    index = parseInt(index);
    let toSearch = "#" + idName + ' :input';
    let rowTot = 0;
    let totId = "";
    var inputValues = $(toSearch).map(function() {
        let h = $(this).val();
        if(parseInt($(this).val())>0 && $(this).attr("name") != "funding_total_vehicles" && $(this).attr("name") != "funding_category_vehicles") {
            h = parseInt($(this).val());
            rowTot+=h;
        }
    })
    if (index == 0) totId = "fvt1_tot0";
    else {
        index++;
        totId = "fvt1_tot" + index;
    }
    $("#" + totId).attr("value",rowTot);
}

function addRow() {
    var table = document.getElementById("fundingVehiclesTable");
    var row = table.insertRow(table.rows.length);

    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
    var cell6 = row.insertCell(5);

    let newIdTotal = "fvt1_tot" + table.rows.length;
    row.setAttribute('id', 'fvtrow' + table.rows.length);

    cell1.innerHTML = '<input type="text" name="funding_category_vehicles[]" class="form-control">'
    cell2.innerHTML = '<input onchange="funding_vehicles_table()" id="federal_vehicles" type="number" name="funding_federal_vehicles[]" class="form-control">'
    cell3.innerHTML = '<input onchange="funding_vehicles_table()" id = "local_vehicles" type="number" name="funding_local_vehicles[]" class="form-control">'
    cell4.innerHTML = '<input onchange="funding_vehicles_table()" id = "local_beyond_vehicles" type="number" name="funding_local_beyond_vehicles[]" class="form-control">'
    cell5.innerHTML = '<input type="number" name="funding_total_vehicles" id="fvt1_tot0" class="form-control" readonly>'
    cell6.innerHTML = '<input onchange="funding_vehicles_table()" id = "tdc_vehicles" type="number" name="funding_tdc_vehicles[]" class="form-control">'

    let inputId = $(table.rows[table.rows.length -1].cells[4].find("input")[0]);
    inputId.setAttribute('id',newIdTotal);
}

function funding_bus_table() {
    let federal_sum = 0;
    let local_sum = 0;
    let local_beyond_sum = 0;
    let tdc_sum = 0;
    let total_sum = 0;

    var inputValues = $('#funding_bus :input').map(function() {
        let h = "";
        h = parseInt($(this).val());

        if($(this).attr("id")== "federal_bus"){
            console.log($(this).attr("id"));
            if(h >= 0){
                federal_sum+=h;
            }
        }

        else if($(this).attr("id")== "local_bus"){
            console.log($(this).attr("id"));
            if(h >= 0){
                local_sum+=h;
            }
        }

        else if($(this).attr("id")== "local_beyond_bus"){
            console.log($(this).attr("id"));
            if(h >= 0){
                local_beyond_sum+=h;
            }
        }

        else if($(this).attr("id")== "tdc_bus"){
            console.log($(this).attr("id"));
            if(h >= 0){
                tdc_sum+=h;
            }
        }
        else{
            total_sum += federal_sum+local_sum+local_beyond_sum;
        }
    })
    console.log(federal_sum);
    console.log(local_sum);
    console.log(local_beyond_sum);
    console.log(tdc_sum);
    console.log(total_sum);

    document.getElementById("federal_bus_total").value = federal_sum;
    document.getElementById("local_bus_total").value = local_sum;
    document.getElementById("local_beyond_bus_total").value = local_beyond_sum;
    document.getElementById("tdc_bus_total").value = tdc_sum;
    document.getElementById("total_bus").value = total_sum;
    document.getElementById("total_bus_total").value = total_sum;
    document.getElementById("yoe_check_bus").value = total_sum;
}

function funding_operations_table() {
    let federal_sum = 0;
    let local_sum = 0;
    let local_beyond_sum = 0;
    let total_sum = 0;

    var inputValues = $('#funding_operations :input').map(function() {
        let h = "";
        h = parseInt($(this).val());

        if($(this).attr("id")== "federal_operations"){
            console.log($(this).attr("id"));
            if(h >= 0){
                federal_sum+=h;
            }
        }

        else if($(this).attr("id")== "local_operations"){
            console.log($(this).attr("id"));
            if(h >= 0){
                local_sum+=h;
            }
        }

        else if($(this).attr("id")== "local_beyond_operations"){
            console.log($(this).attr("id"));
            if(h >= 0){
                local_beyond_sum+=h;
            }
        }

        else{
            total_sum += federal_sum+local_sum+local_beyond_sum;
        }
    })
    console.log(federal_sum);
    console.log(local_sum);
    console.log(local_beyond_sum);
    console.log(total_sum);

    document.getElementById("federal_operations_total").value = federal_sum;
    document.getElementById("local_operations_total").value = local_sum;
    document.getElementById("local_beyond_operations_total").value = local_beyond_sum;
    document.getElementById("total_operations").value = total_sum;
    document.getElementById("total_operations_total").value = total_sum;
    document.getElementById("yoe_check_operations").value = total_sum;
}