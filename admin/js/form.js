$(document).ready(function(){
	$('#invernant').click(function() {
        $(".pro").clearQueue().css({
				display : 'block'
        });
         $(".perso").clearQueue().css({
				display : 'none'
        });
	});

	$('#Enseignant').click(function() {
        $(".pro").clearQueue().css({
				display : 'none'
        });
         $(".perso").clearQueue().css({
				display : 'block'
        });
	});
	$('#department_chief').click(function() {
        $(".pro").clearQueue().css({
				display : 'none'
        });
         $(".perso").clearQueue().css({
				display : 'block'
        });
	});
	$('#personnel-administratif').click(function() {
        $(".pro").clearQueue().css({
				display : 'none'
        });
         $(".perso").clearQueue().css({
				display : 'block'
        });
	});
});