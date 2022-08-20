<?php  
	session_start();
	if (!isset($_SESSION['fosterparent_id'])) {

		# redirect the unauthenticated user to login/index
		 header("Location: signin.php");
	}
?>
<nav>
	

    <div class="card">
        <div class="card-title mynumberheading">

        <h5 style="padding: 20px; text-align: center;">Welcome, <?php echo $_SESSION['fname']. " ". $_SESSION['lname']; ?></h5><i class="fa-solid fa-hand-heart"></i>

        </div>
    </div>

	<!-- <ul>
		<li><a href="addcomplaint.php">Add Complaints</a></li>
		<li><a href="listcomplaints.php">Complaints</a></li>
		<li><a href="logout.php">Logout</a></li>
	</ul> -->
</nav>


    