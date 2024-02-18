<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="head">
	<div class="title">
		<div class="logo">
		<img src="../images/pitlogo.png" style="width: 50px; height: 50px;">
		</div>
		<div class="logo">
			<h4>Palompon Institute of Technology - Tabango</h4>
			<h2>ALUMNI</h2>
		</div>
		
	</div>
	<div class="navmenu">
	<div class="navitem">
	<button id="show" class="show" onclick="navshow()">
		<i class="fa fa-reorder" style="font-size:24px;">
			
		</i>
	</button>
	<button id="close" class="hide" onclick="navhide()">
		<i class="fa fa-remove" style="font-size:24px;">
			
		</i>
	</button>		
	</div>
	<div class="navitem">
     <ul id="navitem">
        <li><a href="home.php" id="home">Home</a></li>
        <li><a href="events.php" id="events">Events</a></li>
        <li><a href="job_offers.php" id="job">Job Offers</a></li>
        <li style="display: none;"><a href="gallery.php" id="gallery">Gallery</a></li>
        <li><a href="about.php" id="about">About</a></li>
     </ul>
	</div>
	</div>	
</div>
<script type="text/javascript">
	function navshow(){
	  document.getElementById('navitem').style.display = "flex";
	   document.getElementById('close').style.display = "flex";
	    document.getElementById('show').style.display = "none";
	}

	function navhide(){
	  document.getElementById('navitem').style.display = "none";
	   document.getElementById('close').style.display = "none";
	    document.getElementById('show').style.display = "flex";
	}
</script>
<style type="text/css">
.head{
	width: 100%;
	position:fixed;
	display: flex;
	flex-direction: column;
	background: #025043;
}
.title{
	width: 100%;
	display: flex;
	align-items: center;
	justify-content: center;
	padding: 20px 0 10px 0;
}
.logo{
	display: flex;
	flex-direction: column;
	color: white;
}
.logo h4{
	width: 100%;
	padding: 0;
	margin: 0;
	text-align: center;
}
.logo h2{
	width: 100%;
	padding: 0;
	margin: 0;
	font-weight: bold;
	text-align: center;
	letter-spacing: 30px;
	font-size: 25px;
}
.logo img{
	width: 75px;
	height: 75px;
	margin-right: 10px;
}
.navmenu{
	width: 100%;
	padding: 20px 0 20px 0;
	display: flex;
	flex-direction: row;
}
.navitem{
	display: flex;
	flex-direction: row;
	color: white;
	margin-left: 20px;
}
.show, .hide{
	width: auto;
	padding: 5px;
	border: .5px solid lightgray;
	border-radius: 4px;
	background: none;
	cursor: pointer;
	display: none;
	color: white;
}
.navitem button:hover{
	background: white;
	color: darkgreen;
	border: 1px solid green;
}
.navitem ul{
	list-style: none;
	display: flex;
	margin: 0;
	padding: 0;
}
.navitem ul li{
	list-style: none;
}
.navitem li a{
	width: 100%;
	height: auto;
	font-size: 18px;
	padding: 0 35px 6px 35px;
	text-decoration: none;
	color: white;
}
.navitem li a:hover{
	text-decoration: none;
	color: #ffda79;
}
@media screen and (max-width: 700px) {
	.navmenu{
	flex-direction: column;
	}
    .show{
    display: flex;
    }
    .navitem ul{
    width: 300px;
    display: none;
    position: fixed;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    border-radius: 5px;
    border: .35px solid #84817a;
    background:#025043;
    }
    .navitem ul li{	
    display: flex;
    }
    .navitem li a{
    width:300px;
    padding: 10px 2% 10px 2%;
    display: flex;
    align-items: center;
    border-radius: 5px;
    justify-content: center;
    }
    .navitem li a:hover{
	text-decoration: none;
	color: #2c2c54;
	font-weight: bold;
	background: #ffda79;	
    }
    .logo h4{
    	font-size: 15px;
    }
    .logo h2{
    	font-size: 22px;
    }

}
</style>