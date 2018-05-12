<?php 

    session_start();
    $sessionID = session_id(); 
    setcookie("session_id",$sessionID,time()+3600,"/","localhost",false,true);    
?>


<!DOCTYPE html>
<html>
<head>
<title> SSS Assignment 01 </title>
<meta charset="utf-8"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="config.js"> </script>

<script>
    function checkforblank(){

        if (document.getElementById('EMAIL').value=="") {
            alert('Please Enter Your Email..!!!');
        }

        else if (document.getElementById('PASS').value=="") {
            alert('Please Enter Your Password..!!!');
        }
    }
</script>

<style>
	body{
		background:#646161;
	}
	h2{
		color:#0BC6E4;
        margin-left: 20px;
		}
	
</style>

</head>
<body>

    <h2> Assignment 01-CSRF protection</h2>
</div> 

<div class="=container" style="margin-top:100px">
        <div class="row justify-content-center">
            <div class="col-md-6 col-md-offset-3" align="center">
                <img src="csrfn.jpg">
                <br><br>
                <form method="POST" action="server.php" onsubmit="checkforblank()">
                    
                    <input name="email" id="EMAIL" type="email" placeholder="Email" class="form-control">
                    <br>
                    <input name="password" id="PASS" type="password" placeholder="Password" class="form-control">
                    <br>
                     <div class="spacing"><input type="hidden" id="csToken" name="CSR"/></div>
                    <input type="submit" name="submit" value="Log In" class="btn btn-primary">

                </form> 
               </div>
            </div>
          </div>

    <?php 
        
       if(isset($_COOKIE['session_id']))
            { 
                echo '<script> var token = retrive("POST","server.php","csToken");  </script>'; 
            }
    ?>

</div>
</body>
</html>