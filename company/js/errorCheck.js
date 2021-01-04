//for the query max character limit message
//ALSO js for when form is filled and button hit taken to a page displaying all filled in info
var form = document.getElementById('contactForm');
document.getElementById('submit').addEventListener('click', function() {
    if (checkFirstName()) {
        form.submit();
    }
   

});


var nameRegEx = /^([A-Za-z]{1,})$/g;
var fnameField = document.getElementsByName('fname')[0];

function checkFirstName() {
    var msg = document.getElementById('fname-message');
    var passed = nameRegEx.test(fnameField.value);
    if (!passed) {
        msg.style.display = 'block';
    }
    return passed;
}

var form = document.getElementById('contactForm');
document.getElementById('submit').addEventListener('click', function() {
    form.submit();
});