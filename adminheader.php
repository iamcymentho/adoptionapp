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


    <style>

        .move{
            
        margin-left:280px;
        }
       
        
    </style>

</head>



<body>


<?php

#start session
session_start();

if (!isset($_SESSION['mycode']) && $_SESSION['mycode']!='christophercolumbus') {

    # redirect to login
    $msg = "Access denied!";
    
    header("Location: adminlogin.php?m=$msg");

    exit;
}

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

#sanitize function

function sanitizeInput($data){
    
  $data = trim($data); // trim spaces
  $data = htmlspecialchars($data); // avoid html entities
  $data = addslashes($data); // escape slashes

  return $data;



}

?>



    <div class="container-fluid">


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow  ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">ADOPTME</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarScroll">
                <ul class="navbar-nav  my-2 my-lg-0 navbar-nav-scroll move" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="adminpanel.php">Dashboard</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="listfosterkid.php">fosterkid</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="listrequests.php">Totalrequest</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="listdonation.php">Donations</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="adminlogout.php">Logout</a>
                    </li>
                    
                    
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>