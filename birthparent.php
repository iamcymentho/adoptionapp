
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

    if (empty($_POST['partnersfirstname'])) {
    $errors['partnersfirstname'] = "Partner's first name field is required";
                    }     
                    
    if (empty($_POST['partnerslastname'])) {
    $errors['partnerslastname'] = "Partner's last name field is required";
                    }  
                    
    if (empty($_POST['partnersemail'])) {
    $errors['partnersemail'] = "Partner's Email field is required";
                    }  
                    
    if (empty($_POST['partnersdateofbirth'])) {
    $errors['partnersdateofbirth'] = "Partner's date of birth field is required";
                    }                   

     if (empty($_POST['gender'])) {
    $errors['gender'] = "Gender field is required";
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

        }elseif ($_POST['password'] !== $_POST['confirmpassword']) {
         $errors['password'] = "Password field doesnt match";
             }
    //   if (empty($_POST['gender'])) {
    // $errors['gender'] = "Gender field is required";  //for picture field
    //                 }   
    
    if (empty($_POST['homeaddress'])) {
    $errors['homeaddress'] = "Home address field is required";
            }
    
    if (empty($_POST['medicalchallenges'])) {
    $errors['medicalchallenges'] = "Message field is required";
            }        


     if (empty($errors)) {

        # sanitize input

        include_once("shared/common.php");

         //creating object of common
          $cmobj = new Common();

         #make use of sanitize input method
         $firstname = $cmobj->sanitizeInputs($_POST['firstname']);
         $lastname = $cmobj->sanitizeInputs($_POST['lastname']);
         $dateofbirth = $cmobj->sanitizeInputs($_POST['dateofbirth']);
         $partnersfirstname = $cmobj->sanitizeInputs($_POST['partnersfirstname']);
         $partnerslastname = $cmobj->sanitizeInputs($_POST['partnerslastname']);
         $partnersemail = $cmobj->sanitizeInputs($_POST['partnersemail']);
         $partnersdateofbirth = $cmobj->sanitizeInputs($_POST['partnersdateofbirth']);

         $gender = $cmobj->sanitizeInputs($_POST['gender']);
         $email = $cmobj->sanitizeInputs($_POST['email']);
        // $picture = $cmobj->sanitizeInputs($_POST['picture']); //picture field
        $homeaddress = $cmobj->sanitizeInputs($_POST['homeaddress']);
        $medicalchallenges = $cmobj->sanitizeInputs($_POST['medicalchallenges']);

        //include file 
    include_once('shared/user.php');

    //create object of class
    $obj = new User();
    $output = $obj->perbirthregister($_POST['firstname'], $_POST['lastname'], $_POST['dateofbirth'], $_POST['partnersfirstname'], $_POST['partnerslastname'], $_POST['partnersemail'], $_POST['partnersdateofbirth'], $_POST['gender'], $_POST['email'], $_POST['username'], $_POST['password'], $_POST['homeaddress']);

    if($output > 0){
    $output1 = $obj->medbirthregister($output, $_POST['bloodgroup'], $_POST['medicalchallenges']);
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
     <!-- section starts here -->

        <div class="row">
    <div class="col-md-12">
    <h1 class="companytextcolor birthparentheader">AdoptMe</h1>
   </div>

   <div class="col-md-12 mt-4">
     <div class="card  shadow m-auto birthparent bpcardwidth">

        <div class="card-title ">
            <h3 class="mb-0 htext mt-3 birthparentcardtitle">Creat account as birth parent</h3>
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
            <div id="result" class="mb-3"></div>

            <div class="row p-2 gy-3">
    <div class="col-md">
        <input type="text" class="form-control parentinput " name="firstname" placeholder="First name"
            aria-label="first name" id="firstname" value="<?php
            
                        if(isset($_POST['firstname'])){

                        echo $_POST['firstname'];
                    }
            
            ?>">
    </div>

    <div class="col-md">
        <input type="text" class="form-control parentinput " name="lastname" placeholder="Last name"
            aria-label="lastname" id="lastname" value="<?php
            
                        if(isset($_POST['lastname'])){

                        echo $_POST['lastname'];
                    }
            
            ?>">
    </div>
    <!-- row ends here -->
</div>


<div class="row p-2 gy-3">
    <div class="col">
        <input type="email" class="form-control parentinput " name="email" placeholder="Email address"
            aria-label="email address" id="email" value="<?php
            
                        if(isset($_POST['email'])){

                        echo $_POST['email'];
                    }
            
            
            ?>">
    </div>

    <div class="col">
        <input type="date" class="form-control " name="dateofbirth" aria-label="date" id="dateofbirth" value="<?php
        
                    if(isset($_POST['dateofbirth'])){

                        echo $_POST['dateofbirth'];
                    }
        
        ?>">
        <small class=" companytextcolor">Date of birth</small>
    </div>
    <!-- row ends here -->
</div>

 <!-- birth parent partner's details starts here -->

 <div class="row p-2 gy-3">
    <div class="col-md">
        <input type="text" class="form-control parentinput " name="partnersfirstname" placeholder="Partner's First name"
            aria-label="partners first name" id="partnersfirstname" value="<?php
            
                        if(isset($_POST['partnersfirstname'])){

                        echo $_POST['partnersfirstname'];
                    }
            
            ?>">
    </div>

    <div class="col-md">
        <input type="text" class="form-control parentinput " name="partnerslastname" placeholder="Partner's Last name"
            aria-label="partners lastname" id="partnerslastname" value="<?php
            
                        if(isset($_POST['lastname'])){

                        echo $_POST['lastname'];
                    }
            
            ?>">
    </div>
    <!-- row ends here -->
</div>


<div class="row p-2 gy-3">
    <div class="col">
        <input type="email" class="form-control parentinput " name="partnersemail" placeholder="Partner's Email address"
            aria-label="Partner's email address" id="partnersemail" value="<?php
            
                        if(isset($_POST['partnersemail'])){

                        echo $_POST['partnersemail'];
                    }
            
            
            ?>">
    </div>

    <div class="col">
        <input type="date" class="form-control " name="partnersdateofbirth" aria-label="date" id="partnersdateofbirth" value="<?php
        
                    if(isset($_POST['partnersdateofbirth'])){

                        echo $_POST['partnersdateofbirth'];
                    }
        
        ?>">
        <small class=" companytextcolor"> Partner's date of birth</small>
    </div>
    <!-- row ends here -->
</div>


 <!-- birth parent partner's details ends here -->

<div class="row p-2 gy-3">
    <div class="col">
        <input type="text" class="form-control " name="homeaddress" placeholder="Enter full home address"
            aria-label="home address" id="homeaddress" value="<?php
            
                        if(isset($_POST['homeaddress'])){

                        echo $_POST['homeaddress'];
                    }
            
            ?>">
    </div>
    <!-- row ends here -->
</div>


<div class="row p-2 gy-3">
    <div class="col-md">
        <input type="text" class="form-control " name="username" placeholder="username" aria-label="username"
            id="username" value="<?php
            
                    if(isset($_POST['username'])){

                        echo $_POST['username'];
                    }
            
            ?>">
    </div>

    <div class="col-md">
        <input type="password" class="form-control " name="password" placeholder="password" aria-label="password"
            id="password" value="<?php
            
                        if(isset($_POST['password'])){

                        echo $_POST['password'];
                    }
            
            ?>">
    </div>

    

    <!-- row ends here -->
</div>


<div class="row p-2 gy-3">

    <div class="col-md">
        <input type="password" class="form-control " name="confirmpassword" placeholder="confirm password"
            aria-label="confirm password" id="confirmpassword" value="<?php
            
                        if(isset($_POST['confirmpassword'])){

                        echo $_POST['confirmpassword'];
                    }
            
            
            ?>">
    </div>

    <div class="col">
        <select name="gender" id="gender" class="form-select">

            <option value="">choose gender</option>
            <option value="male">male</option>
            <option value="female">female</option>
            <option value="other">others</option>
        </select>
    </div>

    <!-- row ends here -->
</div>
     

  <div class="row p-2 gy-3">
    <div class="col">
        <input type="file" class="form-control " name="myfile" aria-label="picture" id="picture">

        <small class=" companytextcolor">Upload a picture</small>
    </div>

    <div class="col">
<select name="bloodgroup" id="bloodgroup" class="form-select" value="<?php
            
                        if(isset($_POST['bloodgroup'])){

                        echo $_POST['bloodgroup'];
                    }
            
            
            ?>">

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

    <!-- row ends here -->
</div>


<div class="row p-2">
    <div class="col-md-12">
        <textarea name="medicalchallenges" id="medicalchallenges" cols="30" rows="5" class="form-control"
            placeholder="Enter medical status/challenges, e.g. I'm hale and healthy" value="<?php
            
            if(isset($_POST['medicalchallenges'])){

                        echo $_POST['medicalchallenges'];
                    }
            
            
            ?>"></textarea>
    </div>
    <!-- row ends here -->
</div>


<div class="row">
    <div class="col-md-8 mt-4 myagreement ">
    <input type="checkbox" name="checkbox" id="checkbox" class="form-check-input">
        <small class="text-muted">By clicking sign up, you agree to our Terms, Data Policy and Cookie Policy. You may
            receive SMS notifications from us
            and can opt out at any time.</small>
    </div>

    <!-- row ends here -->
</div>   


<div class="row">

    <div class="col-md-12 mt-4 mb-3 birthmodal">
        <input type="submit" name="btnbirthparent" class=" btn text-white companycolor w-50 " id="btnbirthparent" value="Sign up"  disabled>
        <a href="signin.html">
            <h5 class="mt-3 alreadyhave alreadyhavefix" style="color:green;">Already have an account?</h5>
        </a>
    </div>
    
    <!-- row ends here -->
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

include_once "frontfooter.php";

?>      