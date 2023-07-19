(function ($) {
//smoothscroll
$('.block-listing-wrap >ul>li>a').click(function(e){
  e.preventDefault();
  var target = $($(this).attr('href'));
  if(target.length){
    var scrollTo = target.offset().top-100;
    $('body, html').animate({scrollTop: scrollTo+'px'}, 800);
  }
});

 // Scroll to Top
 $(window).scroll(function() {
 if ($(this).scrollTop() > 600) {
 $('#toTop').fadeIn();
 } else {
 $('#toTop').fadeOut();
}
 });

  $("#toTop").click(function (){
    $('html, body').animate({
      scrollTop: $("#section").offset().top-100
    }, 800);
  });


if($(window).width() >= 768){
$("a.js-anchor-link").click(function() {
    $('html, body').animate({
        scrollTop: $("#singleContent").offset().top-120
    }, 2000);
});
}


if($(window).width() <= 768){
$("a.js-anchor-link").click(function() {
    $('html, body').animate({
        scrollTop: $("#singleContent").offset().top-70
    }, 2000);
});
}


//scroll-to-next-page
$(document).ready(function (e) {

  if (window.location.hash) {
    scrollToSection(window.location.hash);
  }

});

$('a[href$="#"]').click(function (e) {
  e.preventDefault();

  if (this.pathname === window.location.pathname) {
    scrollToSection(this.hash);
  }
  else {
    
    window.location.replace(this.href);
  }
});

if($(window).width() >= 768){
  
function scrollToSection(id) {

  $('html, body').animate({
    scrollTop: $(id).offset().top-120
  }, 100);
}
}

if($(window).width() <= 768){
  
function scrollToSection(id) {

  $('html, body').animate({
    scrollTop: $(id).offset().top-70
  }, 100);
}
}


$(document).ready(function () {
  if($(window).width() >= 768){
  $('a.js-anchor-link').click(function() {
  $('html, body').animate({
    scrollTop: $("#singleContent").offset().top-120
  },)
})
}

  if($(window).width() <= 768){
  $('a.js-anchor-link').click(function() {
  $('html, body').animate({
    scrollTop: $("#singleContent").offset().top-180
  },)
})
}

});







// Select all »a« elements with a parent class »links« and add a function that is executed on click
$( '.links a' ).on( 'click', function(e){
  
  // Define variable of the clicked »a« element (»this«) and get its href value.
  var href = $(this).attr( 'href' );
  
  // Run a scroll animation to the position of the element which has the same id like the href value.
  $( 'html, body' ).animate({
    scrollTop: $( href ).offset().top
  }, '300' );
  
  // Prevent the browser from showing the attribute name of the clicked link in the address bar
  e.preventDefault();

});





  // accordion custom

  $(".accordion-list > li > .answer").hide();

  $(".accordion-list > li").click(function () {
    if ($(this).hasClass("active")) {
      $(this).removeClass("active").find(".answer").slideUp();
    } else {
      $(".accordion-list > li.active .answer").slideUp();
      $(".accordion-list > li.active").removeClass("active");
      $(this).addClass("active").find(".answer").slideDown();
    }
    return false;
  });


var supportSVG = {
      init: function () {
          $("img.svg").each(function () {
              var $img = jQuery(this);
              var imgID = $img.attr("id");
              var imgClass = $img.attr("class");
              var imgURL = $img.attr("src");
              var imgwidth = $img.attr("width");
              var imgheight = $img.attr("height");

              $.get(
                  imgURL,
                  function (data) {
                      // Get the SVG tag, ignore the rest
                      var $svg = $(data).find("svg");
                      // Add replaced image's ID to the new SVG
                      if (typeof imgID !== "undefined") {
                          $svg = $svg.attr("id", imgID);
                      }

                      // Add replaced image's classes to the new SVG
                      if (typeof imgClass !== "undefined") {
                          $svg = $svg.attr("class", imgClass + " replaced-svg");
                          $svg = $svg.attr({
                              width: imgwidth,
                              height: imgheight,
                          });
                      }
                      // Remove any invalid XML tags as per http://validator.w3.org
                      $svg = $svg.removeAttr("xmlns:a");
                      // Replace image with new SVG
                      $img.replaceWith($svg);
                  },
                  "xml"
              );
          });
      },
  };

$(".fixed-menus-wrap >ul >li").click(function() {
  $(this).toggleClass('active').siblings().removeClass('active'); 
  });
$(".block-listing-wrap >ul >li").click(function() {
  $(this).toggleClass('active-icon').siblings().removeClass('active-icon'); 
  });
/*$(".like-unlike-text >ul >li:first-child").click(function() {
  $(this).toggleClass('clicked-like').siblings().removeClass('clicked-unlike'); 
  });
$(".like-unlike-text >ul >li:last-child").click(function() {
  $(this).toggleClass('clicked-unlike').siblings().removeClass('clicked-like'); 
  });*/


$('.contact-cat').click(function(event) {
    event.preventDefault();
    var catId = $(this).closest('li').attr('data-id');
    //alert(catId);
    $(".three-column-wrapper .row").html("Content Loading....");
    $.ajax({
      type: "POST",
      url: ajax_object.ajax_url,
      data:{
        action : 'load-filter', 
        catID : catId,
      },     
      success: function(data) {   
        //console.log(data);
        //alert('success');
       // $( "#search-input" ).removeClass('loadingClass');
        jQuery(".three-column-wrapper .row").html(data);

      },
      error: function(xhr, status, error) {
        alert('got an error');
      }
    });

  });

  $(function () {
        supportSVG.init();
    });
})(jQuery);