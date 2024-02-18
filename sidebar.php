
<div class="menus" id="menu">
			<ul>
		        <li>
		          <a href="dashboard.php" id="dashboard">
		          	<i class="fa fa-home" style="font-size:25px; margin: 0 20px 0 20px;" title="Dashboard">
				   </i>
		          	
					<span>Dashboard</span>
		          </a>
		        </li>
				<li>
		          <a href="employability.php?employability=Employed" id="employability">
		          	<i class="fa fa-users" style="font-size:25px; margin: 0 20px 0 20px;" title="Employability Status"></i>
					<span>Employability Status</span>
		          </a>
		        </li>
		        <li>
		          <a href="alumni_list.php" id="alumni">
		          	<i class="fa fa-graduation-cap" style="font-size:25px; margin: 0 20px 0 20px;" title="Registered Alumni"></i>
					<span>Registered Alumni</span>
		          </a>
		        </li>
		        <li>
		          <a href="programs.php" id="programs">
		          	<i class="fa fa-book" style="font-size:25px; margin: 0 20px 0 20px;" title="Programs"></i>
					<span>&nbsp;Programs</span>
		          </a>
		        </li>
		        <li style="display:none;">
		          <a href="gallery.php" id="gallery">

		          	<i class="fa fa-film" style="font-size:25px; margin: 0 20px 0 20px;" title="Gallery"></i>
					<span>Gallery</span>
		          </a>
		        </li>
		        <li style="display:none;">
		          <a href="events.php" id="events">
		          	<i class="fa fa-calendar" style="font-size:25px; margin: 0 20px 0 20px;" title="Events"></i>
					<span>Events</span>
		          </a>
		        </li>
		        <li style="display:none;">
		          <a href="jobs.php" id="jobs">
		          	<i class="fa fa-handshake" style="font-size:25px; margin: 0 20px 0 20px;" title="Job Offers"></i>
					<span>Job Offers</span>
		          </a>
		        </li>
		        <li>
		          <a href="manage.php" id="manage">
		          	<i class="fa fa-cog" style="font-size:25px; margin: 0 20px 0 20px;" title="Survey Updates"></i>
					<span>Survey Updates</span>
		          </a>
		        </li>        

		      </ul>
		</div>
<style type="text/css">
.menus{
	width: 290px;
	height: 100%;
	position: fixed;
	padding-top: 20px;
	background:#353b48;

}

li{

	width: 100%;
}
.menus a{
	text-decoration: none;
	width:290px;
	padding: 7px 0 7px 0;
	color: white;
	font-size: 20px; 
	font-weight: bold;
	font-family:century gothic;
	align-items: center;
	display: flex;
}
.menus a:hover{
	background-color: lightgray;
	color: black;
	opacity: .5;
	transition: 0.8s ease;
}
.pic{
	width: 38px;
	height: 38px;
	margin-left: 20px;
}
@media screen and (max-width: 1600px) {
  
            .menus{
                width:250px;
            }
            .menus a, .sub li a{
            	width: 250px;
            	font-size: 15px;
            }
            .content{
            	margin-left: 255px;
            	padding: 15px;
            }
        }
@media screen and (max-width: 1000px) {
.menus li span{
	display: none;
  }
  .menus{
    width:70px;
  }
 .menus a, .sub li a{
	width: 70px;
	font-size: 15px;
}
.content{
	  margin-left: 55px;
	  padding: 15px;
  }
}
</style>
	