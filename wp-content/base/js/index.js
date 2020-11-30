$(function () {
  const scrollTop = function () {
    const bottomMargin = 20;
    const $footer = $(".l-footer");
    const $pageTop = $(".js-page-top");

    $pageTop.hide();

    $(window).scroll(function () {
      if ($(this).scrollTop() > 100) {
        $pageTop.fadeIn();
      } else {
        $pageTop.fadeOut();
      }

      const footerStart = $footer.offset().top;
      const scrollBottom = $(this).scrollTop() + $(window).height();

      if (scrollBottom > footerStart) {
        $pageTop.css(
          "bottom",
          scrollBottom - footerStart + bottomMargin + "px"
        );
      } else {
        $pageTop.css("bottom", "20px");
      }
    });

    $pageTop.click(function () {
      $("body, html").animate({ scrollTop: 0 }, 500);
    });
  };

  const smoothScroll = function () {
    $('a[href^="#"]').click(function () {
      const speed = 500;
      const headerHeight = $(".l-header").height();
      const href = $(this).attr("href");
      const target = $(href == "#" || href == "" ? "html" : href);
      const position = target.offset().top - headerHeight;
      $("html, body").animate({ scrollTop: position }, speed, "swing");
      return false;
    });
  };

  const init = function () {
    scrollTop();
    smoothScroll();
  };

  init();
});
