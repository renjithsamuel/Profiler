$(document).ready(function() {
    // Retrieve user data from backend
    $.ajax({
      url: 'profile_data.php',
      type: 'GET',
      dataType: 'json',
      success: function(data) {
        // Populate input fields with user data
        $('#name').val(data.name);
        $('#email').val(data.email);
        $('#phone').val(data.phone);
        $('#address').val(data.address);
      },
      error: function(xhr, status, error) {
        // Display error message
        console.log(xhr.responseText);
        alert('Error retrieving user data: ' + error);
      }
    });
  
    // Enable Edit button
    $('#edit').click(function() {
      $('#name').prop('disabled', false);
      $('#email').prop('disabled', false);
      $('#phone').prop('disabled', false);
      $('#address').prop('disabled', false);
      $('#edit').prop('disabled', true);
      $('#save').prop('disabled', false);
    });
  
    // Save changes to backend
    $('#save').click(function() {
      // Retrieve edited values
      var name = $('#name').val();
      var email = $('#email').val();
      var phone = $('#phone').val();
      var address = $('#address').val();
  
      // Send edited values to backend
      $.ajax({
        url: 'profile_save.php',
        type: 'POST',
        data: {name: name, email: email, phone: phone, address: address},
        success: function(data) {
          // Disable input fields and Save button, enable Edit button
          $('#name').prop('disabled', true);
          $('#email').prop('disabled', true);
          $('#phone').prop('disabled', true);
          $('#address').prop('disabled', true);
          $('#edit').prop('disabled', false);
          $('#save').prop('disabled', true);
        },
        error: function(xhr, status, error) {
          // Display error message
          console.log(xhr.responseText);
          alert('Error saving user data: ' + error);
        }
      });
    });
  });
  