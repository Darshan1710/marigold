/**
 * Custom JS
 */

'use strict';


/*** Preloader ***/

var preloader = (function() {

    // Variables
    var $window = $(window);
    var loader = $("#loader-wrapper");

    // Methods
    $window.on({
        'load': function() {

            loader.fadeOut();

        }
    });

    // Events

})();


/*** Button to top page ***/

var toTopButton = (function() {

    // Variables
    var topButton = $('#back-to-top');
    var scrollTop = $(window).scrollTop();
    var isActive = false;
    if (scrollTop > 100) {
        isActive = true;
    }

    // Methods  

    // Events
    $(window).scroll(function() {
        scrollTop = $(window).scrollTop();

        if (scrollTop > 100 && !isActive) {
            isActive = true;
            topButton.fadeIn();
        } else if (scrollTop <= 100 && isActive) {
            isActive = false;
            topButton.fadeOut();
        }

    });

})();


var parallax = (function() {

    // Variables
    var elem = $(".section_welcome");
    var elemHeight = elem.height();
    var parallaxRate = 2;

    // Methods
    $(window).scroll(function() {

        var scrollTop = $(window).scrollTop(),
            elementOffsetTop = scrollTop,
            parallaxOffset = elementOffsetTop / parallaxRate;
        
        if (elementOffsetTop <= elemHeight) {
            $(".welcome-parallax_bg").css({
                "-webkit-transform": "translateY(" + parallaxOffset + "px)",
                        "transform": "translateY(" + parallaxOffset + "px)"
            });
        }

    });

    // Events

})();


/*** Smooth scroll to anchor ***/

var smoothScroll = (function() {

    // Variables
    var link = $('a[href^="#section_"]');
    var duration = 1000;

    // Methods
    function scrollTo(link) {
        var target = $(link.attr('href'));
        var navbar = $('.navbar');
        var navbarHeight = navbar.outerHeight();

        if ( target.length ) {
            $('html, body').animate({
                scrollTop: target.offset().top - navbarHeight + 50
            }, duration);
        }
    }

    // Events
    link.on('click', function(e) {
        e.preventDefault();
        scrollTo( $(this) );
    });

})();


$('.birthdate').datepicker({
    format: 'dd-mm-yyyy',
    autoclose:true
});

$('.anniversary_date').datepicker({
    format: 'dd-mm-yyyy',
    autoclose:true
});

$(document).on("click",'.birthdate',function(){
    $('.birthdate').datepicker({
        format: 'dd-mm-yyyy',
        autoclose:true
    });
});

$(document).on("click",'.birthdate',function(){
    $('.anniversary_date').datepicker({
        format: 'dd-mm-yyyy',
        autoclose:true
    });
});

$('#customerForm').on('submit',function(e){
        e.preventDefault();
        var base_url = $('#base_url').val();
        var formData = new FormData($(this)[0]);

         $.ajax({
                type: "POST",
                url: base_url+'Admin/customerRegistration',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data, textStatus, jqXHR) {
                   var obj = $.parseJSON(data);

                   if(obj.errCode == -1){
                           
                            $('#family_registration').modal('show'); 
                          // window.location.href = base_url+'Admin/feedback';
                   }else{
                       $('.error').remove();
                      
                       $.each(obj.message, function(key, value) {
                            var element = $('#'+key);
                            element.after(value);
                        });
                   } 
                },
                error: function(data, textStatus, jqXHR) {
                   console.log(textStatus);
                },
        });
    });

// $(document).ready(function(){
//     $('#family_registration').modal('show'); 
// });

$('.add_more').click(function(){
    var count = $('#count').val();
    var count = ++count;
    var html_input = '<div class="form-row mb-3">'+
                        '<div class="col-md-2 form-group">'+
                            '<input type="text" name="name_'+count+'" id="name_'+count+'" placeholder="Your username" class="form-control mb-2 mr-sm-2 ml-sm-2 mb-sm-0">'+
                        '</div>'+

                        '<div class="col-md-2 form-group">'+
                            '<input type="text" name="mobile_'+count+'" id="mobile_'+count+'" placeholder="Your mobile" class="form-control mb-2 mr-sm-2 ml-sm-2 mb-sm-0" minlength="10" maxlength="10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">'+
                        '</div>'+

                        '<div class="col-md-2 form-group">'+
                            '<input type="email" name="email_'+count+'" id="email_'+count+'" placeholder="Your email" class="form-control mb-2 mr-sm-2 ml-sm-2 mb-sm-0">'+
                        '</div>'+

                        '<div class="col-md-2 form-group">'+
                            '<input type="text" name="birthdate_'+count+'" id="birthdate_'+count+'" placeholder="Your birthdate" class="birthdate form-control mb-2 mr-sm-2 ml-sm-2 mb-sm-0" readonly>'+
                        '</div>'+

                        '<div class="col-md-2 form-group">'+
                            '<input type="text" name="anniversary_date_'+count+'" id="anniversary_date_'+count+'" placeholder="Your anniversary date" class="anniversary_date form-control mb-2 mr-sm-2 ml-sm-2 mb-sm-0" readonly>'+
                        '</div>'+
                        
                        '<div class="col-md-2 form-group">'+
                            '<button type="button" class="btn bg-danger ml-sm-2 mb-sm-0 remove"><i class="icon-plus22"></i>Remove</button>'+
                        '</div>'+  
                        
                    '</div>';

    $('#count').val(count);
    $(html_input).insertAfter("div.form-row:last");
    //$(".add_more:last").css('display','none');
});

$(document).on('click','.remove',function(){
    $(this).parent("div").parent('div').remove();   
});



$('#family_registration_form').on('submit',function(e){
        e.preventDefault();
        var base_url = $('#base_url').val();
        var formData = new FormData($(this)[0]);

         $.ajax({
                type: "POST",
                url: base_url+'Admin/familyRegistration',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data, textStatus, jqXHR) {
                   var obj = $.parseJSON(data);
                   if(obj.errCode == -1){
                           
                           window.location.href = base_url+'Admin/feedback'
                   }else if(obj.errCode == 2){
                        $('.error').remove();
                       $.each(obj.message, function(key, value) {
                            var element = $('#'+key);
                            element.closest('.form-control').after(value);
                        });
                   } 
                },
                error: function(data, textStatus, jqXHR) {
                   console.log(textStatus);
                },
        });
});

$('#form_sendemail').on('submit',function(e){
        e.preventDefault();
        var base_url = $('#base_url').val();
        var formData = new FormData($(this)[0]);
        console.log(base_url);
         $.ajax({
                type: "POST",
                url: base_url+'Admin/addRating',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data, textStatus, jqXHR) {
                   var obj = $.parseJSON(data);
                   if(obj.errCode == -1){
                           
                           window.location.href = base_url+'Admin/thankYou'
                   }else if(obj.errCode == 2){
                        $('.error').remove();
                       $.each(obj.message, function(key, value) {
                            var element = $('#'+key);
                            element.closest('.form-control').after(value);
                        });
                   } 
                },
                error: function(data, textStatus, jqXHR) {
                   console.log(textStatus);
                },
        });
});

 $(document).ajaxStart(function(){
    $('.loader').show()
});

$(document).ajaxComplete(function(){
    $('.loader').hide();
});