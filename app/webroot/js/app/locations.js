// Auto-update location preview based on lat/long settings
$(function(){
    var getCoords = function() {
        console.log('Get coordinates');
        return $('#LocationLat').val() + ',' + $('#LocationLong').val();
    };

    var setPreview = function() {
        console.log('Set preview');
        var center = getCoords(),
            googleMapUrl = '//maps.googleapis.com/maps/api/staticmap?center=' + center 
                + '&size=800x600'
                + '&style=element:labels|visibility:off'
                + '&style=element:geometry.stroke|visibility:off'
                + '&style=feature:landscape|element:geometry|saturation:-100'
                + '&style=feature:water|saturation:-100|invert_lightness:true'
                + '&key=AIzaSyBMISecHzJR_Mie1nlsQWpQkv-E6B7ZFno';
        $('.map')
            .css('background-image', 'url(' + googleMapUrl + ')')
            .text(center);
    };

    var setListeners = function() {
        console.log('Set listeners');
        $('#LocationLat, #LocationLong').on('change', setPreview);
    }();

});
