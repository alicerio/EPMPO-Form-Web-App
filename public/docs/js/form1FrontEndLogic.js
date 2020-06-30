function yoe_table() {
    let sum = 0;
    let cs_sum = 0; //construction subtotal sum
    var inputValues = $('#Yoe_cost :input').map(function () { //iterates given div
        let h = ""; //holder
        var type = $(this).prop("type");
        h = parseInt($(this).val()); //convert text to int

        if ($(this).attr("id") == "yoe_cs_1" || $(this).attr("id") == "yoe_cs_2" ||
            $(this).attr("id") == "yoe_cs_3" || $(this).attr("id") == "yoe_cs_4" ||
            $(this).attr("id") == "yoe_cs_5") {
            // console.log( $(this).attr("id"));
            if (h >= 0) {
                cs_sum += h;
            }
        }
        if (type != "button" && type != "submit") {
            if (h >= 0) {
                sum += h;
            }
        }
    })

    document.getElementById("tot_yoe").value = sum;
    document.getElementById("yoe_cs_tot").value = cs_sum;
}

function project_funding_table() {
    let federal_sum = 0;
    let state_sum = 0;
    let local_sum = 0;
    let local_cont_sum = 0;
    let total_sum = 0;

    var inputValues = $('#project_funding :input').map(function () {
        let h = "";
        h = parseInt($(this).val());

        if ($(this).attr("id") == "federal") {
            if (h >= 0) {
                federal_sum += h;
                total_sum += h;
            }
        } else if ($(this).attr("id") == "state") {
            if (h >= 0) {
                state_sum += h;
                total_sum += h;
            }
        } else if ($(this).attr("id") == "local") {
            if (h >= 0) {
                local_sum += h;
                total_sum += h;
            }
        } else if ($(this).attr("id") == "local_cont") {
            if (h >= 0) {
                local_cont_sum += h;
                total_sum += h;
            }
        }
    })

    document.getElementById("federal_total").value = federal_sum;
    document.getElementById("state_total").value = state_sum;
    document.getElementById("local_total").value = local_sum;
    document.getElementById("local_beyond_total").value = local_cont_sum;
    document.getElementById("total_total").value = total_sum;
    document.getElementById("yoe_check").value = total_sum;

    rowSumMaster();
}

//iterates each row
function rowSumMaster() {
    var table = document.getElementById("projectFundingTablePg1"); //table name

    for (let i = 0; i < table.rows.length; i++) {
        var row = table.rows[i];
        rowSum(row.id, i);
    }
}

//sum of 1 row at a time
function rowSum(idName, index) {
    index = parseInt(index);
    let toSearch = "#" + idName + ' :input';
    let rowTot = 0;
    let totId = "";
    //get sum
    var inputValues = $(toSearch).map(function () {
        let h = $(this).val();
        if (parseInt($(this).val()) > 0 && $(this).attr("name") != "funding_total" && $(this).attr("name") != "funding_category") {
            h = parseInt($(this).val());
            rowTot += h;
        }
    })
    //get id
    if (index == 0) totId = 'pftpg1_tot0';
    else {
        index++;
        totId = "pftpg1_tot" + index;
    }
    $("#" + totId).attr("value", rowTot);
}

function deleteRow() {
    var table = document.getElementById("projectFundingTablePg1");
    table.deleteRow(table.rows.length - 1);
    console.log(table.rows.length);
}
//dynamic name change and row addition
function addRow() {
    var table = document.getElementById("projectFundingTablePg1");
    var row = table.insertRow(table.rows.length);

    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
    var cell6 = row.insertCell(5);

    let newIdTotal = "pftpg1_tot" + table.rows.length;
    row.setAttribute('id', "pfrow" + table.rows.length);

    cell1.innerHTML = '<input type="text" name="funding_category[]" class="form-control">';
    cell2.innerHTML = '<input onchange="project_funding_table()" id="federal" type="number" name="funding_federal[]" class="form-control">';
    cell3.innerHTML = '<input onchange="project_funding_table()" id="state" type="number" name="funding_state[]" class="form-control">';
    cell4.innerHTML = '<input onchange="project_funding_table()" id="local" type="number" name="funding_local[]" class="form-control">';
    cell5.innerHTML = '<input onchange="project_funding_table()" id="local_cont" type="number" name="funding_local_beyond[]" class="form-control">';
    cell6.innerHTML = '<input type="number" name="funding_total" class="form-control" readonly>';

    let inputId = $(table.rows[table.rows.length - 1].cells[5]).find("input")[0];
    inputId.setAttribute('id', newIdTotal)
}

/* Needed to use edit and create project blades. Part 1 to 7 blades are in show so
    this functions toggles the show blade to edit and create. 
    This helps in recycling Blade code.
    If form keeps growing remember to add readonly and inputs (that must be disable)
*/
function form1_setView() {
    $(":input").prop("disabled", false); // enables everything

    //disable special inputs
    for (let i = 0; i < 20; i++) {
        $("#locked_val" + i).prop("disabled", true);
    }
    //Make readonly
    document.getElementById("mpo_id").readOnly = true;
    document.getElementById("yoe_cs_tot").readOnly = true;
    document.getElementById("tot_yoe").readOnly = true;
    document.getElementById("yoe_check").readOnly = true;
    document.getElementById("pftpg1_tot0").readOnly = true;
    document.getElementById("federal_total").readOnly = true;
    document.getElementById("state_total").readOnly = true;
    document.getElementById("local_total").readOnly = true;
    document.getElementById("local_beyond_total").readOnly = true;
    document.getElementById("total_total").readOnly = true;
    document.getElementById("signed_textarea").readOnly = true;
    document.getElementById("attachments_textarea").readOnly = true;
}

function make_project_funding_readonly() {
    //Disable everything, #showHolder holds all show blade view
    $("#showHolder :input").attr("disabled", true);
    //Enable back these buttons
    $("#showButtonsDiv :input").prop("disabled", false); // all buttons on this div
    $("#editButtonsDiv :input").prop("disabled", false);
    $("#commentHolder :input").prop("disabled", false);
    $("#toggleMapButton").prop("disabled", false);
    
}

function changeButtonText(id_of_Text, id_button) {
    var select = document.getElementById(id_of_Text);
    select = select.options[select.selectedIndex].text;
    var button = document.getElementById(id_button);
    button.textContent = select;
}
