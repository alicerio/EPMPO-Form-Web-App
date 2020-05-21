function yoe_table(){
    let sum =0;
    let cs_sum =0; //construction subtotal sum
    var inputValues = $('#tester :input').map(function() { //iterates given div
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