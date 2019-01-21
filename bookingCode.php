<?php
	include"conn.php";
	extract($_POST);

	//adding records in database 
	if(isset($_POST['BK_From']) && isset($_POST['BK_To']) && isset($_POST['BK_user']) && isset($_POST['BK_ConID']) && isset($_POST['BK_Status']) ){
		$query = "INSERT INTO `booking`(`B_from`, `B_to`, `B_status`, `B_user`, `B_containerID`, `B_createdAt`) VALUES ('$BK_From','$BK_To','$BK_Status','$BK_user','$BK_ConID',now())";
		//if($result = mysqli_query($conn,$query)){
		if(mysqli_query($conn,$query)){
			echo "Message Saved";
		}
	}

	//view records for Admin
	if(isset($_POST['readrecords'])){
		$data =  '<div class="table-responsive">
		<table id="table_id" class="table table-bordered table-striped">
		  	<thead class="thead-dark">
				<tr class="bg-dark text-white">
					<th>No.</th>
					<th>Send Date </th>
					<th>Received Date </th>
					<th>From</th>
					<th>To</th>
					<th>Container</th>
					<th>Status</th>
					<th>Edit Action</th>
					<th>Delete Action</th>
				</tr>
			</thead>
			<tbody>'; 
			$displayquery = "SELECT CT.CT_Name, C.CT_Name AS BK_To, CN.Con_Name, B.*
				FROM booking AS B
				LEFT JOIN City AS CT ON CT.CT_ID=B.B_from
				LEFT JOIN City AS C ON C.CT_ID=B.B_to
				LEFT JOIN container AS CN ON CN.Con_ID=B.B_containerID";
			$result = mysqli_query($conn,$displayquery);

			if(mysqli_num_rows($result) > 0){
				$number = 1;
				while ($row = mysqli_fetch_array($result)) {
					$data .= '<tr>  
						<td>'.$number.'</td>
						<td>'.$row['B_createdAt'].'</td>
						<td>'.$row['B_updatedAt'].'</td>
						<td>'.$row['CT_Name'].'</td>
						<td>'.$row['BK_To'].'</td>
						<td>'.$row['Con_Name'].'</td>
						<td>'.$row['B_status'].'</td>
						<td>
							<button onclick="GetBookingDetails('.$row['B_ID'].')" class="btn btn-info">Edit</button>
						</td>
						<td>
							<button onclick="DeleteBooking('.$row['B_ID'].')" class="btn btn-danger">Delete</button>
						</td>
    				</tr>';
    				$number++;
				}
			} 
	 	$data .= '</tbody></table></div>';
    	echo $data;
	}

	//view records for user
	if(isset($_POST['Bookingrecords']) && isset($_POST['BK_user']) ){
		$data =  '<div class="table-responsive">
			<table class="table table-bordered table-striped">
		  	<thead class="thead-dark">
				<tr class="bg-dark text-white">
					<th>No.</th>
					<th>Send Date </th>
					<th>Received Date </th>
					<th>From</th>
					<th>To</th>
					<th>Container</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>'; 
			$displayquery = "SELECT CT.CT_Name, C.CT_Name AS BK_To, CN.Con_Name, B.*
				FROM booking AS B
				LEFT JOIN City AS CT ON CT.CT_ID=B.B_from
				LEFT JOIN City AS C ON C.CT_ID=B.B_to
				LEFT JOIN container AS CN ON CN.Con_ID=B.B_containerID
				WHERE B_user= $BK_user";
			$result = mysqli_query($conn,$displayquery);

			if(mysqli_num_rows($result) > 0){
				$number = 1;
				while ($row = mysqli_fetch_array($result)) {
					$data .= '<tr>  
						<td>'.$number.'</td>
						<td>'.$row['B_createdAt'].'</td>
						<td>'.$row['B_updatedAt'].'</td>
						<td>'.$row['CT_Name'].'</td>
						<td>'.$row['BK_To'].'</td>
						<td>'.$row['Con_Name'].'</td>
						<td>'.$row['B_status'].'</td>
    				</tr>';
    				$number++;
				}
			} 
	 	$data .= '</tbody></table></div>';
    	echo $data;
	}

	/////////////Delete Booking record /////////
	if(isset($_POST['deleteid'])){
		$BKID = $_POST['deleteid']; 
		$deletequery = " delete from booking where B_ID ='$BKID' ";
		if (!$result = mysqli_query($conn,$deletequery)) {
	        exit(mysqli_error());
		}
	}


	// pass id on modal
	if(isset($_POST['id']) && isset($_POST['id']) != ""){
    	$BKID = $_POST['id'];
    	$query = "SELECT * FROM booking WHERE B_ID = '$BKID'";
    	if (!$result = mysqli_query($conn,$query)) {
        	exit(mysqli_error());
    	}
    	$response = array();

    	if(mysqli_num_rows($result) > 0) {
        	while ($row = mysqli_fetch_assoc($result)) {
            	$response = $row;
        	}
    	}
  		//if no value is available or no, of rows is 0
    	else{
        	$response['status'] = 200;
        	$response['message'] = "Data not found!";
    	}
   		// PHP has some built-in functions to handle JSON.
		// Objects in PHP can be converted into JSON by using the PHP function json_encode():
    	echo json_encode($response);
	}
	//yo top wala id jun hamilai aiira tesko ho where it wil check id if sahi xa xaina vane invalid req msg auewxa
	else{
		$response['status'] = 200;
    	$response['message'] = "Invalid Request!";
	}

	//////////////// update table//////////////
	if(isset($_POST['UPhidden_BKID'])){
		// get values
    	$UPhidden_BKID = $_POST['UPhidden_BKID'];
    	$UPBK_Status = $_POST['UPBK_Status'];
    	$query = "UPDATE booking SET B_status = '$UPBK_Status' WHERE B_ID = '$UPhidden_BKID'";
    	if (!$result = mysqli_query($conn,$query)) {
    		exit(mysqli_error());
    	}
	}
?>