function yoe_table() {
    let sum = 0;
    let cs_sum = 0; //construction subtotal sum
    var inputValues = $('#Yoe_cost :input').map(function () { //iterates given div
        let h = $(this).val(); //holder
        var type = $(this).prop("type");
        let idH = $(this).attr("id"); // hold id

        //remove $ sign
        if (h.charAt(0) == "$") {
            h = h.substring(1);
        }

        try {
            h = parseInt(h.replace(/,/g, '')); // removes commas and parses to int
            if (h != null && isNaN(h) != true && h >= 0 && idH.length > 0) { //check that value is valid
                if (idH == "yoe_cs_1" || idH == "yoe_cs_2" ||
                    idH == "yoe_cs_3" || idH == "yoe_cs_4" ||
                    idH == "yoe_cs_5") {
                    if (h >= 0) {
                        cs_sum += h;
                    }
                }
                if (type != "button" && type != "submit") {
                    if (h >= 0) {
                        sum += h;
                    }
                }
            }
        } catch {
            //ignore
        }

    })

    document.getElementById("tot_yoe").value = "$" + commafy(sum);
    document.getElementById("yoe_cs_tot").value = "$" + commafy(cs_sum);
}

function project_funding_table() {
    let federal_sum = 0;
    let state_sum = 0;
    let local_sum = 0;
    let local_cont_sum = 0;
    //iterate all inputs on given div
    var inputValues = $('#project_funding :input').map(function () {
        let h = ""; //holder
        let idH = "";
        h = $(this).val();

        //remove $ sign
        if (h.charAt(0) == "$") {
            h = h.substring(1);
        }
        /**
         * We use substring to remove the numbers from the id
         * We do this since the ids have the same start of name
         * For example:
         * fedaral, federal1, federal2 by using substring we get federal on the 3 ids
         */
        idH = $(this).attr("id"); // hold id
        try {
            h = parseInt(h.replace(/,/g, '')); // removes commas and parses to int

            if (isNaN(h) == false && h >= 0 && idH.length >= 1) { //check that value is valid
                h = parseInt(h);
                if (idH.substring(0, 7) == "federal") {
                    if (h >= 0) {
                        federal_sum += h;
                    }
                } else if (idH.substring(0, 5) == "state") {
                    if (h >= 0) {
                        state_sum += h;
                    }
                } else if (idH.substring(0, 10) == "local_cont") { // this has to go before local, otherwise 'local' runs with 'local_cont' as well
                    if (h >= 0) {
                        local_cont_sum += h;
                    }
                } else if (idH.substring(0, 5) == "local") {
                    if (h >= 0) {
                        local_sum += h;
                    }
                }
            }
        } catch {
            //skip
        }

    })
    //asssists in addition of totals
    federal_sum = parseInt(federal_sum);
    state_sum = parseInt(state_sum);
    local_sum = parseInt(local_sum);
    local_cont_sum = parseInt(local_cont_sum);
    //send to front end
    document.getElementById("federal_total").value = "$" + commafy(federal_sum);
    document.getElementById("state_total").value = "$" + commafy(state_sum);
    document.getElementById("local_total").value = "$" + commafy(local_sum);
    document.getElementById("local_beyond_total").value = "$" + commafy(local_cont_sum);
    document.getElementById("total_total").value = "$" + commafy(parseInt(federal_sum + state_sum + local_sum + local_cont_sum));
    document.getElementById("yoe_check").value = "$" + commafy(parseInt(federal_sum + state_sum + local_sum + local_cont_sum));

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
    //get sum by iterating given row
    var inputValues = $(toSearch).map(function () {
        let h = $(this).val();
        //remove $ sign
        if (h.charAt(0) == "$") {
            h = h.substring(1);
        }
        h = parseInt(h.replace(/,/g, '')); // removes commas and parses to int

        if (h > 0 && $(this).attr("name") != "funding_total[]" && $(this).attr("name") != "funding_category[]" && isNaN(h) == false) {
            rowTot += h;
        }
    })
    index++;
    totId = "pftpg1_tot" + index;
    $("#" + totId).attr("value", '$' + commafy(rowTot));
}

function deleteRow() {
    bugFixDeleteRowStatusEdit("projectFundingTablePg1", "pfrow");
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
    let cell2Id = "federal" + table.rows.length;
    let cell3Id = "state" + table.rows.length;
    let cell4Id = "local" + table.rows.length;
    let cell5Id = "local_cont" + table.rows.length;

    cell1.innerHTML = '<input type="text" name="funding_category[]" size="32" class="form-control">';
    cell2.innerHTML = '<input onchange="project_funding_table();addMoneySign(this.value, this.id)" id=' + cell2Id + ' type="text" name="funding_federal[]" class="form-control">';
    cell3.innerHTML = '<input onchange="project_funding_table();addMoneySign(this.value, this.id)" id=' + cell3Id + ' type="text" name="funding_state[]" class="form-control">';
    cell4.innerHTML = '<input onchange="project_funding_table();addMoneySign(this.value, this.id)" id=' + cell4Id + ' type="text" name="funding_local[]" class="form-control">';
    cell5.innerHTML = '<input onchange="project_funding_table();addMoneySign(this.value, this.id)" id=' + cell5Id + ' type="text" name="funding_local_beyond[]" class="form-control">';
    cell6.innerHTML = '<input type="text" name="funding_total[]" size="8" class="form-control" readonly>';

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
    document.getElementById("federal_total").readOnly = true;
    document.getElementById("state_total").readOnly = true;
    document.getElementById("local_total").readOnly = true;
    document.getElementById("local_beyond_total").readOnly = true;
    document.getElementById("total_total").readOnly = true;
    document.getElementById("attachments_textarea").readOnly = true;
    if(project.status >= 0) {
        document.getElementById("queryCrashesBtnEdit").disabled = true;
        document.getElementById("queryBridgesBtnEdit").disabled = true;
        document.getElementById("queryPavementsBtnEdit").disabled = true;
    }
}
