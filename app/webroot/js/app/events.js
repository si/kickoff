$(document).ready(function(){


  /* Auto-populate Event Summary from home and away teams */
  var createEventSummary = function() {
    $('#EventSummary').val($('#EventHome').val() + ' v ' + $('#EventAway').val());
  }

  $('#EventHome, #EventAway').on('change', createEventSummary);
  $('#EventHome, #EventAway').on('keyup', createEventSummary);

  $('#EventStart, #EventEnd').datetimepicker({
    language: 'en',
    pick12HourFormat: true,
    pickSeconds: false
  });
  
});
