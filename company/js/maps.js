var key = 'AIzaSyAsSFGDF9I8ccXM0XAHWQXLpjLwH-B5sGw';
var map;
var hwLocation = { lat: 55.913, lng: -3.323 }

function initMap() {
    map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: 55.913, lng: -3.323 },
        zoom: 13,
    });

    const marker = new google.maps.Marker({
        position: hwLocation,
        map: map,
    });

}
