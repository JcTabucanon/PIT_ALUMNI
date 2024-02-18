<?php
      session_start();
      ob_start();
      date_default_timezone_set("Asia/Hong_Kong");
      require "../connection.php";

  if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $lastname = $_POST['lastname'];
  $firstname = $_POST['firstname'];
  $middle = $_POST['middle'];
  $status = $_POST['status'];
  $gender = $_POST['gender'];
  $birthday = $_POST['bday'];
  $contact = $_POST['contact'];
  $permanent_add = $_POST['permanent_add'];
  $region= $_POST['region'];
  $province= $_POST['province'];
  $location= $_POST['location'];
  $course = $_POST['program'];
  $major = $_POST['major'];
  $batch = $_POST['batch'];
  $award = $_POST['award'];
  $exam = $_POST['exam'];
  $date_taken = $_POST['date_taken'];
  $rating = $_POST['rating'];
  $rtc = $_POST['rtc'];
  $ortc = "* ".$_POST['ortc'];
  $advance = $_POST['advance'];
  $credit_earned = $_POST['credit_earned'];
  $training_institution = $_POST['training_institution'];
  $mpas = $_POST['mpas'];
  $ompas = "* ".$_POST['ompas'];
  $employability = $_POST['employability'];
  $reason_unemployed = $_POST['reason_unemployed'];
  $oreason_unemployed = "* ".$_POST['oreason_unemployed'];
  $emp_type = $_POST['emp_type'];
  $job = $_POST['title'];
  $relevant = $_POST['relevant'];
  $position = $_POST['position'];
  $company = $_POST['company'];
  $company_address = $_POST['company_address'];
  $company_contact = $_POST['company_contact'];
  $mlb = $_POST['mlb'];
  $skills_learned = $_POST['skills_learned'];
  $other_skills = "* ".$_POST['other_skills'];
  $business = $_POST['business'];
  $business_address = $_POST['business_address'];
  $suggestions = $_POST['suggestions'];
  $profit = $_POST['profit'];
  $submit = date("F d, Y");

$sql = "SELECT * FROM alumni WHERE EMAIL = '$email' AND COURSE ='$course' AND BATCH = '$batch'";

$result = mysqli_query($con,$sql);

if(mysqli_num_rows($result) > 0) {
  $d1="";  
  $d2=""; 
  $d3=""; 
  $d4=""; 
foreach($rtc as $chk1)  
 {  
    $d1 .= " ".$chk1.";\r\n";  
 } 
foreach($mpas as $chk2)  
 {  
    $d2 .= " ".$chk2.";\r\n";  
 } 
foreach($reason_unemployed as $chk3)  
 {  
    $d3 .= " ".$chk3.";\r\n";  
 } 
foreach($skills_learned as $chk4)  
 {  
    $d4 .= " ".$chk4.";\r\n";  
 } 

 $query2 = "INSERT INTO history (EMAIL, LASTNAME, FIRSTNAME, MIDDLENAME, COURSE, MAJOR, BATCH, CIVIL, GENDER, BIRTHDAY, CONTACT, PERMANENT_ADD, REGION, PROVINCE, LOCATION_RES, AWARD, EXAM, DATE_TAKEN, RATING, RTC, ORTC, ADVANCE, CREDIT_EARNED, TRAINING_INSTITUTION, MPAS, OMPAS, EMPLOYABILITY, UNEMPLOYED_REASONS, OTHER_UNEMP_REASON, EMP_TYPE, JOB_TITLE, RELEVANT, POSITION, COMPANY_NAME, COMPANY_ADDRESS, COM_CONTACT, MLB, SKILLS_LEARNED, OTHER_SKILLS, BUSINESS_NAME, BUSINESS_ADDRESS, PROFIT, SUGGESTIONS, DATE_SUBMIT) VALUES ('$email','$lastname', '$firstname', '$middle', '$course', '$major', '$batch', '$status', '$gender', '$birthday','$contact', '$permanent_add', '$region', '$province', '$location', '$award', '$exam', '$date_taken', '$rating', '$d1', '$ortc', '$advance', '$credit_earned', '$training_institution', '$d2', '$ompas', '$employability', '$d3', '$oreason_unemployed', '$emp_type', '$job', '$relevant', '$position', '$company', '$company_address', '$company_contact', '$mlb', '$d4', '$other_skills', '$business', '$business_address', '$profit', '$suggestions', '$submit')";
 mysqli_query($con, $query2);

  $query = "SELECT * FROM survey WHERE EMAIL = '$email'";

  $results = mysqli_query($con,$query);

  if(mysqli_num_rows($results) == 0) {
   
          $query1 = "INSERT INTO survey (EMAIL, LASTNAME, FIRSTNAME, MIDDLENAME, COURSE, MAJOR, BATCH, CIVIL, GENDER, BIRTHDAY, CONTACT, PERMANENT_ADD, REGION, PROVINCE, LOCATION_RES, AWARD, EXAM, DATE_TAKEN, RATING, RTC, ORTC, ADVANCE, CREDIT_EARNED, TRAINING_INSTITUTION, MPAS, OMPAS, EMPLOYABILITY, UNEMPLOYED_REASONS, OTHER_UNEMP_REASON, EMP_TYPE, JOB_TITLE, RELEVANT, POSITION, COMPANY_NAME, COMPANY_ADDRESS, COM_CONTACT, MLB, SKILLS_LEARNED, OTHER_SKILLS, BUSINESS_NAME, BUSINESS_ADDRESS, PROFIT, SUGGESTIONS, DATE_SUBMIT) VALUES ('$email','$lastname', '$firstname', '$middle', '$course', '$major', '$batch', '$status', '$gender', '$birthday','$contact', '$permanent_add', '$region', '$province', '$location', '$award', '$exam', '$date_taken', '$rating', '$d1', '$ortc', '$advance', '$credit_earned', '$training_institution', '$d2', '$ompas', '$employability', '$d3', '$oreason_unemployed', '$emp_type', '$job', '$relevant', '$position', '$company', '$company_address', '$company_contact', '$mlb', '$d4', '$other_skills', '$business', '$business_address', '$profit', '$suggestions', '$submit')";

            if(mysqli_query($con, $query1)) {
            $time = date("F d, Y h:i:s A");
             $sql1 = "INSERT INTO submit_ats(EMAIL,DATE_SUBMITED)VALUES('$email','$time')";
             mysqli_query($con,$sql1);
             header("location:survey_form_success.php");
              exit;
             }else{
               header('location:survey_form.php?message=addfailed');
               exit;
                 }
           }elseif(mysqli_num_rows($results) > 0){
                $query2 = "UPDATE survey SET LASTNAME = '$lastname', FIRSTNAME = '$firstname', MIDDLENAME ='$middle', COURSE = '$course', MAJOR = '$major', BATCH = '$batch', CIVIL ='$status', GENDER = '$gender',BIRTHDAY = '$birthday', CONTACT = '$contact', PERMANENT_ADD = '$permanent_add', REGION = '$region', PROVINCE = '$province', LOCATION_RES = '$location', AWARD = '$award', EXAM = '$exam', DATE_TAKEN = '$date_taken', RATING = '$rating', RTC = '$d1', ORTC = '$ortc', ADVANCE = '$advance', CREDIT_EARNED = '$credit_earned', TRAINING_INSTITUTION = '$training_institution', MPAS = '$d2', OMPAS = '$ompas', EMPLOYABILITY = '$employability', UNEMPLOYED_REASONS = '$d3', OTHER_UNEMP_REASON = '$oreason_unemployed', EMP_TYPE = '$emp_type', JOB_TITLE = '$job', RELEVANT = '$relevant', POSITION = '$position', COMPANY_NAME = '$company', COMPANY_ADDRESS = '$company_address', COM_CONTACT = '$company_contact', MLB = '$mlb', SKILLS_LEARNED = '$d4', OTHER_SKILLS = '$other_skills', BUSINESS_NAME = '$business', BUSINESS_ADDRESS = '$business_address', PROFIT = '$profit', SUGGESTIONS = '$suggestions', DATE_SUBMIT = '$submit' WHERE EMAIL = '$email'";

                if(mysqli_query($con, $query2)) {
                  $time = date("F d, Y h:i:s A");
                  $sql1 = "INSERT INTO submit_ats(EMAIL,DATE_SUBMITED)VALUES('$email','$time')";
                  mysqli_query($con,$sql1);
                  header("location:survey_form_success.php");
                  exit; 
                    } else {
                       header('location:survey_form.php?message=addfailed');
                        exit;
                           }
                 }
  }else{
    header('location:survey_form.php?message=addfailed');
       exit;
       }
}

 ?>
<!DOCTYPE html>
<html>
<head>
<title>pit-tc alumni survey</title>
<link rel="icon" href="../images/pitlogo.png" type="image/x-icon">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h6 class="modal-title" style="color: darkred;">INVALID!!!</h6>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <p>The Information submitted is not match in records of registered Alumni of PIT Tabango.</p>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="dismiss()">OKAY</button>
      </div>

    </div>
  </div>
</div>
<body>
<div class="container mt-3" style="max-width: 800px; height:auto; min-height:500px; border: .5px solid lightgray; background: #ffffff; padding: 0; border-radius:10px;">
  <img src="banner.png" style="width: 100%; height: 300px; margin-bottom: 10px; border-top-right-radius:10px; border-top-left-radius:10px;">
  <div style="width: 100%; padding:30px;">
  <h1>Tracer Study of PIT Tabango Graduates <?php echo date("Y");?></h1>
<?php 
    if (isset($_GET['message'])) { 
      if ($_GET['message'] == "addfailed") {?>
      <div class="alert alert-danger" role="alert" id="alert">
        <strong>Unsuccessfully Submitted!!!</strong> Please <a href="#" data-bs-toggle="modal" data-bs-target="#myModal" class="alert-link">read this message</a>.
      </div>
              <?php
        }elseif ($_GET['message'] == "updatefailed") {?>
      <div class="alert alert-success text-center" role="alert" id="alert">
        
        <?php echo "PROGRAM SUCCESSFULLY DELETED!"; ?>
      </div>
              <?php
        }
    }

      ?>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" id="myForm" class="was-validated">
<div class="mt-3 mb-3">
      <label for="agreement" style="text-align: justify;">&emsp;&emsp;&emsp;In view of the foregoing and in connection with PIT-TC, I hereby give my consent to PIT-TC to collect, use, store, update or modify, process, disclose or share my personal data such as but not limited to the following sensitive personal information - name, age, date of birt, civil status, religion, address, contact numbers, email address, course, and other contact information, educations records - as requested or required by its proper authorities and subsidiaries like CHED, AACCUP Accreditation, Industry Linkages and the like. <br><br>
      &emsp;&emsp;&emsp;I hereby certify that the information given is true and correct to the best of my knowledge and allow the PIT Tabango to use the information for its intended purpose. The information herein shall be treated as confidential in compliance with the Data Privacy Act of 2012.</label><br>
      <input type="checkbox" name="agreement" required>
      <label class="cbox">Agree</label>
    </div>
  <h2 style="margin-top:30px;">
A. GENERAL INFORMATION</h2>
    <div class="mt-3 mb-3">
      <label for="email">Email <i style="color: red;">*</i></label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" required>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="mb-3 mt-3">
      <label for="lastname">Lastname <i style="color: red;">*</i></label>
      <input type="text" class="form-control" id="lastname" placeholder="Enter Lastname" name="lastname" required>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="mt-3 mb-3">
      <label for="firstname">Firstname <i style="color: red;">*</i></label>
      <input type="text" class="form-control" id="firstname" placeholder="Enter Firstname" name="firstname" required>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="mt-3 mb-3">
      <label for="middle">Middle Name <i style="color: red;">*</i></label>
      <input type="text" class="form-control" id="middle" placeholder="Enter Middlename" name="middle">
    </div>
    <div class="mb-3 mt-3">
      <label for="status">Civil Status <i style="color: red;">*</i></label>
      <select class="form-control" id="status" name="status" required>
              <option style="display:none;"></option>
              <option>Single</option>
              <option>Married</option>
              <option>Separated</option>
              <option>Widow</option>
      </select>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="mb-3 mt-3">
      <label for="gender">Gender <i style="color: red;">*</i></label>
      <select class="form-control" id="gender" name="gender" required>
              <option style="display:none;"></option>
              <option>Male</option>
              <option>Female</option>
      </select>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="mt-3 mb-3">
      <label for="bday">Birthday <i style="color: red;">*</i></label>
      <input type="date" class="form-control" id="bday" name="bday" required>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="mt-3 mb-3">
      <label for="contact">Contact <i style="color: red;">*</i></label>
      <input type="number" class="form-control" placeholder="Enter Contact Number" name="contact" required>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="mb-3 mt-3">
      <label for="permanent_add">Permanent Address <i style="color: red;">*</i></label>
      <textarea class="form-control" id="permanent_add" name="permanent_add" placeholder="Permanent Address" required></textarea>
    <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="mb-3 mt-3">
      <label for="region">Region of Origin <i style="color: red;">*</i></label>
      <select class=" form-control" name="region" required>
              <option style="display:none;"></option>
              <option>Region 1</option>
              <option>Region 2</option>
              <option>Region 3</option>
              <option>Region 4</option>
              <option>Region 5</option>
              <option>Region 6</option>
              <option>Region 7</option>
              <option>Region 8</option>
              <option>Region 9</option>
              <option>Region 10</option>
              <option>Region 11</option>
              <option>NCR</option>
              <option>ARMM</option>
              <option>CARAGA</option>
      </select>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="mt-3 mb-3">
      <label for="province">Province <i style="color: red;">*</i></label>
      <input type="text" class="form-control" name="province" required>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="mt-3 mb-3">
      <label for="residence">Location of Residence <i style="color: red;">*</i></label>
      <select class=" form-control" name="location" required>
              <option style="display:none;"></option>
              <option>City</option>
              <option>Municipality</option>
      </select>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <h2 style="margin-top:30px;">
B. EDUCATIONAL BACKGROUND</h2>
    <div class="mt-3 mb-3">
      <label for="program">Educational Attainment (Baccalaureate Degree Only) a. Degree(s) & Specialization <i style="color: red;">*</i></label>
      <select class="form-control" name="program" required>
      <option style="display:none;"></option>
      <?php
      $query = "SELECT * FROM programs";
      $result = mysqli_query($con, $query);
    
      while($row =mysqli_fetch_assoc($result)){ ?>
      <option><?php 
      echo $row['ABBREVIATION'];
      ?></option>
    <?php
    }
       ?> 
      </select> 
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="mt-3 mb-3">
      <label for="major">Major <i style="color: red;">*</i></label>
      <select class=" form-control" name="major" required>
              <option style="display:none;"></option>
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
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="mt-3 mb-3">
      <label for="batch">Year Graduated <i style="color: red;">*</i></label>
      <select class="form-control" name="batch" required>
              <option style="display:none;"></option>
              <?php
              $years = range(1974, strftime("%Y", time())); 
            foreach(array_reverse($years) as $year){ ?>
           <option>
              <?php 
              echo $year;
              ?></option>
            <?php
            }
               ?> 
              </select>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="mt-3 mb-3">
      <label for="honor">Honor(s) or Award(s) Received <i style="color: red;">*</i></label>
      <input type="text" class="form-control" name="award">
    </div>
    <div class="mt-3 mb-3">
      <label for="exam">Professional Examination(s) Passed [Name of Examination]. If no examination passed please put none. <i style="color: red;">*</i></label>
      <input type="text" class="form-control" name="exam">
    </div>
    <div class="mt-3 mb-3">
      <label for="datetaken">Date Taken <i style="color: red;">*</i></label>
      <input type="date" class="form-control" name="date_taken">
    </div>
    <div class="mt-3 mb-3">
      <label for="rating">Rating <i style="color: red;">*</i></label>
      <input type="text" class="form-control" name="rating">
    </div>
    <div class="mt-3 mb-3">
      <label for="reasonfortaking">Reason(s) for taking the course(s) or pursuing degree(s). You may select more than one answer. <i style="color: red;">*</i></label><br><br>
      <input type="checkbox" name="rtc[]" value="High grades in the subject area(s) related to the course.">
      <label for="highgrades" class="cbox">&nbsp;High grades in the subject area(s) related to the course.</label><br>
      <input type="checkbox" name="rtc[]" value="Good grades in high school.">
      <label for="goodgrades" class="cbox">&nbsp;Good grades in high school.</label><br>
      <input type="checkbox" name="rtc[]" value="Influence of parents or relatives.">
      <label for="influenceofparents" class="cbox">&nbsp;Influence of parents or relatives.</label><br>
      <input type="checkbox" name="rtc[]" value="Peer Influence.">
      <label for="peerinfluence" class="cbox">&nbsp;Peer Influence.</label><br>
      <input type="checkbox" name="rtc[]" value="Inspired by a role model.">
      <label for="inspired" class="cbox">&nbsp;Inspired by a role model.</label><br>
      <input type="checkbox" name="rtc[]" value="Strong passion for the profession.">
      <label for="passion" class="cbox">&nbsp;Strong passion for the profession.</label><br>
      <input type="checkbox" name="rtc[]" value="Prospect for immediate employment.">
      <label for="prospect" class="cbox">&nbsp;Prospect for immediate employment.</label><br>
      <input type="checkbox" name="rtc[]" value="Status or prestige of the profession.">
      <label for="prestige" class="cbox">&nbsp;Status or prestige of the profession.</label><br>
      <input type="checkbox" name="rtc[]" value="Availability of course offering in chosen institution.">
      <label for="availability" class="cbox">&nbsp;Availability of course offering in chosen institution.</label><br>
      <input type="checkbox" name="rtc[]" value="Prospect of career advancement.">
      <label for="career" class="cbox">&nbsp;Prospect of career advancement.</label><br>
      <input type="checkbox" name="rtc[]" value="Affordable for the family.">
      <label for="affordable" class="cbox">&nbsp;Affordable for the family.</label><br>
      <input type="checkbox" name="rtc[]" value="Opportunity for employment abroad.">
      <label for="abroad" class="cbox">&nbsp;Opportunity for employment abroad.</label><br>
      <input type="checkbox" name="rtc[]" value="No particular choice or better idea.">
      <label for="nochoice" class="cbox">&nbsp;No particular choice or better idea.</label><br>
      <input type="checkbox" name="rtc[]" value="Prospect of attractive compensation.">
      <label for="attractive" class="cbox">&nbsp;Prospect of attractive compensation.</label><br>
      <label for="others" class="cbox">Others, please specify.</label><br>
      <input type="text" class="form-control"  name="ortc">
    </div>
    <h2 style="margin-top:30px;">
C. Training(s) Advance Studies Attended After College</h2>
<p>Please list down all professional or work-related training program(s) including advance studies you have attended after college. </p>
<div class="mb-3 mt-3">
      <label for="advance">Title or Advance Study <i style="color: red;">*</i></label>
      <input type="text" class="form-control" name="advance">
</div>
<div class="mb-3 mt-3">
      <label for="credits">Duration and Credits Earned <i style="color: red;">*</i></label>
      <input type="text" class="form-control" name="credit_earned">
</div>
<div class="mb-3 mt-3">
      <label for="training">Name of Training Institution / College / University <i style="color: red;">*</i></label>
      <input type="text" class="form-control" name="training_institution">
</div>
<div class="mb-3 mt-3">
      <label for="training">What made you pursue advance studies? <i style="color: red;">*</i></label><br><br>
      <input type="checkbox" name="mpas[]" value="For Promotion.">
      <label for="promotion" class="cbox">&nbsp;For Promotion.</label><br>
      <input type="checkbox" name="mpas[]" value="For Professional Developmanent.">
      <label for="profdev" class="cbox">&nbsp;For Professional Development.</label><br>
      <label for="otherad" class="cbox">Others, please specify.</label><br>
      <input type="text" class="form-control"  name="ompas">
</div>
  <h2 style="margin-top:30px;">
D. EMPLOYMENT DATA</h2>
<p>Employment here means any type of work performed or services rendered in exchanged for compensation under a contact of hire which create the employer and employee relations.</p>
    <div class="mb-3 mt-3">
      <label for="employability">Employability Status <i style="color: red;">*</i></label>
      <select class=" form-control" id="employability" name="employability" onchange="changeformat()" required>
              <option style="display:none;"></option>
              <option>Employed</option>
              <option>Self-Employed</option>
              <option>Unemployed</option>
      </select>
    <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="mb-3 mt-3" id="reason" style="display: none;">
      <label for="reason">Please state reason (s) why you are not yet employed. <i style="color: red;">*</i></label><br><br>
      <input type="checkbox" name="reason_unemployed[]" value="Advance  or further studies.">
      <label for="futher" class="cbox">&nbsp;Advance  or further studies.</label><br>
      <input type="checkbox" name="reason_unemployed[]" value="Family concern and decided not to find a job.">
      <label for="concenr" class="cbox">&nbsp;Family concern and decided not to find a job.</label><br>
      <input type="checkbox" name="reason_unemployed[]" value="Health-related reason(s).">
      <label for="health" class="cbox">&nbsp;Health-related reason(s).</label><br>
      <input type="checkbox" name="reason_unemployed[]" value="Lack of work experience.">
      <label for="experience" class="cbox">&nbsp;Lack of work experience.</label><br>
      <input type="checkbox" name="reason_unemployed[]" value="No job opportunity.">
      <label for="opportunity" class="cbox">&nbsp;No job opportunity.</label><br>
      <input type="checkbox" name="reason_unemployed[]" value="Did not look for a job.">
      <label for="notlook" class="cbox">&nbsp;Did not look for a job.</label><br>
      <label for="otherreason" class="cbox">Others, please specify.</label><br>
      <input type="text" class="form-control"  name="oreason_unemployed">
    </div>
    <div class="mb-3 mt-3" id="emp_type" style="display: none;">
      <label for="employmenttype">Employment Type <i style="color: red;">*</i></label>
      <select class="form-control" name="emp_type">
              <option style="display:none;"></option>
              <option>Regular or Permanent</option>
              <option>Temporary</option>
              <option>Casual</option>
              <option>Contractual</option>
      </select>
    </div>
     <div class="mb-3 mt-3" id="relevant" style="display: none;">
      <label for="relevant">Is your job/business relevant to the course you took up in college? <i style="color: red;">*</i></label>
      <select class="form-control" name="relevant">
              <option style="display:none;"></option>
              <option>Yes</option>
              <option>No</option>
      </select>
    </div>
    <div class="mt-3 mb-3" id="title" style="display: none;">
      <label for="position">Job Title
 <i style="color: red;">*</i></label>
      <input type="text" class="form-control" name="title">
    </div>
    <div class="mt-3 mb-3" id="position" style="display: none;">
      <label for="position">Your Position in the Company/Organization
 <i style="color: red;">*</i></label>
      <input type="text" class="form-control" name="position">
    </div>
    <div class="mt-3 mb-3" id="company" style="display: none;">
      <label for="company">Company/Organization Name <i style="color: red;">*</i></label>
      <input type="text" class="form-control" name="company">
    </div>
    <div class="mt-3 mb-3" id="comcontact" style="display: none;">
      <label for="comcontact">Company/Organization Contact Number <i style="color: red;">*</i></label>
      <input type="number" class="form-control" name="company_contact">
    </div>
    <div class="mt-3 mb-3" id="company_address" style="display: none;">
      <label for="company_address">Company/Organization Address <i style="color: red;">*</i></label>
      <textarea class="form-control" name="company_address" placeholder=""></textarea>
    </div>
    <div class="mb-3 mt-3" id="mlb" style="display: none;">
      <label for="majorline">Major line of your business or business of the company you are presently employed in <i style="color: red;">*</i></label>
      <select class="form-control" name="mlb">
              <option style="display:none;"></option>
              <option>Agriculture, Hunting and Forestry</option></option>
              <option>Fishing</option>
              <option>Mining and Quarrying</option>
              <option>Electricity, Gas and Water Supply</option>
              <option>Construction</option>
              <option>Wholesale and Retail Trade, repair of motor vehicles, motorcycles and personal and household goods</option>
              <option>Hotels and Restaurants</option>
              <option>Transport Storage and Communication</option>
              <option>Financial Intermediation</option>
              <option>Real Estate, Renting and Business Activities</option>
              <option>Public Administration and Defense; Compulsory Social Security</option>
              <option>Education</option>
              <option>Health and Social Work</option>
              <option>Other Community, Social and Personal Service Activities</option>
              <option>Private Households with Employed Persons</option>
              <option>Extra-territorial Organization and Bodies</option>
              <option>Information and Communication Technology</option>
              <option>Manufacturing</option>
      </select>
    </div>
    <div class="mt-3 mb-3" id="business" style="display: none;">
      <label for="business">Business Name <i style="color: red;">*</i></label>
      <input type="text" class="form-control" placeholder="Business Name" name="business">
    </div>
    <div class="mt-3 mb-3" id="business_address" style="display: none;">
      <label for="business_address">Business Address <i style="color: red;">*</i></label>
      <textarea class="form-control" name="business_address" placeholder=""></textarea>
    </div>
    <div class="mt-3 mb-3" id="profit" style="display: none;">
      <label for="profit">Approximate Monthly Profit <i style="color: red;">*</i></label>
      <select class=" form-control" name="profit">
              <option style="display:none;"></option>
              <option>Below P 5,000.00</option>
              <option>P 5,000.00 to less than P 10, 000.00</option>
              <option>P 10,000.00 to less than P 15, 000.00</option>
              <option>P 15,000.00 to less than P 20, 000.00</option>
              <option>P 20,000.00 to less than P 25, 000.00</option>
              <option>P 25,000.00 and above</option>
      </select>
    </div>
    <div class="mt-3 mb-3" id="skills_learned" style="display: none;">
      <label for="skills">What skills or competencies learned in college were you able to apply in your work? <i style="color: red;">*</i></label><br><br>
      <input type="checkbox" name="skills_learned[]" value="Communication Skills.">
      <label for="communication" class="cbox">&nbsp;Communication Skills.</label><br>
      <input type="checkbox" name="skills_learned[]" value="Human Relations Skills.">
      <label for="humanrelation" class="cbox">&nbsp;Human Relations Skills.</label><br>
      <input type="checkbox" name="skills_learned[]" value="Enterprenuerial Skills.">
      <label for="enterprenuerial" class="cbox">&nbsp;Enterprenuerial Skills.</label><br>
      <input type="checkbox" name="skills_learned[]" value="Information Technology Skills.">
      <label for="infotech" class="cbox">&nbsp;Information Technology Skills.</label><br>
      <input type="checkbox" name="skills_learned[]" value="Problem-Solving Skills.">
      <label for="problem_solving" class="cbox">&nbsp;Problem-Solving Skills.</label><br>
      <input type="checkbox" name="skills_learned[]" value="Critical Thinking Skills.">
      <label for="critical_thinking" class="cbox">&nbsp;Critical Thinking Skills.</label><br>
      <label for="otherskills" class="cbox">Others, please specify.</label><br>
      <input type="text" class="form-control"  name="other_skills">
    </div>
    <div class="mt-3 mb-3">
      <label for="suggestions">List down suggestions to further improve your course curriculum. <i style="color: red;">*</i></label>
      <input type="text" class="form-control" name="suggestions">
    </div>
    <div class="mt-3 mb-3" style="text-align: right;">
      <button type="submit" name="submit" class="btn btn-primary">
    Submit
  </button>
    </div>
  </form>
  </div>
</div>
</body>
<script>
      function dismiss(){
        document.getElementById('alert').style.display = "none";
      };
      
</script>
<script type="text/javascript">
  function changeformat(){
    var format = document.getElementById('employability');

    if (format.value == "Unemployed") {
      document.getElementById('reason').style.display = "block";
      document.getElementById('comcontact').style.display = "none";
      document.getElementById('relevant').style.display = "none";
      document.getElementById('title').style.display = "none";
      document.getElementById('position').style.display = "none";
      document.getElementById('company').style.display = "none";
      document.getElementById('company_address').style.display = "none";
      document.getElementById('business').style.display = "none";
      document.getElementById('business_address').style.display = "none";
      document.getElementById('profit').style.display = "none";
      document.getElementById('skills_learned').style.display = "none";
      document.getElementById('emp_type').style.display = "none";
      document.getElementById('mlb').style.display = "none";
    }
    if(format.value == "Employed") {
      document.getElementById('reason').style.display = "none";
      document.getElementById('comcontact').style.display = "block";
      document.getElementById('relevant').style.display = "block";
      document.getElementById('title').style.display = "block";
      document.getElementById('position').style.display = "block";
      document.getElementById('company').style.display = "block";
      document.getElementById('company_address').style.display = "block";
      document.getElementById('business').style.display = "none";
      document.getElementById('business_address').style.display = "none";
      document.getElementById('profit').style.display = "block";
      document.getElementById('skills_learned').style.display = "block";
      document.getElementById('emp_type').style.display = "block";
      document.getElementById('mlb').style.display = "block";
  }
  if(format.value == "Self-Employed"){
      document.getElementById('reason').style.display = "none";
      document.getElementById('comcontact').style.display = "none";
      document.getElementById('relevant').style.display = "block";
      document.getElementById('title').style.display = "none";
      document.getElementById('position').style.display = "none";
      document.getElementById('company').style.display = "none";
      document.getElementById('company_address').style.display = "none";
      document.getElementById('business').style.display = "block";
      document.getElementById('business_address').style.display = "block";
      document.getElementById('profit').style.display = "block";
      document.getElementById('skills_learned').style.display = "block";
      document.getElementById('emp_type').style.display = "none";
      document.getElementById('mlb').style.display = "block";

  }
}
</script>
</html>
<style type="text/css">
*{
  margin: 0;
  padding: 0;
}
body{
  background-repeat: no-repeat;
  background-size: cover;
  font-family: century gothic;
  background-color:#f1f2f6;
  position: relative;
}
h2{
  font-size: 18px;
}
.tab {
  display: none;
}
.mt-3{
  font-size: 12px;
}
label{
  font-weight: bold;
}
.cbox{
  font-size: 12px;
  font-weight: normal;
}
button {
  background-color: #04AA6D;
  color: #ffffff;
  border: none;
  padding: 10px;
  font-size: 18px;
  cursor: pointer;
}
button:hover {
  opacity: 0.8;
}
footer{
  background-color: #025043;
  color: white;
  left: 0;
  bottom: 0;
  width: 100%;
  font-size: 14px;
}
</style>