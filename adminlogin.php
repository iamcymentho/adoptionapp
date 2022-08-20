<!DOCTYPE html>

<html lang="en">

<head>

    <title> Put your babies up for adoption || Adopt me</title>

    <!-- required meta tags-->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- facebook meta tags-->
    <meta property="og:sitename" content="personalwebpage">
    <meta property="og:url " content="personalwebpage.com">
    <meta property="og:image " content="images/newrounded.jpeg">
    <meta property="og:width " content="">
    <meta property="og:height " content="">
    <meta property="og:type " content="">
    <meta property="og:locale " content="">
    <meta property="og:fb:admins " content="">


    <!-- twitter meta tags-->
    <meta name="twitter.site" content="">
    <meta name="twitter.title" content="">
    <meta name="twitter.name" content="">
    <meta name="twitter.card" content="">
    <meta name="twitter.discription" content="">


    <!-- bootstrap CSS stylesheet-->

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">

    <link rel="stylesheet" type="text/css" href="style.css">



    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Caveat&family=EB+Garamond:ital@1&family=Economica&family=Roboto+Flex:opsz,wght@8..144,300&family=Roboto:wght@300&display=swap"
        rel="stylesheet">


    <style type="text/css">
        .navbar {

            font-family: 'Bebas Neue', cursive;
            word-spacing: 5px;
            letter-spacing: 2px;
            font-size: 20px;

            position: sticky;
            top: 5px;
            z-index: 1;

        }

        .coupleup{

            background-color: rgba(18, 148, 144,0.7);
            height: 300px;
        }

        .mybody{

            height: 615px;
        }

        .myadminlogin{

            margin-top: -170px;
        }

        .myadminhead{


            
            font-family: 'Bebas Neue', cursive;
            word-spacing: 2px;
            letter-spacing: 3px;
            font-size: 20px;
        }

        .myadmintext{

            font-family: 'Bebas Neue', cursive;
            word-spacing: 2px;
            letter-spacing: 1px;
            font-size: 15px;
        }

        


       
    </style>

</head>



<body class=" mybody shadow">




    <div class="container-fluid">

            <div class="row ">
                <div class="col-md-12 coupleup shadow">


                </div>

                
            </div>


            <div class="row">

                <div class="col-lg-3 col-sm-6 mx-auto myadminlogin">

                    <form action="" method="POST">

                    <div class="card shadow myadmincard">
                        <div class="card-title mx-auto">

                            <h5 class="mt-3 mb-0 myadminhead"><i class="fa-solid fa-user"></i> Admin</h5>
                            
                        </div>
                        <hr>

                        <?php
                    // session_start();

                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        
                        include_once("shared/user.php");

                        // create object
                        $obj = new User();

                        //make use of the login method
                        $loginresult = $obj->adminlogin($_POST['email'], $_POST['password']);

                        // var_dump($loginresult2);

                        if ($loginresult == true) {

                            // redirect user to landing page
                            header("Location: adminpanel.php");
                            exit();
                        }else{

                            echo "<div class='alert alert-danger'>Invalid email address or password</div>";
                        }

                    }


                    if (isset($_REQUEST['m'])) {

               echo "<div class='alert alert-danger'>". $_REQUEST['m']."</div>";
                 }
                		
                	?>


                        <div class="card-body">

                            <label for="email" class="form-label myadmintext">Email Address</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email Address">


                            <label for="email" class="form-label mt-3 myadmintext">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="password">

                                <div class="mt-3">
                            <input type="checkbox" name="signin" id="signin" class="form-check-input" >
                            <label for="signin" class="form-check-label myadmintext">stay signed in</label>

                            </div>

                                    <div class="d-grid gap-2">

                            <button type="submit" name="adminbtn" id="adminbtn" class="btn mt-2 text-white"
                            style="background-color: rgba(18, 148, 144,0.7) ;">Login</button>

                            </div>

                            
                            <!-- card body ends here -->

                        </div>

                        <!-- card ends here -->
                    </div>

                        </form>
                </div>
            </div>
        <!--container ends here -->
    </div>
    <!-- Bootstrap java script goes here-->

    <script type="text/javascript" src="js/bootstrap.bundle.js"></script>

</body>


</html>