<?php 
	// activate session php
	session_start();

	// delete everything session
	session_destroy();

	// switch the page to the login page
	header("location:login.php");
?>