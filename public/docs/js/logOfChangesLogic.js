function displayChanges(log){
    //hardcoded for testing purposes
 //   for(item in log){
        console.log(log["id"]);
        console.log(document.getElementsByName("name")[0].value);
        document.getElementsByName("name")[0].style.backgroundColor = "red";
        document.getElementsByName("name")[0].style.outlineStyle  = "solid";
        document.getElementsByName("name")[0].title  = log["name"]; //log[item];
   // }
}

   /*  Final version code
function displayChanges(log){
 //   for(item in log){
	    //document.getElementsByName(item).style.backgroundColor = "red";
        document.getElementsByName(item)[0].style.backgroundColor = "red";
	    document.getElementsByName(item)[0].style.outlineStyle  = "solid";
        document.getElementsByName(item)[0].title  = log[item];
        }
    }
   */
    