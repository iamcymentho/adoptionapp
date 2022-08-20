<?php

// session_start();
// var_dump($_SESSION);

// include_once("frontheader.php");

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {

//     //validate inputs

//     if (empty($_POST['fkfirstname'])) {
//      $errors['fkfirstname'] = "Firstname field is required";
//          }

//     if (empty($_POST['fklastname'])) {
//     $errors['fklastname'] = "lastname field is required";
//          }

//     if (empty($_POST['fkdateofbirth'])) {
//     $errors['fkdateofbirth'] = "date of birth field is required";
//                     }

//      if (empty($_POST['fkgender'])) {
//     $errors['fkgender'] = "Gender field is required";
//                     }

//     if (empty($_POST['fkemail'])) {
//     $errors['fkemail'] = "Email field is required";
//                     }
      
//     // if (empty($_POST['username'])) {
//     // $errors['username'] = "Username field is required";
//     //                 }                 

//     // if (empty($_POST['password'])) {
//     // $errors['password'] = "Password field is required";
//     //  }else if(strlen($_POST['password']) <6){

//     // $errors['password'] = "Password must be more than 5 characters";

//     //                 }
//     //   if (empty($_POST['gender'])) {
//     // $errors['gender'] = "Gender field is required";  //for picture field
//     //                 }   
    
//     // if (empty($_POST['fkhomeaddress'])) {
//     // $errors['homeaddress'] = "Home address field is required";
//     //         }
    
//     if (empty($_POST['fkmedicalchallenges'])) {
//     $errors['fkmedicalchallenges'] = "Message field is required";
//             }        


//      if (empty($errors)) {

//         # sanitize input

//         include_once("shared/common.php");

//          //creating object of common
//           $cmobj = new Common();

//          #make use of sanitize input method
//          $fkfirstname = $cmobj->sanitizeInputs($_POST['fkfirstname']);
//          $fklastname = $cmobj->sanitizeInputs($_POST['fklastname']);
//          $fkdateofbirth = $cmobj->sanitizeInputs($_POST['fkdateofbirth']);
//          $fkgender = $cmobj->sanitizeInputs($_POST['fkgender']);
//          $fkhobbies = $cmobj->sanitizeInputs($_POST['fkhobbies']);

//         // $picture = $cmobj->sanitizeInputs($_POST['picture']); //picture field
        
//         // $medicalchallenges = $cmobj->sanitizeInputs($_POST['fkmedicalchallenges']);

//         //include file 
//     include_once('shared/user.php');

//     //create object of class
//     $obj = new User();

    
//     $fosterparent = $_SESSION['fosterparent_id'];
//     $parent = $_SESSION['parent_id'];

//     $output = $obj->perfosterkid( $parent, $_POST['fkfirstname'], $_POST['fklastname'], $_POST['fkdateofbirth'], $_POST['fkgender'], $_POST['fkhobbies'], $_POST['picture']);

//     // if($output > 0){
//     // $output1 = $obj->medbirthregister($output, $_POST['bloodgroup'], $_POST['dnareport'], $_POST['medicalchallenges']);
//     // }


//     if ($output == true) {

//         //redirect to success page
//         // header("Location: signin.php");
//         }else{

//          $errors[] = "Oops! sonthing happed. Try again later.";
//          }


//         // if ($output1 == true) {

//         // //redirect to success page
//         // // header("Location: signin.php");
//         // }else{

//         //  $errors[] = "Oops! sonthing happed. Try again later.";
//         //  } 

//      }         

    
// }

?>




<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

<link rel="stylesheet" type="text/css" href="style.css">

<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Caveat&family=EB+Garamond:ital@1&family=Economica&family=Roboto+Flex:opsz,wght@8..144,300&family=Roboto:wght@300&display=swap"
        rel="stylesheet">


        <section>

            <!-- <div class="container-fluid">

            <nav class="navbar navbar-dark bg-dark justify-content-end">

                <ul class="nav ">

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Active</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                
                </ul>

  <! Navbar content -->
        <!-- </nav> -->


            <!-- container fluid ends here -->
            <!-- </div> --> 

     <style>
            .trialfooter{
                margin-left: 600px;
            }

             .w-250{
                height: 230px;
                 width:275px;
                 border:2px solid white;
                 
            }
        </style>       


        <nav class="navbar navbar-dark bg-dark shadow">

      <div class="container-fluid">
       <span class="navbar-brand mb-0 h1 text-white">ADOPTME</span>


        <ul class="nav ">

                <li>

                <button type="button" class="btn btn-light">
            Notifications <span class="badge bg-danger">4</span>
             </button>
             
                </li>

                <li class="nav-item ms-5">
                    <a class="nav-link btn btn-light" href="logout.php">Logout</a>
                </li>

                
                
                </ul>

       </div>


       
       </nav>

        </section>


<section>

<div class="container">

<div class="row">
    <div class="col-md-4 mt-3">

  <a class="btn btn-secondary htext mb-3">Logged in as adoptive parent</a>
        <div class="card bg-dark shadow">
            <div class="card-title">
                

                <?php include_once("bpnav2.php"); ?>
            </div>

            <div class="card-body">

            <div class="row">

         <img src="fosterphotos/pictures/<?php echo $_SESSION['profile']?>" alt="myprofilepp" class=" img-fluid w-250 mx-auto shadow mb-3 p-2 bg-dark rounded">   


    </div>

                <div class="row mt-3">
                <button class="btn btn-light mb-3" id="btnupdate">Update profile</button>

                <a href="kidsavailable.php" class="btn btn-light" id="btnregister">View kids available</a>

                <a href="fosterparentrequest.php" class="btn btn-light mt-3" id="btnrequest">My request</a>

                </div>

            </div>

            <!-- card ends here -->
        </div>

        <!-- col ends here -->
    </div>

      <div class="col-md-7 mt-3 myform">
       
      
      </div>


      <!-- <div class="col-md-4"></div> -->

    <div class="col-md-8 mt-3 myupdate">
        <div class="card shadow">
        <div class="card-body">

    <?php
                    
                    #include class

                include_once('shared/user.php');

                #create user object
                $userobj = new User();

                $output = $userobj->getadoptivedetails($_SESSION['fosterparent_id']);

                $financeoutput = $userobj->getadoptivefinance($_SESSION['fosterparent_id']);

                // echo "<pre>";
                // print_r($output);
                // echo "</pre>";

                // echo "<pre>";
                // print_r($financeoutput);
                // echo "</pre>";

                //check if button is clicked
                if (isset($_POST['btnadoptiveupdate'])) {
                    #validate

                    if (empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['dateofbirth']) || empty($_POST['email']) || empty($_POST['username']) || empty($_POST['homeaddress']) ) {

                        $errors = "Fill in all required fields";
                    }



                            include_once("bpnav2.php");

                            include_once("shared/common.php");

                            //creating object of common
                            $cmobj = new Common();
   

                                 #sanitize
                            $firstname = $cmobj->sanitizeInputs($_POST['firstname']);
                            $lastname = $cmobj->sanitizeInputs($_POST['lastname']);
                            $dateofbirth = $_POST['dateofbirth'];
                            $email = $cmobj->sanitizeInputs($_POST['email']);
                            $username = $_POST['username'];
                            $homeaddress = $cmobj->sanitizeInputs($_POST['homeaddress']);
                            $profession = $_POST['profession'];
                            $income = $_POST['income'];
                            
                            $fosterparent_id = $_SESSION['fosterparent_id'];


                       $data = $userobj->updateadoptivedetails($firstname, $lastname, $dateofbirth, $email, $username, $homeaddress, $fosterparent_id  );  

                       $datafinance = $userobj->updateadoptivefinancedetails($profession, $income, $fosterparent_id);
                       
                       
                                #check if its successful
                            if ($data == 1 || $datafinance == 1) {
                               
                                echo "<div class='alert alert-success'>";

                                  echo "Yay! your update was successfull";

                                    echo "</div>";

                                //redirect

                                // header("Location: trial2.php?");
                                
                            }elseif ($data == 0 && $datafinance == 0) {

                                echo "<div class='alert alert-info'>";

                                  echo "No changes was made";

                                    echo "</div>";

                                //redirect
                                
                                // header("Location: trial2.php?");
                            }else{

                                echo "<div class='alert alert-danger'>";

                                  echo "Oops! could not update details";

                                    echo "</div>";
                            } 



                           
                            
                }
                    
                    
                    ?>

        <form action="" method="POST"  action="trial.php?fosterparent_id=<?php
        
        
        if (isset($_SESSION['fosterparent_id'])) {
          echo $_SESSION['fosterparent_id'];
        }
        
        
        ?>">

        <h3 class="mynumberheading">Update profile</h3>
            <div class="row">
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Enter first name" name="firstname" value="<?php if(isset($output['fosterparent_firstname'])){

                    echo($output['fosterparent_firstname']);

              }?>">

                </div>

                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Enter last name" name="lastname" value="<?php   if(isset($output['fosterparent_lastname'])){

                    echo($output['fosterparent_lastname']);

              }?>">
                </div>

            <!-- row ends here -->
            </div>


            
            <div class="row ">
                <div class="col-md-6 mt-3">
                    <input type="email" class="form-control " name="email" placeholder="Email address"
            aria-label="email address" id="email" value="<?php if(isset($output['emailaddress'])){

                    echo($output['emailaddress']);

              }?>">
                </div>

                <div class="col-md-6 mt-3">
                    <input type="date" class="form-control " name="dateofbirth" aria-label="date" id="dateofbirth" value="<?php   if(isset($output['fosterparent_dateof_birth'])){

                    echo($output['fosterparent_dateof_birth']);

              }?>">
                </div>

            <!-- row ends here -->
            </div>


            <div class="row ">

                <div class="col mt-3">
                    <input type="text" class="form-control " name="homeaddress" placeholder="Enter full home address"
            aria-label="home address" id="homeaddress" value="<?php   if(isset($output['fosterparent_address'])){

                    echo($output['fosterparent_address']);

              }?>">

                </div>

            <!-- row ends here -->
            </div>



            <div class="row ">

                <div class="col mt-3">
                    <input type="text" class="form-control " name="username" placeholder="username" aria-label="username"
            id="username" value="<?php   if(isset($output['fosterparent_username'])){

                    echo($output['fosterparent_username']);

              }?>">
            
                </div>


                <div class="col mt-3">
                    <input type="password" class="form-control " name="password" placeholder="password" aria-label="password"
            id="password" disabled>
            
                </div>

            <!-- row ends here -->
            </div>




          <div class="row ">

                <div class="col-md-6 mt-3">

                   <input type="password" class="form-control " name="confirmpassword" placeholder="confirm password"
            aria-label="confirm password" id="confirmpassword" disabled>
            
                </div>


                <div class="col-md-6 mt-3">
                    
            <input type="file" class="form-control " name="picture" aria-label="picture" id="picture" disabled>

        <small class=" companytextcolor">Upload a picture</small>
            
                </div>

            <!-- row ends here -->
            </div>  




            <div class="row ">

                <div class="col-md-6 mt-3">

        <select name="adresidency" id="adresidency" class="form-select" aria-label="maritalstatus" disabled>
            <option value="">Residency Status</option>
            <option value="landlord">Landlord</option>
            <option value="tenant">Tenant</option>

        </select>
            
                </div>


                <div class="col-md-6 mt-3">
                    
            <input type="file" class="form-control " name="dnareport" aria-label="dna report" id="adfinancialrecord" disabled>
        <small class=" companytextcolor">Upload FINANCIAL records</small>
            
                </div>

            <!-- row ends here -->
            </div>  



        <div class="row ">

        <div class="col mt-3">
                    
            <input type="text" class="form-control " name="profession" placeholder="Enter Profession"
            aria-label="profession" id="adprofession" value="<?php if(isset($financeoutput['profession'])){

                    echo($financeoutput['profession']);

              }?>">
            
                </div>


                <div class="col mt-3">
        <div class="input-group mb-3">
            <span class="input-group-text">$</span>
            <input type="number" class="form-control" aria-label="Amount (to the nearest dollar)"
                placeholder="annual income" name="income" id="adincome" value="<?php if(isset($financeoutput['annual_income'])){

                    echo($financeoutput['annual_income']);

              }?>">
            <span class="input-group-text">.00</span>
        </div>
    </div>

            <!-- row ends here -->
            </div>  


            <div class="row p-2">

    <div class="col">
        <div class="col">
            <input type="file" class="form-control " name="certificate" aria-label="certificate" id="adcertificate" disabled>
            <small class=" companytextcolor">if married , upload certificate</small>
        </div>
    </div>


    <div class="col">
        <select name="admaritalstatus" id="admaritalstatus" class="form-select" aria-label="maritalstatus" disabled>
            <option value="">Marital Status</option>
            <option value="single">Single</option>
            <option value="married">Married</option>
            <option value="divorced">Divorced</option>
        </select>
    </div>


    <div class="col">
            <input type="file" class="form-control " name="policereport" aria-label="police report" id="adpolicereport" disabled>

            <small class=" companytextcolor">upload police report, if any.</small>
        </div>
    <!-- row ends here -->
</div>



            <div class="row ">

        <div class="col mt-3">
                    
            <button type="submit" class="btn btn-primary" name="btnadoptiveupdate" id="btnadoptiveupdate">update profile</button>
            
                </div>

            <!-- row ends here -->
            </div> 


        </form>
    </div>
              </div>
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

    <script type="text/javascript">

        $(document).ready(function(){

            $(".myform").hide();
            $(".myupdate").show();


            $("#btnupdate").click(function(){

                $(".myupdate").show();
                 $(".myform").hide();
            });

            $("#btnregister").click(function(){


                $(".myupdate").hide();
                $(".myform").show();

            });
        });
    </script>


<footer class="bg-dark text-white p-1 mt-3 shadow">

<p class="trialfooter mt-3 text-muted" >@copyright. All rights reserved</p>
</footer> 