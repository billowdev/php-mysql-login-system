<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kanit">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kanit">
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
    <div class="bg"> </div>
    <div class="container" id="app">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-6">
                <div class="card py-3 p-lg-5 shadow">
                    <div class="card-title">
                        <img src="/assets/images/CTPLOGO.png" width="250px" class="img-fluid d-block mx-auto" alt="logo">
                    </div>
                    <div class="card-body">
                        <form name="form1" method="post" action="save_register.php">
                            <div class="row mb-3">
                                <label for="username" class="col-sm-3" col-form-label>ชื่อผู้ใช้งาน</label>
                                <div class="col-sm-9">
                                    <input name="txtUsername" type="text" id="txtUsername" class="form-control" placeholder="Username" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-sm-3" col-form-label>รหัสผ่าน</label>
                                <div class="col-sm-9">
                                    <input name="txtPassword" type="password" id="txtPassword" class="form-control" placeholder="Password" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="repeatPassword" class="col-sm-3" col-form-label>ยืนยันรหัสผ่าน</label>
                                <div class="col-sm-9">
                                    <input name="txtConPassword" type="password" id="txtConPassword" class="form-control" placeholder="Repeat Password" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="firstname" class="col-sm-3" col-form-label> ชื่อ </label>
                                <div class="col-sm-9">
                                    <input name="txtName" type="text" id="txtPassword" class="form-control" placeholder="Name - Lastname" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="lastname" class="col-sm-3" col-form-label> Status </label>
                                <div class="col-sm-9">

                                    <option value="USER">USER</option>

                                </div>
                            </div>


                            <div class="d-grid mb-3">
                                <button class="btn btn-primary"> สมัครสมาชิก </button>
                            </div>
                            <p class="text-center">
                                มีบัญชีผู้ใช้อยู่แล้ว? <a href="login.php"> เข้าสู่ระบบ </a> <br>
                                <!-- <a href="./"> กลับหน้าหลัก </a> -->
                            </p>
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

                <a class="btn btn-outline-light btn-floating m-1" href="./index.html" role="button"><i class="fas fa-home"></i>
                </a>

                <!-- Facebook -->
                <a class="btn btn-outline-light btn-floating m-1" href="https://web.facebook.com/Lacakp" role="button"><i class="fab fa-facebook-f"></i></a>

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