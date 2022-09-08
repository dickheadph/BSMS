function resizeWindow() {
  let widthsidebar = $(window).width();

  if (widthsidebar >= 768) {
    $(".sidebar_navbar").addClass("active");
  } else {
    $(".sidebar_navbar").removeClass("active");
  }
}

$(window).resize(function () {
  resizeWindow();
});

$(".navabar_menu").click(function () {
  $(".sidebar_navbar").toggleClass("active");
});

$(".sidebar_navbar.active span").click(function () {
  $(".sidebar_navbar").toggleClass("active");
});