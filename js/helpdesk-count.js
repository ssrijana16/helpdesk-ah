(function ($) {


/*$(".like-unlike-text >ul >li:first-child").click(function() {
  $(this).toggleClass('clicked-like').siblings().removeClass('clicked-unlike'); 
  });
$(".like-unlike-text >ul >li:last-child").click(function() {
  $(this).toggleClass('clicked-unlike').siblings().removeClass('clicked-like'); 
  });*/

  
$('.like').click(function(e) {
  e.preventDefault();
  var postId = $(this).attr('data-id');
   $('.dislike').removeClass('clicked-unlike');
  $.ajax({
    type: "POST",
    url: ajaxCount.ajax_url,
    data:{
      action : 'increment-counter', 
      nonce : ajaxCount.ajax_nonce,
      postID : postId,
    },     
    success: function(data) {   
      //console.log(data);
      $('.like').addClass('clicked-like');
      //alert('success');     

    },
    error: function(xhr, status, error) {
      console.log(error);
      alert('got an error');
    }
  });


});

$('.dislike').click(function(e) {
  e.preventDefault();
  $('.like').removeClass('clicked-like');
  var postId = $(this).attr('data-id');
 
  $.ajax({
    type: "POST",
    url: ajaxCount.ajax_url,
    data:{
      action : 'decrement-counter', 
      nonce : ajaxCount.ajax_nonce,
      postID : postId,
    },     
    success: function(data) {   
      //console.log(data);
      //alert('success'); 
      $('.dislike').addClass('clicked-unlike');    

    },
    error: function(xhr, status, error) {
      console.log(error);
      alert('got an error');
    }
  });


});



})(jQuery);