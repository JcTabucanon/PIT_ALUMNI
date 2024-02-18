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
<?php include "header.php"; ?>
<div class="containerr">
<div class="content">
<div class="eventtable">
<?php
	if (isset($_GET['emp'])) {

    if($_GET['emp']=='employed'){
		
	   	    	?>
<div class="" style="width:100%;">
<a href="employability.php?employability=Employed" class="btn btn-secondary" style="float:right; margin:10px;">Back</a>
<button class="btn btn-primary" style="float:right; margin:10px;"  onclick="print()">Print</button>
</div>
<div class="con" id="con">
<h5>Alumni Employability Status</h5>
<h6>(EMPLOYED)</h6>
<div class="filtercon">
   <form class="filter form-inline">
   	 <div class="drop form-group">
   	<label for="program">Program:</label>
    <select name="program" class="form-control" id="myInput" onchange="myFunction()">
     <option>All</option>
	    				<?php
	    				include "connection.php";
	    				$query = "SELECT * FROM programs";
	    				$result = mysqli_query($con, $query);
						if ($result) {
							while($row =mysqli_fetch_assoc($result)){ ?>
							<option><?php echo $row['ABBREVIATION'];?></option>
						<?php
						}
						}
	    				 ?>	
    </select>
</div>
 <div class="drop form-group">
    	<label for="batch">Batch:</label>
    <select name="batch" class="form-control" id="batch" onchange="myBatch()">
    <option>All</option>
	    				<?php
	    				$years = range(1974, strftime("%Y", time())); 
						foreach(array_reverse($years) as $year){ ?>
							<option><?php echo $year;?></option>
						<?php
						}
	    				 ?>	
    </select>
 </div>
 </form>
 </div>
			<div class="con">
				<table class="table text-center" id="myTable">
				  <thead class="thead-dark">
				    <tr>
				      <th>#</th>
				      <th>Name</th>
				      <th>Program</th>
				      <th>Major</th>
				      <th>Year Graduated</th>
              <th>Permanent Address</th>
              <th>Employement Type</th>
              <th>Job Title</th>
              <th>Position</th>
              <th>Company Name</th>
              <th>Company Address</th>
              <th>Company Contact</th>
              <th>Major line business of the company</th>
              <th>Profit</th>
              <th>Date Submitted</th>
				    </tr>
				  </thead>
				  <tbody>
<?php 
$status = "Employed";
$query = "SELECT * FROM survey WHERE EMPLOYABILITY = '$status'";
$result = mysqli_query($con, $query);
$i = 1; 
if ($result) {
	while($row =mysqli_fetch_assoc($result)){ 
	$bday = date("F d, Y", strtotime($row['BIRTHDAY']));
	?>
	    <tr>
      <td><b><?php echo $i++; ?></b></td>
		      <td class="name"><?php echo $row['LASTNAME'].", ".$row['FIRSTNAME']." ".$row['MIDDLENAME']; ?></td>
		      <td class="course"><?php echo $row['COURSE']; ?></td>
		      <td class="major"><?php echo $row['MAJOR'];?></td>
          <td class="batch"><?php echo $row['BATCH']; ?></td>
		      <td class="permanent"><?php echo $row['PERMANENT_ADD']; ?></td>
          <td class="type"><?php echo $row['EMP_TYPE']; ?></td>
          <td class="job"><?php echo $row['JOB_TITLE']; ?></td>
          <td class="position"><?php echo $row['POSITION']; ?></td>
          <td class="com_name"><?php echo $row['COMPANY_NAME']; ?></td>
          <td class="com_add"><?php echo $row['COMPANY_ADDRESS']; ?></td>
          <td class="com_con"><?php echo $row['COM_CONTACT']; ?></td>
          <td class="mlb"><?php echo $row['MLB']; ?></td>
          <td class="profit"><?php echo $row['PROFIT']; ?></td>
      <td class="date"><?php echo $row['DATE_SUBMIT']; ?></td>
    </tr>
<?php
		}
}
?>	  </tbody>
				</table>
			</div>
        </div>
        <?php
    }elseif($_GET['emp']=='unemployed'){
		
      ?>
<div class="" style="width:100%;">
<a href="employability.php?employability=Unemployed" class="btn btn-secondary" style="float:right; margin:10px;">Back</a>
<button class="btn btn-primary" style="float:right; margin:10px;"  onclick="print()">Print</button>
</div>
<div class="con" id="con">
<h5>Alumni Employability Status</h5>
<h6>(UNEMPLOYED)</h6>
<div class="filtercon">
<form class="filter form-inline">
<div class="drop form-group">
<label for="program">Program:</label>
<select name="program" class="form-control" id="myInput" onchange="myFunction()">
<option>All</option>
       <?php
       include "connection.php";
       $query = "SELECT * FROM programs";
       $result = mysqli_query($con, $query);
     if ($result) {
       while($row =mysqli_fetch_assoc($result)){ ?>
       <option><?php echo $row['ABBREVIATION'];?></option>
     <?php
     }
     }
        ?>	
</select>
</div>
<div class="drop form-group">
<label for="batch">Batch:</label>
<select name="batch" class="form-control" id="batch" onchange="myBatch()">
<option>All</option>
       <?php
       $years = range(1974, strftime("%Y", time())); 
     foreach(array_reverse($years) as $year){ ?>
       <option><?php echo $year;?></option>
     <?php
     }
        ?>	
</select>
</div>
</form>
</div>
<div class="con">
 <table class="table text-center" id="myTable">
   <thead class="thead-dark">
     <tr>
       <th>#</th>
       <th>Name</th>
       <th>Program</th>
       <th>Major</th>
       <th>Year Graduated</th>
       <th>Permanent Address</th>
       <th>Reason(s) for Being Unemployed</th>
       <th>Specified Reason</th>
       <th>Date Submitted</th>
     </tr>
   </thead>
   <tbody>
<?php 
$status = "Unemployed";
$query = "SELECT * FROM survey WHERE EMPLOYABILITY = '$status'";
$result = mysqli_query($con, $query);
$i = 1; 
if ($result) {
while($row =mysqli_fetch_assoc($result)){ 
$bday = date("F d, Y", strtotime($row['BIRTHDAY']));
?>
<tr>
<td><b><?php echo $i++; ?></b></td>
   <td class="name"><?php echo $row['LASTNAME'].", ".$row['FIRSTNAME']." ".$row['MIDDLENAME']; ?></td>
   <td class="course"><?php echo $row['COURSE']; ?></td>
   <td class="major"><?php echo $row['MAJOR'];?></td>
   <td class="batch"><?php echo $row['BATCH']; ?></td>
   <td class="permanent"><?php echo $row['PERMANENT_ADD']; ?></td>
   <td class="type"><?php echo $row['UNEMPLOYED_REASONS']; ?></td>
   <td class="job"><?php echo $row['OTHER_UNEMP_REASON']; ?></td>
<td class="date"><?php echo $row['DATE_SUBMIT']; ?></td>
</tr>
<?php
}
}
?>	  </tbody>
 </table>
</div>
 </div>
 <?php
}elseif($_GET['emp']=='self-employed'){
		
  ?>
<div class="" style="width:100%;">
<a href="employability.php?employability=Self-Employed" class="btn btn-secondary" style="float:right; margin:10px;">Back</a>
<button class="btn btn-primary" style="float:right; margin:10px;"  onclick="print()">Print</button>
</div>
<div class="con" id="con">
<img src="images/pitlogo.png" class="logo">
<h5>Alumni Employability Status</h5>
<h6>(SELF-EMPLOYED)</h6>
<div class="filtercon">
<form class="filter form-inline">
<div class="drop form-group">
<label for="program">Program:</label>
<select name="program" class="form-control" id="myInput" onchange="myFunction()">
<option>All</option>
   <?php
   include "connection.php";
   $query = "SELECT * FROM programs";
   $result = mysqli_query($con, $query);
 if ($result) {
   while($row =mysqli_fetch_assoc($result)){ ?>
   <option><?php echo $row['ABBREVIATION'];?></option>
 <?php
 }
 }
    ?>	
</select>
</div>
<div class="drop form-group">
<label for="batch">Batch:</label>
<select name="batch" class="form-control" id="batch" onchange="myBatch()">
<option>All</option>
   <?php
   $years = range(1974, strftime("%Y", time())); 
 foreach(array_reverse($years) as $year){ ?>
   <option><?php echo $year;?></option>
 <?php
 }
    ?>	
</select>
</div>
</form>
</div>
<div class="con">
<table class="table text-center" id="myTable">
<thead class="thead-dark">
 <tr>
   <th>#</th>
   <th>Name</th>
   <th>Program</th>
   <th>Major</th>
   <th>Year Graduated</th>
   <th>Permanent Address</th>
   <th>Business name</th>
   <th>Business Address</th>
   <th>Major Line of Business</th>
   <th>Profit</th>
   <th>Date Submitted</th>
 </tr>
</thead>
<tbody>
<?php 
$status = "Self-Employed";
$query = "SELECT * FROM survey WHERE EMPLOYABILITY = '$status'";
$result = mysqli_query($con, $query);
$i = 1; 
if ($result) {
while($row =mysqli_fetch_assoc($result)){ 
$bday = date("F d, Y", strtotime($row['BIRTHDAY']));
?>
<tr>
<td><b><?php echo $i++; ?></b></td>
<td class="name"><?php echo $row['LASTNAME'].", ".$row['FIRSTNAME']." ".$row['MIDDLENAME']; ?></td>
<td class="course"><?php echo $row['COURSE']; ?></td>
<td class="major"><?php echo $row['MAJOR'];?></td>
<td class="batch"><?php echo $row['BATCH']; ?></td>
<td class="permanent"><?php echo $row['PERMANENT_ADD']; ?></td>
<td class="mlb"><?php echo $row['BUSINESS_NAME']; ?></td>
<td class="profit"><?php echo $row['BUSINESS_ADDRESS']; ?></td>
<td class="mlb"><?php echo $row['MLB']; ?></td>
<td class="profit"><?php echo $row['PROFIT']; ?></td>
<td class="date"><?php echo $row['DATE_SUBMIT']; ?></td>
</tr>
<?php
}
}
?>	  </tbody>
</table>
</div>
</div>
<?php
}
	 } 	    	
	 ?>
</div>
</div>
</div>
</body>
<script>
  function myFunction() {
  // Variables
  let dropdown, table, rows, cells, course, filter;
  dropdown = document.getElementById("myInput");
  table = document.getElementById("myTable");
  rows = table.getElementsByTagName("tr");
  filter = dropdown.value;

  // Loops through rows and hides those with countries that don't match the filter
  for (let row of rows) { // `for...of` loops through the NodeList
    cells = row.getElementsByTagName("td");
    course = cells[2] || null; // gets the 2nd `td` or nothing
    // if the filter is set to 'All', or this is the header row, or 2nd `td` text matches filter
    if (filter === "All" || !course || (filter === course.textContent)) {
      row.style.display = ""; // shows this row
    }
    else {
      row.style.display = "none"; // hides this row
    }
  }
}
function myBatch() {
 // Variables
 let dropdown, table, rows, cells, batch, filter;
  dropdown = document.getElementById("batch");
  table = document.getElementById("myTable");
  rows = table.getElementsByTagName("tr");
  filter = dropdown.value;

  // Loops through rows and hides those with countries that don't match the filter
  for (let row of rows) { // `for...of` loops through the NodeList
    cells = row.getElementsByTagName("td");
    batch = cells[4] || null; // gets the 2nd `td` or nothing
    // if the filter is set to 'All', or this is the header row, or 2nd `td` text matches filter
    if (filter === "All" || !batch || (filter === batch.textContent)) {
      row.style.display = ""; // shows this row
    }
    else {
      row.style.display = "none"; // hides this row
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
.content{
	width: 100%;
	border-radius: 5px;
	margin:5px;
	background-color:#353b48;
	box-shadow: 5px 5px 10px 0 rgba(0,0,0.3),0 7px 21px 0 rgba(0,0,0,0.20);
	padding: 20px;
	display: flex;
	align-items: center;
	text-align: center;
	justify-content: center;
	flex-direction: column;

}
.info{
	width: 95%;
	margin: 30px auto;
	align-items: stretch;
	justify-content: stretch;
	border: .5px solid lightgray;
	display: flex;
	flex-wrap: wrap;
	background: #f1f2f6;
	border-radius: 5px;
}
h6{
  padding-bottom: 20px;
}
th,td{
    text-align: center;
}
#employability{
  transition: 0.5s;
  background: lightgray;
  color: black;
}
.filtercon{
	width: 100%; 
	display: flex;
	flex-direction: row;

}
.filter{
	width: 50%;
}
.drop{
	margin-right: 30px;
	margin-left: 30px;
}
.drop select{
	width: 200px;
	margin-left: 10px;

}
@media print {
  body * {
    visibility: hidden;
  }
  #con, #con * {
    visibility: visible;
  }
  #con {
    position: absolute;
    left: 0;
    top: 0;
  }
}
</style>