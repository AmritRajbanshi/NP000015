<!DOCTYPE html>
<html>
<?php 
	$page = 'Booking';
	include_once "AdminNav.php";
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
							<option>choose any</option>
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
					    	<option>choose any</option>
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
					    	<option>choose any</option>
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
					    	<option>choose any</option>
							<option value="L">Load</option>
							<option value="R">In Route</option>
							<option value="D">Delivered</option>
						</select>
					</div>
			    </div>

			    <!-- Modal footer -->
			    <div class="modal-footer">
			        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
			        <button type="button" class="btn btn-info" data-dismiss="modal" onclick="addRecord()">Save</button>
			    </div>
			</div>
	  	</div>
	</div>


	<!--  update Container  -->
	<div class="modal fade" id="update_booking_modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Update booking</h4>
	        		<button type="button" class="close" data-dismiss="modal">&times;</button>
	      		</div>
	      		<!-- Modal body -->
	      		<div class="modal-body">
	      			<div class="form-group">
					    <label>Status</label>
					    <select class="form-control" name="B_status" id="UPBK_Status">
					    	<option>choose any</option>
							<option value="R">In Route</option>
							<option value="D">Delivered</option>
						</select>
					</div>
	      		</div>

	      		<!-- Modal footer -->
	      		<div class="modal-footer">
	      			<button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
		      		<button type="button" class="btn btn-info" onclick="UpdateBookingDetails()" >Update</button>
		      		<input type="hidden" id="hidden_BKID">
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
					readRecords();
				},
			});
		}

	  	//Display Records
		function readRecords(){
			var readrecords = "readrecords";
			$.ajax({
				url:"bookingCode.php",
				type:"POST",
				data:{readrecords:readrecords},
				success:function(data,status){
					$('#records_content').html(data);
				},

			});
		}

		//delete Containerdetails
		function DeleteBooking(deleteid){
		  	var conf = confirm("are u sure");
		  	if(conf == true){
		      $.ajax({
		        url:"bookingCode.php",
		  		  type:'POST',
		  		  data: {  deleteid : deleteid},
		  		  success:function(data, status){
		          readRecords();
		        }
		      });
		  	}
		}

		function GetBookingDetails(id){
			$("#hidden_BKID").val(id);
			$.post("bookingCode.php",
				{ id: id },
		    	function (data, status){
		      		alert(data);
		      		//JSON.parse() parses a string, written in JSON format, and returns a JavaScript object.
		      		var booking = JSON.parse(data);
		      		//alert(container);
		      		$("#UPBK_Status").val(booking.B_status);
		    	}
		  	);
		  	$("#update_booking_modal").modal("show");
		}

		function UpdateBookingDetails() {
		    var UPBK_Status = $("#UPBK_Status").val();
		    var UPhidden_BKID = $("#hidden_BKID").val();
		    $.post("bookingCode.php",
		    	{
		    		UPhidden_BKID: UPhidden_BKID,
		        	UPBK_Status: UPBK_Status
		    	},
		      	function (data, status) {
		      		$("#update_booking_modal").modal("hide");
		        	readRecords();
		      	}
		    );
		}
	</script>
</body>
</html>