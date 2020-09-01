//existing
$(document).ready(function() {
    $('#crashesSwitch').on('click', function(){
    if ( $(this).is(':checked') ) {
        normalDraw();
    } 
    else {
        clearMetadata("points");
    }
    });
});

$(document).ready(function() {
    $('#pavementCondSwitch').on('click', function(){
    if ( $(this).is(':checked') ) {
        alert('meow');
        original_pavement();
    } 
    else {
        clearMetadata("lines");
    }
    });
});