<!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login System</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/assets/css/adminlte.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="/assets/plugins/sweetalert2/sweetalert2.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="/assets/plugins/toastr/toastr.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Sistem </b>Perangkingan</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <!-- <p class="login-box-msg">Sign in to start your session</p> -->
                <div class="text-center">
                    <img class="my-1" width="200px" src="/assets/img/logo-color.png"><br />
                    <b>PT. Traktor Nusantara</b>
                </div>
                <form action="/" method="post">
                    <?= csrf_field() ?>
                    <div class="input-group mb-3 my-4">
                        <input type="text" name="username" class="form-control" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3 my-4">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row my-4">
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="/assets/plugins/toastr/toastr.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/assets/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/assets/dist/js/demo.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(function() {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
                <?php
                if ($error == "err4") {
                    $err = "Login Gagal, cek Kembali Inputan Anda";
                } else {
                    $err = "Silahkan Login Terlebih Dahulu";
                }
                if ($error == "err1" or $error == "err2" or $error == "err3" or $error == "err4") { ?>
                    Toast.fire({
                        type: 'error',
                        title: '<?= $err ?>'
                    })
                    setTimeout(function() {
                        window.location.assign("/");
                    }, 5000);
                <?php
                } elseif ($error == "logout1") { ?>
                    Toast.fire({
                        type: 'success',
                        title: 'Anda Telah Berhasil Logout'
                    })
                    setTimeout(function() {
                        window.location.assign("/");
                    }, 5000);
                <?php
                }
                ?>
            });
        });
    </script>
</body>

</html>