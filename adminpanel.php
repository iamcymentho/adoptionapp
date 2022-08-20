<?php
include_once("adminheader.php");

?>

<?php

//include user class
include_once("shared/user.php");

//create object of user
$obj = new User();

//access total birth parent method
$output = $obj->totalbirthparent();

$adoptiveparent = $obj->totaladoptiveparent();

$fosterkids = $obj->totalfosterkid();

$noofrequest = $obj->totalrequests();

$pending = $obj->totalrequestspending();

$declined = $obj->totalrequestsdeclined();

$approved = $obj->totalrequestsapproved();

$totalusers = $output + $adoptiveparent;

$kidsavailable = $obj->totalavailablefosterkid();

$totaladoption = $obj->totaladoption();

// $users = $obj->totalusers();

//     echo "<pre>";
//     print_r($output);
//     echo "</pre>";


//include donation class
include_once("shared/donateclass.php");

//create object of user
$donateobj = new Donate();

//access list donation method
$totalonation = $donateobj-> totaldonation();


?>

<section>
            <!-- first section starts here -->

            <div class="container">

            <div class="row">
                <div class="col-md-3 mt-4">
                    <div class="card bg-info mt-3 shadow">
                        <div class="card-title">
                            <p class="text-white mt-4 myadmintext m-3"><i class="fa-solid fa-users fa-2x"></i> All active users</p>
                        </div>

                        <div class="card-body">
                            <div class="card-text ">
                                <h1 class="text-white text-decoration-underline subcardnumber"><?php echo $totalusers?></h1>
                            </div>
                            <a href="" class="mt-3 text-white myadmintext"><small>View Report ( Usage - Total active users )</small></a>
                        </div>
                        <!-- card ends here -->
                    </div>
                </div>



                <div class="col-md-3 mt-4">
                    <div class="card bg-dark mt-3 shadow">
                        <div class="card-title">
                            <p class="text-white mt-4 myadmintext m-3"><i class="fa-solid fa-users fa-2x"></i> Total birth parent's accounts</p>
                        </div>
                
                        <div class="card-body">
                            <div class="card-text ">
                                <h1 class="text-white text-decoration-underline subcardnumber"><?php echo $output?></h1>
                            </div>
                            <a href="" class="mt-3 text-white myadmintext"><small>View Report (  birth parent's accounts )</small></a>
                        </div>
                        <!-- card ends here -->
                    </div>
                </div>

                <div class="col-md-3 mt-4">
                    <div class="card bg-primary mt-3 shadow">
                        <div class="card-title">
                            <p class="text-white mt-4 myadmintext m-3"><i class="fa-solid fa-users fa-2x"></i> Total adoptive parent's accounts</p>
                        </div>
                        <div class="card-body">
                            <div class="card-text ">
                    <h1 class="text-white text-decoration-underline subcardnumber"><?php echo $adoptiveparent?></h1>
                            </div>
                            <a href="" class="mt-3 text-white myadmintext"><small>View Report (  adoptive parent's 
                                </small></a>
                        </div>
                        <!-- card ends here -->
                    </div>
                </div>


                <div class="col-md-3 mt-4">
                    <div class="card  mt-3 shadow" style="background-color:rgba(0,128,128,0.7)">
                        <div class="card-title">
                            <p class="text-white mt-4 myadmintext m-3"><i class="fa-solid fa-users fa-2x"></i> Total foster kids </p>
                        </div>
                        <div class="card-body">
                            <div class="card-text ">
                                <h1 class="text-white text-decoration-underline subcardnumber"><?php echo $fosterkids?></h1>
                            </div>
                            <a href="" class="mt-3 text-white myadmintext"><small>View Report (Usage - Total foster kids accounts )
                                </small></a>
                        </div>
                        <!-- card ends here -->
                    </div>
                </div>


                <!-- row ends here -->
            </div>




            <div class="row">
                <div class="col-md-3 mt-4">
                    <div class="card bg-secondary mt-3 shadow">
                        <div class="card-title">
                            <p class="text-white mt-4 myadmintext m-3"><i class="fa-solid fa-envelope-open-text fa-2x"></i> Total requests</p>
                        </div>
                        <div class="card-body">
                            <div class="card-text ">
                        <h1 class="text-white text-decoration-underline subcardnumber"><?php echo $noofrequest?></h1>
                            </div>
                            <a href="" class="mt-3 text-white myadmintext"><small>View Report ( Usage - Total requests
                                    )</small></a>
                        </div>
                        <!-- card ends here -->
                    </div>
                </div>



                <div class="col-md-3 mt-4">
                    <div class="card bg-warning mt-3 shadow">
                        <div class="card-title">
                            <p class="text-white mt-4 myadmintext m-3"><i class="fa-solid fa-voicemail fa-2x"></i> Total pending</p>
                        </div>
                        <div class="card-body">
                            <div class="card-text ">
                                <h1 class="text-white text-decoration-underline subcardnumber"><?php echo $pending?></h1>
                            </div>
                            <a href="" class="mt-3 text-white myadmintext"><small>View Report ( Usage - Total pending
                                    )</small></a>
                        </div>
                        <!-- card ends here -->
                    </div>
                </div>
            
            
            
                <div class="col-md-3 mt-4">
                    <div class="card bg-danger mt-3 shadow">
                        <div class="card-title">
                            <p class="text-white mt-4 myadmintext m-3"><i class="fa-solid fa-ban fa-2x"></i> Total declined</p>
                        </div>
                        <div class="card-body">
                            <div class="card-text ">
                                <h1 class="text-white text-decoration-underline subcardnumber"><?php echo $declined?></h1>
                            </div>
                            <a href="" class="mt-3 text-white myadmintext"><small>View Report ( Usage - Total declined )</small></a>
                        </div>
                        <!-- card ends here -->
                    </div>
                </div>
            
            
            
                <div class="col-md-3 mt-4">
                    <div class="card bg-secondary mt-3 shadow">
                        <div class="card-title">
                            <p class="text-white mt-4 myadmintext m-3"><i class="fa-solid fa-envelope-circle-check fa-2x"></i> Total requests granted</p>
                        </div>
                        <div class="card-body">
                            <div class="card-text ">
                                <h1 class="text-white text-decoration-underline subcardnumber"><?php echo $approved?></h1>
                            </div>
                            <a href="" class="mt-3 text-white myadmintext"><small>View Report ( Usage - request granted
                                    )</small></a>
                        </div>
                        <!-- card ends here -->
                    </div>
                </div>
                <!--  second row ends here -->
            </div>



            <div class="row justify-content-center">

                <div class="col-md-3 mt-4">
                    <div class="card bg-dark mt-3 shadow">
                        <div class="card-title">
                            <p class="text-white mt-4 myadmintext m-3"><i class="fa-solid fa-children fa-2x"></i> Total kids available</p>
                        </div>
                        <div class="card-body">
                            <div class="card-text ">
                        <h1 class="text-white text-decoration-underline subcardnumber"><?php echo $kidsavailable ?></h1>
                            </div>
                            <a href="" class="mt-3 text-white myadmintext"><small>View Report ( Usage - kids available
                                    )</small></a>
                        </div>
                        <!-- card ends here -->
                    </div>
                </div>


                <div class="col-md-3 mt-4">
                    <div class="card bg-success mt-3 shadow">
                        <div class="card-title">
                            <p class="text-white mt-4 myadmintext m-3"><i class="fa-solid fa-ribbon fa-2x"></i></i> Total adoption</p>
                        </div>
                        <div class="card-body">
                            <div class="card-text ">
                    <h1 class="text-white text-decoration-underline subcardnumber"><?php echo $totaladoption?></h1>
                            </div>
                            <a href="" class="mt-3 text-white myadmintext"><small>View Report ( Usage - request granted
                                    )</small></a>
                        </div>
                        <!-- card ends here -->
                    </div>
                </div>


                <div class="col-md-3 mt-4">
                    <div class="card mt-3 shadow" style="background-color:rgba(0,128,128,0.7)">
                        <div class="card-title">
                            <p class="text-white mt-4 myadmintext m-3"><i class="fa-solid fa-credit-card fa-2x"></i></i> Total donation</p>
                        </div>
                        <div class="card-body">
                            <div class="card-text ">
                    <h1 class="text-white text-decoration-underline subcardnumber"><?php echo $totalonation?></h1>
                            </div>
                            <a href="" class="mt-3 text-white myadmintext"><small>View Report ( Usage - total donations
                                    )</small></a>
                        </div>
                        <!-- card ends here -->
                    </div>
                </div>


                <!-- third row ends here -->
            </div>
            <!-- container ends here -->
            </div>
            <!-- first section ends here -->
        </section>

        <?php
        
        include_once("adminfooter.php");
        
        ?>