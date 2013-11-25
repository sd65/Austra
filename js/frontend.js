$(document).ready(function() 
{
	$('.user').click(function()
    {
		var isMenuOpen = $("#menu").attr('class');
		if (isMenuOpen == "menuclose"){
            $("#menu").clearQueue().animate({
				left : '0'
            })
			$("#menu").removeClass("menuclose").addClass("menuopen")
            $(".user").clearQueue().animate({
                "margin-left" : '220px'
            })
			$(".user").removeClass("menuclose").addClass("menuopen")
			$.get("include/changeCookies.php", {ouverturemenu: "menuopen"})

		}else{
            $("#menu").clearQueue().animate({
                left : '-200px'
            })
			$("#menu").removeClass("menuopen").addClass("menuclose")
            $(".user").clearQueue().animate({
                "margin-left" : '0px'
            })
			$(".user").removeClass("menuopen").addClass("menuclose")
			$.get("include/changeCookies.php", {ouverturemenu: "menuclose"})
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
