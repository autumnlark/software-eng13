
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
