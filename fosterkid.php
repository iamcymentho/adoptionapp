<?php

session_start();
var_dump($_SESSION);

include_once("frontheader.php");

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
      
    // if (empty($_POST['username'])) {
    // $errors['username'] = "Username field is required";
    //                 }                 

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
    $parent = $_SESSION['parent_id'];

    $output = $obj->perfosterkid( $parent, $_POST['fkfirstname'], $_POST['fklastname'], $_POST['fkdateofbirth'], $_POST['fkgender'], $_POST['fkhobbies'], $_POST['picture']);

    // if($output > 0){
    // $output1 = $obj->medbirthregister($output, $_POST['bloodgroup'], $_POST['dnareport'], $_POST['medicalchallenges']);
    // }


    if ($output == true) {

        //redirect to success page
        // header("Location: signin.php");
        }else{

         $errors[] = "Oops! sonthing happed. Try again later.";
         }


        // if ($output1 == true) {

        // //redirect to success page
        // // header("Location: signin.php");
        // }else{

        //  $errors[] = "Oops! sonthing happed. Try again later.";
        //  } 

     }         

    
}

?>

<section>
     <!-- section starts here -->

        <div class="row">
    <div class="col-md-12">
    <h1 class="companytextcolor birthparentheader">AdoptMe</h1>
   </div>

   <div class="col-md-12 mt-4">
     <div class="card  shadow m-auto birthparent bpcardwidth">

        <div class="card-title ">
            <h3 class="mb-0 htext mt-3 birthparentcardtitle">Creat account as foster kid</h3>
            <small class="birthparentcardsubtitle">It's quick and easy</small>
            <hr>
        </div>

        

        <?php

                    if (!empty($errors)) {
                        echo "<div class='alert alert-danger'>";

                          foreach ($errors as $key => $value) {
                              echo "<p class='m-0'>$value</p>";
                          }
                          echo "</div>";
                    }

                    ?>

        <form action="" method="POST" enctype="multipart/form-data">
            
            <div id="fkresult" class="mb-3"></div>

    <div class="row p-2">
        <div class="col">
            <input type="text" class="form-control " name="fkfirstname" placeholder="First name" aria-label="First name"
                id="fkfirstname">
        </div>
    
        <div class="col">
            <input type="text" class="form-control " name="fklastname" placeholder="Last name" aria-label="Last name"
                id="fklastname">
        </div>
        <!-- row ends here -->
    </div>
    
    <div class="row p-2">
        <div class="col">
            <input type="email" class="form-control " name="fkemail" placeholder="Email address" aria-label="email address"
                id="fkemailaddress">
        </div>
    
        <div class="col">
            <input type="date" class="form-control " name="fkdateofbirth" aria-label="date" id="fkdateofbirth">
            <small class=" companytextcolor">Date of birth</small>
        </div>
    
    
        <!-- row ends here -->
    </div>



    <div class="row p-2">
        <div class="col">
            <select name="fkgender" id="fkgender" class="form-select" aria-label="gender">
                <option value="">Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
    
            </select>
        </div>
    
        <div class="col">
            <input type="text" class="form-control " name="fkhobbies" placeholder="enter hobbies" aria-label="hobbies"
                id="fkhobbies">
        </div>
        <!-- row ends here -->
    </div>


    <!-- <div class="row p-2">
        <div class="col">
            <input type="text" class="form-control " name="fkusername" placeholder="username" aria-label="username"
                id="fkusername">
        </div>
    
        <div class="col">
            <input type="password" class="form-control " name="fkpassword" placeholder="password" aria-label="password"
                id="fkpassword">
        </div>
    
        <div class="col">
            <input type="password" class="form-control " name="fkconfirmpassword" placeholder="confirm password"
                aria-label="confirm password" id="fkconfirmpassword">
        </div>
        <!-- row ends here -->
    <!-- </div>  -->

    
    <div class="row p-2">
        <div class="col">
            <input type="file" class="form-control " name="fkpicture" aria-label="picture" id="fkpicture">
            <small class=" companytextcolor">Upload a picture</small>
        </div>
    
        <div class="col">
            <input type="text" class="form-control " name="fkbloodgroup" placeholder="Blood group" aria-label="blood group"
                id="fkbloodgroup">
        </div>
        <!-- row ends here -->
    </div>

    <div class="row p-2">
        <div class="col">
            <input type="file" class="form-control " name="fkdnareport" aria-label="dna report" id="fkdnareport">
            <small class=" companytextcolor">Upload DNA report</small>
        </div>
        <!-- row ends here -->
    </div>

    <div class="row p-2">
        <div class="col">
            <input type="text" class="form-control " name="fkallergies" placeholder="state allergies" aria-label="allergies"
                id="fkallergies">
        </div>
        <!-- row ends here -->
    </div>

    <div class="row p-2">
        <div class="col">
        <textarea name="fkmedicalchallenges" id="fkmedicalchallenges" cols="30" rows="5" class="form-control"
            placeholder="State other medical challenges"></textarea>
            </div>
        <!-- row ends here -->
    </div>

    <div class="row">
        <div class="col-md-8 mt-4 myagreement ">
            <input type="checkbox" name="fkcheckbox" id="fkcheckbox" class="form-check-input">
            <small class="text-muted">By clicking sign up, you agree to our Terms, Data Policy and Cookie Policy. You may
                receive SMS notifications from us
                and can opt out at any time.</small>
        </div>
    
        <!-- row ends here -->
    </div>
    
    
    <div class="row">
        <div class="col-md-12 mt-4 mb-3 birthmodal">
            <input type="submit" name="btnfosterkid" class=" btn text-white companycolor w-50 " id="btnfosterkid"
                value="Sign up" disabled>
            <a href="signin.html">
                <h5 class="mt-3 alreadyhave alreadyhavefix" style="color:green;">Already have an account?</h5>
            </a>
        </div>
    </div>

        </form> 
         <!-- card ends here -->
     </div>
       
      <!--  col ends here -->
   </div>
                
    <!-- row ends here -->
  </div>

 <!-- section ends here -->
  </section>

  <?php

include_once("frontfooter.php");

?>
