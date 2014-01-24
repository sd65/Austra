$(document).ready(function(){
	$('.copy').click(function() {
		var el = $(this) ;
		var datadate = $(this).data("date");
		var datafiliere = $(this).data("filiere");
		$.get("../../include/changePHPSession.php", {date: datadate, filiere: datafiliere},
		function(){
			el.addClass('actif');
		});
	});

	$('.paste').click(function() {
		var el = $(this) ;
		var toDate = $(this).data("date");
		$.get("../include/paste_edt.php", {toDate: toDate},
		function(){
			//location.reload();
			el.addClass('actif');
		});
	});

});