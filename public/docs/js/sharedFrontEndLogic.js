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

const toggleTA = (name) => {
    if ($('input[name="' + name + '"]').is(':checked')) {
        $('textarea[name="description_' + name + '"]').show();
    } else {
        $('textarea[name="description_' + name + '"]').hide();
    }
};

const displayBox = (name) => {
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
    if (project_type == 'TASA' || project_type == '5310') {
        if (required == true) {
            $("#showHolder :input").prop('required', true); // Everything is required
            $("#showHolder :checkbox").prop('required', false); // Every checkbox is not required
            if (project_type == 'TASA') {
                //optionals
                $("#part4_inputs :input").prop('required', false); // make optional
                $("#YOE_sectionHolder :input").prop('required', false); // make optional
                $("#CMAQ_sectionHolder :input").prop('required', false); // make optional
                $("#Transit_sectionHolder :input").prop('required', false); // make optional
                $("#project_funding_section :input").prop('required', false); // make optional
            } else if (project_type == '5310') {
                $("#transit_only :input").prop('required', false);
                $("#funding :input").prop('required', false);
            }

            //To fix error "An invalid form control with name = "" is not focusable"
            $("#description_goal_1").prop('required', false); // make optional
            $("#description_goal_2").prop('required', false); // make optional
            $("#description_goal_3").prop('required', false); // make optional
            $("#description_goal_4").prop('required', false); // make optional
            $("#description_goal_5").prop('required', false); // make optional
            $("#description_goal_6").prop('required', false); // make optional

            $("#strategy_4").prop('required', false); // make optional
            $("#strategy_5").prop('required', false); // make optional
            $("#strategy_6").prop('required', false); // make optional

            $("#description_strategy_1").prop('required', false); // make optional
            $("#description_strategy_2").prop('required', false); // make optional
            $("#description_strategy_3").prop('required', false); // make optional
            $("#description_strategy_4").prop('required', false); // make optional
            $("#description_strategy_5").prop('required', false); // make optional
            $("#description_strategy_6").prop('required', false); // make optional
            $("#description_strategy_7").prop('required', false); // make optional
            $("#description_strategy_8").prop('required', false); // make optional
            $("#description_strategy_9").prop('required', false); // make optional
            $("#description_strategy_10").prop('required', false); // make optional

            $("#description_psp_1").prop('required', false); // make optional
            $("#description_psp_2").prop('required', false); // make optional
            $("#description_psp_3").prop('required', false); // make optional
            $("#description_psp_4").prop('required', false); // make optional
            $("#description_psp_5").prop('required', false); // make optional

            $("#progress_explain").prop('required', false); // make optional
            $("#dates").prop('required', false); // make optional

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

function clearMap() {
    var result = confirm('Are you sure you want to clear the map data?');
    if (result) {
        clearMetadata();
    }
}


function setRowToZero(idRow, rowMethod) {
    // loop the row
    var iterateRow = $("#" + idRow + " :input").map(function () {
        let h = $(this).val();
        let id = $(this).attr("id");
        // we do a try to prevent crash from NaN or undefined variables
        try {
            $("#" + id).val('$0');
            if (rowMethod == 1) {
                funding_vehicles_table(); //force table to refresh
            } else if (rowMethod == 2) {
                funding_bus_table(); //force table to refresh
            }

        } catch {
            console.log(h + " this fail");
        }
    })
}
