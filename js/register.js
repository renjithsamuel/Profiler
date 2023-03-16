$(function() {
    $('#registrationForm').on('submit', function(e) {
      e.preventDefault(); // prevent the default form submit event

      // get the form data
      var formData = $(this).serialize();

      // submit the form data using jQuery Ajax
      $.ajax({
        url: '../php/register.php',
        type: 'post',
        data: formData,
        success: function(response) {
          console.log(response);
          alert('Registration successful!');
          window.location.href = '../login.html'; // redirect to the login page
        },
        error: function(xhr, status, error) {
          console.log(xhr.responseText);
          alert('Registration failed: ' + error);
        }
      });
    });
  });

  function gotoLogin(){
    window.location.href = '../login.html'; 
  }