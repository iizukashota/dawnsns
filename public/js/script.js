$(function () {
  $('.accordion-button').click(function () {
    $(this).toggleClass('active');
    $('.accordion-menu').slideToggle();
  });
});

$(function () {
  $('.modelopen').each(function () {
    $(this).on('click', function () {
      var target = $(this).data('target');
      var modal = document.getElementById(target);
      $(modal).fadeIn();
      return false;
    });
  });
  $('.modalClose').on('click', function () {
    $('.js-modal').fadeOut();
    return false;
  });
});
