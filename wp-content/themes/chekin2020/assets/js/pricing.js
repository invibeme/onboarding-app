(function ($) {
  "use strict";

  $(document).ready(function () {
    var ajaxurl =
      "https://ip-api.io/json?api_key=c19e62e0-73d6-45ab-9102-bcd186626e83"; //https://ip-api.io/json?api_key=c19e62e0-73d6-45ab-9102-bcd186626e84
    var currentCountryCode = "";
    jQuery.get(ajaxurl, { action: "getip" }, function (current_ip) {
      jQuery(".header-titles").after(" &nbsp;&nbsp;" + current_ip.country_code);
      jQuery("html").attr("data-country", current_ip.country_code);
      currentCountryCode = current_ip.country_code; //current_ip;
      jQuery(".property-amount input").trigger("change");
    });

    // get biglead popup
    jQuery("body").on(
      "click",
      ".biglead-vacation_rental .get-biglead-poup a",
      function (e) {
        e.preventDefault();
        jQuery(".form-popup-biglead.vr").addClass("active");
        return 0;
      }
    );
    jQuery("body").on(
      "click",
      ".biglead-hotel .get-biglead-poup a",
      function (e) {
        e.preventDefault();
        jQuery(".form-popup-biglead.hotel").addClass("active");
        return 0;
      }
    );

    // Initial Value

    var defaultAmount = 4,
      type = "vacation_rental",
      loc = "eur",
      period = "yearly",
      plan = "basic",
      isCustomPlan = false,
      customButtonLock = false,
      currentEditingFeature,
      // Pricing Data

      price = {
        breakpoint: {
          vacation_rental: [0, 5, 20, 50, 100, 200],
          hotel: [0, 10, 20, 50, 100, 200],
        },
        unit: {
          en: {
            property: ["accommodation unit", "accommodation units"],
            property_initials: "AU",
            room: ["property", "properties"],
            units_text: "Accommodation units:",
            rooms_text: "Number of properties:",
          },
          es: {
            property: ["unidad alojativa", "unidades alojativas"],
            property_initials: "UA",
            room: ["propiedad", "propiedades"],
            units_text: "Unidades alojativas:",
            rooms_text: "Número de propiedades:",
          },
          pt: {
            property: ["unidad de alojamento", "unidades de alojamento"],
            property_initials: "UA",
            room: ["propiedade", "propiedades"],
            units_text: "Unidades de alojamento:",
            rooms_text: "Número de propiedades:",
          },
          it: {
            property: ["unità ricettiva", "unità ricettive"],
            property_initials: "UR",
            room: ["proprietà", "proprietà"],
            units_text: "Unità ricettive:",
            rooms_text: "Numero di proprietà:",
          },
          fr: {
            property: ["unité d'hébergement", "unités d'hébergement"],
            property_initials: "UH",
            room: ["propriété", "propriétés"],
            units_text: "Unités d'hébergement:",
            rooms_text: "Nombre de propriétés:",
          },
          de: {
            property: ["wohneinheit", "wohneinheiten"],
            property_initials: "AU",
            room: ["Eigenschaft", "Eigenschaften"],
            units_text: "Wohneinheiten:",
            rooms_text: "Anzahl der Objekte:",
          },
        },
        eur: {
          vacation_rental: {
            monthly: {
              //basic: [ 3, 2.7, 2.4, 2.1, 1.8, 1.5 ],
              basic: [5, 4.5, 4, 3.5, 3, 2.5], // new price
              remote_access: [5, 4.5, 4, 3.5, 3, 2.5],
              identity_verification: [5, 4.5, 4, 3.5, 3, 2.5],
              payments: [0, 0, 0, 0, 0, 0],
              tourist_taxes: [3, 2.7, 2.4, 2.1, 1.8, 1.5],
              deposits: [2, 1.8, 1.6, 1.4, 1.2, 1],
              branded_guest_app: [3, 2.7, 2.4, 2.1, 1.8, 1.5, 1.2, 0.9]
            },
            yearly: {
              //basic: [ 28.8, 25.92, 23.04, 20.16, 17.28, 14.4 ],
              basic: [48, 43.2, 38.4, 33.6, 28.8, 24], // new price
              remote_access: [48, 43.2, 38.4, 33.6, 28.8, 24],
              identity_verification: [48, 43.2, 38.4, 33.6, 28.8, 24],
              payments: [0, 0, 0, 0, 0, 0],
              tourist_taxes: [28.8, 25.92, 23.04, 20.16, 17.28, 14.4],
              deposits: [19.2, 17.28, 15.36, 13.44, 11.52, 9.6],
              branded_guest_app: [3*12*0.8, 2.7*12*0.8, 2.4*12*0.8, 2.1*12*0.8, 1.8*12*0.8, 1.5*12*0.8, 1.2*12*0.8, 0.9*12*0.8]
            },
          },
          currency: "€",
        },
        usa: {
          vacation_rental: {
            monthly: {
              basic: [6, 5.4, 4.8, 4.2, 3.6, 3],
              remote_access: [6, 5.4, 4.8, 4.2, 3.6, 3],
              identity_verification: [6, 5.4, 4.8, 4.2, 3.6, 3],
              payments: [0, 0, 0, 0, 0, 0],
              tourist_taxes: [3, 2.7, 2.4, 2.1, 1.8, 1.5],
              deposits: [2, 1.8, 1.6, 1.4, 1.2, 1],
              branded_guest_app: [3, 2.7, 2.4, 2.1, 1.8, 1.5, 1.2, 0.9]
            },
            yearly: {
              basic: [57.6, 51.84, 46.08, 40.32, 34.56, 28.8],
              remote_access: [57.6, 51.84, 46.08, 40.32, 34.56, 28.8],
              identity_verification: [57.6, 51.84, 46.08, 40.32, 34.56, 28.8],
              payments: [0, 0, 0, 0, 0, 0],
              tourist_taxes: [28.8, 25.92, 23.04, 20.16, 17.28, 14.4],
              deposits: [19.2, 17.28, 15.36, 13.44, 11.52, 9.6],
              branded_guest_app: [3*12*0.8, 2.7*12*0.8, 2.4*12*0.8, 2.1*12*0.8, 1.8*12*0.8, 1.5*12*0.8, 1.2*12*0.8, 0.9*12*0.8]
            },
          },
          hotel: {
            monthly: {
              basic: [1.9, 1.71, 1.52, 1.33, 1.14, 0.95],
              remote_access: [3, 2.7, 2.4, 2.1, 1.8, 1.5],
              identity_verification: [3, 2.7, 2.4, 2.1, 1.8, 1.5],
              payments: [0, 0, 0, 0, 0, 0],
              tourist_taxes: [1.5, 1.35, 1.2, 1.05, 0.9, 0.75],
              deposits: [1, 0.9, 0.8, 0.7, 0.6, 0.5],
              branded_guest_app: [1.5, 1.35, 1.2, 1.05, 0.9, 0.75, 0.75]
            },
            yearly: {
              basic: [18.24, 16.42, 14.59, 12.77, 10.94, 9.12],
              remote_access: [28.8, 25.92, 23.04, 20.16, 17.28, 14.4],
              identity_verification: [28.8, 25.92, 23.04, 20.16, 17.28, 14.4],
              payments: [0, 0, 0, 0, 0, 0],
              tourist_taxes: [14.4, 12.96, 11.52, 10.08, 8.64, 7.2],
              deposits: [9.6, 8.64, 7.68, 6.72, 5.76, 4.8],
              branded_guest_app: [1.5*12*0.8, 1.35*12*0.8, 1.2*12*0.8, 1.05*12*0.8, 0.9*12*0.8, 0.75*12*0.8, 0.75*12*0.8]
            },
          },
          currency: "$",
        },
        gb: {
          vacation_rental: {
            monthly: {
              basic: [5, 4.5, 4, 3.5, 3, 2.5],
              remote_access: [5, 4.5, 4, 3.5, 3, 2.5],
              identity_verification: [5, 4.5, 4, 3.5, 3, 2.5],
              payments: [0, 0, 0, 0, 0, 0],
              tourist_taxes: [3, 2.7, 2.4, 2.1, 1.8, 1.5],
              deposits: [2, 1.8, 1.6, 1.4, 1.2, 1],
              branded_guest_app: [3, 2.7, 2.4, 2.1, 1.8, 1.5, 1.2, 0.9]
            },
            yearly: {
              basic: [48, 43.2, 38.4, 33.6, 28.8, 24],
              remote_access: [48, 43.2, 38.4, 33.6, 28.8, 24],
              identity_verification: [48, 43.2, 38.4, 33.6, 28.8, 24],
              payments: [0, 0, 0, 0, 0, 0],
              tourist_taxes: [28.8, 25.92, 23.04, 20.16, 17.28, 14.4],
              deposits: [19.2, 17.28, 15.36, 13.44, 11.52, 9.6],
              branded_guest_app: [3*12*0.8, 2.7*12*0.8, 2.4*12*0.8, 2.1*12*0.8, 1.8*12*0.8, 1.5*12*0.8, 1.2*12*0.8, 0.9*12*0.8]
            },
          },
          hotel: {
            monthly: {
              basic: [1.5, 1.35, 1.2, 1.05, 0.9, 0.75],
              remote_access: [2.5, 2.25, 2, 1.75, 1.5, 1.25],
              identity_verification: [2.5, 2.25, 2, 1.75, 1.5, 1.25],
              payments: [0, 0, 0, 0, 0, 0],
              tourist_taxes: [1.5, 1.35, 1.2, 1.05, 0.9, 0.75],
              deposits: [1, 0.9, 0.8, 0.7, 0.6, 0.5],
              branded_guest_app: [1.5, 1.35, 1.2, 1.05, 0.9, 0.75, 0.75]
            },
            yearly: {
             // basic: [14.4, 12.96, 11.52, 10.08, 8.64, 7.2],
              basic: [15.8, 12.96, 11.52, 10.08, 8.64, 7.2],  // 07-02-2025 | 1.5*12*0.8777777777777778 | SAVE 12.222222222222223%
              remote_access: [24, 21.6, 19.2, 16.8, 14.4, 12],
              identity_verification: [24, 21.6, 19.2, 16.8, 14.4, 12],
              payments: [0, 0, 0, 0, 0, 0],
              tourist_taxes: [14.4, 12.96, 11.52, 10.08, 8.64, 7.2],
              deposits: [9.6, 8.64, 7.68, 6.72, 5.76, 4.8],
              branded_guest_app: [1.5*12*0.8, 1.35*12*0.8, 1.2*12*0.8, 1.05*12*0.8, 0.9*12*0.8, 0.75*12*0.8, 0.75*12*0.8]
            },
          },
          currency: "£",
        },
        other: {
          vacation_rental: {
            monthly: {
              basic: [5, 4.5, 4, 3.5, 3, 2.5],
              remote_access: [5, 4.5, 4, 3.5, 3, 2.5],
              identity_verification: [5, 4.5, 4, 3.5, 3, 2.5],
              payments: [0, 0, 0, 0, 0, 0],
              tourist_taxes: [3, 2.7, 2.4, 2.1, 1.8, 1.5],
              deposits: [2, 1.8, 1.6, 1.4, 1.2, 1],
              branded_guest_app: [3, 2.7, 2.4, 2.1, 1.8, 1.5, 1.2, 0.9]
            },
            yearly: {
              basic: [48, 43.2, 38.4, 33.6, 28.8, 24],
              remote_access: [48, 43.2, 38.4, 33.6, 28.8, 24],
              identity_verification: [48, 43.2, 38.4, 33.6, 28.8, 24],
              payments: [0, 0, 0, 0, 0, 0],
              tourist_taxes: [28.8, 25.92, 23.04, 20.16, 17.28, 14.4],
              deposits: [19.2, 17.28, 15.36, 13.44, 11.52, 9.6],
              branded_guest_app: [3*12*0.8, 2.7*12*0.8, 2.4*12*0.8, 2.1*12*0.8, 1.8*12*0.8, 1.5*12*0.8, 1.2*12*0.8, 0.9*12*0.8]
            },
          },
          hotel: {
            monthly: {
              basic: [1.5, 1.35, 1.2, 1.05, 0.9, 0.75],
              remote_access: [2.5, 2.25, 2, 1.75, 1.5, 1.25],
              identity_verification: [2.5, 2.25, 2, 1.75, 1.5, 1.25],
              payments: [0, 0, 0, 0, 0, 0],
              tourist_taxes: [1.5, 1.35, 1.2, 1.05, 0.9, 0.75],
              deposits: [1, 0.9, 0.8, 0.7, 0.6, 0.5],
              branded_guest_app: [1.5, 1.35, 1.2, 1.05, 0.9, 0.75, 0.75]
            },
            yearly: {
              // basic: [14.4, 12.96, 11.52, 10.08, 8.64, 7.2], 
              basic: [15.8, 12.96, 11.52, 10.08, 8.64, 7.2],  // 07-02-2025 | 1.5*12*0.8777777777777778 | SAVE 12.222222222222223%
              remote_access: [24, 21.6, 19.2, 16.8, 14.4, 12],
              identity_verification: [24, 21.6, 19.2, 16.8, 14.4, 12],
              payments: [0, 0, 0, 0, 0, 0],
              tourist_taxes: [14.4, 12.96, 11.52, 10.08, 8.64, 7.2],
              deposits: [9.6, 8.64, 7.68, 6.72, 5.76, 4.8],
              branded_guest_app: [1.5*12*0.8, 1.35*12*0.8, 1.2*12*0.8, 1.05*12*0.8, 0.9*12*0.8, 0.75*12*0.8, 0.75*12*0.8]
            },
          },
          currency: "€",
        },
        amount: {
          basic: 0,
          remote_access: 0,
          identity_verification: 0,
          payments: 0,
          tourist_taxes: 0,
          deposits: 0,
          custom: 0,
          branded_guest_app: 0,
        },
      },
      amount = {
        basic: {
          value: defaultAmount,
          customized: false,
          enable: true,
          free: false,
        },
        remote_access: {
          value: defaultAmount,
          customized: false,
          enable: false,
          free: false,
        },
        identity_verification: {
          value: defaultAmount,
          customized: false,
          enable: false,
          free: false,
        },
        payments: {
          value: defaultAmount,
          customized: false,
          enable: false,
          free: true,
        },
        tourist_taxes: {
          value: defaultAmount,
          customized: false,
          enable: false,
          free: false,
        },
        deposits: {
          value: defaultAmount,
          customized: false,
          enable: false,
          free: false,
        },
        branded_guest_app: {
          value: defaultAmount,
          customized: false,
          enable: false,
          free: false,
        },
      },
      lang = "en",
      actionButtonText = {
        en: ["Build Your Plan", "Get Started"],
        es: ["Diseña tu plan", "Empezar"],
        pt: ["Desenhe seu plano", "Começar"],
        it: ["Desenhe seu plano", "Comincia"], // Coming Soon
        fr: ["Construisez votre plan", "Commencer"],
        de: ["Erstellen Sie Ihren Plan", "Anfangen"],
      },
      customPlanHeading = {
        en: ["Custom", "Custom Your Plan"],
        es: ["Personalizado", "Personaliza tu plan"],
        pt: ["Personalizado", "Personalize teu plano"],
        it: ["Personalizzato", "Personalizza il tuo piano"],
        fr: ["Coutume", "Personnalisez votre forfait"],
        de: ["Benutzerdefiniert", "Individueller Plan"],
      },
      AddButtonText = {
        en: ["Add", "Added!"],
        es: ["Añadir", "Añadido"],
        pt: ["Adicionar", "Adicionar"],
        it: ["Aggiungere", "Aggiunto"],
        fr: ["Ajouter", "Ajoutée!"],
        de: ["Hinzufügen", "Hinzugefügt!"],
      },
      customURL = {
        en: "custom",
        es: "personalizado",
        pt: "personalizado",
        it: "personalizzato",
        fr: "personnalisé",
        de: "hinzufugen",
      },
      pageURL = window.location.href;

    if ($("html").attr("lang") == "es-ES") {
      lang = "es";
    }
    if ($("html").attr("lang") == "pt-PT") {
      lang = "pt";
    }
    if ($("html").attr("lang") == "it-IT") {
      lang = "it";
    }
    if ($("html").attr("lang") == "fr-FR") {
      lang = "fr";
    }
    if ($("html").attr("lang") == "de-DE") {
      lang = "de";
    }

    // Calculate Price

    function getPrice(info) {
      var estimatedPrice = 0,
        index = 0,
        priceRate,
        remainingAmount = info.amount,
        previousRemainingAmount = info.amount;

      while (true) {
        remainingAmount = info.amount - price.breakpoint[info.type][index + 1];
        priceRate = price[info.loc][info.type][info.period][info.plan][index];

        if (isNaN(remainingAmount) || remainingAmount < 0) {
          estimatedPrice += previousRemainingAmount * priceRate;
          break;
        } else {
          estimatedPrice +=
            (price.breakpoint[info.type][index + 1] -
              price.breakpoint[info.type][index]) *
            priceRate;
        }

        previousRemainingAmount = remainingAmount;
        index++;
      }

      return estimatedPrice;
    }

    function isYearly(price) {
      return period == "yearly" ? price / 12 : price;
    }
    function addComma(price) {
      return price.toString().replace(".", ",");
    }

    // Show Price Output

    function showPrice(from = "") {
      var featurePrice,
        featurePriceReal,
        propertyType = type,
        unitType,
        unit,
        consideredLocation = loc,
        yearlySaving = "00",
        monthlyTotal = 0;

      if (type == "camping") {
        propertyType = "hotel";
      }
      if (type == "villa") {
        propertyType = "vacation_rental";
      }
      if (type == "aparthotel") {
        propertyType = "vacation_rental";
      }

      // $('.pricing-top-left').removeClass('error')

      if (propertyType == "hotel" && from) {
        //  var minAmount = 10
        var minAmount = 20; // New value

        // if( from == 'typeChange' ) {
        Object.keys(amount).forEach(function (feature) {
          if (amount[feature]["value"] < minAmount) {
            amount[feature]["value"] = minAmount;
            if (feature == "basic") {
              //$('.property-amount input').val(minAmount)
            } else {
              $(
                ".feature-popup-all .feature-amount input, .feature-" +
                  feature +
                  " .feature-amount input"
              ).val(minAmount);
            }
          }
        });
      }

      if (type != "vacation_rental" && type != "villa" && loc == "eur") {
        consideredLocation = "other";
      }

      price.amount.basic = getPrice({
        amount: amount.basic.value,
        type: propertyType,
        loc: consideredLocation,
        period,
        plan: "basic",
      });
      price.amount.custom = 0;

      Object.keys(amount).forEach(function (feature) {
        price.amount[feature] = getPrice({
          amount: amount[feature]["value"],
          type: propertyType,
          loc: consideredLocation,
          period,
          plan: feature,
        });
        featurePrice = amount[feature]["enable"] ? price.amount[feature] : 0;
        featurePriceReal =
          amount[feature]["value"] == 0
            ? price.amount[feature]
            : price.amount[feature] / amount[feature]["value"];
        price.amount.custom += featurePrice;

        monthlyTotal += amount[feature]["enable"]
          ? getPrice({
              amount: amount[feature]["value"],
              type: propertyType,
              loc: consideredLocation,
              period: "monthly",
              plan: feature,
            })
          : 0;

        $("[data-feature=feature-" + feature + "] .price").text(
          addComma(Math.round(isYearly(featurePrice) * 100) / 100)
        );
        $(".feature-" + feature + " .price:not(.beta-price)").text(
          addComma(Math.round(isYearly(featurePriceReal) * 100) / 100)
        );
        $("[data-feature=feature-" + feature + "] .feature-amount").text(
          amount[feature]["value"]
        );

        if (!amount[feature]["customized"]) {
          amount[feature]["value"] = amount.basic.value;
          $(
            ".wp-block-column.feature-" + feature + " .feature-amount input"
          ).val(amount.basic.value);
        }
      });

      if (
        $(".property-amount input").val() >= 100 &&
        (type == "vacation_rental" || type == "villa" || type == "aparthotel")
      ) {
        //console.log('Show popup: ' + type);
        $(".pricing-table")
          .addClass("biglead-vacation_rental")
          .removeClass("biglead-hotel");
      } else if (
        $(".property-amount input").val() >= 200 &&
        (type == "hotel" || type == "camping")
      ) {
        //console.log('Show popup: ' + type);
        $(".pricing-table")
          .removeClass("biglead-vacation_rental")
          .addClass("biglead-hotel");
      } else {
        //console.log('DO calculation');
        $(".pricing-table").removeClass("biglead-vacation_rental");
        $(".pricing-table").removeClass("biglead-hotel");
      }

      if (currentCountryCode.length) {
        if (currentCountryCode === "AE") {
          $(".price-basic-per").text(
            addComma(
              Math.round(
                isYearly(
                  (price.amount.basic + price.amount.identity_verification) /
                    amount.basic.value
                ) * 100
              ) / 100
            )
          );
          $(".price-basic").text(
            addComma(
              Math.round(
                isYearly(
                  price.amount.basic + price.amount.identity_verification
                ) * 100
              ) / 100
            )
          );
        } else {
          $(".price-basic").text(
            addComma(Math.round(isYearly(price.amount.basic) * 100) / 100)
          );
          $(".price-basic-per").text(
            addComma(
              Math.round(
                isYearly(price.amount.basic / amount.basic.value) * 100
              ) / 100
            )
          );
        }

        if (currentCountryCode === "AE") {
          $(".price-custom-per").text(
            addComma(
              Math.round(
                isYearly(
                  (price.amount.custom + price.amount.identity_verification) /
                    amount.basic.value
                ) * 100
              ) / 100
            )
          );
          $(".price-custom").text(
            addComma(
              Math.round(
                isYearly(
                  price.amount.custom + price.amount.identity_verification
                ) * 100
              ) / 100
            )
          );
        } else {
          $(".price-custom-per").text(
            addComma(
              Math.round(
                isYearly(price.amount.custom / amount.basic.value) * 100
              ) / 100
            )
          );
          
          //Check 07-02-2025
          //console.log(Math.round( isYearly(price.amount.custom / amount.basic.value) * 100 ) / 100);
          //console.log(price.amount.custom + "  |  " + amount.basic.value);

          $(".price-custom").text(
            addComma(Math.round(isYearly(price.amount.custom) * 100) / 100)
          );

          // New rules
        }

        if (period == "yearly") {
          yearlySaving = addComma(
            (Math.round((monthlyTotal - isYearly(price.amount.custom)) * 100) *
              12) /
              100
          );
        }
        $(".saving-amount").text(yearlySaving);

        unitType =
          type == "hotel" || type == "camping" || type == "aparthotel"
            ? "property"
            : "room";
        unit =
          amount.basic.value < 2
            ? price["unit"][lang][unitType][0]
            : price["unit"][lang][unitType][1];

        if (type == "hotel" || type == "camping") {
          $(".property-text").text(price["unit"][lang]["units_text"]);
          $(".unit.singular").text(price["unit"][lang][unitType][0]);
          $(".units-tooltip").removeClass("vacation-tooltip");
          $(".units-tooltip").show();
          $("#top-modal").html($("#units-modal").html());
          $(".minimum-subscription").show();
        } else if (type == "aparthotel") {
          $(".property-text").text(price["unit"][lang]["units_text"]);
          $(".unit.singular").text(price["unit"][lang][unitType][0]);
          $(".units-tooltip").addClass("vacation-tooltip");
          $(".units-tooltip").show();
          $(".minimum-subscription").hide();
          $("#top-modal").html($("#aparthotel-modal").html());
        } else {
          $(".property-text").text(price["unit"][lang]["rooms_text"]);
          $(".unit.singular").text(price["unit"][lang][unitType][0]);
          $(".units-tooltip").hide();
          if (type == "vacation_rental") {
            $(".units-tooltip").addClass("vacation-tooltip");
            $(".units-tooltip").show();
            $("#top-modal").html($("#vacation-modal").html());
          } else {
            $(".units-tooltip").removeClass("vacation-tooltip");
            $(".units-tooltip").hide();
          }
          $(".minimum-subscription").hide();
        }

        $(".unit.both").text(unit);
        $(".currency").text(price[consideredLocation]["currency"]);
        $(".amount").text(amount.basic.value);
      }
    }

    function init() {
      showPrice();
    }

    $(".dropdown-menu li a").on("click", function (e) {
      e.preventDefault();

      var $this = $(this);

      type = $this.attr("data-value");

      $(".dropdown-toggle").text($this.text());
      $(".dropdown-menu, .dropdown-menu li").removeClass("active");
      $(".dropdown-menu li a[data-value=" + type + "]")
        .parent()
        .addClass("active");

      // User cannot select less than 20 for hotel or camping
      if (type == "hotel" || type == "camping") {
        $(".property-amount input").val("20").trigger("change");
      } else {
        $(".property-amount input").val("1").trigger("change");
      }
      showPrice("typeChange");
    });

    function toggleFeature(feature) {
      amount[feature]["enable"] = !amount[feature]["enable"];
      amount[feature]["value"] = amount["basic"]["value"];
      amount[feature]["customized"] = false;
      showPrice();
    }

    $("[data-feature]").on("click", function (e) {
      var $this = $(this),
        dataFeature = $this.attr("data-feature"),
        feature = dataFeature.substr(dataFeature.indexOf("-") + 1),
        eventTarget = $(e.target);

      if (eventTarget.hasClass("edit") || eventTarget.closest(".edit").length) {
        // if( !amount[feature]['free'] && amount[feature]['enable'] ) {
        // $this.closest('.popular').find('.feature-popup-all').addClass('active')
        // $('.popup-feature-text').text($this.find('.text').text())
        // $('.feature-popup-all .feature-amount input').val(amount[feature]['value'])
        // currentEditingFeature = feature
        // }

        return;
      }

      if (isCustomPlan) {
        if ($(e.target).hasClass("fas")) {
          toggleFeature(feature);
        }
        return;
      }
      toggleFeature(feature);
    });

    $(".property-amount input").on("change keyup", function (e) {
      var value = $(this).val(),
        from = e.originalEvent !== undefined ? "" : "blur";

      amount.basic.value = isNaN(value) || Number(value) < 1 ? 1 : value;
      $(".property-amount input").val(value === "0" ? 1 : value);

      Object.keys(amount).forEach(function (feature) {
        if (parseInt(amount[feature]["value"]) > parseInt(amount.basic.value)) {
          amount[feature]["customized"] = false;
        }
        if (
          !amount[feature]["customized"] ||
          parseInt(amount[feature]["value"]) > parseInt(amount.basic.value)
        ) {
          amount[feature]["value"] = amount.basic.value;
          $(
            ".wp-block-column.feature-" + feature + " .feature-amount input"
          ).val(amount.basic.value);
        }
      });

      showPrice(from);
    });

    $(".property-amount input").on("blur", function () {
      showPrice("blur");
    });

    $(".property-period").on("click", function () {
      $(".property-period, .period-text, .yearly-saving").toggleClass("active");
      period = period == "monthly" ? "yearly" : "monthly";

      showPrice();
    });

    // DOM Manipulation

    $(".editable").on("click", function (e) {
      var $this = $(this),
        dataFeature = $this.attr("data-feature"),
        feature = dataFeature.split("-")[1],
        featureButton = $("." + dataFeature + " .add-button"),
        featureButtonLink = featureButton.find(".wp-block-button__link"),
        featureButtonText,
        eventTarget = $(e.target),
        container = $this.closest(".pricing-table").hasClass("pc")
          ? "mobile"
          : "pc",
        duplicateFeature = $(".pricing-table." + container).find(
          "[data-feature=" + dataFeature + "]"
        );

      if (eventTarget.hasClass("edit") || eventTarget.closest(".edit").length) {
        if (!amount[feature]["free"] && amount[feature]["enable"]) {
          $this
            .closest(".popular")
            .find(".feature-popup-all")
            .addClass("active");
          $(".popup-feature-text").text($this.find(".text").text());
          $(".feature-popup-all .feature-amount input").val(
            amount[feature]["value"]
          );
          currentEditingFeature = feature;
        }

        return;
      }

      if (isCustomPlan) {
        if (eventTarget.hasClass("fas")) {
          $this.removeClass("active");
          duplicateFeature.removeClass("active");
          featureButton.removeClass("feature-item-link");
          featureButtonLink.text(AddButtonText[lang][0]);

          if (currentEditingFeature && currentEditingFeature == feature) {
            $this
              .closest(".popular")
              .find(".feature-popup-all")
              .removeClass("active");
          }
        }
        return;
      }

      $this.toggleClass("active");
      duplicateFeature.toggleClass("active");

      featureButton.toggleClass("feature-item-link");
      featureButtonText =
        featureButtonLink.text() == AddButtonText[lang][0]
          ? AddButtonText[lang][1]
          : AddButtonText[lang][0];
      featureButtonLink.text(featureButtonText);
    });

    $(".add-button").on("click", function () {
      var $this = $(this),
        featureBlock = $this.closest(".wp-block-column"),
        //dataFeature = featureBlock.attr("class").split(" ")[2], // return layoyt-flow
        dataFeature = featureBlock.attr("class").split(" ")[1], // return e.g remote_access
        feature = dataFeature.substr(dataFeature.indexOf("-") + 1);

        console.log(feature);

      if ($this.hasClass("feature-item-link")) return;

      if (amount[feature]["free"]) {
        featureBlock
          .find(".feature-popup-single .wp-block-button")
          .trigger("click");
      } else {
        featureBlock.find(".feature-popup-single").addClass("active");
      }
    });

    $(".feature-popup-single .wp-block-button").on("click", function () {
      var $this = $(this),
        dataFeature = $this
          .closest(".wp-block-column")
          .attr("class")
          .split(" ")[1], // was 2
        featureButton = $this.closest(".wp-block-column").find(".add-button"),
        popup = $this.closest(".feature-popup-single"),
        feature = dataFeature.substr(dataFeature.indexOf("-") + 1),
        val = $this
          .closest(".wp-block-column")
          .find(".feature-amount input")
          .val();

      featureButton.addClass("feature-item-link");
      featureButton.find(".wp-block-button__link").text(AddButtonText[lang][1]);
      $("[data-feature=" + dataFeature + "]").addClass("active");
      toggleFeature(feature);

      amount[feature]["value"] = val ? val : 0;
      amount[feature]["customized"] = val != amount.basic.value;
      showPrice();
    });

    $(".editable").append('<i class="fas fa-times"></i>');

    $(".action-button-custom .wp-block-button__link").on("click", function (e) {
      if (!$(this).closest(".wp-block-column.popular").hasClass("fixed")) {
        e.preventDefault();
      }

      if (customButtonLock) return;
      customButtonLock = true;

      isCustomPlan = true;

      window.history.pushState("", "", pageURL + customURL[lang]);

      var customButtonText = isCustomPlan
          ? actionButtonText[lang][1]
          : actionButtonText[lang][0],
        popularPlanDiv = $(".popular"),
        top = popularPlanDiv.offset().top - $(window).scrollTop(),
        left = popularPlanDiv.offset().left;

      popularPlanDiv
        .find(".action-button-custom .wp-block-button__link")
        .text(customButtonText);

      setTimeout(function () {
        customButtonLock = false;
      }, 1000);

      popularPlanDiv.addClass("fixed");
      popularPlanDiv.css("top", top);
      popularPlanDiv.css("left", left);

      setTimeout(function () {
        popularPlanDiv.addClass("set");
      }, 10);

      $(".pricing").addClass("hidden").removeClass("appear");
      $(".add-features").removeClass("hide");

      if ($(window).width() < 768) {
        var scrollAmount = $("body").hasClass("admin-bar") ? 412 : 336;
        $(window).scrollTop(scrollAmount);
      }
      $(".popular .price-table-title").text(customPlanHeading[lang][1]);

      $(".faq").addClass("narrow");
    });

    $(".back").on("click", function () {
      if (customButtonLock) return;
      customButtonLock = true;

      isCustomPlan = false;

      window.history.pushState("", "", pageURL);

      var customButtonText = isCustomPlan
          ? actionButtonText[lang][1]
          : actionButtonText[lang][0],
        popularPlanDiv = $(".popular");

      popularPlanDiv
        .find(".action-button-custom .wp-block-button__link")
        .text(customButtonText);

      setTimeout(function () {
        customButtonLock = false;
      }, 1000);

      popularPlanDiv.removeClass("fixed set");
      popularPlanDiv.attr("style", "");

      $(".pricing").removeClass("hidden").addClass("appear");
      $(".add-features").addClass("hide");

      $(".popular .price-table-title").text(customPlanHeading[lang][0]);
      $(".faq").removeClass("narrow");
      $(".feature-popup-all img").trigger("click");
    });

    $(".dropdown-toggle").on("click", function () {
      $(this).closest(".dropdown").find(".dropdown-menu").toggleClass("active");
    });


    $(".pricing-table-options li:not(.no-popup)").hover(
      function () {
        if ($(window).width() < 768) return;

        var index = $(this).index(),
          transform = $(this).position().top - $(this).parent().position().top;

        if ($(this).closest(".wp-block-column").hasClass("popular")) {
          index = index - 1;
        }
        if (index < 0) return;
        $(this)
          .closest(".wp-block-column")
          .find(".list-popup")
          .eq(index)
          .addClass("active")
          .css("transform", "translateY(" + transform + "px)");

        $(".list-popup img").attr("src", $(".list-popup img").attr("data-src"));
      },
      function () {
        if ($(window).width() < 768) return;
        var index = $(this).index();
        if ($(this).closest(".wp-block-column").hasClass("popular")) {
          index = index - 1;
        }
        if (index < 0) return;
        $(this)
          .closest(".wp-block-column")
          .find(".list-popup")
          .eq(index)
          .removeClass("active")
          .css("transform", "translateX(99999px)");
      }
    );

    $(".list-popup").hover(
      function () {
        if ($(window).width() < 768) return;

        $(this).addClass("active");
      },
      function () {
        if ($(window).width() < 768) return;

        $(this).removeClass("active").css("transform", "translateX(99999px)");
      }
    );

    $(".list-popup img").on("click", function () {
      $(".list-popup")
        .removeClass("active")
        .css("transform", "translateX(99999px)");
    });

    $(".info").on("click", function () {
      $(".basic-popup").addClass("active");
    });

    $(".info").hover(
      function () {
        $(".basic-popup").addClass("active");
        $(".basic-popup img").attr(
          "src",
          $(".basic-popup img").attr("data-src")
        );
      },
      function () {
        $(".basic-popup").removeClass("active");
      }
    );

    $(".basic-popup img").on("click", function () {
      $(".basic-popup").removeClass("active");
    });

    $(".feature-popup img, .feature-popup .wp-block-button").on(
      "click",
      function () {
        $(this).closest(".feature-popup").removeClass("active");
      }
    );

    $(".feature-popup-single .feature-amount input").on(
      "change keyup",
      function (e) {
        var $this = $(this),
          dataFeature = $this
            .closest(".wp-block-column")
            .attr("class")
            .split(" ")[1],
          feature = dataFeature.substr(dataFeature.indexOf("-") + 1),
          value = Number($this.val());

        if (e.keyCode === 13) {
          $this
            .closest(".feature-popup")
            .find(".wp-block-button")
            .trigger("click");
        }

        if (isNaN(value) || value < 0) {
          value = 0;
        } else if (value > amount.basic.value) {
          value = amount.basic.value;
        }

        $this.val(value);
        amount[feature]["value"] = value;
        amount[feature]["customized"] = value != amount.basic.value;
        showPrice();
      }
    );

    $(".feature-popup-all .feature-amount input").on(
      "change keyup",
      function (e) {
        var $this = $(this),
          value = Number($this.val());

        if (e.keyCode === 13) {
          $this
            .closest(".feature-popup")
            .find(".wp-block-button")
            .trigger("click");
        }

        if (isNaN(value) || value < 0) {
          value = 0;
        } else if (value > amount.basic.value) {
          value = amount.basic.value;
        }

        $this.val(value);
        amount[currentEditingFeature]["value"] = value;
        amount[currentEditingFeature]["customized"] = true;
        $(
          ".wp-block-column.feature-" +
            currentEditingFeature +
            " .feature-amount input"
        ).val(amount[currentEditingFeature]["value"]);
        showPrice();
      }
    );

    $(".property-amount .plus").on("click", function () {
      var input = $(this).closest(".property-amount").find("input"),
        inputValue = Number(input.val()) + 1;

      $(".property-amount input").val(inputValue);

      input.trigger("change");
    });

    $(".property-amount .miinus").on("click", function () {
      var input = $(this).closest(".property-amount").find("input"),
        min = input.attr("min"),
        inputValue =
          isNaN(input.val()) || Number(input.val()) <= min
            ? min
            : Number(input.val()) - 1;

      $(".property-amount input").val(inputValue);
      input.trigger("change");


    });

    $(".feature-amount .plus").on("click", function () {
      var input = $(this).closest(".feature-amount").find("input"),
        inputValue = Number(input.val()) + 1;

      input.val(inputValue).trigger("change");
    });

    $(".feature-amount .miinus").on("click", function () {
      var input = $(this).closest(".feature-amount").find("input"),
        min = input.attr("min"),
        inputValue =
          isNaN(input.val()) || Number(input.val()) <= min
            ? min
            : Number(input.val()) - 1;

      input.val(inputValue).trigger("change");
    });

    $("body").on("click", function (e) {
      if (
        !(
          $(e.target).hasClass("dropdown") ||
          $(e.target).closest(".dropdown").length
        )
      ) {
        $(".dropdown-menu").removeClass("active");
      }
      if (
        !($(e.target).hasClass("popup") || $(e.target).closest(".popup").length)
      ) {
        $(".popup").removeClass("active");
      }
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
      //window.location.replace( redirectUrl )
    }

    var defaultLang = "en",
      esCountry = [
        "ES", // Spain
        // 'BR', // Brazil
        "MX", // Mexico
        "CO", // Colombia
        "AR", // Argentina
        "PE", // Peru
        "VE", // Venezuela
        "CL", // Chile
        "GT", // Guatemala
        "EC", // Ecuador
        "BO", // Bolivia
        "HT", // Haiti
        "CU", // Cuba
        "DO", // Dominican Republic
        "HN", // Honduras
        "PY", // Paraguay
        "NI", // Nicaragua
        "SV", // El Salvador
        "CR", // Costa Rica
        "PA", // Panama
        "UY", // Uruguay
        "JM", // Jamaica
        "TT", // Trinidad and Tobago
        "GY", // Guyana
        "SR", // Suriname
        "BZ", // Belize
        "BS", // Bahamas
        "BB", // Barbados
        "LC", // Saint Lucia
        "GD", // Grenada
        "VC", // St. Vincent & Grenadines
        "AG", // Antigua and Barbuda
        "DO", // Dominica
        "KN", // Saint Kitts & Nevis
      ];

    function setLang(country, redirect = false) {
      if (country) {
        if (esCountry.includes(country)) {
          defaultLang = "es";
        } else if (country == "PT" || country == "BR") {
          defaultLang = "pt";
        } else if (country == "IT") {
          defaultLang = "it";
        } else {
          defaultLang = "en";
        }
      } else {
        defaultLang = "en";
      }

      if (redirect) {
        langRedirect(defaultLang);
      }

      if (country) {
        if (country == "ES" || country == "IT" || country == "PT") {
          loc = "eur";
        } else if (country == "GB") {
          loc = "gb";
        } else if (country == "US") {
          loc = "usa";
        } else {
          loc = "other";
        }
      } else {
        loc = "other";
      }
      init();
    }

    if (!getCookie("country")) {
      $.ajax({
        url: "https://ip-api.io/json?api_key=c19e62e0-73d6-45ab-9102-bcd186626e83", //https://ip-api.io/json?api_key=c19e62e0-73d6-45ab-9102-bcd186626e84
        type: "GET",
        dataType: "json",
        // dataType : 'jsonp',
        success: function (response) {
          // var country = response.country
          var country = response.country_code;

          if (country) {
            setCookie("country", country, 30);
          } else {
            country = "";
          }
          setLang(country, true);
        },
        error: function (error) {
          var loc = "other";
          init();
        },
      });
    } else {
      setLang(getCookie("country"));
    }

    jQuery(".property-amount input").trigger("change");
  });
})(jQuery);
