//var $ = jQuery;
$(document).ready(function() {
    const typer = (el) => {
        const texts = JSON.parse(el.attr("data-rotate"));
        const period = +el.attr("data-period") || 3000;
        const writeSpeed = +el.attr("data-write-speed") || 200;
        const eraseSpeed = +el.attr("data-erase-speed") || 50;

        let ch = 0;
        let chTot = 0;
        let text = "";
        let tx = 0;

        const typeIt = () => {
            if (ch > chTot) return setTimeout(eraseText, period / 2);
            el.text(text.substring(0, ch++));
            setTimeout(typeIt, writeSpeed);
        };

        const eraseText = () => {
            if (ch === 0) {
                tx = (tx + 1) % texts.length;
                typeText();
                return;
            }
            el.text(text.substring(0, ch--));
            setTimeout(eraseText, eraseSpeed);
        };

        const typeText = () => {
            ch = 0;
            text = texts[tx];
            chTot = text.length;

            typeIt();
        };

        typeText();
    };

    $("[data-rotate]").each(function() {
        typer($(this));
    });
});

$(document).ready(function() {
    $("body").on("click", ".send-form", function() {
        console.log("submit hb");

        if ($('#hsForm_ce2a6410-bf3b-49bd-b4cf-7efd47ecb92b').length > 0) {
            triggerClick('#hsForm_ce2a6410-bf3b-49bd-b4cf-7efd47ecb92b');
        } else {
            var formIds = [
                'c8eeb14e-1697-4d6a-b0c3-dcd2fc0a353b',
                '6ffe3906-8d04-484b-a0fe-a1bad6225621',
                '3dec54e3-d457-43ba-a3d6-241a51d61821',
                'e1e67ef3-28f4-4eb5-9df6-61b74715d9c3',
                'f051da64-280e-45b2-b9fb-13639a30bee0',
            ];
			
            formIds.forEach(function(formId) {
                var formSelector = '#hsForm_' + formId;
                if ($(formSelector).length > 0) {
                    triggerClick(formSelector);
                }
            });
        }
    });

    function triggerClick(selector) {
        $(selector).find('.hs_submit .hs-button').click();
    }
});


$(document).ready(function () {
  // Tab JS
  jQuery(".tabs .tab-nav li a").on("click", function (e) {
    e.preventDefault();
    jQuery(".tabs .tab-nav li, .tabs .tab-content").removeClass("active");
    jQuery(this).closest("li").addClass("active");

    var targetDIV = jQuery(this).attr("href");
    jQuery('a[href="' + targetDIV + '"]')
      .closest("li")
      .addClass("active");

    console.log(targetDIV);
    jQuery(targetDIV).addClass("active");
    return 0;
  });

  // Get Details Popup
  jQuery(".has-get-view-details a").on("click", function (e) {
    e.preventDefault();
    var targetDIV = jQuery(this).attr("href");
    console.log(targetDIV);

    jQuery(targetDIV).addClass("active");
  });

  // getInTouchMethod START  24-02-2025

  	// Carry forward param
   /* let params = window.location.search;

    if (params) {
        jQuery('a[href]').each(function () {
            let href = jQuery(this).attr('href');

            if (
                href && 
                href.indexOf('#') !== 0 && 
                href.indexOf('mailto:') !== 0 && 
                href.indexOf('javascript:') !== 0 && 
                !href.startsWith('#') && 
                !href.startsWith('mailto:') &&
                href.trim() !== ''
            ) {
                if (href.indexOf('?') !== -1) {
                    jQuery(this).attr('href', href + '&' + params.substring(1));
                } else {
                    jQuery(this).attr('href', href + params);
                }
            }
        });
    }*/
 	
	// V2 SEO friendly
  let params = window.location.search;

  if (params) {
      jQuery('a[href]').on('click', function (e) {
          let href = jQuery(this).attr('href');
          let targetBlank = jQuery(this).attr('target') === '_blank';

          if (
              href && 
              href.indexOf('#') !== 0 && 
              href.indexOf('mailto:') !== 0 && 
              href.indexOf('javascript:') !== 0 &&
              href.trim() !== '' &&
              !targetBlank // Exclude links with target="_blank"
          ) {
              e.preventDefault();
              window.location.href = href.includes('?') ? href + '&' + params.substring(1) : href + params;
          }
      });
  }

  var getInTouchMethod = "BookCall"
  jQuery('.get-in-touch-method a').on('click', function(e){
      if(jQuery(this).closest('.get-in-touch-method').hasClass("book-call")){
          getInTouchMethod = "BookCall"
      }else{
          getInTouchMethod = "WhatsApp"
      }
      jQuery('#schedule-call.form-popup').removeClass('active');
      console.log(getInTouchMethod);
  });
  /*
  jQuery('.talk-to-exper-form form').on('submit', function(e){
      e.preventDefault();
      // Send Data to make
      
      var name = jQuery('[name="firstName"]').val() + "%20"+   jQuery('[name="lastName"]').val(); 
      var numRooms = jQuery('[name="numRooms"]').val();
      var country = jQuery('[name="country"]').val();
      var amenitiz = jQuery('[name="amenitiz"]').val();

      var formData = $('.talk-to-exper-form form').serialize(); // Serialize form data

      $.ajax({
          type: 'POST',
          url: ajax_object.ajax_url, // The AJAX URL from wp_localize_script
          data: {
              action: 'get_in_tooch_method', // The action to hook into
              security: ajax_object.nonce, // Nonce for security
              formData: formData
          },
          beforeSend: function() {
              //$('.submit-button').text('Submitting...');
              jQuery('.talk-to-exper-form form [type="submit"]').addClass('loading');
          },
          success: function(response) {
              console.log(response); // Show response from server
              //$('.submit-button').text('Submit');

              //then
              if(getInTouchMethod == "BookCall"){
                  // Book time
                 // window.open("https://calendly.com/d/cpmm-ct4-hxk?a1="+name+"&a2="+numRooms+"&a3="+country+"&a4="+amenitiz);
                 window.open(window.location.origin+"/sales-call-for-hotel/?a1="+name+"&a2="+numRooms+"&a3="+country+"&a4="+amenitiz)
              }else{
                  // Open WhatsApp
                  window.open('https://wa.me/34919896150')
              }
              jQuery('#schedule-call-2.form-popup').removeClass('active');
              jQuery('.talk-to-exper-form form [type="submit"]').removeClass('loading');
              jQuery('.talk-to-exper-form form')[0].reset();

          },
          error: function(xhr, status, error) {
              console.error(error);
              //$('.submit-button').text('Submit');
              jQuery('.talk-to-exper-form form [type="submit"]').removeClass('loading');
          }
      });
  })
  */
  //getInTouchMethod END 24-02-2025


  // products
  jQuery('[name="your-property-type"]').on("change", function () {
    jQuery(".sec-products .products .wp-block-column ul li.active").each(
      function () {
        jQuery(this).click();
      }
    );
  });
  jQuery(".sec-products .products .wp-block-column ul li").on(
    "click",
    function (e) {
      var $thiIndex = jQuery(this).index();

      var propertyType = jQuery('[name="your-property-type"]').val();
      //console.log($thiIndex);

      jQuery(this)
        .closest(".wp-block-column")
        .find("ul li")
        .removeClass("active");
      jQuery(this).addClass("active");

      /* var HOUrecurring = 'per proprietà';
		 var HOTrecurring = 'per camere'; */ // These are in wp-editor

      if (propertyType == "HOU") {
        if ($thiIndex == 0) {
          jQuery(this)
            .closest(".wp-block-column")
            .find(".discounted-price strong")
            .html("10");
          jQuery(this)
            .closest(".wp-block-column")
            .find(" .selling-price strong")
            .html("7,95");
        } else if ($thiIndex == 1) {
          jQuery(this)
            .closest(".wp-block-column")
            .find(".discounted-price strong")
            .html("15");
          jQuery(this)
            .closest(".wp-block-column")
            .find(".selling-price strong")
            .html("9,95");
        }
        jQuery(this)
          .closest(".wp-block-column")
          .find(".recurring")
          .eq(1)
          .html(HOUrecurring);
      } else {
        // HOT -> Vacation Rental
        if ($thiIndex == 0) {
          jQuery(this)
            .closest(".wp-block-column")
            .find(".discounted-price strong")
            .html("4");
          jQuery(this)
            .closest(".wp-block-column")
            .find(" .selling-price strong")
            .html("3,20");
        } else if ($thiIndex == 1) {
          jQuery(this)
            .closest(".wp-block-column")
            .find(".discounted-price strong")
            .html("6,50");
          jQuery(this)
            .closest(".wp-block-column")
            .find(".selling-price strong")
            .html("4,30");
        }
        jQuery(this)
          .closest(".wp-block-column")
          .find(".recurring")
          .eq(1)
          .html(HOTrecurring);
      }
    }
  );

  // Get form-popup-selfchekin
  jQuery(".sec-products .products .wp-block-button__link").on(
    "click",
    function (e) {
      e.preventDefault();
      jQuery(".form-popup-selfchekin").addClass("active");
    }
  );

  if( jQuery(".rotate-words").length){
    jQuery(".rotate-words").slick({
      dots: false,
      prevArrow: false,
      nextArrow: false,
      infinite: true,
      speed: 1000,
      autoplay: true,
      autoplaySpeed: 3000,
      slidesToShow: 1,
      fade: true,
      variableWidth: false,
      cssEase: "cubic-bezier(0.7, 0, 0.3, 1)",
      touchThreshold: 100,
    });
  }
  $(".download-btn a").each(function () {
    $(this).attr("download", $(this).attr("href").split("/").pop());
  });

  $(".upselling-banner-close").on("click", function () {
    $(".upselling-banner-right").hide();
  });

  // if( $('.lang-redirect-url').text() )

  // var redirectLink = $('.lang-redirect').text()
  //    if( redirectLink ) { window.location.replace( redirectLink ) }

  $(".menu-trigger").on("click", function () {
    $(".nav-menu").toggleClass("open-menu");
  });

  $(".nav-menu ul li.menu-item-has-children > a").on("click", function (e) {
    e.preventDefault();
    $(this).parent().toggleClass("open");
  });

  $(".nav-menu .hs-cta-wrapper").hover(
    function () {
      $(".menu-main-menu-container > ul > li:last-child").addClass("active");
    },
    function () {
      $(".menu-main-menu-container > ul > li:last-child").removeClass("active");
    }
  );

  // Language Toggle
  $(".lang-login.v2 .parent-item")
    .mouseenter(function () {
      $(this)
        .find(".sub-menu")
        .stop()
        .css({
          visibility: "visible",
          opacity: 0,
        })
        .animate({ opacity: 1 }, 50);
    })
    .mouseleave(function (e) {
      var subMenu = $(this).find(".sub-menu");
      if (
        !subMenu.is(e.relatedTarget) &&
        !$(e.relatedTarget).closest(".sub-menu").length
      ) {
        subMenu.stop().animate({ opacity: 0 }, 50, function () {
          $(this).css("visibility", "hidden");
        });
      }
    });

  $(".lang-login.v2 .sub-menu")
    .mouseenter(function () {
      $(this)
        .stop()
        .css({
          visibility: "visible",
          opacity: 0,
        })
        .animate({ opacity: 1 }, 50);
    })
    .mouseleave(function (e) {
      var parentItem = $(this).closest(".parent-item");
      if (
        !parentItem.is(e.relatedTarget) &&
        !$(e.relatedTarget).closest(".parent-item").length
      ) {
        $(this)
          .stop()
          .animate({ opacity: 0 }, 50, function () {
            $(this).css("visibility", "hidden");
          });
      }
    });

  $(".lang-login.v2 > .parent-item > a.desktop").on("click", function (e) {
    e.preventDefault();
  });

  // Header Scroll Animation

  // var headerFixedPosition = 100

  // $(window).on('load scroll', function(){
  //     if( $(window).scrollTop() > headerFixedPosition ) {
  //         $('.header-wrapper').addClass('fixed')
  //     }else{
  //         $('.header-wrapper').removeClass('fixed')
  //     }
  // })

  // Review Carousel

  var reviewCarousel = $("#review_carousel");

  if (reviewCarousel.length) {
    reviewCarousel.owlCarousel({
      loop: true,
      rewind: false,
      items: 3,
      nav: true,
      navText: [
        "<img src='https://chekin.com/wp-content/themes/chekin2020/assets/images/prev-icon.svg'>",
        "<img src='https://chekin.com/wp-content/themes/chekin2020/assets/images/next-icon.svg'>",
      ],
      responsive: {
        0: {
          items: 1,
        },
        768: {
          items: 3,
        },
      },
    });
  }

  function setCarouselClass() {
    $("#review_carousel.owl-drag .owl-item").removeClass(
      "middle side left right"
    );
    $("#review_carousel.owl-drag .owl-item.active").eq(1).addClass("middle");
    $("#review_carousel.owl-drag .owl-item.active").eq(0).addClass("side left");
    $("#review_carousel.owl-drag .owl-item.active")
      .eq(2)
      .addClass("side right");
  }

  setCarouselClass();
  reviewCarousel.on("changed.owl.carousel", function (event) {
    setTimeout(setCarouselClass, 5);
  });

  $("body").on("click", ".left", function () {
    reviewCarousel.trigger("prev.owl.carousel");
  });

  $("body").on("click", ".right", function () {
    owl.trigger("next.owl.carousel");
  });

  // Brand Carousel

  var brandCarousel = $("#brand_carousel");
  if (brandCarousel.length) {
    brandCarousel.owlCarousel({
      rewind: true,
      nav: true,
      dots: false,
      navText: [
        "<img src='https://chekin.com/wp-content/themes/chekin2020/assets/images/prev-icon.svg'>",
        "<img src='https://chekin.com/wp-content/themes/chekin2020/assets/images/next-icon.svg'>",
      ],
      responsive: {
        0: {
          items: 1,
        },
        400: {
          items: 2,
        },
        520: {
          items: 3,
        },
        600: {
          items: 4,
        },
        768: {
          items: 5,
        },
      },
    });
  }
  // Count Down Effect

  function numberWithCommas(x) {
    var numwithComma = x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    if (numwithComma.length == 8) {
      numwithComma = numwithComma[0] + "." + numwithComma.substring(1);
    }
    return numwithComma;
  }

  function prefill(s, width, char) {
    return s.length >= width
      ? s
      : (new Array(width).join(char) + s).slice(-width);
  }

  var scrollLock = false,
    numbers = [];

  $(".counter-animation").each(function () {
    var $this = $(this),
      numberText = $this.text(),
      number = parseFloat(numberText.replaceAll(".", "").replace("+", "")),
      len = number.toString().length,
      width = $this.width(),
      hasInglesClass = $this.hasClass("ingles");

    numbers.push({
      number: number,
      hasInglesClass: hasInglesClass,
      numberText: numberText,
    });

    $this.css("width", width);
    $this.text(
      numberWithCommas(prefill("0", len, "0"), hasInglesClass) +
        (hasInglesClass && number >= 0 ? "+" : "")
    );
  });

  $(window).on("load scroll", function () {
    if (!$(".status-section").length) return;

    var counterStartPosition = $(".status-section").offset().top;

    if (
      $(window).scrollTop() > counterStartPosition - $(window).height() / 2 &&
      !scrollLock
    ) {
      $(".counter-animation").each(function (index) {
        var $this = $(this),
          data = numbers[index],
          number = data.number,
          hasInglesClass = data.hasInglesClass,
          interval,
          len = number.toString().length,
          currentDuration = 0,
          duration = 1000,
          frequency = 20;

        interval = setInterval(function () {
          if (currentDuration > duration) {
            clearInterval(interval);
          } else {
            $this.text(
              numberWithCommas(
                prefill(
                  Math.round((number * currentDuration) / duration),
                  len,
                  "0"
                ),
                hasInglesClass
              ) + (hasInglesClass && number >= 0 ? "+" : "")
            );
          }
          currentDuration += frequency;
        }, frequency);
      });
      scrollLock = true;
    }
  });

  function numberWithCommas(x, hasInglesClass) {
    if (hasInglesClass) {
      return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    } else {
      return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }
  }

  // Home Video Popup

  var video = document.querySelector(".video-content"),
    ytVideo = $(".yt-video"),
    info;

  if (ytVideo.length) {
    info = $(".yt-video").attr("data-id");

    if ($(".yt-video").attr("data-time")) {
      info += "?start=" + $(".yt-video").attr("data-time") + "&";
    } else {
      info += "?";
    }

    ytPlayer =
      '<iframe id="player" width="640" height="360" src="https://www.youtube.com/embed/' +
      info +
      'autoplay=1&enablejsapi=1"></iframe>';
  }

  $("body").on("click", function () {
    if ($(this).hasClass("paused")) {
      // $(this).removeClass('paused');
      // $(this).text('PAUSE');
      //playVideo();
    } else {
      // $(this).addClass('paused');
      // $(this).text('PLAY');
      // pauseVideo();
    }
  });

  $(".watch-video-button").on("click", function (e) {
    e.preventDefault();
    if (video) {
      video.play();
    }
    if (ytVideo.length) {
      ytVideo.html(ytPlayer);
    }
    $(".video-popup").fadeIn();
  });

  $(".video-popup-content").on("click", function (e) {
    if (!$(e.target).hasClass("video-content")) {
      if (video) {
        video.pause();
        video.currentTime = 0;
      }
      if (ytVideo.length) {
        ytVideo.html("");
      }
      $(".video-popup").fadeOut();
    }
  });

  $(".video-popup-content noscript").remove();

  $(".get-form > a, .form-btn .wp-block-button__link, a.form-btn").on(
    "click",
    function (e) {
      e.preventDefault();
      $(".form-popup-1").addClass("active");
    }
  );

  $(".form-btn-2 .wp-block-button__link").on("click", function (e) {
    e.preventDefault();
    $(".form-popup-2").addClass("active");
  });

  $(".form-popup").on("click", function (e) {
    if ($(e.target).hasClass("form-popup"))
      $(".form-popup").removeClass("active");
  });

  $(".form-popup .close").on("click", function () {
    $(".form-popup").removeClass("active");
  });

  $(".service-area-image img")
    .eq(0)
    .one("load", function () {
      $(".home-service-intro img").addClass("show");
    })
    .each(function () {
      // if(this.complete) {
      //  console.log('2')
      //            $('.home-service-intro img').addClass('show')
      // }
    });

  function searchFilter(input, match) {
    var match = match.toLowerCase(),
      input = input.toLowerCase();

    console.log(input);
    console.log(match);

    if (match.includes(input)) {
      return true;
    }
    if (match.includes(input.replace(/\s/g, ""))) {
      return true;
    }
    if (match.replace(/\s/g, "").includes(input)) {
      return true;
    }
    return false;
  }

  $('.integraciones-form input[type="text"]').on("keyup", function (e) {
    var found = false,
      logoName = $(".integraciones-block img").attr("title"),
      input = $(this).val();

    $(".integraciones-block img").each(function () {
      var match = $(this).attr("title");

      if (searchFilter(input, match)) {
        $(this).closest(".integraciones-block").removeClass("hide");
        found = true;
      } else {
        $(this).closest(".integraciones-block").addClass("hide");
      }
    });

    $(".integraciones-blocks").each(function () {
      if (!$(this).find(".integraciones-block:not(.hide)").length) {
        $(this).addClass("hide");
      } else {
        $(this).removeClass("hide");
      }
    });

    if (!found) {
      $(".integraciones-message").removeClass("hide");
    } else {
      $(".integraciones-message").addClass("hide");
    }
  });

  $(".integraciones-form").on("submit", function (e) {
    e.preventDefault();

    $("html, body").animate(
      {
        scrollTop: $(".integraciones-area").offset().top + $("header").height(),
      },
      1000
    );
  });

  // Legalidad

  function scrollToContratos() {
    console.log("sadssd");
    var hashValue = window.location.hash.substr(1);

    if (hashValue) {
      $("html, body").animate(
        {
          scrollTop:
            $("#" + hashValue).offset().top + $("header").height() - 150,
        },
        1000
      );
    }
  }
  //  scrollToContratos()

  $(window).on("load", function () {
    scrollToContratos();
    //      setTimeout(scrollToContratos, 1000)
    //      setTimeout(scrollToContratos, 2000)
    //      setTimeout(scrollToContratos, 3000)
    //      setTimeout(scrollToContratos, 4000)
    //      setTimeout(scrollToContratos, 5000)
    //      setTimeout(scrollToContratos, 6000)
    //      setTimeout(scrollToContratos, 7000)
    //      setTimeout(scrollToContratos, 8000)
    //      setTimeout(scrollToContratos, 9000)
    //      setTimeout(scrollToContratos, 10000)
  });

  $(window).on("load", function () {
    $("#hsForm_ad0f2c0b-a298-4897-abce-3268831e2893").trigger("reset");
  });

  function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + exdays * 24 * 60 * 60 * 1000);
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }

  function getCookie(cname) {
    var dc = document.cookie;
    var prefix = cname + "=";
    var begin = dc.indexOf("; " + prefix);
    if (begin == -1) {
      begin = dc.indexOf(prefix);
      if (begin != 0) return null;
    } else {
      begin += 2;
      var end = document.cookie.indexOf(";", begin);
      if (end == -1) {
        end = dc.length;
      }
    }
    return decodeURI(dc.substring(begin + prefix.length, end));
  }

  function langRedirect(lang) {
    var redirectUrl = $(".lang-" + lang).text();
    window.location.replace(redirectUrl);
  }

  // Seguros Popup

  var pageID = $(".seguros-page-id").text();

  if (
    getCookie("country") &&
    (pageID == "24774xxx" || pageID == "24775xxx" || pageID == "24775xxx")
  ) {
    if (!sessionStorage.getItem("seguros-popup")) {
      sessionStorage.setItem("seguros-popup", "open");
    } else {
      sessionStorage.setItem("seguros-popup", "close");
    }
  }

  if (sessionStorage.getItem("seguros-popup") == "open") {
    $(".popup-image img").attr("src", $(".popup-image img").attr("data-src"));

    setTimeout(function () {
      $(".seguros-popup").addClass("active");
    }, 3000);
  }

  $(".s-popup-close").on("click", function () {
    $(this).closest(".seguros-popup").removeClass("active");
  });

  $(".seguros-popup").on("click", function (e) {
    if (!$(e.target).closest(".wp-block-group__inner-container").length) {
      $(this).removeClass("active");
    }
  });

  var integrations = {
    // 'default' : 'Chekin',
    "365 villas": "365Villas",
    apaleo: "Apaleo",
    "beds 24": "Beds24",
    "booking.com": "Booking",
    "booking automation": "Booking Automation",
    "booking sync": "BookingSync",
    // 'sss' : 'Channex',
    cloudbeds: "Cloudbeds",
    "dataHotel Software": "dataHotel",
    eviivo: "Eviivo",
    eZee: "Ezee",
    // 'sss' : 'Fantasticstay',
    Guesty: "Guesty",
    "Host away": "Hostaway",
    Hostify: "Hostify",
    // 'sss' : 'Hoteliga',
    lodgify: "Lodgify",
    mews: "Mews",
    "my vr": "Myvr",
    octorate: "Octorate",
    OwnerRez: "Ownerrez",
    planyo: "Planyo",
    "rental united": "Rentals United",
    rentlic: "Rentlio",
    "res harmonics": "Resharmonics",
    Smoobu: "Smoobu",
    // 'other' : 'Others PMS'
  };

  sessionStorage.setItem("integration", "");

  $(".integraciones-block .wp-block-button__link").on("click", function (e) {
    e.preventDefault();

    var title = $(this)
        .closest(".integraciones-block")
        .find("img")
        .attr("title"),
      link = $(this).attr("href");

    sessionStorage.setItem(
      "integration",
      integrations[title] ? integrations[title] : ""
    );
    window.location.replace(link);
  });

  // Language Derirect

  // var defaultLang = 'en'

  // if ( ! getCookie( 'first_visit' ) ) {

  // setCookie( 'first_visit', 'yes', 1 )

  // esCountry = [
  //   'ES', // Spain
  //   'BR', // Brazil
  //   'MX', // Mexico
  //   'CO', // Colombia
  //   'AR', // Argentina
  //   'PE', // Peru
  //   'VE', // Venezuela
  //   'CL', // Chile
  //   'GT', // Guatemala
  //   'EC', // Ecuador
  //   'BO', // Bolivia
  //   'HT', // Haiti
  //   'CU', // Cuba
  //   'DO', // Dominican Republic
  //   'HN', // Honduras
  //   'PY', // Paraguay
  //   'NI', // Nicaragua
  //   'SV', // El Salvador
  //   'CR', // Costa Rica
  //   'PA', // Panama
  //   'UY', // Uruguay
  //   'JM', // Jamaica
  //   'TT', // Trinidad and Tobago
  //   'GY', // Guyana
  //   'SR', // Suriname
  //   'BZ', // Belize
  //   'BS', // Bahamas
  //   'BB', // Barbados
  //   'LC', // Saint Lucia
  //   'GD', // Grenada
  //   'VC', // St. Vincent & Grenadines
  //   'AG', // Antigua and Barbuda
  //   'DO', // Dominica
  //   'KN' // Saint Kitts & Nevis
  // ];

  // $.ajax({
  //   // url: 'https://api.db-ip.com/v2/free/self/countryCode',
  //   url: 'https://ipinfo.io',
  //   type: 'GET',
  //   dataType : 'jsonp',
  //   success: function(response){

  //     console.log(response)

  //     var country = response.country

  //     if( country ){
  //       if( esCountry.includes(country) ){
  //         defaultLang = 'es'
  //       }else{
  //         defaultLang = 'en'
  //       }
  //     }else{
  //       defaultLang = 'en'
  //     }

  //     langRedirect(defaultLang)
  //   },
  //   error: function(error) {

  //     console.log(error)

  //     langRedirect('en')

  //   }
  // })
  // }

  if ($("#livestorm").length) {
    var langSelected = $("#livestorm").attr("lang");
    jQuery.get(
      window.location.origin + "/wp-admin/admin-ajax.php",
      { action: "liveStormEvents" },
      function (result) {
        //console.log(data);
        var obj = $.parseJSON(result);
        console.log(obj);
        console.log(obj["data"].length);
        var dataHTML = "";
        for (var i = 0; i < obj["data"].length; i++) {
          var status = obj["data"][i]["attributes"]["status"];
          var title = obj["data"][i]["attributes"]["title"];
          var description = obj["data"][i]["attributes"]["description"];
          var estimated_duration =
            obj["data"][i]["attributes"]["estimated_duration"]; //30

          var scheduling_status =
            obj["data"][i]["attributes"]["scheduling_status"]; //"upcoming"
          var published_at = obj["data"][i]["attributes"]["published_at"]; //  1644858216
          var dateTime = new Date(published_at).toUTCString();

          var language = obj["data"][i]["attributes"]["language"]; //"es"
          var registration_link =
            obj["data"][i]["attributes"]["registration_link"]; //https://

          var type = "";
          if (scheduling_status == "upcoming") {
            type = "Live now";
          } else if (scheduling_status == "on_demand") {
            type = "On demand";
          }

          if (status == "published" && language == langSelected) {
            if (scheduling_status == "upcoming") {
              dataHTML +=
                '<div class="wp-block-group event-item text-center live-now"><div class="wp-block-group__inner-container">';
            } else if (scheduling_status == "on_demand") {
              dataHTML +=
                '<div class="wp-block-group event-item text-center on-demand"><div class="wp-block-group__inner-container">';
            } else {
              //dataHTML += '<div class="wp-block-group event-item text-center">';
            }

            if (description != null) {
              //dataHTML += '<p>'+description+'</p>';
            }

            if (scheduling_status == "upcoming") {
              dataHTML += '<div class="event-body">';
              dataHTML += "<h3>" + title + "</h3>";
              dataHTML += '<p class="has-text-align-center date"></p>';
              dataHTML +=
                '<p class="has-text-align-center type"><strong>' +
                type +
                "</strong></p>";
              dataHTML += "</div>";
              dataHTML +=
                '<div class="wp-block-buttons"><div class="wp-block-button aligncenter"><a class="wp-block-button__link" href="' +
                registration_link +
                '" target="_blank" rel="noreferrer noopener">Register</a></div> </div>';
            } else if (scheduling_status == "on_demand") {
              dataHTML += '<div class="event-body">';
              dataHTML += "<h3>" + title + "</h3>";
              dataHTML += '<p class="has-text-align-center date"></p>';
              dataHTML +=
                '<p class="has-text-align-center type"><strong>' +
                type +
                " (" +
                estimated_duration +
                " mins) </strong></p>";
              dataHTML += "</div>";
              dataHTML +=
                '<div class="wp-block-buttons"> <div class="wp-block-button aligncenter"><a class="wp-block-button__link has-background-color has-secondary-background-color has-text-color has-background" href="' +
                registration_link +
                '" target="_blank" rel="noreferrer noopener">View</a></div> </div>';
            } else {
            }
            if (
              scheduling_status == "upcoming" ||
              scheduling_status == "on_demand"
            ) {
              dataHTML += "</div></div>";
            }
          }
        }
        //console.log(dataHTML);

        $("#livestorm").html(
          '<div class=" wp-block-group events"><div class="wp-block-group__inner-container">' +
            dataHTML +
            "</div></div>"
        );
      }
    );
  }

  jQuery(".sec-events .events-nav li a").on("click", function (e) {
    e.preventDefault();
    var targetItem = jQuery(this).attr("href");
    targetItem = targetItem.replace("#", "");
    //console.log(targetItem);

    jQuery(".sec-events .events-nav li").removeClass("active");
    jQuery(this).closest("li").addClass("active");
    if (targetItem == "live-demo") {
      jQuery(".sec-events .event-item").hide();
      jQuery(".sec-events .event-item.live-now").show();
    } else if (targetItem == "on-demand") {
      jQuery(".sec-events .event-item").hide();
      jQuery(".sec-events .event-item.on-demand").show();
    } else {
      jQuery(".sec-events .event-item").show();
    }
  });

  // PMS
  jQuery(".nav-pms li a").on("click", function (e) {
    e.preventDefault();
    var targetItem = jQuery(this).attr("href");
    //targetItem = targetItem.replace('#', '')
    //console.log(targetItem);
    var tabURL =
      window.location.origin +
      window.location.pathname +
      jQuery(this).attr("href");

    jQuery(".nav-pms li").removeClass("active");
    jQuery(this).closest("li").addClass("active");

    if (targetItem == "#all") {
      jQuery(".integraciones-blocks").show();
    } else {
      jQuery(".integraciones-blocks").hide();
      jQuery(targetItem + ".integraciones-blocks").show();
    }
    /*
	  if(targetItem == 'pms'){
			 jQuery('#remote-access, #others').hide();
			jQuery('#pms').show();
			
		}else if(targetItem == 'remote-access'){
			 jQuery('#pms, #others').hide();
			jQuery('#remote-access').show();
		}else if(targetItem == 'others'){
			 jQuery('#pms, #remote-access').hide();
			jQuery('#others').show();
		}else{
		   jQuery('#pms, #remote-access, #others').show();
		}
		
		*/
    history.pushState({}, null, tabURL);
    tabURL = "";
  });
});


// Filter TAB
jQuery('.webinar-area .nav li a').on('click', function(e){
   e.preventDefault();
	var targetItem = jQuery(this).attr('href');
    console.log(targetItem);
	
	let modifiedString = targetItem.replace(/#/g, '.');
	
	console.log(modifiedString);
	 jQuery('.webinar-area .nav li').removeClass('active');
	 jQuery(this).closest('li').addClass('active');
	
	if(targetItem == '#all'){
		jQuery('.integraciones-block').show();
	}else{
		jQuery('.integraciones-block').hide();
		jQuery('.integraciones-block'+modifiedString).show();
		console.log('.integraciones-block'+modifiedString);
	}
});

// sidebar

$(function () {
  if ($("#sidebar").length) {
    var top =
      $("#sidebar").offset().top -
      parseFloat($("#sidebar").css("marginTop").replace(/auto/, 0));
    var footTop =
      $(".footer").offset().top -
      parseFloat($(".footer").css("marginTop").replace(/auto/, 0));

    var maxY = footTop - $("#sidebar").outerHeight();

    $(window).scroll(function (evt) {
      var y = $(this).scrollTop();
      if (y > top) {
        //Quand scroll, ajoute une classe ".fixed" et supprime le Css existant
        if (y < maxY) {
          $("#sidebar").addClass("fixed").removeAttr("style");
        } else {
          //Quand la sidebar arrive au footer, supprime la classe "fixed" précèdement ajouté
          $("#sidebar")
            .removeClass("fixed")
            .css({
              position: "absolute",
              top: maxY - top + "px",
            });
        }
      } else {
        $("#sidebar").removeClass("fixed");
      }
    });
  }
});

//Carousel
function modernCarousel() {
  $("#review_carousel").on("changed.owl.carousel", function (event) {
    var centerElementIndex = event.item.index + 2;

    $("#review_carousel .sa_hover_container").css({
      opacity: "0.3",
    });

    $("#review_carousel .owl-item")
      .eq(centerElementIndex)
      .find(".sa_hover_container")
      .css({
        opacity: "1",
      });

    var leftIndex = centerElementIndex - 1;
    $("#review_carousel .owl-item")
      .eq(leftIndex)
      .find(".sa_hover_container")
      .css({
        opacity: "1",
      });

    var rightIndex = centerElementIndex + 1;
    $("#review_carousel .owl-item")
      .eq(rightIndex)
      .find(".sa_hover_container")
      .css({
        opacity: "1",
      });
  });

  $("#review_carousel").trigger("next.owl.carousel");
}

jQuery(document).ready(function ($) {
  modernCarousel();
});

var reviewCarousel = $("#review_carousel");

jQuery(document).ready(function () {
  $("#showcase_23324 .owl-prev").on("click", function () {
    reviewCarousel.trigger("stop.owl.autoplay");
    reviewCarousel.trigger("play.owl.autoplay", [10000]);
  });

  $("#showcase_23324 .owl-next").on("click", function () {
    reviewCarousel.trigger("stop.owl.autoplay");
    reviewCarousel.trigger("play.owl.autoplay", [10000]);
  });
});


function handleIntersection(entries, observer) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('active');
            if (entry.target.classList.contains('phone-right')) {
                entry.target.classList.add('from-right');
            } else if (entry.target.classList.contains('website-back')) {
                entry.target.classList.add('from-top');
            } else if (entry.target.classList.contains('code-left')) {
                entry.target.classList.add('from-left');
            } else if (entry.target.classList.contains('phone-bottom')) {
                entry.target.classList.add('from-bottom');
            } else if (entry.target.classList.contains('phone-middle')) {
                entry.target.classList.add('from-bottom');
            } else if (entry.target.classList.contains('phone-top')) {
                entry.target.classList.add('from-bottom');
            }
            observer.unobserve(entry.target);
        }
    });
}

const observer = new IntersectionObserver(handleIntersection, {
    root: null,
    rootMargin: '0px',
    threshold: 0.25
});

const elementsToAnimate = document.querySelectorAll('.animate-on-scroll');

elementsToAnimate.forEach(element => {
    observer.observe(element);
});

$(document).ready(function() {
  var modals = [
    { linkId: 'openModalSpain', modalId: '#myModalSpain' },
    { linkId: 'openModalItaly', modalId: '#myModalItaly' },
    { linkId: 'openModalPortugal', modalId: '#myModalPortugal' },
    { linkId: 'openModalNetherlands', modalId: '#myModalNetherlands' },
    { linkId: 'openModalUAE', modalId: '#myModalUAE' },
    { linkId: 'openModalAustria', modalId: '#myModalAustria' },
    { linkId: 'openModalCzech', modalId: '#myModalCzech' },
    { linkId: 'openModalColombia', modalId: '#myModalColombia' },
    { linkId: 'openModalThailand', modalId: '#myModalThailand' },
    { linkId: 'openModalSwitzerland', modalId: '#myModalSwitzerland' },
    { linkId: 'openModalGermany', modalId: '#myModalGermany' },
    { linkId: 'openModalCroatia', modalId: '#myModalCroatia' },
	{ linkId: 'openModalUK', modalId: '#myModalUK' },
	{ linkId: 'openModalGreece', modalId: '#myModalGreece' },
	{ linkId: 'openModalRomania', modalId: '#myModalRomania' },
	{ linkId: 'openModalFrance', modalId: '#myModalFrance' },
	{ linkId: 'openModalBelgium', modalId: '#myModalBelgium' }
  ];

  modals.forEach(function(modal) {
    $('#' + modal.linkId).click(function(event) {
      event.preventDefault();
      $(modal.modalId).fadeIn();
      $('body').addClass('modal-open');
    });

    $(modal.modalId).click(function(event) {
      if ($(event.target).hasClass('modal')) {
        $(modal.modalId).fadeOut();
        $('body').removeClass('modal-open');
      }
    });

    $(modal.modalId + ' .close-icon').click(function() {
      $(modal.modalId).fadeOut();
      $('body').removeClass('modal-open');
    });

    $(modal.modalId + ' .modal-content').click(function(event) {
      event.stopPropagation();
    });
  });
});


$(document).ready(function() {
	var lang = $('html').attr('lang').substring(0, 2);
	
    var texts = {
        en: {
            gdpName: "GDP per capita",
            gdpFormat: "{0} USD",
            changeName: "Change to year before",
            countryInfo: {
                FR: "<div><h1>France</h1><p class='form'>Entry Form</p></div>",
                GB: "<div><h1>United Kingdom</h1><p class='form'>Entry Form</p></div>",
                TR: "<div><h1>Turkey</h1><p class='invoicing'>E-Invoicing</p></div>",
                FI: "<div><h1>Finland</h1><p class='invoicing'>E-Invoicing</p></div>",
                ES: "<div><h1>Spain</h1><p class='mandatory'>Mandatory Police Reporting</p><p class='invoicing'>E-Invoicing</p><p class='form'>Entry Form</p></div>",
                PT: "<div><h1>Portugal</h1><p class='mandatory'>Mandatory Police Reporting</p><p class='invoicing'>E-Invoicing</p><p class='form'>Entry Form</p></div>",
                AL: "<div><h1>Albania</h1><p class='invoicing'>E-Invoicing</p></div>",
                DE: "<div><h1>Germany</h1><p class='mandatory'>Mandatory Police Reporting</p><p class='form'>Entry Form</p></div>",
                CO: "<div><h1>Colombia</h1><p class='mandatory'>Mandatory Police Reporting</p></div>",
                TH: "<div><h1>Thailand</h1><p class='mandatory'>Mandatory Police Reporting</p></div>",
                AE: "<div><h1>Dubai</h1><p class='mandatory'>Mandatory Police Reporting</p></div>",
                IT: "<div><h1>Italy</h1><p class='mandatory'>Mandatory Police Reporting</p><p class='invoicing'>E-Invoicing</p></div>",
                CZ: "<div><h1>Czech Republic</h1><p class='mandatory'>Mandatory Police Reporting</p><p class='form'>Entry Form</p></div>",
                AT: "<div><h1>Austria</h1><p class='mandatory'>Mandatory Police Reporting</p><p class='form'>Entry Form</p></div>",
                HR: "<div><h1>Croatia</h1><p class='mandatory'>Mandatory Police Reporting</p><p class='form'>Entry Form</p></div>",
                CH: "<div><h1>Switzerland</h1><p class='mandatory'>Mandatory Police Reporting</p></div>",
                RS: "<div><h1>Serbia</h1><p class='invoicing'>E-Invoicing</p></div>",
                RO: "<div><h1>Romania</h1><p class='invoicing'>E-Invoicing</p><p class='form'>Entry Form</p></div>",
                GR: "<div><h1>Greece</h1><p class='invoicing'>E-Invoicing</p><p class='form'>Entry Form</p></div>",
                SI: "<div><h1>Slovenia</h1><p class='invoicing'>E-Invoicing</p></div>",
                NL: "<div><h1>Netherlands</h1><p class='form'>Entry Form</p></div>",
                HU: "<div><h1>Hungary</h1><p class='invoicing'>E-Invoicing</p></div>",
                BE: "<div><h1>Belgium</h1><p class='form'>Entry Form</p></div>"
            }
        },
        es: {
            gdpName: "PIB per cápita",
            gdpFormat: "{0} USD",
            changeName: "Cambio respecto al año anterior",
            countryInfo: {
                FR: "<div><h1>Francia</h1><p class='form'>Formulario de entrada</p></div>",
                GB: "<div><h1>Reino Unido</h1><p class='form'>Formulario de entrada</p></div>",
                TR: "<div><h1>Turquía</h1><p class='invoicing'>Facturación digital</p></div>",
                FI: "<div><h1>Finlandia</h1><p class='invoicing'>Facturación digital</p></div>",
                ES: "<div><h1>España</h1><p class='mandatory'>Informe obligatorio a la policía</p><p class='invoicing'>Facturación digital</p><p class='form'>Formulario de entrada</p></div>",
                PT: "<div><h1>Portugal</h1><p class='mandatory'>Informe obligatorio a la policía</p><p class='invoicing'>Facturación digital</p><p class='form'>Formulario de entrada</p></div>",
                AL: "<div><h1>Albania</h1><p class='invoicing'>Facturación digital</p></div>",
                DE: "<div><h1>Alemania</h1><p class='mandatory'>Informe obligatorio a la policía</p><p class='form'>Formulario de entrada</p></div>",
                CO: "<div><h1>Colombia</h1><p class='mandatory'>Informe obligatorio a la policía</p></div>",
                TH: "<div><h1>Tailandia</h1><p class='mandatory'>Informe obligatorio a la policía</p></div>",
                AE: "<div><h1>Dubái</h1><p class='mandatory'>Informe obligatorio a la policía</p></div>",
                IT: "<div><h1>Italia</h1><p class='mandatory'>Informe obligatorio a la policía</p><p class='invoicing'>Facturación digital</p></div>",
                CZ: "<div><h1>República Checa</h1><p class='mandatory'>Informe obligatorio a la policía</p><p class='form'>Formulario de entrada</p></div>",
                AT: "<div><h1>Austria</h1><p class='mandatory'>Informe obligatorio a la policía</p><p class='form'>Formulario de entrada</p></div>",
                HR: "<div><h1>Croacia</h1><p class='mandatory'>Informe obligatorio a la policía</p><p class='form'>Formulario de entrada</p></div>",
                CH: "<div><h1>Suiza</h1><p class='mandatory'>Informe obligatorio a la policía</p></div>",
                RS: "<div><h1>Serbia</h1><p class='invoicing'>Facturación digital</p></div>",
                RO: "<div><h1>Rumanía</h1><p class='invoicing'>Facturación digial</p><p class='form'>Formulario de entrada</p></div>",
                GR: "<div><h1>Grecia</h1><p class='invoicing'>Facturación digital</p><p class='form'>Formulario de entrada</p></div>",
                SI: "<div><h1>Eslovenia</h1><p class='invoicing'>Facturación digital</p></div>",
                NL: "<div><h1>Países Bajos</h1><p class='form'>Formulario de entrada</p></div>",
                HU: "<div><h1>Hungría</h1><p class='invoicing'>Facturación digital</p></div>",
                BE: "<div><h1>Bélgica</h1><p class='form'>Formulario de entrada</p></div>"
            }
        },
		it: {
            gdpName: "GDP per capita",
            gdpFormat: "{0} USD",
            changeName: "Change to year before",
            countryInfo: {
                FR: "<div><h1>France</h1><p class='form'>Formularios de entrada</p></div>",
                GB: "<div><h1>United Kingdom</h1><p class='form'>Formularios de entrada</p></div>",
                TR: "<div><h1>Turkey</h1><p class='invoicing'>Fatturazione elettronica</p></div>",
                FI: "<div><h1>Finland</h1><p class='invoicing'>Fatturazione elettronica</p></div>",
                ES: "<div><h1>Spagna</h1><p class='mandatory'>Report obbligatori alla polizia di stato</p><p class='invoicing'>Fatturazione elettronica</p><p class='form'>Formularios de entrada</p></div>",
                PT: "<div><h1>Portogallo</h1><p class='mandatory'>Report obbligatori alla polizia di stato</p><p class='invoicing'>Fatturazione elettronica</p><p class='form'>Formularios de entrada</p></div>",
                AL: "<div><h1>Albania</h1><p class='invoicing'>Fatturazione elettronica</p></div>",
                DE: "<div><h1>Germania</h1><p class='mandatory'>Report obbligatori alla polizia di stato</p><p class='form'>Formularios de entrada</p></div>",
                CO: "<div><h1>Colombia</h1><p class='mandatory'>Report obbligatori alla polizia di stato</p></div>",
                TH: "<div><h1>Thailand</h1><p class='mandatory'>Report obbligatori alla polizia di stato</p></div>",
                AE: "<div><h1>Dubai</h1><p class='mandatory'>Report obbligatori alla polizia di stato</p></div>",
                IT: "<div><h1>Italia</h1><p class='mandatory'>Report obbligatori alla polizia di stato</p><p class='invoicing'>Fatturazione elettronica</p></div>",
                CZ: "<div><h1>Repubblica Ceca</h1><p class='mandatory'>Report obbligatori alla polizia di stato</p><p class='form'>Formularios de entrada</p></div>",
                AT: "<div><h1>Austria</h1><p class='mandatory'>Report obbligatori alla polizia di stato</p><p class='form'>Formularios de entrada</p></div>",
                HR: "<div><h1>Croazia</h1><p class='mandatory'>Report obbligatori alla polizia di stato</p><p class='form'>Formularios de entrada</p></div>",
                CH: "<div><h1>Svizzera</h1><p class='mandatory'>Report obbligatori alla polizia di stato</p></div>",
                RS: "<div><h1>Serbia</h1><p class='invoicing'>Fatturazione elettronica</p></div>",
                RO: "<div><h1>Romania</h1><p class='invoicing'>Fatturazione elettronica</p><p class='form'>Formularios de entrada</p></div>",
                GR: "<div><h1>Grecia</h1><p class='invoicing'>Fatturazione elettronica</p><p class='form'>Formularios de entrada</p></div>",
                SI: "<div><h1>Slovenia</h1><p class='invoicing'>Fatturazione elettronica</p></div>",
                NL: "<div><h1>Paesi Bassi</h1><p class='form'>Formularios de entrada</p></div>",
                HU: "<div><h1>Hungary</h1><p class='invoicing'>Fatturazione elettronica</p></div>",
                BE: "<div><h1>Belgium</h1><p class='form'>Formularios de entrada</p></div>"
            }
        },
    };

    var selectedTexts = texts[lang] || texts.en;
    
    if(document.querySelector('#svgMap')){
    new svgMap({
        targetElementID: "svgMap",
        mouseWheelZoomEnabled: false,
        mouseWheelZoomWithKey: false,
        colorNoData: "#D7D7D7",
        data: {
            data: {
                gdp: {
                    name: selectedTexts.gdpName,
                    format: selectedTexts.gdpFormat,
                    thousandSeparator: ",",
                    thresholdMax: 50000,
                    thresholdMin: 1000
                },
                change: {
                    name: selectedTexts.changeName,
                    format: "{0} %"
                }
            },
            applyData: "gdp",
            values: {
                FR: {
                    gdp: 587,
                    change: 4.73,
                    color: "#A7DAFF",
                    class: "custom-fill",
                    info: selectedTexts.countryInfo.FR
                },
                GB: {
                    gdp: 587,
                    change: 4.73,
                    color: "#A7DAFF",
                    class: "custom-fill",
                    info: selectedTexts.countryInfo.GB
                },
                TR: {
                    gdp: 587,
                    change: 4.73,
                    color: "#8DA2FF",
                    class: "custom-fill",
                    info: selectedTexts.countryInfo.TR
                },
                FI: {
                    gdp: 587,
                    change: 4.73,
                    color: "#8DA2FF",
                    class: "custom-fill",
                    info: selectedTexts.countryInfo.FI
                },
                ES: {
                    gdp: 587,
                    change: 4.73,
                    color: "#385BF8",
                    class: "custom-fill",
                    info: selectedTexts.countryInfo.ES
                },
                PT: {
                    gdp: 587,
                    change: 4.73,
                    color: "#385BF8",
                    class: "custom-fill",
                    info: selectedTexts.countryInfo.PT
                },
                AL: {
                    gdp: 587,
                    change: 4.73,
                    color: "#8DA2FF",
                    class: "custom-fill",
                    info: selectedTexts.countryInfo.AL
                },
                DE: {
                    gdp: 587,
                    change: 4.73,
                    color: "#385BF8",
                    class: "custom-fill",
                    info: selectedTexts.countryInfo.DE
                },
                CO: {
                    gdp: 587,
                    change: 4.73,
                    color: "#385BF8",
                    class: "custom-fill",
                    info: selectedTexts.countryInfo.CO
                },
             /*   TH: {
                    gdp: 587,
                    change: 4.73,
                    color: "#385BF8",
                    class: "custom-fill",
                    info: selectedTexts.countryInfo.TH
                },*/
                AE: {
                    gdp: 587,
                    change: 4.73,
                    color: "#385BF8",
                    class: "custom-fill",
                    info: selectedTexts.countryInfo.AE
                },
                IT: {
                    gdp: 587,
                    change: 4.73,
                    color: "#385BF8",
                    class: "custom-fill",
                    info: selectedTexts.countryInfo.IT
                },
                CZ: {
                    gdp: 587,
                    change: 4.73,
                    color: "#385BF8",
                    class: "custom-fill",
                    info: selectedTexts.countryInfo.CZ
                },
                AT: {
                    gdp: 587,
                    change: 4.73,
                    color: "#385BF8",
                    class: "custom-fill",
                    info: selectedTexts.countryInfo.AT
                },
                HR: {
                    gdp: 587,
                    change: 4.73,
                    color: "#385BF8",
                    class: "custom-fill",
                    info: selectedTexts.countryInfo.HR
                },
                CH: {
                    gdp: 587,
                    change: 4.73,
                    color: "#385BF8",
                    class: "custom-fill",
                    info: selectedTexts.countryInfo.CH
                },
                RS: {
                    gdp: 587,
                    change: 4.73,
                    color: "#8DA2FF",
                    class: "custom-fill",
                    info: selectedTexts.countryInfo.RS
                },
                RO: {
                    gdp: 587,
                    change: 4.73,
                    color: "#8DA2FF",
                    class: "custom-fill",
                    info: selectedTexts.countryInfo.RO
                },
                GR: {
                    gdp: 587,
                    change: 4.73,
                    color: "#8DA2FF",
                    class: "custom-fill",
                    info: selectedTexts.countryInfo.GR
                },
                SI: {
                    gdp: 587,
                    change: 4.73,
                    color: "#A0B2FF",
                    class: "custom-fill",
                    info: selectedTexts.countryInfo.SI
                },
                NL: {
                    gdp: 587,
                    change: 4.73,
                    color: "#A7DAFF",
                    class: "custom-fill",
                    info: selectedTexts.countryInfo.NL
                },
                HU: {
                    gdp: 587,
                    change: 4.73,
                    color: "#A0B2FF",
                    class: "custom-fill",
                    info: selectedTexts.countryInfo.HU
                },
                BE: {
                    gdp: 587,
                    change: 4.73,
                    color: "#A7DAFF",
                    class: "custom-fill",
                    info: selectedTexts.countryInfo.BE
                }
            }
        },
        onGetTooltip: function(tooltipDiv, countryID, countryValues) {
            $(tooltipDiv).html(countryValues.info).addClass("tooltip");
        }
    });
  }
});

