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

  // Setup calendar shortcuts
  var addShortcuts = function() {
    var $calLink = $('a[type="text/calendar"]');
    if($calLink.length > 0) {
      formatCalLink($calLink);
      addShortcutLink($calLink, 'Google');
      addShortcutLink($calLink, 'Outlook');
      addShortcutLink($calLink, 'Mac');

      $calLink.on('click', showShortCuts);
    }
  };

  var showShortCuts = function (ev) {
    ev.preventDefault();
    window.console && console.log(this, 'clicked');
    $(this).toggleClass('expand');
  };

  var formatCalLink = function(link) {
    $(link)
      .wrap('<div class="add-to-cal" />');
  };

  // Bind calendar shortcut links to existing calendar link
  var addShortcutLink = function(link, provider) {
    link.after('<a href="#' + provider.toLowerCase() + '" class="btn provider">' + provider + '</a>');
  };

  // Test for ICS supported platforms
  var isWebCal = function() {

    var iDevices = [
      'iPad Simulator',
      'iPhone Simulator',
      'iPod Simulator',
      'iPad',
      'iPhone',
      'iPod',
      'MacIntel'
    ];
    while (iDevices.length) {
      if (navigator.platform === iDevices.pop()){ return true; }
    }
    return false;
  };

  // Set webcal: protocol on supported systems
  var setWebCalProtocol = function() {

    if( isWebCal() ) {
      var $calLinks = $('a[type="text/calendar"]');
      $calLinks.each(function(i, el){
        var href = $(el).attr('href'),
            domain = window.location.hostname,
            protocol = 'webcal://';
        if(href.indexOf(domain) === -1) {
          href = protocol + domain + href;
        } else {
          href = href.replace('http://', protocol);
        }
        $(el).attr('href', href);
      });
    }
  };

  addShortcuts();
  //setWebCalProtocol();

});
