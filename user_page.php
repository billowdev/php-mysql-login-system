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


