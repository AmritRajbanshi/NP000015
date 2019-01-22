<?php
	//$conn = mysqli_connect( 'amrit-np000015.mysql.database.azure.com','amritrajbanshi@amrit-np000015','','ajax' );
	$conn=mysqli_init(); 
	mysqli_ssl_set($conn, NULL, NULL, {ca-cert filename}, NULL, NULL); 
	mysqli_real_connect($conn, "amrit-np000015.mysql.database.azure.com", "amritrajbanshi@amrit-np000015", "Dirtyfeat123", "AmritCMS_DB", 3306);
  // Check connection
  if (mysqli_connect_errno()){
    echo "Connection database failed : " . mysqli_connect_error();
  }
?>
