(function($){

  'use strict'

  $(document).ready(function(){


    // Initial Value

    var defaultAmount = 4,
      type = 'vacation_rental',
      loc = 'eur',
      period = 'yearly',
      plan = 'basic',
      isCustomPlan = false,
      customButtonLock = false,
      currentEditingFeature,

    // Pricing Data

    price = {
      breakpoint : {
        vacation_rental: [ 0, 5, 20, 50, 100, 200 ],
        hotel: [ 0, 10, 20, 50, 100, 200 ]
      },
      unit: {
        en: {
          property: [ 'property', 'properties' ],
          room: [ 'room', 'rooms' ] 
        },
        es: {
          property: [ 'propiedad', 'propiedades' ],
          room: [ 'habitación', 'habitaciones' ]  
        }
      },
      eur : {
        vacation_rental: {
          monthly: {
            basic: [ 3, 2.7, 2.4, 2.1, 1.8, 1.5 ],
            self_checkin: [ 10, 9, 8, 7, 6, 5 ],
            payments: [ 0, 0, 0, 0, 0, 0 ],
            tourist_taxes: [ 3, 2.7, 2.4, 2.1, 1.8, 1.5 ],
            deposits: [ 2, 1.8, 1.6, 1.4, 1.2, 1 ]

          },
          yearly: {
            basic: [ 28.8, 25.92, 23.04, 20.16, 17.28, 14.4 ],
            self_checkin: [ 96, 86.4, 76.8, 67.2, 57.6, 48 ],
            payments: [ 0, 0, 0, 0, 0, 0 ],
            tourist_taxes: [ 28.8, 25.92, 23.04, 20.16, 17.28, 14.4 ],
            deposits: [ 19.2, 17.28, 15.36, 13.44, 11.52, 9.6 ]
          }
        },
        currency: '€'
      },
      usa : {
        vacation_rental: {
          monthly: {
            basic: [ 6, 5.4, 4.8, 4.2, 3.6, 3 ],
            self_checkin: [ 12, 10.8, 9.6, 8.4, 7.2, 6 ],
            payments: [ 0, 0, 0, 0, 0, 0 ],
            tourist_taxes: [ 3, 2.7, 2.4, 2.1, 1.8, 1.5 ],
            deposits: [ 2, 1.8, 1.6, 1.4, 1.2, 1 ]
          },
          yearly: {
            basic: [ 57.6, 51.84, 46.08, 40.32, 34.56, 28.8 ],
            self_checkin: [ 115.2, 103.68, 92.16, 80.64, 69.12, 57.6 ],
            payments: [ 0, 0, 0, 0, 0, 0 ],
            tourist_taxes: [ 28.8, 25.92, 23.04, 20.16, 17.28, 14.4 ],
            deposits: [ 19.2, 17.28, 15.36, 13.44, 11.52, 9.6 ]
          }
        },
        hotel: {
          monthly: {
            basic: [ 1.9, 1.71, 1.52, 1.33, 1.14, 0.95 ],
            self_checkin: [ 6, 5.4, 4.8, 4.2, 3.6, 3 ],
            payments: [ 0, 0, 0, 0, 0, 0 ],
            tourist_taxes: [ 1.5, 1.35, 1.2, 1.05, 0.9, 0.75 ],
            deposits: [ 1, 0.9, 0.8, 0.7, 0.6, 0.5 ]
          },
          yearly: {
            basic: [ 18.24, 16.42, 14.59, 12.77, 10.94, 9.12 ],
            self_checkin: [ 57.6, 51.84, 46.08, 40.32, 34.56, 28.8 ],
            payments: [ 0, 0, 0, 0, 0, 0 ],
            tourist_taxes: [ 14.4, 12.96, 11.52, 10.08, 8.64, 7.2 ],
            deposits: [ 9.6, 8.64, 7.68, 6.72, 5.76, 4.8 ]
          }
        },
        currency: '$'
      },
      gb : {
        vacation_rental: {
          monthly: {
            basic: [ 5, 4.5, 4, 3.5, 3, 2.5 ],
            self_checkin: [ 10, 9, 8, 7, 6, 5 ],
            payments: [ 0, 0, 0, 0, 0, 0 ],
            tourist_taxes: [ 3, 2.7, 2.4, 2.1, 1.8, 1.5 ],
            deposits: [ 2, 1.8, 1.6, 1.4, 1.2, 1 ]
          },
          yearly: {
            basic: [ 48, 43.2, 38.4, 33.6, 28.8, 24 ],
            self_checkin: [ 96, 86.4, 76.8, 67.2, 57.6, 48 ],
            payments: [ 0, 0, 0, 0, 0, 0 ],
            tourist_taxes: [ 28.8, 25.92, 23.04, 20.16, 17.28, 14.4 ],
            deposits: [ 19.2, 17.28, 15.36, 13.44, 11.52, 9.6 ]
          }
        },
        hotel: {
          monthly: {
            basic: [ 1.5, 1.35, 1.2, 1.05, 0.9, 0.75 ],
            self_checkin: [ 5, 4.5, 4, 3.5, 3, 2.5 ],
            payments: [ 0, 0, 0, 0, 0, 0 ],
            tourist_taxes: [ 1.5, 1.35, 1.2, 1.05, 0.9, 0.75 ],
            deposits: [ 1, 0.9, 0.8, 0.7, 0.6, 0.5 ]
          },
          yearly: {
            basic: [ 14.4, 12.96, 11.52, 10.08, 8.64, 7.2 ],
            self_checkin: [ 48, 43.2, 38.4, 33.6, 28.8, 24 ],
            payments: [ 0, 0, 0, 0, 0, 0 ],
            tourist_taxes: [ 14.4, 12.96, 11.52, 10.08, 8.64, 7.2 ],
            deposits: [ 9.6, 8.64, 7.68, 6.72, 5.76, 4.8 ]
          }
        },
        currency: '£'
      },
      other : {
        vacation_rental: {
          monthly: {
            basic: [ 5, 4.5, 4, 3.5, 3, 2.5 ],
            self_checkin: [ 10, 9, 8, 7, 6, 5 ],
            payments: [ 0, 0, 0, 0, 0, 0 ],
            tourist_taxes: [ 3, 2.7, 2.4, 2.1, 1.8, 1.5 ],
            deposits: [ 2, 1.8, 1.6, 1.4, 1.2, 1 ]

          },
          yearly: {
            basic: [ 48, 43.2, 38.4, 33.6, 28.8, 24 ],
            self_checkin: [ 96, 86.4, 76.8, 67.2, 57.6, 48 ],
            payments: [ 0, 0, 0, 0, 0, 0 ],
            tourist_taxes: [ 28.8, 25.92, 23.04, 20.16, 17.28, 14.4 ],
            deposits: [ 19.2, 17.28, 15.36, 13.44, 11.52, 9.6 ]
          }
        },
        hotel: {
          monthly: {
            basic: [ 1.5, 1.35, 1.2, 1.05, 0.9, 0.75 ],
            self_checkin: [ 5, 4.5, 4, 3.5, 3, 2.5 ],
            payments: [ 0, 0, 0, 0, 0, 0 ],
            tourist_taxes: [ 1.5, 1.35, 1.2, 1.05, 0.9, 0.75 ],
            deposits: [ 1, 0.9, 0.8, 0.7, 0.6, 0.5 ]
          },
          yearly: {
            basic: [ 14.4, 12.96, 11.52, 10.08, 8.64, 7.2 ],
            self_checkin: [ 48, 43.2, 38.4, 33.6, 28.8, 24 ],
            payments: [ 0, 0, 0, 0, 0, 0 ],
            tourist_taxes: [ 14.4, 12.96, 11.52, 10.08, 8.64, 7.2 ],
            deposits: [ 9.6, 8.64, 7.68, 6.72, 5.76, 4.8 ]
          }
        },
        currency: '€'
      },
      amount: { basic: 0, self_checkin: 0, payments: 0, tourist_taxes: 0, deposits: 0, custom: 0 }
    },
    amount = {
      basic: { value: defaultAmount, customized: false, enable: true, free: false },
      self_checkin: { value: defaultAmount, customized: false, enable: true, free: false },
      payments: { value: defaultAmount, customized: false, enable: false, free: true },
      tourist_taxes: { value: defaultAmount, customized: false, enable: false, free: false },
      deposits: { value: defaultAmount, customized: false, enable: false, free: false }
    },
    lang = $('html').attr('lang') == 'es-ES' ? 'es' : 'en',
    actionButtonText = {
      en: [ 'Build Your Plan', 'Get Started' ],
      es: [ 'Diseña tu plan', 'Empezar' ]
    },
    customPlanHeading = {
      en: [ 'Custom', 'Custom Your Plan' ],
      es: [ 'Personalizado', 'Personaliza tu plan' ]
    },
    AddButtonText = {
      en: [ 'Add', 'Added!' ],
      es: [ 'Añadir', 'Añadido' ]  
    }

    // Calculate Price
      
    function getPrice(info){

      var estimatedPrice = 0,
        index = 0,
        priceRate,
        remainingAmount = info.amount,
        previousRemainingAmount = info.amount
      
      while( true ){

        remainingAmount = info.amount - price.breakpoint[info.type][index+1]
        priceRate = price[info.loc][info.type][info.period][info.plan][index]

        if ( isNaN(remainingAmount) || remainingAmount < 0 ) {
          estimatedPrice += previousRemainingAmount * priceRate
          break
        }else{
          estimatedPrice += ( price.breakpoint[info.type][index+1] - price.breakpoint[info.type][index] ) * priceRate
        }

        previousRemainingAmount = remainingAmount
        index++
      }

      return estimatedPrice
    }

    function isYearly(price) { return period == 'yearly' ? price/12 : price }
    function addComma(price) { return price.toString().replace('.', ',') }

    // Show Price Output

    function showPrice() {

      var featurePrice,
        featurePriceReal,
        propertyType = type,
        unitType, unit,
        consideredLocation = loc,
        yearlySaving = '00',
        monthlyTotal = 0

      if( type == 'camping' ) { propertyType = 'hotel' }
      if( type == 'villa' ) { propertyType = 'vacation_rental' }

      if( propertyType == 'hotel' ) {

      	var minAmount = 10

      	Object.keys(amount).forEach(function(feature){
      		if( amount[feature]['value'] < minAmount ) {
      			amount[feature]['value'] = minAmount

      			if( feature == 'basic' ) {
      				$('.property-amount input').val(minAmount)
      			}else{
      				$('.feature-popup-all .feature-amount input, .feature-' + feature + ' .feature-amount input').val(minAmount)
      			}
      		}

      	})
      }

      if( type != 'vacation_rental' && type != 'villa' && loc == 'eur' ) { consideredLocation = 'other' }

      price.amount.basic = getPrice( { amount : amount.basic.value, type: propertyType, loc: consideredLocation, period, plan: 'basic' } )
      price.amount.custom = 0

      Object.keys(amount).forEach(function(feature){

        price.amount[feature] = getPrice( { amount : amount[feature]['value'], type: propertyType, loc: consideredLocation, period, plan: feature } )
        featurePrice = amount[feature]['enable'] ? price.amount[feature] : 0
        featurePriceReal = amount[feature]['value'] == 0 ? price.amount[feature] : price.amount[feature]/amount[feature]['value']
        price.amount.custom += featurePrice

        monthlyTotal += amount[feature]['enable'] ? getPrice( { amount : amount[feature]['value'], type: propertyType, loc: consideredLocation, period: 'monthly', plan: feature } ) : 0

        $('[data-feature=feature-' + feature + '] .price').text( addComma( Math.round( isYearly(featurePrice) * 100) / 100 ) )
        $('.feature-' + feature + ' .price:not(.beta-price)').text( addComma( Math.round( isYearly(featurePriceReal) * 100) / 100 ) )
        $('[data-feature=feature-' + feature + '] .feature-amount').text( amount[feature]['value'] )
		  
		    if( ! amount[feature]['customized'] ) {
          amount[feature]['value'] = amount.basic.value
          $('.wp-block-column.feature-' + feature + ' .feature-amount input').val(amount.basic.value)
        }
      })
      // price.amount.self_checkin = getPrice( { amount : amount[feature]['value'], type: propertyType, loc: consideredLocation, period, plan: amount[feature]['value'] } )

      // selfCheckinPrice = amount.self_checkin.enable ? price.amount.self_checkin : 0
      // price.amount.custom = price.amount.basic + selfCheckinPrice

      $('.price-basic').text( addComma( Math.round( isYearly(price.amount.basic) * 100) / 100 ) )
      $('.price-basic-per').text( addComma( Math.round( isYearly(price.amount.basic/amount.basic.value) * 100) / 100 ) )
      $('.price-custom').text( addComma( Math.round( isYearly(price.amount.custom) * 100) / 100 ) )
      $('.price-custom-per').text( addComma( Math.round( isYearly(price.amount.custom/amount.basic.value) * 100) / 100 ) )

      if( period == 'yearly' ) { yearlySaving = addComma( Math.round( ( monthlyTotal - isYearly(price.amount.custom) ) * 100) * 12 / 100 ) }
      $('.saving-amount').text( yearlySaving )


      // $('.feature-' + feature + ':not(.customized) .price, [data-feature=feature-' + feature + ']:not(.customized) .price').text( Math.round( isYearly(price.amount[feature]) * 100) / 100  )

      unitType = ( type == 'hotel' || type == 'camping' ) ? 'room' : 'property'
      unit = amount.basic.value < 2 ? price['unit'][lang][unitType][0] : price['unit'][lang][unitType][1]

      $('.unit.singular').text(price['unit'][lang][unitType][0])
      $('.unit.plural').text(price['unit'][lang][unitType][1])
      $('.unit.both').text(unit)
      $('.currency').text( price[consideredLocation]['currency'] )
      $('.amount').text(amount.basic.value)
    }

    function init() {
     	showPrice()
    }


    // Price Inputs

    $('.dropdown-menu li a').on('click', function(e){

      e.preventDefault()

      var $this = $(this)
      
      type = $this.attr('data-value')

      $('.dropdown-toggle').text($this.text())
      $('.dropdown-menu, .dropdown-menu li').removeClass('active')
      $('.dropdown-menu li a[data-value=' + type + ']').parent().addClass('active')

      showPrice()
    })

    function toggleFeature(feature){

      amount[feature]['enable'] = !amount[feature]['enable']
      amount[feature]['value'] = amount['basic']['value']
	    amount[feature]['customized'] = false
      showPrice()
    }

    $('[data-feature]').on('click', function(e){

      var $this = $(this),
        dataFeature = $this.attr('data-feature'),
        feature = dataFeature.substr( dataFeature.indexOf('-') + 1 ),
        eventTarget = $(e.target)


      if( eventTarget.hasClass('edit') || eventTarget.closest('.edit').length ) {

        // if( !amount[feature]['free'] && amount[feature]['enable'] ) {
            // $this.closest('.popular').find('.feature-popup-all').addClass('active')
            // $('.popup-feature-text').text($this.find('.text').text())
            // $('.feature-popup-all .feature-amount input').val(amount[feature]['value'])
            // currentEditingFeature = feature
        // }

        return
      }

      if( isCustomPlan ){
        
        if( $(e.target).hasClass('fas') ) { toggleFeature(feature) }
        return
      }
      toggleFeature(feature)
    })

    $('.property-amount input').on('change keyup', function(){

      var value = $(this).val()

      amount.basic.value = isNaN(value) || ( Number(value) < 1 ) ? 1 : value
      $('.property-amount input').val( value === '0' ? 1 : value )
      // $('.amount').text(amount.basic.value)

      Object.keys(amount).forEach(function(feature){
        if( parseInt(amount[feature]['value']) > parseInt(amount.basic.value) ) {
          amount[feature]['customized'] = false
        }
        if( ! amount[feature]['customized'] || parseInt(amount[feature]['value']) > parseInt(amount.basic.value) ) {
          amount[feature]['value'] = amount.basic.value
          $('.wp-block-column.feature-' + feature + ' .feature-amount input').val(amount.basic.value)
        }
      })

      showPrice()
    })

    $('.property-period').on('click', function(){

      $('.property-period, .period-text, .yearly-saving').toggleClass('active')
      period = period == 'monthly' ? 'yearly' : 'monthly'
      
      showPrice()
    })


    // DOM Manipulation

    $('.editable').on('click', function(e){

      var $this = $(this),
        dataFeature = $this.attr('data-feature'),
        feature = dataFeature.split('-')[1],
        featureButton = $( '.' + dataFeature + ' .add-button' ),
        featureButtonLink = featureButton.find('.wp-block-button__link'),
        featureButtonText,
        eventTarget = $(e.target),
        container = $this.closest('.pricing-table').hasClass('pc') ? 'mobile' : 'pc',
        duplicateFeature = $('.pricing-table.' + container ).find('[data-feature=' + dataFeature + ']')


      if( eventTarget.hasClass('edit') || eventTarget.closest('.edit').length ) {

        if( !amount[feature]['free'] && amount[feature]['enable'] ) {
			
            $this.closest('.popular').find('.feature-popup-all').addClass('active')
            $('.popup-feature-text').text($this.find('.text').text())
            $('.feature-popup-all .feature-amount input').val(amount[feature]['value'])
            currentEditingFeature = feature
        }

        return
    }

      if( isCustomPlan ){
        if( eventTarget.hasClass('fas') ) {
			
          $this.removeClass('active')
          duplicateFeature.removeClass('active')
          featureButton.removeClass('feature-item-link')
          featureButtonLink.text(AddButtonText[lang][0])

        if( currentEditingFeature && currentEditingFeature == feature ) {
          $this.closest('.popular').find('.feature-popup-all').removeClass('active') 
        }
        }

       //  if( eventTarget.hasClass('edit') || eventTarget.closest('.edit').length || eventTarget.hasClass('text') ) {

       //    if( ! amount[feature]['free'] ) {
        //     $this.closest('.popular').find('.feature-popup-all').addClass('active')
        //     $('.popup-feature-text').text($this.find('.text').text())
        //     $('.feature-popup-all .feature-amount input').val(amount[feature]['value'])
        //     currentEditingFeature = feature
        // }
       //  }
        return
      }

      $this.toggleClass('active')
      duplicateFeature.toggleClass('active')

      featureButton.toggleClass('feature-item-link')
      featureButtonText = featureButtonLink.text() == AddButtonText[lang][0] ? AddButtonText[lang][1] : AddButtonText[lang][0]
      featureButtonLink.text(featureButtonText)

      
    })


    $('.add-button').on('click', function(){

      var $this = $(this),
        featureBlock = $this.closest('.wp-block-column'),
        dataFeature = featureBlock.attr('class').split(' ')[1],
        feature = dataFeature.substr( dataFeature.indexOf('-') + 1 )

      if( $this.hasClass('feature-item-link') ) return

      if( amount[feature]['free'] ) {
        featureBlock.find('.feature-popup-single .wp-block-button').trigger('click')
      } else {
        featureBlock.find('.feature-popup-single').addClass('active')
      }

      
    })

    $('.feature-popup-single .wp-block-button').on('click', function(){

      var $this = $(this),
        dataFeature = $this.closest('.wp-block-column').attr('class').split(' ')[1],
        featureButton = $this.closest('.wp-block-column').find('.add-button'),
        popup = $this.closest('.feature-popup-single'),
        feature = dataFeature.substr( dataFeature.indexOf('-') + 1 ),
        val = $this.closest('.wp-block-column').find('.feature-amount input').val()

      featureButton.addClass('feature-item-link')
      featureButton.find('.wp-block-button__link').text(AddButtonText[lang][1])
      $('[data-feature=' + dataFeature + ']').addClass('active')
      toggleFeature(feature)

      amount[feature]['value'] = val ? val : 0
      amount[feature]['customized'] = val != amount.basic.value
      showPrice()
    })

    $('.editable').append('<i class="fas fa-times"></i>')

    $('.action-button-custom .wp-block-button__link').on('click', function(e){

      if( ! $(this).closest('.wp-block-column.popular').hasClass('fixed') ){
        e.preventDefault()
      }

      if( customButtonLock ) return
      customButtonLock = true

      isCustomPlan = true

      var customButtonText = isCustomPlan ? actionButtonText[lang][1] : actionButtonText[lang][0],
        popularPlanDiv = $('.popular'),
        top = popularPlanDiv.offset().top - $(window).scrollTop(),
        left = popularPlanDiv.offset().left

      popularPlanDiv.find('.action-button-custom .wp-block-button__link').text( customButtonText )
      
      setTimeout(function(){ customButtonLock = false }, 1000)
  
      popularPlanDiv.addClass('fixed')
      popularPlanDiv.css('top', top )
      popularPlanDiv.css('left', left )

      setTimeout(function(){ popularPlanDiv.addClass('set') }, 10 )

      $('.pricing').addClass('hidden').removeClass('appear')
      $('.add-features').removeClass('hide')

      if( $(window).width() < 768 ) { 
        var scrollAmount = $('body').hasClass('admin-bar') ? 412 : 336
        $(window).scrollTop(scrollAmount)
      }
      $('.popular .price-table-title').text(customPlanHeading[lang][1])

      $('.faq').addClass('narrow')
    })

    $('.back').on('click', function(){

      if( customButtonLock ) return
      customButtonLock = true

      isCustomPlan = false

      var customButtonText = isCustomPlan ? actionButtonText[lang][1] : actionButtonText[lang][0],
        popularPlanDiv = $('.popular')

      popularPlanDiv.find('.action-button-custom .wp-block-button__link').text( customButtonText )
      
      setTimeout(function(){ customButtonLock = false }, 1000)
  
      popularPlanDiv.removeClass('fixed set')
      popularPlanDiv.attr('style', '' )

      $('.pricing').removeClass('hidden').addClass('appear')
      $('.add-features').addClass('hide')

      $('.popular .price-table-title').text(customPlanHeading[lang][0])
      $('.faq').removeClass('narrow')
    $('.feature-popup-all img').trigger('click')
    })

    $('.dropdown-toggle').on('click', function(){
      $(this).closest('.dropdown').find('.dropdown-menu').toggleClass('active')
    })

    // $('.police').on('click', function(){
    //   $('.list-popup').addClass('active')
    // })

  $('.pricing-table-options li').hover(function() {

      if( $(window).width() < 768 ) return

      var index = $(this).index(),
        transform = $(this).position().top - $(this).parent().position().top

      if( $(this).closest('.wp-block-column').hasClass('popular') ) { index = index - 1 }
      if(index < 0) return
      $(this).closest('.wp-block-column').find('.list-popup').eq(index).addClass('active').css('transform', 'translateY(' + transform + 'px)')

      $('.list-popup img').attr('src', $('.list-popup img').attr('data-src'))
  }, function(){

      if( $(window).width() < 768 ) return
      var index = $(this).index()
      if( $(this).closest('.wp-block-column').hasClass('popular') ) { index = index - 1 }
      if(index < 0) return
      $(this).closest('.wp-block-column').find('.list-popup').eq(index).removeClass('active').css('transform', 'translateX(99999px)')
  })

  $('.list-popup').hover(function() {

      if( $(window).width() < 768 ) return

      $(this).addClass('active')

  }, function(){

      if( $(window).width() < 768 ) return
      
      $(this).removeClass('active').css('transform', 'translateX(99999px)')
  })

    $('.list-popup img').on('click', function(){
      $('.list-popup').removeClass('active').css('transform', 'translateX(99999px)')
    })

    $('.info').on('click', function(){
      $('.basic-popup').addClass('active')
    })

    $('.info').hover(function() {
      $('.basic-popup').addClass('active')
      $('.basic-popup img').attr('src', $('.basic-popup img').attr('data-src'))
  }, function(){
      $('.basic-popup').removeClass('active')
  })

    $('.basic-popup img').on('click', function(){
      $('.basic-popup').removeClass('active')
    })

    $('.feature-popup img, .feature-popup .wp-block-button').on('click', function(){
      $(this).closest('.feature-popup').removeClass('active')
    })

    $('.feature-popup-single .feature-amount input').on('change keyup', function(e){

    var $this = $(this),
      dataFeature = $this.closest('.wp-block-column').attr('class').split(' ')[1],
      feature = dataFeature.substr( dataFeature.indexOf('-') + 1 ),
      value = Number($this.val())

    if( e.keyCode === 13 ) { $this.closest('.feature-popup').find('.wp-block-button').trigger('click') }

    if( isNaN(value) || value < 0 ) {
      value = 0
    }else if( value > amount.basic.value ) {
      value = amount.basic.value
    }

    
    $this.val( value )
    amount[feature]['value'] = value
    amount[feature]['customized'] = value != amount.basic.value
    showPrice()
    })

    $('.feature-popup-all .feature-amount input').on('change keyup', function(e){

      var $this = $(this),
        value = Number($this.val())

    if( e.keyCode === 13 ) { $this.closest('.feature-popup').find('.wp-block-button').trigger('click') }

    if( isNaN(value) || value < 0 ) {
      value = 0
    }else if( value > amount.basic.value ) {
      value = amount.basic.value
    }

    	$this.val( value )
        amount[currentEditingFeature]['value']  = value
        amount[currentEditingFeature]['customized'] = true
        $('.wp-block-column.feature-' + currentEditingFeature + ' .feature-amount input').val(amount[currentEditingFeature]['value'])
        showPrice()
    })

    $('.property-amount .plus').on('click', function(){

      var input = $(this).closest('.property-amount').find('input'),
        inputValue = Number(input.val()) + 1

      $('.property-amount input').val( inputValue )
      input.trigger('change')
    })

    $('.property-amount .miinus').on('click', function(){

      var input = $(this).closest('.property-amount').find('input'),
        min = input.attr('min'),
        inputValue = isNaN(input.val()) || ( Number(input.val()) <= min ) ? min : Number(input.val()) - 1

      $('.property-amount input').val( inputValue ) 
      input.trigger('change')
    })
    
  $('.feature-amount .plus').on('click', function(){

      var input = $(this).closest('.feature-amount').find('input'),
        inputValue = Number(input.val()) + 1

      input.val( inputValue ).trigger('change')
    })

    $('.feature-amount .miinus').on('click', function(){

      var input = $(this).closest('.feature-amount').find('input'),
        min = input.attr('min'),
        inputValue = isNaN(input.val()) || ( Number(input.val()) <= min ) ? min : Number(input.val()) - 1

      input.val( inputValue ).trigger('change')
    })

    $('body').on('click', function(e){
      if( ! ( $(e.target).hasClass('dropdown') || $(e.target).closest('.dropdown').length ) ) {
        $('.dropdown-menu').removeClass('active')
      }
      if( ! ( $(e.target).hasClass('popup') || $(e.target).closest('.popup').length ) ) {
        $('.popup').removeClass('active')
      }
    })


    function setCookie( cname, cvalue, exdays ) {
        var d = new Date()
        d.setTime( d.getTime() + (exdays*24*60*60*1000) )
        var expires = "expires="+ d.toUTCString()
        document.cookie = cname + '=' + cvalue + ';' + expires + ';path=/'
    }

    function getCookie( cname ) {
        var dc = document.cookie
        var prefix = cname + '='
        var begin = dc.indexOf('; ' + prefix)
        if (begin == -1) {
            begin = dc.indexOf(prefix)
            if (begin != 0) return null
        }else{
            begin += 2
            var end = document.cookie.indexOf(';', begin)
            if (end == -1) { end = dc.length }
        }
        return decodeURI(dc.substring(begin + prefix.length, end))
    }

    function langRedirect(lang){

        var redirectUrl = $('.lang-' + lang ).text()
        window.location.replace( redirectUrl )
    }

    var defaultLang = 'en',
        esCountry = [
          'ES', // Spain
          'BR', // Brazil
          'MX', // Mexico
          'CO', // Colombia
          'AR', // Argentina
          'PE', // Peru
          'VE', // Venezuela
          'CL', // Chile
          'GT', // Guatemala
          'EC', // Ecuador
          'BO', // Bolivia
          'HT', // Haiti
          'CU', // Cuba
          'DO', // Dominican Republic
          'HN', // Honduras
          'PY', // Paraguay
          'NI', // Nicaragua
          'SV', // El Salvador
          'CR', // Costa Rica
          'PA', // Panama
          'UY', // Uruguay
          'JM', // Jamaica
          'TT', // Trinidad and Tobago
          'GY', // Guyana
          'SR', // Suriname
          'BZ', // Belize
          'BS', // Bahamas
          'BB', // Barbados
          'LC', // Saint Lucia
          'GD', // Grenada
          'VC', // St. Vincent & Grenadines
          'AG', // Antigua and Barbuda
          'DO', // Dominica
          'KN' // Saint Kitts & Nevis
        ];

    function setLang(country, redirect = false){

      	if( country ){
          if( esCountry.includes(country) ){
            defaultLang = 'es'
          }else{
            defaultLang = 'en'
          }
        }else{
          defaultLang = 'en'
        }

        if( redirect ) { langRedirect(defaultLang) }

        if( country ){
          if( country == 'ES' || country == 'IT' || country == 'PT' ){
            loc = 'eur'
          }else if( country == 'GB' ){
            loc = 'gb'
          }else if( country == 'US' ) {
            loc = 'usa'
          }else{
            loc = 'other'
          }
        }else{
          loc = 'other'
        }
        init()
    }

    if ( ! getCookie( 'country' ) ) {
    	
	    $.ajax({
	      // url: 'https://api.db-ip.com/v2/pbfacb14805f44b8c1271d020cf3ba7ee9439538/self/countryCode',
	      url: 'https://ip-api.io/json?api_key=c19e62e0-73d6-45ab-9102-bcd186626e84',
	      type: 'GET',
	      dataType: 'json',
	      // dataType : 'jsonp',
	      success: function(response){

			// var country = response.country
			var country = response.country_code

			if( country ) {
				setCookie( 'country', country, 30 )
			}else{
				country = ''
			}
			setLang( country, true )

	      },
	      error: function(error) {

	        var loc = 'other'
	        init()
	      }
	    })

	} else {
    	setLang( getCookie( 'country' ) )	
    }

  })
}(jQuery))