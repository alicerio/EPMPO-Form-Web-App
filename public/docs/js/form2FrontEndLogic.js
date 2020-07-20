function funding_vehicles_table() {
    let federal_sum = 0;
    let local_sum = 0;
    let local_beyond_sum = 0;
    let total_sum = 0;
    let tdc_sum = 0;

    var inputValues = $('#funding_vehicles :input').map(function () {
        let h = "";
        let idH = "";
        h = $(this).val();

        //remove $
        if (h.charAt(0) == "$") {
            h = h.substring(1);
        }
        /**
         * We use substring to remove the numbers from the id
         * We do this since the ids have the same start of name
         */
        idH = $(this).attr("id"); // hold id
        try {
            h = parseInt(h.replace(/,/g, '')); // Removes comas and parses to int.

            if (isNaN(h) == false && h >= 0 && idH.length >= 1) {
                //h = parseInt(h);
                if (idH.substring(0, 16) == "federal_vehicles") {
                    if (h >= 0) {
                        federal_sum += h;
                        total_sum += h;
                    }
                } else if (idH.substring(0, 14) == "local_vehicles") {
                    if (h >= 0) {
                        local_sum += h;
                        total_sum += h;
                    }
                } else if (idH.substring(0, 21) == "local_beyond_vehicles") {
                    if (h >= 0) {
                        local_beyond_sum += h
                        total_sum += h;
                    }
                } else if (idH.substring(0, 12) == "tdc_vehicles") {
                    if (h >= 0) {
                        tdc_sum += h;
                    }
                }
            }
        } catch {
            // skip
        }
    })
    /*
            if ($(this).attr("id") == "federal_vehicles") {
                if (h >= 0) {
                    federal_sum += h;
                    total_sum += h;
                }
            } else if ($(this).attr("id") == "local_vehicles") {
                if (h >= 0) {
                    local_sum += h;
                    total_sum += h;
                }
            } else if ($(this).attr("id") == "local_beyond_vehicles") {
                if (h >= 0) {
                    local_beyond_sum += h;
                    total_sum += h;

                }
            } else if ($(this).attr("id") == "tdc_vehicles") {
                if (h >= 0) {
                    tdc_sum += h;
                }
            }
        })*/

    // Assists in addition of totals
    federal_sum = parseInt(federal_sum);
    local_sum = parseInt(local_sum);
    local_beyond_sum = parseInt(local_beyond_sum);
    tdc_sum = parseInt(tdc_sum);


    // Send to front
    document.getElementById("federal_vehicles_total").value = "$" + commafy(federal_sum);
    document.getElementById("local_vehicles_total").value = "$" + commafy(local_sum);
    document.getElementById("local_beyond_vehicles_total").value = "$" + commafy(local_beyond_sum);
    document.getElementById("tdc_vehicles_total").value = "$" + commafy(tdc_sum);
    document.getElementById("total_vehicles_total").value = "$" + commafy(parseInt(federal_sum + local_sum + local_beyond_sum));
    document.getElementById("yoe_check_vehicles").value = "$" + commafy(parseInt(federal_sum + local_sum + local_beyond_sum));



    rowSumMaster_1()
}

function rowSumMaster_1() {
    var table = document.getElementById("fundingVehiclesTable")
    for (let i = 0; i < table.rows.length; i++) {
        var row = table.rows[i];
        rowSum_1(row.id, i);
    }
}

function rowSum_1(idName, index) {
    index = parseInt(index);
    let toSearch = "#" + idName + ' :input';
    let rowTot = 0;
    let totId = "";
    var inputValues = $(toSearch).map(function () {
        let h = $(this).val();
        //remove $
        if (h.charAt(0) == "$") {
            h = h.substring(1);
        }
        h = parseInt(h.replace(/,/g, ''));

        if (h > 0 && $(this).attr("name") != "funding_total_vehicles[]" && $(this).attr("name") != "funding_category_vehicles[]" &&
            $(this).attr("name") != "funding_tdc_vehicles[]") {
            rowTot += h;
        }
    })
    index++;
    totId = "fvt1_tot" + index;

    $("#" + totId).attr("value", "$" + commafy(rowTot));
}

function addRow_1() {
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
    let cell2Id = "federal_vehicles" + table.rows.length;
    let cell3Id = "local_vehicles" + table.rows.length;
    let cell4Id = "local_beyond_vehicles" + table.rows.length;
    let cell6Id = "tdc_vehicles" + table.rows.length;


    cell1.innerHTML = '<input type="text" name="funding_category_vehicles[]" size="32" class="form-control">';
    cell2.innerHTML = '<input onchange="funding_vehicles_table();addMoneySign(this.value, this.id)" id=' + cell2Id + ' type="text" name="funding_federal_vehicles[]" class="form-control">';
    cell3.innerHTML = '<input onchange="funding_vehicles_table();addMoneySign(this.value, this.id)" id=' + cell3Id + ' type="text" name="funding_local_vehicles[]" class="form-control">';
    cell4.innerHTML = '<input onchange="funding_vehicles_table();addMoneySign(this.value, this.id)" id=' + cell4Id + ' type="text" name="funding_local_beyond_vehicles[]" class="form-control">';
    cell5.innerHTML = '<input type="text" name="funding_total_vehicles[]" size="8" class="form-control" readonly>';
    cell6.innerHTML = '<input onchange="funding_vehicles_table();addMoneySign(this.value, this.id)" id=' + cell6Id + ' type="text" name="funding_tdc_vehicles[]" class="form-control">';

    let inputId = $(table.rows[table.rows.length - 1].cells[4]).find("input")[0];
    inputId.setAttribute('id', newIdTotal);
}

function funding_bus_table() {
    let federal_sum = 0;
    let local_sum = 0;
    let local_beyond_sum = 0;
    let tdc_sum = 0;
    let total_sum = 0;

    var inputValues = $('#funding_bus :input').map(function () {
        let h = "";
        let idH = "";
        h = $(this).val();

        //remove $
        if (h.charAt(0) == "$") {
            h = h.substring(1);
        }

        idH = $(this).attr("id"); // hold id
        try {
            h = parseInt(h.replace(/,/g, '')); // Removes comas and parses to int.

            if (isNaN(h) == false && h >= 0 && idH.length >= 1) {
                if (idH.substring(0, 11) == "federal_bus") {
                    if (h >= 0) {
                        federal_sum += h;
                        total_sum += h;
                    }
                } else if (idH.substring(0, 9) == "local_bus") {
                    if (h >= 0) {
                        local_sum += h;
                        total_sum += h;
                    }
                } else if (idH.substring(0, 16) == "local_beyond_bus") {
                    if (h >= 0) {
                        local_beyond_sum += h;
                        total_sum += h;
                    }
                } else if (idH.substring(0, 7) == "tdc_bus") {
                    if (h >= 0) {
                        tdc_sum += h;
                    }
                }
            }

        } catch {

        }


    })
    document.getElementById("federal_bus_total").value = "$" + commafy(federal_sum);
    document.getElementById("local_bus_total").value = "$" + commafy(local_sum);
    document.getElementById("local_beyond_bus_total").value = "$" + commafy(local_beyond_sum);
    document.getElementById("tdc_bus_total").value = "$" + commafy(tdc_sum);
    document.getElementById("total_bus_total").value = "$" + commafy(total_sum);
    document.getElementById("yoe_check_bus").value = "$" + commafy(total_sum);

    rowSumMaster_2()
}

function rowSumMaster_2() {
    var table = document.getElementById("fundingBusTable")
    for (let i = 0; i < table.rows.length; i++) {
        var row = table.rows[i];
        rowSum_2(row.id, i);
    }
}

function rowSum_2(idName, index) {
    index = parseInt(index);
    let toSearch = "#" + idName + ' :input';
    let rowTot = 0;
    let totId = "";
    var inputValues = $(toSearch).map(function () {
        let h = $(this).val();

        if (h.charAt(0) == "$") {
            h = h.substring(1);
        }
        h = parseInt(h.replace(/,/g, ''));

        if (h > 0 && $(this).attr("name") != "funding_total_bus[]" && $(this).attr("name") != "funding_category_bus[]" &&
            $(this).attr("name") != "funding_tdc_bus[]") {
            rowTot += h;
        }
    })

    index++;
    totId = "fbt1_tot" + index;

    $("#" + totId).attr("value", "$" + commafy(rowTot));
}

function addRow_2() {
    var table = document.getElementById("fundingBusTable");
    var row = table.insertRow(table.rows.length);

    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
    var cell6 = row.insertCell(5);

    let newIdTotal = "fbt1_tot" + table.rows.length;
    row.setAttribute('id', 'fbtrow' + table.rows.length);
    let cell2Id = "federal_bus" + table.rows.length;
    let cell3Id = "local_bus" + table.rows.length;
    let cell4Id = "local_beyond_bus" + table.rows.length;
    let cell6Id = "tdc_bus" + table.rows.length;

    cell1.innerHTML = '<input type="text" name="funding_category_bus[]" size="32" class="form-control">'
    cell2.innerHTML = '<input onchange="funding_bus_table();addMoneySign(this.value, this.id)" id=' + cell2Id + ' type="text" name="funding_federal_bus[]" class="form-control">'
    cell3.innerHTML = '<input onchange="funding_bus_table();addMoneySign(this.value, this.id)" id=' + cell3Id + ' type="text" name="funding_local_bus[]" class="form-control">'
    cell4.innerHTML = '<input onchange="funding_bus_table();addMoneySign(this.value, this.id)" id=' + cell4Id + ' type="text" name="funding_local_beyond_bus[]" class="form-control">'
    cell5.innerHTML = '<input type="text" name="funding_total_bus[]" size="8" class="form-control" readonly>'
    cell6.innerHTML = '<input onchange="funding_bus_table();addMoneySign(this.value, this.id)" id=' + cell6Id + ' type="text" name="funding_tdc_bus[]" class="form-control">'

    let inputId = $(table.rows[table.rows.length - 1].cells[4]).find("input")[0];
    inputId.setAttribute('id', newIdTotal);
}

function funding_operations_table() {
    let federal_sum = 0;
    let local_sum = 0;
    let local_beyond_sum = 0;
    let total_sum = 0;

    var inputValues = $('#funding_operations :input').map(function () {
        let h = "";
        let idH = "";
        h = $(this).val();

        //remove $ sign
        if (h.charAt(0) == "$") {
            h = h.substring(1);
        }
        idH = $(this).attr("id"); // hold id

        try {
            h = parseInt(h.replace(/,/g, '')); // removes commas and parses to int
            if (isNaN(h) == false && h >= 0 && idH.length >= 1) { //check that value is valid    
                if (idH.substring(0, 18) == "federal_operations") {
                    if (h >= 0) {
                        federal_sum += h;
                        total_sum += h
                    }
                } else if (idH.substring(0, 16) == "local_operations") {
                    if (h >= 0) {
                        local_sum += h;
                        total_sum += h
                    }
                } else if (idH.substring(0, 23) == "local_beyond_operations") {
                    if (h >= 0) {
                        local_beyond_sum += h;
                        total_sum += h
                    }
                }

            }
        } catch {

        }
    })

    document.getElementById("federal_operations_total").value = "$" + commafy(federal_sum);
    document.getElementById("local_operations_total").value = "$" + commafy(local_sum);
    document.getElementById("local_beyond_operations_total").value = "$" + commafy(local_beyond_sum);
    document.getElementById("total_operations_total").value = "$" + commafy(total_sum);
    document.getElementById("yoe_check_operations").value = "$" + commafy(total_sum);

    rowSumMaster_3()
}

function rowSumMaster_3() {
    var table = document.getElementById("fundingOperationsTable")
    for (let i = 0; i < table.rows.length; i++) {
        var row = table.rows[i];
        rowSum_3(row.id, i);
    }
}

function rowSum_3(idName, index) {
    index = parseInt(index);
    let toSearch = "#" + idName + ' :input';
    let rowTot = 0;
    let totId = "";

    var inputValues = $(toSearch).map(function () {
        let h = $(this).val();

        if (h.charAt(0) == "$") {
            h = h.substring(1);
        }
        h = parseInt(h.replace(/,/g, '')); // removes commas and parses to int

        if (h > 0 && $(this).attr("name") != "funding_total_operations[]" && $(this).attr("name") != "funding_category_operations[]") {
            rowTot += h;
        }
    })
    // if (index == 0) totId = 'fot1_tot0';
    // else {
    index++;
    totId = "fot1_tot" + index;
    // }
    $("#" + totId).attr("value", "$" + commafy(rowTot));
}

function addRow_3() {
    var table = document.getElementById("fundingOperationsTable");
    var row = table.insertRow(table.rows.length);

    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);

    let newIdTotal = "fot1_tot" + table.rows.length;
    row.setAttribute('id', 'fotrow' + table.rows.length);
    let cell2Id = "federal_operations" + table.rows.length;
    let cell3Id = "local_operations" + table.rows.length;
    let cell4Id = "local_beyond_operations" + table.rows.length;

    cell1.innerHTML = '<input type="text" name="funding_category_operations[]" size="44" class="form-control">'
    cell2.innerHTML = '<input onchange="funding_operations_table(); addMoneySign(this.value, this.id)" id=' + cell2Id + ' type="text" name="funding_federal_operations[]" class="form-control">'
    cell3.innerHTML = '<input onchange="funding_operations_table(); addMoneySign(this.value, this.id)" id=' + cell3Id + ' type="text" name="funding_local_operations[]" class="form-control">'
    cell4.innerHTML = '<input onchange="funding_operations_table(); addMoneySign(this.value, this.id)" id=' + cell4Id + ' type="text" name="funding_local_beyond_operations[]" class="form-control">'
    cell5.innerHTML = '<input type="text" name="funding_total_operations[]" class="form-control" readonly>'

    let inputId = $(table.rows[table.rows.length - 1].cells[4]).find("input")[0];
    inputId.setAttribute('id', newIdTotal);
}

function deleteRow_1() {
    var table = document.getElementById("fundingVehiclesTable");

    //set value to $0 
    setRowToZero('fvtrow' + table.rows.length, 1);

    // remove table 
    table.deleteRow(table.rows.length - 1);

}

function deleteRow_2() {
    var table = document.getElementById("fundingBusTable");
    //set value to $0
    setRowToZero('fbtrow' + table.rows.length, 2);

    // remove table 
    table.deleteRow(table.rows.length - 1);
}

function deleteRow_3() {
    var table = document.getElementById("fundingOperationsTable");
    //set value to $0 
    if (table.rows.length == 1) { // this is needed due to naming
        setRowToZero('fotrow', 3);
    } else {
        setRowToZero('fotrow' + table.rows.length, 3);
    }
    table.deleteRow(table.rows.length - 1);
}

function form2_setView() {
    $(":input").prop("disabled", false); // enables everything

    //disable special inputs
    for (let i = 0; i < 20; i++) {
        $("#locked_val" + i).prop("disabled", true);
    }
    //Make readonly

    document.getElementById("mpo_id").readOnly = true;
    //document.getElementById("signed_textarea").readOnly = true;
    document.getElementById("attachments_textarea").readOnly = true;
    document.getElementById("federal_vehicles_total").readOnly = true;
    document.getElementById("local_vehicles_total").readOnly = true;
    document.getElementById("local_beyond_vehicles_total").readOnly = true;
    document.getElementById("total_vehicles_total").readOnly = true;
    document.getElementById("tdc_vehicles_total").readOnly = true;

    document.getElementById("federal_bus_total").readOnly = true;
    document.getElementById("local_bus_total").readOnly = true;
    document.getElementById("local_beyond_bus_total").readOnly = true;
    document.getElementById("total_bus_total").readOnly = true;
    document.getElementById("tdc_bus_total").readOnly = true;

    document.getElementById("federal_operations_total").readOnly = true;
    document.getElementById("local_operations_total").readOnly = true;
    document.getElementById("local_beyond_operations_total").readOnly = true;
    document.getElementById("total_operations_total").readOnly = true;
}
