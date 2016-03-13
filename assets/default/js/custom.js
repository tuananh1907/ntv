(function($){
//var select_state = 0;

function fix_border() {
	var w = $( ".carousel-item-img" ).innerWidth();
	var h = $( ".carousel-item-img" ).innerHeight();
  	$('.carousel-item-img .border').css('width', w - 30 - 4);
  	$('.carousel-item-img .background').css('width', w).css('height', h);
}

function fix_bg() {
	var w = $( ".p-item-img" ).innerWidth();
	var h = $( ".p-item-img" ).innerHeight();
  	$('.p-item-img .bg').css('width', w);
  	$('.p-item-img .bg').css('width', w).css('height', h);

	h = $( ".p-item" ).innerHeight();
  	$('.p-item-img  .border').css('width', w - 30 - 4);
  	$('.p-item-img  .border').css('height', h);
}


function p_hover() {
	$('.p-item-img').hover(function() {
		$(this).find('.bg').fadeIn();
	}, function() {
		$(this).find('.bg').fadeOut();
	});
}

function select() {
	$('.squard').hover(function() {
		$('.range').show();
		select_state = 1;
	}, function() {
		$('.range').hide();
		select_state = 0;
	})
}


$(document).ready(function() {
	select();
p_hover();

});


$( window ).load(function() {
	fix_border();
	fix_bg();
});
$( window ).resize(function() {
	fix_border();
	fix_bg();
});

})(jQuery);
