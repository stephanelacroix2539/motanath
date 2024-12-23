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