<!DOCTYPE html>
<html>
<?php 
  $page = 'Container';
  include_once "AdminNav.php";
?>
<body>
  <h1 class="text-center text-uppercase display-4 font-weight-bold"> Container </h1>
  <div class="container" style="min-height: 392px;">
    <div class="d-flex flex-row justify-content-end ">
		  <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myModal">Add</button>
    </div>
    <div>
		  <h2 class="font-weight-bold mb-4"> All Records </h2>
		  <div id="records_content">	</div>
    </div>
  </div>

  <!-- Inser container Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Container</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
        	<div class="form-group">
        		<label>Container Name: </label>
        		<input type="text" name="Con_Name" id="ConName" placeholder="Container Name" class="form-control">
        	</div>

           <div class="form-group">
        		<label>Container Status</label>
            <select name="Con_status" id="ConStatus" class="form-control">
              <option>Choose Any</option>
              <option value="Avai">Available</option>
              <option value="Uavai">Unavailable</option>
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
  <div class="modal fade" id="update_container_modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Update Container</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <div class="form-group">
            <label>Container Name: </label>
            <input type="text" name="Con_Name" id="UPConName" placeholder="Container Name" class="form-control">
          </div>

           <div class="form-group">
            <label>Container Status</label>
            <select name="Con_status" id="UPConStatus" class="form-control">
              <option>Choose Any</option>
              <option value="Avai">Available</option>
              <option value="Uavai">Unavailable</option>
            </select>
          </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
  	      <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
  	      <button type="button" class="btn btn-info" onclick="UpdateContainerDetails()" >Update</button>
  	      <input type="hidden" id="hidden_ConID">
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
  		var ConName =  $("#ConName").val();
  		var ConStatus =  $("#ConStatus").val();
  		$.ajax({
  			url:"ContainerCode.php",
  			type:'POST',
  			data:{
  				ConName:ConName,
  				ConStatus:ConStatus,
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
  			url:"ContainerCode.php",
  			type:"POST",
  			data:{readrecords:readrecords},
  			success:function(data,status){
  				$('#records_content').html(data);
  			},

  		});
  	}

    //delete Containerdetails
    function DeleteContainer(deleteid){
    	var conf = confirm("are u sure");
    	if(conf == true){
        $.ajax({
          url:"ContainerCode.php",
    		  type:'POST',
    		  data: {  deleteid : deleteid},
    		  success:function(data, status){
            readRecords();
          }
        });
    	}
    }

    function GetContainerDetails(id){
    	$("#hidden_ConID").val(id);
      $.post("ContainerCode.php",
        { id: id },
        function (data, status){
          alert(data);
          //JSON.parse() parses a string, written in JSON format, and returns a JavaScript object.
          var container = JSON.parse(data);
          //alert(container);
          $("#UPConName").val(container.Con_Name);
          $("#UPConStatus").val(container.Con_status);
        }
      );
      $("#update_container_modal").modal("show");
    }

    function UpdateContainerDetails() {
      var UPConName = $("#UPConName").val();
      var UPConStatus = $("#UPConStatus").val();
      var UPhidden_ConID = $("#hidden_ConID").val();
      $.post("ContainerCode.php", 
        {
          UPhidden_ConID: UPhidden_ConID,
          UPConName: UPConName,
          UPConStatus: UPConStatus
        },
        function (data, status) {
          $("#update_container_modal").modal("hide");
          readRecords();
        }
      );
    }
  </script>
</body>
</html>