<?php
     session_start();
      ob_start();
      require "connection.php";
      require "function.php";

     if(isset($_SESSION['username'], $_SESSION['password'])) {  
 ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PIT-TC ALUMNI</title>
	<link rel="icon" href="images/pitlogo.png" type="image/x-icon">
</head>
<body>
<?php include "header.php" ?>
<div class="containerr">
<?php include "sidebar.php" ?>
<div class="contentt">
<div class="welcome">
<ul class="breadcrumb">
  <li><a href="dashboard.php">Dashboard</a></li>
  <li><a href="#" style="color:white;">Gallery</a></li>
  </ul>
		<hr>
    </div>
	<div class="eventtable">
	<div class="card-header">
					<b>Gallery</b>
					<span class="float:right"><a class="btn btn-primary float-right" data-toggle="modal" data-target="#addmodal" style="color: white;">
				<i class="fa fa-plus"></i> New Entry
			</a></span>
	</div>
	<?php 
		if (isset($_GET['message'])) { 
			if ($_GET['message'] == "addfailed") {?>
			<div class="alert alert-danger text-center" role="alert" id="alert">
				
				<?php echo "Unknown Error While Uploading!!! "; ?>
			</div>
              <?php
				}elseif ($_GET['message'] == "delete") {?>
			<div class="alert alert-success text-center" role="alert" id="alert">
				
				<?php echo "SUCCESSFULLY DELETED!"; ?>
			</div>
              <?php
				}elseif ($_GET['message'] == "addsuccess") { ?>
			<div class="alert alert-success text-center" role="alert" id="alert">
				
				<?php echo "UPLOADED SUCCESSFULLY!"; ?>
			</div>
              <?php
				}
		}

      ?>
<div class="filtercon">
 <form class="filter form-inline">
<div class="form-group" style="width:100%;">
<input type="search" class="search form-control" id="search" onkeyup="myName()" placeholder="Search Names"style="width: 75%;"/>
</div>
 </form>
 </div>
	<div class="con">
				<table class="table" id="myTable">
				<colgroup>
					<col width="10%">
					<col width="30%">
					<col width="25%">
					<col width="20%">
					<col width="15%">
				</colgroup>
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Images</th>
				      <th scope="col">Title</th>
				      <th scope="col">Date Upload</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
<?php 
$query = "SELECT * FROM gallery ORDER BY ID DESC";
$result = mysqli_query($con, $query);
$i = 1; 
if ($result) {
	while($row =mysqli_fetch_assoc($result)){ ?>

			  	    <tr>
				      <td><b><?php echo $i++; ?></b></td>
				      <td class="id" style="display: none;"><?php echo $row['ID']; ?></td>
					  <td class="pic" style="display: none;"><?php echo $row['IMAGE']; ?></td>
					  <td class="name text-center"> <a target="_blank" href="gallery/<?php echo $row['IMAGE'];?>"><img src="./gallery/<?php echo $row['IMAGE']; ?>"></a></td>
				      <td class="title"><?php echo $row['TITLE']; ?></td>
				      <td class="date"><?php echo $row['DATE_UPLOAD']; ?></td>
				      <td class="text-center"><button type="button" class="delete btn btn-danger" data-toggle="modal" data-target="#deletemodal" title="Delete Image" data-mdb-toggle="popover" data-mdb-trigger="hover"><i class="fas fa-trash-alt"></i></button>
				      </td>
				    </tr>
<?php
		}
}

if (isset($_POST['delete'])) {
	$image = $_POST['course'];
	$name =  $_POST['name'];

	$query ="DELETE FROM gallery WHERE ID = '$image'";
	$result = mysqli_query($con,$query);

	if ($result) {
		unlink( "./gallery/" . $name);
	   header('location:gallery.php?message=delete');
	   exit;
	  }
	  else{
	  	die(mysqli_error($con));
	  }
}
?>	  </tbody>
				</table>
			</div>
    </div>
	
</div>	
</div>
<div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form" action="upload.php" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
		<div class="form-group">
		<label for="schedule">Title</label>
		<input type="text" name="title" class="form-control">
		</div>
		<div class="form-group">
		<label for="location">Select Photo</label>
		<input type="file" name="image[]" class="form-control" accept="image/png, image/gif, image/jpeg, image/jpg" multiple>
		</div>
	  </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" name="submit">Save</button>  
      </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <h5 class="modal-title">Delete Selected Image!</h5>
      </div>
      <div class="modal-footer">
      	<form class="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
      	<div class="form-group">
			<label for="title">image</label>
            <input type="text" class="form-control" name="course" id="course">
			<input type="text" class="form-control" name="name" id="name">
		</div>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" name="delete" class="btn btn-primary">Delete</button>
    	</form>
      </div>
    </div>
  </div>
</div>
</body>
<script>
	setTimeout(function(){
		document.getElementById('alert').style.display = "none";
	},3000);
			
</script>
<script>
	$('.delete').click(function(){

			var $row = $(this).closest('tr');
			var itemd = $row.find('.id').text();
			var name = $row.find('.pic').text();

			$('#course').val(itemd);
			$('#name').val(name);

		});

function myName() {
var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("search");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[4];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
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
<style>
#gallery{
  transition: 0.5s;
  background: lightgray;
  color: black;
}
.filtercon{
	width: 100%; 
	display: flex;
	flex-direction: row;
	padding-top: 30px;

}
.filter{
	width: 50%;
	padding-left: 30px;
}
.search{
	width:75%;
	float: right;
	background-image: url('/images/search.png');
    background-position: 10px 10px;
	background-size: 17px;
    background-repeat: no-repeat;
	font-size: 16px;
  padding: 12px 20px 12px 40px;
}
</style>