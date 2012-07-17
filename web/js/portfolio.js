$(document).ready(function() {
    $('.filter-sub-menu').hide();
    $("ul.navbar li").removeClass('active');
    $("li#portfolio-link").addClass('active');
    $('.lightbox').lightbox();
    $(function() {
            // add fancy jQuery UI button styles.  See additional in "CSS" below
	    $(".taglist a").button({icons:{primary:'ui-icon-trash'}, text: false});
    });
    $('.filter-type#status').mouseover(function() {$('.filter-sub-menu').hide();$('ul#status-sub-menu').show();});
    $('.filter-type#category').mouseover(function() {$('.filter-sub-menu').hide();$('ul#category-sub-menu').show();});
    $('.filter-type#status').click(function() {$('.filter-sub-menu').hide();$('ul#status-sub-menu').show();});
    $('.filter-type#category').click(function() {$('.filter-sub-menu').hide();$('ul#category-sub-menu').show();});
});
function remove_tag (tag, element) {
  remove_field = $("#portfolio_remove_tags");
  if ( remove_field.val().length ) {
    remove_field.val( remove_field.val()  + "," + tag );
  }
  else {
    remove_field.val( tag );
  }
  $(element).hide();
  $("#remove_tag_help").show();
}

function sub_menu_on(e) {
  console.log(e);
  //if(!$('#'+e).is(':visible')) {
    
  //} 
}
function load_content() { 
  $('#loading').show(1,function() { $('#porfolio-content').fadeOut() }); 
}
function load_complete() {
  $('#loading').hide(1,function() { $('#porfolio-content').fadeIn(); });
} 