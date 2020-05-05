/*-----------------------------------------------------------------------------------

  Template Name: Techfocus admin HTML5 Template.
  Template URI: #
  Description: Techfocus is a unique website template designed in HTML with a simple & beautiful look. There is an excellent solution for creating clean, wonderful and trending material design corporate, corporate any other purposes websites.
  Author: Techfocus
  Author URI: https://www.techfocusltd.com
  Version: 1.1

-----------------------------------------------------------------------------------*/

/*-------------------------------
[  Table of contents  ]
---------------------------------
  01. User CRUD
  02. Coupon CRUD
  03. Product filter
  04. Product compare
  05. Quotation
  06. Password reset
  07. Country filter
  08. Size filter
  09. Tag filter
  10. Blog filter
  11. Brand filter
  12. Color filter
  13. Message CRUD
  14. Cart CRUD
  15. Wishlist CRUD
  16. Compare Form
  17. Bid CRUD



/*--------------------------------
[ End table content ]
-----------------------------------*/



// passes csrf token to every ajax http request
// =============
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});




/*-------------------------------------------------------------
01. User CRUD
---------------------------------------------------------------*/


// -- ajax Form update info --

$(function() {

    // Get the form.
    var form = $('#update-client');

    // Set up an event listener for the login form.
    $(form).submit(function(e) {
        // Stop the browser from submitting the form.
        e.preventDefault();

        // Serialize the form data.
        var formData = $(form).serialize();

        // Submit the form using AJAX.
        $.ajax({
            type: 'POST',
            url: $(form).attr('action'),
            data: formData,
            success: function(data){
                // Show success message
                $('#message').modal('show');
                $('.wmessage').css('color', 'green');
                $('.modal-title').css('color', 'green');
                $('.modal-title').text('Congrats!');
                $('.wmessage').text('Account details updated successfully.');
            }
        });
    });
});


// -- ajax Form update password --

$(document).on('click', '#updatePass', function() {
    $.ajax({
        type: 'post',
        url: base_url + '/updatePass',
        data: {
            'oldpassword': $('input[name=oldpassword]').val(),
            'password': $('input[name=password]').val(),
            '_method': 'PUT'
        },
        success: function(data){
            if ((data.errors)) {
                $('.err').remove();
                $('#message').modal('show');
                $('.wmessage').css('color', 'red');
                $('.modal-title').css('color', 'red');
                $('.modal-title').text('Oops!');
                if (typeof data.errors.oldpassword !== 'undefined') {
                    $('.wmessage').append("<li class='err'>" + data.errors.oldpassword + "</li>");
                };
                if (typeof data.errors.password !== 'undefined') {
                    $('.wmessage').append("<li class='err'>" + data.errors.password + "</li>");
                };
                if (typeof data.errors.error !== 'undefined') {
                    $('.wmessage').append("<li class='err'>" + data.errors.error + "</li>");
                };
            } else {
                $('#message').modal('show');
                $('.wmessage').css('color', 'green');
                $('.modal-title').css('color', 'green');
                $('.modal-title').text('Congrats!');
                $('.wmessage').text('Password updated successfully.');

                $('input[name=oldpassword]').val('');
                $('input[name=password]').val('');
            }
        }
    });
});

// -- ajax Form update billing address --

$(function() {

    // Get the form.
    var form = $('#billing-details');

    // Set up an event listener for the login form.
    $(form).submit(function(e) {
        // Stop the browser from submitting the form.
        e.preventDefault();

        // Serialize the form data.
        var formData = $(form).serialize();

        // Submit the form using AJAX.
        $.ajax({
            type: 'POST',
            url: $(form).attr('action'),
            data: formData,
            success: function(data){
                if (data.errors){
                    $('#message').modal('show');
                    $('.wmessage').css('color', 'red');
                    $('.modal-title').css('color', 'red');
                    $('.modal-title').text('Oops!');
                    $.each(data.errors, function (index, value) {
                        $('.wmessage').append("<li>" + value + "</li>");
                    });
                } else {
                    // Show success message
                    $('#message').modal('show');
                    $('.wmessage').css('color', 'green');
                    $('.modal-title').css('color', 'green');
                    $('.modal-title').text('Congrats!');
                    $('.wmessage').text('Billing details updated successfully.');
                    setTimeout(function() {
                        $('#message').modal('hide');
                    }, 4000);
                }
            }
        });
    });
});


// -- ajax Form update shipping address --

$(function() {

    // Get the form.
    var form = $('#shipping-details');

    // Set up an event listener for the login form.
    $(form).submit(function(e) {
        // Stop the browser from submitting the form.
        e.preventDefault();

        // Serialize the form data.
        var formData = $(form).serialize();

        // Submit the form using AJAX.
        $.ajax({
            type: 'POST',
            url: $(form).attr('action'),
            data: formData,
            success: function(data){
                $('.wmessage').html('');
                if (data.errors){
                    $('#message').modal('show');
                    $('.wmessage').css('color', 'red');
                    $('.modal-title').css('color', 'red');
                    $('.modal-title').text('Oops!');
                    $.each(data.errors, function (index, value) {
                        $('.wmessage').append("<li>" + value + "</li>");
                    });
                } else {
                    // Show success message
                    $('#message').modal('show');
                    $('.wmessage').css('color', 'green');
                    $('.modal-title').css('color', 'green');
                    $('.modal-title').text('Congrats!');
                    $('.wmessage').text('Shipping details updated successfully.');
                    setTimeout(function() {
                        $('#message').modal('hide');
                    }, 4000);
                }
            }
        });
    });
});


// -- ajax Form update payment method --

$(function() {

    // Get the form.
    var form = $('#payment-details');

    // Set up an event listener for the login form.
    $(form).submit(function(e) {
        // Stop the browser from submitting the form.
        e.preventDefault();

        // Serialize the form data.
        var formData = $(form).serialize();

        // Submit the form using AJAX.
        $.ajax({
            type: 'POST',
            url: $(form).attr('action'),
            data: formData,
            success: function(data){
                $('.wmessage').html('');
                if (data.errors){
                    $('#message').modal('show');
                    $('.wmessage').css('color', 'red');
                    $('.modal-title').css('color', 'red');
                    $('.modal-title').text('Oops!');
                    $.each(data.errors, function (index, value) {
                        $('.wmessage').append("<li>" + value + "</li>");
                    });
                    setTimeout(function() {
                        $('#message').modal('hide');
                    }, 4000);
                }else{
                    // Show success message
                    $('#message').modal('show');
                    $('.wmessage').css('color', 'green');
                    $('.modal-title').css('color', 'green');
                    $('.modal-title').text('Congrats!');
                    $('.wmessage').text('Payment method updated successfully.');
                    setTimeout(function() {
                        $('#message').modal('hide');
                    }, 4000);
                }
            }
        });
    });
});






/*-------------------------------------------
  02. Coupon apply
--------------------------------------------- */


// form applyCoupon function

$(document).on('submit', '#applyCoupon', function(e){
    // Stop the form from being submit
    e.preventDefault();
    $.ajax({
        type: 'POST',
        url: $(this).attr('action'),
        data: $(this).serialize(),
        success: function(data){
            if ((data.errors)) {
                if (typeof data.errors.coupon_code !== 'undefined') {
                    var error = data.errors.coupon_code;
                }
                else{
                    var error = data.errors;
                }
                $('#message').modal('show');
                $('.wmessage').css('color', 'red');
                $('.modal-title').css('color', 'red');
                $('.modal-title').text('Whoops!');
                $('.wmessage').text(error);
            } else {
                $('#message').modal('show');
                $('.wmessage').css('color', 'green');
                $('.modal-title').css('color', 'green');
                $('.modal-title').text('Congrats!');
                $('.wmessage').text('Coupon applied successfully.');
                $(location).attr("href", window.location.attr);
            }
        }
    });
    $('input[name=coupon_code]').val('');
});






/*-------------------------------------------
  03. Product filter
--------------------------------------------- */

// External js: jquery, isotope.pkgd.js, bootstrap.min.js, bootstrap-slider.js
$(document).ready( function() {

    // Create object to store filter for each group
    var buttonFilters = {};
    var filters = {};
    var $checkboxes = $('.widget-content');
    var buttonFilter = '*';
    var comboFilter = '*';
    // Create new object for the range filters and set default values,
    // The default values should correspond to the default values from the slider
    var rangeFilters = {
        'price': {'min':0, 'max': 1000000}
    };

    // Initialise Isotope
    // Set the item selector
    var $grid = $('.tab-product').isotope({
        itemSelector: '.product',
        layout: 'masonry',
        // use filter function
        filter: function() {
            var $this = $(this);
            var price = $this.attr('data-price');
            var isInPriceRange = (rangeFilters['price'].min <= price && rangeFilters['price'].max >= price);
            //console.log(rangeFilters['height']);
            //console.log(rangeFilters['weight']);
            // Debug to check whether an item is within the height weight range
            //console.log('isInHeightRange:' +isInHeightRange + '\nisInWeightRange: ' + isInWeightRange );
            return $this.is( buttonFilter ) && (isInPriceRange) && $this.is(comboFilter || '*');
        }
    });


    // Initialise Sliders
    // Set min/max range on sliders as well as default values
    var $priceSlider = $( "#slider-range" ).slider({
        range: true,
        min: 0,
        max: 1000000,
        values: [ 0, 1000000 ],
        slide: function( event, ui ) {
            $( "#amount" ).val( "৳" + ui.values[ 0 ] + " - ৳" + ui.values[ 1 ] );
            updateRangeSlider(event, ui);
        }
    });
    $( "#amount" ).val( "৳" + $( "#slider-range" ).slider( "values", 0 ) +
        " - ৳" + $( "#slider-range" ).slider( "values", 1 ) );


    function updateRangeSlider(slider, slideEvt) {
        //console.log('Current slider:' + slider);
        var sldmin = +slideEvt.values[0],
            sldmax = +slideEvt.values[1],
            // Find which filter group this slider is in (in this case it will be price)
            // This can be changed by modifying the data-filter-group="age" attribute on the slider HTML
            filterGroup = $( "#slider-range" ).attr('data-filter-group'),
            // Set current selection in variable that can be pass to the label
            currentSelection = sldmin + ' - ' + sldmax;

        // Update filter label with new range selection
        //slider.siblings('.filter-label').find('.filter-selection').text(currentSelection);

        // Set min and max values for current selection to current selection
        // If no values are found set min to 0 and max to 100000
        // Store min/max values in rangeFilters array in the relevant filter group
        // E.g. rangeFilters['price'].min and rangeFilters['price'].max
        console.log('Filtergroup: '+ filterGroup);
        rangeFilters[filterGroup] = {
            min: sldmin || 0,
            max: sldmax || 1000000
        };
        // Trigger isotope again to refresh layout
        $grid.isotope();
    }

    // Look inside element with .filters class for any clicks on elements with .buttons
    $(document).on( 'click', '.buttons', function(e) {
        // Stop the browser from submitting the form.
        e.preventDefault();

        var $this = $(this);
        // Get group key from parent btn-group (e.g. data-filter-group="color")
        var $buttonGroup = $this.parents('.widget-content');
        var filterGroup = $buttonGroup.attr('data-filter-group');
        // set filter for group
        buttonFilters[ filterGroup ] = $this.attr('data-filter');
        // Combine filters or set the value to * if buttonFilters
        buttonFilter = concatValues( buttonFilters ) || '*';
        // Log out current filter to check that it's working when clicked
        console.log( buttonFilter );
        // Trigger isotope again to refresh layout
        $grid.isotope();
    });


    // change is-checked class on btn-filter to toggle which one is active
    $('.widget-content').each( function( i, buttonGroup ) {
        var $buttonGroup = $( buttonGroup );
        $buttonGroup.on( 'click', '.buttons', function() {
            $buttonGroup.find('.is-checked').removeClass('is-checked');
            $(this).addClass('is-checked');
        });
    });

    // Look inside element with .box-checkbox class for any clicks on elements with .buttons
    $checkboxes.change( function(jQEvent) {
        // map input values to an array
        var $checkbox = $(jQEvent.target);
        // get all checked box associated with their filter-group
        manageCheckbox($checkbox);
        // combine all checkbox within an array
        comboFilter = getComboFilter(filters);

        // Log out current filter to check that it's working when clicked
        console.log( comboFilter );
        // Trigger isotope again to refresh layout
        $grid.isotope();
    });

    // combine all checkbox within an array
    function getComboFilter(filters) {
        var i = 0;
        var comboFilters = [];
        var message = [];
        for (var prop in filters) {
            message.push(filters[prop].join(' '));
            var filterGroup = filters[prop];
            // skip to next filter group if it doesn't have any values
            if (!filterGroup.length) {
                continue;
            }
            if (i === 0) {
                // copy to new array
                comboFilters = filterGroup.slice(0);
            } else {
                var filterSelectors = [];
                // copy to fresh array
                var groupCombo = comboFilters.slice(0); // [ A, B ]
                // merge filter Groups
                for (var k = 0, len3 = filterGroup.length; k < len3; k++) {
                    for (var j = 0, len2 = groupCombo.length; j < len2; j++) {
                        filterSelectors.push(groupCombo[j] + filterGroup[k]); // [ 1, 2 ]
                    }
                }
                // apply filter selectors to combo filters for next group
                comboFilters = filterSelectors;
            }
            i++;
        }
        var comboFilter = comboFilters.join(', ');
        return comboFilter;
    }

    // get all checked box associated with their filter-group
    function manageCheckbox($checkbox) {
        var checkbox = $checkbox[0];
        var group = $checkbox.parents('.widget-content').attr('data-filter-group');
        // create array for filter group, if not there yet
        var filterGroup = filters[group];
        if (!filterGroup) {
            filterGroup = filters[group] = [];
        }
        var isAll = $checkbox.hasClass('all');
        // reset filter group if the all box was checked
        if (isAll) {
            delete filters[group];
            if (!checkbox.checked) {
                checkbox.checked = 'checked';
            }
        }
        // index of
        var index = $.inArray(checkbox.value, filterGroup);
        if (checkbox.checked) {
            var selector = isAll ? 'input' : 'input.all';
            $checkbox.siblings(selector).removeAttr('checked');
            if (!isAll && index === -1) {
                // add filter to group
                filters[group].push(checkbox.value);
            }
        } else if (!isAll) {
            // remove filter from group
            filters[group].splice(index, 1);
            // if unchecked the last box, check the all
            if (!$checkbox.siblings('[checked]').length) {
                $checkbox.siblings('input.all').attr('checked', 'checked');
            }
        }
    }

});

// Flatten object by concatting values
function concatValues( obj ) {
    var value = '';
    for ( var prop in obj ) {
        value += obj[ prop ];
    }
    return value;
}






/*-------------------------------------------
  04. Product compare
--------------------------------------------- */

// Commpare dialogue box
$(document).on('click', '.compare', function(e){
    // Stop the form from being submit
    e.preventDefault();

    $('#compareSimiliar').attr('href', $(this).data('comparesimiliar'));
    $('#compareList').attr('href', $(this).data('comparelist'));
    $('#compare').modal('show');
});






/*-------------------------------------------
  05. Quotation
--------------------------------------------- */

// Quotation dialogue box
$(document).on('click', '.quotation', function(e){
    // Stop the form from being submit
    e.preventDefault();

    $('#subject').val($(this).data('subject'));
    $('#messageBody').val($(this).data('message'));
    $('#quotation').modal('show');
});





/*-------------------------------------------
  06. Password reset
--------------------------------------------- */

// form password reset
$(document).on('click', '#forgotPass', function(e) {
    e.preventDefault();
    $('.modal-title').text('Password reset');
    $('#password_reset').modal('show');
});


// Password reset
$(function() {

    // Get the form.
    var form = $('#password-reset-form');

    // Set up an event listener for the register form.
    $(form).submit(function(e) {
        // Stop the browser from submitting the form.
        e.preventDefault();

        // Submit the form using AJAX.
        $.ajax({
            type: 'post',
            url: $(form).attr('action'),
            data: new FormData(this),
            cache: false,
            contentType: false,
            processData: false,
            success: function(data){
                if (data.error){
                    $('.error').show();
                    $('.success').hide();
                    $('.error').text(data.error);
                } else {
                    $('.success').show();
                    $('.error').hide();
                    $('.success').text('We have e-mailed your password reset link!');
                }
            }
        });
    });
});





/*-------------------------------------------
  07. Country filter
--------------------------------------------- */

// Filter Search by input text
$('#countries').keyup(function(){
    var valThis = $(this).val().toLowerCase();
    if(valThis == ""){
        $('.country').show();
    } else {
        $('.country').each(function(){
            var text = $(this).text().toLowerCase();
            (text.indexOf(valThis) >= 0) ? $(this).show() : $(this).hide();
        });
    };
});





/*-------------------------------------------
  08. Size filter
--------------------------------------------- */

// Filter Search by input text
$('#size').keyup(function(){
    var valThis = $(this).val().toLowerCase();
    if(valThis == ""){
        $('.size').show();
    } else {
        $('.size').each(function(){
            var text = $(this).text().toLowerCase();
            (text.indexOf(valThis) >= 0) ? $(this).show() : $(this).hide();
        });
    };
});




/*-------------------------------------------
  09. Tag filter
--------------------------------------------- */

// Filter Search by input text
$('#tag').keyup(function(){
    var valThis = $(this).val().toLowerCase();
    if(valThis == ""){
        $('.tag').show();
    } else {
        $('.tag').each(function(){
            var text = $(this).text().toLowerCase();
            (text.indexOf(valThis) >= 0) ? $(this).show() : $(this).hide();
        });
    };
});






/*-------------------------------------------
  10. Blog filter
--------------------------------------------- */

// External js: jquery, isotope.pkgd.js, bootstrap.min.js, bootstrap-slider.js
$(document).ready( function() {

    // Create object to store filter for each group
    var buttonFilters = {};
    var buttonFilter = '*';

    // Initialise Isotope
    // Set the item selector
    var $grid = $('.post-wrap').isotope({
        itemSelector: '.main-post',
        layout: 'masonry',
        // use filter function
        filter: function () {
            var $this = $(this);
            return $this.is(buttonFilter);
        }
    });

    // Look inside element with .filters class for any clicks on elements with .buttons
    $(document).on('click', '.buttons', function (e) {
        // Stop the browser from submitting the form.
        e.preventDefault();

        var $this = $(this);
        // Get group key from parent btn-group (e.g. data-filter-group="color")
        var $buttonGroup = $this.parents('.cat-list');
        var filterGroup = $buttonGroup.attr('data-filter-group');
        // set filter for group
        buttonFilters[filterGroup] = $this.attr('data-filter');
        // Combine filters or set the value to * if buttonFilters
        buttonFilter = concatValues(buttonFilters) || '*';
        // Log out current filter to check that it's working when clicked
        console.log(buttonFilter);
        // Trigger isotope again to refresh layout
        $grid.isotope();
    });


    // change is-checked class on btn-filter to toggle which one is active
    $('.widget-content').each(function (i, buttonGroup) {
        var $buttonGroup = $(buttonGroup);
        $buttonGroup.on('click', '.buttons', function () {
            $buttonGroup.find('.is-checked').removeClass('is-checked');
            $(this).addClass('is-checked');
        });
    });
});

// Filter Search by input text
$('#blog_search').keyup(function(){
    var valThis = $(this).val().toLowerCase();
    if(valThis == ""){
        $('.main-post').show();
    } else {
        $('.main-post').each(function(){
            var text = $(this).text().toLowerCase();
            (text.indexOf(valThis) >= 0) ? $(this).show() : $(this).hide();
        });
    };
});






/*-------------------------------------------
  11. Brand filter
--------------------------------------------- */

// Filter Search by input text
$('#brands').keyup(function(){
    var valThis = $(this).val().toLowerCase();
    if(valThis == ""){
        $('.brands').show();
    } else {
        $('.brands').each(function(){
            var text = $(this).text().toLowerCase();
            (text.indexOf(valThis) >= 0) ? $(this).show() : $(this).hide();
        });
    };
});






/*-------------------------------------------
  12. Color filter
--------------------------------------------- */

// Filter Search by input text
$('#color').keyup(function(){
    var valThis = $(this).val().toLowerCase();
    if(valThis == ""){
        $('.color').show();
    } else {
        $('.color').each(function(){
            var text = $(this).text().toLowerCase();
            (text.indexOf(valThis) >= 0) ? $(this).show() : $(this).hide();
        });
    };
});





/*-------------------------------------------
  13. Message CRUD
--------------------------------------------- */

$(function() {
    // Hide error & success message
    $('.error').hide();
    $('.success').hide();

    // Get the form.
    var form = $('#form-contact');

    // Set up an event listener for the register form.
    $(form).submit(function(e) {
        // Stop the browser from submitting the form.
        e.preventDefault();

        // Serialize the form data.
        var formData = $(form).serialize();

        // Submit the form using AJAX.
        $.ajax({
            type: 'POST',
            url: $(form).attr('action'),
            data: formData,
            success: function(data){
                if ((data.errors)) {
                    $('.success').hide();
                    if (typeof data.errors.name !== 'undefined') {
                        $('.name').show().text(data.errors.name);
                    }else {
                        $('.name').hide();
                    }
                    if (typeof data.errors.email !== 'undefined') {
                        $('.email').show().text(data.errors.email);
                    }else {
                        $('.email').hide();
                    }
                    if (typeof data.errors.phone !== 'undefined') {
                        $('.phone').show().text(data.errors.phone);
                    }else {
                        $('.phone').hide();
                    }
                    if (typeof data.errors.subject !== 'undefined') {
                        $('.subject').show().text(data.errors.subject);
                    }else {
                        $('.subject').hide();
                    }
                    if (typeof data.errors.message !== 'undefined') {
                        $('.message').show().text(data.errors.message);
                    }else {
                        $('.message').hide();
                    }
                } else {
                    $('.error').hide();
                    $(form).trigger('reset');
                    $('.success').show().text(data.success);
                }
            }
        });
    });
});






/*-------------------------------------------
  14. Cart
--------------------------------------------- */


// -- ajax Form add Cart --

$(document).on('click', '.addCart', function(e) {
    // Stop the browser from submitting the form.
    e.preventDefault();

    // Submit the form using AJAX.
    $.ajax({
        type: 'post',
        url: $(this).data('url'),
        data: {
            'qty': $(this).data('qty'),
            'id': $(this).data('id')
        },
        success: function(data){
            if ((data.error)) {
                $('#message').modal('show');
                $('.wmessage').css('color', 'red');
                $('.modal-title').css('color', 'red');
                $('.modal-title').text('Whoops!');
                $('.wmessage').text(data.error);
                setTimeout(function() {
                    $('#message').modal('hide');
                }, 4000);
            } else {
                $(location).attr("href", window.location.href);
            }
        }
    });
});

$(document).on('click', '.addSingleCart', function(e) {
    // Stop the browser from submitting the form.
    e.preventDefault();

    // Submit the form using AJAX.
    $.ajax({
        type: 'post',
        url: $(this).data('url'),
        data: {
            'qty': $('input[name=quantity]').val(),
            'id': $(this).data('id')
        },
        success: function(data){
            if ((data.error)) {
                $('#message').modal('show');
                $('.wmessage').css('color', 'red');
                $('.modal-title').css('color', 'red');
                $('.modal-title').text('Whoops!');
                $('.wmessage').text(data.error);
                setTimeout(function() {
                    $('#message').modal('hide');
                }, 4000);
            } else {
                $(location).attr("href", window.location.href);
            }
        }
    });
});

// -- ajax Form update Cart --

$(".cart-update").click(function(e) {
    // Stop the browser from submitting the form.
    e.preventDefault();

    var qty = $('input[name=quantity'+$(this).data('id')+']').val();

    $.ajax({
        type: 'post',
        url: $(this).data('url'),
        data: {
            'qty': qty,
            'id': $(this).data('id'),
            '_method': 'PUT'
        },
        success: function(){
            $(location).attr("href", window.location.href);
        }
    });
});


// form Delete function
$(document).on('click', '#delete-cart', function(e){
    // Stop the browser from submitting the form.
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: $(this).data('url'),
        data: {
            'id': $(this).data('id'),
            '_method': 'DELETE'
        },
        success: function(){
            $(location).attr("href", window.location.href);
        }
    });
});





/*-------------------------------------------------------------
  15. Wishlist Form
---------------------------------------------------------------*/

// -- ajax Form Wishlist register --

$(document).on('click', '.addWlist', function(e) {
    e.preventDefault();
    $.ajax({
        type: 'post',
        url: $(this).data('url'),
        data: {
            'product_id': $(this).data('id')
        },
        success: function(data){
            if ((data.error)) {
                $('#message').modal('show');
                $('.wmessage').css('color', 'red');
                $('.modal-title').css('color', 'red');
                $('.modal-title').text('Wishlist terms!');
                $('.wmessage').html(data.error);
                setTimeout(function() {
                    $('#message').modal('hide');
                }, 4000);
            } else {
                $('#message').modal('show');
                $('.wmessage').css('color', 'green');
                $('.modal-title').css('color', 'green');
                $('.modal-title').text('Congrats!');
                $('.wmessage').text(data.success);
                setTimeout(function() {
                    $('#message').modal('hide');
                }, 4000);
            }
        }
    });
});

// form Delete function


$(document).on('click', '.product-delete', function(e){
    e.preventDefault();
    $.ajax({
        type: 'POST',
        url: 'wishlists/'+$(this).data('id'),
        data: {
            '_method': 'DELETE',
            'id': $(this).data('id')
        },
        success: function(){
            $(location).attr("href", window.location.href);
        }
    });
});






/*-------------------------------------------------------------
  16. Compare Form
---------------------------------------------------------------*/

// -- ajax Form Compare --
$(document).on('click', '.addCompare', function(e) {
    e.preventDefault();
    $('.all').remove();
    $('#compareProductImageName').append('<td class="all product cmpr'+$(this).data('id')+'"><div class="image"><img src="'+$(this).data('image')+'" alt="" /></div><div class="name"><a href="'+$(this).data('url')+'">'+$(this).data('name')+'</a></div></td>'
    );
    $('#comparePrice').append('<td class="all price cmpr'+$(this).data('id')+'">৳ '+$(this).data('saleprice')+'</td>');
    $('#compareColor').append('<td class="all color cmpr'+$(this).data('id')+'"><p>'+$(this).data('color').slice(0, -2)+'</p></td>');
    if($(this).data("stock") == 0){
        var stock = 'In stock';
    }else{
        var stock = 'Out of stock';
    }
    if($(this).data("product_url") == ''){
        var cart = '<td class="all add-cart cmpr'+$(this).data('id')+'"><div class="image"><a class="addCart" href="#" title="" data-url="carts" data-qty="1" data-id="'+$(this).data('id')+'">\n' +
            '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img src="{{asset(\'images/icons/add-cart.png\')}}" alt="">Add to Cart\n' +
            '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</a></div></td>';
    }else{
        var cart = '<td class="all add-cart cmpr'+$(this).data('id')+'"><div class="image"><a href="'+$(this).data('id')+'" title="">\n' +
            '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img src="{{asset(\'images/icons/add-cart.png\')}}" alt="">Add to Cart\n' +
            '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</a></div></td>';
    }
    $('#compareStock').append('<td class="all stock cmpr'+$(this).data('id')+'"><p>'+stock+'</p></td>');
    $('#compareCart').append(cart);
    $('#compareDescription').append('<td class="all description cmpr'+$(this).data('id')+'">' + $(this).data('short_desc') + '</td>');
    $('#compareDelete').append('<td class="delete compare-remove all cmpr'+$(this).data('id')+'">\n' +
        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a href="#" id="compare-delete" data-id="'+$(this).data('id')+'"><img src="images/icons/delete.png" alt=""></a>\n' +
        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>');

    $.ajax({
        type: 'GET',
        url: $(this).data('requrl'),
        data: {
            'id': $(this).data('id')
        },
        success: function(data){
            $('#toCompare').html('<option>Select product from here to compare them</option>');
            jQuery.each( data, function( index, value ) {
                // Declare and initialize variables
                var colors, sizes, tags, image;
                colors = sizes = tags  = image = "";

                // Get color
                $.each(value.colors, function (index,value) {
                    colors += value.color + ", ";
                });

                // Get sizes
                $.each(value.sizes, function (index,value) {
                    sizes += value.size + ", ";
                });

                // Get tags
                $.each(value.tags, function (index,value) {
                    tags += value.tag + ", ";
                });

                // Get images
                $.each(value.images, function (index,value) {
                    image = value.image;
                });

                if (value.salePrice === null){
                    var price = '';
                }else{
                    var price = value.salePrice;
                }
                $('#toCompare').append(
                    '<option class="cmprProduct" id="cmprProduct'+value.id+'" data-id="'+value.id+'" data-name="'+value.productName+'" data-short_desc="'+value.shortDescription+'" data-image="' + base_url + '/storage/images/product/' + image + '" data-saleprice="'+price+'" data-stock="'+value.availability+'" data-color="'+colors.slice(0, -2)+'" data-sizes="'+sizes.slice(0, -2)+'" data-tags="'+tags.slice(0, -2)+'" data-url="' + base_url + '/products/'+value.id+'" data-product_url="' + value.product_url + '" data-requrl="productsByCat/'+value.category_id+'"><a href="#" data-toggle="tooltip" class="cmprProduct" id="cmprProduct'+value.id+'" data-placement="top" title="Compare" data-id="'+value.id+'">'+value.productName+'</a></option>\n'
                );
            });
        }
    });

    $('#compare').modal('show');
});

// -- ajax Form Compare product --
$(document).on('change', '#toCompare', function() {
    var $this = $('#toCompare option:selected');
    $this.remove();
    $('#compareProductImageName').append('<td class="all product cmpr'+$this.data('id')+'"><div class="image"><img src="'+$this.data('image')+'" alt="" /></div><div class="name"><a href="'+$this.data('url')+'">'+$this.data('name')+'</a></div></td>'
    );
    $('#comparePrice').append('<td class="all price cmpr'+$this.data('id')+'">৳ '+$this.data('saleprice')+'</td>');
    $('#compareColor').append('<td class="all color cmpr'+$this.data('id')+'"><p>'+$this.data('color')+'</p></td>');
    if($this.data("stock") == 0){
        var stock = 'In stock';
    }else{
        var stock = 'Out of stock';
    }
    if($this.data("product_url") == ''){
        var cart = '<td class="all add-cart cmpr'+$this.data('id')+'"><div class="image"><a class="addCart" href="#" title="" data-url="carts" data-qty="1" data-id="'+$this.data('id')+'">\n' +
            '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img src="{{asset(\'images/icons/add-cart.png\')}}" alt="">Add to Cart\n' +
            '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</a></div></td>';
    }else{
        var cart = '<td class="all add-cart cmpr'+$this.data('id')+'"><div class="image"><a href="'+$this.data('id')+'" title="">\n' +
            '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img src="{{asset(\'images/icons/add-cart.png\')}}" alt="">Add to Cart\n' +
            '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</a></div></td>';
    }
    $('#compareStock').append('<td class="all stock cmpr'+$this.data('id')+'"><p>'+stock+'</p></td>');
    $('#compareCart').append(cart);
    $('#compareDescription').append('<td class="all description cmpr'+$this.data('id')+'">' + $this.data('short_desc') + '</td>');
    $('#compareDelete').append('<td class="delete compare-remove all cmpr'+$this.data('id')+'">\n' +
        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a href="#" id="compare-delete" data-id="'+$this.data('id')+'"><img src="images/icons/delete.png" alt=""></a>\n' +
        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>');
});

// form Delete function
$(document).on('click', '#compare-delete', function(e) {
    e.preventDefault();
    $('.cmpr'+$(this).data('id')).remove();
});






/*-------------------------------------------
  17. Bid CRUD
--------------------------------------------- */


// -- ajax Form Add Bid--
$(document).on('click','.addBid', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('#create').modal('show');
    $('.form-horizontal').show();
    $('.modal-title').text('Add Bid');
});

$("#addBid").submit(function(event) {
    // Stop browser from submitting the form
    event.preventDefault();

    // send ajax request
    $.ajax({
        type: 'POST',
        url: $(this).attr('action'),
        data: new FormData( this ),
        cache: false,
        contentType: false,
        processData: false,
        success: function(data){
            if ((data.errors)) {
                $('.error').removeClass('hidden');
                if (typeof data.errors.date === 'undefined') {
                    $('.date').addClass('hidden');
                }
                $('.date').text(data.errors.date);
                if (typeof data.errors.valid_until === 'undefined') {
                    $('.valid_until').addClass('hidden');
                }
                $('.valid_until').text(data.errors.valid_until);
                if (typeof data.errors.product_id === 'undefined') {
                    $('.product_id').addClass('hidden');
                }
                $('.product_id').text(data.errors.product_id);
            } else {
                $('#example1').prepend("<tr id='bid" + data.id + "'>"+
                    "<td>" + data.date + "</td>"+
                    "<td>" + data.valid_until + "</td>"+
                    "<td>" + $('#product_id >option:selected').text() + "</td>"+
                    "<td><a class='edit-bid btn btn-warning btn-sm' data-id='" + data.id + "'><span class='fa fa-edit'></span></a> <a class='delete-bid btn btn-danger btn-sm' data-id='" + data.id + "'><span class='fa fa-trash'></span></a></td>"+
                    "</tr>"
                );
                $('#addBid').trigger('reset');
            }
        }
    });
});


// function Edit Bid
$(document).on('click', '.edit-bid', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('.actionBtn').hide();
    $('.modal-title').text('Bid Edit');
    $('.deleteContent').hide();
    $('.form-horizontal').show();

    $.ajax({
        type: 'GET',
        url: 'bids/' + $(this).data('id') + '/edit',
        data: {
            'id': $(this).data('id')
        },
        success: function(data){
            $('#fid').val(data.id);

            // Set valid_from date time
            var valid_from = $('#edate');
            valid_from.datepicker('setDate', new Date(data.date));

            // Set valid_until date time
            var valid_until = $('#evalid_until');
            valid_until.datepicker('setDate', new Date(data.valid_until));

            // Loop over each select option
            $("#eproduct_id > option").each(function(){
                // Check for the matching category
                if ($(this).val() == data.product_id){
                    // Select the matched option
                    $(this).prop("selected", true);
                }
            });
            $('#myModal').modal('show');
        }
    });
});

$('#updateBid').submit(function(event) {
    // Stop browser from submitting the form
    event.preventDefault();

    var formData = new FormData(this);
    formData.append('_method', 'PUT');
    $.ajax({
        type: 'POST',
        url: $(this).attr('action') + '/' + $('#fid').val(),
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data) {
            if ((data.errors)) {
                $('.error').removeClass('hidden');
                if (typeof data.errors.date === 'undefined') {
                    $('.edate').addClass('hidden');
                }
                $('.edate').text(data.errors.date);
                if (typeof data.errors.valid_until === 'undefined') {
                    $('.evalid_until').addClass('hidden');
                }
                $('.evalid_until').text(data.errors.valid_until);
                if (typeof data.errors.product_id === 'undefined') {
                    $('.eproduct_id').addClass('hidden');
                }
                $('.eproduct_id').text(data.errors.product_id);
            } else {
                $('#bid' + data.id).replaceWith("<tr id='bid" + data.id + "'>"+
                    "<td>" + data.date + "</td>"+
                    "<td>" + data.valid_until + "</td>"+
                    "<td>" + $('#product_id >option:selected').text() + "</td>"+
                    "<td><a class='edit-bid btn btn-warning btn-sm' data-id='" + data.id + "'><span class='fa fa-edit'></span></a> <a class='delete-bid btn btn-danger btn-sm' data-id='" + data.id + "'><span class='fa fa-trash'></span></a></td>"+
                    "</tr>"
                );
            }
        }
    });
});


// form Delete function
$(document).on('click', '.delete-bid', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('.actionBtn').show();
    $('#footer_action_button').text(" Delete");
    $('#footer_action_button').removeClass('glyphicon-check');
    $('#footer_action_button').addClass('glyphicon-trash');
    $('.actionBtn').removeClass('btn-success');
    $('.actionBtn').addClass('btn-danger');
    $('.actionBtn').addClass('deleteBid');
    $('.modal-title').text('Delete Bid');
    $('.id').text($(this).data('id'));
    $('.deleteContent').show();
    $('.form-horizontal').hide();
    $('#delete').modal('show');
});

$('.modal-footer').on('click', '.deleteBid', function(e){
    // Stop browser from default behaviour
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: 'bids/'+$('.id').text(),
        data: {
            '_method': 'DELETE',
            'id': $('.id').text()
        },
        success: function(){
            $('#bid' + $('.id').text()).remove();
        }
    });
});