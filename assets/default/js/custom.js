
function fix_border() {
	var w = jQuery( ".carousel-item-img" ).innerWidth();
	var h = jQuery( ".carousel-item-img" ).innerHeight();
  	jQuery('.carousel-item-img .border').css('width', w - 30 - 4);
  	jQuery('.carousel-item-img .background').css('width', w).css('height', h);
}

function fix_bg() {
	var w = jQuery( ".p-item-img" ).innerWidth();
	var h = jQuery( ".p-item-img" ).innerHeight();
  	//$('.p-item-img .bg').css('width', w);
  	jQuery('.p-item-img .bg').css('width', w).css('height', h);

	h = jQuery( ".p-item" ).innerHeight();
  	jQuery('.p-item-img  .border').css('width', w - 30 - 4);
  	jQuery('.p-item-img  .border').css('height', h);
}


function p_hover() {
	jQuery('.p-item-img').hover(function() {
		jQuery(this).find('.bg').fadeIn();
	}, function() {
		jQuery(this).find('.bg').fadeOut();
	});
}

function select() {
	jQuery('.squard').hover(function() {
		jQuery('.range').show();
		select_state = 1;
	}, function() {
		jQuery('.range').hide();
		select_state = 0;
	})
}

function p_index() {
	var w = jQuery('.content').innerWidth();
	jQuery('.p-index').css('width', w);
}
jQuery(document).ready(function() {
	select();
	p_hover();
	p_index();

	jQuery('.toggle-menu-btn').click(function() {
		jQuery('.toggle-menu').slideDown('250');
		jQuery(this).css('opacity', 0);
	});

	jQuery('.toggle-menu-close').click(function() {
		jQuery('.toggle-menu').slideUp('250');
		jQuery('.toggle-menu-btn').css('opacity', 1);
	});


});


jQuery( window ).load(function() {
	fix_border();
	fix_bg();
});

jQuery( window ).resize(function() {
	p_index();
	setTimeout(function() {
		fix_border();
		fix_bg();	
	},200);
	
});


