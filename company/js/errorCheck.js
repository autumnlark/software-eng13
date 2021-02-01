//for the query max character limit message
//ALSO js for when form is filled and button hit taken to a page displaying all filled in info
var form = document.getElementById('contactForm');
document.getElementById('submit').addEventListener('click', function() {
  var fn = checkFirstName();
  var ln = checkLastName();
  var eml = emailCheck();
  var qr = queryCheck();
    if (fn && ln && eml && qr) {
        form.submit();
    }
   

});



var fnameField = document.getElementsByName('fname')[0];
var lnameField = document.getElementsByName('lname')[0];
var emailField = document.getElementsByName('email')[0];
var queryField = document.getElementsByName('qry')[0];

function checkFirstName() {
var nameRegEx = /^([A-Za-z]{1,})$/g;

    var msg = document.getElementById('fname-message');
    var passed = nameRegEx.test(fnameField.value);
    if (!passed) {
        msg.style.display = 'block';
    }
    else{
      msg.style.display = 'none';
    }
    return passed;
}

function checkLastName() {
var nameRegEx = /^([A-Za-z]{1,})$/g;

  var lmsg = document.getElementById('lname-message');
  var lpassed = nameRegEx.test(lnameField.value);
  if (!lpassed) {
      lmsg.style.display = 'block';
  }
  else{
    lmsg.style.display = 'none';
  }
  return lpassed;
}


function emailCheck(){
  var mail = document.getElementById('email-message');
  var emailPassed = emailField.value;
  if (emailPassed.length == 0) {
      mail.style.display = 'block';
  }
  else{
    mail.style.display = 'none';
  }
  return emailPassed;
}


function queryCheck(){
  var question = document.getElementById('query-message');
  var QPassed = queryField.value;
  if (QPassed.length == 0) {
      question.style.display = 'block';
  }
  else{
    question.style.display = 'none';
  }
  return QPassed;
}

var limit = document.getElementById('maxChar');
var length = limit.getAttribute("maxlength");
var el_c = document.getElementById('count');
el_c.innerHTML = length;
limit.onkeyup = function () {
  document.getElementById('count').innerHTML = (length - this.value.length);
};
