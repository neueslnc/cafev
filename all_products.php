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
                <div class="breadcrumb-title pe-3">Все готовые продукты</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Список готовых продуктов</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">

                </div>
            </div>
            <!--end breadcrumb-->
            <div class="row">
                <div class="col-xl-9 mx-auto">

                    <h6 class="mb-0 text-uppercase">Таблица</h6>
                    <hr/>
                    <div class="card">
                        <div class="card-body">
                            <table class="table mb-0 table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">№</th>
                                    <th scope="col">Название продукта</th>
                                    <th scope="col">Ингредиенты</th>
                                    <th scope="col">Количество ингредиентов</th>
                                    <th scope="col">Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php



                                $result = $DB->query("
                                	SELECT *, `ps`.`id` as `idp`, `ps`.`qty` as `psqty`, `pn`.`productname` as `penek`, `in`.`ingname` as `kesha` FROM `productnames` as `pn` 
                                    LEFT JOIN `productsready` as `ps` ON `ps`.`productname_id` = `pn`.`id`
                                	LEFT JOIN `ingredients` as `in` ON `in`.`id` = `ps`.`ingname_id`
                                    ;
");
                                $i=0 ;

                                $id = 0;
		                                foreach ($result as $row) :
		                                    $i++;

                                    ?>

                                    <?php

                                    	if ( $row['productname_id'] != $id  ) {
                                    		
                                    		$id = $row['productname_id'];

                                    ?>

										<tr>
	                                        <th scope="row"><?php echo $i ;  ?></th>
	                                        <td><?php echo $row["penek"]; ?></td>
	                                        <td><?php echo $row["kesha"]; ?></td>
	                                        <td><?php echo $row["psqty"]; ?> </td>
	                                        <td>
                                                <a href="update_ingredient_product.php?id=<?php echo $row['idp']?>">
                                                    <button class="btn btn-sm btn-info text-white">Редактировать</button>
                                                </a>

                                                <a href="delete.php?id=<?php echo $row['productname_id']?>">
                                                    <button class="btn btn-sm btn-danger text-white">Редактировать</button>
                                                </a>
	                                        </td>
	                                    </tr>

                                    <?php
                                    	}else{
                                    ?>
                                    	<tr>
	                                        <th scope="row"></th>
	                                        <td></td>
	                                        <td><?php echo $row["kesha"]; ?></td>
	                                        <td><?php echo $row["psqty"]; ?> </td>
	                                        <td>
                                                <a href="update_ingredient_product.php?id=<?php echo $row['idp']?>">

                                                    <button class="btn btn-sm btn-info text-white">Редактировать</button>
                                                </a>
                                            </td>
	                                    </tr>

                                    <?php
                                    	}

                                    ?>
                                    
                                <?php endforeach; ?>
                                </tbody>
                            </table>
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