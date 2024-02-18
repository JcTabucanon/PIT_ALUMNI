<!-- add modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">Add New Event</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <form class="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
		      <div class="modal-body">
		      	
			        
	  					<div class="form-group">
		    				<label for="event">Event Title</label>
		                    <input type="text" class="form-control" id="" name="event" placeholder="Event" required>
		                </div>
		  				<div class="form-group">
		    				<label for="schedule">Schedule</label>
		    				<input type="date" name="date" class="form-control" id=""  required>
		    				<input type="time" name="time" class="form-control" id=""  required>
		  				</div>
		  				<div class="form-group">
		    				<label for="location">Location</label>
		    				<textarea type="text" name="location" class="form-control" id="" placeholder="Location" required></textarea>
		  				</div>
		  				<div class="form-group">
		    				<label for="description">Description</label>
		    				<textarea type="text" name="description" class="form-control" id="" placeholder="Description" style="height: 100px;"></textarea>
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
      <h5 class="modal-title">Delete Event!</h5>
      </div>
      <div class="modal-footer">
      	<form class="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
      	<div class="form-group" style="display: none;">
			<label for="title">EVENT</label>
            <input type="text" class="form-control" name="event" id="event">
		</div>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" name="delete" class="btn btn-primary">Delete</button>
    	</form>
      </div>
    </div>
  </div>
</div>
<!-- view modal -->
<div class="modal fade" id="viewmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <form class="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
		      <div class="modal-body">
		      			<div class="form-group" style="display: none;">
		    				<label for="id">ID</label>
		                    <input type="text" class="form-control" id="id" name="id">
		                </div>
			        
	  					<div class="form-group">
		    				<label for="event">Event Title</label>
		                    <input type="text" name="event" class="form-control" id="title" disabled>
		                </div>
		  				<div class="form-group">
		    				<label for="schedule">Schedule</label>
		    				<input type="text" name="date" class="form-control" id="date" disabled>
		  				</div>
		  				<div class="form-group">
		    				<label for="location">Location</label>
		    				<textarea type="text" name="location" class="form-control" id="location" disabled></textarea>
		  				</div>
		  				<div class="form-group">
		    				<label for="description">Description</label>
		    				<textarea type="text" name="description" class="form-control" id="description" style="height: 120px;" disabled></textarea>
		  				</div>
		  				<div class="form-group">
		    				<label for="schedule">Date Created</label>
		    				<input type="text" name="date_created" class="form-control" id="date_created" disabled>
		  				</div>
					
		      </div>
		      <div class="modal-footer">
		      	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>  
		      </div>
		      </form>
		    </div>
		  </div>
</div>
<!-- edit modal -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <form class="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
		      <div class="modal-body">
		      			<div class="form-group" style="display: none;">
		    				<label for="id">ID</label>
		                    <input type="text" class="form-control" id="editid" name="id">
		                </div>
			        
	  					<div class="form-group">
		    				<label for="event">Event Title</label>
		                    <input type="text" name="event" class="form-control" id="edittitle" required>
		                </div>
		  				<div class="form-group">
		    				<label for="schedule">Schedule</label>
		    				<input type="text" name="date" class="form-control" id="editdate" required>
		  				</div>
		  				<div class="form-group">
		    				<label for="location">Location</label>
		    				<textarea type="text" name="location" class="form-control" id="editlocation" required></textarea>
		  				</div>
		  				<div class="form-group">
		    				<label for="description">Description</label>
		    				<textarea type="text" name="description" class="form-control" id="editdescription" style="height: 120px;"></textarea>
		  				</div>
					
		      </div>
		      <div class="modal-footer">
		      	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
		        <button type="submit" class="btn btn-primary" name="edit">Update</button>  
		      </div>
		      </form>
		    </div>
		  </div>
</div>