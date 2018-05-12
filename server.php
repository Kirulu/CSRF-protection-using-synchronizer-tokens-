<?php

//start session - server
session_start();

//create key for CSRF token
if(empty($_SESSION['key']))
{
    $_SESSION['key']=bin2hex(random_bytes(32));
    
}

//generate CSRF token
$token = hash_hmac('sha256',"This is token:index.php",$_SESSION['key']);

$_SESSION['CSRF'] = $token; //store CSRF token in session variable

ob_start(); // start of outer buffer function

echo $token;

$errors=array();

if(isset($_POST['submit']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    ob_end_clean(); //clean previous displayed echoed  --End of Outer Buffer--


        if(empty($email)) {
            array_push($errors, "Password is required");
             header("Location:index.php");

            

        }


        else if(empty($password)) {
            array_push($errors, "Password is required");
             header("Location:index.php");
            
        }


    
    if(count($errors) == 0) {
    //validate the logins
    validate_login($_POST['CSR'],$_COOKIE['session_id'],$_POST['email'],$_POST['password']);
    }

}


//function to validate Login
function validate_login($user_CSRF,$user_sessionID, $email, $password)
{
    if($email=="user@gmail.com" && $password=="user" && $user_CSRF==$_SESSION['CSRF'] && $user_sessionID==session_id())
    {
         header("Location:sucess.html");
    }
    else
    {
         header("Location:failed.html");
        
    }
}

?>