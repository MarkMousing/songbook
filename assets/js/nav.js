$(function() {
  $('.burger').click(function() {
    $('.burger-list').removeClass('list-closed');
    $('.burger-close').removeClass('close-closed');
  });

  $('.burger-close').click(function() {
    $('.burger-list').addClass('list-closed');
    $('.burger-close').addClass('close-closed');
  });

  $('.close-icon').click(function() {
    $('.burger-list').addClass('list-closed');
    $('.burger-close').addClass('close-closed');
  });
});
