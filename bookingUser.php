<!DOCTYPE html>
<html>
<?php 
	$page = 'Booking';
	include_once "UserNav.php";
?>
<body>
	<h1 class="text-center text-uppercase display-4 font-weight-bold">Booking </h1>
	<div class="container" style="min-height: 392px;">
		<div class="d-flex flex-row justify-content-end ">
			<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myModal">Book Container</button>
		</div>
		<div >
			<h2 class="font-weight-bold mb-4"> All Records </h2>
			<div id="records_content">	</div>
		</div>
	</div>
	<!-- insert booking Modal -->
	<div class="modal fade" id="myModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Add Booking</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
	      		</div>

			    <!-- Modal body -->
			    <div class="modal-body">
					<input type="hidden" class="form-control" name="B_user" id="BK_user" value="<?php echo $_SESSION['UserID']; ?>">
					<div class="form-group">
						<label>From</label>
						<select class="form-control" name="B_from" id="BK_From">
							<option value="">choose any</option>
								<?php
									$q = "select * from city";
									$result = mysqli_query($conn,$q);
									while ($rows = mysqli_fetch_array($result)) { ?>
										<option value="<?php echo $rows['CT_ID'] ?>"> <?php echo $rows['CT_Name']; ?></option>
								<?php } ?>
						</select>
				  	</div>
					<div class="form-group">
					    <label>To</label>
					    <select class="form-control" name="B_to" id="BK_To">
					    	<option value="">choose any</option>
							<?php
								$q = "select * from city";
								$result = mysqli_query($conn,$q);
								while ($rows = mysqli_fetch_array($result)) { ?>
									<option value="<?php echo $rows['CT_ID'] ?>"> <?php echo $rows['CT_Name']; ?></option>
								<?php } 
							?>
						</select>
					</div>
					<div class="form-group">
					    <label>Container</label>
					    <select class="form-control" name="B_containerID" id="BK_ConID">
					    	<option value="">choose any</option>
							<?php
								$q = "select * from container where Con_status = 'Avai'";
								$result = mysqli_query($conn,$q);
								while ($rows = mysqli_fetch_array($result)) { ?>
									<option value="<?php echo $rows['Con_ID'] ?>"> <?php echo $rows['Con_Name']; ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
					    <label>Status</label>
					    <select class="form-control" name="B_status" id="BK_Status">
					    	<option value="">choose any</option>
							<option value="Load">Load</option>
						</select>
					</div>
			    </div>
			    <div class="text-left">
		    		<p id="error_message" class="text-danger text-center"></p>
    				<p id="success_message" class="text-success text-center"></p>
    			</div>
			    <!-- Modal footer -->
			    <div class="modal-footer">
			        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
			        <button type="button" class="btn btn-info" onclick="addRecord()">Save</button>
			    </div>
			</div>
	  	</div>
	</div>	

	<?php include_once 'footerScript.php'; ?>
	<script type="text/javascript">
		$(document).ready(function () {
		    readRecords(); 
		});

		function addRecord(){
			var BK_user =  $("#BK_user").val();
			var BK_From =  $("#BK_From").val();
			var BK_To =  $("#BK_To").val();
			var BK_ConID =  $("#BK_ConID").val();
			var BK_Status =  $("#BK_Status").val();

			if (BK_To == '' || BK_From == '' || BK_ConID == '' || BK_Status == '' ) {
				$('#error_message').html("All Fields are required");
			}
			else{
				$('#error_message').html("");  
				$.ajax({
					url:"bookingCode.php",
					type:'POST',
					data:{
						BK_user:BK_user,
						BK_From:BK_From,
						BK_To:BK_To,
						BK_ConID:BK_ConID,
						BK_Status:BK_Status,
					},
					success:function(data, status){
						// $("form").trigger("reset");
						// $('#myModal').modal('close');
						$("#success_message").fadeIn().html(data);
						setTimeout(function(){
							$("#success_message").fadeOut("Slow");
//							setTimeout($('#myModal').dialog('close'), 10000);
						}, 2000);
						readRecords();
					},
				});
			}
		}

	  	//Display Records
		function readRecords(){
			var Bookingrecords = "Bookingrecords";
			var BK_user =  $("#BK_user").val();
			$.ajax({
				url:"bookingCode.php",
				type:"POST",
				data:{BK_user:BK_user, Bookingrecords:Bookingrecords},
				success:function(data,status){
					$('#records_content').html(data);
				},

			});
		}
	</script>
</body>
</html>