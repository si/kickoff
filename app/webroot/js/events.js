$(document).ready(function(){

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
