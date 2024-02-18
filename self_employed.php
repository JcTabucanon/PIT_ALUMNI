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
<?php include "sidebar.php";
	  ?>
<div class="contentt">
<div class="welcome">
<ul class="breadcrumb">
  <li><a href="dashboard.php">Dashboard</a></li>
  <li><a href="employability.php?employability=Employed">Employability Status</a></li>
  <li><a href="#" style="color:white;">Self-Employed</a></li>
</ul>
    <hr>
</div>
<div class="eventtable">

<div class="con" id="con">
	<?php
	if (isset($_GET['course'])) {

		 	$course = $_GET['course'];
            $emp = 'Self-Employed';
			$sql ="SELECT * FROM programs WHERE ABBREVIATION = '$course'";

		    $result= mysqli_query($con,$sql);

	   	    if( $row = mysqli_fetch_assoc($result)){
	   	    	?>
	   	   <h5><?php echo $row['TITLE']; ?></h5>
              <h6><?php echo '('.$row['ABBREVIATION'].')'; ?></h6>
			  <?php
            }?>
				<table class="table">
				<colgroup>
					<col width="25%">
					<col width="25%">
					<col width="25%">
					<col width="25%">
				</colgroup>
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">Batch</th>
				      <th scope="col">Total Graduate</th>
				      <th scope="col">Total Self-Employed</th>
				      <th scope="col">Relevant to Program</th>
				    </tr>
				  </thead>
				  <tbody>
    <?php 
    $batch = date("Y", strtotime('-1 year'));
     for($i=0;$i<10;$i++){

    ?>
			  	    <tr>
				      <td class="batch"><?php echo $batch;?></td>
				      <td class="total"><b><?php
                      $query ="SELECT * FROM alumni WHERE BATCH = '$batch' AND COURSE = '$course'";
                      $resul= mysqli_query($con,$query);
                      if ($totaln1 = mysqli_num_rows($resul)) {
                        echo $totaln1;
                    }else{
                        echo "0";
                    }
                       ?></b></td>
				      <td class="employed"><b><?php
                      $query ="SELECT * FROM survey WHERE BATCH = '$batch' AND COURSE = '$course' AND EMPLOYABILITY ='$emp'";
                      $resul= mysqli_query($con,$query);
                      $totaln2 = mysqli_num_rows($resul);
                    if($totaln2>0 AND $totaln1>0){
                        $totalemp = $totaln2/$totaln1*100;
                        echo $totaln2.' ('.$totalemp.'%)';
                    }else{
                        echo "0";
                    }
                       ?></b></td>
				      <td class="relevant"><b><?php
                      $query ="SELECT * FROM survey WHERE BATCH = '$batch' AND COURSE = '$course' AND EMPLOYABILITY ='$emp' AND RELEVANT = 'Yes'";
                      $resul= mysqli_query($con,$query);
                      $totaln3 = mysqli_num_rows($resul);
                      if ($totaln3>0 AND $totaln2>0) {
                        $totalrel = $totaln3/$totaln2*100;
                        echo $totaln3.' ('.$totalrel.'%)';
                    }else{
                        echo "0";
                    }
                       ?></b></td>
				    </tr>
    <?php
    $batch--;
     }
     ?>

  </tbody>
				</table>
        </div>
    <?php
	 } 	    	
	 ?>
	 <div class="modal-footer">
   <button type="button" class="btn btn-primary" onclick="print()">Print</button>
	 <a href="employability.php?employability=Self-Employed"><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> </a>
	 </div>
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