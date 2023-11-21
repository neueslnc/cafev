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
    <script type="text/javascript" src="export.js"></script>

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
                <div class="breadcrumb-title pe-3">Продажи</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Все продажи</li>
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
                    <hr/>                    <button onclick="ExportToExcel('xlsx')">Экспорт в excel</button>
                    
                    <?php
                    
                    if (isset($_GET['date_to'])) {
                        $date_to = $_GET['date_to'];
                    }else{
                        $date_to = date('Y-m-d');
                    }

                    if (isset($_GET['date_from'])) {
                        $date_from = $_GET['date_from'];
                    }else{
                        $date_from = date('Y-m-d');
                    }

                    ?>

                    <div class="row p-2">
                        <div class="col">
                            <input type="date" id="date_to" class="form-control" value="<?php echo $date_to;?>">
                        </div>
                        <div class="col">
                            <input type="date" id="date_from" class="form-control" value="<?php echo $date_from;?>">
                        </div>

                        <button type="button" class="btn btn-primary col-12 m-2" onclick="redir()">Поиск</button>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table mb-0 table-hover" id="tbl_exporttable_to_xls">
                                <thead>
                                <tr>
                                    <th scope="col">№</th>
                                    <th scope="col">Название </th>
                                    <th scope="col">Количество </th>
                                    <th scope="col">Общая сумма </th>
                                    <th scope="col">Дата </th>
                                    <!-- <th scope="col">Действия</th> -->
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $result = $DB->query("
                                	SELECT *, sp.id_product, SUM(qty) as sum, SUM(qty * price) as sum1 FROM `sales_products` AS `sp` LEFT JOIN `productnames` as `pn` ON `pn`.`id` = `sp`.`id_product` LEFT JOIN `sales` as `s` ON `s`.`id_check` = `sp`.`id_check` WHERE s.date BETWEEN  ? AND ? GROUP BY sp.id_product, s.date;", array(date('Y-m-d', strtotime($date_to)), date('Y-m-d', strtotime($date_from))));
                                $i=0 ;
                                $id = 0;
		                                foreach ($result as $row) :
		                                    $i++;
                                    ?>
										<tr>
	                                        <th scope="row"><?php echo $i ;  ?></th>
	                                        <td><?php echo $row["productname"]; ?></td>
	                                        <td><?php echo $row["sum"]; ?></td>
	                                        <td><?php echo $row["sum1"]; ?></td>
	                                        <td><?php echo nodateformat($row["date"]); ?> </td>
	                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                            <script>
                                function ExportToExcel(type, fn, dl) {
                                    var elt = document.getElementById('tbl_exporttable_to_xls');
                                    var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
                                    return dl ?
                                        XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
                                        XLSX.writeFile(wb, fn || ('Sales.' + (type || 'xlsx')));
                                }
                            </script>
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

<script>

    function redir() {

        $dt = $('#date_to').val();

        $df = $('#date_from').val();

        window.location.href = `all_sales.php?date_to=${$dt}&date_from=${$df}`;
    }

</script>


</body>

</html>