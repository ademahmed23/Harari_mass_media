$(function () {

  "use strict";

  //=========MENU FIX JS=========
  if ($('.main_menu').offset() != undefined) {
    var navoff = $('.main_menu').offset().top;
    $(window).scroll(function () {
      var scrolling = $(this).scrollTop();

      if (scrolling > navoff) {
        $('.main_menu').addClass('menu_fix');
      } else {
        $('.main_menu').removeClass('menu_fix');
      }
    });
  }

  new WOW().init();


  //=========COUNTER JS=========
  $('.counter').countUp();


  //=======SELECT2======
  $(document).ready(function () {
    $('.select_2').select2();
  });


  // ===VENO BOX JS===
  $('.venobox').venobox();


  //*==========ISOTOPE==============
  jQuery(function ($) {
    var grid = $('.grid').isotope({});

    jQuery('.wsus__location_filter').on('click', 'button', function () {
      var selector = jQuery(this).attr('data-filter');
      grid.isotope({ filter: selector });
    });
  });

  // //active class
  $('.wsus__location_filter button').on("click", function (event) {

    $(this).siblings('.active').removeClass('active');
    $(this).addClass('active');
    event.preventDefault();

  });

  //=========LISTING SLIDER=========
  $('.listing_slider').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: false,
    autoplaySpeed: 2000,
    dots: true,
    arrows: false,

    responsive: [
      {
        breakpoint: 1400,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 1,
          dots: true,
          arrows: false,
        }
      },
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          dots: true,
          arrows: false,
        }
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          dots: true,
          arrows: false,
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          dots: true,
          arrows: false,
        }
      },
      {
        breakpoint: 576,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          dots: true,
          arrows: false,
        }
      }
    ]
  });



  //*=====TESTIMONIAL SLIDER=====
  $('.testi_slider').slick({
    slidesToShow: 2,
    slidesToScroll: 1,
    autoplay: false,
    autoplaySpeed: 2000,
    dots: true,
    arrows: false,

    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 2,
        }
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 1,
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
        }
      },
      {
        breakpoint: 576,
        settings: {
          slidesToShow: 1,
        }
      }
    ]
  });


  //*==========SCROLL BUTTON==========
  $('.scroll_btn').on('click', function () {
    $('html, body').animate({
      scrollTop: 0,
    },);
  });

  $(window).on('scroll', function () {
    var scrolling = $(this).scrollTop();

    if (scrolling > 300) {
      $('.scroll_btn').fadeIn();
    }

    else {
      $('.scroll_btn').fadeOut();
    }
  });


  //=========ABOUT PAGE SLIDER=========
  $('.about_page_slider').slick({
    slidesToShow: 6,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    dots: false,
    arrows: false,


    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 1,
        }
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
        }
      },
      {
        breakpoint: 576,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
        }
      }
    ]
  });


  //=========== ADD ROW JS===========
  $("#add_row").on('click', function () {
    var html = '';
    html += '<div  id="remove">';
    html += '<label for="">Name</label>';
    html += '<div class="medicine_row_input">';

    html += '<input type="file" name="name[]">';
    html += '<button type="button" id="removeRow" ><i class="fas fa-trash" aria-hidden="true"></i></button>';
    html += '</div>';
    html += '</div>';
    $("#medicine_row").append(html)
  });

  // remove custom input field row
  $(document).on('click', '#removeRow', function () {
    $(this).closest('#remove').remove();
  });

  $("#add_row2").on('click', function () {
    var html = '';
    html += '<div  id="remove">';
    html += '<label for="">Name</label>';
    html += '<div class="medicine_row_input">';

    html += '<input type="text" name="name[]">';
    html += '<button type="button" id="removeRow" ><i class="fas fa-trash" aria-hidden="true"></i></button>';
    html += '</div>';
    html += '</div>';
    $("#medicine_row2").append(html)
  });

  // remove custom input field row
  $(document).on('click', '#removeRow2', function () {
    $(this).closest('#remove').remove();
  });


  // for 2 input in 1 row

  $("#add_row3").on('click', function () {
    var html = '';
    html += '<div class="row" id="remove">';
    html += '<div class="col-xl-5 col-md-5">';
    html += '<label for="name">icon</label>';
    html += '<div class="medicine_row_input">';
    html += '<input type="text" name="name[]" id="name">';
    html += '</div>';
    html += '</div>';
    html += '<div class="col-xl-5 col-md-5">';
    html += '<label for="name">link</label>';
    html += '<div class="medicine_row_input">';
    html += '<input type="text" name="name[]" id="name">';
    html += '</div>';
    html += '</div>';
    html += '<div class="col-xl-2 col-md-2">';
    html += '<div class="medicine_row_input">';
    html += '<button type="button" id="removeRow" ><i class="fas fa-trash" aria-hidden="true"></i></button>';
    html += ' </div>';
    html += ' </div>';
    html += '</div>';
    $("#medicine_row3").append(html)
  });

  // remove custom input field row
  $(document).on('click', '#removeRow', function () {
    $(this).closest('#remove').remove();
  });


  // ==========SUMMER NOTE JS==========
  $(document).ready(function () {
    $('.summer_note').summernote();
  });


  //*==========DASHBOARD MENU==========

  $('.menu_icon').on('click', function () {
    $('.dashboard_sidebar').addClass('.menu_show');
  });


  $('.close_icon').on('click', function () {
    $('.dashboard_sidebar').removeClass('.menu_show');
  });




  //=========CATEGORY SLIDER=========
  $('.category_slider').slick({
    slidesToShow: 6,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    dots: false,
    arrows: true,
    nextArrow: '<i class="far fa-long-arrow-right nextArrow"></i>',
    prevArrow: '<i class="far fa-long-arrow-left prevArrow"></i>',

    responsive: [
      {
        breakpoint: 1400,
        settings: {
          slidesToShow: 4,
        }
      },
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 4,
        }
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 3,
        }
      },
      {
        breakpoint: 768,
        settings: {
          arrows: false,
          slidesToShow: 2,
        }
      },
      {
        breakpoint: 576,
        settings: {
          arrows: false,
          slidesToShow: 1,
        }
      }
    ]
  });

  $(".video-button").magnificPopup({
    type: "iframe",
    gallery: {
        enabled: true,
    },
});

  //=====NICE SELECT========
  $('.select_js').niceSelect();


});





