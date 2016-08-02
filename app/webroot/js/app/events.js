$(document).ready(function(){

  /* Apply slick carousel to timezone list */
  $("#timezones .continents").slick({
		dots: true,
		infinite: true,
		slidesToShow: 2,
		slidesToScroll: 1,
		draggable: true,
	});

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


  /*
    Team lookup
  */
  var searchTeams = function(input) {
    $.ajax(
      {
        url : '/teams/search/' + input.target.value + '.json',
        method : 'get'
      }
    ).done(function(response){
      displayTeams(input.target, response);
    });
  };

  var displayTeams = function(element, response) {

    var data = JSON.parse(response),
        markup = '',
        $target = $(element);

    $target.siblings('.team-list').remove();
    for(team in data) {
      markup += '<li><a href="#' + data[team].id + '">' + data[team].name + '</a></li>';
    }
    markup = '<ul class="team-list">' + markup + '</ul>';
    $target.after(markup);
  };

  $('.team-lookup').on('keyup', searchTeams);

});
