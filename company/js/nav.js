
document.getElementById('toggle-navigation').addEventListener(
    'click', toggleNav
)

function toggleNav() {
    var nav = document.getElementById('navigation');
    var icon = document.getElementById('toggle-navigation-icon');
    if (nav.classList.contains('hide')) {
        show(nav);
        icon.classList.remove('fi-more-v-a');
        icon.classList.add('fi-close-a');
    } else {
        hide(nav);
        icon.classList.remove('fi-close-a');
        icon.classList.add('fi-more-v-a');
    }
}

function show(element) {
    element.classList.remove('hide');
    element.classList.add('show');
}

function hide(element) {
    element.classList.remove('show');
    element.classList.add('hide');
}
