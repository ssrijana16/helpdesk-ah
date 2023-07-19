(function ($) {




  // match height
  $('.common-leads-logo').matchHeight();
  $('.list-0').matchHeight();
  $('.list-1').matchHeight();
  $('.list-2').matchHeight();
  $('.list-3').matchHeight();
  $('.list-4').matchHeight();
  $('.list-5').matchHeight();
  $('.list-6').matchHeight();
  $('.list-7').matchHeight();
  $('.list-8').matchHeight();
  $('.list-9').matchHeight();
  $('.list-10').matchHeight();
  $('.list-11').matchHeight();
  $('.list-12').matchHeight();
  $('.list-13').matchHeight();
  $('.list-14').matchHeight()




  /* hamburger menu */

  $(".hamburger").on("click", function () {
    $("body").toggleClass("ham-open");
  });



  /* mobile menu hamburger submenu */
  $(".menu-item-has-children:not(.icon-class.menu-item-has-children)").on(
    "click",
    function () {
      $(this).removeClass("et-show-dropdown");
      $(this).addClass("et-show-dropdown");
    }
  );



  // svg

  $('.svg').each(function () {
    var img = $(this);
    var image_uri = img.attr('src');

    $.get(image_uri, function (data) {
      var svg = $(data).find('svg');
      svg.removeAttr('xmlns:a');
      img.replaceWith(svg);
    }, 'xml');

  });


})(jQuery);
