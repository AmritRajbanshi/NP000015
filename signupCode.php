<?php
	include('conn.php');
	//adding records in database
	if(isset($_POST['Ufname']) && isset($_POST['Uname']) && isset($_POST['Utype']) && isset($_POST['Upwd']) ){
		$Uname=mysqli_real_escape_string($conn, $_REQUEST['Uname']);
		$res=mysqli_query($conn, "select * from user where U_name='$Uname'");
		$Ufname=mysqli_real_escape_string($conn, $_REQUEST['Ufname']);
		$password=mysqli_real_escape_string($conn, $_REQUEST['Upwd']);
		$Upwd = mysqli_real_escape_string($conn, md5($password));
		$Utype=mysqli_real_escape_string($conn, $_REQUEST['Utype']);
		$numrow=mysqli_num_rows($res);
		if($numrow==""){
			mysqli_query($conn, "insert into user(U_fname,U_name,U_pwd,U_type)values('$Ufname','$Uname','$Upwd','$Utype')");	
			// <script type="text/javascript">
			// 	var msg="success";
			//   	window.location="login.php?msg="+msg;
			// </script>
			header("location:login.php?message=success");
			
		}
		else { 
			// <script type="text/javascript">
			// 	var msg="Exist";
			//   	window.location="login.php?msg="+msg;
			// </script> 
			header("location:login.php?message=failed");
		 }
	}

	
	
 ?>