<!DOCTYPE html>
<html>
<head>
  <title>MaerskLine|Signup</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel='icon' href='img/logo.svg' type='image/x-icon' sizes="48x48" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<body>
  <div class="container pt-5">
    <h2 class="text-uppercase text-center">Signup Panel</h2>
    <p class="error alert alert-danger" style="display:none"> All Field are required</p>
    <div class="d-flex flex-row justify-content-center py-3">
      <div>
        <input type="hidden" class="form-control" name="U_type" id="Utype" value="User">
        <div class="form-group">
          <label>Full Name</label>
          <input type="text" class="form-control" name="U_fname" id="Ufname" placeholder="Enter Full name">
        </div>
        <div id="Ufname_Err"></div>
        <div class="form-group">
          <label>Username</label>
          <input type="text" class="form-control" name="U_name" id="Uname" placeholder="Enter Username">
        </div>
        <div id="Uname_Err"></div>
        <div class="form-group">
          <label >Password</label>
          <input type="password" class="form-control" name="U_pwd" id="Upwd" placeholder="Password">
        </div>
        <div id="pwd_Err"></div>
        <div class="form-group">
          <label >Confirm Password</label>
          <input type="password" class="form-control" name="U_Cpwd" id="cpwd" placeholder="Password">
        </div>
        <div id="cpwd_Err"></div>
        <div class="form-group text-center pt-3">
          <input type="submit" name="Login" value="Signup" class="btn btn-primary" onclick="addRecord()">
        </div>
      </div>
    </div>
  </div>
  <div class="jumbotron-fluid text-center p-5"><a href="index.php"><i class="fas fa-home fa-3x"></i>back to main page</a></div>
  <?php include_once 'footerScript.php'; ?>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#Ufname').keyup(function(){
        var Ufname = $('#Ufname').val();

        if( Ufname == ''){
          $('#Ufname_Err').html('Enter your full name');
          $('#Ufname_Err').css('color','red');
          return false;
        } else{
          $('#Ufname_Err').html('');
          return true;
        }
      });

      //username
      $('#Uname').keyup(function(){
        var Uname = $('#Uname').val();

        if( Uname == ''){
          $('#Uname_Err').html('Enter your username');
          $('#Uname_Err').css('color','red');
          return false;
        } else{
          $('#Uname_Err').html('');
          return true;
        }
      });

      //password
      $('#Upwd').keyup(function(){
        var pwd = $('#Upwd').val();

        if( pwd == ''){
          $('#pwd_Err').html('Enter your password');
          $('#pwd_Err').css('color','red');
          return false;
        } else{
          $('#pwd_Err').html('');
          return true;
        }
      });

      $('#cpwd').keyup(function(){
        var pwd = $('#Upwd').val();
        var cpwd = $('#cpwd').val();

        if( cpwd == ''){
          $('#cpwd_Err').html('Enter confirmation password');
          $('#cpwd_Err').css('color','red');
          return false;
        } else{
          $('#cpwd_Err').html('');
          return true;
        }
        if(cpwd!=pwd){
          $('#cpwd_Err').html('Password not matching');
          $('#cpwd_Err').css('color','red');
          return false;
        } else{
          $('#cpwd_Err').html('');
          return true;
        }
      });
    });
    function addRecord(){
      var Ufname =  $("#Ufname").val();
      var Uname =  $("#Uname").val();
      var Utype =  $("#Utype").val();
      var Upwd =  $("#Upwd").val();
      var cpwd = $("#cpwd").val();

      if(Ufname =='' || Uname =='' || Upwd =='' || cpwd == '' ){
        $('.error').fadeOut(200).show();
      }else{
        $.ajax({
          url:"signupCode.php",
          type:'POST',
          data:{
            Ufname:Ufname,
            Uname:Uname,
            Utype:Utype,
            Upwd:Upwd,
          },
          success:function(data, status){
            //readRecords();
            $('.error').fadeOut(200).hide();
          },
        });
      }
      return false;
    }
  </script>
</body>
</html>