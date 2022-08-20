<?php

session_start();

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

    
//     // $fosterparent = $_SESSION['fosterparent_id'];
//     include_once("bpnav.php");
//     $parent = $_SESSION['parent_id'];

//     // var_dump($_SESSION['parent_id']);

//     $output = $obj->perfosterkid( $_POST['fkfirstname'], $_POST['fklastname'], $_POST['fkdateofbirth'], $_POST['fkgender'], $_POST['fkhobbies'], $parent);

//     if($output > 0){
//     $output1 = $obj->medfosterkid($output, $_POST['fkbloodgroup'], $_POST['fkallergies'], $_POST['fkdnareport'], $_POST['fkmedicalchallenges']);
//     }

//     // echo "<pre>";
//     // print_r($output);
//     // echo "</pre>";

//     if ($output == true && $output1 == true) {

//         $msg = "<div class='alert alert-success'>Registration Successful</div>";

//         //redirect to dashboard page
//         header("Location: trial.php");
//         exit();
//         }else{

//             $msg = "<div class='alert alert-danger'>Oops! something happened. Try again later</div>";
//         //  $errors[] = "Oops! sonthing happened. Try again later.";
//          }


//         // if ($output1 == true) {

//         // //redirect to success page
//         // // header("Location: signin.php");
//         // }else{

//         //  $errors[] = "Oops! something happened. Try again later.";
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

    <style>
        .displaykidsheader{

            margin-left:200px;
        }

        .displaykidstext{

            font-family: 'Bebas Neue', cursive;
            word-spacing: 5px;
        }

        .displaykidstext2{

            font-family: 'Bebas Neue', cursive;
            word-spacing: 5px;
            font-size:30px;
        }

        .shift{

            margin-left:150px;
        }

        .shift1{

            margin-left:170px;
        }

        .backtodashboard{

            margin-left:170px;
        }

        .trialfooter{
                margin-left: 600px;
            }
    </style>

<?php
        
        include_once("trialheader.php");
        
        ?>




      <section class="mt-4"> 

      <div class="container">

            <!-- importing navigation -->
        <?php include_once("kidregnav.php"); ?>

        <div class="col-md-6 mb-3 backtodashboard">
            <a href="trial2.php" class="btn btn-outline-primary htext">Back to dashboard</a>

            <a href="kidsavailable.php" class="btn btn-outline-primary htext">Back to request feed</a>
        </div>


      <div class="row">

      <div class="col-md-5">

      <div class="card shift1">

            <div class="card-title">
                <h3 class="htext mt-3  text-decoration-underline ms-4  ">Request confirmation</h3>
                
            </div>

    </div>
        <!-- col ends here -->
    </div>

    <!-- row ends here -->

    </div>


    <div class="row">
    <div class="col-md-6 mt-3 shift">

        <?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btnrequest'])) {
        
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";


        include_once("shared/user.php");

        //create object
        $obj = new User();

        // //generate a unique reference number

        // $myreference = "CH".rand().time();

        // session_start();
        //make use of insert details method
        $output = $obj->insertRequest($_SESSION['fosterparent_id'], $_POST['fosterkid_id'], $_POST['firstname'], $_POST['lastname'], $_POST['gender'] );

        if ($output == 'true') {
            echo "<div class='alert alert-success'>Request successful</div>";
        }else {
            echo "<div class='alert alert-danger'>There was an error! Try again later.</div>";
        }
    

    ?>


        <div style="width:400px" class="displaykidstext2">

        <img src="fosterphotos/pictures<?php echo $_POST['mypicture']; ?>" alt="<?php  echo $_POST['firstname']; ?>" class="img-fluid shadow rounded-3" style="border-right: 15px solid white; border-bottom: 15px solid white;">

        <p class="mt-3">
            <?php echo $_POST['firstname']; ?> <?php echo $_POST['lastname']; ?>
            <!-- &#8358 <?php// echo number_format($_POST['myprice'], 2);?> -->
        </p>
        

        <p>

        <!-- <form action="paystack_init.php" method="post">

            <input type="hidden" name="email" value="<?php //echo $_SESSION['myemail']?>">

            <input type="hidden" name="amount" value="<?php //echo $_POST['myprice']?>">

            <input type="hidden" name="reference" value="<?php //echo $myreference; ?>">

            <input type="submit" name="btnpay" value="Pay With Paystack" class="btn btn-success">
        </form> -->
        </p>
    </div>


    <?php } ?>


    <!-- col ends here -->
    </div>



        <!-- <div class="col-md-3 displaykidstext">
            
            

        </div> -->





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