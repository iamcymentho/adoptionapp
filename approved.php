<?php include_once("adminheader.php");?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">


<!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">
      <small class="myheading text-muted text-decoration-underline" >approved requests</small>
    </h1>

    <a href="listrequests.php" class="btn btn-secondary mb-3 myadmintext">Back</a>

        <div class="w-75">

    <?php
      if (isset($_REQUEST['m'])) {
        # code...
      ?>
        <div class="alert alert-success">

        <?php echo $_REQUEST['m']; ?>
        </div>

        <?php  }?>


        <?php
      if (isset($_REQUEST['info'])) {
        # code...
      ?>
        <div class="alert alert-info">

        <?php echo $_REQUEST['info']; ?>
        </div>

        <?php  }?>


        <?php
      if (isset($_REQUEST['err'])) {
        # code...
      ?>
        <div class="alert alert-danger">

        <?php echo $_REQUEST['err']; ?>
        </div>

        <?php  }?>

        </div>

    
 
    <div class="row">
      <div class="col-md-12 mb-4">

      <div class="card">
        <div class="card-header bg-secondary ">
            <h3 class="myadmintext text-white">List of approved requests</h3>
                    </div>

                    <div class="card-body">
                      <div class="card-text"> 

 
        <table class="table table-hover table-bordered table-striped" id="mytable">
            <thead class="">

            <tr class="myadmintext">
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Date 0f Birth</th>
                <th>Gender</th>
                <th>Picture</th>
                <th>requestdate</th>
                <th>Status</th>


                </tr>
            </thead>

            <tbody class="myadmintext">


                <?php
                #include class

                include_once('shared/user.php');

                #create club object
                $userobj = new User();
                
                $output = $userobj->approvedrequest();

                // echo "<pre>";
                // print_r($output);
                // echo "</pre>";


                    if (count($output)>0) {

                        foreach($output as $key => $value){
                            $request_id = $value['request_id'];
                            $requeststatus = $value['requeststatus'];
                         

                        ?>

                        <?php
                        
                        if ($requeststatus == 'approved') {
                          # code...
                        
                        ?>

                        <tr>
                            <td>#</td>
                            <td><?php echo $value['firstname']?></td>
                            <td><?php echo $value['lastname']?></td>
                             <td><?php echo date('l jS F, Y', strtotime($value['dateof_birth']))?></td>
                            <td><?php echo $value['gender']?></td>
                            

                            <td>
                              <?php
                              if (!empty($value['picture'])) {
                                # code...
          
                              ?>

                                <img src="fosterphotos/pictures<?php echo $value['picture']?>" alt="<?php echo $value['firstname']?> picture" class="img-fluid" style="height:100px;">
                              <?php } ?>   

                              <?php //echo $value['picture']?>
                            
                            </td>


                            <td><?php echo date(' jS F, Y', strtotime($value['requestdate']))?></td>

                            <td>
                             
                            <a href="" class="btn btn-warning text-white disabled" id="btnaccept" >Approved</a>

                            <a href="completing.php?requestid=<?php echo $request_id?>&firstname=<?php echo $value['firstname']; ?>&lastname=<?php echo $value['lastname']; ?>&reqstatus=<?php echo $value['requeststatus']; ?>" class="btn btn-success" id="btncomplete" name="btncomplete">Completed</a>
            
                    
                     </td>
                            
                        </tr>


                        <?php } ?>

                        

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

  <!-- jquery script file -->
    <script type="text/javascript" src="jquery.min.js"></script>

     <!-- jquery script file -->
    <!-- <script type="text/javascript" src="jquery.min.js"></script> -->

    <!-- <script src="jquery.min.js"></script> -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
  
   <script>
        $(document).ready( function(){
          
    $('#mytable').DataTable();


});
    </script>
    


  <?php include_once("adminfooter.php");?>
