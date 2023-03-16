// Get the form data
$(document).ready(function() {
  $('#smtbtn').click(function(e) {
    e.preventDefault(); 
var aname = $('#username').val();
// var aemail = $('#email').val();
var apassword = $('#password').val();

// Send the AJAX request
$.ajax({
  url: 'http://localhost/sharmi/php/login.php',
  method: 'POST',
  data:{name:aname,password:apassword},
  success: function(response) {
      // Handle the response from the server
      if(response == "No user Found"){
        alert("No user Found");
        return;
      }
      else{
      console.log(response);
      localStorage.setItem('userID',response);}
  },
  error: function(error) {
      // Handle any errors that occur
      console.log(error);
  }
});



  });
});