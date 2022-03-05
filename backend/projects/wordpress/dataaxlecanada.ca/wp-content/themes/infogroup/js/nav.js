$('.dropdown').on('mouseenter mouseleave click tap', function() {
  $(this).find('.dropdown-menu').slideToggle(200);
});