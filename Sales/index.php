<?php
				session_start();
				if(isset($_POST['login'])){
					$connection = mysqli_connect("localhost","root","");
					$db = mysqli_select_db($connection,"crm");
					$query = "select * from sales where sales_email = '$_POST[sales_email]'";
					$query_run = mysqli_query($connection,$query);
					while($row = mysqli_fetch_assoc($query_run)){
						if($row['sales_email'] == $_POST['sales_email']){
							if($row['sales_password'] == $_POST['sales_password']){
                                $_SESSION['sales_id'] = $row['sales_id'];
								$_SESSION['sales_name'] = $row['sales_name'];
								$_SESSION['sales_email'] = $row['sales_email'];
								header("Location:sales_dashboard.php");
							}
							else{
								?>
								<br><br><center><span class="alert-danger">Wrong Password</span></center>
								<?php
							}
						}
					}
				}
			?>


<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sales Login Form </title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
        <style>
                .form-group input{
                padding: 1em 1em 0.9em 3em;
                color: #999;
                  font-size: 17px;
                outline: none;
                font-weight: 400;
                 border: 1px solid #fff;
                margin: 0.8em 0;
                background: url(assets/images/mail.png)no-repeat 10px 16px #fff;
            }
            .btn1{
                font-size: 1em;
                font-weight: 400;
                color: #fff;
                cursor: pointer;
                outline: none;
                padding: 0.8em 4em;
                border: none;
                background: #BA3627;
                font-family: 'Raleway', sans-serif;
                margin-left: 179px;
                margin-top: 17px;
            }
            .btn1:hover{
                color:#fff;
            }
</style>
    </head>

    <body>
    <nav class="navbar navbar-expand-lg" style="color:#fff;  background: #eb5242;">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php" style="color:#fff; ">CRM System(CRM)</a>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<li class="nav-item">
					<a class="nav-link" href="../index.php" style="color:#fff; ">Admin Login</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="index.php" style="color:#fff; ">Sales Login</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../Production/index.php" style="color:#fff; ">Production Login</a>
				</li>
                <li class="nav-item">
					<a class="nav-link" href="../Employee-Panel/index.php" style="color:#fff; ">Employee Login</a>
				</li>
			</ul>
		</div>
	</nav><br>
        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>Sales</strong> Login Form</h1>
                            <div class="description">
    
                            	</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Login to our Sales Panel</h3>
                            		<p>Enter your Email and password to log on:</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-lock"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
                            <form action="" method="post" class="fr">
				                <div class="form-group">
					
					                <input type="text" name="sales_email" class="form-control" placeholder="sales ID" required>
				                </div>
				                <div class="form-group">
				
					                <input type="password" name="sales_password" class="form-control" placeholder="Enter Your Password" required>
				                </div>
				                <button type="submit" name="login" class="btn btn1">Login</button>
			                </form>
		                    </div>
                        </div>
                    </div>
 
                </div>
            </div>
            
        </div>
       


        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>