<?php  
    include_once 'conn.php';
	// change passwpord
	if( isset($_POST['UserID']) ){
		$UserID = $_POST['UserID'];
		$Oldpwd = mysqli_real_escape_string($conn, $_REQUEST['Opwd']);
		$Currpwd = (md5($Oldpwd));
		$Cpwd = mysqli_real_escape_string($conn, $_REQUEST['Cpwd']);
		$Npwd = (md5($Cpwd));

    	$result = mysqli_query($conn, "SELECT *from user WHERE U_ID='$UserID'");
    	$row = mysqli_fetch_array($result);
    	if ($Currpwd == $row["U_pwd"]) {
        	mysqli_query($conn, "UPDATE user set U_pwd='$Npwd' WHERE U_ID='$UserID'");
        	//$message = "Password Changed";
        	echo "Password Changed";
    	} else
        	//$message = "Current Password is not correct";
        	echo "Current Password is not correct";
	}
?>