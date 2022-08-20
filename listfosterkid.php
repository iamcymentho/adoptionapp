<?php include_once("adminheader.php");?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">


<!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">
      <small class="myheading text-muted text-decoration-underline" >List of foster kids</small>
    </h1>

    
 
    <div class="row">
      <div class="col-lg-12 mb-4">

      <div class="card">
        <div class="card-header bg-secondary ">
            <h3 class="myadmintext text-white">Foster kids</h3>
                    </div>

                    <div class="card-body">
                      <div class="card-text"> 

 
        <table class="table table-hover table-bordered table-striped form-control " id="mytable">
            <thead class="mt-5">

            <tr class="myadmintext">
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Date 0f Birth</th>
                <th>Gender</th>
                <th>Hobbies</th>
                <th>Picture</th>
                <th>Allergies</th>
                <th>DNA Report</th>
                <th>Medical Challenges</th>
                 <th>Date 0f registration</th>
                 <th>Adoption Status</th>

                </tr>
            </thead>

            <tbody class="myadmintext">


                <?php
                #include class

                include_once('shared/user.php');

                #create club object
                $userobj = new User();
                
                $output = $userobj->listfosterkids();

                // echo "<pre>";
                // print_r($output);
                // echo "</pre>";


                    if (count($output)>0) {

                      $kounter = 0;

                        foreach($output as $key => $value){
                            $fosterkid_id = $value['fosterkid_id'];

                        ?>

                        <tr>
                             <td><?php echo ++$kounter?></td>
                            <td><?php echo $value['fosterkid_firstname']?></td>
                            <td><?php echo $value['fosterkid_lastname']?></td>
                             <td><?php echo date('l jS F, Y', strtotime($value['dateof_birth']))?></td>
                            <td><?php echo $value['gender']?></td>
                            <td><?php echo $value['hobbies']?></td>

                            <td>
                              <?php
                              if (!empty($value['picture'])) {
                                # code...
          
                              ?>

                                <img src="fosterphotos/pictures<?php echo $value['picture']?>" alt="<?php echo $value['fosterkid_firstname']?> picture" class="img-fluid">
                              <?php } ?>   

                              <?php //echo $value['picture']?>
                            
                            </td>


                            <td><?php echo $value['allergies']?></td>
                            <td><?php echo $value['dna_report']?></td>
                            <td><?php echo $value['medical_challenge']?></td>
                             <td><?php echo date('l jS F, Y', strtotime($value['dateof_submission']))?></td>
                             <td>

                                <?php

                                    $available = $value['adoptionstatus'];
                                if ($available == 'available') {
                                    
            echo "<button class='btn btn-secondary' disabled> $available </button>";
                                }else{

          echo "<button class='btn btn-success' disabled> $available </button>";                 
                                }

                                ?>
                                
                                
                                    
                                </td>


                            <!-- <td><?php 
                            if (!empty($value['emblem'])) {
                              # code...
                            ?>
                              <img src="clubphotos/<?php //echo $value['emblem']?>" alt="<?php //echo $value['club_name']?> emblem" class="img-fluid">
                            <?php  } ?></td>
                            
                            <td>

                            <a href="editclub.php?clubid=<?php //echo $clubid?>">Edit</a> |  
                            <a href="deleteclub.php?clubid=<?php //echo $clubid?>&clubname=<?php //echo $value['club_name']; ?>">Delete</a>

                            </td>
                             -->
                        </tr>

                        <?php }
                        
                        
                    }

                
                ?>

                  
            </tbody>
        </table>
            <!-- card text ends here -->
        </div> 
            <!-- card body ends here -->
        </div>
            <!-- card ends here -->
        </div>

        <!-- col ends here -->
      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <script src="jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
  
   <script>
        $(document).ready( function(){
          
    $('#mytable').DataTable();


});
    </script>


  <?php include_once("adminfooter.php");?>
