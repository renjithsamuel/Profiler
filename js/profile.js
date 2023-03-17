let alast_id = localStorage.getItem('userID');
$(document).ready(function() {
  
  
  // Retrieve user data from backend
  $.ajax({
    url: 'http://localhost/sharmi/php/profile_get.php',
    type: 'POST',
    dataType: 'json',
    data: {last_id :alast_id},
    success: function(data) {
        // console.log(alast_id);
        // console.log(data.name);
        // var data = JSON.parse(response);
        // Populate input fields with user data
        // console.log(data);
        if(data.phone!=null && data.address!=null){
          $('#name').val(data.name);
          $('#email').val(data.email);
          $('#phone').val(data.phone);
          $('#address').val(data.address);}
          else{
            $('#name').val(data.name);
            $('#email').val(data.email);
          }
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
    
    // logout
    $('#logout').click(function(){
      location.href = './login.html';
    });


    // Save changes to backend
    $('#save').click(function() {
      // Retrieve edited values
      var aname = $('#name').val();
      var aemail = $('#email').val();
      var aphone = $('#phone').val();
      var aaddress = $('#address').val();
      // Send edited values to backend
      $.ajax({
        url: 'http://localhost/sharmi/php/profile_post.php',
        type: 'POST',
        data: {name: aname, email: aemail, phone: aphone, address: aaddress,last_id :alast_id},
        success: function(data) {
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
  