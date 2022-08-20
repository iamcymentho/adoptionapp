<?php  
include_once("frontheader2.php");

?>

<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btndonate'])) {
        
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";


        include_once("shared/donateclass.php");

        //create object
        $obj = new Donate();

        //generate a unique reference number

        $myreference = "CH".rand().time();

        //make use of insert details method
        $output = $obj->insertDetails($_POST['firstname'],$_POST['lastname'],$_POST['email'], $_POST['amount'], $myreference);




    // //create object of payment class
    // $obj = new Payment();

    //make use of initialize paystack transaction method
    $output = $obj->initializePaystackTransaction($_POST['email'], $_POST['amount'], $myreference);

    

    $redirect_url = $output['data']['authorization_url'];

    if (!empty($redirect_url)) {
        # redirect to paystack payment gateway
        header("Location: $redirect_url");
    }else {
        
            echo "<pre>";
            print_r($output);
            echo "</pre>";
    }
    

    }

    
    ?>


<section>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="card shadow mb-5">
                    <div class="card-title">
                        <h3 class="text-center text-decoration-underline mt-5 donationheader text-muted">DONATE HERE</h3>
                    </div>

                    <div id="donateresult"></div>

                    <div class="card-body">
                        <form action="" method="POST">

                        <div>
                           <label for="firstname" class="form-label" >Firstname</label>
                           <input type="text" name="firstname" class="form-control" placeholder="enter first name" id="firstname">
                        </div>

                        <div>
                           <label for="lastname" class="form-label mt-3" >Lastname</label>
                           <input type="text" name="lastname" class="form-control" placeholder="enter last name" id="lastname">
                        </div>

                        <div>
                           <label for="email" class="form-label mt-3" >Email</label>
                           <input type="email" name="email" class="form-control" placeholder="enter email address" id="email">
                        </div>

                        <div class="input-group mb-3 mt-4">
                    <span class="input-group-text">$</span>
                    <input type="number" class="form-control" aria-label="Amount (to the nearest dollar)" name="amount" id="amount">
                    <span class="input-group-text">.00</span>
                    </div>
<!-- <button type="submit" id="btndonate"  name="btndonate" value="" class="btn btn-primary" onclick="validate(event)">Donate With Paystack </button>  -->

<button type="submit" id="btndonate"  name="btndonate" value="" class="btn btn-primary">Donate With Paystack </button> 
                        </form>

     
                    </div>

                    <div class="card-footer bg-dark text-white mt-3">
                        <small>Alausa Royal Estate. Plot 201, Obafemi Awolowo Way, beside , Ikeja Electric , Alausa, Ikeja, Lagos | +(234)-8051-308-354 </small>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <img src="images/payment2.png" alt="donation" class="img-fluid w-75 mt-5 ms-5">
            </div>
            <!-- row ends here -->
        </div>
    </div>
</section>

 <!-- jquery script file -->
    <script type="text/javascript" src="jquery.min.js"></script>

    <!-- jquery script file -->
    <script type="text/javascript" src="app.js"></script>

<!-- Bootstrap java script goes here-->
<script type="text/javascript" src="js/bootstrap.bundle.js"></script>

<!-- <script type="text/javascript">

    function validate(event) {

        var firstname = document.getElementById("firstname").value;
        var lastname= document.getElementById("lastname").value;
        var email = document.getElementById("email").value;
        var amount = document.getElementById("amount").value;
        var mydonateresult = document.getElementById("donateresult");

         var donateresult = `
        
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
     <i class="fa-solid fa-triangle-exclamation"></i> Fill in all required entry fields.
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
     `;

        if (firstname == "" || lastname == "" || email == "" || amount == "") {

         event.preventeventDefaullt();
        mydonateresult.innerHTML = `
        
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
     <i class="fa-solid fa-triangle-exclamation"></i> Fill in all required entry fields.
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
     `;

        // alert("good to go");

     }

        
    }
</script>  -->





