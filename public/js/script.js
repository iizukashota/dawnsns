$(function () {
  $('.accordion-button').click(function () {
    $(this).toggleClass('active');
    $('.accordion-menu').slideToggle();
  });
});

$(function () {
  $('.modalopen').each(function () {
    $(this).on('click', function () {
      var target = $(this).data('target');
      var modal = document.getElementById(target);
      $(modal).fadeIn();
      return false;
    });
  });
  $('.modalclose').on('click', function () {
    $('.modal').fadeOut();
    return false;
  });
});
