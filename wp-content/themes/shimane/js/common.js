jQuery(function ($) {
	$('.main-image-slider').carouFredSel({
		responsive: true,
		height: '100%',
		auto: 4000,
		items: {
			visible: 1,
			width: 900,
			height: 'auto'
		},
		scroll: {
			items: 1
		},
		prev: '.main-image-next',
		next: '.main-image-prev',
		pagination: '.main-image-pager'
	});
});

jQuery(function ($) {
	$('.global-navi-item').mouseenter(function () {
		var target = $(this).find('a').attr('rel');
		$(target).stop(true, false).slideDown(200);
	}).mouseleave(function () {
		var target = $(this).find('a').attr('rel');
		$(target).stop(true, false).slideUp(200);
	});

	$('.global-sub-navi').mouseenter(function () {
		$(this).stop(true, false).slideDown(200);
	}).mouseleave(function () {
		$('.global-sub-navi').stop(true, false).slideUp(200);
	});
});

jQuery(function ($) {
	$('.gallery-list').imagesLoaded(function () {
		$('.gallery-list').masonry({
			itemSelector: '.gallery-item',
			columnWidth: 213,
			gutter: 15
		});
	});

	$('.gallery-list').find('a').fancybox();
});

jQuery(function ($) {
	var bottom_margin = 20,
		$footer = $('.global-footer'),
		$page_top = $('.page-top');

	$page_top.hide();

	$(window).scroll(function () {
		if ($(this).scrollTop() > 100) {
			$page_top.fadeIn();
		} else {
			$page_top.fadeOut();
		}

		var footer_start = $footer.offset().top,
			scroll_bottom = $(this).scrollTop() + $(window).height();

		if (scroll_bottom > footer_start) {
			$page_top.css('bottom', (scroll_bottom - footer_start + bottom_margin) + 'px');
		} else {
			$page_top.css('bottom', '20px');
		}
	});

	$page_top.click(function () {
		$('body, html').animate({scrollTop: 0}, 500);
		return false;
	});
});

jQuery(function ($) {
	$('[src*="_off."]')
		.mouseover(function () {
			$(this).attr("src", $(this).attr("src").replace(/^(.+)_off(\.[a-z]+)$/, "$1_on$2"));
		})
		.mouseout(function () {
			$(this).attr("src", $(this).attr("src").replace(/^(.+)_on(\.[a-z]+)$/, "$1_off$2"));
		})
		.each(function (init) {
			$("<img>").attr("src", $(this).attr("src").replace(/^(.+)_off(\.[a-z]+)$/, "$1_on$2"));
		})
});
