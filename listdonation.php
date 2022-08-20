<?php include_once("adminheader.php");?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">


<!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">
      <small class="myheading text-muted text-decoration-underline" >List of donations</small>
    </h1>

     <!-- <a href="pending.php" class="btn btn-secondary mb-3 myadmintext">Pending</a>

    <a href="declined.php" class="btn btn-danger mb-3 myadmintext">Declined</a>

    <a href="approved.php" class="btn btn-warning text-white mb-3 myadmintext">Approved</a>

    <a href="completed.php" class="btn btn-success mb-3 myadmintext">Completed</a> -->

    <!-- <a href="javascript:void(0)" class="btn btn-light mb-3 myadmintext"  onclick="start()">Pull</a> -->

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
            <h3 class="myadmintext text-white">List of donations</h3>
                    </div>

                    <div class="card-body">
                      <div class="card-text"> 

 
        <table class="table table-hover table-bordered table-striped table-bordered" id="mytable">
            <thead class="mt-3">

            <tr class="myadmintext">
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Amount</th>
                <th>Reference</th>
                <th>Datepaid</th>
               


                </tr>
            </thead>

            <tbody class="myadmintext">


                <?php
                #include class

                include_once('shared/donateclass.php');

                #create club object
                $donateobj = new Donate();
                
                $output = $donateobj->listdonation();

                // echo "<pre>";
                // print_r($output);
                // echo "</pre>";


                    if (count($output)>0) {

                         $kounter = 0; 

                        foreach($output as $key => $value){
                            $donation_id = $value['donation_id'];

                        ?>

                          <tr>
                            <td><?php echo ++$kounter?></td>
                            <td><?php echo $value['firstname']?></td>
                            <td><?php echo $value['lastname']?></td>
                            <td><?php echo $value['email']?></td>
                            <td><?php echo $value['amount']?></td>
                            <td><?php echo $value['reference']?></td>
                             <td><?php echo date('l jS F, Y', strtotime($value['datepaid']))?></td>
                            
                            

                           
                            
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

  <!-- jquery script file -->
    <script type="text/javascript" src="jquery.min.js"></script>

    <!-- <script src="jquery.min.js"></script> -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
  
   <script>
        $(document).ready( function(){
          
    $('#mytable').DataTable();


});
    </script>

       <!-- linking to push         -->
    <script src="mypush/push.min.js"></script>

          <!-- linking to service worker        -->
    <script src="mypush/serviceWorker.min.js"></script>

    <!-- external javascript -->
    <script src="push.js"></script>

    


  <?php include_once("adminfooter.php");?>
