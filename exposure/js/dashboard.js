$(document).ready( () => {
    init();
});

function init() {
    $('#show-tab-1').click(() => {
        toggleTab('#show-tab-1', '#tab-1')
    });
    $('#show-tab-2').click(() => {
        toggleTab('#show-tab-2', '#tab-2')
    });
    $('#show-tab-3').click(() => {
        toggleTab('#show-tab-3', '#tab-3')
    });
    $('#show-tab-4').click(() => {
        toggleTab('#show-tab-4', '#tab-4')
    });
    $('#show-tab-5').click(() => {
        toggleTab('#show-tab-5', '#tab-5')
    });
    $('#show-tab-6').click(() => {
        toggleTab('#show-tab-6', '#tab-6')
    });
}


/* Takes the id of the button, then toggles the button and tab status*/
function toggleTab(btnId, tabId) {
    const btns = $('.tab-button');
    const tabs = $('.tab');
    const btn = $(btnId);
    const tab = $(tabId);

    if (!btn.hasClass('active')) {
        console.log('removing active on btns');
        btns.removeClass('active');

        console.log('removing active on tabs');
        tabs.removeClass('show');

        console.log('hiding tabs');
        tabs.addClass('hidden');

        console.log('adds active to current btn');
        btn.addClass('active');

        console.log('adds hide to current btn');

        tab.removeClass('hidden');

        console.log('adds show to current btn');
        tab.addClass('show');
    }
}

/*Using heriot watt location map from company website to set layout for dahsboard location map*/ 
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