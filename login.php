<?php
session_start();
header("Content-Type: text/html; charset=utf-8");
require_once("cndata/cnct.php");
require_once("main_classes.php");
error_reporting(E_ALL);
ini_set('display_errors',1);
if(isset($_POST["login"]))
{
    if(empty($_POST["username"]) || empty($_POST["password"]))
    {
        $message = '<label>Заполните все поля</label>';
    }
    else
    {
        $query = "SELECT * FROM usertbl WHERE username = :username AND password = :password";
        $stmt = $conn->prepare($query);
        $stmt->execute(
            array(
                'username'     =>     clean($_POST["username"]),
                'password'     =>     sha1(clean($_POST["password"]))
            )
        );
        $count = $stmt->rowCount();
        if($count > 0)
        {
            $_SESSION["session_username"] = $_POST["username"];
            $username = $_POST["username"];
            $sessionIdQuery = $conn->prepare ('SELECT full_name FROM usertbl WHERE username = :username');
            $sessionIdQuery->execute(array('username' => $username));
            foreach ($sessionIdQuery as $row):
                $client_id = $row["full_name"];
            endforeach ;
            $_SESSION['session_id']=$client_id;
            header("location:index.php");
        }
        else
        {
            $message = '<label>Неправильный логин или пароль</label>';
        }
    }
}


?>
<!doctype html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
    <!--plugins-->
    <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- loader-->
    <link href="assets/css/pace.min.css" rel="stylesheet" />
    <script src="assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/app.css" rel="stylesheet">
    <link href="assets/css/icons.css" rel="stylesheet">
    <title><?php showTitle() ;  ?></title>
</head>

<body class="bg-login">
<!--wrapper-->
<div class="wrapper">
    <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
        <div class="container-fluid">
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                <div class="col mx-auto">
                    <div class="mb-4 text-center">

                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="border p-4 rounded">
                                <div class="text-center">
                                    <h3 class="">Пожалуйста войдите</h3>

                                </div>
                                <?php
                                if(isset($message))
                                {
                                    echo '<label class="text-danger">'.$message.'</label>';
                                }
                                ?>
                                <div class="login-separater text-center mb-4"> <span>Используя свой логин и пароль</span>
                                    <hr/>
                                </div>
                                <div class="form-body">
                                    <form class="row g-3" action="" method="POST">
                                        <div class="col-12">
                                            <label for="inputEmailAddress" class="form-label">Логин</label>
                                            <input type="text" name="username" class="form-control" id="inputEmailAddress" placeholder="Логин">
                                        </div>
                                        <div class="col-12">
                                            <label for="inputChoosePassword" class="form-label">Пароль</label>
                                            <div class="input-group" id="show_hide_password">
                                                <input type="password" name="password" class="form-control border-end-0" id="inputChoosePassword" value="12345678" placeholder="Пароль"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" name="login" class="btn btn-primary"><i class="bx bxs-lock-open"></i>Войти</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </div>
</div>
<!--end wrapper-->
<!-- Bootstrap JS -->
<script src="assets/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<!--Password show & hide js -->
<script>
    $(document).ready(function () {
        $("#show_hide_password a").on('click', function (event) {
            event.preventDefault();
            if ($('#show_hide_password input').attr("type") == "text") {
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass("bx-hide");
                $('#show_hide_password i').removeClass("bx-show");
            } else if ($('#show_hide_password input').attr("type") == "password") {
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass("bx-hide");
                $('#show_hide_password i').addClass("bx-show");
            }
        });
    });
</script>
<!--app JS-->
<script src="assets/js/app.js"></script>
</body>

</html>