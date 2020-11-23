/*
    This function assists in changing the text of 
    a button to match the text inside a drop down menu
    Can be seen in action when you approve or decline a submission
*/
function changeButtonText(id_of_Text, id_button) {
    var select = document.getElementById(id_of_Text);
    select = select.options[select.selectedIndex].text;
    var button = document.getElementById(id_button);
    button.textContent = select;
}
/* Needed to make project read only blades. 
    Assists on the show view.
    This helps in recycling Blade code.
    Assists in automata
    Makes everything readonly and enables specific button groups
*/
function make_project_readonly() {
    $("#showHolder :input").attr("readonly", true); //Make read only everything, #showHolder holds all show blade view
    $("#showHolder button").prop("disabled", true);
    //Enable back these buttons
    $("#buttonHolder :input").prop("disabled", false); // all buttons on this div
    $("#toggleMapButton").prop("disabled", false);
    $("#toggeleSuppQ").prop("disabled", false);
}

function remove_readonly(element) {
    $("#" + element).prop("readonly", false)
}

function display4To10() {
    if ($('select[name="' + "strategy_2" + '"]').val() == 1 || $('select[name="' + "strategy_3" + '"]').val() == 1) {
        $('#4To10Holder').attr("hidden", false);
    } else {
        $('#4To10Holder').attr("hidden", true);
    }
}

function toggleTA(name){
    if ($('input[name="' + name + '"]').is(':checked')) {
        $('textarea[name="description_' + name + '"]').show();
    } else {
        $('textarea[name="description_' + name + '"]').hide();
    }
};

function displayBox(name){
    if ($('select[name="' + name + '"]').val() == 1) {
        $('textarea[name="description_' + name + '"]').show();
    } else {
        $('textarea[name="description_' + name + '"]').hide();
    }
};

/**
 * Toggles in setting require elements.
 * This is used when the program is about to go to submited state 
 * when the user is on the 'PM review' state.
 * 
 * This allows the user to save, without this the user would have to fill
 * ALL required fields when saving. 
 */
function set_required(required, project_type) {
    if (project_type == 'PRF' || project_type == '5310 PRF') {
        if (required == true) {
            $("#showHolder :input").prop('required', true); // Everything is required
            $("#showHolder :checkbox").prop('required', false); // Every checkbox is not required
            if (project_type == 'PRF') {
                //optionals
                $("#part4_inputs :input").prop('required', false); // make optional
                $("#YOE_sectionHolder :input").prop('required', false); // make optional
                $("#CMAQ_sectionHolder :input").prop('required', false); // make optional
                $("#Transit_sectionHolder :input").prop('required', false); // make optional
                $("#project_funding_section :input").prop('required', false); // make optional
            } else if (project_type == '5310 PRF') {
                $("#transit_only :input").prop('required', false);
                $("#funding :input").prop('required', false);
            }

            //To fix error "An invalid form control with name = "" is not focusable"
            for(let i = 1; i < 7; i++) {
                $("#description_goal_" + i).prop('required', false); // Make optional
            }
            for(let i = 4; i < 7; i++) {
                $("#strategy_" + i).prop('required', false); // Make optional
            }
            for(let i = 1; i < 11; i++) {
                $("#description_strategy_" + i).prop('required', false); // Make optional
            }
            for(let i = 1; i < 6; i++) {
                $("#description_psp_" + i).prop('required', false); // Make optional
            }

            $("#progress_explain").prop('required', false); // make optional
            $("#dates").prop('required', false); // make optional
            $("#add_file").prop('required', false); // make optional

            for (let i = 1; i < 37; i++) {
                $("#sqq_" + i).prop('required', false);
                $("#description_sqq_" + i).prop('required', false);
            }
        } else if (required == false) {
            $("#showHolder :input").prop('required', false); // Everything is required
        }
    }
}

function set_required_helper(id, project_type) {
    if (id == 'Save Progress') {
        set_required(false, project_type);
    } else {
        set_required(true, project_type);
    }
}


function toggleComment() {
    $("#commentS").toggle('slow', function () {});
}

function addMoneySign(element, id) {
    if (element == "") {
        document.getElementById(id).value = "$0";
    } else if (element.charAt(0) == "$") {
        // do nothing 
    } else {
        document.getElementById(id).value = "$" + commafy(element);
    }
}

// Adds commas to integers
function commafy(num) {
    var str = num.toString().split('.');
    if (str[0].length >= 4) {
        str[0] = str[0].replace(/(\d)(?=(\d{3})+$)/g, '$1,');
    }
    if (str[1] && str[1].length >= 4) {
        str[1] = str[1].replace(/(\d{3})/g, '$1 ');
    }
    return str.join('.');
}

/**
 * Clears All the map data.
 */
function clearMap() {
    var result = confirm('Are you sure you want to clear the map data?');
    if (result) {
        clearMetadata();
        activateMapButtons();
       document.getElementById("point").value = null;
    }
}

/**
 * Clears All the map data on edit mode.
 */
function clearMapEdit() {
    var result = confirm('Are you sure you want to clear the map data?');
    if (result) {
        clearMetadata();
        activateMapButtonsEdit();
       document.getElementById("point").value = null;
    }
}

/**
 * Clears the crashes data.
 */
function clearCrashes(id) {
    var result = confirm('Are you sure you want to clear the crashes data?');
    if (result) {
        clearCrashesPoints();
        activateIndividual(id);
    }
}

/**
 * Clears the bridges data.
 */
function clearBridges(id) {
    var result = confirm('Are you sure you want to clear the bridges data?');
    if (result) {
        clearBridgesPoints();
        activateIndividual(id);
    }
}

/**
 * Clears the pavements data.
 */
function clearPavements(id) {
    var result = confirm('Are you sure you want to clear the pavements data?');
    if (result) {
        clearPavementsLines();
        activateIndividual(id);
    }
}

/**
 * Disables map buttons after click.
 */
function disable(id) {
  document.getElementById(id).disabled = true;
  //document.body.style.cursor = 'wait';
}

/**
 * Enables all map buttons.
 */ 
function activateMapButtons() {
  document.getElementById("queryCrashesBtn").disabled = false;
  document.getElementById("queryBridgesBtn").disabled = false;
  document.getElementById("queryPavementsBtn").disabled = false;
  //document.body.style.cursor = 'default';
}

/**
 * Enables all map buttons on edit mode.
 */ 
function activateMapButtonsEdit() {
    document.getElementById("queryCrashesBtnEdit").disabled = false;
    document.getElementById("queryBridgesBtnEdit").disabled = false;
    document.getElementById("queryPavementsBtnEdit").disabled = false;
}

/**
 * Enables selected button.
 */
function activateIndividual(id) {
    document.getElementById(id).disabled = false;
}


/**
 * Resets dynamic table values to zero when deleted
 */
function setRowToZero(idRow, rowMethod) {
    // loop the row
    var iterateRow = $("#" + idRow + " :input").map(function () {
        let h = $(this).val();
        let id = $(this).attr("id");
        // we do a try to prevent crash from NaN or undefined variables
        try {
            $("#" + id).val('$0');
            if (rowMethod == 1.1) {
                project_funding_table(); //force table to refresh
            } else if (rowMethod == 1) {

                funding_vehicles_table(); //force table to refresh
            } else if (rowMethod == 2) {
                funding_bus_table(); //force table to refresh
            } else if (rowMethod == 3) {
                funding_operations_table();
            }

        } catch {
            console.log(h + " this fail");
        }
    })
}

/* This fixes bug on edit. 
    The bug does not update the values on the dynamic table on edit when user clicks delete. 
    There is a glitch were if you delete then add then delete it forces the JS to work as intended. 
    This bug only happens on edit.
    The if statement deletes, adds, then deletes. Works. 
*/
function bugFixDeleteRowStatusEdit(table_id, row_id) {
    let numForSetRowToZero = 0;
    var table = document.getElementById(table_id);

    // detect who is calling this function
    if (table_id == "projectFundingTablePg1") {
        numForSetRowToZero = 1.1;
    } else if (table_id == "fundingVehiclesTable") {
        numForSetRowToZero = 1;
    } else if (table_id == "fundingBusTable") {
        numForSetRowToZero = 2;
    } else if (table_id == "fundingOperationsTable") {
        numForSetRowToZero = 3;
    }

    //set value to $0
    setRowToZero(row_id + table.rows.length, numForSetRowToZero);
    table.deleteRow(table.rows.length - 1);

    // detect who is calling this function
    if (table_id == "projectFundingTablePg1") {
        addRow();
    } else if (table_id == "fundingVehiclesTable") {
        addRow_1();
    } else if (table_id == "fundingBusTable") {
        addRow_2();
    } else if (table_id == "fundingOperationsTable") {
        addRow_3();
    }

    //set value to $0
    setRowToZero(row_id + table.rows.length, numForSetRowToZero);
    // remove table 
    table.deleteRow(table.rows.length - 1);
}

function searchProject(column) {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("input"+column);
    filter = input.value.toUpperCase();
    table = document.getElementById("project_table");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[column];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }       
    }

    if(document.getElementById('input0').value != "") {
        document.getElementById('input1').disabled = true;
    }
    else {
        document.getElementById('input1').disabled = false;
    }

    if(document.getElementById('input1').value != "") {
        document.getElementById('input0').disabled = true;
    }
    else {
        document.getElementById('input0').disabled = false;
    }
    
}