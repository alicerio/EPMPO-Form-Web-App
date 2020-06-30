function displayChanges(log) {
    // if no changes OR on first submission is clicked
    if(log.length == 0){
        alert("No changes from previous submission");
    }
    
    try {
        for (item in log) {
            //ignore meta data
            if (item != "id" && item != "parent_id" && item != "updated_at" && item != "voc" && item != "created_at" && item != "status") {
                console.log(item);
                document.getElementsByName(item)[0].style.backgroundColor = "#66ccff";
                document.getElementsByName(item)[0].style.outlineStyle = "solid";
                document.getElementsByName(item)[0].title = log[item];
            }
        }
    } catch (err) {
        alert("The Log of Changes can only be used on Submitions 2 and above");
    }
}