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
  <?php
  $query = "SELECT * FROM gallery ORDER BY ID DESC";
  $result = mysqli_query($con, $query);
  if (mysqli_num_rows($result) > 0){
  while($row =mysqli_fetch_assoc($result)){
  ?>
 	<a class="eventitems" href="#"> 
 	<img src="../gallery/<?php echo $row['IMAGE'];?>">
    <small>Date Upload: <?php echo $row['DATE_UPLOAD'];?></small>
  </a>
 	<?php
 }
}else{
	?>
	<h1>No Upcomming Events Available!!!</h1>
<?php
}
 	?>
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
#gallery{
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
	width: 80%;
    align-items: stretch;
    flex-wrap: wrap;
    justify-content: center;
	padding: 50px 0 30px 0;
    background:#ecf0f1;
}
.contents{
	width: 100%;
	display: flex;
    align-items: center;
    justify-content: center;
	flex-direction: column;
	padding-top:150px;
	background: white;
	min-height: 1000px;
}
.eventitems{
	width: 350px;
	display: flex;
	flex-direction: column;
    text-decoration: none;
	background: #011c38;
	margin: 10px;
    border: .5px solid #535c68;
	padding-bottom: 0;
	border-radius: 5px;
}
.eventitems:hover{
    border: 2px solid darkgray;
}
.eventitems img{
	width: 100%;
	height: 200px;
    border-top-right-radius: 5px;
	border-top-left-radius: 5px;
}
.eventitems h6{
	width: 100%;
	padding: 10px;
	color: #ecf0f1;
	font-size: 14px; 
	text-align: center;
}
.eventitems small{
    width: 100%;
    color: #ecf0f1;
    padding: 10px;
    text-align: right;
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
	.con2{
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