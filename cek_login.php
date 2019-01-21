<?php 
	// activate session on php
	session_start();
	// connect php with the database connection
	include 'conn.php';

	// capture data sent from the login form
	$U_name = $_POST['U_name'];
	$pwd=$_POST['U_pwd'];
	$U_pwd=(md5($pwd));
	
	// selecting user data with the appropriate username and password
	$login = mysqli_query($conn,"select * from user where U_name='$U_name' and U_pwd='$U_pwd'");
	// calculate the amount of data found
	$check = mysqli_num_rows($login);

	// check whether the username and password are found in the database
	if($check > 0){
		$data = mysqli_fetch_assoc($login);
  		// check if the user is logged in as an admin
  		if($data['U_type']=="Admin"){
		    // create a login and username session
		    $_SESSION['U_name'] = $U_name;
		    $_SESSION['UserID'] = $data['U_ID'];
		    $_SESSION['U_fname'] = $data['U_fname'];
		    $_SESSION['U_type'] = "admin";
		    // move to admin dashboard
		    header("location:Admin.php");
	  	}
	  	// check if the user login as an User
	  	else if($data['U_type']=="User"){
	  		// create a login and username session
	    	$_SESSION['U_name'] = $U_name;
	    	$_SESSION['UserID'] = $data['U_ID'];
	    	$_SESSION['U_fname'] = $data['U_fname'];
	    	$_SESSION['U_type'] = "User";
	    	// move to User dashboard
	    	header("location:User.php");
	  	}
	  	else{
	    	// move to login page again
	    	header("location:login.php?message=failed");
	  	}
	}
	else{
		header("location:login.php?message=failed");
	}
?>