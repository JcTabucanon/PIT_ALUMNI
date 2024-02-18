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
 <h4>About Palompon Institute of Technology - Tabango Campus</h4>
 <p>
 &emsp;&emsp;&emsp;The Palompon Institute of Technology (PIT) is a state college in the Philippines. It is mandated to provide higher vocational, professional, and technical instruction and training in trade and industrial education and other vocational courses, professional courses, and offer engineering courses. It is also mandated to promote research, advance studies and progressive leadership in the fields of trade, technical, industrial and technological education. Its main campus is in Palompon, Leyte.<br><br>
 &emsp;&emsp;&emsp;The Palompon Institute of Technology is composed of many colleges such as the College of Education, College of Technology and Engineering, College of Arts and Science, College of Maritime Education and College of Advance Education. PIT is located along Evangelista Street in Palompon,leyte Province Philippines. PIT is a Leyte educational institution that specializes in the field of Maritime Sciences. This college offers academic programs such as Bachelor of Science in Marine Transportation, Bachelor of Science in Marine Engineering, Bachelor of Science in Electrical Engineering, Bachelor of Science in Mechanical Engineering, Bachelor of Science in Industrial Engineering, Bachelor of Science in Industrial Technology, Bachelor of Science in Information Technology, Bachelor of Arts in Communication, Bachelor of Science in Shipping Management, Bachelor of Science in Hotel and Restaurant Management Major in Cruise Ship, Bachelor of Elementary Education, Bachelor of Secondary Education, and Bachelor of Science in Home Technology Education. Aside from these baccalaureate degrees,PIT also offers graduate academic programs that include Doctor of Philosophy Major in Educational Management, Master of Arts Major in Community Development, and Master of Technology Education. Furthermore, this educational institution also offers scholarships and grants to numerous intelligent students.
 </p>
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
#about{
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
	width: 70%;
	max-width: 1000px;
	flex-direction: column;
    align-items: center;
    justify-content: center;
	padding: 30px;
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
.con2 h3{
	width: 100%;
	color: #f39c12;
}
.con2 p{
	width: 100%;
	padding: 20px;
	text-align: justify;
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