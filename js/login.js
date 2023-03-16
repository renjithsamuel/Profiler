$(document).ready(function(){
    $("#login-form").submit(function(event){
      event.preventDefault();
      var username = $("#username").val();
      var password = $("#password").val();
      $.ajax({
        url: "login.php",
        method: "POST",
        data: {username: username, password: password},
        dataType: "json",
        success: function(data){
          if(data.status == "success"){
            localStorage.setItem("userId", data.userId);
            window.location.href = "../profile.html";
          }
          else{
            $("#error-message").html(data.message);
          }
        },
        error: function(){
          $("#error-message").html("Error occurred while processing request.");
        }
      });
    });
  });