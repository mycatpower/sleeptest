
(function($) {
  
    $.fn.menumaker = function(options) {  
      
     var cssmenu = $(this), settings = $.extend({
       format: "dropdown",
       sticky: false
     }, options);
     return this.each(function() {
      
       $(".button-sleep").on('click', function(){
          
        
         $(this).toggleClass('menu-opened');
         $('#cssmenu').addClass('cssmenu-o');
         var mainmenu = $(this).next('ul');
         if (mainmenu.hasClass('open')) { 
           
           mainmenu.slideToggle().removeClass('open');
          setTimeout(function() {
              $('#cssmenu').removeClass('cssmenu-o');
          }, 370);
          
         }
         else {
          
           mainmenu.slideToggle().addClass('open');
           if (settings.format === "dropdown") {
             mainmenu.find('ul').show();
           }
         }
       });
       cssmenu.find('li ul').parent().addClass('has-sub');
    multiTg = function() {
         cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
         cssmenu.find('.submenu-button').on('click', function() {
           $(this).toggleClass('submenu-opened');
           if ($(this).siblings('ul').hasClass('open')) {
             $(this).siblings('ul').removeClass('open').slideToggle();
           }
           else {
             $(this).siblings('ul').addClass('open').slideToggle();
           }
         });
       };
       if (settings.format === 'multitoggle') multiTg();
       else cssmenu.addClass('dropdown');
       if (settings.sticky === true) cssmenu.css('position', 'fixed');
    resizeFix = function() {
      var mediasize = 1220;
         if ($( window ).width() > mediasize) {
           cssmenu.find('ul').show();
         }
         if ($(window).width() <= mediasize) {
           cssmenu.find('ul').hide().removeClass('open');
         }
       };
       resizeFix();
       return $(window).on('resize', resizeFix);
     });
      };
    })(jQuery);
    
    (function($){
    $(document).ready(function(){
      if($(window).scrollTop() > 50) {
        $(".header").addClass("sleep-fixed-header");
    }
      $(window).on("scroll", function() {
        if($(window).scrollTop() > 50) {
            $(".header").addClass("sleep-fixed-header");
        } else {
            //remove the background property so it comes transparent again (defined in your css)
           $(".header").removeClass("sleep-fixed-header");
        }
    });
        
        $("#cssmenu").menumaker({
            format: "multitoggle"
        });
       
      });
    })(jQuery);


jQuery(document).ready( function($) {

    $('.sleep-explore').on('click', function(e) {
        e.preventDefault();
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
        // return false;
    });


    jQuery('.woocommerce-product-owl').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });

  $('#accordion').accordion({
      collapsible:true,
      beforeActivate: function(event, ui) {
           // The accordion believes a panel is being opened
          if (ui.newHeader[0]) {
              var currHeader  = ui.newHeader;
              var currContent = currHeader.next('.ui-accordion-content');
           // The accordion believes a panel is being closed
          } else {
              var currHeader  = ui.oldHeader;
              var currContent = currHeader.next('.ui-accordion-content');
          }
           // Since we've changed the default behavior, this detects the actual status
          var isPanelSelected = currHeader.attr('aria-selected') == 'true';
          
           // Toggle the panel's header
          currHeader.toggleClass('ui-corner-all',isPanelSelected).toggleClass('accordion-header-active ui-state-active ui-corner-top',!isPanelSelected).attr('aria-selected',((!isPanelSelected).toString()));
          
          // Toggle the panel's icon
          currHeader.children('.ui-icon').toggleClass('ui-icon-triangle-1-e',isPanelSelected).toggleClass('ui-icon-triangle-1-s',!isPanelSelected);
          
           // Toggle the panel's content
          currContent.toggleClass('accordion-content-active',!isPanelSelected);

          if (isPanelSelected) { currContent.slideUp(); }  else { currContent.slideDown(); }

          return false; // Cancels the default action
      }
  });

    var qty, qtyInput, qtyMinVal, qtyMaxVal;
    var gtySleeptet = function () {

        if ($('.sleeptest_quantity').length == 0) {
            return;
        }
        $('body').on('click', '.sleeptest_qty_minus', function () {
            qty = $(this).closest('.sleeptest_quantity');
            _decrease(qty);
            _updateCart();
        });
        $('body').on('click', '.sleeptest_qty_plus', function () {
            qty = $(this).closest('.sleeptest_quantity');
            _increase(qty);
            _updateCart();
        });
    }

    var _updateCart = function () {
        $("[name='update_cart']").removeAttr('disabled');
        $("[name='update_cart']").trigger("click");
    }

    var _decrease = function (qty) {
        qtyInput = $('input', qty);
        qtyMinVal = qtyInput.attr('min');
        qtyMaxVal = qtyInput.attr('max');
        var qrtCurrent = parseInt(qtyInput.val());
        if (qrtCurrent - 1 >= qtyMinVal) {
            qtyInput.val(qrtCurrent - 1);
        }
    }
    var _increase = function (qty) {
        qtyInput = $('input', qty);
        qtyMinVal = qtyInput.attr('min');
        qtyMaxVal = qtyInput.attr('max');
        var qrtCurrent = parseInt(qtyInput.val());
        qtyInput.val(qrtCurrent + 1);
    }
    gtySleeptet();
});
    
