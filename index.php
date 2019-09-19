<?php 

    include("config/function.php");

    //--------------------------------------------------//
	session_start();
	
	$error = "";
        $success = "";
	
	if(isset($_POST['login'])){
		
		$email = $_POST['txtEmail'];
		$password = $_POST['txtPassword'];
		
		if(empty($email) || empty($password)){
                    $error = "<script>"
                        ."$(document).ready(function(){ toastr.error('Email or Password field', 'Ooooops!')})"
                        . "</script>";
		}else{
		 
		// To protect MySQL injection for Security purpose
		$email = stripslashes($email);
		$password = stripslashes($password);
		//$username = mysqli_real_escape_string($conn, $username);
		//$password = mysqli_real_escape_string($conn, $password);
		
		$sql = "SELECT * FROM user WHERE email = '".$email."' AND password = '".md5($password)."'";
		$query = main_query($sql);
		$rows = mysqli_num_rows($query);
		
			if($rows === 1){
                            $_SESSION['login_email'] = $email;
                            $success =  "<script>"
                                    ."$(document).ready(function(){ toastr.success('Authentication successful', 'Success!')})"
                                    . "</script>";
                            header('Refresh: 2; url=dashboard');
					
			}else{
                                $error =  "<script>"
                                ."$(document).ready(function(){ toastr.error('Authentication Fail, Try again', 'Ooooops!')})"
                                . "</script>";
                            }
		
		}
	}

        // -------------------------------------------------------------//
	
        if(isset($_SESSION['login_email'])){
                header("Location: dashboard");
        }

        // -------------------------------------------------------------//

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Team Winterfell | Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        
        <link rel="stylesheet" href="assets/fontawesome/css/fontawesome.css">
        <link rel="stylesheet" href="assets/fontawesome/css/solid.css">
        <link rel="stylesheet" href="assets/fontawesome/css/brands.css">
        
        <script src="assets/js/jquery.js"></script>
        <script src="assets/toast/toastr.min.js"></script>
        <link rel="stylesheet" href="assets/toast/toastr.min.css">
        <script src="assets/js/bootstrap.min.js"></script>

    </head>
    <style>
        body {
            background-image: linear-gradient(to right, rgba(156, 156, 156, 0.1), #414A48);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
            font-size: 16px;
            color:black;
            font-family:sans-serif;
            font-weight: 300;


        }
        #login-box
        {
            position: relative;
            margin: 5% auto; 
            height: 510px;
            width: 800px;

            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.6);
            border-top-right-radius: 50px;
            border-bottom-right-radius: 50px;
            background: rgba(255, 255, 255,.25);
            box-shadow: 0 5px 15px rgba(0,0,0,.5);


        }
        .left-box{
            position: absolute;
            top: 0;
            left: 0;
            box-sizing: border-box;
            padding: 40px;
            width: 300px;
            height: 510px;

            background: url(rec.png);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        h1{
            margin: 0 0 20px;
            font-weight: 300;
            font-size: 28px;
            margin-left: 35px;
        }
       
        input[type="submit"]
        {
            margin-bottom: 28px;
            width: 120px;
            height: 32px;
            border: none;
            border-radius: 8px;
            background-color: black;
            color: white;
            font-family: sans-serif;
            font-weight: 500;
            text-transform: uppercase;
            transition: 0.2s ease;
            cursor: pointer;
            margin-left: 30px;
        }
        .right-box{
            position: absolute;
            top: 0;
            right:0;
            padding: 40px;
            width: 500px;
            height: 510px;
            /*margin-right: 80px;*/
            background: #fdf7f7;
            border-top-right-radius: 50px;
            border-bottom-right-radius: 50px;
        }
        .or{
            position: absolute;
            top: 200px;
            left: 278px;
            width: 40px;
            height: 40px;
            background: black;
            color: white;
            text-align: center;
            padding-top: 7px;
            border-radius: 5px;

        }




    </style>
    
    <body>

        <div id="login-box">
            
            <div class="left-box"></div>

            <div class="right-box">
                
                <div class="col-md-10 col-md-offset-1" style="margin-top: 15%;">
                    <h1 style="font-weight: bold;  margin-left: -2px;">Login</h1>
                    
                    <?php 
                        echo $error;
                        echo $success;
                    ?>
                    
                    <form role="form" action="" method="POST" style="margin-top: 10%;">
                       
                        <div class="form-group">
                            <div class="input-group input-group-md">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input type="email" name="txtEmail" class="form-control" placeholder="Email Address">
                              </div>
                        </div>
                       
                        <div class="form-group">
                            <div class="input-group input-group-md">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" name="txtPassword" class="form-control" placeholder="Password">
                              </div>
                        </div>
                        <!--<input type="submit" class="logbtn"  value="Login">-->
                        <button name="login" style="background: black; color: #fff;" type="submit" class="btn btn-default">Login</button>
                    </form>
                    <p style="margin-top: 5%; font-size: 14px;">Don't have a Account? <a href="signup">Signup</a></p>
                </div>
             
            </div>


        </div>



    </body>
</html>
