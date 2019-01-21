<!DOCTYPE html>
<html>
<?php 
	$page = 'Admin Dashboard';
	include_once "AdminNav.php" 
?>
<body>
	<h1 class="text-center text-uppercase display-4 font-weight-bold">Profile</h1>
	<div class="container" style="min-height: 392px;">
		<div class="row">
			<div class="col-md-6">
				<h3 class="text-center font-weight-bold">User Details</h3>
				<p class="font-weight-bold"> Full Name: <?php echo $_SESSION['U_fname']; ?> </p>
				<p class="font-weight-bold"> Username: <?php echo $_SESSION['U_name']; ?> </p>
				<p class="font-weight-bold"> User Type: <?php echo $_SESSION['U_type']; ?> </p>
			</div>
			<div class="col-md-6">
				<h3 class="text-center font-weight-bold">Change Password</h3>
				<!-- <form method="POST" action="signupCode.php"> -->
					<div class="form-group">
					    <label>Old Password</label>
					    <input type="password" class="form-control" id="Opwd" placeholder="New password">
					</div> 
					<div class="form-group">
					    <label>New Password</label>
					    <input type="password" class="form-control" id="Npwd" placeholder="New password">
					</div>
					<div class="form-group">
					    <label>Confrim Password</label>
					    <input type="password" class="form-control" name="U_pwd" id="cpwd" placeholder="Confirm new password">
					    <div id="cpwd_Err"></div>
					</div>
					<div class="form-group text-right">
						<input type="hidden" id="UserID" value="<?php echo $_SESSION['UserID']; ?>">
					    <button type="submit" class="btn btn-info" onclick="addRecord();">Submit</button>
					</div>
					<div class="message"><?php if(isset($message)) { echo $message; } ?></div>
				<!-- </form> -->
			</div>
		</div>
	</div>
	<?php include_once 'footerScript.php'; ?>
	<script type="text/javascript">
	    $(document).ready(function() {
	      $('#cpwd').keyup(function() {
	        var Npwd = $('#Npwd').val();
	        var cpwd = $('#cpwd').val();

	        if(cpwd!=Npwd){
	          $('#cpwd_Err').html('Password not matching');
	          $('#cpwd_Err').css('color','red');
	          return false;
	        } else{
	          $('#cpwd_Err').html('');
	          return true;
	        }
	      });
	    });

		function UpdatePwdDetails() {
		    var UserID = $("#UserID").val();
	      	var Cpwd =  $("#cpwd").val();
		    $.post("signupCode.php",
		    	{
		    		Cpwd:Cpwd,
	          		UserID:UserID,
		    	},
		      	function (data, status) {
		      		// $("#update_city_modal").modal("hide");
		        // 	readRecords();
		      	}
		    );
		}

	    function addRecord(){
	      var Opwd =  $("#Opwd").val();
	      var UserID = $("#UserID").val();
	      var Cpwd =  $("#cpwd").val();
	      $.ajax({
	        url:"pwd_code.php",
	        type:'POST',
	        data:{
	          Opwd:Opwd,
	          Cpwd:Cpwd,
	          UserID:UserID,
	        },
	        success:function(data, status){
			//success:function(output){
				// alert(output);
				// document.getElementByID("err").innerHTML=msg;
	          //readRecords();
	        },
	      });
	      return;
	    }
	</script>	
</body>
</html>