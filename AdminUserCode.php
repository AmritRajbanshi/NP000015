<?php
	include"conn.php";
	extract($_POST);

	//view records for Admin
	if(isset($_POST['readrecords'])){
		$data =  '<div class="table-responsive">
		<table id="table_id" class="table table-bordered table-striped">
		  	<thead class="thead-dark">
				<tr class="bg-dark text-white">
					<th>No.</th>
					<th>Full Name </th>
					<th>Username</th>
					<th>User Type</th>
					<th>status</th>
				</tr>
			</thead>
			<tbody>'; 
			$displayquery = "SELECT * FROM user";
			$result = mysqli_query($conn,$displayquery);

			if(mysqli_num_rows($result) > 0){
				$number = 1;
				while ($row = mysqli_fetch_array($result)) {
					$status = '';
					if($row["U_status"] == 'Active'){
						$status = '<span class="badge badge-success"> Active </span>';
					} else{
						$status = '<span class="badge badge-danger"> Inactive </span>';
					}
					$data .= '<tr>  
						<td>'.$number.'</td>
						<td>'.$row['U_fname'].'</td>
						<td>'.$row['U_name'].'</td>
						<td>'.$row['U_type'].'</td>
						<td>'.$status.'</td>
    				</tr>';
    				$number++;
				}
			} 
	 	$data .= '</tbody></table></div>';
    	echo $data;
	}
?>