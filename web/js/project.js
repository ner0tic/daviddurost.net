$(document).ready(function() {
  $('.content-pane img').width(screen.width-$('.sidebar').width()-30);
  $('li.git-commit').hover(
    function() {
      $(this).find('img').attr('src',$(this).find('img').attr('src').replace('_gs',''));
    },
    function() {
      $(this).find('img').attr('src',$(this).find('img').attr('src').replace('github','github_gs'));
    })
});