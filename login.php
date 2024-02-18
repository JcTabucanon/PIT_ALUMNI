<?php 

  session_start();
  ob_start();

  require "connection.php";
  require 'function.php';

  if(isset($_POST['login'])) {

    $uname = md5($_POST['username']);
    $pword = md5($_POST['password']);
    // $uname = $_POST['username'];
    // $pword = $_POST['password'];
    $pword1 = $_POST['password'];

    $query = "SELECT * FROM user WHERE USERNAME = '$uname' AND PASSWORD = '$pword'";

    $result = mysqli_query($con,$query);

    if(mysqli_num_rows($result) > 0) {

      $row = mysqli_fetch_assoc($result);

      $_SESSION['userid'] = $row['ID'];
      $_SESSION['username'] = $row['USERNAME'];
      $_SESSION['password'] = $pword1;

      header("location:dashboard.php");
      exit;
    } else {
    header('location:login.php?message=loginfailed');
    }

  }
if(!isset($_SESSION['username'], $_SESSION['password'])) {
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
            <div class="col-md-6 col-lg-5 d-none d-md-block" style=" background-image: url(images/banner.jpg); background-repeat: no-repeat;background-size: cover;background-position:center; border-radius: 1rem;">
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form method="POST">
                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;"><i class="fa fa-user" style="font-size:24px"></i> Administration Login</h5>
                  <?php 
                  if (isset($_GET['message'])) { 
                    if ($_GET['message'] == "loginfailed") {?>
                    <div class="alert alert-danger text-center" role="alert" id="alert">
                      
                      <?php echo "INVALID USERNAME OR PASSWORD!"; ?>
                    </div>
                            <?php
                      }elseif($_GET['message'] == "changesuccess") {?>
                        <div class="alert alert-success text-center" role="alert" id="alert">
                          
                          <?php echo "PASSWORD SUCCESSFULLY CHANGE!"; ?>
                        </div>
                                <?php
                          }
                  }

                    ?>
                  <div class="form-floating mb-3 mt-3">
                    <input type="text" id="username" class="form-control form-control-lg" placeholder="Enter Username" name="username" autocomplete="off"/>
                    <label class="form-label" for="username">Username</label>
                  </div>

                  <div class="form-floating mb-3 mt-3">
                    <input type="password" id="password" class="form-control form-control-lg" placeholder="Enter Password" name="password"/>
                    <label class="form-label" for="password">Password</label>
                  </div>
                  <div class="form-floating mb-3 mt-3">
                  	<input type="checkbox" name="showpass" onchange="shpassword(this)">
		            <small id="showpass">Show Password</small>
                  </div>

                  <div class="pt-1 mb-4">
                    <button class="btn btn-dark btn-lg btn-block" type="submit" style="width: 100%;" name="login">Login</button>
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
 } else {
    header("location:dashboard.php");
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
</style>