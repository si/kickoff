$(document).ready(function(){

  /* Auto-populate Event Summary from home and away teams */
  $('#EventHome, #EventAway').keypress(function(e){
    $('#EventSummary').val($('#EventHome').val() + ' v ' + $('#EventAway').val());
  });

});
