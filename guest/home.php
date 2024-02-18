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
 <div class="con1">
 	<div class="introduction">
 		<h2>PIT - TC ALUMNI</h2>
 		<p>
Dear Alumni,<br>

&emsp;&emsp;&emsp;We are honored to have you as members of the association and to be a part of the history, development, and accomplishments of our alma mater.
<br>
&emsp;&emsp;&emsp;On this website, we will share with you the association's upcoming events and job opportunities that benrfit Palompon Institute of Technology Tabango alumni, recent graduates, and the local community.<br><br>
May God bless us always!
</p>
 	</div>
 	<div class="model">
 		<img src="model.png">
 	</div>
 	
 </div>
 <div class="con2">
 	<h6>Upcomming Events</h6>
 	<div class="eventcon">
  <?php
  $query = "SELECT * FROM events LIMIT 3";
  $result = mysqli_query($con, $query);
  if (mysqli_num_rows($result) > 0){
  while($row =mysqli_fetch_assoc($result)){
  ?>
 	<div class="eventitems">
 	<h5><?php echo $row['EVENT']; ?></h5>
 	<h6>WHEN: <?php echo $row['SCHEDULE']; ?></h6>	
 	<h6>WHERE: <?php echo $row['LOCATION']; ?></h6>
 	<a href="events.php">Read More</a>	
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
 <div class="con2" style="background: white;">
 	<h6 style="color:#10ac84; ">Job Offers</h6>
 	<div class="eventcon">
  <?php
  $query = "SELECT * FROM jobs_offer LIMIT 3";
  $result = mysqli_query($con, $query);
  if (mysqli_num_rows($result) > 0){
  while($row =mysqli_fetch_assoc($result)){
  ?>
 	<div class="eventitems" style="background: #011c38;">
	
 	<h5 style="color: white;"><?php echo $row['JOB_TITLE']; ?></h5>
	 <img src="../gallery/<?php echo $row['BANNER'];?>">
 	<a href="job_offers.php">Read More</a>	
 	</div>
 	<?php
 }
}else{
	?>
	<h1>No Job Offer Available!!!</h1>
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
#home{
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
	background:#011c38;
	padding-bottom: 30px;
}
.introduction{
	display: flex;
	width: 50%;
	flex-direction: column;
}
.introduction h2{
	width: 100%;
	padding: 50px 0 0 20%;
	font-size: 23px;
	color: #10ac84;
}
.introduction p{
	width: 100%;
	padding-left: 20%;
	text-align: justify;
	letter-spacing: 1px;
	color: #222f3e;
}
.model{
	width: 50%;
	display: flex;
	height: 400px;
	align-items: center;
	justify-content: center;
}
.model img{
	height: 400px;
	padding-right: 35%;
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
	align-items: center;
	justify-content: center;
}
.eventitems{
	width: 25%;
	display: flex;
	flex-direction: column;
	background: #111827;
	margin: 10px;
	border-radius: 5px;
}
.eventitems:hover{
	border: 2px solid darkgray;

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
.eventitems img{
	width: 100%;
	height: 300px;
	border: .5px solid darkgray;
}
.eventitems a{
	width: 100%;
	padding: 10px;
	background:#025043;
	text-decoration: none;
	color: #bdc3c7;
	text-align: center;
	border-bottom-right-radius: 5px;
	border-bottom-left-radius: 5px;

}
.eventitems a:hover{
	background: #006266;
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
	.model{
		display: none;
	}
	.introduction{
	width: 100%;
	padding-right: 10%;
	background-image: url('model.png');
	background-size: contain;
	background-color: gray;	
	background-repeat: no-repeat;
	}
	.introduction h2{
	text-shadow: .5px .5px black;	
	}
	.introduction p{
	color: #ffffff;
	text-shadow: .5px .5px black;
	padding-bottom: 30px;
	font-weight: bold; 
	}
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