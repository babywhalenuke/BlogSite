
//hookup the form submit button to a validate function
$(document).ready(function(){
    $('input[type="submit"]').on("click",validate);
});

//perform validate logic on form
function validate(event){
    //prevent the form from submitting
    event.preventDefault();
    //remove old error messages    
    removeErrors();
    
    var isError = false;
    
    var bio = $("#bio").val();
    bio = strip(bio);

    if(bio.length < 1){
        var bioError = "Bio must be entered.";
        report("bioerror",bioError);
        isError=true;
    }

 
    
    var email = $("#email").val(); 
    if(!validateEmail(email)){  
        var emailError = "Please Enter valid email.";
        report("emailerror",emailError);
        isError=true;
    }
    
    var username = $("#username").val();
    if(username.length < 1){
        var usernameError = "Username must be entered.";
        report("usernameerror",usernameError);
        isError=true;
    }
    
        
    var password = $("#password").val();
    var verify = $("#verify").val();
    var checkpw = checkPassword(password);
    
    if(verify != password || password.length === 0){
        var passwordError = "Passwords do not match. Please Enter password";
        report("passworderror",passwordError);
        isError=true;
    }
    if(!checkpw){
        var pwStrength = "Please ensure your password has at least 6 characters, 1 uppercase and 1 special character.";
        report("passworderror",pwStrength);
    }

    
    //submit form if data is good
    if(!isError){
        $("#signup-form").submit();
    }

}
//update form.php to display error message
function report(id,msg){
    $("#"+id).html(msg);
    $("#"+id).parent().show();      
}

//clear previous errors
function removeErrors(){
    $("#usernameerror").parent().hide();
    $("#emailerror").parent().hide();
    $("#passworderror").parent().hide();
    $("#bioerror").parent().hide();

}

    function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function checkPassword(inputtxt) {   
    var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
    return re.test(inputtxt);
}

function strip(html)
{
   var tmp = document.createElement("DIV");
   tmp.innerHTML = html;
   return tmp.textContent || tmp.innerText || "";
}
