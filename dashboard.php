<?php 
ob_start();
session_start();

    include("config/function.php");
	
	
		
    $email_check = $_SESSION['login_email'];
    $sql = "SELECT * FROM user WHERE email='".$email_check."'";
    $query = main_query($sql);

    $row = mysqli_fetch_assoc($query);
    $login_session = $row['email'];
    $username = $row['username'];


    if(!isset($login_session)){

            // Redirect To Home Page 
            header("Location: ");
    }

?>
<html>
    <head>
        <title><?= $username?> Dashboard | Team Winterfell</title>
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
                
                <div class="col-md-12" style="margin-top: 1%;">
                   
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <ul class="nav nav-pills">
                                <li><a href="logout">Logout</a></li>
                          </ul>
                        </div>
                        <div class="panel-body">
                          Team Winterfell welcomes you <b><?= $username ?></b> here
                        </div>
                      </div>
                    
                </div>
             
            </div>


        </div>

    </body>
</html>
