<?php

include_once("adminheader.php");
?>

<div class="container">

<h1 class="mt-4 mb-3 htext">

<small>Delete request</small>
</h1>


<?php 

if (isset($_REQUEST['btndelete'])) {

    # delete club
    include_once("shared/user.php");

    //create object
    $obj = new User();

    //make use of delete method 
    $obj->updaterequeststatusdecline($_REQUEST['requestid']);
}

if (isset($_REQUEST['btncancel'])) {
    
    # redirect to list clubs
    $msg = "no action performed";
    header("Location: listrequests.php?info=$msg");
    exit();
}

?>

<div class="row">

<div class="col-lg-8 mb-4">

    <?php
    
    if (isset($_REQUEST['requestid'])) {
        # code...
    
    ?>

    <div class="alert alert-danger">
        <h3>Are you sure you want to delete <?php  echo $_REQUEST['firstname']; ?> <?php  echo $_REQUEST['lastname']; ?></h3>
    </div>

    <form  enctype="multipart/form-data" action="deleterequest.php?requestid=<?php echo $_REQUEST['requestid']?>&firstname=<?php echo $_REQUEST['firstname']?>" method="POST">

        <button type="submit" name="btndelete" class="btn btn-danger">Yes</button>
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