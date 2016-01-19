//Page loader
jQuery(function($) {

	$("#page").fadeIn("slow");
});


//Menu dropdown animation
jQuery(function($) {
	$('.sub-menu').hide();
	$('.main-navigation .children').hide();
	$('.menu-item').hover( 
		function() {
			$(this).children('.sub-menu').slideDown();
		}, 
		function() {
			$(this).children('.sub-menu').hide();
		}
	);
	$('.main-navigation li').hover( 
		function() {
			$(this).children('.main-navigation .children').slideDown();
		}, 
		function() {
			$(this).children('.main-navigation .children').hide();
		}
	);	
});

//Header search form
jQuery(function($) {
	$('.site-header .amplify-search').click(function()
	{
		$('.site-header .search-field').toggleClass('search-expanded');
	});	
});

//Fit Vids
jQuery(function($) {
    $("body").fitVids();  
});

//Mobile menu
jQuery(function($) {
	$('.main-navigation .menu').slicknav({
		label: '<i class="fa fa-bars"></i>',
		prependTo: '.mobile-nav',
		closedSymbol: '&#43;',
		openedSymbol: '&#45;'
	});
	$('.info-close').click(function(){
		$(this).parent().fadeOut();
		return false;
	});
});	

//Smooth scrolling
jQuery(function($) {
	$('a[href*=#]:not([href=#])').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			if (target.length) {
			$('html,body').animate({
			scrollTop: target.offset().top
			}, 800);
			return false;
			}
		}
	});
});

//Open social links in a new tab
jQuery(function($) {
     $( '.social-navigation li a' ).attr( 'target','_blank' );
});


//Resume page
jQuery(function($) {
	$('.nav-experience').click(function()
	{
		$('.schools').fadeOut('fast');
		$('.skills').fadeOut('fast');
		$('.jobs').fadeIn('slow');
	});
	$('.nav-education').click(function()
	{
		$('.schools').fadeIn('slow');
		$('.jobs').fadeOut('fast');
		$('.skills').fadeOut('fast');
	});
	$('.nav-skills').click(function()
	{
		$('.skills').fadeIn('slow');
		$('.jobs').fadeOut('fast');
		$('.schools').fadeOut('fast');
	});			
});

jQuery(function($) {
	$('.nav-skills').click(function() {
		$('.skillbar').each(function(){
			jQuery(this).find('.skillbar-bar').css({
				width: $(this).attr('data-percent')
			});
		});
	});
});

//Mobile sidebar toggle
jQuery(function($) {
	$('.sidebar-toggle').click(function() {
		$('.widget-area').fadeToggle();
	});		
});
