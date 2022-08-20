

$(document).ready(function(){

//   birth parents functionalities

    $("#btnbirthparent").click(function(){

        var firstname = $("#firstname").val();
        var lastname = $("#lastname").val();
        var emailaddress = $("#email").val();
        var dateofbirth = $("#dateofbirth").val();
        var homeaddress = $("#homeaddress").val();
        var username = $("#username").val();
        var password = $("#password").val();
        var confirmpassword = $("#confirmpassword").val();
        var picture = $("#picture").val();
        var gender = $("#gender").val();
      //   var dnareport = $("#gender").val();
        var bloodgroup = $("#bloodgroup").val();
        var medicalchallenges = $("#medicalchallenges").val();

        var myresult1 = `
        
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fa-solid fa-triangle-exclamation"></i> Fill in all required entry fields.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        `;

        var myresult2 = `

         <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa-solid fa-circle-check"></i> Sign up successful.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        `;       
        
        

        if (firstname == "" || lastname == "") {
        $("#result").html(myresult1);
           
        }else if (emailaddress == "" || dateofbirth == "") {
            $("#result").html(myresult1);

        }else if (homeaddress == "" || username == "") {
             $("#result").html(myresult1);

        }else if (password == "" || confirmpassword == "") {
             $("#result").html(myresult1);
            
        }else if (picture == "" || gender == "") {
            $("#result").html(myresult1);

        }else if (dnareport == "" || bloodgroup == "") {
             $("#result").html(myresult1);

        }else if (medicalchallenges == "") {
            $("#result").html(myresult1);

        }else{

             $("#result").html(myresult2);
        }
    });


    $("#checkbox").click(function(){

	var mycheckbox = $(this).prop("checked");

	if (mycheckbox == true) {
   $("#btnbirthparent").prop("disabled", false);

	}else{
	$("#btnbirthparent").prop("disabled", true);
	
   }

	});


    // Adoptive parents functionalities

    $("#btnadoptiveparent").click(function(){

        
      var adfirstname = $("#adfirstname").val();
      var adlastname = $("#adlastname").val();
      var ademailaddress = $("#ademailaddress").val();
      var addateofbirth = $("#addateofbirth").val();
      var adhomeaddress = $("#adhomeaddress").val();
      var adusername = $("#adusername").val();
      var adpassword = $("#adpassword").val();
      var adconfirmpassowrd = $("#adconfirmpassword").val();
      var adresidency = $("#adresidency").val();
      var adfinancialrecord = $("#adfinancialrecord").val();
      var adprofession = $("#adprofession").val();
      var adincome = $("#adincome").val();
      var admaritalstatus = $("#admaritalstatus").val();
      var adcertificate = $("#adcertificate").val();
      
       
      var myadresult = `
        
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
     <i class="fa-solid fa-triangle-exclamation"></i> Fill in all required entry fields.
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
     `;

     var myadresult1 = `

         <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa-solid fa-circle-check"></i> Sign up successful.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        `;     

     if (adfirstname == "" || adlastname == "") {
        $("#adresult").html(myadresult);

     }else if (ademailaddress == "" || addateofbirth == "") {
         $("#adresult").html(myadresult);
        
     }else if (adhomeaddress == "" || adusername == "") {
        $("#adresult").html(myadresult);

     }else if (adpassword == "" || adconfirmpassowrd == "") {
        $("#adresult").html(myadresult);

     }else if (adresidency == "" || adfinancialrecord == "" ) {
        $("#adresult").html(myadresult);

     }else if (adprofession == "" || adincome == "") {
        $("#adresult").html(myadresult);

     }else if (admaritalstatus == "" || adcertificate == "") {
        $("#adresult").html(myadresult);

     }else{
        $("#adresult").html(myadresult1);
     }


    });

    $("#adcheckbox").click(function(){

	var myadcheckbox = $(this).prop("checked");

	if (myadcheckbox == true) {
   $("#btnadoptiveparent").prop("disabled", false);

	}else{
	$("#btnadoptiveparent").prop("disabled", true);
	
   }

	});


    // foster kid functionalities

    $("#btnfosterkid").click(function(){

    
        var fkfirstname = $("#fkfirstname").val();
        var fklastname = $("#fklastname").val();
        var fkemailaddress = $("#fkemailaddress").val();
        var fkdateofbirth = $("#fkdateofbirth").val();
        var fkgender = $("#fkgender").val();
        var fkhobbies = $("#fkhobbies").val();
        var fkpicture = $("#fkpicture").val();
        var fkbloodgroup = $("#fkbloodgroup").val();
        var fkdnareport = $("#fkdnareport").val();
        var fkallergies = $("#fkallergies").val();
        var fkmedicalchallenges = $("#fkmedicalchallenges").val();

        var myfkresult = `
        
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
     <i class="fa-solid fa-triangle-exclamation"></i> Fill in all required entry fields.
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
     `;

     var myfkresult1 = `

         <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa-solid fa-circle-check"></i> Sign up successful.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        `;    

     if (fkfirstname == "" || fklastname == "") {
        $("#fkresult").html(myfkresult);

     }else if (fkemailaddress == "" || fkdateofbirth == "") {
         $("#fkresult").html(myfkresult);

     }else if (fkgender == "" || fkhobbies == "") {
        $("#fkresult").html(myfkresult);

     }else if (fkbloodgroup == "" || fkdnareport == "") {
        $("#fkresult").html(myfkresult);

     }else if (fkallergies == "") {
        $("#fkresult").html(myfkresult);

     }else if (fkmedicalchallenges == "") {
        $("#fkresult").html(myfkresult);

     }else{
        $("#fkresult").html(myfkresult1);

     }

     });


     $("#fkcheckbox").click(function(){

	var myfkcheckbox = $(this).prop("checked");

	if (myfkcheckbox == true) {
   $("#btnfosterkid").prop("disabled", false);

	}else{
	$("#btnfosterkid").prop("disabled", true);
	
   }

	});

    // Sign in form 

    $("#signinbtn").click(function(){

        
        var loginemail = $("#lgemail").val();
        var lgpassword = $("#lgpassword").val();

        var myloginresult = `
        
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
     <i class="fa-solid fa-triangle-exclamation"></i> Fill in all required entry fields.
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
     `;

   //   var myloginresult1 = `

   //       <div class="alert alert-success alert-dismissible fade show" role="alert">
   //      <i class="fa-solid fa-circle-check"></i> Login successful.
   //      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   //      </div>
   //      `; 

     if (loginemail == "" || lgpassword == "" ) {
      //   $("#loginresult").html(myloginresult);

     }else{
         // $("#loginresult").html(myloginresult1);
     }

    });



    //Donation functionalities

    

});


$(document).ready(function(){

$("#btndonate").click(function(event){


      var firstname = $("#firstname").val();
      var lastname = $("#lastname").val();
      var email = $("#email").val();
      var amount = $("#amount").val();

      var donateresult = `
        
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
     <i class="fa-solid fa-triangle-exclamation"></i> Please fill in all required entry fields.
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
     `;

      if (firstname == "" || lastname == "" || email == "" || amount == "") {

         event.preventDefault();
        $("#donateresult").html(donateresult);

     }

    });

});




setInterval(() => {

   (function($){
    "user strict";

    // Facts counter
    $('[data-toggle="counter-up"]').counterUp({
        delay: 5,
        time: 1000
        
    });


})(jQuery);

   
}, 5000);


 