/**
 * JavaScript to generate google maps using the Google Maps API
 * 
 * Requires the following script include:
 * 
 * https://maps.googleapis.com/maps/api/js?key={your_google_maps_key}&sensor=true
 * 
 * Requires the following HTML
 * 
 * 	<div style="width:300px; height: 300px; border: solid 1px #333;">
 *  	<div id="map_canvas" style="width:100%; height:100%"></div>
 * 	</div>
 *	
 *	<script>
 *	    jQuery(document).ready(function () {
 *	        gmap = new ggMap('some address', 10);
 *	        gmap.addLocation('some address');
 *	    });
 *	</script>
 * 
 */

var map;
var geocoder;

ggMap = function (startingLocation, startZoom) {
	
	var self = this;
	
	this.addLocation = function (address) {
		geocoder.geocode( { 'address': address }, function( results, status ) {
	    	if (status == google.maps.GeocoderStatus.OK) {
				var marker = new google.maps.Marker({
				    map: map,
				    position: results[0].geometry.location
				});
			} else {
			    alert("Geocode was not successful for the following reason: " + status);
			}
		});
	};
	
	var mapOptions = {
        //center: new google.maps.LatLng(-34.397, 150.644),
        zoom: startZoom,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);  
    geocoder = new google.maps.Geocoder();
    
    geocoder.geocode( { 'address': startingLocation }, function( results, status ) {
    	if (status == google.maps.GeocoderStatus.OK) {
			map.setCenter(results[0].geometry.location);
		} else {
		    alert("Geocode was not successful for the following reason: " + status);
		}
	});
	
}
