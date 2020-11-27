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

  const init = function () {
    scrollTop();
  };

  init();
});
