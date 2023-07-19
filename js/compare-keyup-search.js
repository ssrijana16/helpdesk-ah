//Keyword 1
$("#keyword1").keyup(function () {
  let keyword_1 = $("#keyword1").val();
  if (keyword_1.length >= 1) {
    $(".dropdown1").css({ "display": "block" });
    var input, filter, ul, li, a, i;
    input = document.getElementById("keyword1");
    filter = input.value.toUpperCase();
    div = document.getElementById("myDropdown1");
    a = div.getElementsByTagName("a");
    for (i = 0; i < a.length; i++) {
      txtValue = a[i].textContent || a[i].innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        a[i].style.display = "";
      } else {
        a[i].style.display = "none";
      }
    }
  }
  else {
    $(".dropdown1").css({ "display": "none" });
  }
});

//Keyword 2
$("#keyword2").keyup(function () {
  let keyword_2 = $("#keyword2").val();
  var input, filter, ul, li, a, i;
  input = document.getElementById("keyword2");
  filter = input.value.toUpperCase();
  div = document.getElementById("myDropdown2");
  a = div.getElementsByTagName("a");
  for (i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = "";
    } else {
      a[i].style.display = "none";
    }
  }
  if (keyword_2.length >= 1) {
    $(".dropdown2").css({ "display": "block" });
  } else {
    $(".dropdown2").css({ "display": "none" });
  }
});

//Keyword 3 
$("#keyword3").keyup(function () {
  let keyword_3 = $("#keyword3").val();
  var input, filter, ul, li, a, i;
  input = document.getElementById("keyword3");
  filter = input.value.toUpperCase();
  div = document.getElementById("myDropdown3");
  a = div.getElementsByTagName("a");
  for (i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = "";
    } else {
      a[i].style.display = "none";
    }
  }
  if (keyword_3.length >= 1) {
    $(".dropdown3").css({ "display": "block" });
  } else {
    $(".dropdown3").css({ "display": "none" });
  }
});

function loadAgencyA(id, title) {
  //alert(id);
  $('#keyword1').val(title);
  $(".dropdown1").css({ "display": "none" });
  $.ajax({
    url: urls,
    type: 'post',
    data: {
      action: 'agency_load_function1',
      id: id,
    },
    success: function (data) {
      $('.agency-value-container-A').first().children().remove();
      $('.agency-value-container-A').html(data);
      mobile_ajax(id, 0);
    },
    error: function (err) {
      console.log(err);
    },
    complete: function (data) {
      setTimeout(function () {
        $('.common-leads-logo').matchHeight();
        $('.common-list-element ul').each(function (i, elem) {
          $('.list-' + i).matchHeight();
        });
        $('.common-list-element .list-2').each(function (i, elem) {
          $('.list-2-row-' + i).matchHeight();
        });
      }, 1000);

    },
  });
}

function loadAgencyB(id, title) {
  $('#keyword2').val(title);
  $(".dropdown2").css({ "display": "none" });
  $.ajax({
    url: urls,
    type: 'post',
    data: {
      action: 'agency_load_function2',
      id: id,
    },
    success: function (data) {
      $('.agency-value-container-B').first().children().remove();
      $('.agency-value-container-B').html(data);
      mobile_ajax(0, id); //Calling Another AJAX Function for Mobile View
    },
    error: function (err) {
      console.log(err);
    },
    complete: function (data) {
      setTimeout(function () {
        $('.common-leads-logo').matchHeight();
        $('.common-list-element ul').each(function (i, elem) {
          $('.list-' + i).matchHeight();
        });
        $('.common-list-element .list-2').each(function (i, elem) {
          $('.list-2-row-' + i).matchHeight();
        });
      }, 1000);
    },
  });
}

function loadAgencyC(id, title) {
  $('#keyword3').val(title);
  $(".dropdown3").css({ "display": "none" });
  $.ajax({
    url: urls,
    type: 'post',
    data: {
      action: 'agency_load_function3',
      id: id,
    },
    success: function (data) {
      $('.agency-value-container-C').first().children().remove();
      $('.agency-value-container-C').html(data);
    },
    error: function (err) {
      console.log(err);
    },
    complete: function (data) {
      setTimeout(function () {
        $('.common-leads-logo').matchHeight();
        $('.common-list-element ul').each(function (i, elem) {
          $('.list-' + i).matchHeight();
        });
        $('.common-list-element .list-2').each(function (i, elem) {
          $('.list-2-row-' + i).matchHeight();
        });
      }, 1000);
    },
  });
}

function mobile_ajax(idA, idB) {
  $.ajax({
    url: urls,
    type: 'post',
    data: {
      action: 'mobile_agency_load_function',
      idA: idA,
      idB: idB,
    },
    success: function (data) {
      $('.mobile-display-container').first().children().remove();
      $('.mobile-display-container').html(data);
    },
    error: function (err) {
      console.log(err);
    },
    complete: function (data) {
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

    },
  });
}

//Make Dropdown Visible On Input Field Click
$("#keyword1-label").click(function () {
  let displayProperty1 = $(".dropdown1").css("display");
  if (displayProperty1 == "none") {
    $(".dropdown1").css({ "display": "block" });
  } else {
    $(".dropdown1").css({ "display": "none" });
  }
});

$("#keyword2-label").click(function () {
  let displayProperty2 = $(".dropdown2").css("display");
  if (displayProperty2 == "none") {
    $(".dropdown2").css({ "display": "block" });
  } else {
    $(".dropdown2").css({ "display": "none" });
  }
});

$("#keyword3-label").click(function () {
  let displayProperty3 = $(".dropdown3").css("display");
  if (displayProperty3 == "none") {
    $(".dropdown3").css({ "display": "block" });
  } else {
    $(".dropdown3").css({ "display": "none" });
  }
});

//Hide Dropdown If Click On Other Areas than Listed 
$(document).mouseup(function (event) {
  var keyword1Label = $("#keyword1-label");
  if (!keyword1Label.is(event.target) && keyword1Label.has(event.target).length === 0) {
    $(".dropdown1").css({ "display": "none" });
  }
  var keyword2Label = $("#keyword2-label");
  if (!keyword2Label.is(event.target) && keyword2Label.has(event.target).length === 0) {
    $(".dropdown2").css({ "display": "none" });
  }
  var keyword3Label = $("#keyword3-label");
  if (!keyword3Label.is(event.target) && keyword3Label.has(event.target).length === 0) {
    $(".dropdown3").css({ "display": "none" });
  }
});