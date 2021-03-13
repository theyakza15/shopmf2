<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mafear Clothing</title>

    <!-- Custom fonts for this template-->
    <link href="http://localhost/shopmf/public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Prompt:200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;display=swap" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="http://localhost/shopmf/public/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="http://localhost/shopmf/public/css/style.css" rel="stylesheet">
    <link href="http://localhost/shopmf/public/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">

</head>

<body class="bg-login">
    <div class="container d-flex align-items-center" style="height:100vh;">
        <!-- Outer Row -->
        <div class="row justify-content-center  w-100">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                        <div class="col-lg-7 ">
                            <img height="350px" width="550px"src="images/login-bg.PNG" alt="">
                            </div>
                            <div class="col-lg-5">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Mafear Clothing</h1>
                                        <p class="mb-5">ระบบบริหารจัดการการขายสินค้า</p>
                                    </div>
                                    <form id="from_login">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="inputemp_id" aria-describedby="emailHelp" placeholder="EMPXXXXX">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="inputPassword" placeholder="PAssword">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <button type="button" class="btn btn-primary btn-block" id="btn_login">
                                            เข้าสูระบบ
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="http://localhost/shopmf/public/vendor/jquery/jquery.min.js"></script>
    <script src="http://localhost/shopmf/public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="http://localhost/shopmf/public/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="http://localhost/shopmf/public/js/sb-admin-2.min.js"></script>
    <script src="http://localhost/shopmf/public/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $("#btn_login").click(function() {
            var username = $('#inputemp_id').val()
            var password = $('#inputPassword').val()
            $.ajax({
                url: "ajax/login/login.php",
                method: "POST",
                data: {
                    username: username,
                    password: password
                },
                success: function(data) {
                    console.log(data)
                    if (data == 0) {

                        swal({
                            text: "UsernameหรือPasswordผิดพลาดกรุณากรอกใหม่อีกครั้ง",
                            icon: "warning",
                            button: false,
                        });
                        $('#login').val("")
                        $('#login').focus()

                    } else {
                        window.location.href = 'index.php';
                    }
                }
            });


        })
    </script>

</body>

</html>