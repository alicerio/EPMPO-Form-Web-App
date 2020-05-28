function displayChanges(log){
   for(item in log){
       console.log(item);
       //ignore meta data
       if(item != "id" && item !="parent_id" && item !="updated_at" && item !="voc" && item !="created_at" ){
           document.getElementsByName(item)[0].style.backgroundColor = "#66ccff";
           document.getElementsByName(item)[0].style.outlineStyle  = "solid";
           document.getElementsByName(item)[0].title  = log[item];
       }
    }
}