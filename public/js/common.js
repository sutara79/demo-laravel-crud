$(function() {
  $('.js-form-del').on('submit', function(ev) {
    ev.preventDefault();
    if (window.confirm('Are you sure to delete?')) {
      this.submit();
    }
  });
});