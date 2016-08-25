<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSuRSONWkdv2Gk7T6G8OEqYNHHarultFw=&libraries=places"></script>

<script type="text/javascript">
    function getLocation() {
        var geocoder = new google.maps.Geocoder;
        var locationElement = document.getElementById('location');
        locationElement.disabled = true;

        if (navigator.geolocation)
            navigator.geolocation.getCurrentPosition(function (position){

                console.log(position.coords.latitude+ "  " + position.coords.longitude);
                var latlng = {lat: position.coords.latitude, lng:  position.coords.longitude};
                geocoder.geocode({'location': latlng}, function(results, status) {
                    if (status === google.maps.GeocoderStatus.OK) {
                        if (results[2]) {
                            locationElement.value = results[2].address_components[1].long_name;
                        }
                    }
                });
            });

        locationElement.disabled = false;

        return false;
    }

    var options = {
        types: ['(cities)'],
        componentRestrictions: {country: 'in'}
    };


    var input = document.getElementById('location');
    var autocomplete = new google.maps.places.Autocomplete(input, options);


</script>
