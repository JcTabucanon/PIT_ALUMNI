<!-- add modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">Add New Alumni</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <form class="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
		      <div class="modal-body">
		      	
  					<div class="form-group">
	    				<label for="event">ID Number</label>
	                    <input type="text" class="form-control" id="" name="id_number" placeholder="ID Number" required>
	                </div>
	  				<div class="form-group">
	    				<label for="schedule">Lastname</label>
	    				<input type="text" name="lastname" class="form-control" id="" placeholder="Lastname" required>
	  				</div>
	  				<div class="form-group">
	    				<label for="location">Firstname</label>
	    				<input type="text" name="firstname" class="form-control" id="" placeholder="Firstname" required>
	  				</div>
	  				<div class="form-group">
	    				<label for="location">Middle Name</label>
	    				<input type="text" name="middlename" class="form-control" id="" placeholder="Middle Name" required>
	  				</div>
	  				<div class="form-group">
	    				<label for="location">Program</label>
	    				<select class="form-control" name="program" required>
	    				<option style="display:none;">Program</option>
	    				<?php
	    				include "connection.php";
	    				$query = "SELECT * FROM programs";
	    				$result = mysqli_query($con, $query);
						
						if ($result) {
							while($row =mysqli_fetch_assoc($result)){ ?>
							<option><?php echo $row['ABBREVIATION'];?></option>
						<?php
						}
						}
	    				 ?>	
	    				</select>
	  				</div>
					  <div class="form-group">
	    				<label for="major">Major</label>
					<select class=" form-control" name="major" required>
							<option style="display:none;">Select Major</option>
							<option>Science</option>
							<option>Mathematics</option>
							<option>Mechanical</option>
							<option>Electrical</option>
							<option>Automotive</option>
							<option>Mechanical</option>
							<option>Food & Service Management</option>
							<option>Food Technology</option>
							<option>N/A</option>
					</select>
					</div>
	  				<div class="form-group">
	    				<label for="location">Year Graduated</label>
	    				<select class="form-control" name="batch" required>
	    				<option style="display:none;">Select Batch</option>
	    				<?php
	    				$years = range(1974, strftime("%Y", time())); 
						foreach(array_reverse($years) as $year){ ?>
							<option><?php echo $year;?></option>
						<?php
						}
	    				 ?>	
	    				</select>
	  				</div>
	  				<div class="form-group">
	    				<label for="location">GENDER</label>
	    				<select class="form-control" name="gender" required>
	    				<option style="display:none;">Gender</option>
						<option>Male</option>
						<option>Female</option>
						<option>Others</option>
	    				</select>
	  				</div>
	  				<div class="form-group">
	    				<label for="email">Email</label>
						<input type="email" name="email" class="form-control" id="" placeholder="Email" required>
	  				</div>
	  				<div class="form-group">
	    				<label for="email">Birthday</label>
						<input type="date" name="birthday" class="form-control" id="" required>
	  				</div>
	  				<div class="form-group">
	    				<label for="email">Contact</label>
						<input type="number" name="contact" class="form-control" id="" placeholder="Contact" required>
	  				</div>
	  				<div class="form-group">
	    				<label for="description">Address</label>
	    				<textarea type="text" name="address" class="form-control" id="" placeholder="Address"></textarea>
	  				</div>
	  				<div class="form-group">
	    				<label for="location">Profile Picture</label>
	    				<input type="file" name="profile" class="form-control" accept="image/png, image/gif, image/jpeg, image/jpg">
	  				</div>
		      </div>
		      <div class="modal-footer">
		      	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary" name="save">Save</button>
		        
		      </div>
		      </form>
		    </div>
		  </div>
</div>
<!-- delete modal -->
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <h5 class="modal-title">Delete From Records!</h5>
      </div>
      <div class="modal-footer">
      	<form class="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
      	<div class="form-group" style="display: none;">
			<label for="title">ALUMNI</label>
            <input type="text" class="form-control" name="event" id="event">
		</div>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" name="delete" class="btn btn-primary">Delete</button>
    	</form>
      </div>
    </div>
  </div>
</div>
