<?php
include_once("frontheader.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      //validate inputs 
      if (empty($_POST['firstname'])) {
     $errors['firstname'] = "Firstname field is required";
         }

    if (empty($_POST['lastname'])) {
    $errors['lastname'] = "lastname field is required";
         }

    if (empty($_POST['dateofbirth'])) {
    $errors['dateofbirth'] = "date of birth field is required";
                    }

    if (empty($_POST['email'])) {
    $errors['email'] = "Email field is required";
                    } 
                    
    if (empty($_POST['username'])) {
    $errors['username'] = "Username field is required";
                    }                                 

    if (empty($_POST['password'])) {
    $errors['password'] = "Password field is required";
     }else if(strlen($_POST['password']) <6){

    $errors['password'] = "Password must be more than 5 characters";

                    }

    if (empty($_POST['homeaddress'])) {
    $errors['homeaddress'] = "Home address field is required";
            }

    //   if (empty($_POST['gender'])) {
    // $errors['gender'] = "Gender field is required";  //for picture field
    //                 }   
    
    
    if (empty($errors)) {

        //sanitize input
        include_once("shared/common.php");

         //creating object of common
          $cmobj = new Common();

         #make use of sanitize input method
         $firstname = $cmobj->sanitizeInputs($_POST['firstname']);
         $lastname = $cmobj->sanitizeInputs($_POST['lastname']);
         $dateofbirth = $cmobj->sanitizeInputs($_POST['dateofbirth']);
         $gender = $cmobj->sanitizeInputs($_POST['email']);
         $email = $cmobj->sanitizeInputs($_POST['username']);
        // $picture = $cmobj->sanitizeInputs($_POST['picture']); //picture field
        $homeaddress = $cmobj->sanitizeInputs($_POST['homeaddress']);
       
        //include file 
      include_once('shared/user.php');

      //create object of class
       $obj = new User();

       $output = $obj->peradoptiveregister($_POST['firstname'], $_POST['lastname'], $_POST['dateofbirth'], $_POST['email'], $_POST['username'], $_POST['password'] , $_POST['homeaddress']);

       if($output > 0){
         $output1 = $obj->financeadoptiveregister($output, $_POST['profession'], $_POST['admaritalstatus'], $_POST['admaritalstatus'], $_POST['adresidency'], $_POST['income'], $_POST['admaritalstatus']);
    }


       if ($output == true) {

        echo "<div class='alert alert-success mt-3'>";

         echo "Registration successfull. Click <a href='signin.php'>here</a> to login";

           echo "</div>";

        //redirect to success page
        // header("Location: signin.php");
        }else{

         $errors[] = "Oops! sonthing happed. Try again later.";
         }


         if ($output1 == true) {

        //redirect to success page
        // header("Location: signin.php");
        }else{

         $errors[] = "Oops! sonthing happed. Try again later.";
         } 

        
    }

    
}

?>


<section>
    <!-- first section starts here -->

    <div class="row">
        <div class="col-md-12">
            <h1 class="companytextcolor birthparentheader">AdoptMe</h1>
        </div>


        <div class="col-md-12 mt-4">
            <div class="card w-50 shadow m-auto">
                <div class="card-title ">
                    <h3 class="mb-0 htext mt-3 birthparentcardtitle">Creat account as adoptive parent</h3>
                    <small class="birthparentcardsubtitle">It's quick and easy</small>
                    <hr>
                </div>


<form action="" method="POST" enctype="multipart/form-data">

    <div id="adresult"></div>

    <div class="row p-2">
        <div class="col">
            <input type="text" class="form-control " name="firstname" placeholder="First name" aria-label="First name"
                id="adfirstname">
                
        </div>

        <div class="col">
            <input type="text" class="form-control " name="lastname" placeholder="Last name" aria-label="Last name"
                id="adlastname">
        </div>
        <!-- row ends here -->
    </div>



<div class="row p-2">
    <div class="col">
        <input type="email" class="form-control " name="email" placeholder="Email address" aria-label="email address"
            id="ademailaddress">
    </div>

    <div class="col">
        <input type="date" class="form-control " name="dateofbirth" aria-label="date" id="addateofbirth">
        <small class=" companytextcolor">Date of birth</small>
    </div>
    <!-- row ends here -->
</div>
                            
                            

<div class="row p-2">
    <div class="col">
        <input type="text" class="form-control " name="homeaddress" placeholder="Enter full home address"
            aria-label="home address" id="adhomeaddress">
    </div>
    <!-- row ends here -->
</div>



<div class="row p-2">
    <div class="col">
        <input type="text" class="form-control " name="username" placeholder="username" aria-label="username"
            id="adusername">
    </div>

    <div class="col">
        <input type="password" class="form-control " name="password" placeholder="password" aria-label="password"
            id="adpassword">
    </div>

    <div class="col">
        <input type="password" class="form-control " name="confirmpassword" placeholder="confirm password"
            aria-label="confirm password" id="adconfirmpassword">
    </div>


    <!-- row ends here -->
</div>


<div class="row p-2">
    <div class="col">
        <input type="file" class="form-control " name="myfile" aria-label="email address" id="adpicture">

        <small class=" companytextcolor">Upload a picture</small>
    </div>

    <div class="col">

        <select name="adresidency" id="adresidency" class="form-select" aria-label="maritalstatus">
            <option value="">Residency Status</option>
            <option value="landlord">Landlord</option>
            <option value="tenant">Tenant</option>

        </select>
    </div>
    <!-- row ends here -->
</div>


<!-- <div class="row p-2">
    <div class="col">
        <input type="file" class="form-control " name="dnareport" aria-label="dna report" id="adfinancialrecord">
        <small class=" companytextcolor">Upload FINANCIAL records</small>
    </div>

    <!-- row ends here -->
<!-- </div> --> 

                       

<div class="row p-2">
    <div class="col">
        <input type="text" class="form-control " name="profession" placeholder="Enter Profession"
            aria-label="profession" id="adprofession">
    </div>

    <div class="col">
        <div class="input-group mb-3">
            <span class="input-group-text">$</span>
            <input type="number" class="form-control" aria-label="Amount (to the nearest dollar)"
                placeholder="annual income" name="income" id="adincome">
            <span class="input-group-text">.00</span>
        </div>
    </div>
    <!-- row ends here -->
</div>


<div class="row p-2">
    <div class="col">
        <select name="admaritalstatus" id="admaritalstatus" class="form-select" aria-label="maritalstatus">
            <option value="">Marital Status</option>
            <option value="single">Single</option>
            <option value="married">Married</option>
            <option value="divorced">Divorced</option>
        </select>
    </div>

    <div class="col">
        <div class="col">
            <input type="file" class="form-control " name="certificate" aria-label="certificate" id="adcertificate">
            <small class=" companytextcolor">if married , upload certificate</small>
        </div>
    </div>
    <!-- row ends here -->
</div>


<div class="row p-2">
    <div class="col">
        <div class="col">
            <input type="file" class="form-control " name="policereport" aria-label="police report" id="adpolicereport">

            <small class=" companytextcolor">upload police report, if any.</small>
        </div>
    </div>
    <!-- row ends here -->
</div>

<div class="row">
    <div class="col-md-8 mt-4 myagreement" >
        <input type="checkbox" name="adcheckbox" id="adcheckbox" class="form-check-input">
        <small class="text-muted"> By clicking Continue, you agree to our Terms, Data Policy and
            Cookie Policy. You may receive SMS notifications from us
            and can opt out at any time.</small>
    </div>
    <!-- row ends here -->
</div>

<div class="row">
    <div class="col-md-12 mt-4 mb-3 birthmodal">
        <input type="submit" name="btnadoptiveparent" id="btnadoptiveparent" class=" btn text-white companycolor w-50 " value="Sign up" disabled>
        <a href="signin.html">
            <h5 class="mt-3 alreadyhave alreadyhavefix" style="color:green;">Already have an account?</h5>
        </a>
    </div>
</div>
                           
    </form>
<!-- card ends here -->
</div>

<!-- col ends here -->
</div>

<!-- row ends here -->
</div>

<!-- first section ends here -->
</section>

<?php

include_once("frontfooter.php");
?>