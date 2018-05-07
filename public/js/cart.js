var placeSearch, autocomplete;
var componentForm = {
    street_number: 'short_name',
    route: 'long_name',
    locality: 'long_name',
    administrative_area_level_1: 'short_name',
    country: 'long_name',
    postal_code: 'short_name'
};

function initAutocomplete() {
    autocomplete = new google.maps.places.Autocomplete(
        /** @type {!HTMLInputElement} */
        (document.getElementById('city')), {
            types: ['(cities)'], componentRestrictions: {'country': 'co'}
        }
    );
    autocomplete.addListener('place_changed', fillInAddress);
}

function fillInAddress() {
    var place = autocomplete.getPlace();
    for (x in place.address_components) {
        tipo = place.address_components[x].types[0];
        if (tipo == 'route') {
            val = place.address_components[x].long_name;
            document.getElementById('address_2').value = val;
        } else if (tipo == 'administrative_area_level_1') {
            val = ''
            for (y in place.address_components) {
                if (place.address_components[y].types[0] == 'administrative_area_level_2') {
                    val = place.address_components[y].long_name+', ';
                }
            }
            val += place.address_components[x].long_name;
            $('#city').val(val);
        }
    }
}

$("#armaForm").validate();
