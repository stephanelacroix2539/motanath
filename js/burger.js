//Menu burger version mobile

//Ouverture
$('#open-fullscreen-menu-button').click(function(e) {
  e.stopPropagation(); 
  $('header').toggleClass('mobile-menu-opened');
  console.log('ouvert');
});

// Fermeture
$('#close-fullscreen-menu-button').click(function() {
  $('header').removeClass('mobile-menu-opened');
  console.log('fermé');
});

// Fermer le menu lors d'un clic en dehors de celui-ci
$(document).click(function(event) {
  if (!$('header').has(event.target).length && !$('header').is(event.target)) {
      $('header').removeClass('mobile-menu-opened');
      // console.log('fermé');
  }
});


// version mobile
document.addEventListener("DOMContentLoaded", function () {
  const isAdminBar = document.body.classList.contains("admin-bar");
  if (isAdminBar) {
      const adminBarHeight = document.getElementById("wpadminbar").offsetHeight || 32;
      const headerMenu = document.querySelector(".header-menu");
      const closeButton = document.querySelector(".close-button");

      if (headerMenu) {
          headerMenu.style.top = `${adminBarHeight + 10}px`;
          headerMenu.style.height = `calc(100% - ${adminBarHeight + 10}px)`;
      }

      if (closeButton) {
          closeButton.style.top = `${adminBarHeight + 10}px`;
      }
  }
});
