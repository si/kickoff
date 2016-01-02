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
    var url = $(link).attr('href');
    if(provider.toLowerCase() === 'apple') {
      url = setWebCalProtocol(url);
    }

    link
      .siblings('.atc__options:first')
      .append('<a href="' + url + '" class="btn atc__provider atc__' + provider.toLowerCase() + '">' + provider + '</a>');

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
  var setWebCalProtocol = function(url) {
    var domain = window.location.hostname,
        protocol = 'webcal://';
    if(url.indexOf(domain) === -1) {
      url = protocol + domain + url;
    } else {
      url = url.replace('http://', protocol);
    }
    return url;
  };

  addToCal();

});