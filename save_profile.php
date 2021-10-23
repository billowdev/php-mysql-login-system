<?php
	session_start();
	include "dbcon.php";
	if($_SESSION['UserID'] == "")
	{
		echo "Please Login!";
		exit();
	}
	
	if($_POST["txtPassword"] != $_POST["txtConPassword"])
	{
		echo "Password not Match!";
		exit();
	}
	$strSQL = "UPDATE member SET Password = '".trim($_POST['txtPassword'])."' 
	,Name = '".trim($_POST['txtName'])."' WHERE UserID = '".$_SESSION["UserID"]."' ";
	
	$objQuery = $conn->query($strSQL);

			
	
	if($_SESSION["Status"] == "ADMIN")
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
							<h1 class="text-center">Go to Admin Page</h1>
						<form name="form1" method="post" action="admin_page.php">
								<br>
								<center>
								<button class="btn btn-primary"> Admin Page </button>
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
							<h1 class="text-center">Go to User Page</h1>
						<form name="form1" method="post" action="user_page.php">
								<br>
								<center>
								<button class="btn btn-primary"> User Page </button>
								</center>

							</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		';
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Save Completed</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
	<h1>
		"Save Completed!<br>
	</h1>
</body>
</html>