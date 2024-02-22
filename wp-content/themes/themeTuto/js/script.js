jQuery(document).ready(function ($) {
  // Cache le menu en mode mobile au chargement de la page
  if ($(window).width() <= 768) {
    $("#menuPrincipal").hide();
  }

  // Menu burger
  $(".burger-icon").on("click", function () {
    $("#menuPrincipal").slideToggle();
  });

  // Icône de scroll top
  var scrollTopIcon = $(
    '<div class="scroll-top-icon"><i class="fas fa-arrow-up scroll-top-arrow"></i></div>'
  );
  $("body").append(scrollTopIcon);

  $(window).scroll(function () {
    if ($(this).scrollTop() > 220) {
      //J'ai reduit a 220px
      scrollTopIcon.fadeIn();
    } else {
      scrollTopIcon.fadeOut();
    }
  });

  scrollTopIcon.on("click", function () {
    $("html, body").animate(
      {
        scrollTop: 0,
      },
      800
    );
  });

  // Affichez le premier point actif
  $(".pagination-dot").eq(0).addClass("active");

  // Appliquer une couleur noire à l'icône de la flèche scroll top
  $(".scroll-top-arrow").css("color", "#000");
});
