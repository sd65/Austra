$(document).ready(function() 
{   
	var isMenuOpen = false;
	$('.user').click(function()
    {
		if (isMenuOpen == false){
            $("#menu").clearQueue().animate({
				left : '0'
            })
            $(".user").clearQueue().animate({
                "margin-left" : '220px'
            })
			isMenuOpen = true;
		}else{
            $("#menu").clearQueue().animate({
                left : '-200px'
            })
            $(".user").clearQueue().animate({
                "margin-left" : '0px'
            })
			isMenuOpen = false;
		}
    });

	var isCalOpen = false;
	$('.closecalendars').click(function()
    {
		if (isCalOpen == false){
            $("#calendars").fadeIn().clearQueue().animate({
				right : '0px'
            })
			$(".closecalendars").clearQueue().animate({
                "margin-right" : '345px',
				"display" : 'block'
            })
			isCalOpen = true;
		}else{
            $("#calendars").fadeOut().clearQueue().animate({
                right : '-300px'
            })
			$(".closecalendars").clearQueue().animate({
                "margin-right" : '45px'
            })
			isCalOpen = false;
		}
    });
	
	$(".TPChoice").click(function() {
		var nTP = $(this).text().substr(-1) ;
		$.get("include/changeCookies.php", {tp: nTP},
		function(){
			location.reload();
		});
		
	});
	
	$(".TDChoice").click(function() {
		var nTD = $(this).text().substr(-1) ;
		$.get("include/changeCookies.php", {td: nTD},
		function(){
			location.reload();
		});
	});

});
