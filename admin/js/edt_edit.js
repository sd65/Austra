$(document).ready(function(){
	$('.copy').click(function() {
		var el = $(this) ;
		var fromDate = $(this).data("date");
		var datafiliere = $(this).data("filiere");
		$.get("../../include/changePHPSession.php", {fromDate: fromDate, filiere: datafiliere},
		function(){
			el.addClass('actif');
		});
	});

	$('.paste').click(function() {
		var el = $(this) ;
		var toDate = $(this).data("date");
		$.get("../include/paste_edt.php", {toDate: toDate},
		function() {
			el.addClass('actif');
			location.reload;
		});
	});

});
