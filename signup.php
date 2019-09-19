<?php 
    include("config/function.php");
    
    // -------------------------------------------------------------//
	// Including the script for registering a user
	
	$error = array();
	$success = "";
		
        if(isset($_POST['signup'])){
            
            $username = $_POST['txtUsername'];
            $email = $_POST['txtEmail'];
            $password = $_POST['txtPassword'];
            $con_password = $_POST['txtConPassword'];
            
            if(!empty($username) && !empty($email) && !empty($password) && !empty($con_password)){
                
                //Then Check if a email already exists
                $sql_email = main_query("SELECT * FROM user WHERE email='".$email."'");
                $row_email = mysqli_num_rows($sql_email);
                if($row_email === 1){
                    $error[] = 'Email Already Exists.';
                }
                else{
                    
                    // Then insert user data into the database
                    $sql = main_query("
                                        INSERT INTO user(username,email,password)
                                        VALUES(
                                                '".$username."',
                                                '".$email."',
                                                '".md5($password)."'
                                        )
                                        ");
                    if($sql){
                            $success = '<div class="alert alert-success" style="font-size: 13px;">
                                            <strong>&#10004; Success &nbsp; </strong>Registration Successfully.<a href="./">Login</a>
                                          </div>';
                    }
                }
                
                
            }else{
                $error[] = 'All fields are required.';
            }
			
        }
	
// -------------------------------------------------------------//
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Signup | Team Winterfell</title>
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
            min-height: 100vh;


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
                
                <div class="col-md-10 col-xs-10 col-md-offset-1" style="margin-top: 15%;">
                    <h1 style="font-weight: bold;  margin-left: -2px;">Signup</h1>
                    
                    <?php 
							
                        foreach($error as $errors){
                           echo "<script>"
                            ."$(document).ready(function(){ toastr.error('$errors', 'Ooooops!')})"
                            . "</script>";
                        }

                        echo $success;

                    ?>
                    
                    <form role="form" action="" method="POST" style="margin-top: 10%;">
                       
                        <div class="form-group">
                            <div class="input-group input-group-md">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input maxlength="5" type="text"  name="txtUsername" class="form-control" placeholder="Username" required="">
                              </div>
                        </div>
                       
                        <div class="form-group">
                            <div class="input-group input-group-md">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input type="email" name="txtEmail" class="form-control" placeholder="Email Address" required="">
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <div class="input-group input-group-md" id="txtPassDiv">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" id="txtPass" name="txtPassword" class="form-control" placeholder="Password" required="">
                              </div>
                        </div>
                       
                        <div class="form-group">
                            <div class="input-group input-group-md" id="txtPassDiv2">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input onkeyup="confirmPass()" type="password" id="txtPass2" name="txtConPassword" class="form-control" placeholder="Confirm Password" required="">
<!--                                <label id="message" class="control-label" for="inputSuccess1" style="font-size: 12px; display: none;"></label>-->
                                <!--<p for="inputSuccess1s" id="message" class="help-block" >Example block-level help text here.</p>-->
                            </div>
                                <label id="message" class="control-label" for="inputSuccess1" style="font-size: 12px; display: none;"></label>
                        </div>
                        <button name="signup" style="background: black; color: #fff;" type="submit" class="btn btn-default">Create Account</button>
                    </form>
                    <p style="margin-top: 5%; font-size: 14px;">Already have an Account? <a href="./">Login</a></p>
                </div>
            


            </div>


        </div>



    </body>
</html>


<script>
    function confirmPass(){
        var pass  = document.getElementById("txtPass").value;
        var pass2  = document.getElementById("txtPass2").value;
        var pass_div = document.getElementById("txtPassDiv");
        var pass_div2 = document.getElementById("txtPassDiv2");
        
        if(pass2 != pass){
            // Password Match
            //----------- Add class name has-error to the DIV 
            document.getElementById('txtPassDiv').classList.add('has-error');
            document.getElementById('txtPassDiv2').classList.add('has-error');
            //----------- Remove class name has-succes from the DIV
            document.getElementById('txtPassDiv').classList.add('has-success');
            document.getElementById('txtPassDiv2').classList.add('has-success');
            
            document.getElementById("message").style.display = "block";
            document.getElementById("message").style.color = "#a94442";
            document.getElementById("message").innerHTML = "Password Mis-Match";
        }else if(pass2 == pass){
            // Password Match
            //----------- Add class name has-success to the DIV
            document.getElementById('txtPassDiv').classList.add('has-success');
            document.getElementById('txtPassDiv2').classList.add('has-success');
            //----------- Remove clss name has-error from the DIV
            document.getElementById('txtPassDiv').classList.remove('has-error');
            document.getElementById('txtPassDiv2').classList.remove('has-error');
            
            document.getElementById("message").style.display = "block";
            document.getElementById("message").style.color = "green";
            document.getElementById("message").innerHTML = "Password Match";
        }
        
    }
</script>
