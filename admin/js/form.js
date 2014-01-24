$(document).ready(function(){
	if(($('#invernant').is(':checked')) || ($('#autre').is(':checked'))){
		$(".pro").clearQueue().css({
				display : 'block'
        });
	}
	if($('#autre').is(':checked')){
		$("#autreinput").clearQueue().css({
				display : 'block'
        });
	}else{
		$("#autreinput").clearQueue().css({
				display : 'none'
        });
	}

	$('#invernant').click(function() {
        $(".pro").clearQueue().css({
				display : 'block'
        });
		$("#autreinput").clearQueue().css({
				display : 'none'
        });
		$("#autre").removeAttr('checked').checkboxradio('refresh');
	});

	$('#autre').click(function() {
        $(".pro").clearQueue().css({
				display : 'block'
        });
        $("#autreinput").clearQueue().css({
				display : 'block'
        });
		$("#personnel-administratif, #invernant, #department_chief, #Enseignant").removeAttr('checked').checkboxradio('refresh');
	});

	$('#department_chief, #Enseignant, #personnel-administratif').click(function() {
        $(".pro").clearQueue().css({
				display : 'none'
        });
		$("#autreinput").clearQueue().css({
				display : 'none'
        });
		$("#autre").removeAttr('checked').checkboxradio('refresh');
	});
});