//Tab functionality 
function openSettings(evt, TabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(TabName).style.display = "block";
    evt.currentTarget.className += " active";
  }
  
  // Get the element with id="defaultOpen" and click on it
  document.getElementById("defaultOpen").click();


  //Bug report conditions
  var form = document.getElementById('BugForm');
  document.getElementById('submitB').addEventListener('click', function(){

    var br = reportCheck();
    if(br){
        form.onsubmit();
    }
});

var reportField = document.getElementsByName('bug-rep')[0];

function reportCheck(){
    var report = document.getElementById('report-message');
    var RPassed = reportField.value;
    if (RPassed.length == 0) {
        report.style.display = 'block';
    }
    else{
      report.style.display = 'none';
    }
    return RPassed;
  }
  
  var limit = document.getElementById('maxChar');
  var length = limit.getAttribute("maxlength");
  var el_c = document.getElementById('count');
  el_c.innerHTML = length;
  limit.onkeyup = function () {
    document.getElementById('count').innerHTML = (length - this.value.length);
  };


//Showing the password if requested
const passwordInput = document.getElementById('pwd');
const togglePasswordButton = document.getElementById('toggle-password');

togglePasswordButton.addEventListener('click', togglePassword);

function togglePassword() {
  if (passwordInput.type === 'password') {
    passwordInput.type = 'text';
    togglePasswordButton.textContent = 'Hide password';
    togglePasswordButton.setAttribute('aria-label',
      'Hide password.');
  } else {
    passwordInput.type = 'password';
    togglePasswordButton.textContent = 'Show password';
    togglePasswordButton.setAttribute('aria-label',
      'Show password as plain text. ' +
      'Warning: this will display your password on the screen.');
  }
}

  