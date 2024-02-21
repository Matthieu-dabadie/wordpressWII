alert("coucou");

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
    '<div class="scroll-top-icon"><i class="fas fa-arrow-up"></i></div>'
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
});

// slider

jQuery(document).ready(function ($) {
  var gallery = $(".themeTuto-gallery");
  var slides = gallery.find("img");
  var totalSlides = slides.length;
  var currentSlide = 0;

  function showSlide(index) {
    slides.removeClass("active");
    slides.eq(index).addClass("active");
    $(".pagination-dot").removeClass("active");
    $(".pagination-dot").eq(index).addClass("active");
  }

  function nextSlide() {
    currentSlide = (currentSlide + 1) % totalSlides;
    showSlide(currentSlide);
  }

  function prevSlide() {
    currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
    showSlide(currentSlide);
  }

  // Cachez toutes les images sauf la première
  slides.slice(1).hide();

  // Ajoutez des points de pagination
  gallery.after('<div class="pagination"></div>');
  for (var i = 0; i < totalSlides; i++) {
    $(".pagination").append('<span class="pagination-dot"></span>');
  }

  // Ajoutez des gestionnaires d'événements pour les points de pagination
  $(".pagination-dot").click(function () {
    var index = $(this).index();
    showSlide(index);
  });

  // Ajoutez des gestionnaires d'événements pour les boutons
  $(".prev").click(prevSlide);
  $(".next").click(nextSlide);

  // Affichez le premier point actif
  $(".pagination-dot").eq(0).addClass("active");
});
