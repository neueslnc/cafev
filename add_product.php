<?php     header("Content-Type: text/html; charset=utf-8");
session_start();
if(!isset($_SESSION["session_username"]))
{
    header("location:login.php");
}
require ('development_mode_control.php') ;

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
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="assets/css/dark-theme.css" />
    <link rel="stylesheet" href="assets/css/semi-dark.css" />
    <link rel="stylesheet" href="assets/css/header-colors.css" />
    <title><?php showTitle() ;  ?></title>
</head>

<body>
<!--wrapper-->
<div class="wrapper">
    <!--start header -->
    <header>
        <div class="topbar d-flex align-items-center">
            <?php include "topmenu.php"; ?>
        </div>
    </header>
    <!--end header -->
    <!--navigation-->
    <?php include ('menu.php') ;  ?>
    <!--end navigation-->
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Добавить название продукта</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Новое название</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">

                </div>
            </div>
            <!--end breadcrumb-->
            <?php
            if (isset($_POST['save']))
            {
                $productname=$_POST['productname'] ;
                $sell_price=$_POST['sell_price'] ;

                if (!empty($_FILES['image']['tmp_name'])) {
                    $file = $_FILES['image']['tmp_name'] ;
                    $image = addslashes(file_get_contents($_FILES['image']['tmp_name'])) ;
                    $uniquenumber = rand(1111,9999) ;
                    $uniquestring = microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"] ;
                    $somestring = uniqid() ;
                    $image_namefinal = md5($somestring.$uniquenumber.$uniquestring);
                    $image_name = $image_namefinal.($_FILES['image']['name']) ;
                    move_uploaded_file($_FILES["image"]["tmp_name"], "userphotos/".$image_name) ;
                    $location = "userphotos/".$image_name ;
                }

                else {
                    $location = '' ;
                }
                if ($DB->query("INSERT INTO productnames (id,productname,sell_price, location)	 VALUES(?,?,?,?)", array(null,"$productname", "$sell_price", "$location")));
                {
                    echo "<div class='alert alert-success alert-styled-right alert-arrow-right alert-bordered'>
										<span class='text-semibold'>Название продукта сохранен</span> 
								    </div>" ;
                    $lastid = $DB->lastInsertId();
                    echo "<script>window.location.href = 'add_product_next.php?id=$lastid'</script>" ;
                }
            }
            ?>
            <div class="row">
                <div class="col-xl-7 mx-auto">
                    <hr/>
                    <div class="card border-top border-0 border-4 border-primary">
                        <div class="card-body p-5">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                                </div>
                                <h5 class="mb-0 text-primary">Заполните форму чтобы добавить новое название</h5>
                            </div>
                            <hr>
                            <form class="row g-3" method="post" action="" enctype="multipart/form-data">
                                <div class="col-md-6">
                                    <label for="inputFirstName" class="form-label">Название продукта</label>
                                    <input type="text" name="productname" class="form-control" id="inputFirstName">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputFirstName1" class="form-label">Цена продажи</label>
                                    <input type="text" name="sell_price" class="form-control" id="inputFirstName1">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputFirstName1" class="form-label">Фото</label>
                                    <input type="file" name="image" class="form-control" id="">
                                </div>
                                <div class="col-12">
                                    <button type="submit" name="save" class="btn btn-primary px-5">Сохранить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </div>
    <!--end page wrapper -->
    <!--start overlay-->
    <div class="overlay toggle-icon"></div>
    <!--end overlay-->
    <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    <!--End Back To Top Button-->
    <?php include "footer.php" ; ?>
</div>
<!--end wrapper-->
<!--start switcher-->
<div class="switcher-wrapper">
    <div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
    </div>
    <div class="switcher-body">
        <div class="d-flex align-items-center">
            <h5 class="mb-0 text-uppercase">Theme Customizer</h5>
            <button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
        </div>
        <hr/>
        <h6 class="mb-0">Theme Styles</h6>
        <hr/>
        <div class="d-flex align-items-center justify-content-between">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="lightmode" checked>
                <label class="form-check-label" for="lightmode">Light</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="darkmode">
                <label class="form-check-label" for="darkmode">Dark</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="semidark">
                <label class="form-check-label" for="semidark">Semi Dark</label>
            </div>
        </div>
        <hr/>
        <div class="form-check">
            <input class="form-check-input" type="radio" id="minimaltheme" name="flexRadioDefault">
            <label class="form-check-label" for="minimaltheme">Minimal Theme</label>
        </div>
        <hr/>
        <h6 class="mb-0">Header Colors</h6>
        <hr/>
        <div class="header-colors-indigators">
            <div class="row row-cols-auto g-3">
                <div class="col">
                    <div class="indigator headercolor1" id="headercolor1"></div>
                </div>
                <div class="col">
                    <div class="indigator headercolor2" id="headercolor2"></div>
                </div>
                <div class="col">
                    <div class="indigator headercolor3" id="headercolor3"></div>
                </div>
                <div class="col">
                    <div class="indigator headercolor4" id="headercolor4"></div>
                </div>
                <div class="col">
                    <div class="indigator headercolor5" id="headercolor5"></div>
                </div>
                <div class="col">
                    <div class="indigator headercolor6" id="headercolor6"></div>
                </div>
                <div class="col">
                    <div class="indigator headercolor7" id="headercolor7"></div>
                </div>
                <div class="col">
                    <div class="indigator headercolor8" id="headercolor8"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end switcher-->
<!-- Bootstrap JS -->
<script src="assets/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<!--app JS-->
<script src="assets/js/app.js"></script>
</body>

</html>