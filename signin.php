<?php
include_once("frontheader.php");
?>

<section class="sectionimg">
        <!-- section goes here -->
        <div class="mysigninoverlay realsignoverlay">
            <div class="row">
                <div class="col-md-5 myformlogin">
        <div class="card p-3">
            <div class="card-title">
                <h3 class="mt-3 htext" style="margin-left:20px ;">Sign In To AdoptMe</h3>

                    <?php
                    // session_start();

                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        

                        include_once("shared/user.php");

                        // create object

                        $obj = new User();

                        //make use of the login method
                        $loginresult = $obj->birthparentlogin($_POST['lgemail'], $_POST['lgpassword']);

                        $loginresult1 = $obj->fosterparentlogin($_POST['lgemail'], $_POST['lgpassword']);

                        // var_dump($loginresult);

                        // var_dump($loginresult1);


                        if ($loginresult == true ) {

                            // redirect user to landing page

                            header("Location: trial.php");
                            exit();
                            
                        }else if ($loginresult1 == true) {
                            
                            //redirect user to landing page

                           header("Location: trial2.php");
                           exit();
                        }else{

                            echo "<div class='alert alert-danger'>Invalid email address or password</div>";
                        }


                        // if ($loginresult1 == true) {

                        //     // redirect user to landing page

                        //     header("Location: trial2.php");
                        //     exit();
                        // }else{

                        //     echo "<div class='alert alert-danger'>Invalid email address or password</div>";
                        // }
                    
                    }

                		
                	?>


            </div>
            <div class="card-body">
                <form action="" method="POST">

                    <div id="loginresult" class="mb-3"></div>

                    <input type="email" name="lgemail" class="form-control " placeholder="Enter email" id="lgemail">
                    <input type="password" name="lgpassword" class="form-control  mt-3 mb-2" placeholder="Enter password" id="lgpassword">
                    <a href="forgotpassword.html" style="color:black ;"> <small class="mt-3 forgot">forgot
                            password?</small></a>
                    <div class="d-grid gap-2">
                        <button type="submit" name="signinbtn" id="signinbtn" class="btn companycolor mt-5 mytext  rounded-2"
                            style="color: white;">Sign in</button>
                    </div>
                    <div class="mt-2 mb-5">
                        <small>Don't have an account? <a href="#" style="color: red;">Sign Up</a></small>
                    </div>
        
                </form>
        
                <!-- card body ends here -->
            </div>
            <!-- card ends here -->
        </div>
    
        <div class="card mt-3 mysignincard">
            <div class="card-body">
                <div class="card-text">
                    <small class="text-muted signup"> Sign Up with?<a href="#"><i class="fa-brands fa-google-plus  myicons"
                                style="color:green"></i></a> <a href="#"><i class="fa-brands fa-telegram"
                                style="color:green"></i></a></small>
                </div>
            </div>
            <!-- card ends here -->
        </div>
                </div>
                <!-- row ends here -->
            </div>
            <!-- overlay ends here -->
        </div>
        <!-- section ends here -->
    </section>

        <!--container ends here -->
    </div>



<!-- jquery script file -->
<script type="text/javascript" src="jquery.min.js"></script>

<!-- external script  goes here -->
<script type="text/javascript" src="app.js"></script>
    <!-- Bootstrap java script goes here-->

    <script type="text/javascript" src="js/bootstrap.bundle.js"></script>




</body>


</html>