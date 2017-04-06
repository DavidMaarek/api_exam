$("#search_form").submit(function(e) {

  $("#result").html("");

  e.preventDefault();

  var searchQuery = $("#search_txt").val();
  //searchQuery =

  if (!searchQuery) {
    //code
    searchQuery = "hello";
  }

  $.ajax({
    type: "GET",
    dataType: "jsonp",
    url: "https://www.googleapis.com/customsearch/v1",
    data: {
      key: "AIzaSyCzb6SI_JRrp6xLLYV617Ary6n59h36ros",
      cx: "004286675445984025592:ypgpkv9fjd4",
      filter: "1",
      searchType: "image",
      //imgSize: "small",
      q: searchQuery
    }
  }).done(function(data) {


    //alert("Success");
    console.log(data);
    var googleResults = data.items;

    $(".result li").remove();
    //$('#result').isotope('destroy');


    $.each(googleResults, function(i, o) {

      var imageURL = o.image.thumbnailLink;

      if (i % 2 != 0) {

        $("#result").append("<div class='result_item'><img src='" + imageURL + "' /></div>");

      } else {

        $("#result").append("<div class='result_item'><img src='" + imageURL + "' /></div>");

      }


    })



  });



  function make_base_auth(user, password) {
    var tok = user + ':' + password;
    var hash = btoa(tok);
    return "Basic " + hash;
  }

  


  });