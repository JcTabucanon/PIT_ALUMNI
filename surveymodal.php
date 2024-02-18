<!-- add modal -->
<div class="modal fade" id="getemailmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
                <div class="form-group">
                    <button type="button" class="btn btn-primary" onclick="myFunction()">Copy to Clipboard</button> 
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="emails" style="height: auto; min-height:300px;"><?php
                    $query = "SELECT EMAIL FROM alumni";
                    $result = mysqli_query($con,$query);
                    while($row =mysqli_fetch_assoc($result)){
                        echo $row['EMAIL']."\n";
                    }
                     ?></textarea>
                </div>	
		      </div>
		      <div class="modal-footer">
		      	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
		      </div>
		    </div>
		  </div>
</div>
<!-- delete modal -->
<div class="modal fade" id="getlinkmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
      <button type="button" class="btn btn-primary" onclick="myLink()">Copy to Clipboard</button> 
      </div>
      <div class="form-group">
      <input class="form-control" id="link" value="https://pittabangoalumni.com/survey/survey.php"/></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<script>
function myFunction() {
  // Get the text field
  var copyText = document.getElementById("emails");

  // Select the text field
  copyText.select();
  copyText.setSelectionRange(0, 99999); // For mobile devices

  // Copy the text inside the text field
  navigator.clipboard.writeText(copyText.value);
  
  // Alert the copied text
  alert("Copied Email Accounts: " + copyText.value);
}
function myLink() {
  // Get the text field
  var copyText = document.getElementById("link");

  // Select the text field
  copyText.select();
  copyText.setSelectionRange(0, 99999); // For mobile devices

  // Copy the text inside the text field
  navigator.clipboard.writeText(copyText.value);
  
  // Alert the copied text
  alert("Copied Survey Form Link: " + copyText.value);
}
</script>