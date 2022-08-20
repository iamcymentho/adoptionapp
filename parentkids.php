
<?php  
	session_start();
	if (!isset($_SESSION['parent_id'])) {

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

            margin-left:130px;
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
            <a href="trial.php" class="btn btn-outline-primary htext">Back to dashboard</a>
        </div>


      <div class="row justify-content-center">

      <div class="col-md-8">

      <div class="card w-75 mx-auto">

            <div class="card-title">
                <h3 class="htext mt-3 displaykidsheader text-decoration-underline">Kid(s) registered by <?php echo $_SESSION['fname']?> <?php echo $_SESSION['lname']?></h3>
                
            </div>

    </div>
        <!-- col ends here -->
    </div>

    <!-- row ends here -->

    </div>


    <div class="row mt-3">

    <div class="col shift">

        <?php
        
        //include file 
       include_once('shared/user.php');

       //create object of class
          $obj = new User();

          //make reference to get foster kids method
        $kidregistered = $obj->birthparentkids($_SESSION['parent_id']);

    // echo "<pre>";
    // print_r($fosterkid);
    // echo "</pre>";

        

        if (count($kidregistered) > 0) {
            
            # loop thru the array using foreach
            foreach ($kidregistered as $key => $value) {
                # code...
            
        
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
         
         
         ?> 
         </p> 

         <p class="mb-0">Hobbies: <?php echo $value['hobbies']; ?> </p>
         
         <p class="mt-2 mb-3">Registration Date: <?php echo date('l jS F, Y', strtotime($value['dateof_registration']))?>
        </p> 

       <div>Adoption Status:
        <?php
         

         $status = $value['requeststatus'];

          $progressreview = "<div class='progress mt-3'>
  <div class='progress-bar progress-bar-striped bg-success progress-bar-animated' role='progressbar' aria-valuenow='75' aria-valuemin='0' aria-valuemax='100' style='width: 5%'></div>
</div>";     

         $progresspending = "<div class='progress mt-3'>
  <div class='progress-bar progress-bar-striped bg-success progress-bar-animated' role='progressbar' aria-valuenow='75' aria-valuemin='0' aria-valuemax='100' style='width: 25%'></div>
</div>";

        $progressapproved = "<div class='progress mt-3'>
  <div class='progress-bar progress-bar-striped bg-success progress-bar-animated' role='progressbar' aria-valuenow='75' aria-valuemin='0' aria-valuemax='100' style='width: 65%'></div>
</div>";     

 $progresscompleted = "<div class='progress mt-3'>
  <div class='progress-bar progress-bar-striped bg-success progress-bar-animated' role='progressbar' aria-valuenow='75' aria-valuemin='0' aria-valuemax='100' style='width: 100%'></div>
</div>";  

$progressdeclined = "<div class='progress mt-3'>
  <div class='progress-bar progress-bar-striped bg-danger progress-bar-animated' role='progressbar' aria-valuenow='75' aria-valuemin='0' aria-valuemax='100' style='width: 15%'></div>
</div>";

         
         if ($value['requeststatus'] == "declined") {

    echo "<a class='btn btn-danger' disabled>$status</a>";
    echo "$progressdeclined";

         }elseif ($value['requeststatus'] == "pending") {
            
    echo "<a class='btn btn-secondary' disabled>$status</a>";
    echo "$progresspending";

         }elseif ($value['requeststatus'] == "approved") {

echo "<a class='btn btn-warning text-white' disabled>$status</a>";
echo "$progressapproved";

         }elseif ($value['requeststatus'] == "completed") {

echo "<a class='btn btn-success text-white' disabled>$status</a>";
echo "$progresscompleted";
         }else {
            echo "<a class='btn btn-primary text-white' disabled>In review</a>";
            echo "$progressreview";
         }
         
         ?>
       </div>
            
            </div>
            
               
            </div>
                

            </div>

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