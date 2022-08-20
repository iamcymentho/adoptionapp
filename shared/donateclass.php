<?php

//importing constants
include_once("constants.php");
include_once('common.php');

//class definition
class Donate{


    //member variables
    public $firstname;
    public $lastname;
    public $amount;
    public $email;
    public $conn; // database connector / handler

    //member methods

    public function __construct(){

         //open DB connection
         $this->conn = new MYSQLi(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASENAME);

         //check if connected
         if ($this->conn->connect_error) {
            die("Fail to connect ".$this->conn->connect_error);
         }
    }


    

    //begin insertdetails method

    public function insertDetails($firstname, $lastname , $email, $amount, $reference){

        //prepare statement
        $statement = $this->conn->prepare("INSERT INTO donation(firstname, lastname, email, amount, reference) VALUES(?,?,?,?,?)");

        //bind parameters
        
        $statement->bind_param("sssds", $firstname, $lastname , $email, $amount, $reference);

        //execute statement
        $statement->execute();

        if ($statement->affected_rows == 1) {
           return true;
        }else {
            return false;
        }

    }
    //end insert details method


    //begin initialize paystack transaction

    public function initializePaystackTransaction($email, $amount, $ref){

        

            //documentation url for initialization of payment
        $url = "https://api.paystack.co/transaction/initialize";

            // call back self created url for  second validation 
        $callbackurl ="http://localhost/adoptme/paystack_callback.php";

            //secrete key from paystack documemtation
        $key = "sk_test_d19a33d19b1f3b30ba6b67041a07390fec058d22";

        $fields = array(

            'email' => $email,
            'amount' => $amount * 100,
            'callback_url' => $callbackurl,
            'reference' => $ref

        );

            //converting to string from associative array
        $strfields = http_build_query($fields);

        //STEP 1 - open connection / curl session
        $ch = curl_init();

        //STEP 2 - set curl options
        curl_setopt($ch, CURLOPT_URL, $url); // initialization payment url
        curl_setopt($ch, CURLOPT_POST, true); // method of sending data , which is POST method
        curl_setopt($ch, CURLOPT_POSTFIELDS, $strfields); // data being sent through POST fields
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // dont print result to the screen . Return response as string
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // do not verify SSL
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(


            "Authorization: Bearer $key",
            "Cache-Control: no-cache"
        )); 
        

        //STEP 3 - execute curl
        $response = curl_exec($ch);
        if (curl_error($ch)) {
            die("Error: ".curl_error($ch));
        }

        //STEP 4 - close connection / curl session
        curl_close($ch);

        //STEP 5 - convert JSON record to array
        $result = json_decode($response, true);

        return $result;

    }
    //end initialize paystack transaction

    


    //begin verify paystack transaction

    public function verifyPaystackTransaction($ref){

                //verify payment url from paystack documentation
        $url="https://api.paystack.co/transaction/verify/$ref";

         //secrete key from paystack documemtation
        $key = "sk_test_d19a33d19b1f3b30ba6b67041a07390fec058d22";

        // STEP 1 - open connection
        $ch = curl_init();

        // STEP 2 - set curl options
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(

            "Authorization: Bearer $key"
        ));

        // STEP 3 - execute curl
        $response = curl_exec($ch);

        if (curl_error($ch)) {

            die("Oops!".curl_error($ch));
        }

        // STEP 4 - close curl session
        curl_close($ch);

        // STEP 5 - convert JSON response to 
        $result = json_decode($response);

        return $result;
        
    }



    //list donations method begins here

      function listdonation(){

        //prepare statement
        $statement = $this->conn->prepare("SELECT * FROM donation ORDER BY datepaid DESC" );

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
      //list donation method ends here



      //begin total request method

    public function totaldonation(){

      //prepare statement
      $statement = $this->conn->prepare("SELECT donation_id FROM donation");

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

   
}


?>