
<?php  
	session_start();
	if (!isset($_SESSION['fosterparent_id'])) {

		# redirect the unauthenticated user to login/index
		 header("Location: signin.php");
	}
?>

<?php


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

        .shift{

            margin-left:150px;
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
        </div>


      <div class="row justify-content-center">

      <div class="col-md-8">

      <div class="card shadow">

            <div class="card-title">
                <h3 class="htext mt-3 displaykidsheader text-decoration-underline">Foster kids available for adoption</h3>
                
            </div>

    </div>
        <!-- col ends here -->
    </div>

    <!-- row ends here -->

    </div>


    <div class="row mt-3" id="checkout">

    <div class="col shift">

        <?php
        
        //include file 
       include_once('shared/user.php');

       //create object of class
          $obj = new User();

          //make reference to get foster kids method
        $fosterkid = $obj->getfosterkids();

    // echo "<pre>";
    // print_r($fosterkid);
    // echo "</pre>";

        

        if (count($fosterkid) > 0 ) {
            
            # loop thru the array using foreach
            foreach ($fosterkid as $key => $value) {
                     $adoptionstatus = $value['adoptionstatus'];

                     // var_dump($adoptionstatus);
            
        
        ?>

       <?php

       if ($adoptionstatus != 'adopted') {

          

       ?>

        <div style="width:250px; float:left; margin:15px;" class="displaykidstext">

         <div class="card shadow">

        <div class="card-body">

        <p><?php echo $value['fosterkid_firstname']; ?>  <?php echo $value['fosterkid_lastname']; ?></p> 

        <img src="fosterphotos/pictures<?php echo $value['picture']; ?>" alt="photo" class="img-fluid shadow" style="height:150px;">

        <p class="mt-2 mb-0">Gender: <?php echo $value['gender']; ?> </p> 

         <p class=" mb-0">Age: 
            
         <?php

         $bday = new DateTime($value['dateof_birth']); // Your date of birth
            $today = new Datetime(date('m.d.y'));
            $diff = $today->diff($bday);

            printf('%d years, %d months, %d days', $diff->y, $diff->m, $diff->d);
            printf("\n");
         
        
         
         
         ?> </p> 

         <p class="mb-0">Hobbies: <?php echo $value['hobbies']; ?></p>

         <p class="mb-0">Adoption Status: 
            
         <?php echo "<a  class='btn btn-dark'>$adoptionstatus</a>"; ?> 

         <form method="post" action="insertrequests.php">


                <input type="hidden" name="fosterkid_id" value="<?php echo $value['fosterkid_id']; ?>">

                <input type="hidden" name="firstname" value="<?php echo $value['fosterkid_firstname']; ?>">

                <input type="hidden" name="lastname" value="<?php echo $value['fosterkid_lastname']; ?>">

                <input type="hidden" name="gender" value="<?php echo $value['gender']; ?>">

                <input type="hidden" name="medicalchallenge" value="<?php echo $value['medical_challenge']; ?>">

                <input type="hidden" name="mypicture" value="<?php echo $value['picture']; ?>">

                <input type="submit" id="btnrequest" name="btnrequest" value="Make a request" class="btn btn-outline-primary mt-4">

                </form>
        
        
        </p> 

        <hr>

            <!-- card-body ends here -->
            </div>
            
                <!-- card ends here -->
            </div>
                

            </div>

   <?php } ?>


        <?php 
        }

    }
        ?>


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