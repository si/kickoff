$(document).ready(function(){

  $('.navbar-form').on('submit',function(e){
    e.preventDefault();
    alert("Authentication hasn't been built yet.");
    return false;
  });


  /* Auto-populate Event Summary from home and away teams */
  $('#EventHome, #EventAway').on('keydown', function(e){
    $('#EventSummary').val($('#EventHome').val() + ' v ' + $('#EventAway').val());
  });

  $('#EventStart, #EventEnd').datetimepicker({
    language: 'en',
    pick12HourFormat: true,
    pickSeconds: false
  });
  
});
