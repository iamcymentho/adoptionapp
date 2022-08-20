
<?php

// session_start();
// var_dump($_SESSION);

// include_once("frontheader.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //validate inputs

    if (empty($_POST['fkfirstname'])) {
     $errors['fkfirstname'] = "Firstname field is required";
         }

    if (empty($_POST['fklastname'])) {
    $errors['fklastname'] = "lastname field is required";
         }

    if (empty($_POST['fkdateofbirth'])) {
    $errors['fkdateofbirth'] = "date of birth field is required";
                    }

     if (empty($_POST['fkgender'])) {
    $errors['fkgender'] = "Gender field is required";
                    }

    if (empty($_POST['fkemail'])) {
    $errors['fkemail'] = "Email field is required";
                    }
      
    if (empty($_POST['fkbloodgroup'])) {
    $errors['fkbloodgroup'] = "Bloodgroup field is required";
                    }                 

    // if (empty($_POST['password'])) {
    // $errors['password'] = "Password field is required";
    //  }else if(strlen($_POST['password']) <6){

    // $errors['password'] = "Password must be more than 5 characters";

    //                 }
    //   if (empty($_POST['gender'])) {
    // $errors['gender'] = "Gender field is required";  //for picture field
    //                 }   
    
    // if (empty($_POST['fkhomeaddress'])) {
    // $errors['homeaddress'] = "Home address field is required";
    //         }
    
    if (empty($_POST['fkmedicalchallenges'])) {
    $errors['fkmedicalchallenges'] = "Message field is required";
            }        


     if (empty($errors)) {

        # sanitize input

        include_once("shared/common.php");

         //creating object of common
          $cmobj = new Common();

         #make use of sanitize input method
         $fkfirstname = $cmobj->sanitizeInputs($_POST['fkfirstname']);
         $fklastname = $cmobj->sanitizeInputs($_POST['fklastname']);
         $fkdateofbirth = $cmobj->sanitizeInputs($_POST['fkdateofbirth']);
         $fkgender = $cmobj->sanitizeInputs($_POST['fkgender']);
         $fkhobbies = $cmobj->sanitizeInputs($_POST['fkhobbies']);

        // $picture = $cmobj->sanitizeInputs($_POST['picture']); //picture field
        
        // $medicalchallenges = $cmobj->sanitizeInputs($_POST['fkmedicalchallenges']);

        //include file 
    include_once('shared/user.php');

    //create object of class
    $obj = new User();

    
    // $fosterparent = $_SESSION['fosterparent_id'];
    include_once("bpnav.php");
    $parent = $_SESSION['parent_id'];

    // var_dump($_SESSION['parent_id']);

    $output = $obj->perfosterkid( $_POST['fkfirstname'], $_POST['fklastname'], $_POST['fkdateofbirth'], $_POST['fkgender'], $_POST['fkhobbies'], $parent);

    if($output > 0){
    $output1 = $obj->medfosterkid($output, $_POST['fkbloodgroup'], $_POST['fkallergies'], $_POST['fkdnareport'], $_POST['fkmedicalchallenges']);
    }

    // echo "<pre>";
    // print_r($output);
    // echo "</pre>";

    if ($output == true && $output1 == true) {

        // $msg = "<div class='alert alert-success'>Registration Successful</div>";
        // echo "$msg";

        //redirect to dashboard page
            $msg = " Registration successfull";
             header("Location: trial.php?m=$msg");
              exit();
        }else{

        //     $msg = "<div class='alert alert-danger'>Oops! something happened. Try again later</div>";
        // //  $errors[] = "Oops! sonthing happened. Try again later.";

                  //redirect to dashboard page
            $err = " Oops! something happened. Try again later";
             header("Location: trial.php?m=$err");
              exit();
         }
    

     }         

    
}

?>



<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

<link rel="stylesheet" type="text/css" href="style.css">

<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Caveat&family=EB+Garamond:ital@1&family=Economica&family=Roboto+Flex:opsz,wght@8..144,300&family=Roboto:wght@300&display=swap"
        rel="stylesheet">

<?php
        
        include_once("trialheader.php");
        
        ?>

        <style>
           .trialfooter{
                margin-left: 600px;
            }
        </style>




      <section class="mt-3"> 

      <div class="container">

      <!-- <div class="row">
        
      </div> -->

      <div class="row justify-content-center">

      <div class="col-md-8">

        <div class="col-md-6 mb-3">
            <a href="trial.php" class="btn btn-primary htext">Back to dashboard</a>
        </div>

      <?php include_once("kidregnav.php"); ?>

            <div class="card mt-3 shadow">

            <div class="card-title">
                <h3 class="htext birthparentcardtitle my-2 mt-3 me-auto">Foster kid registration</h3>

                <?php

                    if (!empty($errors)) {
                        echo "<div class='alert alert-danger'>";

                          foreach ($errors as $key => $value) {
                              echo "<p class='m-0'>$value</p>";
                          }
                          echo "</div>";
                    }


                    if (!empty($msg)) {

                        echo "$msg";
                    }

                        

                    ?>




            </div>

            <div class="card-body">

            <form action="" method="POST" enctype="multipart/form-data">

      <div class="row m-1 mt-2 mb-3">

      <div class="col-md-6">

        <input type="text" class="form-control " name="fkfirstname" placeholder="First name" aria-label="First name"
                id="fkfirstname" >
      </div>

      <div class="col-md-6">

        <input type="text" class="form-control " name="fklastname" placeholder="Last name" aria-label="Last name"
                id="fklastname">
      </div>

      </div>


      <div class="row m-1 mb-3">

      <div class="col-md-6">

        <input type="email" class="form-control " name="fkemail" placeholder="Email address" aria-label="email address"
                id="fkemailaddress">
      </div>

      <div class="col-md-6">

        <input type="date" class="form-control " name="fkdateofbirth" aria-label="date" id="fkdateofbirth">
            <small class=" companytextcolor">Date of birth</small>
      </div>

      </div>


      <div class="row m-1 mb-3">

      <div class="col-md-6">

        <select name="fkgender" id="fkgender" class="form-select" aria-label="gender">
                <option value="">Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
    
            </select>
      </div>

      <div class="col-md-6">

        <input type="text" class="form-control " name="fkhobbies" placeholder="enter hobbies" aria-label="hobbies"
                id="fkhobbies">
      </div>

      </div>


      <div class="row m-1 mb-3">

      <div class="col-md-6">

        <input type="file" class="form-control " name="myfile" aria-label="picture" id="fkpicture">
            <small class=" companytextcolor">Upload a picture</small>
      </div>

      <div class="col-md-6">

        <select name="fkbloodgroup" id="fkbloodgroup" class="form-select">

  <option value="">Choose bloodgroup</option>

  <?php
  
  include("shared/user.php");

  //create object of class
    $obj = new User();
  
  $bloodgroups = $obj->getbloodgroups();

  foreach($bloodgroups as $key => $bloodgroup){

    $bloodgroupid = $bloodgroup['bloodgroup_id'];
     $bloodgroupname = $bloodgroup['bloodgroup_name'];
                            
     echo "<option value='$bloodgroupid'>$bloodgroupname</option>";
                
               
                }
  
  ?>

</select>
</div>

      </div>



      <div class="row m-1 mb-3">

      <div class="col-md-6">

        <input type="file" class="form-control " name="fkdnareport" aria-label="dna report" id="fkdnareport">
            <small class=" companytextcolor">Upload DNA report</small>
      </div>

      <div class="col-md-6">

        <input type="text" class="form-control " name="fkallergies" placeholder="state allergies" aria-label="allergies"
                id="fkallergies">
      </div>

      </div>


      <div class="row m-1 mb-3">

      <div class="col">

        <textarea name="fkmedicalchallenges" id="fkmedicalchallenges" cols="30" rows="5" class="form-control"
            placeholder="State other medical challenges"></textarea>
      </div>

      

      </div>



      <div class="row">
        <div class="col-md-8 mt-4 myagreement ">
            <input type="checkbox" name="fkcheckbox" id="fkcheckbox" class="form-check-input">
            <small class="text-muted">By clicking register, you agree to our Terms, Data Policy and Cookie Policy. You may
                receive SMS notifications from us
                and can opt out at any time.</small>
        </div>
    
        <!-- row ends here -->
    </div>


    <div class="row">
        <div class="col-md-12 mt-4 mb-3 birthmodal">
            <input type="submit" name="btnfosterkid" class=" btn text-white btn-primary w-50 " id="btnfosterkid"
                value="Register" disabled>
            
        </div>
    </div>
      
      </form>


            <!-- card body ends here -->
            </div>

            <!-- card ends here -->
            </div>

      <!-- col ends here -->
      </div>

      <!-- row ends here -->
      </div>

      <!-- container ends here -->
      </div>
      </section>

      <!-- jquery script file -->
<script type="text/javascript" src="jquery.min.js"></script>

<!-- external script  goes here -->
<script type="text/javascript" src="app.js"></script>
    <!-- Bootstrap java script goes here-->

    <script type="text/javascript" src="js/bootstrap.bundle.js"></script>


   <footer class="bg-dark text-white p-1 mt-3 shadow">

<p class="trialfooter mt-3 text-muted" >@copyright. All rights reserved</p>
</footer> 