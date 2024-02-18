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
if(isset($_GET['email'])){

    $email = $_GET['email'];

    $query = "SELECT * FROM alumni WHERE EMAIL = '$email'";
    $result= mysqli_query($con,$query);

	if( $row = mysqli_fetch_assoc($result)){
                ?>
            <h4>EMPLOYMENT HISTORY</h4>
                <div class="a">
                <img src="./images/<?php echo $row['PHOTO'];?>">
            <h6><b>NAME:</b> <?php echo $row['LASTNAME'].", ".$row['FIRSTNAME']." ".$row['MIDDLENAME'];?></h6>
            <h6><b>YEAR GRADUATED:</b> <?php echo $row['BATCH'];?></h6>
            <h6><b>COURSE:</b> <?php 
            $abbr = $row['COURSE'];
            $query1 = "SELECT TITLE FROM programs WHERE ABBREVIATION = '$abbr'";
            $result1= mysqli_query($con,$query1);

            if( $row1 = mysqli_fetch_assoc($result1)){
                echo $row1['TITLE'];
            }
            ?></h6>
            <h6><b>MAJOR:</b> <?php echo $row['MAJOR'];?></h6>
            </div>
                <?php

            }
        
    $query2 = "SELECT * FROM history WHERE EMAIL = '$email' ORDER BY ID_no DESC";
    $result2 = mysqli_query($con,$query2);
    if (mysqli_num_rows($result2)>0) {
    while($row = mysqli_fetch_assoc($result2)){ 
        ?>
        <fieldset class="d1">
        <legend><?php echo $row['DATE_SUBMIT'];?></legend>
        <h5><b>Employability Status:</b> <?php echo $row['EMPLOYABILITY'];?></h5>
        <?php
        $emp = $row['EMPLOYABILITY'];
        if($emp =='Employed'){
        ?>
        <h6><b>Employment Type:</b> <?php echo $row['EMP_TYPE'];?></h6>
        <h6><b>Job Title:</b> <?php echo $row['JOB_TITLE'];?></h6>
        <h6><b>Position:</b> <?php echo $row['POSITION'];?></h6>
        <h6><b>Company Name:</b> <?php echo $row['COMPANY_NAME'];?></h6>
        <h6><b>Company Address:</b> <?php echo $row['COMPANY_ADDRESS'];?></h6>
        <h6><b>Company Contact:</b> <?php echo $row['COM_CONTACT'];?></h6>
        <h6><b>Major Line Business of the Company:</b> <?php echo $row['MLB'];?></h6>
        <h6><b>Initial Profit:</b> <?php echo $row['PROFIT'];?></h6>
        <?php
        }elseif($emp =='Self-Employed'){
        ?>
        <h6><b>Business Name:</b> <?php echo $row['BUSINESS_NAME'];?></h6>
        <h6><b>Business Address:</b> <?php echo $row['BUSINESS_ADDRESS'];?></h6>
        <h6><b>Major Line of the Business:</b> <?php echo $row['MLB'];?></h6>
        <h6><b>Initial Profit:</b> <?php echo $row['PROFIT'];?></h6>
        <?php
        }elseif($emp=='Unemployed'){
        ?>
        <h6><b>Reason(s) for Being Unemployed:</b> <?php echo $row['UNEMPLOYED_REASONS'];?></h6>
        <h6><b>Other Specified Reason:</b> <?php echo $row['OTHER_UNEMP_REASON'];?></h6>
        <?php
        }
         ?>
        </fieldset>
        <?php
        }
    }else{
        ?>
        <h5>No Record Found!</h5>
        <?php
    }
}
?>
</div>
</div>
</div>
</body>
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
    font-family: Century Gothic;
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
h4{
    padding: 30px;
    color: #e1b12c;
}
.a img{
	width: 120px;
	height: 120px;
	border: .5px solid lightgray;
}
.a{
    text-align: left;
    width: 100%;
    padding: 10px 40px;
}
.d1{
	width: 95%;
	padding: 10px;
    margin: auto;
	background: transparent;
	border:.2px solid lightgray;
	display:flex;
	margin-bottom: 15px;
	flex-wrap: wrap;
	align-items: stretch;
	justify-content: left;
	border-radius: 5px;

}
legend{
	font-size: 14px;
	padding: 0;
	margin: 0;
	width: auto;
	text-align: left;
	font-weight: bolder;
    color: #e1b12c;

}
.d1 h5{
    width: 100%;
    padding: 10px;
}
.d1 h6{
    padding: 20px;
}
#employability{
  transition: 0.5s;
  background: lightgray;
  color: black;
}
</style>