(function ($, Drupal, once) {
  "use strict";

  Drupal.behaviors.mobileMenu = {
    attach: function (context, settings) {
      once("mobile-menu", ".mobile-menu-button", context).forEach(function (
        button
      ) {
        const $button = $(button);
        const $navigation = $(".site-header__navigation", context);
        const $header = $(".site-header", context);
        const $body = $("body");

        function toggleMenu(show) {
          $navigation.toggleClass("is-active", show);
          $header.toggleClass("menu-is-open", show);
          $button.toggleClass("is-active", show);
          $body.toggleClass("menu-is-open", show);

          $button.attr("aria-expanded", show);
          $navigation.attr("aria-hidden", !show);

          $body.css("overflow", show ? "hidden" : "");
        }

        $button.on("click", function (e) {
          e.preventDefault();
          const isExpanded = $button.attr("aria-expanded") === "true";
          toggleMenu(!isExpanded);
        });

        $navigation.find("a").on("click", function () {
          toggleMenu(false);
        });

        $(document).on("click", function (event) {
          if (
            !$(event.target).closest(".site-header").length &&
            $navigation.hasClass("is-active")
          ) {
            toggleMenu(false);
          }
        });

        $(document).on("keyup", function (event) {
          if (event.key === "Escape" && $navigation.hasClass("is-active")) {
            toggleMenu(false);
          }
        });
      });
    },
  };
})(jQuery, Drupal, once);
