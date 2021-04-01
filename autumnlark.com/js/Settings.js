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
  document.getElementById('submitBug').addEventListener('click', function(){

    var br = reportCheck();
    if(br){
        form.onsubmit();
    }
});

var reportField = document.getElementsByName('bug-rep')[0];

function reportCheck(){
    var report = document.getElementById('report-message');
    var RPassed = reportField.value;
    if (RPassed.length === 0) {
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
  
  
  
  //Bio Checks
  
  var Bform = document.getElementById('BioMaker');
  document.getElementById('submitBio').addEventListener('click', function(){

    var bi = BioCheck();
    if(bi){
        Bform.onsubmit();
    }
});
  
var bioField = document.getElementsByName('bio-rep')[0];

function BioCheck(){
    var bio = document.getElementById('bio-message');
    var BioPassed = bioField.Bvalue;
    if (BioPassed.length === 0) {
        bio.style.display = 'block';
    }
    else{
      bio.style.display = 'none';
    }
    return BioPassed;
  }
  
  var Blimit = document.getElementById('maxCharBio');
  var Blength = Blimit.getAttribute('maxlength');
  var Bel_c = document.getElementById('countBio');
  Bel_c.innerHTML = length;
  Blimit.onkeyup = function () {
    document.getElementById('countBio').innerHTML = (Blength - this.Bvalue.length);
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

  