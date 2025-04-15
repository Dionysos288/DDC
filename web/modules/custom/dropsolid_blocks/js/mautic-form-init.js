(function (Drupal) {
  "use strict";

  Drupal.behaviors.mauticFormInit = {
    attach: function (context, settings) {
      if (typeof MauticSDKLoaded === "undefined") {
        var MauticSDKLoaded = true;
        var head = document.getElementsByTagName("head")[0];
        var script = document.createElement("script");
        script.type = "text/javascript";
        script.src =
          settings.mautic.domain + "/media/js/mautic-form.js?va53a13a6";
        script.onload = function () {
          MauticSDK.onLoad();
        };
        head.appendChild(script);
        var MauticDomain = settings.mautic.domain;
        var MauticLang = {
          submittingMessage: "Please wait...",
        };
      } else if (typeof MauticSDK !== "undefined") {
        MauticSDK.onLoad();
      }

      once(
        "newsletter-form",
        "#mauticform_newslettersubscriptionform",
        context
      ).forEach(function (form) {
        const messageSpan = form.querySelector(".newsletter__message");
        const emailInput = form.querySelector(
          "#mauticform_input_newslettersubscriptionform_email"
        );
        const submitButton = form.querySelector(
          "#mauticform_input_newslettersubscriptionform_submit"
        );
        let messageTimeout;
        let isSubmitting = false;
        let hasError = false;

        function showMessage(message, isSuccess = false, isLoading = false) {
          if (messageTimeout) {
            clearTimeout(messageTimeout);
          }

          messageSpan.textContent = message;
          messageSpan.style.color = isLoading
            ? "#000000"
            : isSuccess
            ? "#2ecc71"
            : "#e74c3c";
          messageSpan.style.display = "block";
          hasError = !isSuccess && !isLoading;

          if (isSuccess) {
            messageTimeout = setTimeout(() => {
              messageSpan.style.display = "none";
              messageSpan.textContent = "";
              hasError = false;
            }, 5000);
          }
        }

        function hideMessage() {
          if (!hasError) {
            messageSpan.style.display = "none";
            messageSpan.textContent = "";
          }
        }

        function validateEmail(email) {
          const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
          if (!email) {
            showMessage("Please enter an email address");
            return false;
          }
          if (!emailRegex.test(email)) {
            showMessage("Please enter a valid email address");
            return false;
          }
          return true;
        }

        form.addEventListener("submit", function (event) {
          event.preventDefault();

          if (isSubmitting) return false;

          const email = emailInput.value.trim();

          if (!validateEmail(email)) {
            return false;
          }

          isSubmitting = true;
          submitButton.disabled = true;
          showMessage("Please wait...", false, true);

          const formData = new FormData(event.target);
          const mauticUrl =
            settings.mautic.domain +
            "/form/submit?formId=" +
            settings.mautic.formId;

          fetch(mauticUrl, {
            method: "POST",
            body: formData,
          });

          setTimeout(() => {
            showMessage("Thank you for subscribing!", true);
            emailInput.value = "";
            submitButton.disabled = false;
            isSubmitting = false;
          }, 1000);

          return false;
        });

        emailInput.addEventListener("blur", function () {
          const email = emailInput.value.trim();
          if (email && !validateEmail(email)) {
            showMessage("Please enter a valid email address");
          }
        });

        emailInput.addEventListener("focus", function () {
          if (!isSubmitting && !hasError) {
            hideMessage();
          }
        });

        submitButton.addEventListener("mousedown", function (event) {
          event.preventDefault();
        });
      });
    },
  };
})(Drupal);
