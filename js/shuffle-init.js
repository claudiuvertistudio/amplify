jQuery(function($) {
		$(document).ready(function() {
			var $grid = $('.portfolio-main');
			imagesLoaded( function() {
				$grid.shuffle({
					itemSelector: '.project'
				});
			});
			$('#filter a').click(function (e) {
				e.preventDefault();
				$('#filter a').removeClass('active');
				$(this).addClass('active');
				var groupName = $(this).attr('data-group');
				$grid.shuffle('shuffle', groupName );
			});

		});
});