<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="assets/all.min.css">


  <!-- Vendor CSS Files -->
  <link href="assets/bootstrap.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/style.css" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="assets/jquery-te-1.4.0.css">
  <link type="text/css" rel="stylesheet" href="csstyle.css">
  <script src="assets/jquery.min.js"></script>
  <script src="assets/bootstrap.bundle.min.js"></script>
  <script src="assets/jquery.easing.min.js"></script>
    <script type="text/javascript" src="assets/select2.min.js"></script>
    <script type="text/javascript" src="assets/all.min.js"></script>
  <script type="text/javascript" src="assets/jquery-te-1.4.0.min.js" charset="utf-8"></script>
  <div class="headerr">
		<div class="titlee">
			<img src="images/pitlogo.png" class="logo">
			<h1>ALUMNI INFORMATION MANAGEMENT SYSTEM</h1>
		</div>
		<div class="float right" style="display: flex; align-items: center;">
			<img src="images/profile.png" style="width: 50px; height: 50px;">
			<div class="dropdown mr-4">	
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size:15px; color: white; text-decoration: none;"></a>
				<div class="dropdown-menu" aria-labelledby="account_settings" style="left:-14rem; top: 25px;">
			    <ul>
			    	<li>
					<a href="#changepass" class="dropdownn-item" data-toggle="modal"><i class="fa fa-cog" style="margin-right: 10px;"></i>Change Password</a></li>
					<li>
					<a href="signup.php" class="dropdownn-item"><i class="fa fa-user" style="margin-right: 10px;"></i>Add User</a></li>
					<li>
					<a href="logout.php" class="dropdownn-item"><i class="fa fa-power-off" style="margin-right: 10px;"></i>
					Logout</a></li>
				</ul>	
				</div>
				
			</div>
			
		</div>
</div>
<div class="modal fade" id="changepass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
				<h5 style="text-align: center; width:100%;">Change Password</h5>
		      </div>
						<div class="modal-body">
							<div class="alert alert-danger" id="alert1" style="background: crimson; color:white;">
							<b>Wrong Password! </b>&nbsp; please enter the correct old password.
							</div>
							<div class="alert alert-danger" id="alert2" style="background: crimson; color:white;">
							<b>Password not Match! </b>&nbsp; please check your password.
							</div>
		      				<div class="form-group">
		    					<label for="id">Old Password <i style="color: red;">*</i></label>
		                		 <input type="password" class="form-control" id="old" name="old"  placeholder="Enter Old Password" required>
		              	  	</div>

	  						<div class="form-group">
		    					<label for="new">New Password <i style="color: red;">*</i></label>
		                   	 <input type="password" class="form-control" id="new" name="new" placeholder="Enter New Password" required>
		                	</div>
		  					<div class="form-group">
		    					<label for="confirm">Confirm Password <i style="color: red;">*</i></label>
		    					<input type="password" name="confirm" class="form-control" id="confirm" placeholder="Confirm New Password" required>
		  					</div>	
		    		  	</div>
		    		  <div class="modal-footer">
		     		 	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		     		   <button type="button" class="btn btn-primary" name="change" id="change" onclick="changepass()">Change</button>  
		     	 </div>
		    </div>
		  </div>
		</div>
<script type="text/javascript">
function changepass(){
	var x = document.getElementById('old');
	var y = document.getElementById('new');
	var z = document.getElementById('confirm');

	if ( x.value == "<?php echo $_SESSION['password'];?>") {
		if ( y.value == z.value) {
			var i = z.value;
			$('#newpass').val(i);
			$("#changepass").modal("hide");
			$("#notchange").modal();
			document.getElementById('alert2').style.display = "none";
	}else{
		document.getElementById('alert2').style.display = "flex";
		document.getElementById('alert1').style.display = "none";
	}

	}else{
		document.getElementById('alert1').style.display = "flex";
	}
}
</script>

<div id="notchange" class="modal fade" role="dialog"> 
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      </div>
      <div class="modal-body">
      <form action="changepass.php" method="POST">
	  <div class="form-group" style="display: none;">
			<input type="text" class="form-control" name="id"  value="<?php echo $_SESSION['userid'] ?>">
	</div>

	<div class="form-group" style="display: none;">
		<input type="text" class="form-control" id="newpass" name="newpass">
	</div>
	<h6>Click <b style="color: blue;">Confirm</b> to Change Password!</h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
		<button type="submit" class="btn btn-primary" name="save" id="save">Confirm</button>
		</form>
      </div>
    </div>

  </div>
</div>
<style type="text/css">
.headerr{
	position: fixed;
	background:#2c3e50;
	padding: 10px 2% 10px 2%;
	width: 100%;
	text-align: center;
	color: white; 
	font-family:century gothic;
	align-items: center;
	display: flex;
	justify-content: space-between;
}
h1{
	font-size: 30px;
	text-shadow:3px 3px #30336b;
	color: #ffffff;
	
}
#alert1, #alert2{
	display: none;
}
.titlee{
	display: flex;
	align-items: center;
}
li{
	width: 100%;
	list-style: none;
}
li a{
	text-decoration: none;
	color: black;
	font-size: 12px;
	align-items: center;
	display: flex;
	padding: 5px;

}
.dropdownn-item:hover{
	text-decoration: none;
	background-color: lightblue;
}
img{
	width: 70px;
	height: 70px;
	margin-right: 15px;
}
@media screen and (max-width: 1300px){
	h1{
		font-size: 20px;
	}
}
</style>
