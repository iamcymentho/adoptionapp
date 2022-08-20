<section>

            <!-- <div class="container-fluid">

            <nav class="navbar navbar-dark bg-dark justify-content-end">

                <ul class="nav ">

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Active</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                
                </ul>

  <!-- Navbar content -->
        <!-- </nav> -->


            <!-- container fluid ends here -->
            <!-- </div> --> 


        <nav class="navbar navbar-dark bg-dark shadow">

      <div class="container-fluid">
       <span class="navbar-brand mb-0 h1 text-white">ADOPTME</span>



        <ul class="nav ">

                <li>

                <button type="button" class="btn btn-light">
            Notifications <span class="badge bg-danger">4</span>
             </button>
             
                </li>

                <li class="nav-item ms-5">
                    <a class="nav-link btn btn-light" href="logout.php">Logout</a>
                </li>

                
                
                </ul>

       </div>


       <?php
       
       function sanitizeInput($data){
    
  $data = trim($data); // trim spaces
  $data = htmlspecialchars($data); // avoid html entities
  $data = addslashes($data); // escape slashes

  return $data;

       }
       
       
       ?>

       
       </nav>

        </section>

