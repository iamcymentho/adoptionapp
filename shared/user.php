<?php

//importing constants
include_once("constants.php");
include_once('common.php');

//creating class for implementation
class User{

//listing member class / properties
  public $firstname;
  public $lastname;
  public $date_of_birth;
  public $username;
  public $password;
  public $picture;
  public $homeaddress;
  public $dbconn; //database connector / handler

  //connect to the database by initializing construct
  public function __construct(){

     //create object of MYSQLi
     $this->dbconn = new MYSQLi(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASENAME);

     //check for connectivity error
     if ($this->dbconn->connect_error) {

        die("Connection failed: ".$this->dbconn->connect_error);
     }
  }
        //end constructor

        //begin birth parent registration 

        function perbirthregister($parent_firstname, $parent_lastname, $parent_date_of_birth, $partnersfirstname, $partnerslastname, $partnersemail, $partnersdateofbirth, $gender, $emailaddress, $username, $password, $parent_address){

            // $picture = "image";

            // encrypt password
		 $pwd = password_hash($password, PASSWORD_DEFAULT);

         //prepare statement for database
         $statement = $this->dbconn->prepare("INSERT INTO birthparent(parent_firstname, parent_lastname, parent_date_of_birth, partnersfirstname, partnerslastname, partnersemail, partnersdateofbirth, gender, emailaddress, username, password, picture, parent_address) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");

         //create extentions
            $ext = array('jpg', 'png', 'jpeg', 'gif');

            //create common object
            $obj = new Common;
            $picture = $obj->uploadAnyFile("fosterphotos/pictures/", 1048576, $ext);

            // echo "<pre>";
            // print_r($emblem);
            // echo "</pre>";
            // exit();

            if (array_key_exists('success', $picture)) {
              
                $filename = $picture['success'];

                //bind parameters
            $statement->bind_param("sssssssssssss",$parent_firstname, $parent_lastname, $parent_date_of_birth, $partnersfirstname, $partnerslastname, $partnersemail, $partnersdateofbirth, $gender, $emailaddress, $username, $pwd, $filename, $parent_address);

            #execute
          $statement->execute();

        // check for errors
            if ($statement->affected_rows == 1){
						return $this->dbconn->insert_id;

				}else{

					return false;
				}

            }else {
              
              return $filename['error'];
            }

        //     //bind parameters
        //     $statement->bind_param("sssssssss",$parent_firstname, $parent_lastname, $parent_date_of_birth, $gender, $emailaddress, $username, $pwd, $picture, $parent_address);

        //     #execute
        // $statement->execute();

        // // check for errors
        //     if ($statement->affected_rows == 1){
				// 		return $this->dbconn->insert_id;
				// }else{

				// 	return false;
				// }

        }

        //end birth parent registration 


        //get blood group method starts here 

        function getbloodgroups(){

          //prepare statement
          $statement = $this->dbconn->prepare("SELECT bloodgroup_id, bloodgroup_name FROM bloodgroups");

           #execute
        $statement->execute();

        #get result
        $result = $statement->get_result();

        //fetch records
        $records = array();

         if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){

                     $records[] = $row;
            }

          
        }
         return $records;


        }

        //get blood group method ends here


        //login function starts here
        
        function birthparentlogin($emailaddress, $password){

                //prepare statement
		$statement = $this->dbconn->prepare("SELECT * FROM birthparent WHERE emailaddress=?");

    // var_dump($emailaddress);

        #bind parameters
		$statement->bind_param("s", $emailaddress);

		#execute
		$statement->execute();

        //get result
		$result = $statement->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();

            //check if password match
        if (password_verify($password, $row['password'])) {

            
       // create session variable
			session_start();

      // $_SESSION['fosterparent_id']= $row['fosterparent_id'];
      $_SESSION['parent_id']= $row['parent_id'];
			$_SESSION['fname'] = $row['parent_firstname'];
			$_SESSION['lname'] = $row['parent_lastname'];
      $_SESSION['profilepicture'] = $row['picture'];
      $_SESSION['mycode'] = 'christophercolumbus'; // secrete code

            return true;
        }else{

            return false;
        }


        }else {
            return false;
        }


        }

        //login function ends here

        //birth parent medical record

        function medbirthregister($parent_id, $bloodgroup_id, $medical_challenges){

            $dna_report = "image";

            //prepare statement for database
         $statement = $this->dbconn->prepare("INSERT INTO birthparent_medicalrecord(parent_id, bloodgroup_id, medical_challenges) VALUES(?,?,?)");

            //bind parameters
         $statement->bind_param("sis",$parent_id, $bloodgroup_id,  $medical_challenges);

           #execute
        $statement->execute();

        // check for errors
            if ($statement->affected_rows == 1){
						return true;
				}else{

					return false;
				}


        }
        //birth parent medical record ends here


        function peradoptiveregister($fosterparent_firstname, $fosterparent_lastname, $fosterparent_dateof_birth, $emailaddress, $fosterparent_username, $fosterparent_password, $fosterparent_address){

              // $picture = "image";

               // encrypt password
		 $pwd = password_hash($fosterparent_password, PASSWORD_DEFAULT);

         //prepare statement for database
         $statement = $this->dbconn->prepare("INSERT INTO fosterparent(fosterparent_firstname, fosterparent_lastname, fosterparent_dateof_birth, emailaddress, fosterparent_username, fosterparent_password, fosterparent_address, picture) VALUES(?,?,?,?,?,?,?,?)");

         //create extentions
            $ext = array('jpg', 'png', 'jpeg', 'gif');

            //create common object
            $obj = new Common;
            $picture = $obj->uploadAnyFile("fosterphotos/pictures/", 1048576, $ext);

            if (array_key_exists('success', $picture)) {
              
              $filename = $picture['success'];

              //bind parameters
         $statement->bind_param("ssssssss", $fosterparent_firstname, $fosterparent_lastname, $fosterparent_dateof_birth, $emailaddress, $fosterparent_username, $pwd, $fosterparent_address, $filename );

          #execute
        $statement->execute();

            // check for errors
            if ($statement->affected_rows == 1){
						return $this->dbconn->insert_id;
				}else{

					return false;
				}  
              
            }else {
              return $filename['error'];
            }

        //  //bind parameters
        //  $statement->bind_param("ssssssss", $fosterparent_firstname, $fosterparent_lastname, $fosterparent_dateof_birth, $emailaddress, $fosterparent_username, $pwd, $fosterparent_address, $picture );

        //   #execute
        // $statement->execute();

        //     // check for errors
        //     if ($statement->affected_rows == 1){
				// 		return $this->dbconn->insert_id;
				// }else{

				// 	return false;
				// }

        }
        //foster parent personal records end here having returned the insert_id which helps to input their financial record into a different table from the same form


        //start adoptive parents financial function / method

        function financeadoptiveregister($fosterparent_id, $profession, $marital_status, $police_record, $householder, $annual_income, $marriage_certificate){

                    $police_record = "image";
                    $marriage_certificate = "image";

                    //prepare statememt for database
            $statement = $this->dbconn->prepare("INSERT INTO fosterparent_financialrecord(fosterparent_id, profession, marital_status, police_record, householder, annual_income, marriage_certificate) VALUES(?,?,?,?,?,?,?)");   
            
            //bind parameters
            $statement->bind_param("issssss", $fosterparent_id, $profession, $marital_status, $police_record, $householder, $annual_income, $marriage_certificate);

            //execute statement
            $statement->execute();

            // check for errors
            if ($statement->affected_rows == 1){
						return true;
				}else{

					return false;
				}


        }
        #end adoptive parents financial function /method


        #foster kid registration starts

         function perfosterkid($fosterkid_firstname, $fosterkid_lastname, $dateof_birth, $gender, $hobbies, $parent_id){

              // $picture = "image";

        //        // encrypt password
		//  $pwd = password_hash($password, PASSWORD_DEFAULT);

         //prepare statement for database
         $statement = $this->dbconn->prepare("INSERT INTO fosterkid(fosterkid_firstname, fosterkid_lastname, dateof_birth, gender, hobbies, picture, parent_id) VALUES(?,?,?,?,?,?,?)");

         //create extentions
            $ext = array('jpg', 'png', 'jpeg', 'gif');

            //create common object
          $obj = new Common;
          $picture = $obj->uploadAnyFile("fosterphotos/pictures", 1048576, $ext);

          if (array_key_exists('success', $picture)) {

            $filename = $picture['success'];

              //bind parameters
         $statement->bind_param("ssssssi", $fosterkid_firstname, $fosterkid_lastname, $dateof_birth, $gender, $hobbies, $filename, $parent_id);

          #execute
        $statement->execute();

            // check for errors
            if ($statement->affected_rows == 1){

						return $this->dbconn->insert_id;
                    
				}else{

					return false;
				}
            
          }else {
            return $picture['error'];
          }



            // create session variable
			session_start();

      // $_SESSION['fosterparent_id']= $row['fosterparent_id'];
      $_SESSION['fosterkid_id']= $row['fosterkid_id'];
			// $_SESSION['fname'] = $row['fosterparent_firstname'];
			// $_SESSION['lname'] = $row['fosterparent_lastname'];
      // $_SESSION['mycode'] = 'christophercolumbus'; // secrete code
        //  //bind parameters
        //  $statement->bind_param("ssssssi", $fosterkid_firstname, $fosterkid_lastname, $dateof_birth, $gender, $hobbies, $picture, $parent_id);

        //   #execute
        // $statement->execute();

        

        //     // check for errors
        //     if ($statement->affected_rows == 1){

				// 		return $this->dbconn->insert_id;
				// }else{

				// 	return false;
				// }

        }
        #foster kid registration ends



        //foster kid medical record

        function medfosterkid($fosterkid_id, $bloodgroup_id, $allergies, $dna_report, $medical_challenge){

            $dna_report = "image";

            //prepare statement for database
         $statement = $this->dbconn->prepare("INSERT INTO fosterkid_medicalrecord(fosterkid_id, bloodgroup_id, allergies, dna_report, medical_challenge) VALUES(?,?,?,?,?)");

            //bind parameters
         $statement->bind_param("iisss", $fosterkid_id, $bloodgroup_id, $allergies, $dna_report, $medical_challenge);

           #execute
        $statement->execute();

        // check for errors
            if ($statement->affected_rows == 1){
						return true;
				}else{

					return false;
				}


        }
        //fosterkid medical record ends here



        //foster parent login starts

         function fosterparentlogin($emailaddress, $fosterparent_password){

            //prepare statement
            $statement = $this->dbconn->prepare("SELECT * FROM fosterparent WHERE emailaddress=?");

            //bind parameters
            $statement->bind_param("s", $emailaddress);

            //execute statement
            $statement->execute();

            //get result
		      $result = $statement->get_result();



          if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();

            //check if password match
        if (password_verify($fosterparent_password, $row['fosterparent_password'])) {

          
            
            // create session variable
			session_start();

      // $_SESSION['fosterparent_id']= $row['fosterparent_id'];
      $_SESSION['fosterparent_id']= $row['fosterparent_id'];
			$_SESSION['fname'] = $row['fosterparent_firstname'];
			$_SESSION['lname'] = $row['fosterparent_lastname'];
      $_SESSION['profile'] = $row['picture'];
      $_SESSION['mycode'] = 'christophercolumbus'; // secrete code

      

            return true;
        }else{

            return false;
        }


        }else {
            return false;
        }

         }
        //foster parent login ends



        #begin get birth parent details

      function getparentdetails($parent_id){

        #prepare statement
        $statement = $this->dbconn->prepare("SELECT * FROM birthparent WHERE parent_id=?");

        // $statement = $this->dbconn->prepare("SELECT * FROM birthparent  JOIN birthparent_medicalrecord ON birthparent.parent_id = birthparent_medicalrecord.parent_id ");


          #bind parameter

        $statement->bind_param("i", $parent_id);

        #execute

        $statement->execute();

        #get result
        $result = $statement->get_result();

        return $result->fetch_assoc();
      }

     #end  get birth parent details


     //start get parents medical records

     function getmedicaldetails($parent_id){

        #prepare statement
        $statement = $this->dbconn->prepare("SELECT * FROM birthparent_medicalrecord WHERE parent_id=?");

        // $statement = $this->dbconn->prepare("SELECT * FROM birthparent  JOIN birthparent_medicalrecord ON birthparent.parent_id = birthparent_medicalrecord.parent_id ");


          #bind parameter

        $statement->bind_param("i", $parent_id);

        #execute

        $statement->execute();

        #get result
        $result = $statement->get_result();

        return $result->fetch_assoc();
      }

     #end  get birth parent medical records


     //begin birth parents personal details update

     function updateparentdetails($parent_firstname, $parent_lastname, $parent_date_of_birth, $emailaddress, $username, $parent_address, $parent_id){

      //prepare statement
      $statement = $this->dbconn->prepare("UPDATE birthparent SET parent_firstname=?, parent_lastname=?, parent_date_of_birth=?, emailaddress=?, username=?, parent_address=? WHERE parent_id=?");

      //bind parameters
      $statement->bind_param("ssssssi", $parent_firstname, $parent_lastname, $parent_date_of_birth, $emailaddress, $username, $parent_address, $parent_id);

      //execute statement
      $statement->execute();

      //check if record was updated
         return $statement->affected_rows;


     }
     //end birth parent personal details update


     //begin update parent medical details
     function updateparentmedicdetails($bloodgroup_id, $medical_challenges, $parent_id){

      //prepare statement
      $statement = $this->dbconn->prepare("UPDATE birthparent_medicalrecord SET bloodgroup_id=?, medical_challenges=? WHERE parent_id=?");

      //bind parameters
      $statement->bind_param("isi",$bloodgroup_id, $medical_challenges, $parent_id);

      //execute statement
      $statement->execute();

      //check if record was updated
         return $statement->affected_rows;


     }
     //end update parent medical details


     //start get adoptive details 

      function getadoptivedetails($fosterparent_id){

        #prepare statement
        $statement = $this->dbconn->prepare("SELECT * FROM fosterparent WHERE fosterparent_id=?");

        // $statement = $this->dbconn->prepare("SELECT * FROM birthparent  JOIN birthparent_medicalrecord ON birthparent.parent_id = birthparent_medicalrecord.parent_id ");


          #bind parameter
        $statement->bind_param("i", $fosterparent_id);

        #execute
        $statement->execute();

        #get result
        $result = $statement->get_result();

        return $result->fetch_assoc();
      }

     //end get adoptive details 



     //start get adoptive financial details

     function getadoptivefinance($fosterparent_id){

        #prepare statement
        $statement = $this->dbconn->prepare("SELECT * FROM fosterparent_financialrecord WHERE fosterparent_id=?");

        // $statement = $this->dbconn->prepare("SELECT * FROM birthparent  JOIN birthparent_medicalrecord ON birthparent.parent_id = birthparent_medicalrecord.parent_id ");


          #bind parameter

        $statement->bind_param("i", $fosterparent_id);

        #execute

        $statement->execute();

        #get result
        $result = $statement->get_result();

        return $result->fetch_assoc();
      }

     //end get adoptive financial details


     //begin foster kids personal details update

     function updateadoptivedetails($fosterparent_firstname, $fosterparent_lastname, $fosterparent_dateof_birth, $emailaddress, $fosterparent_username, $fosterparent_address, $fosterparent_id){

      //prepare statement
      $statement = $this->dbconn->prepare("UPDATE fosterparent SET fosterparent_firstname=?, fosterparent_lastname=?, fosterparent_dateof_birth=?, emailaddress=?, fosterparent_username=?, fosterparent_address=? WHERE fosterparent_id=?");

      //bind parameters
      $statement->bind_param("ssssssi", $fosterparent_firstname, $fosterparent_lastname, $fosterparent_dateof_birth, $emailaddress, $fosterparent_username, $fosterparent_address, $fosterparent_id);

      //execute statement
      $statement->execute();

      //check if record was updated
         return $statement->affected_rows;


     }
     //end foster kids personal details update


     //begin update adoptive financial details
     function updateadoptivefinancedetails($profession, $annual_income, $fosterparent_id){

      //prepare statement
      $statement = $this->dbconn->prepare("UPDATE fosterparent_financialrecord SET profession=?, annual_income=? WHERE fosterparent_id=?");

      //bind parameters
      $statement->bind_param("ssi", $profession, $annual_income, $fosterparent_id);

      //execute statement
      $statement->execute();

      //check if record was updated
      return $statement->affected_rows;


     }
     //end update adoptive  financial details




     function adminlogin($emailaddress, $password){


      //prepare statement
      $statement = $this->dbconn->prepare("SELECT * FROM administer WHERE emailaddress=?");

      //bind parameters
      $statement->bind_param("s", $emailaddress);

        //execute statement
        $statement->execute();

        //get result
		    $result = $statement->get_result();


       if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();

            var_dump($row);

            //check if password match
        if (password_verify($password, $row['password'])) {

          //start session
          session_start();

			$_SESSION['lgemail'] = $row['emailaddress'];
      $_SESSION['mycode'] = 'christophercolumbus'; // secrete code

            return true;
        }else{

            return false;
        }


        }else {
            return false;
        }
     }


      //list foster kids method begins here

      function listfosterkids(){

        //prepare statement
        $statement = $this->dbconn->prepare("SELECT * FROM fosterkid LEFT JOIN fosterkid_medicalrecord ON fosterkid.fosterkid_id = fosterkid_medicalrecord.fosterkid_id ORDER BY dateof_registration DESC" );

        #execute
        $statement->execute();

        #get result
        $result = $statement->get_result();

        //fetch records
        $records = array();

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){

               $records[] = $row;
            }

          
        }
         return $records;

      }
      //list foster kids method ends here


      //begin get foster kids method

    public function getfosterkids(){

        //prepare statement
        $statement = $this->dbconn->prepare("SELECT * FROM fosterkid LEFT JOIN fosterkid_medicalrecord ON fosterkid.fosterkid_id = fosterkid_medicalrecord.fosterkid_id ORDER BY dateof_registration DESC");

        //execute
         $statement->execute();

         // create session variable
			    // session_start();

      // $_SESSION['fosterparent_id']= $row['fosterparent_id'];
      

        // get result
        $result = $statement->get_result();

        $data = array();

        if ($result->num_rows > 0) {

            # fetch row
            while ($row = $result->fetch_assoc()) {

                $data[] = $row;
            }
        }

        return $data;
    }
    //end get foster kids method


    //begin insert request method

    public function insertRequest($fosterparent_id, $fosterkid_id, $firstname, $lastname, $gender){

        //prepare statement
        $statement = $this->dbconn->prepare("INSERT INTO request(fosterparent_id, fosterkid_id, firstname, lastname, gender) VALUES(?,?,?,?,?)");

        //bind parameters
        
        $statement->bind_param("iisss", $fosterparent_id, $fosterkid_id, $firstname, $lastname, $gender );

        //execute statement
        $statement->execute();

        if ($statement->affected_rows == 1) {
           return true;
        }else {
            return false;
        }

    }
    //end insert request method


    //grant request method starts

    public function grantRequest($birthparent_id, $fosterkid_id,$fosterparent_id,$firstname, $lastname, $gender){

        //prepare statement
        $statement = $this->dbconn->prepare("INSERT INTO totaladoption(birthparent_id,fosterkid_id,fosterparent_id, firstname, lastname, gender) VALUES(?,?,?,?,?,?)");

        //bind parameters
        
        $statement->bind_param("iiisss",$birthparent_id, $fosterparent_id, $fosterkid_id, $firstname, $lastname, $gender );

        //execute statement
        $statement->execute();

        if ($statement->affected_rows == 1) {

           # redirect to listclubs
            $msg = "Request was successfully granted!";
            header("Location: listrequests.php?m=$msg");
            exit;
        }else {
            
          # redirect to listclubs
            $msg = "Oops! Couldnt grant request";
            header("Location: listrequests.php?err=$msg");
            exit;
        }

    }
    //grant request method ends



    //list foster kids method begins here

      function listrequests(){

        //prepare statement
        $statement = $this->dbconn->prepare("SELECT * FROM request LEFT JOIN fosterkid ON request.fosterkid_id = fosterkid.fosterkid_id ORDER BY requestdate DESC
        " );

        #execute
        $statement->execute();

        #get result
        $result = $statement->get_result();

        //fetch records
        $records = array();

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){

               $records[] = $row;
            }

          
        }
         return $records;

      }
      //list foster kids method ends here



      //begin delete request method 

    public function deleterequest($id){

        //prepare the statement
        $statement = $this->dbconn->prepare("DELETE FROM request WHERE request_id=?");

        //bind param
        $statement->bind_param("i", $id);

        //execute
        $statement->execute();

        //check if  record was deleted
        if ($statement->affected_rows == 1) {

            # redirect to listclubs
            $msg = "Request was successfully deleted!";
            header("Location: listrequests.php?m=$msg");
            exit;
        }else {
            # redirect to listclubs
            $msg = "Oops! Couldnt delete request";
            header("Location: listrequests.php?err=$msg");
            exit;
        }
    }

    //end delete request method


    //begin delete request method 

    public function deletefosterkid($id){

        //prepare the statement
        $statement = $this->dbconn->prepare("DELETE FROM fosterkid WHERE fosterkid_id=?");

        //bind param
        $statement->bind_param("i", $id);

        //execute
        $statement->execute();

        //check if  record was deleted
        if ($statement->affected_rows == 1) {

           return true;

        }else {
            # redirect to listclubs
            return false;
        }
    }

    //end delete request method


    //begin total birth parent method
    public function totalbirthparent(){

      //prepare statement
      $statement = $this->dbconn->prepare("SELECT parent_id FROM birthparent");

      // //bind param
      //   $statement->bind_param("i", $parent_id);

      //execute statement
      $statement->execute();

        //store result
      $statement->store_result();

      //return result
      return $statement->num_rows;

    }
    //end total birth parent method



    //begin total adoptive parent method

    public function totaladoptiveparent(){

      //prepare statement
      $statement = $this->dbconn->prepare("SELECT fosterparent_id FROM fosterparent");

      // //bind param
      //   $statement->bind_param("i", $parent_id);

      //execute statement
      $statement->execute();

        //store result
      $statement->store_result();

      //return result
      return $statement->num_rows;

    }
    //end total adoptive parent method


    //begin totalfoster kid method

    public function totalfosterkid(){

      //prepare statement
      $statement = $this->dbconn->prepare("SELECT fosterkid_id FROM fosterkid");

      // //bind param
      //   $statement->bind_param("i", $parent_id);

      //execute statement
      $statement->execute();

        //store result
      $statement->store_result();

      //return result
      return $statement->num_rows;

    }
    //end total foster kid method

    //begin totalfoster kids available method

    public function totalavailablefosterkid(){

      //prepare statement
      $statement = $this->dbconn->prepare("SELECT fosterkid_id FROM fosterkid WHERE adoptionstatus ='available' ");

      // //bind param
      //   $statement->bind_param("i", $parent_id);

      //execute statement
      $statement->execute();

        //store result
      $statement->store_result();

      //return result
      return $statement->num_rows;

    }
    //end total foster kids available method


    //begin total adoption method

    public function totaladoption(){

      //prepare statement
      $statement = $this->dbconn->prepare("SELECT fosterkid_id FROM fosterkid WHERE adoptionstatus ='adopted' ");

      // //bind param
      //   $statement->bind_param("i", $parent_id);

      //execute statement
      $statement->execute();

        //store result
      $statement->store_result();

      //return result
      return $statement->num_rows;

    }
    //end total adoption method


    //begin total request method

    public function totalrequests(){

      //prepare statement
      $statement = $this->dbconn->prepare("SELECT request_id FROM request");

      // //bind param
      //   $statement->bind_param("i", $parent_id);

      //execute statement
      $statement->execute();

        //store result
      $statement->store_result();

      //return result
      return $statement->num_rows;

    }
    //end total request method


    //begin total request pending method

    public function totalrequestspending(){

      //prepare statement
      $statement = $this->dbconn->prepare("SELECT request_id FROM request WHERE requeststatus = 'pending';");

      // //bind param
      //   $statement->bind_param("i", $parent_id);

      //execute statement
      $statement->execute();

        //store result
      $statement->store_result();

      //return result
      return $statement->num_rows;

    }
    //end total request pending method


    //begin total request declined method

    public function totalrequestsdeclined(){

      //prepare statement
      $statement = $this->dbconn->prepare("SELECT request_id FROM request WHERE requeststatus = 'declined';");

      // //bind param
      //   $statement->bind_param("i", $parent_id);

      //execute statement
      $statement->execute();

        //store result
      $statement->store_result();

      //return result
      return $statement->num_rows;

    }
    //end total request declined method


    //begin total request approved method

    public function totalrequestsapproved(){

      //prepare statement
      $statement = $this->dbconn->prepare("SELECT request_id FROM request WHERE requeststatus = 'approved';");

      // //bind param
      //   $statement->bind_param("i", $parent_id);

      //execute statement
      $statement->execute();

        //store result
      $statement->store_result();

      //return result
      return $statement->num_rows;

    }
    //end total request approved method


    //begin total request approved method

    public function totalusers(){

      //prepare statement
      $statement = $this->dbconn->prepare("SELECT parent_id, fosterparent_id FROM birthparent, fosterparent;");

      // //bind param
      //   $statement->bind_param("i", $parent_id);

      //execute statement
      $statement->execute();

        //store result
      $statement->store_result();

      //return result
      return $statement->num_rows;

    }
    //end total request approved method


    //update request status approve starts here

    public function updaterequeststatus($request_id){



        //prepare statement
        $statement = $this->dbconn->prepare("UPDATE request SET requeststatus=? WHERE request_id=?");

        //bind parameters
        $requeststatus = "approved";
        $statement->bind_param("si", $requeststatus, $request_id);

        //execute statement
        $statement->execute();

        if ($statement->affected_rows == 1) {

           # redirect to listclubs
            $msg = "Request was successfully approved!";
            header("Location: approved.php?m=$msg");
            exit;
        }else {

            # redirect to listclubs
            $msg = "Oops! Couldnt approve request";
            header("Location: listrequests.php?err=$msg");
            exit;
        }

    }


    //update request status approve ends 



    //update adoption status approve starts here

    public function updateadoptionstatus($fosterkid_id){



        //prepare statement
        $statement = $this->dbconn->prepare("UPDATE fosterkid SET adoptionstatus=? WHERE fosterkid_id=?");

        //bind parameters
        $adoptionstatus = "adopted";
        $statement->bind_param("si", $adoptionstatus, $fosterkid_id);

        //execute statement
        $statement->execute();

        if ($statement->affected_rows == 1) {

           # redirect to listclubs
            $msg = "Adoption successfull!";
            header("Location: listfosterkid.php?m=$msg");
            exit;
        }else {

            # redirect to listclubs
            $msg = "Oops! Couldnt update adoption status";
            header("Location: completed.php?err=$msg");
            exit;
        }

    }


    //update adoption status approve ends 
    


    //update request status  decline starts here

    public function updaterequeststatusdecline($request_id){

        // check if paystack amount correlates with portal amount


        //prepare statement
        $statement = $this->dbconn->prepare("UPDATE request SET requeststatus=? WHERE request_id=?");

        //bind parameters
        $requeststatus = "declined";
        $statement->bind_param("si", $requeststatus, $request_id);

        //execute statement
        $statement->execute();

        if ($statement->affected_rows == 1) {

           # redirect to listclubs
            $msg = "Request was successfully declined!";
            header("Location: declined.php?m=$msg");
            exit;
        }else {

            # redirect to listclubs
            $msg = "Oops! Couldnt decline request";
            header("Location: listrequests.php?err=$msg");
            exit;
        }

    }


    //update request status decline ends here


    //approved request method starts here

    function approvedrequest(){

        //prepare statement
        $statement = $this->dbconn->prepare("SELECT * FROM request LEFT JOIN fosterkid ON request.fosterkid_id = fosterkid.fosterkid_id WHERE requeststatus = 'approved' ORDER BY requestdate DESC;
        " );

        #execute
        $statement->execute();

        #get result
        $result = $statement->get_result();

        //fetch records
        $records = array();

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){

               $records[] = $row;
            }

          
        }
         return $records;

      }
      // approved  request method ends here

    

      //approved request method starts here
    
    function pendingrequest(){

        //prepare statement
        $statement = $this->dbconn->prepare("SELECT * FROM request LEFT JOIN fosterkid ON request.fosterkid_id = fosterkid.fosterkid_id WHERE requeststatus = 'pending' ORDER BY requestdate DESC;
        " );

        #execute
        $statement->execute();

        #get result
        $result = $statement->get_result();

        //fetch records
        $records = array();

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){

               $records[] = $row;
            }

          
        }
         return $records;

      }
      //pending request method ends here


      //declined request method starts here
    
    function declinedrequest(){

        //prepare statement
        $statement = $this->dbconn->prepare("SELECT * FROM request LEFT JOIN fosterkid ON request.fosterkid_id = fosterkid.fosterkid_id WHERE requeststatus = 'declined' ORDER BY requestdate DESC;
        " );

        #execute
        $statement->execute();

        #get result
        $result = $statement->get_result();

        //fetch records
        $records = array();

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){

               $records[] = $row;
            }

          
        }
         return $records;

      }
      //declined request method ends here


      //completed request method starts here
    
    function completedrequest(){

        //prepare statement
        $statement = $this->dbconn->prepare("SELECT * FROM request LEFT JOIN fosterkid ON request.fosterkid_id = fosterkid.fosterkid_id WHERE requeststatus = 'completed' ORDER BY requestdate DESC;
        " );

        #execute
        $statement->execute();

        #get result
        $result = $statement->get_result();


        //fetch records
        $records = array();

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){

               $records[] = $row;
            }

          
        }
         return $records;

      }
      //completed request method ends here


      //fetch birth parent method begins here

      function fetchbirthparent(){

        //prepare statement
        $statement = $this->dbconn->prepare("SELECT * FROM birthparent" );

        #execute
        $statement->execute();

        #get result
        $result = $statement->get_result();

        //fetch records
        $records = array();

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){

               $records[] = $row;
            }

          
        }
         return $records;

      }
      //fetch birth parent method ends here

       //fetch birth parent registered kids starts here

      function birthparentkids($parent_id){

        $statement = $this->dbconn->prepare("SELECT * FROM fosterkid LEFT JOIN request ON fosterkid.fosterkid_id = request.fosterkid_id WHERE parent_id=? ORDER BY requestdate DESC");

        //bibd parameters
        $statement->bind_param("i", $parent_id);
        
        #execute
        $statement->execute();

        //get result
        $result = $statement->get_result();

        //fetch records
        $records = array();

        if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {

                $records[] = $row;
              }
          
        }

        return $records;

      }
      //fetch foster parents requests start here 


      function fosterparentrequest($fosterparent_id){

        $statement = $this->dbconn->prepare("SELECT * FROM request LEFT JOIN fosterkid ON fosterkid.fosterkid_id = request.fosterkid_id WHERE fosterparent_id=? ORDER BY requestdate DESC");

        //bibd parameters
        $statement->bind_param("i", $fosterparent_id);
        
        #execute
        $statement->execute();

        //get result
        $result = $statement->get_result();

        //fetch records
        $records = array();

        if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {

                $records[] = $row;
              }
          
        }

        return $records;

      }
      //fetch birth parent registered kids ends here 


      //update request status completed starts here

    public function  updaterequeststatuscompleted($request_id){

      //prepare statement
        $statement = $this->dbconn->prepare("UPDATE request SET requeststatus=? WHERE request_id=?");

        //bind parameters
        $requeststatus = "completed";
        $statement->bind_param("si", $requeststatus, $request_id);

        //execute statement
        $statement->execute();

        if ($statement->affected_rows == 1) {

           # redirect to listclubs
            $msg = "Adoption process fully completed !";
            header("Location: completed.php?m=$msg");
            exit;
        }else {

            # redirect to listclubs
            $msg = "Oops! Couldnt complete request";
            header("Location: approved.php?err=$msg");
            exit;
        }
    }

    //update request status completed ends here


    //begin total foster parent request method

    public function totalfosterrequests($fosterparent_id){

      //prepare statement
      $statement = $this->dbconn->prepare("SELECT request_id FROM request WHERE fosterparent_id=?");

      //bind param
        $statement->bind_param("i", $fosterparent_id);

      //execute statement
      $statement->execute();

        //store result
      $statement->store_result();

      //return result
      return $statement->num_rows;

    }
    //end total request method

    
   #begin logout function 

     function logout(){

        session_start();
        session_destroy();

        #redirect to login
        header("Location: signin.php");
        exit();

         }

           #end logout function  
           
           
//begin admin logout function 

     function adminlogout(){

        session_start();
        session_destroy();

        #redirect to login
        header("Location: adminlogin.php");
        exit();

         }

           #end admin logout function  

}

?>