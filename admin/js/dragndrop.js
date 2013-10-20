$(document).ready(function(){
    //this will hold reference to the tr we have dragged and its helper
    var c = {};
    var colspanBase = 1;
    var colspanNext = 1;
    $("#ressources p").draggable({
        helper:"clone",  
        revert: "invalid",          
        start: function(event, ui) {
                c.tr = this;
                c.helper = ui.helper;
        }
    });

    $(".dropable").droppable({
		drop: function (event, ui) {
			$(this).append(ui.draggable);
            $(c.helper).remove();
		}
	});

    $(".plusun").click( function(){
        $(this).parent().parent().attr("colspan",colspanBase+1);
        colspanNext--;
        if (colspanNext>0) {
            $(this).parent().parent().next().attr("colspan",colspanNext);
        }else{
            $(this).parent().parent().next().remove();
            colspanNext=1;
        }
        colspanBase++;
    });

    $(".moinsun").click( function(){
        $(this).parent().parent().attr("colspan",colspanBase-1);
        $(this).parent().parent().parent().append("<td colspan='1' class='dropable ui-droppable'></td>");
        colspanBase--;
    });

});
