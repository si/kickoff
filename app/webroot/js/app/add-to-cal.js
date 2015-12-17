$(document).ready(function(){

  // Setup calendar shortcuts
  var addToCal = function() {
    var $calLink = $('a[type="text/calendar"]');
    if($calLink.length > 0) {
      formatCalLink($calLink);
      addShortcutLink($calLink, 'Google');
      addShortcutLink($calLink, 'Windows');
      addShortcutLink($calLink, 'Apple');

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
      .wrap('<div class="atc" />')
      .after('<div class="atc__options" />');
  };

  // Bind calendar shortcut links to existing calendar link
  var addShortcutLink = function(link, provider) {
    link
      .siblings('.atc__options:first')
      .append('<a href="#' + provider.toLowerCase() + '" class="btn provider atc__' + provider.toLowerCase() + '">' + provider + '</a>');
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

  addToCal();

});