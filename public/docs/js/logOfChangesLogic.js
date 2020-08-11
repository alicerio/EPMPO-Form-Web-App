function displayChanges(log) {
   let hasbeeninside= false;
    // if no changes OR on first submission is clicked
    if(log.length == 0){
        $("#log_warning").attr("hidden",false);
       
    }else{
        try {
            for (item in log) {
                //ignore meta data
                if (item != "id" && item != "parent_id" && item != "updated_at" && 
                    item != "voc" && item != "created_at" && item != "status"
                    && item != "author") {
                    hasbeeninside = true;
                    document.getElementsByName(item)[0].style.backgroundColor = "#66ccff";
                    document.getElementsByName(item)[0].style.outlineStyle = "solid";
                    document.getElementsByName(item)[0].title = log[item];
                }
            }
            if(!hasbeeninside){
                $("#log_warning").attr("hidden",false);
            }else{
                $("#log_success").attr("hidden",false);
            }
          
            
        } catch (err) {
            $("#log_error").attr("hidden",false);
        }

    }
    
 
}