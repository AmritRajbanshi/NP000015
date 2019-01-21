<!DOCTYPE html>
<html>
<head>
  <title>MaerskLine|Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel='icon' href='img/logo.svg' type='image/x-icon' sizes="48x48" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<body>
  <div style="min-height: 535px;">
    <div class="container pt-5">
      <h2 class="text-uppercase text-center">Login Panel</h2>
      <div class="d-flex flex-row justify-content-center py-3">
        <form action="cek_login.php" method="post">
          <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" name="U_name" placeholder="Enter Username" id="usernames">
          </div>
          <div id="usercheck"></div>
          <div class="form-group">
            <label >Password</label>
            <input type="password" class="form-control" name="U_pwd" placeholder="Password" id="password">
          </div>
          <div id="passcheck"></div>
          <div class="form-group text-center pt-3">
            <input type="submit" name="Login" value="Login" class="btn btn-primary" id="submitbtn">
          </div>
        </form>      
      </div>
    </div>
    <div class="jumbotron-fluid text-center p-5"> <a href="index.php"> <i class="fas fa-home fa-3x"></i>back to main page</a> </div>
  </div>
  <?php include_once 'footerScript.php'; ?>
  <!-- validation jquery  -->
  <script type="text/javascript">
    $(document).ready(function(){
      $('#usercheck').hide();
      $('#passcheck').hide();

      var user_err = true;
      var pass_err = true;

      $('#usernames').keyup(function(){
        username_check();
      });

      function username_check(){
        var user_val = $('#usernames').val();
        //alert(user_val);
        if(user_val.length == ''){
          $('#usercheck').show();
          $('#usercheck').html("Please enter your name");
          $('#usercheck').focus();
          $('#usercheck').css("color","red");
          $('#usernames').css({"color":"red" ,"border": "1px solid red"});
          user_err = false;
          return false;
        }
        else{
          $('#usercheck').hide();
        }
        if((user_val.length < 3 ) || (user_val.length > 10 )){
          $('#usercheck').show();
          $('#usercheck').html("Please enter your valid name");
          $('#usercheck').focus();
          $('#usercheck').css("color","red");
          user_err = false;
          return false;
        }
        else{
          $('#usercheck').hide();
        }
      }


      $('#password').keyup(function(){
        password_check();
      });


      function password_check(){
        var pwd_val = $('#password').val();
        if(pwd_val.length == ''){
          $('#passcheck').show();
          $('#passcheck').html("Please enter your password");
          $('#passcheck').focus();
          $('#passcheck').css("color","red");
          $('#password').css({"color":"red" ,"border": "1px solid red"});
          pass_err = false;
          return false;
        }
        else{
          $('#passcheck').hide();
        }
        // if((pwd_val.length < 8 ) || (pwd_val.length > 20 )){
        //   $('#passcheck').show();
        //   $('#passcheck').html("password must be of atleast 8 charachter");
        //   $('#passcheck').focus();
        //   $('#passcheck').css("color","red");
        //   pass_err = false;
        //   return false;
        // }
        // else{
        //   $('#passcheck').hide();
        // }
      }

      $('#submitbtn').click(function(){
        user_err = true;
        pass_err = true;

        username_check();
        password_check();

        if((user_err == true) && (pass_err == true)){
          return true;
        }
        else{
          return false;
        }
      });
        
    });
  </script>
</body>
</html>