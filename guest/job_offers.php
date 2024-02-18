<?php
include "../connection.php";
 ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PIT-TC ALUMNI</title>
	<link rel="icon" href="../images/pitlogo.png" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php include "guestheader.php";?>
<div class="contents">
 <div class="con2">
 	<h6>Job offers</h6>
 	<div class="eventcon">
  <?php
  $query = "SELECT * FROM jobs_offer ORDER BY ID DESC";
  $result = mysqli_query($con, $query);
  if (mysqli_num_rows($result) > 0){
  while($row =mysqli_fetch_assoc($result)){
  ?>
 	<div class="eventitems">
 	<h5><?php echo $row['JOB_TITLE']; ?></h5>
 	<img src="../gallery/<?php echo $row['BANNER'];?>">
 	<p> <?php echo $row['DESCRIPTION'];?></p>
    <small>Date Upload: <?php echo $row['DATE_CREATED'];?></small>
 	</div>
 	<?php
 }
}else{
	?>
	<h1>No Upcomming Events Available!!!</h1>
<?php
}
 	?>
 	</div>
 </div>
 <div class="con1" style="background: #011c38;">
 	<div class="vmgcon">
	<div class="vmg">
	 <h3>VISION</h3>
	 <hr>
	 <p>A PREMIER POLYTECHNIC STATE UNIVERSITY</p>
	</div>
	<div class="vmg">
	 <h3>MISSION</h3>
	 <hr>
	 <p>&emsp;&emsp;&emsp;To strengthen its capacity of producing highly skilled, competent, and world-class human resources, responsible to fulfill stakeholder needs, goals of the national development and ASEAN integration, for the attainment of a good quality of life with the guidance and providence of God.</p>
	</div>
	<div class="vmg">
	 <h3>GOAL</h3>
	 <hr>
	 <p>&emsp;&emsp;&emsp;Make PIT a premier polytechnic educational institution where students are trained to excel in their areas of specialization through quality instruction, product-based research, need-driven extension and accessible production programs for a heightened socio-economic development and improved quality life in a fast changing society.</p>
	</div>
 	</div>
	<div class="directorcon">
	<div class="director">
	<p>Our Beloved</p>
	<h3>Campus Director</h3>
	<img src="director.jpg">
	<h6 style="color:#ffffff;margin:10px 0 20px 0;">EUTIQUIO A. PERNIS, Ed. D., J.D.</h6>
	</div>
	</div>
 </div>
</div>
<footer>
  <?php include "../survey/footer.php";?>
</footer>
</body>
</html>
<style type="text/css">
*{
	margin: 0;
	padding: 0;
}
body{
	background-repeat: no-repeat;
    background-size: cover;
	background-color:#535c68;
	position: static;
}
#job{
	text-decoration: none;
	color: #ffda79;
	font-weight: bold;
	border-bottom: 3px solid #2c2c54;
}
footer{
  background:#025043;
  color: white;
  left: 0;
  bottom: 0;
  width: 100%;
  font-size: 14px;
}
.con1{
	display: flex;
	width: 100%;
}
.con2{
	display: flex;
	width: 100%;
	min-height: 200px;
	flex-direction: column;
	padding-bottom: 30px;
}
.contents{
	width: 100%;
	display: flex;
	flex-direction: column;
	padding-top:150px;
	background: white;
	min-height: 1000px;
}
.con2 h6{
	width: 100%;
	padding: 20px;
	color: #f39c12;
}
.con2 h1{
	width: 100%;
	padding: 20px;
	text-align: center;
	font-size: 20px;
	color: #9b59b6;
}
.eventcon{
	width: 100%;
	display: flex;
	flex-direction: column;
	align-items: center;
	justify-content: center;
}
.eventitems{
	width: 50%;
	display: flex;
	flex-direction: column;
	background: #111827;
	margin: 10px;
    border: .5px solid darkgray;
	padding-bottom: 0;
	border-radius: 5px;
}
.eventitems img{
	width: 100%;
	height: 300px;
    border: .5px solid darkgray;
}
.eventitems h5{
	width: 100%;
	padding: 10px;
	color: #f39c12;
	text-align: center;
}
.eventitems h6{
	width: 100%;
	padding: 10px;
	color: white;
	font-size: 14px; 
	text-align: center;
}
.eventitems p{
	width: 100%;
	padding: 10px;
	margin: 0;
	height: auto;
	background:#ecf0f1;
	color: #025043;
	text-align: justify;
}
.eventitems small{
    width: 100%;
    background: #ecf0f1;
    text-align: right;
    padding: 7px;
	border-bottom-right-radius: 5px;
	border-bottom-left-radius: 5px;
}
.vmgcon{
	width: 60%;
	display: flex;
	flex-direction: column;
	align-items: center;
	justify-content: center;
}
.vmg{
	width: 100%;
	padding: 40px;
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;
}
.vmg h3{
	color: #f39c12;
	text-align: center;
	padding-bottom: 15px;
	margin: 0;
	width: 300px;
	letter-spacing: 1px;
	border-bottom: 2px solid darkgray;
}
.vmg p{
	color: #ffffff;
	text-align: justify;
	letter-spacing: 1px;
	max-width: 600px;
}
.directorcon{
	width: 40%;
	display: flex;
	align-items: left;
	justify-content: left;
	padding-left: 30px;
}
.director{
	width: 300px;
	display: flex;
	flex-direction: column;
	align-items: center;
	justify-content: center;
}
.director p{
	padding: 0;
	margin: 0;
	color: #10ac84;
	font-weight: bold;
}
.director h3{
	color: #ffda79;
	letter-spacing: 1px;
	padding: 0;
	margin: 0;

}
.director img{
	width: 300px;
	height: 300px;
	margin-top: 20px;
	border-radius: 100%;
}
@media screen and (max-width: 900px){
	.eventcon{
		display: flex;
		flex-direction: column;
	}
	.eventitems{
	width: 80%;
	}
	.con1{
	flex-direction: column;
	}
	.vmgcon{
		width: 100%;
	}
	.directorcon{
		width: 100%;
		align-items: center;
		justify-content: center;
		padding-left: 0;
	}
}	
</style>