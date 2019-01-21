<!DOCTYPE html>
<html>
<?php 
	$page = 'View Users';
	include_once "AdminNav.php";
?>
<body>
	<h1 class="text-center text-uppercase display-4 font-weight-bold">Users Details</h1>
	<div class="container" style="min-height: 392px;">
		<!-- <div class="d-flex flex-row justify-content-end ">
			<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myModal">Add User</button>
		</div> -->
		<div >
			<h2 class="font-weight-bold mb-4"> All Records </h2>
			<span id="message"></span>

			<div id="records_content">	</div>
		</div>
	</div>


	<?php include_once 'footerScript.php'; ?>
	<script type="text/javascript">
		$(document).ready(function () {
		    readRecords(); 
		});

	  	//Display Records
		function readRecords(){
			var readrecords = "readrecords";
			$.ajax({
				url:"AdminUserCode.php",
				type:"POST",
				data:{readrecords:readrecords},
				success:function(data,status){
					$('#records_content').html(data);
				},

			});
		}
	</script>
</body>
</html>