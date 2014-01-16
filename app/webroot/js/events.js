$(document).ready(function(){

  $('.navbar-form').bind('submit',function(e){
    e.preventDefault();
    alert("Authentication hasn't been built yet.");
    return false;
  });


  /* Auto-populate Event Summary from home and away teams */
  $('#EventHome, #EventAway').keydown(function(e){
    $('#EventSummary').val($('#EventHome').val() + ' v ' + $('#EventAway').val());
  });

  $('#EventStart, #EventEnd').datetimepicker({
    language: 'en',
    pick12HourFormat: true,
    pickSeconds: false
  });

});
