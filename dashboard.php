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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>
<?php include "header.php" ?>
<div class="containerr">
<?php include "sidebar.php" ?>
<div class="contentt">
	<div class="welcome">
	<ul class="breadcrumb">
  <li><a href="#" style="color:#e1b12c;">Dashboard</a></li>
</ul>
		<hr>
    </div>
	<fieldset class="d1">
		<legend>Alumni Employability Status based on the Latest Survey</legend>
		<a href="employability.php?employability=Employed">
		<div class="items">
			<div class="data">
				<p>Employed</p>
				<h5><?php
				$emp = "Employed";
				$query = "SELECT * FROM survey WHERE EMPLOYABILITY ='$emp'";
							 $result = mysqli_query($con,$query);

							if ($total = mysqli_num_rows($result)) {
								echo $total;
							}else{
								echo "0";
							} ?></h5>
			</div>
			<div class="icon">
				<i class="fa fa-users" style="font-size:48px;color:#27ae60;"></i>
			</div>
			
		</div>
		</a>
		<a href="employability.php?employability=Unemployed">
		<div class="items">
			<div class="data">
				<p>Unemployed</p>
				<h5><?php
				$emp = "Unemployed";
				$query = "SELECT * FROM survey WHERE EMPLOYABILITY ='$emp'";
							 $result = mysqli_query($con,$query);

							if ($total = mysqli_num_rows($result)) {
								echo $total;
							}else{
								echo "0";
							} ?></h5>
			</div>
			<div class="icon">
				<i class="fa fa-users" style="font-size:48px;color:#c0392b;"></i>
			</div>
			
		</div>
		</a>
		<a href="employability.php?employability=Self-Employed">
		<div class="items">
			<div class="data">
				<p>Self-Employed</p>
				<h5><?php
				$emp = "Self-Employed";
				$query = "SELECT * FROM survey WHERE EMPLOYABILITY ='$emp'";
							 $result = mysqli_query($con,$query);

							if ($total = mysqli_num_rows($result)) {
								echo $total;
							}else{
								echo "0";
							} ?></h5>
			</div>
			<div class="icon">
				<i class="fa fa-users" style="font-size:48px;color:#2980b9;"></i>
			</div>
			
		</div>
		</a>
		<div
        id="myChart" style="width:100%; max-width:350px; height:180px; position: static;">
        </div>
	</fieldset>
	<div class="d1">
		<a href="alumni_list.php">
		<div class="items">
			<div class="data">
				<p>Registered Alumni</p>
				<h5><?php
				$query = "SELECT * FROM alumni";
							 $result = mysqli_query($con,$query);

							if ($total = mysqli_num_rows($result)) {
								echo $total;
							}else{
								echo "0";
							} ?></h5>
			</div>
			<div class="icon">
				<i class="fa fa-users" style="font-size:48px;color:#16a085;"></i>
			</div>
			
		</div>
		</a>
		<a href="events.php" style="display: none;">
		<div class="items">
			<div class="data">
				<p>Upcomming Events</p>
				<h5><?php
				$query = "SELECT * FROM events";
							 $result = mysqli_query($con,$query);

							if ($total = mysqli_num_rows($result)) {
								echo $total;
							}else{
								echo "0";
							} ?></h5>
			</div>
			<div class="icon">
				<i class="fa fa-calendar" style="font-size:48px;color:#27ae60;"></i>
			</div>
			
		</div>
		</a>
		<a href="jobs.php" style="display: none;">
		<div class="items">
			<div class="data">
				<p>Job Offers</p>
				<h5><?php
				$query = "SELECT * FROM jobs_offer";
							 $result = mysqli_query($con,$query);

							if ($total = mysqli_num_rows($result)) {
								echo $total;
							}else{
								echo "0";
							} ?></h5>
			</div>
			<div class="icon">
				<i class="fa fa-handshake" style="font-size:48px;color:#2980b9;"></i>
			</div>	
		</div>
		</a>
		<a href="programs.php">
		<div class="items">
			<div class="data">
				<p>Programs</p>
				<h5><?php
				$query = "SELECT * FROM programs";
							 $result = mysqli_query($con,$query);

							if ($total = mysqli_num_rows($result)) {
								echo $total;
							}else{
								echo "0";
							} ?></h5>
			</div>
			<div class="icon">
				<i class="fa fa-book" style="font-size:48px;color:#8e44ad;"></i>
			</div>
			
		</div>
		</a>
	</div>
	<fieldset class="d1">
		<canvas id="lineChart" style="width:80%; height:330px; padding: 10px;"></canvas>
	</fieldset>
	
</div>
	
</div>
</body>
<script>
const xValues = [<?php echo date("Y", strtotime('-10 year'));?>,<?php echo date("Y", strtotime('-9 year'));?>,<?php echo date("Y", strtotime('-8 year'));?>,<?php echo date("Y", strtotime('-7 year'));?>,<?php echo date("Y", strtotime('-6 year'));?>,<?php echo date("Y", strtotime('-5 year'));?>,<?php echo date("Y", strtotime('-4 year'));?>,<?php echo date("Y", strtotime('-3 year'));?>,<?php echo date("Y", strtotime('-2 year'));?>,<?php echo date("Y", strtotime('-1 year'));?>];

new Chart("lineChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      label: "Employed",
      data: [<?php
				$emp = "Employed";
				$batch = date("Y", strtotime('-10 year'));
				$query = "SELECT * FROM survey WHERE EMPLOYABILITY ='$emp' AND BATCH ='$batch'";
							 $result = mysqli_query($con,$query);

							if ($total = mysqli_num_rows($result)) {
								echo $total;
							}else{
								echo "0";
							} ?>,
			<?php
			$emp = "Employed";
			$batch = date("Y", strtotime('-9 year'));
			$query = "SELECT * FROM survey WHERE EMPLOYABILITY ='$emp' AND BATCH ='$batch'";
							$result = mysqli_query($con,$query);

						if ($total = mysqli_num_rows($result)) {
							echo $total;
						}else{
							echo "0";
						} ?>,
			<?php
				$emp = "Employed";
				$batch = date("Y", strtotime('-8 year'));
				$query = "SELECT * FROM survey WHERE EMPLOYABILITY ='$emp' AND BATCH ='$batch'";
							 $result = mysqli_query($con,$query);

							if ($total = mysqli_num_rows($result)) {
								echo $total;
							}else{
								echo "0";
							} ?>,
			<?php
				$emp = "Employed";
				$batch = date("Y", strtotime('-7 year'));
				$query = "SELECT * FROM survey WHERE EMPLOYABILITY ='$emp' AND BATCH ='$batch'";
							 $result = mysqli_query($con,$query);

							if ($total = mysqli_num_rows($result)) {
								echo $total;
							}else{
								echo "0";
							} ?>,
			<?php
				$emp = "Employed";
				$batch = date("Y", strtotime('-6 year'));
				$query = "SELECT * FROM survey WHERE EMPLOYABILITY ='$emp' AND BATCH ='$batch'";
							 $result = mysqli_query($con,$query);

							if ($total = mysqli_num_rows($result)) {
								echo $total;
							}else{
								echo "0";
							} ?>,
			<?php
				$emp = "Employed";
				$batch = date("Y", strtotime('-5 year'));
				$query = "SELECT * FROM survey WHERE EMPLOYABILITY ='$emp' AND BATCH ='$batch'";
							 $result = mysqli_query($con,$query);

							if ($total = mysqli_num_rows($result)) {
								echo $total;
							}else{
								echo "0";
							} ?>,
			<?php
				$emp = "Employed";
				$batch = date("Y", strtotime('-4 year'));
				$query = "SELECT * FROM survey WHERE EMPLOYABILITY ='$emp' AND BATCH ='$batch'";
							 $result = mysqli_query($con,$query);

							if ($total = mysqli_num_rows($result)) {
								echo $total;
							}else{
								echo "0";
							} ?>,
			<?php
				$emp = "Employed";
				$batch = date("Y", strtotime('-3 year'));
				$query = "SELECT * FROM survey WHERE EMPLOYABILITY ='$emp' AND BATCH ='$batch'";
							 $result = mysqli_query($con,$query);

							if ($total = mysqli_num_rows($result)) {
								echo $total;
							}else{
								echo "0";
							} ?>,
			<?php
				$emp = "Employed";
				$batch = date("Y", strtotime('-2 year'));
				$query = "SELECT * FROM survey WHERE EMPLOYABILITY ='$emp' AND BATCH ='$batch'";
							 $result = mysqli_query($con,$query);

							if ($total = mysqli_num_rows($result)) {
								echo $total;
							}else{
								echo "0";
							} ?>,
			<?php
				$emp = "Employed";
				$batch = date("Y", strtotime('-1 year'));
				$query = "SELECT * FROM survey WHERE EMPLOYABILITY ='$emp' AND BATCH ='$batch'";
							 $result = mysqli_query($con,$query);

							if ($total = mysqli_num_rows($result)) {
								echo $total;
							}else{
								echo "0";
							} ?>],
      borderColor: "green",
      fill: false
    }, {
    label: "Unemployed", 
      data: [<?php
				$emp = "Unemployed";
				$batch = date("Y", strtotime('-10 year'));
				$query = "SELECT * FROM survey WHERE EMPLOYABILITY ='$emp' AND BATCH ='$batch'";
							 $result = mysqli_query($con,$query);

							if ($total = mysqli_num_rows($result)) {
								echo $total;
							}else{
								echo "0";
							} ?>,
			<?php
			$emp = "Unemployed";
			$batch = date("Y", strtotime('-9 year'));
			$query = "SELECT * FROM survey WHERE EMPLOYABILITY ='$emp' AND BATCH ='$batch'";
							$result = mysqli_query($con,$query);

						if ($total = mysqli_num_rows($result)) {
							echo $total;
						}else{
							echo "0";
						} ?>,
			<?php
				$emp = "Unemployed";
				$batch = date("Y", strtotime('-8 year'));
				$query = "SELECT * FROM survey WHERE EMPLOYABILITY ='$emp' AND BATCH ='$batch'";
							 $result = mysqli_query($con,$query);

							if ($total = mysqli_num_rows($result)) {
								echo $total;
							}else{
								echo "0";
							} ?>,
			<?php
				$emp = "Unemployed";
				$batch = date("Y", strtotime('-7 year'));
				$query = "SELECT * FROM survey WHERE EMPLOYABILITY ='$emp' AND BATCH ='$batch'";
							 $result = mysqli_query($con,$query);

							if ($total = mysqli_num_rows($result)) {
								echo $total;
							}else{
								echo "0";
							} ?>,
			<?php
				$emp = "Unemployed";
				$batch = date("Y", strtotime('-6 year'));
				$query = "SELECT * FROM survey WHERE EMPLOYABILITY ='$emp' AND BATCH ='$batch'";
							 $result = mysqli_query($con,$query);

							if ($total = mysqli_num_rows($result)) {
								echo $total;
							}else{
								echo "0";
							} ?>,
			<?php
				$emp = "Unemployed";
				$batch = date("Y", strtotime('-5 year'));
				$query = "SELECT * FROM survey WHERE EMPLOYABILITY ='$emp' AND BATCH ='$batch'";
							 $result = mysqli_query($con,$query);

							if ($total = mysqli_num_rows($result)) {
								echo $total;
							}else{
								echo "0";
							} ?>,
			<?php
				$emp = "Unemployed";
				$batch = date("Y", strtotime('-4 year'));
				$query = "SELECT * FROM survey WHERE EMPLOYABILITY ='$emp' AND BATCH ='$batch'";
							 $result = mysqli_query($con,$query);

							if ($total = mysqli_num_rows($result)) {
								echo $total;
							}else{
								echo "0";
							} ?>,
			<?php
				$emp = "Unemployed";
				$batch = date("Y", strtotime('-3 year'));
				$query = "SELECT * FROM survey WHERE EMPLOYABILITY ='$emp' AND BATCH ='$batch'";
							 $result = mysqli_query($con,$query);

							if ($total = mysqli_num_rows($result)) {
								echo $total;
							}else{
								echo "0";
							} ?>,
			<?php
				$emp = "Unemployed";
				$batch = date("Y", strtotime('-2 year'));
				$query = "SELECT * FROM survey WHERE EMPLOYABILITY ='$emp' AND BATCH ='$batch'";
							 $result = mysqli_query($con,$query);

							if ($total = mysqli_num_rows($result)) {
								echo $total;
							}else{
								echo "0";
							} ?>,
			<?php
				$emp = "Unemployed";
				$batch = date("Y", strtotime('-1 year'));
				$query = "SELECT * FROM survey WHERE EMPLOYABILITY ='$emp' AND BATCH ='$batch'";
							 $result = mysqli_query($con,$query);

							if ($total = mysqli_num_rows($result)) {
								echo $total;
							}else{
								echo "0";
							} ?>],
      borderColor: "red",
      fill: false
    }, { 
    	label: "Self-Employed",
      data: [<?php
				$emp = "Self-Employed";
				$batch = date("Y", strtotime('-10 year'));
				$query = "SELECT * FROM survey WHERE EMPLOYABILITY ='$emp' AND BATCH ='$batch'";
							 $result = mysqli_query($con,$query);

							if ($total = mysqli_num_rows($result)) {
								echo $total;
							}else{
								echo "0";
							} ?>,
			<?php
			$emp = "Self-Employed";
			$batch = date("Y", strtotime('-9 year'));
			$query = "SELECT * FROM survey WHERE EMPLOYABILITY ='$emp' AND BATCH ='$batch'";
							$result = mysqli_query($con,$query);

						if ($total = mysqli_num_rows($result)) {
							echo $total;
						}else{
							echo "0";
						} ?>,
			<?php
				$emp = "Self-Employed";
				$batch = date("Y", strtotime('-8 year'));
				$query = "SELECT * FROM survey WHERE EMPLOYABILITY ='$emp' AND BATCH ='$batch'";
							 $result = mysqli_query($con,$query);

							if ($total = mysqli_num_rows($result)) {
								echo $total;
							}else{
								echo "0";
							} ?>,
			<?php
				$emp = "Self-Employed";
				$batch = date("Y", strtotime('-7 year'));
				$query = "SELECT * FROM survey WHERE EMPLOYABILITY ='$emp' AND BATCH ='$batch'";
							 $result = mysqli_query($con,$query);

							if ($total = mysqli_num_rows($result)) {
								echo $total;
							}else{
								echo "0";
							} ?>,
			<?php
				$emp = "Self-Employed";
				$batch = date("Y", strtotime('-6 year'));
				$query = "SELECT * FROM survey WHERE EMPLOYABILITY ='$emp' AND BATCH ='$batch'";
							 $result = mysqli_query($con,$query);

							if ($total = mysqli_num_rows($result)) {
								echo $total;
							}else{
								echo "0";
							} ?>,
			<?php
				$emp = "Self-Employed";
				$batch = date("Y", strtotime('-5 year'));
				$query = "SELECT * FROM survey WHERE EMPLOYABILITY ='$emp' AND BATCH ='$batch'";
							 $result = mysqli_query($con,$query);

							if ($total = mysqli_num_rows($result)) {
								echo $total;
							}else{
								echo "0";
							} ?>,
			<?php
				$emp = "Self-Employed";
				$batch = date("Y", strtotime('-4 year'));
				$query = "SELECT * FROM survey WHERE EMPLOYABILITY ='$emp' AND BATCH ='$batch'";
							 $result = mysqli_query($con,$query);

							if ($total = mysqli_num_rows($result)) {
								echo $total;
							}else{
								echo "0";
							} ?>,
			<?php
				$emp = "Self-Employed";
				$batch = date("Y", strtotime('-3 year'));
				$query = "SELECT * FROM survey WHERE EMPLOYABILITY ='$emp' AND BATCH ='$batch'";
							 $result = mysqli_query($con,$query);

							if ($total = mysqli_num_rows($result)) {
								echo $total;
							}else{
								echo "0";
							} ?>,
			<?php
				$emp = "Self-Employed";
				$batch = date("Y", strtotime('-2 year'));
				$query = "SELECT * FROM survey WHERE EMPLOYABILITY ='$emp' AND BATCH ='$batch'";
							 $result = mysqli_query($con,$query);

							if ($total = mysqli_num_rows($result)) {
								echo $total;
							}else{
								echo "0";
							} ?>,
			<?php
				$emp = "Self-Employed";
				$batch = date("Y", strtotime('-1 year'));
				$query = "SELECT * FROM survey WHERE EMPLOYABILITY ='$emp' AND BATCH ='$batch'";
							 $result = mysqli_query($con,$query);

							if ($total = mysqli_num_rows($result)) {
								echo $total;
							}else{
								echo "0";
							} ?>],
      borderColor: "blue",
      fill: false
    }]
  },
  options: {
    legend: {display: true},
	grid:{color:"black"},
    maintainAspectRatio: false
  }
});
</script>
<script>
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
Chart.defaults.global.defaultFontColor = "white";

function drawChart() {
const data = google.visualization.arrayToDataTable([
  ['employability', 'Mhl'],
  ['Employed',<?php
				$emp = "Employed";
				$query = "SELECT * FROM survey WHERE EMPLOYABILITY ='$emp'";
							 $result = mysqli_query($con,$query);

							if ($total = mysqli_num_rows($result)) {
								echo $total;
							}else{
								echo "0";
							} ?>],
  ['Unemployed',<?php
				$emp = "Unemployed";
				$query = "SELECT * FROM survey WHERE EMPLOYABILITY ='$emp'";
							 $result = mysqli_query($con,$query);

							if ($total = mysqli_num_rows($result)) {
								echo $total;
							}else{
								echo "0";
							} ?>],
  ['Self-Employed',<?php
				$emp = "Self-Employed";
				$query = "SELECT * FROM survey WHERE EMPLOYABILITY ='$emp'";
							 $result = mysqli_query($con,$query);

							if ($total = mysqli_num_rows($result)) {
								echo $total;
							}else{
								echo "0";
							} ?>]
]);

const options = {
  'backgroundColor': 'transparent',
  titleTextStyle: {
                color: "white"              
            },
    legendTextStyle: { color:"white"},
    maintainAspectRatio: false,
  is3D:true
};

const chart = new google.visualization.PieChart(document.getElementById('myChart'));
  chart.draw(data, options);
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
.welcome{
	color: white;
	width: 100%;
	text-align: left;
}
.d1{
	width: 100%;
	color: #e1b12c;
	padding: 10px;
	background: transparent;
	border:none;
	display:flex;
	margin-bottom: 15px;
	flex-wrap: wrap;
	align-items: stretch;
	justify-content: left;
	border-radius: 5px;

}

.d1 a{
	width: 20%;
	height: 100px;
	text-decoration: none;
	margin: 10px;
}
.items{
	width: 100%;
	height: 100px;
	border: .5px solid #7f8c8d;
	border-radius: 7px;
	display: flex;
	flex-direction: row;
	background:#2f3640;
}
.items:hover{
	border: 2px solid #777;
}
hr{
	width: 100%;
	background: #7f8c8d;

}
.data{
	width: 70%;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
}
.data p{
	width: 100%;
	font-size: 15px;
	padding-left: 20px;
	text-align: left;
	color: #0097e6;
}
.data h5{
	width: 100%;
	font-size: 25px;
	text-align: left;
	font-family: century gothic;
	padding-left: 20px;
	color: white;
	font-weight: bold;
}
.icon{
	width: 30%;
	display: flex;
	align-items: center;
	justify-content: center;
	
}
legend{
	font-size: 12px;
	padding: 0;
	margin: 0;
	width: auto;
	text-align: left;
	font-weight: bolder;

}
@media screen and (max-width: 1150px){
    .d1 a{
    	width: 45%;
    }
}
@media screen and (max-width: 800px){
    .d1 a{
    	width: 90%;
    }
}
#dashboard{
  transition: 0.5s;
  background: lightgray;
  color: black;
}
</style>