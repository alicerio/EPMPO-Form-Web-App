function yoe_table(){
    let sum =0;
    let cs_sum =0; //construction subtotal sum
    var inputValues = $('#Yoe_cost :input').map(function() { //iterates given div
        let h = ""; //holder
        var type = $(this).prop("type");
        h = parseInt($(this).val()); //convert text to int
        
        if($(this).attr("id") == "yoe_cs_1" || $(this).attr("id") == "yoe_cs_2" ||
            $(this).attr("id") == "yoe_cs_3" || $(this).attr("id") == "yoe_cs_4" ||
            $(this).attr("id") == "yoe_cs_5"){
                console.log( $(this).attr("id"));
                if(h >= 0){
                    cs_sum += h;
                }
        }
       if (type != "button" && type != "submit") {
            if(h >= 0){
                sum += h; 
            }
        }
    })
   console.log(sum);
    // update sum
   document.getElementById("tot_yoe").value = sum;  
   document.getElementById("yoe_cs_tot").value = cs_sum;
}

function project_funding_table() {
    let federal_sum = 0;
    let state_sum = 0;
    let local_sum = 0;
    let local_cont_sum = 0;
    let total_sum = 0;

    var inputValues = $('#project_funding :input').map(function() {
        let h = "";
        h = parseInt($(this).val());

        if($(this).attr("id")== "federal"){
            console.log($(this).attr("id"));
            if(h >= 0){
                federal_sum+=h;
            }
        }

        else if($(this).attr("id")== "state"){
            console.log($(this).attr("id"));
            if(h >= 0){
                state_sum+=h;
            }
        }

        else if($(this).attr("id")== "local"){
            console.log($(this).attr("id"));
            if(h >= 0){
                local_sum+=h;
            }
        }

        else if($(this).attr("id")== "local_cont"){
            console.log($(this).attr("id"));
            if(h >= 0){
                local_cont_sum+=h;
            }
        }
        else{
            total_sum += federal_sum+state_sum+local_sum+local_cont_sum
        }
    })
    console.log(federal_sum);
    console.log(state_sum);
    console.log(local_sum);
    console.log(local_cont_sum);
    console.log(total_sum)

    document.getElementById("federal_total").value = federal_sum;
    document.getElementById("state_total").value = state_sum;
    document.getElementById("local_total").value = local_sum;
    document.getElementById("local_beyond_total").value = local_cont_sum;
    document.getElementById("total").value = total_sum;
    document.getElementById("total_total").value = total_sum;
    document.getElementById("yoe_check").value = total_sum;

    

}