function funding_vehicles_table() {
    let federal_sum = 0;
    let local_sum = 0;
    let local_beyond_sum = 0;
    let tdc_sum = 0;
    let total_sum = 0;

    var inputValues = $('#funding_vehicles :input').map(function() {
        let h = "";
        h = parseInt($(this).val());

        if($(this).attr("id")== "federal_vehicles"){
            console.log($(this).attr("id"));
            if(h >= 0){
                federal_sum+=h;
            }
        }

        else if($(this).attr("id")== "local_vehicles"){
            console.log($(this).attr("id"));
            if(h >= 0){
                local_sum+=h;
            }
        }

        else if($(this).attr("id")== "local_beyond_vehicles"){
            console.log($(this).attr("id"));
            if(h >= 0){
                local_beyond_sum+=h;
            }
        }

        else if($(this).attr("id")== "tdc_vehicles"){
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

    document.getElementById("federal_vehicles_total").value = federal_sum;
    document.getElementById("local_vehicles_total").value = local_sum;
    document.getElementById("local_beyond_total").value = local_beyond_sum;
    document.getElementById("tdc_vehicles_total").value = tdc_sum;
    document.getElementById("total_vehicles").value = total_sum;
    document.getElementById("total_vehicles_total").value = total_sum;
    document.getElementById("yoe_check_vehicles").value = total_sum;
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