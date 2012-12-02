$(document).ready(function() { 
  $("label").inFieldLabels(); 
  $("select").each().change(function(){
    $('label[for="reason"]').hide();
  });
});