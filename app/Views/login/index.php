<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | PeKiKJKT</title>
    <link rel="icon" type="image/png" href="<?= base_url('/images/umk.png') ?>" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('/vendor/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('fonts/font-awesome-4.7.0/css/font-awesome.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('/vendor/animate/animate.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('/vendor/css-hamburgers/hamburgers.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('/vendor/select2/select2.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('/css/main.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('/css/util.css') ?>">
</head>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="<?= base_url('/images/umk.png') ?>" alt="IMG">
                </div>
                <form action="<?= base_url(); ?>/admin/auth/login" method="POST" class="login100-form-title">
                    <span class="login100-form-title">
                        Admin Login
                    </span>
                    <div class="wrap-input100 validate-input">
                        <input type="text" class="input100" name="username" placeholder="Username">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input type="password" name="password" placeholder="Password" class="input100">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">Login</button>
                    </div>

                    <div class="text-center p-t-136">
                        <a href="#" class="txt2"></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="<?= base_url('public/vendor/jquery/jquery-3.2.1.min.js'); ?>"></script>
    <script src="<?= base_url('public/vendor/bootstrap/js/popper.js'); ?>"></script>
    <script src="<?= base_url('public/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('public/vendor/select2/select2.min.js'); ?>"></script>
    <script src="<?= base_url('public/vendor/tilt/tilt.jquery.min.js'); ?>"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        });
    </script>
    <script src="<?= base_url('public/js/main.js') ?>"></script>
</body>

</html>