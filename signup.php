<?php 

  session_start();
  ob_start();

  require "connection.php";
  require 'function.php';

  if (isset($_POST['submit'])) {

 $password = md5($_POST['password']);
 $lname = clean($_POST['lastname']);
 $fname = clean($_POST['firstname']);
 $email = md5($_POST['email']);
 $gender = clean($_POST['gender']);
 $birthday = clean($_POST['birthday']);
 $address = clean($_POST['address']);

 $query = "SELECT USERNAME FROM user WHERE USERNAME = '$username'";
 $result = mysqli_query($con,$query);

 if(mysqli_num_rows($result) == 0) {

     $query = "INSERT INTO user(USERNAME, PASSWORD , LASTNAME, FIRSTNAME , GENDER, BIRTHDAY, ADDRESS) VALUES('$email','$password','$lname','$fname','$gender','$birthday', '$address')";

   if(mysqli_query($con, $query)) {

    header("location:signup.php?message=changesuccess");
       
   } else {

    header('location:signup.php?message=loginfailed');
   }
 } else {
    header('location:signup.php?message=loginfailed');
     
 }

} 
  if(isset($_SESSION['username'], $_SESSION['password'])) {
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>PIT-TC ALUMNI</title>
	<link rel="icon" href="images/pitlogo.png" type="image/x-icon">
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
</head>
<script>
      setTimeout(function(){
        document.getElementById('alert').style.display = "none";
      },3000);    
</script>
<body>
<section class="vh-100" style="background-color: #34495e; background-image: url(images/background.jpg); background-repeat: no-repeat;background-size:contain;background-position:center;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="">
              <div class="card-body p-4 p-lg-5 text-black">
                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;"><i class="fa fa-user" style="font-size:24px"></i> Sign-Up</h5>
                  <?php 
                  if (isset($_GET['message'])) { 
                    if ($_GET['message'] == "loginfailed") {?>
                    <div class="alert alert-danger text-center" role="alert" id="alert">
                      
                    <?php echo "EMAIL OR PASSWORD ALREADY TAKEN!"; ?>
                    </div>
                    <?php
                      }elseif($_GET['message'] == "changesuccess") {?>
                        <div class="alert alert-success text-center" role="alert" id="alert">
                          
                          <?php echo "SUCCESSFULLY ADDED TO THE DATABASE!"; ?>
                        </div>
                                <?php
                          }
                  }

                    ?>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <div class="form-row">
    <div class="col">
    <label for="inputEmail4">Firstname</label>
      <input type="text" class="form-control" name="firstname" required>
    </div>
    <div class="col">
    <label for="inputEmail4"> Lastname</label>
      <input type="text" class="form-control" name="lastname" required>
    </div>
  </div>
  <div class="form-row">
    <div class="col">
    <label for="inputEmail4">Email</label>
      <input type="text" class="form-control" name="email" required>
    </div>
    <div class="col">
    <label for="inputEmail4"> Password</label>
      <input type="password" class="form-control" name="password" id="password" required>
      <input type="checkbox" name="showpass" onchange="shpassword(this)">
	  <small id="showpass">Show Password</small>
    </div>
  </div>
  <div class="form-row">
    <div class="col">
    <label for="inputEmail4">Birthday</label>
      <input type="date" class="form-control" name="birthday" required>
    </div>
    <div class="col">
    <label for="inputEmail4">Gender</label>
    <select class="form-control" name="gender" required>
    <option style="display: none;"></option>
    <option>Male</option>
    <option>Female</option>
    </select>
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" name="address" required>
  </div>
       <div class="pt-1 mb-4" style="float:right; margin-top:50px;">
                <a href="dashboard.php" class="btn btn-secondary btn-lg btn-block" type="button" name="back">Back</a>
                    <button class="btn btn-dark btn-lg btn-block" type="submit" name="submit">Submit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
<script>
	function shpassword(x)
	{
		var checkbox = x.checked;

		if (checkbox) {
			document.getElementById('password').type = "text";
			document.getElementById('showpass').textContent ="Hide Password";
		}else
		{
			document.getElementById('password').type="password";
			document.getElementById('showpass').textContent ="Show Password";
		}
	}
</script>
</html>
<?php 
}else {
    header("location:login.php");
    exit;
    }
  mysqli_close($con);
?>
<style type="text/css">
*{
	margin: 0;
	padding: 0;
}
body{
	background-repeat: no-repeat;
    background-size: cover;
	background-color:#7f8c8d;
	position: static;
}
label{
	color:gray;
}
.form-row{
    width: 100%;
    display: flex;
    flex-direction:row;
    margin: 15px 0 15px 0;
}
.col{
    width: 50%;
    margin: 5px;
}
</style>