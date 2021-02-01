
document.getElementById('toggle-navigation').addEventListener(
    'click', toggleNav
);


function toggleNav() {
    var nav = document.getElementById('navigation');
    var icon = document.getElementById('toggle-navigation-icon');
    if (nav.classList.contains('hide')) {
        show(nav);
        icon.classList.remove('bi-list');
        icon.classList.add('bi-x');
    } else {
        hide(nav);
        icon.classList.remove('bi-x');
        icon.classList.add('bi-list');
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

var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("slide");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "block";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}