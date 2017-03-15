$(document).ready(function() {
	$(".button-collapse").off("click").sideNav();
	$('#sidenav-overlay').remove();
	$('select').material_select();
	$('.chips').material_chip();
	$('.chips-initial').material_chip('data');
	$('.modal').modal({
		dismissible: true, 
		opacity: .5,  
	});
	$('.datepicker').pickadate({
		selectMonths: true,
		selectYears: 15,
		format: 'You selecte!d: dddd, dd mmm, yyyy',
		formatSubmit: 'yyyy-mm-dd',
		hiddenName: true,
	});

	$(window).load(function() {
        preloaderFade = 2000;
        function hidepreloader() {
            var p2 = $('.spinner-wrapper');
            p2.delay(200).fadeOut(preloaderFade);
        }
        hidepreloader();
    });
});