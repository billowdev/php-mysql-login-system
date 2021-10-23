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