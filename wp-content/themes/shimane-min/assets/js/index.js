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
      $("body, html").animate({ scrollTop: 0 }, 1000);
    });
  };

  const smoothScroll = function () {
    $('a[href*="#"]:not([href="#"]').on("click", function () {
      const headerHeight = $(".l-header").height();

      if (
        location.pathname.replace(/^\//, "") ==
          this.pathname.replace(/^\//, "") &&
        location.hostname == this.hostname
      ) {
        let target = $(this.hash);
        target = target.length
          ? target
          : $("[name=" + this.hash.slice(1) + "]");
        if (target.length) {
          $("html,body").animate(
            { scrollTop: target.offset().top - headerHeight },
            1000,
            "swing"
          );
          return false;
        }
      }
    });
  };

  const init = function () {
    scrollTop();
    smoothScroll();
  };

  init();
});
