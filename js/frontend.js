$(document).ready(function() 
{
	$('.user').click(function()
    {
		var isMenuOpen = $("#menu").attr('class');
		if (isMenuOpen == "menuclose"){
            $("#menu").clearQueue().animate({left : '0'})
			$("#menu").removeClass("menuclose").addClass("menuopen")
            $(".user").clearQueue().animate({"margin-left" : '220px'})
			$(".user").removeClass("menuclose").addClass("menuopen")
			$.get("include/changeCookies.php", {ouverturemenu: "menuopen"})

		}else{
            $("#menu").clearQueue().animate({left : '-200px'})
			$("#menu").removeClass("menuopen").addClass("menuclose")
            $(".user").clearQueue().animate({"margin-left" : '0px'})
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
                "margin-right" : '305px',
				"display" : 'block'
            })
			isCalOpen = true;
		}else{
            $("#calendars").fadeOut().clearQueue().animate({
                right : '-260px'
            })
			$(".closecalendars").clearQueue().animate({
                "margin-right" : '45px'
            })
			isCalOpen = false;
		}
    });
	
	$('.modifprofil').click(function()
    {
		var isMenuOpen = $("#modifierprofil").attr('class');
		if (isMenuOpen == "closeprofil"){
            $("#modifierprofil").clearQueue().animate({left : '200px'})
			$("#modifierprofil").removeClass("closeprofil").addClass("openprofil")
		}else{
            $("#modifierprofil").clearQueue().animate({left : '-200px'})
			$("#modifierprofil").removeClass("openprofil").addClass("closeprofil")
		}
    });
	$(".btn_pass").click(function(){
		if($(this).text()=="Annuler changement"){
			$("#hidepwd").hide();
			$(this).text("Changer de mot de passe");
		}else{
			$("#hidepwd").show();
			$(this).text("Annuler changement");
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
	
	$(".onoffswitch-checkbox").click(function() {
		if ($(this).is(':checked')) { // Vue "moi"
			$.get("include/changeCookies.php", {"vue_globale":0},
			function(){
				location.reload();
			});
		} else {
			$.get("include/changeCookies.php", {"vue_globale":1},
			function(){
				location.reload();
			});
		}
	});

	$("#selectFiliere").on('change', function() {
		var filiere = $(this).val();
		$.get("include/changePHPSession.php", {filiere: filiere},
		function(){
			location.reload();
		});
		
	});
	
	var clicdroit=8;
	var clicgauche=8;

	$(".arrowright").click(function(){
		clicdroit--;
		$("a.5").addClass("noDisplay");
		$("a.5").removeClass("5");

		$("a.4").addClass("5");
		$("a.4").removeClass("4");

		$("a.3").addClass("4");
		$("a.3").removeClass("3");

		$("a.2").addClass("3");
		$("a.2").removeClass("2");

		$("a.1").addClass("2");
		$("a.1").removeClass("1");

		$("a.2").next().addClass("1");
		$("a.2").next().removeClass("noDisplay");

		if(clicdroit==0){
			$(".arrowright").hide();
			clicgauche=15;
		}
		$(".arrowleft").show();
		
	});

	$(".arrowleft").click(function(){
		clicgauche--;
		$("a.1").addClass("noDisplay");
		$("a.1").removeClass("1");

		$("a.2").addClass("1");
		$("a.2").removeClass("2");

		$("a.3").addClass("2");
		$("a.3").removeClass("3");

		$("a.4").addClass("3");
		$("a.4").removeClass("4");

		$("a.5").addClass("4");
		$("a.5").removeClass("5");

		$("a.4").prev().addClass("5");
		$("a.4").prev().removeClass("noDisplay");

		if(clicgauche==0){
			$(".arrowleft").hide();
			clicdroit=15;
		}
		$(".arrowright").show();
	});

});