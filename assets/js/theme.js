(function ($) {
  "use strict";

  // ====== EXISTING THEME CODE (UNCHANGED) ======
  // (aapka slider, menu, scroll, form, etc. code same hai)

  if ($("#loan-calculator").length) {
    var monthRange = document.getElementById("range-slider-month");
    var countRange = document.getElementById("range-slider-count");

    if (monthRange && countRange) {
      var limitFieldMinMonth = document.getElementById("min-value-rangeslider-month");
      var limitFieldMaxMonth = document.getElementById("max-value-rangeslider-month");

      var limitFieldMinCount = document.getElementById("min-value-rangeslider-count");
      var limitFieldMaxCount = document.getElementById("max-value-rangeslider-count");

      noUiSlider.create(monthRange, {
        start: 8,
        behaviour: "snap",
        step: 1,
        tooltips: [wNumb({ decimals: 0 })],
        connect: [true, false],
        range: { min: 1, max: 12 }
      });

      noUiSlider.create(countRange, {
        start: 16000,
        step: 1000,
        tooltips: [wNumb({ decimals: 0, prefix: "$" })],
        behaviour: "snap",
        connect: [true, false],
        range: { min: 1000, max: 40000 }
      });

      monthRange.noUiSlider.on("update", function (values, handle) {
        let loanMoney = limitFieldMinCount.value;
        let interestRate = $("#loan-calculator").data("interest-rate");
        let interestRatePercent = parseInt(interestRate, 10) / 100;
        let totalPay = loanMoney * interestRatePercent + parseInt(loanMoney, 10);
        let monthlyPay = totalPay / parseInt(values[handle], 10);

        $("#loan-month").html(parseInt(values[handle], 10));
        $("#loan-monthly-pay").html(parseInt(monthlyPay, 10));
        $("#loan-total").html(parseInt(totalPay, 10));
      });

      countRange.noUiSlider.on("update", function (values, handle) {
        let loanMonth = limitFieldMinMonth.value;
        let interestRate = $("#loan-calculator").data("interest-rate");
        let interestRatePercent = parseInt(interestRate, 10) / 100;
        let totalPay = values[handle] * interestRatePercent + parseInt(values[handle], 10);
        let monthlyPay = totalPay / parseInt(loanMonth, 10);

        $("#loan-month").html(parseInt(loanMonth, 10));
        $("#loan-monthly-pay").html(parseInt(monthlyPay, 10));
        $("#loan-total").html(parseInt(totalPay, 10));
      });
    }
  }

  // scroll to top
  if ($(".scroll-to-target").length) {
    $(".scroll-to-target").on("click", function () {
      var target = $(this).attr("data-target");
      $("html, body").animate({ scrollTop: $(target).offset().top }, 1000);
      return false;
    });
  }

})(jQuery);


// ===== EXIT INTENT POPUP (SAFE VERSION) =====
(function () {
  let outsideClickListener = null;

  function showPopup() {
    const element = document.querySelector("#popup");
    if (!element) return;

    element.style.visibility = "visible";
    element.style.opacity = "1";
    element.style.transform = "scale(1)";
    element.style.transition = "0.4s, opacity 0.4s";

    outsideClickListener = function (clickEvent) {
      let el = clickEvent.target;
      let inPopup = false;

      if (el.id === "popup") inPopup = true;

      while (el && el.parentNode) {
        el = el.parentNode;
        if (el && el.id === "popup") {
          inPopup = true;
          break;
        }
      }

      if (!inPopup) hidePopup();
    };

    document.addEventListener("click", outsideClickListener);
  }

  function hidePopup() {
    const element = document.querySelector("#popup");
    if (!element) return;

    element.style.visibility = "hidden";
    element.style.opacity = "0";
    element.style.transform = "scale(0.5)";
    element.style.transition = "0.2s, opacity 0.2s, visibility 0s 0.2s";

    if (outsideClickListener) {
      document.removeEventListener("click", outsideClickListener);
      outsideClickListener = null;
    }
  }

  document.addEventListener("DOMContentLoaded", function () {
    document.addEventListener("mouseout", function (event) {
      if (!event.toElement && !event.relatedTarget) {
        setTimeout(showPopup, 1000);
      }
    });

    document.addEventListener("keydown", function (event) {
      if (event.key === "Escape" || event.keyCode === 27) {
        hidePopup();
      }
    });
  });

  window.hidePopup = hidePopup;
})();
