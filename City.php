<!DOCTYPE html>
<html>
<?php 
	$page = 'City';
	include_once "AdminNav.php";
?>
<body>
	<h1 class="text-center text-uppercase display-4 font-weight-bold"> City </h1>
	<div class="container" style="min-height: 392px;">
		<div class="d-flex flex-row justify-content-end ">
			<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myModal">Add</button>
		</div>
		<div>
			<h2 class="font-weight-bold mb-4"> All Records </h2>
			<div id="records_content"></div>
		</div>
	</div>

	<!-- insert City Modal -->
	<div class="modal fade" id="myModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Add City</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
	      		</div>

	      		<!-- Modal body -->
	      		<div class="modal-body">
	      			<div class="form-group">
	      				<label>City Name: </label>
	      				<input type="text" name="CT_Name" id="CTName" placeholder="City Name" class="form-control">
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

	<!--  update City Modal  -->
	<div class="modal fade" id="update_city_modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- Modal Header -->
	      		<div class="modal-header">
	      			<h4 class="modal-title">Update City</h4>
	        		<button type="button" class="close" data-dismiss="modal">&times;</button>
	      		</div>
	      		<!-- Modal body -->
	      		<div class="modal-body">
	      			<div class="form-group">
	      				<label>City Name: </label>
	      				<input type="text" name="CT_Name" id="UPCTName"  class="form-control">
	        		</div>
	      		</div>
			    <!-- Modal footer -->
			    <div class="modal-footer">
				    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
				    <button type="button" class="btn btn-info" onclick="UpdateCityDetails()" >Update</button>
				    <input type="hidden" id="hidden_CTID">
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
			var CTName =  $("#CTName").val();
			$.ajax({
				url:"CityCode.php",
				type:'POST',
				data:{
					CTName:CTName,
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
				url:"CityCode.php",
				type:"POST",
				data:{readrecords:readrecords},
				success:function(data,status){
					$('#records_content').html(data);
				},

			});
		}

		//delete Containerdetails
		function DeleteCity(deleteid){
		  	var conf = confirm("are u sure");
		  	if(conf == true){
		      $.ajax({
		        url:"CityCode.php",
		  		  type:'POST',
		  		  data: {  deleteid : deleteid},
		  		  success:function(data, status){
		          readRecords();
		        }
		      });
		  	}
		}

		function GetCityDetails(id){
			$("#hidden_CTID").val(id);
			$.post("CityCode.php",
				{ id: id },
		    	function (data, status){
		      		alert(data);
		      		//JSON.parse() parses a string, written in JSON format, and returns a JavaScript object.
		      		var container = JSON.parse(data);
		      		//alert(container);
		      		$("#UPCTName").val(container.CT_Name);
		    	}
		  	);
		  	$("#update_city_modal").modal("show");
		}

		function UpdateCityDetails() {
		    var UPCTName = $("#UPCTName").val();
		    var UPhidden_CTID = $("#hidden_CTID").val();
		    $.post("CityCode.php",
		    	{
		    		UPhidden_CTID: UPhidden_CTID,
		        	UPCTName: UPCTName
		    	},
		      	function (data, status) {
		      		$("#update_city_modal").modal("hide");
		        	readRecords();
		      	}
		    );
		}
	</script>
</body>
</html>