<?php
	$conn = mysqli_connect( 'localhost','root','','ajax' );
  // Check connection
  if (mysqli_connect_errno()){
    echo "Connection database failed : " . mysqli_connect_error();
  }
?>