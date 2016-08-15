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
      displayTeams(input.target, response)
      initListOptions();
    });
  };

  var displayTeams = function(element, response) {

    var data = JSON.parse(response),
        markup = '',
        $target = $(element);

    // Wrap lookup if not already
    
  //  console.log( $target.parent().is('.team-lookup-wrapper') );
    if( ! $target.parent().is('.team-lookup-wrapper') ) {
//      console.log('wrapping');
      $($target).wrap('<div class="team-lookup-wrapper" />');
    }

    // Remove existing list
    $target.siblings('.team-list').remove();

    // Build options
    for(team in data) {
      markup += '<li><a href="#' + data[team].slug + '" data-for="' + element.id + '">' + data[team].name + '</a></li>';
    }
    markup = '<ul class="team-list">' + markup + '</ul>';

    // Place options after target
    $target.after(markup);
  };

  var selectTeam = function(element) {
    var $target = $(element.target),
        input = '#' + $target.attr('data-for'),
        name = $target.text();
    $(input).val(name);
    hideSuggestions();
  };

  var hideSuggestions = function() {
    $('.team-list').remove();
  };

  var initListOptions = function() {
    $('.team-list a').on('click', selectTeam);
  }

  var initLookup = function() {
    $('.team-lookup').on('keyup', searchTeams);
    initListOptions();
  };

  initLookup();

});
