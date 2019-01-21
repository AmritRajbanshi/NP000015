<?php
	include"conn.php";
	extract($_POST);
	if(isset($_POST['readrecords'])){
		$data =  '<div class="table-responsive">
		<table class="table table-bordered table-striped">
		  	<thead class="thead-dark">
			<tr class="bg-dark text-white">
				<th>No.</th>
				<th>Container Name</th>
				<th>Container Status</th>
				<th>Edit Action</th>
				<th>Delete Action</th>
			</tr>
			</thead>
			<tbody>'; 
			$displayquery = " SELECT * FROM `container` "; 
			$result = mysqli_query($conn,$displayquery);

			if(mysqli_num_rows($result) > 0){
				$number = 1;
				while ($row = mysqli_fetch_array($result)) {
					$data .= '<tr>  
						<td>'.$number.'</td>
						<td>'.$row['Con_Name'].'</td>
						<td>'.$row['Con_status'].'</td>
						<td>
							<button onclick="GetContainerDetails('.$row['Con_ID'].')" class="btn btn-info">Edit</button>
						</td>
						<td>
							<button onclick="DeleteContainer('.$row['Con_ID'].')" class="btn btn-danger">Delete</button>
						</td>
    				</tr>';
    				$number++;
				}
			} 
	 	$data .= '</tbody></table></div>';
    	echo $data;
	}

	//adding records in database
	if(isset($_POST['ConName']) &&  isset($_POST['ConStatus'])) {
		$query = " INSERT INTO `container`( `Con_Name`, `Con_status`) VALUES('$ConName','$ConStatus' )";
		if($result = mysqli_query($conn,$query)){
			exit(mysqli_error());
		}else{
			echo "1 record added";
		}
	}
	
	// pass id on modal
	if(isset($_POST['id']) && isset($_POST['id']) != ""){
    	$ConID = $_POST['id'];
    	$query = "SELECT * FROM container WHERE Con_ID = '$ConID'";
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
	if(isset($_POST['UPhidden_ConID'])){
		// get values
    	$UPhidden_ConID = $_POST['UPhidden_ConID'];
    	$UPConName = $_POST['UPConName'];
    	$UPConStatus = $_POST['UPConStatus'];
    	$query = "UPDATE container SET Con_Name = '$UPConName', Con_status = '$UPConStatus'  WHERE Con_ID = '$UPhidden_ConID'";
    	if (!$result = mysqli_query($conn,$query)) {
    		exit(mysqli_error());
    	}
	}

	/////////////Delete Cotainer record /////////
	if(isset($_POST['deleteid'])){
		$ConID = $_POST['deleteid']; 
		$deletequery = " delete from container where Con_ID ='$ConID' ";
		if (!$result = mysqli_query($conn,$deletequery)) {
	        exit(mysqli_error());
		}
	}
?>