
$( "#search-input" ).keyup(function( event ) {
  if ( event.which == 13 ) {
   event.preventDefault();
  }
  $textLength = $( "#search-input" ).val().length;
  
  if($textLength >= 2 ) {
    $.ajax({
      type: "POST",
      url: myAjax.ajaxUrl,
      data:{
        action : 'ajax_search', 
        searchParam : $( "#search-input" ).val(),
      },
      beforeSend: function() {
        $( "#search-input" ).addClass('loadingClass');
      },
      success: function(data) {   
        console.log(data);
        $( "#search-input" ).removeClass('loadingClass');
        jQuery(".searchResults").html(data);

      },
      error: function(xhr, status, error) {
        alert('got an error');
      }
    });
  } else {
    jQuery(".searchResults").html('');
  }
});

$( "#search-inputs" ).keyup(function( event ) {
  if ( event.which == 13 ) {
   event.preventDefault();
  }
  $textLength = $( "#search-inputs" ).val().length;
  
  if($textLength >= 2 ) {
    $.ajax({
      type: "POST",
      url: myAjax.ajaxUrl,
      data:{
        action : 'ajax_search', 
        searchParam : $( "#search-inputs" ).val(),
      },
      beforeSend: function() {
        $( "#search-inputs" ).addClass('loadingClass');
      },
      success: function(data) {   
        console.log(data);
        $( "#search-inputs" ).removeClass('loadingClass');
        jQuery(".searchResultss").html(data);

      },
      error: function(xhr, status, error) {
        alert('got an error');
      }
    });
  } else {
    jQuery(".searchResultss").html('');
  }
});