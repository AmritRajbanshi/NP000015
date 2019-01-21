<?php
	include"conn.php";
	extract($_POST);
	if(isset($_POST['readrecords'])){
		$data =  '<table class="table table-bordered table-striped ">
			<tr class="bg-dark text-white">
				<th>No.</th>
				<th>City Name</th>
				<th>Edit Action</th>
				<th>Delete Action</th>
			</tr>'; 
			$displayquery = " SELECT * FROM `city` "; 
			$result = mysqli_query($conn,$displayquery);

			if(mysqli_num_rows($result) > 0){
				$number = 1;
				while ($row = mysqli_fetch_array($result)) {
					$data .= '<tr>  
						<td>'.$number.'</td>
						<td>'.$row['CT_Name'].'</td>
						<td>
							<button onclick="GetCityDetails('.$row['CT_ID'].')" class="btn btn-info">Edit</button>
						</td>
						<td>
							<button onclick="DeleteCity('.$row['CT_ID'].')" class="btn btn-danger">Delete</button>
						</td>
    				</tr>';
    				$number++;
				}
			} 
	 	$data .= '</table>';
    	echo $data;
	}

	//adding records in database
	if(isset($_POST['CTName'])) {
		$query = " INSERT INTO `city`( `CT_Name`) VALUES('$CTName')";
		if($result = mysqli_query($conn,$query)){
			exit(mysqli_error());
		}else{
			echo "1 record added";
		}
	}
	
	// pass id on modal
	if(isset($_POST['id']) && isset($_POST['id']) != ""){
    	$CityID = $_POST['id'];
    	$query = "SELECT * FROM city WHERE CT_ID = '$CityID'";
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
	if(isset($_POST['UPhidden_CTID'])){
		// get values
    	$UPhidden_CTID = $_POST['UPhidden_CTID'];
    	$UPCTName = $_POST['UPCTName'];
    	$query = "UPDATE city SET CT_Name = '$UPCTName' WHERE CT_ID = '$UPhidden_CTID'";
    	if (!$result = mysqli_query($conn,$query)) {
    		exit(mysqli_error());
    	}
	}

	/////////////Delete City record /////////
	if(isset($_POST['deleteid'])){
		$CityID = $_POST['deleteid']; 
		$deletequery = " delete from city where CT_ID ='$CityID' ";
		if (!$result = mysqli_query($conn,$deletequery)) {
	        exit(mysqli_error());
		}
	}
?>