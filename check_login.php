<?php
	session_start();
	$dbServerName = "localhost:3306"; // ip address (hostname -I)
	$dbUsername = "myuser"; // username
	$dbPassword = "root1234"; // db pass
	$dbName = "mydatabase"; // your database to connect

	$con = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName) or die("Error ! : " . mysqli_error($con));

	$username = $_POST['txtUsername'];
	$password = $_POST['txtPassword'];

	$strSQL="SELECT * FROM member 
                  WHERE  Username='".$username."' 
                  AND  Password='".$password."' ";

	$objQuery = $conn->query($strSQL);
	$objResult =$objQuery->fetch_assoc();
	if(!$objResult)
	{
			echo "Username and Password Incorrect!";
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