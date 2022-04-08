<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>APPM - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-dark">

    <div class="container">
        <?php if (!empty(session()->getFlashdata('error'))) { ?>
            <div style="color:red;" align="left" class="alert">
                <?= session()->getFlashdata('error'); ?>
            </div>
        <?php } ?>
        <form action="/daftar" method="post">
            <?= csrf_field(); ?>
            <!-- Outer Row -->
            <div class="row justify-content-center">

                <div class="col-xl-6 col-lg-6 col-md-9">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4" style="font-weight:bolder;font-family : helvetica;">Silahkan Registrasi!</h1>
                                        </div>
                                        <form class="user" action="/daftar" method="post">
                                            <div class="form-group">
                                                <input name="email" type="email" class="form-control form-control-user" placeholder="masukan email...">
                                            </div>
                                            <div class="form-group">
                                                <input name="NIK" type="text" class="form-control form-control-user" placeholder="masukan NIK...">
                                            </div>
                                            <div class="form-group">
                                                <input name="username" type="text" class="form-control form-control-user" placeholder="masukan username...">
                                            </div>
                                            <div class="form-group">
                                                <input name="password_new" type="password" class="form-control form-control-user" placeholder="masukan password...">
                                            </div>
                                            <div class="form-group">
                                                <input name="password" type="password" class="form-control form-control-user" placeholder="masukan konfirmasi password...">
                                            </div>
                                            <div class="form-group">
                                                <select name="gender" class="form-control form-control-user">
                                                    <option value="">Pilih Gender</option>
                                                    <option value="L">L</option>
                                                    <option value="P">P</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-warning btn-user btn-block">
                                                Pendaftaran
                                            </button>
                                            <hr>
                                            <!-- =---------------------------------------------- -->
                                            <a href="/login" class="btn btn-dark btn-user btn-block">
                                                <i class="fa fa-reply fa-fw"></i> Laman masuk
                                            </a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </form>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>