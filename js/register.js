// Get the form data
$(document).ready(function() {
    $('#smtbtn').click(function(e) {
      e.preventDefault(); 
var aname = $('#name').val();
var aemail = $('#email').val();
var apassword = $('#password').val();

// Send the AJAX request
$.ajax({
    url: 'http://localhost/sharmi/php/register.php',
    method: 'POST',
    data: {name: aname, email: aemail, password: apassword},
    success: function(response) {
        // Handle the response from the server

        // console.log(response);
        localStorage.setItem('userID' , response);
        console.log(localStorage.getItem('last_id'));
    },
    error: function(error) {
        // Handle any errors that occur
        console.log(error);
    }
});

    });
  });

// $(function() {
//     $('#registrationForm').on('submit', function(e) {
//       e.preventDefault(); // prevent the default form submit event

//       // get the form data
//       var formData = $(this).serialize();

//       // submit the form data using jQuery Ajax
//       $.ajax({
//         url: 'http://localhost/sharmi/php/register.php',
//         type: 'POST',
//         data: formData,
//         success: function(response) {
//           console.log(response);
//           alert('Registration successful!');
//           window.location.href = '../login.html'; // redirect to the login page
//         },
//         error: function(xhr, status, error) {
//           console.log(xhr.responseText);
//           alert('Registration failed: ' + error);
//         }
//       });
//     });
//   });

//   function gotoLogin(){
//     window.location.href = '../login.html'; 
//   }


  // Prevent form from submit or refresh
  // var form = document.getElementById("registrationForm");
  // function handleForm(event) { event.preventDefault(); }
  // form.addEventListener('submit', handleForm);
  // // Function
  // function insert(){
  //   $(document).ready(function(){
  //     var aname = $('#name').val();
  //     var aemail =$('#email').val();
  //     var apassword =$('#password').val();
  //     console.log(aname);
  //     console.log(aemail);
  //     console.log(apassword);
  //     $.ajax({
  //       // Action
  //       url: 'http://localhost/sharmi/php/register.php',
  //       // Method
  //       type: 'POST',
  //       data: {
  //         name : aname,
  //         email : aemail,
  //         password : apassword,},
  //       success:function(response){
  //         if(response){
  //           alert("Data Added Successfully!");
  //         }
  //         else{
            
  //         }
  //       }
  //     });
  //   });
  // }