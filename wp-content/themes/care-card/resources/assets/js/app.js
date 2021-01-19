import jQuery from 'jquery';
import 'bootstrap';
// Inject YouTube API script


(function ($) {


  $(window).scroll(function () {
    if ($(this).scrollTop() > 10) {
      $('#masthead').addClass("fixed-top");
      // add padding top to show content behind navbar
    } else {
      $('#masthead').removeClass("fixed-top");
      // remove padding top from body
    }
  });

  $(document).ready(function () {

    $('iframe').attr('id', 'video');

    $('#play').on('click', function (e) {

      $('iframe').css('display:block');

      var videoURL = $('#video').prop('src');
      videoURL += "&autoplay=1";
      $('#video').prop('src', videoURL);

      $(this).parent().addClass('active');
      e.preventDefault();
    });

    $('#stop').on('click', function (e) {
      var videoURL = $('#video').prop('src');
      videoURL = videoURL.replace("&autoplay=1", "");
      $('#video').prop('src', '');
      $('#video').prop('src', videoURL);

      $(this).parent().removeClass('active');

      e.preventDefault();
    });


    $("#join-now-btn .content").click(function () {
      $("#join-overlay").addClass("animated fadeInLeft open").one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
        $(this).removeClass("animated fadeInLeft");
      });
    });
    $("#join-overlay .close-icon").click(function () {
      $("#join-overlay").addClass("animated flipOutY ").one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
        $(this).removeClass("animated flipOutY open");
      });
    });
    $("#east .content").click(function () {
      $("#east-overlay").addClass("animated fadeInRight open").one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
        $(this).removeClass("animated fadeInRight");
      });
      $("#east-overlay .product-content").addClass("animated flipInY ").one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
        $(this).removeClass("animated flipInY");
      });
    });
    $("#east-overlay .close-icon").click(function () {
      $("#east-overlay").addClass("animated flipOutY ").one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
        $(this).removeClass("animated flipOutY open");
      });
    });
  });

  $('.js-input').keyup(function () {
    if ($(this).val()) {
      $(this).addClass('not-empty');
    } else {
      $(this).removeClass('not-empty');
    }
  });

  $('.toggle-menu').click(function () {
    $(this).toggleClass('active');
    $('#menu').toggleClass('open');
  });

  $(document).ready(function(){"use strict";

    //Scroll back to top

    var progressPath = document.querySelector('.progress-wrap path');
    var pathLength = progressPath.getTotalLength();
    progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
    progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
    progressPath.style.strokeDashoffset = pathLength;
    progressPath.getBoundingClientRect();
    progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';
    var updateProgress = function () {
      var scroll = $(window).scrollTop();
      var height = $(document).height() - $(window).height();
      var progress = pathLength - (scroll * pathLength / height);
      progressPath.style.strokeDashoffset = progress;
    }
    updateProgress();
    $(window).scroll(updateProgress);
    var offset = 50;
    var duration = 550;
    jQuery(window).on('scroll', function() {
      if (jQuery(this).scrollTop() > offset) {
        jQuery('.progress-wrap').addClass('active-progress');
      } else {
        jQuery('.progress-wrap').removeClass('active-progress');
      }
    });
    jQuery('.progress-wrap').on('click', function(event) {
      event.preventDefault();
      jQuery('html, body').animate({scrollTop: 0}, duration);
      return false;
    })


  });


})(jQuery)
