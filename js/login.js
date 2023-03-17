  // Get the form data
  $(document).ready(function() {
    $('#smtbtn').click(function(e) {
      e.preventDefault(); 
  var aemail = $('#email').val();
  // var aemail = $('#email').val();
  var apassword = $('#password').val();

  // Send the AJAX request
  $.ajax({
    url: 'http://localhost/sharmi/php/login.php',
    method: 'POST',
    data:{email:aemail,password:apassword},
    success: function(response) {
        // Handle the response from the server
        // console.log(response);
        if(response == "No user Found"){
          alert("No user Found");
          return;
        }
        else{
          var data = JSON.parse(response);
        console.log(data.userid);
        localStorage.setItem('userID',data.userid);
        location.href = './profile.html';
      }
    },
    error: function(error) {
        // Handle any errors that occur
        console.log(error);
    }
  });
    });
  });