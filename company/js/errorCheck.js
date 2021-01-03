//for the query max character limit message
//ALSO js for when form is filled and button hit taken to a page displaying all filled in info

var form = document.getElementById('contactForm');
document.getElementById('submit').addEventListener('click', function() {
    form.submit();
});


//working on this
/*$('textarea#maxChar').on('keyup',function() 
{
  var maxlen = $(this).attr('maxlength');
  
  var length = $(this).val().length;
  if(length > (maxlen-10) ){
    $('#textarea_message').text('max length '+maxlen+' characters only!')
  }
  else
    {
      $('#textarea_message').text('');
    }
});*/