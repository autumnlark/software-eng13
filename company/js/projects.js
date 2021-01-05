var logo = document.getElementById('exposure-logo')
var desc = document.getElementById('exposure-text')

logo.addEventListener('mouseenter', logoHover);

function logoHover() {
    desc.style.display = 'block';
    desc.style.opacity = '1';
    logo.style.opacity = '0';
    logo.style.display = 'none';
}

function textHover() {
    desc.classList.remove('hide');
    desc.classList.add('show');
    logo.classList.remove('show');
    logo.classList.add('hide');
}
