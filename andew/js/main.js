//jQuery(document).on("ajaxComplete", function () {
//    jQuery(".html5lightbox").html5lightbox();
//});
/*===== Used to format phone number =====*/;

/** Body Padding Top for Inner Pages  ***/
jQuery(window).on("load resize scroll", function ($) {
    jQuery('body').css({'padding-top': jQuery('header').innerHeight()});
});
jQuery('document').ready(function ($) {
    $('img').each(function () {
        var $this = $(this);
        // Check if the image has an empty or undefined alt attribute
        if (!$this.attr('alt')) {
// Get the image's file name without the extension
            var src = $this.attr('src');
            if (src) {
                var fileName = src.split('/').pop().split('.')[0]; // Extract the file name
                // Replace spaces with '-' and ensure '-' remains intact
                var formattedName = fileName.replace(/\s+/g, '-'); // Replace spaces with '-'
                $this.attr('alt', formattedName); // Assign the formatted name to alt
            }
        }
    });
    var wow = new WOW({
        boxClass: 'wow', // default
        animateClass: 'animated', // default
        offset: 0, // default
        mobile: false, // default
        live: true        // default
    });
    wow.init();
    $(window).scroll(function () {
        if ($(document).scrollTop() > 100) {
            $('header').addClass('shrink');
            $('body').addClass('header-fixed');
        } else {
            $('header').removeClass('shrink');
            $('body').removeClass('header-fixed');
        }
    });
    if ($(document).scrollTop() > 100) {
        $('header').addClass('shrink');
        $('body').addClass('header-fixed');
    } else {
        $('header').removeClass('shrink');
        $('body').removeClass('header-fixed');
    }


    /* Mobile Menu start ---- Full Menu Bar JS */
    if ($('.menu-sidebar .menu-bar-wrapper li').hasClass('menu-item-has-children')) {
        $(".menu-sidebar .menu-item-has-children > a").after("<span class='sidebar-menu-arrow'></span>");
    }

    var $toggleButton = $('.menu-button'),
            $menuWrap = $('.menu-wrap'),
            $sidebarArrow = $('.sidebar-menu-arrow');
    // Hamburger Button
    $toggleButton.on('click', function () {
        $(this).toggleClass('button-open');
        $menuWrap.toggleClass('menu-show');
    });
    $('.sidebar-menu-arrow').click(function () {
        $(this).next('.sub-menu').slideUp(300);
        if ($(this).next().is(':visible')) {
            $(this).next().slideUp(300);
        } else {
            $(this).next().slideDown(300);
        }

        if ($(this).hasClass('responsive-up-arrow')) {
            $(this).removeClass('responsive-up-arrow');
        } else {
            $(this).addClass('responsive-up-arrow');
        }
    });
    $('.menu-button').on('click', function () {
        $('body').addClass('nav-open-menu');
    });
    $('.menu-close-button').click(function () {
        $('.menu-wrap').removeClass('menu-show');
        $('.menu-button').removeClass('button-open');
        $('body').removeClass('nav-open-menu');
    });
    /* Mobile Menu End */

    /*====== Sidebar Search =======*/
    $('<span class="custom_form_msg d-none">Enter Something Here</span>').insertAfter('#sidebar-search .search-field');
    $("#sidebar-search .search-btn").click(function () {
        var $input = $(this).closest('div').find('.search-field');
        var inputVal = $input.val();
        // Trim input for checking if it's empty
        var trimmedVal = inputVal.trim();
        // Regex: No leading space, no multiple spaces
        var isValid = /^[^\s](?:.*\S)?$/.test(inputVal) && !/ {2,}/.test(inputVal);
        if (trimmedVal === '' || !isValid) {
            $(this).closest('div').find('.custom_form_msg')
                    .removeClass('d-none')
                    .text('Please avoid leading or multiple spaces.');
        } else {
            $(this).closest('div').find('.custom_form_msg').addClass('d-none');
        }
    });
// Hide message when user types
    $('#sidebar-search .search-field').on('input', function () {
        $(this).siblings('.custom_form_msg').addClass('d-none');
    });
// Prevent native HTML5 "required" validation message
    $('#sidebar-search .search-field').bind('invalid', function () {
        return false;
    });
    /*====== Header Search Popup =======*/
    // Open search panel
    $('header .global-search').click(function () {
        $('body').addClass('search-open');
        $('.search-panel').css('transform', 'translateY(0)');
        $("#searchform").find('input:text').val('');
    });
// Close search panel and reset input
    $('.search-close').click(function () {
        $('body').removeClass('search-open');
        $('.search-panel').css('transform', 'translateY(-100%)');
        $("#searchform").find('input:text').val('');
    });
    /*====== Header Search Popup =======*/

    /*====== Header Search =======*/

// Open search panel
    $('header .global-search').click(function () {
        $('body').addClass('search-open');
        $('.search-panel').css('transform', 'translateY(0)');
        $("#searchform").find('input:text').val('');
        // Show the validation message when the popup is opened and input is empty
        $("#header-search .custom_form_msg").removeClass('d-none');
    });
// Close search panel and reset input
    $('.search-close').click(function () {
        $('body').removeClass('search-open');
        $('.search-panel').css('transform', 'translateY(-100%)');
        $("#searchform").find('input:text').val('');
        // Hide the validation message when the popup is closed
        $("#header-search .custom_form_msg").addClass('d-none');
    });
    /*====== Header Search Popup =======*/

    /*====== Header Search =======*/

// Open search panel
    $('header .global-search').click(function () {
        $('body').addClass('search-open');
        $('.search-panel').css('transform', 'translateY(0)');
        $("#searchform").find('input:text').val('');
        // Hide the validation message when popup is opened
        $("#header-search .custom_form_msg").addClass('d-none');
    });
// Close search panel and reset input
    $('.search-close').click(function () {
        $('body').removeClass('search-open');
        $('.search-panel').css('transform', 'translateY(-100%)');
        $("#searchform").find('input:text').val('');
        // Hide the validation message when popup is closed
        $("#header-search .custom_form_msg").addClass('d-none');
    });
    /*====== Header Search Popup =======*/

    /*====== Header Search =======*/

// Add validation message (only once)
    if (!$('#header-search .custom_form_msg').length) {
        $('<span class="custom_form_msg d-none">Enter Something Here</span>').insertAfter('#header-search .search-field');
    }

// Real-time input cleanup
    $('#header-search .search-field').on('input', function () {
        let val = $(this).val();
        // Prevent space at the start
        if (val.startsWith(' ')) {
            val = val.trimStart();
        }

// Replace multiple spaces with one
        val = val.replace(/\s{2,}/g, ' ');
        $(this).val(val);
        // Hide required message if there's some input
        if (val.length > 0) {
            $("#header-search .custom_form_msg").addClass('d-none');
        }
    });
// On blur: clean up spaces
    $('#header-search .search-field').on('blur', function () {
        let val = $(this).val().trim();
        $(this).val(val);
    });
// On search button click
    $("#header-search .search-btn").click(function () {
        var inputField = $('#header-search .search-field');
        var inputVal = inputField.val().replace(/\s{2,}/g, ' ').trim();
        inputField.val(inputVal); // Set cleaned value

        // If input is empty after cleanup, show the "Enter Something Here" message
        if (inputVal === '') {
            $("#header-search .custom_form_msg").removeClass('d-none');
        } else {
            $("#header-search .custom_form_msg").addClass('d-none');
        }
    });
// Prevent default browser invalid UI
    $('#header-search .search-field').on('invalid', function () {
        return false;
    });
    /*====== Header Search =======*/
    /*** for external links */
    $('a[href^="http://"], a[href^="https://"]').not('a[href*="' + location.hostname + '"]').attr('target', '_blank');
});
/***********js for svg*************/
jQuery(function () {
    activate('img[src*=".svg"]');
    function activate(string) {
        jQuery(string).each(function () {
            var $img = jQuery(this);
            var imgID = $img.attr('id');
            var imgClass = $img.attr('class');
            var imgURL = $img.attr('src');
            jQuery.get(imgURL, function (data) {
                // Get the SVG tag, ignore the rest
                var $svg = jQuery(data).find('svg');
                // Add replaced image's ID to the new SVG
                if (typeof imgID !== 'undefined') {
                    $svg = $svg.attr('id', imgID);
                }
                // Add replaced image's classes to the new SVG
                if (typeof imgClass !== 'undefined') {
                    $svg = $svg.attr('class', imgClass + ' replaced-svg');
                }

                // Remove any invalid XML tags as per http://validator.w3.org
                $svg = $svg.removeAttr('xmlns:a');
                // Replace image with new SVG
                $img.replaceWith($svg);
            }, 'xml');
        });
    }
});
/*===== Form Validation =====*/


var validateEmail = function (elementValue) {
    // Updated pattern for email validation
    var emailPattern = /^[a-zA-Z0-9]+(?:[._-][a-zA-Z0-9]+)*@[a-zA-Z0-9-]+\.[a-zA-Z]{2,}$/;
    return emailPattern.test(elementValue);
};
// Email validation on focusout
jQuery(".wpcf7 input[type='email']").focusout(function () {
    var value = jQuery(this).val();
    var valid = validateEmail(value);
    // Remove any previous error messages before adding a new one
    jQuery(this).parent().find('.email-error').remove();
    if (!valid) {
        $(this).parent().find('#emailAddress-error').hide()
        jQuery(this).parent().append("<label class='email-error'>Enter  valid email address.</label>");
    } else {
        $(this).parent().find('#emailAddress-error').show()
    }
});


/*===== Not Enter Special Charcter and Numeric =====*/
jQuery('[data-name="fullName"] input, [data-name="LastName"] input, [data-name="FullName"] input').bind('keydown', function (event) {
    var key = event.which;
    if (key >= 48 && key <= 57) {
        event.preventDefault();
    }
    if (key >= 96 && key <= 105) {
        event.preventDefault();
    }
});
jQuery('[data-name="fullName"] input, [data-name="LastName"] input, [data-name="fullName"] input').bind('[data-name="fullName"] input, [data-name="LastName"] input, [data-name="FullName"] input', function () {
    var c = this.selectionStart,
            r = /[^a-z0-9 .]/gi,
            v = jQuery(this).val();
    if (r.test(v)) {
        jQuery(this).val(v.replace(r, ''));
        c--;
    }
    this.setSelectionRange(c, c);
});
/*===== Disable Space on First Name  =====*/
jQuery('[data-name="fullName"] input, [data-name="emailAddress"] input[type="email"]').on({
    keydown: function (e) {
        const input = e.target;
        const cursorPos = input.selectionStart;
        const value = input.value;
        const isEmail = input.type === 'email';
        // Prevent leading space in both fields
        if (e.which === 32 && cursorPos === 0) {
            return false;
        }

// Prevent space anywhere in email field
        if (isEmail && e.which === 32) {
            return false;
        }

// Prevent multiple consecutive spaces (only for full name)
        if (
                !isEmail &&
                e.which === 32 &&
                cursorPos > 0 &&
                value.charAt(cursorPos - 1) === ' '
                ) {
            return false;
        }
    },
    change: function () {
        const isEmail = this.type === 'email';
        // For full name: trim and collapse multiple spaces
        if (!isEmail) {
            this.value = this.value.trim().replace(/\s+/g, ' ');
        } else {
            // For email: just trim
            this.value = this.value.trim();
        }
    }
});
// Optional: Prevent leading spaces in all inputs/textareas
jQuery('.wpcf7-form input, .wpcf7-form textarea').on('keydown', function (e) {
    if (e.which === 32 && e.target.selectionStart === 0) {
        return false;
    }
});
/*===== Restrict Special Characters and Numeric in Name Fields =====*/
jQuery('.Name input').on('keydown', function (event) {
    jQuery(this).attr("maxlength", "100");
    var key = event.which;
    if (key >= 48 && key <= 57) {
        event.preventDefault();
    }

    var value = jQuery(this).val();
    var isFirstCharEntered = value.length > 0;
    if (key === 32 && !isFirstCharEntered) {
        event.preventDefault();
        return;
    }
    if (key >= 96 && key <= 105) {
        event.preventDefault();
    }
});
jQuery('.firstName input, .lastName input').on('keydown', function (event) {
    jQuery(this).attr("maxlength", "50");
    var key = event.which;
    if (key === 32) {
        event.preventDefault();
        return false;
    }

    if (key >= 48 && key <= 57) {
        event.preventDefault();
    }
    if (key >= 96 && key <= 105) {
        event.preventDefault();
    }
});
jQuery('.firstName input, .lastName input').bind('input', function () {
    var c = this.selectionStart,
            r = /[^a-zA-Z0-9 .]/gi,
            v = jQuery(this).val();
    if (r.test(v)) {
        jQuery(this).val(v.replace(r, ''));
        c--;
    }
    this.setSelectionRange(c, c);
});
jQuery('document').ready(function ($) {
// Disable copy and paste in form fields
    $("input.wpcf7-form-control, textarea.wpcf7-form-control").attr("onpaste", "return false");
    $("input.wpcf7-form-control, textarea.wpcf7-form-control").attr("oncopy", "return false");
    // Custom email validation method
    $.validator.addMethod('validEmail', function (value, element) {
        var emailPattern = /^[a-zA-Z0-9]+(?:[._-][a-zA-Z0-9]+)*@[a-zA-Z0-9-]+\.[a-zA-Z]{2,}$/;
        return this.optional(element) || emailPattern.test(value);
    }, 'Enter a valid email address.');
    
     $('input[type="tel"]').on('input', function () {
        const sanitizedValue = $(this).val().replace(/[^0-9+\-\(\)\s]/g, '');
        $(this).val(sanitizedValue);
    });

    // Custom validator
    jQuery.validator.addMethod('validPhone', function (value, element) {
        // Remove all non-digit characters to count digits only
        const digitsOnly = value.replace(/\D/g, '');
        
        // Check: at least 10 digits, at most 20
        const digitCountValid = digitsOnly.length >= 10 && digitsOnly.length <= 20;

        // Check: only allowed characters in total string
        const validCharsPattern = /^[0-9+\-\(\)\s]+$/;

        return this.optional(element) || (validCharsPattern.test(value) && digitCountValid);
    }, 'Please enter a valid phone number (10–20 digits, may include +, -, spaces, or parentheses).');



    // Validation rules and messages
    var validationRules = {
        rules: {
            Name: "required",
            fullName: "required",
            firstName: "required",
            lastName: "required",
            dob: "required",
            yourMessage: "required",
            assg_pat_sign: "required",
            patient_name: "required",
            sign2: "required",
            captcha_input: "required",
            country: "required",
            new_client: "required",
            phoneNumber: {
                required: true,
                validPhone: true
            },
            emailAddress: {
                required: true,
                validEmail: true
            },
            pi_email: {
                required: true,
                validEmail: true
            },
        },
        messages: {
            Name: "Enter your full name.",
            fullName: "Enter your full name.",
            firstName: "Enter your first name.",
            lastName: "Enter your last name.",
            phoneNumber: "Enter  valid phone number.",
            minor_pn: "Enter  valid phone number.",
            pi_phn: "Enter  valid phone number.",
            phn_no: "Enter  valid phone number.",
            pi_phn2: "Enter  valid phone number.",
            emailAddress: "Enter  valid email address.",
            yourMessage: "Enter message.",
            dob: "Enter Date",
            pi_email: "Enter Email.",
            assg_pat_sign: "Enter patient’s signatue.",
            patient_name: "Enter patient name.",
            sign2: "Add signature of patient",
            captcha_input: "Enter security code",
            country: "Enter County name.",
            new_client: "Required.",
        },
        errorPlacement: function (error, element) {
            error.appendTo(element.parent());
        }
    };
    // Apply validation rules to each form
    $(".wpcf7-form").each(function () {
        $(this).validate(validationRules);
    });
    // Handle form submission
    $(".wpcf7-form .wpcf7-submit").on("click", function (event) {
        var form = $(this).closest('.wpcf7-form');
        if (!form.valid()) {
            event.preventDefault();
            form.validate(validationRules).focusInvalid();
        }
    });
    jQuery('#testimonial-slider').slick({
        dots: true,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        autoplay: true,
        autoplaySpeed: 3000,
        arrows: false,
        responsive: [
            {
                breakpoint: 1199,
                settings: {
                    slidesToShow: 2, slidesToScroll: 2,
                },
            },
            {
                breakpoint: 769,
                settings: {
                    slidesToShow: 1, slidesToScroll: 1,
                },
            },
        ],
    });
    jQuery('#award-slider').slick({
        dots: true,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        autoplay: true,
        autoplaySpeed: 5000,
        arrows: false,
        responsive: [
            {
                breakpoint: 1199,
                settings: {
                    slidesToShow: 2, slidesToScroll: 2,
                },
            },
            {
                breakpoint: 769,
                settings: {
                    slidesToShow: 1, slidesToScroll: 1,
                },
            },
        ],
    });
    jQuery('.sidebar-results-slider').slick({
        dots: true,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        arrows: false,
        responsive: [
            {
                breakpoint: 1199,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 769,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });
});


jQuery(document).ready(function ($) {
  $(".search-field").on("input", function () {
    var value = $(this).val();

    // Remove leading spaces
    value = value.replace(/^\s+/, "");

    // Replace multiple consecutive spaces with a single space
    value = value.replace(/\s{2,}/g, " ");

    // Update the input field with the cleaned value
    $(this).val(value);
  });
});


jQuery(document).ready(function($) {
    var $phoneInput = $(".wpcf7 input[type='tel']");
    // Set minlength and maxlength attributes
    $phoneInput.attr({
        minlength: "10",
        maxlength: "20"
    });
});