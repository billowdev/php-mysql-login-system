<?php
session_start();
include "dbcon.php";
if ($_SESSION['UserID'] == "") {
  echo "Please Login!";
  exit();
}

if ($_SESSION['Status'] != "USER") {
  echo "This page for User only!";
  exit();
}


$strSQL = "SELECT * FROM member WHERE UserID = '" . $_SESSION['UserID'] . "' ";

$objQuery = $conn->query($strSQL);
$objResult = $objQuery->fetch_assoc();

?>
<html>

<head>
  <title>codetopanda</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="assets/css/edit_profile.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kanit">

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
            <h1> Welcome <?php echo $objResult["Username"]; ?> </h1> <br>
            <h1><?php echo $objResult["Name"]; ?></h1>
            <br>
            <h3> Your status is User </h3>
            <form action="/edit_profile.php" method="get">
              <button type="submit" class="btn btn-primary"> แก้ไขโปรไฟล์ </button>
            </form>


            <form action="/logout.php" method="get">
              <button type="submit" formaction="/logout.php" class="btn btn-danger"> ออกจากระบบ </button>
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
        <a class="btn btn-outline-light btn-floating m-1" href="https://web.facebook.com/Lacakp" role="button"><i class="fab fa-facebook-f"></i></a>
        <!-- Linkedin -->
        <!-- <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-linkedin-in"></i
      ></a> -->

        <!-- Github -->
        <a class="btn btn-outline-light btn-floating m-1" href="https://github.com/lacakp" role="button"><i class="fab fa-github"></i></a>
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