<?php

include_once("adminheader.php");
?>

<div class="container">

<h1 class="mt-4 mb-3 htext">

<small>Grant request</small>
</h1>


<?php 

if (isset($_REQUEST['btnadopting']) ) {

    # import file
    include_once("shared/user.php");

    // include_once("listrequests.php");

    //create object
    $obj = new User();

    $output = $obj->updateadoptionstatus($_REQUEST['fosterkidid']);

    // echo "<pre>";
    // print_r($obj);
    // echo "</pre>";

     
}

if (isset($_REQUEST['btncancel'])) {
    
    # redirect to list clubs
    $msg = "no action performed";
    header("Location: completed.php?info=$msg");
    exit();
}

?>

<div class="row">

<div class="col-lg-8 mb-4">

    <?php
    
    if (isset($_REQUEST['fosterkidid'])) {
        # code...
    
    ?>

    <div class="alert alert-success">
        <h3>Do you wish to proceed to update  <?php  echo $_REQUEST['firstname']; ?>  <?php  echo $_REQUEST['lastname']; ?> adoption status?</h3>
    </div>

    <form  enctype="multipart/form-data" action="adopted.php?fosterkidid=<?php echo $_REQUEST['fosterkidid']?>&firstname=<?php echo $_REQUEST['firstname']?>&lastname=<?php echo $_REQUEST['lastname']?>" method="POST">

    

        <button type="submit" name="btnadopting" class="btn btn-success" >Yes</button>
        <button type="submit" name="btncancel" class="btn btn-secondary">No</button>

        

    </form>
    <?php } ?>


</div>
</div>




<!-- container ends here -->
</div>

<?php
include_once("adminfooter.php");

?>