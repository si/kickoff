  OAuth.initialize('PrAC1biiHZKuugQ5HjkpFP5FN5w');

  $('#LoginFacebook').on('click', function() {
    OAuth.popup('facebook', function(err, result) {
      // handle error with err
      if(err) console.log(err);
      // use result.access_token in your API request
      if(result) {
        console.log(result);
        result.get("/me").done(function(me) {
          $('#LoginResult').html(' <a href="' + me.link + '" target="_blank"><img src="http://graph.facebook.com/' + me.id + '/picture" class="img-thumbnail pull-left"/>' + me.name + '</a>').fadeIn('fast');
          $('#LoginFacebook').slideUp('fast');
          
        });
      }
    });
  });
