$(document).ready(function(){

  /* Auto-populate Event Summary from home and away teams */
  var createEventSummary = function() {
    $('#EventSummary').val($('#EventHome').val() + ' v ' + $('#EventAway').val());
  };

  $('#EventHome, #EventAway').on('change', createEventSummary);
  $('#EventHome, #EventAway').on('keyup', createEventSummary);

  // Apply date/time picker to event start and end fields
  $('#EventStart, #EventEnds').datetimepicker({
    language: 'en',
    pick12HourFormat: true,
    pickSeconds: false
  });

  var updateEventEnd = function() {
    var end = $('#EventEnds');
    window.console && console.log(end);
    if(end.val() === '') {
      end.val( $('#EventStart').val() );
    }
  };

  $('#EventStart').on('blur', updateEventEnd);

});
