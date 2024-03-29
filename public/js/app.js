var map;
var lat = 59.32893000000001;
var lng = 18.06491;
$(function () {



             
    updatestart();


    $('#search-result').on('pageshow', function (event, ui) {
        $.getJSON("/js/spec.json", function (json) {
            jQuery.each(json.picks, function() {
	            $('#final-list').append("<li id=\"listitem\"><a href=\"#entry\">"+
		        "<img src=\""+this.listing.images+"\" />"+
		        "<h2>"+this.listing.namn+"</h2>"+
		        "<p>"+this.listing.beskrivning+"</p></a>"+
		        "</li>");
            });
           $('ul').listview('refresh'); 
        });
    });

    $('#start').on('pageshow', function (event, ui) {
        updatestart();
    });

});

function updatestart() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(

        function (position) {
            mapServiceProvider(position.coords.latitude, position.coords.longitude);

        },

        function (error) {
            switch (error.code) {
                case error.TIMEOUT:
                    alert('Timeout');
                    break;
                case error.POSITION_UNAVAILABLE:
                    alert('Position unavailable');
                    break;
                case error.PERMISSION_DENIED:
                    alert('Permission denied');
                    break;
                case error.UNKNOWN_ERROR:
                    alert('Unknown error');
                    break;
            }
        });
    }

    $.getJSON("http://rate-exchange.appspot.com/currency?from=USD&to=SEK&callback=?", null, function (json) {
        var rate = Math.round(json.rate * 1000) / 1000;
        $("#rate").html("1 USD = " + rate + " SEK");
    });

}

function initialize() {
    var studentnatet = new google.maps.LatLng(58.3952, 13.856901);
    var mapOptions = {
        zoom: 16,
        center: new google.maps.LatLng(lat, lng),
        disableDefaultUI: true,
        panControl: false,
        zoomControl: true,
        mapTypeControl: false,
        scaleControl: false,
        scrollwheel: false,
        streetViewControl: false,
        overviewMapControl: false,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
}

function loadScript() {
    var script = document.createElement("script");
    script.type = "text/javascript";
    script.src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyCucEjXwzzhFUgemAVdj2py0xF097fXceg&sensor=false&callback=initialize";
    document.body.appendChild(script);

}
window.onload = loadScript;

function mapServiceProvider(latitude, longitude) {
        lat = latitude;
        lng = longitude;
    $.getJSON("/geocode/json", {
        latitude: latitude,
        longitude: longitude
    }, function (json) {
        $('#street').html(json.street);
        $('#city').html(json.city);

    });
}