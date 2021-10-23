# php-mysql-login-system
PHP MySQL reference : thaicreate



## ลง Ubuntu ใน VMware
- https://youtu.be/P9_TxAYZ20E

## ทดลองเซิร์ฟเวอร์ กับระบบล็อคอิน  phpmyadmin - mysql ใน ubunt userver
- https://youtu.be/OFN-RVQfcuQ

### vmware ubuntu linux server
```
cd /var/www/html;
git clone https://github.com/lacakp/php-mysql-login-system.git; 
mv -v ./php-mysql-login-system/* ./ ; 
rm -r php-mysql-login-system;
```
### vmware centos8
```
git clone https://github.com/lacakp/php-mysql-login-system.git; 
mv -f ./php-mysql-login-system/* ./ ;
rm -f -r php-mysql-login-system;
```

```
nano dbcon.php
```

reference : connect database and query

https://www.codexworld.com/connect-access-remote-mysql-database-cpanel-php/

### Ip ใน dbcon.php
<pre>
mysql default : localhost:3306
หรือ
ถ้าใครไม่ได้ให้ลองใช้ ip ที่ได้จาก hostname -I
คือ
192.168.xx.xxx
</pre>

## dbcon.php
```
<!-- dbcon.php -->
<?php
$dbServerName = "localhost"; // ip address (hostname -I)
	$dbUsername = "myuser"; // username
	$dbPassword = "root1234"; // db pass
	$dbName = "mydatabase"; // your database to connect

	$conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName) or die("Connection failed: " . $conn->connect_error);

?>
```

## login.php
```
<!-- login.php -->

<?php session_start();?>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kanit" >
    <link rel="stylesheet" href="assets/css/style.css">
    <title>codetopanda</title>
	<style>
      form { 
      margin: 0 auto; 
      width:250px;
      }
  </style>
</head>
<div class="bg"> </div>
<div class="container" id="app">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-md-6">
            <div class="card py-3 p-lg-5 shadow">
                <div class="card-title">
                    <img src="/assets/images/panda.gif" width="300px" class="img-fluid d-block mx-auto" alt="logo">
                </div>
                <div class="card-body">
                    <form name="formlogin" action="check_login.php" method="POST" id="login">
                      <div class="d-grid mb-3" style="position: relative;">
                        <h4 class="text-align-center"> Sign In </h4>
                      </div>

                        <div class="row mb-3">
                            <div class="col-sm-12">
                              <input type="text"  name="txtUsername" class="form-control" required placeholder="กรอกชื่อผู้ใช้" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <!-- <label for="txtPassword" class="col-sm-3" col-form-label>รหัสผ่าน</label> -->
                            <div class="col-sm-12">
                              <input type="password" name="txtPassword" class="form-control" required placeholder="กรอกรหัสผ่าน" />
                            </div>
                        </div>
                        <div class="d-grid mb-3">
                            <button class="btn btn-primary"> เข้าสู่ระบบ </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="bg-dark text-center text-white">
  <!-- Grid container -->
  <div class="container p-4">
    <!-- Section: Social media -->
    <section class="mb-4">
      <!-- Facebook -->
      <a class="btn btn-outline-light btn-floating m-1" href="https://web.facebook.com/Lacakp" role="button"
        ><i class="fab fa-facebook-f"></i
      ></a>
      <!-- Linkedin -->
      <!-- <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-linkedin-in"></i
      ></a> -->

      <!-- Github -->
      <a class="btn btn-outline-light btn-floating m-1" href="https://github.com/lacakp" role="button"
        ><i class="fab fa-github"></i
      ></a>
    </section>
      <div class="text-center p-3 site">
    © 2021 All Rights Reserved by
    <a class="text-white" href="https://github.com/lacakp">lacakp</a>
    <!-- Section: Social media -->
  </div>
  <!-- Grid container -->

</footer>
<!-- Footer -->

```

## check_login.php
```
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
```

## admin_page.php
```
<?php
	
	session_start();
	include "dbcon.php";
	if($_SESSION['UserID'] == "")
	{
		echo "Please Login!";
		exit();
	}

	if($_SESSION['Status'] != "ADMIN")
	{
		echo "This page for Admin only!";
		exit();
	}	
	

	$strSQL = "SELECT * FROM member WHERE UserID = '".$_SESSION['UserID']."' ";
	$objQuery = $conn->query($strSQL);
	$objResult =$objQuery->fetch_assoc();

?>

<html>
<head>
<title>codetopanda</title>
<link rel="stylesheet" href="assets/css/welcome.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
<header>
<div class="container-fluid welcome-page" id="home">
    <div class="jumbotron">
   <h1>Welcome to Admin Page!</h1> <br>
      <h1>
     <?php echo $objResult["Username"];?>
      </h1>
      <p>
        <h2><?php echo $objResult["Name"];?></h2>
      </p>
      <br>
      <ul>
        <li class="mb-3">
        <form action="/edit_profile.php" method="get">
          <button type="submit" class="btn btn-primary"> แก้ไขโปรไฟล์ </button>
        </form>
        </li>
        <li class="mb-3">
        <form action="/logout.php" method="get">
          <button type="submit" formaction="/logout.php" class="btn btn-danger"> ออกจากระบบ </button>
        </form>
        </li>
      </ul>
    </div>
  </div>
  </header>


<footer class="bg-dark text-center text-white">
  <!-- Grid container -->
  <div class="container p-4">
    <!-- Section: Social media -->
    <section class="mb-4">
      <!-- Facebook -->
      <a class="btn btn-outline-light btn-floating m-1" href="https://web.facebook.com/Lacakp" role="button"
        ><i class="fab fa-facebook-f"></i
      ></a>
      <!-- Linkedin -->
      <!-- <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-linkedin-in"></i
      ></a> -->

      <!-- Github -->
      <a class="btn btn-outline-light btn-floating m-1" href="https://github.com/lacakp" role="button"
        ><i class="fab fa-github"></i
      ></a>
    </section>
      <div class="text-center p-3 site">
    © 2021 All Rights Reserved by
    <a class="text-white" href="https://github.com/lacakp">lacakp</a>
    <!-- Section: Social media -->
  </div>
  <!-- Grid container -->

</footer>
<!-- Footer -->
</body>
</html>



```

## user_page.php
```
<?php
	session_start();
	include "dbcon.php";
	if($_SESSION['UserID'] == "")
	{
		echo "Please Login!";
		exit();
	}

	if($_SESSION['Status'] != "USER")
	{
		echo "This page for User only!";
		exit();
	}	


	$strSQL = "SELECT * FROM member WHERE UserID = '".$_SESSION['UserID']."' ";

	$objQuery = $conn->query($strSQL);
	$objResult =$objQuery->fetch_assoc();
  
?>
<html>
<head>
<title>codetopanda</title>
<link rel="stylesheet" href="assets/css/welcome.css">
<link rel="stylesheet" href="assets/css/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>


</head>
<body class="d-flex flex-column min-vh-100">
<header>
<div class="container-fluid welcome-page" id="home">
    <div class="jumbotron">
    <h1>Welcome to User Page!</h1> <br>
      <h1>
     <?php echo $objResult["Username"];?>
      </h1>
      <p>
        <h2><?php echo $objResult["Name"];?></h2>
      </p>
      <br>

      <ul>
        <li class="mb-3">
        <form action="/edit_profile.php" method="get">
          <button type="submit" class="btn btn-primary"> แก้ไขโปรไฟล์ </button>
        </form>
        </li>
        <li class="mb-3">
        <form action="/logout.php" method="get">
          <button type="submit" formaction="/logout.php" class="btn btn-danger"> ออกจากระบบ </button>
        </form>
        </li>
      </ul>
    </div>
  </div>

  </header>


<footer class="bg-dark text-center text-white ">
  <!-- Grid container -->
  <div class="container p-4">
    <!-- Section: Social media -->
    <section class="mb-4">
      <!-- Facebook -->
      <a class="btn btn-outline-light btn-floating m-1" href="https://web.facebook.com/Lacakp" role="button"
        ><i class="fab fa-facebook-f"></i
      ></a>
      <!-- Linkedin -->
      <!-- <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-linkedin-in"></i
      ></a> -->

      <!-- Github -->
      <a class="btn btn-outline-light btn-floating m-1" href="https://github.com/lacakp" role="button"
        ><i class="fab fa-github"></i
      ></a>
    </section>
      <div class="text-center p-3 site">
    © 2021 All Rights Reserved by
    <a class="text-white" href="https://github.com/lacakp">lacakp</a>
    <!-- Section: Social media -->
  </div>
  <!-- Grid container -->

</footer>
<!-- Footer -->
</body>
</html>



```

## edit_profile.php
```
<?php
	session_start();
  include "dbcon.php";
  

	if($_SESSION['UserID'] == "")
	{
		echo "Please Login!";
		exit();
	}
	
	$strSQL = "SELECT * FROM member WHERE UserID = '".$_SESSION['UserID']."' ";

  $objQuery = $conn->query($strSQL);
	$objResult =$objQuery->fetch_assoc(); 
?>
<html>
<head>
<title>codetopanda</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="assets/css/edit_profile.css">

<body>

  
<div class="bg"> </div>
<div class="container" id="app">
  <div class="row justify-content-center align-items-center vh-100">
    <div class="col-md-6">
      <div class="card py-3 p-lg-5 shadow">
        <div class="card-title">
          <img src="assets/images/panda-pixel.png" width="300px" class="img-fluid d-block mx-auto" alt="logo">
        </div>
        <div class="card-body">
                <h1 class="mt-0">แก้ไขโปรไฟล์</h1>
              <form name="form1" method="post" action="save_profile.php">
                    <table class="center cutomers" width="400" >
                      <tbody>
                        <tr>
                          <td width="125"> &nbsp;UserID</td>
                          <td width="180">
                            <?php echo $objResult["UserID"];?>
                          </td>
                        </tr>
                        <tr>
                          <td> &nbsp;Username</td>
                          <td>
                            <?php echo $objResult["Username"];?>
                          </td>
                        </tr>
                        <tr>
                          <td> &nbsp;Password</td>
                          <td><input name="txtPassword" type="password" id="txtPassword" value="<?php echo $objResult["Password"];?>">
                          </td>
                        </tr>
                        <tr>
                          <td> &nbsp;Confirm Password</td>
                          <td><input name="txtConPassword" type="password" id="txtConPassword" value="<?php echo $objResult["Password"];?>">
                          </td>
                        </tr>
                        <tr>
                          <td>&nbsp;Name</td>
                          <td><input name="txtName" type="text" id="txtName" value="<?php echo $objResult["Name"];?>"></td>
                        </tr>
                        <tr>
                          <td> &nbsp;Status</td>
                          <td>
                            <?php echo $objResult["Status"];?>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <br>
                    <center>
                      <input type="submit" name="Submit" value="Save" style="width: 150 ">
                    </center>

                  </form>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>
```

## logout.php
```
<?php
	session_start();
	session_destroy();
	header("location:login.php");
?>
```
