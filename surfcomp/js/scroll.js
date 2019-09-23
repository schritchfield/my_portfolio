$(function(){

//ADDS bg to navbar on scroll
  $(window).scroll(function() {
    if ($(window).scrollTop() > 56) {
      $(".navbar").addClass("navbg");
    } else {
      $(".navbar").removeClass("navbg");
    }
  });
  // If Mobile, add background color when toggler is clicked
  $(".navbar-toggler").click(function() {
    if (!$(".navbar-collapse").hasClass("show")) {
      $(".navbar").addClass("bg-dark");
    } else {
      if ($(window).scrollTop() < 56) {
        $(".navbar").removeClass("bg-dark");
      } else {
      }
    }
  });
});