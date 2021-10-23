<?php
	session_start();
	include("dbcon.php");
	$username = $_POST['txtUsername'];
	$password = $_POST['txtPassword'];

	$strSQL="SELECT * FROM member 
                  WHERE  Username='".$username."' 
                  AND  Password='".$password."' ";

	$objQuery = $conn->query($strSQL);
	$objResult =$objQuery->fetch_assoc();
	if(!$objResult)
	{
			echo '
			<div class="bg"> </div>
				<div class="container" id="app">
				<div class="row justify-content-center align-items-center vh-100">
					<div class="col-md-6">
					<div class="card py-3 p-lg-5 shadow">
						<div class="card-title">
						<img src="assets/images/panda-pixel.png" width="300px" class="img-fluid d-block mx-auto" alt="logo">
						</div>
						<div class="card-body">
								<h6 class="text-danger text-center">Oops! Looks like you have entered the wrong username of password. Please check your login details and try again.</h6>
									<form name="form1" method="post" action="login.php">
									<br>
									<center>
									<button class="btn btn-primary">Login Page </button>
									</center>
								</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			';
	}
	else
	{
			$_SESSION["UserID"] = $objResult["UserID"];
			$_SESSION["Status"] = $objResult["Status"];

			session_write_close();
			
			if($objResult["Status"] == "ADMIN")
			{
				header("location:admin_page.php");
			}
			else
			{
				header("location:user_page.php");
			}
	}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
</html>