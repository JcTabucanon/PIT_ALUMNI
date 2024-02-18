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
      include "surveymodal.php"; 
 ?>
<div class="contentt">
<div class="welcome">
<ul class="breadcrumb">
  <li><a href="#">Dashboard</a></li>
  <li><a href="#" style="color:white;">Survey Updates</a></li>
</ul>
		<hr>
</div>
<div class="eventtable">
<div class="card-header" style="text-align: left;">
							<span><a class="btn btn-primary" data-toggle="modal" data-target="#getemailmodal" style="color: white;">
						Get Alumni Email Accounts
					</a></span>
          <span><a class="btn btn-primary" data-toggle="modal" data-target="#getlinkmodal" style="color: white;">
						Get Survey Form Link
					</a></span>
</div>
<div class="con">
				<table class="table">
				<colgroup>
					<col width="50%">
					<col width="50%">
				</colgroup>
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">Updates</th>
				      <th scope="col">Date Submitted</th>
				    </tr>
				  </thead>
				  <tbody>
<?php 
$query = "SELECT * FROM submit_ats ORDER BY ID DESC LIMIT 100";
$result = mysqli_query($con, $query);
	while($row =mysqli_fetch_assoc($result)){ ?>

			  	    <tr>
				      <td class="title"><b><?php echo $row['EMAIL'];?></b> successfully submitted GTS response.</td>
				      <td class="program"><?php echo $row['DATE_SUBMITED']; ?></td>
				    </tr>
<?php
		}

?>	  </tbody>
				</table>
			</div>
</div>
</div>
	
</div>
</body>
<script>
(function() {
  "use strict";

  function copyToClipboard(elem) {
    var target = elem;

    // select the content
    var currentFocus = document.activeElement;

    target.focus();
    target.setSelectionRange(0, target.value.length);

    // copy the selection
    var succeed;

    try {
      succeed = document.execCommand("copy");
    } catch (e) {
      console.warn(e);

      succeed = false;
    }

    // Restore original focus
    if (currentFocus && typeof currentFocus.focus === "function") {
      currentFocus.focus();
    }

    if (succeed) {
      $(".copied").animate({ top: -25, opacity: 0 }, 700, function() {
        $(this).css({ top: 0, opacity: 1 });
      });
    }

    return succeed;
  }

  $("#copyButton, #copyTarget").on("click", function() {
    copyToClipboard(document.getElementById("copyTarget"));
  });
})();
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
#manage{
  transition: 0.5s;
  background: lightgray;
  color: black;
}
</style>