$(document).ready(function(){

  /* Auto-populate Event Summary from home and away teams */
  var createEventSummary = function() {
    $('#EventSummary').val($('#EventHome').val() + ' v ' + $('#EventAway').val());
  }

  $('#EventHome, #EventAway').on('change', createEventSummary);
  $('#EventHome, #EventAway').on('keyup', createEventSummary);

  // Apply date/time picker to event start and end fields
  $('#EventStart, #EventEnd').datetimepicker({
    language: 'en',
    pick12HourFormat: true,
    pickSeconds: false
  });

  // Setup calendar shortcuts
  var addShortcuts = function() {
    addShortcutLink('Google');
    addShortcutLink('Outlook');
    addShortcutLink('Mac');
  };

  // Bind calendar shortcut links to existing calendar link
  var addShortcutLink = function(provider) {
    var $calLinks = $('a[type="text/calendar"]');
    $calLinks.after('<a href="#' + provider + '" class="btn">' + provider + '</a>');
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
