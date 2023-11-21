<?php     header("Content-Type: text/html; charset=utf-8");
session_start();
if(!isset($_SESSION["session_username"])) 
{
	header("location:login.php");
}
require ('development_mode_control.php') ;

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php echo showTitle() ;  ?></title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="../../../../global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/layout.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="../../../../global_assets/js/main/jquery.min.js"></script>
	<script src="../../../../global_assets/js/main/bootstrap.bundle.min.js"></script>
	<script src="../../../../global_assets/js/plugins/loaders/blockui.min.js"></script>
	<script src="../../../../global_assets/js/plugins/ui/ripple.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="../../../../global_assets/js/plugins/forms/selects/select2.min.js"></script>
	<script src="../../../../global_assets/js/plugins/forms/styling/uniform.min.js"></script>

	<script src="assets/js/app.js"></script>
	<script src="../../../../global_assets/js/demo_pages/form_layouts.js"></script>
	<!-- /theme JS files -->


	<script src="jquery_chained/jquery.chained.js"></script>

</head>

<body>

	<!-- Main navbar -->
	<?php include ('mainnavbar.php') ; ?>
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		<div class="sidebar sidebar-light sidebar-main sidebar-expand-md">

			<!-- Sidebar mobile toggler -->
			<div class="sidebar-mobile-toggler text-center">
				<a href="#" class="sidebar-mobile-main-toggle">
					<i class="icon-arrow-left8"></i>
				</a>
				Navigation
				<a href="#" class="sidebar-mobile-expand">
					<i class="icon-screen-full"></i>
					<i class="icon-screen-normal"></i>
				</a>
			</div>
			<!-- /sidebar mobile toggler -->


			<!-- Sidebar content -->
			<?php include ('sidebar.php') ; ?>
			<!-- /sidebar content -->
			
		</div>
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header page-header-light">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Главная страница</span> - Регистрация организации</h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

					
				</div>
<?php include('modals.php') ?>
				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="index.php" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Главная</a>
							<span class="breadcrumb-item active">Общий свод</span>
						</div>

						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

					
				</div>
			</div>
			<!-- /page header -->


			<!-- Content area -->
			<div class="content">
			
            <div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Общий свод</h5>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                	</div>
	                	</div>
					</div>

					<div class="card-body">
                    <div class="table-responsive">
                    <table cellspacing="0" border="1" cellpadding="0">
  <col width="64">
  <col width="170">
  <col width="98">
  <col width="154">
  <col width="133" span="2">
  <col width="159">
  <col width="154">
  <tr>
    <td rowspan="2" width="64">№</td>
    <td rowspan="2" width="170">Название учреждения</td>
    <td rowspan="2" width="98">Число котельных</td>
    <td rowspan="2" width="154">Марка котлов</td>
    <td colspan="2" width="266">Расход</td>
    <td rowspan="2" width="159">Площадь (м2) </td>
    <td rowspan="2" width="154">Число котлов</td>
  </tr>
  <tr>
    <td width="133">Уголь</td>
    <td width="133">Газ </td>
  </tr>
  <tr>
    <td rowspan="9" width="64">1</td>
    <td rowspan="9" width="170">1-школа</td>
    <td width="98">1</td>
    <td width="154">КВ-100ТГн </td>
    <td width="133">43</td>
    <td width="133">&nbsp;</td>
    <td width="159">1000</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="98">2</td>
    <td width="154">КОТ-50</td>
    <td width="133">20</td>
    <td width="133">&nbsp;</td>
    <td width="159">475</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="98">3</td>
    <td width="154">КОТ-50</td>
    <td width="133">&nbsp;</td>
    <td width="133">Газ </td>
    <td width="159">475</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="98">4</td>
    <td width="154">КОТ-30</td>
    <td width="133">14</td>
    <td width="133">&nbsp;</td>
    <td width="159">290</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="98">5</td>
    <td width="154">КОТ-30 </td>
    <td width="133">&nbsp;</td>
    <td width="133">Газ </td>
    <td width="159">290</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="98">6</td>
    <td width="154">КОТ-30</td>
    <td width="133">&nbsp;</td>
    <td width="133">Газ </td>
    <td width="159">290</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="98">7</td>
    <td width="154">КОТ-30</td>
    <td width="133">&nbsp;</td>
    <td width="133">Газ </td>
    <td width="159">290</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="98">8</td>
    <td width="154">АКОТ-50</td>
    <td width="133">&nbsp;</td>
    <td width="133">Газ </td>
    <td width="159">520</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="98">9</td>
    <td width="154">АГВ    қўлбола</td>
    <td width="133">&nbsp;</td>
    <td width="133">Газ </td>
    <td width="159">0</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" width="234">Итог </td>
    <td width="98">9</td>
    <td width="154">хххх</td>
    <td width="133">77</td>
    <td width="133">хххх</td>
    <td width="159">3630</td>
    <td>8</td>
  </tr>
  <tr>
    <td rowspan="4" width="64">2</td>
    <td rowspan="4" width="170">2-школа</td>
    <td width="98">1</td>
    <td width="154">АКОТ-100    кВт</td>
    <td width="133">20</td>
    <td width="133">Таъмирталаб</td>
    <td width="159">1200</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="98">2</td>
    <td width="154">КОВ-50    ТГ</td>
    <td width="133">15</td>
    <td width="133">Таъмирталаб</td>
    <td width="159">400</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="98">3</td>
    <td width="154"> КОТ 30</td>
    <td width="133">14</td>
    <td width="133">&nbsp;</td>
    <td width="159">290</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="98">4</td>
    <td width="154"> КОТ 30</td>
    <td width="133">14</td>
    <td width="133">&nbsp;</td>
    <td width="159">290</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" width="234">Итог </td>
    <td width="98">4</td>
    <td width="154">хххх</td>
    <td width="133">63</td>
    <td width="133">хххх</td>
    <td width="159">2180</td>
    <td>3</td>
  </tr>
  <tr>
    <td rowspan="7" width="64">3</td>
    <td rowspan="7" width="170">3-школа</td>
    <td width="98">1</td>
    <td width="154">КВ-30Т</td>
    <td width="133">&nbsp;</td>
    <td width="133">&nbsp;</td>
    <td width="159">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="98">2</td>
    <td width="154">КВ-30Т</td>
    <td width="133">&nbsp;</td>
    <td width="133">&nbsp;</td>
    <td width="159">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="98">3</td>
    <td width="154">КВ-50Т</td>
    <td width="133">&nbsp;</td>
    <td width="133">&nbsp;</td>
    <td width="159">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="98">4</td>
    <td width="154">КВ-80Т</td>
    <td width="133">&nbsp;</td>
    <td width="133">&nbsp;</td>
    <td width="159">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="98">5</td>
    <td width="154">КВ-80Т</td>
    <td width="133">&nbsp;</td>
    <td width="133">&nbsp;</td>
    <td width="159">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="98">6</td>
    <td width="154">КВ-100Т</td>
    <td width="133">&nbsp;</td>
    <td width="133">&nbsp;</td>
    <td width="159">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="98">7</td>
    <td width="154">КВ-100Т</td>
    <td width="133">&nbsp;</td>
    <td width="133">&nbsp;</td>
    <td width="159">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" width="234">Итог </td>
    <td width="98">8</td>
    <td width="154">хххх</td>
    <td width="133">0</td>
    <td width="133">хххх</td>
    <td width="159">0</td>
    <td>7</td>
  </tr>
  <tr>
    <td rowspan="5" width="64">4</td>
    <td rowspan="5" width="170">4-школа</td>
    <td width="98">1</td>
    <td width="154">КВ-100Т    ГН</td>
    <td width="133">43,4</td>
    <td width="133">&nbsp;</td>
    <td width="159">1000</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="98">2</td>
    <td width="154">КВ-100Т    ГН</td>
    <td width="133">&nbsp;</td>
    <td width="133">газ </td>
    <td width="159">1000</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="98">3</td>
    <td width="154">КОМ-30Т</td>
    <td width="133">10</td>
    <td width="133">Таъмирталаб</td>
    <td width="159">300</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="98">4</td>
    <td width="154">КОМ-30Т</td>
    <td width="133">10</td>
    <td width="133">Таъмирталаб</td>
    <td width="159">300</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="98">5</td>
    <td width="154">КОМ-30Т</td>
    <td width="133">10</td>
    <td width="133">&nbsp;</td>
    <td width="159">300</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" width="234">Итог </td>
    <td width="98">5</td>
    <td width="154">&nbsp;</td>
    <td width="133">73,4</td>
    <td width="133">0</td>
    <td width="159">2900</td>
    <td>3</td>
  </tr>
  <tr>
    <td rowspan="14" width="64">5</td>
    <td rowspan="14" width="170">5-школа</td>
    <td width="98">1</td>
    <td width="154">КМУ-16</td>
    <td width="133">Газ</td>
    <td width="133">&nbsp;</td>
    <td width="159">200</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="98">2</td>
    <td width="154">АКОТ-23,2    кВт</td>
    <td width="133">Газ</td>
    <td width="133">&nbsp;</td>
    <td width="159">230</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="98">3</td>
    <td width="154">АКОТ-23,2    кВт</td>
    <td width="133">Газ</td>
    <td width="133">&nbsp;</td>
    <td width="159">230</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="98">4</td>
    <td width="154">АКОТ-23,2    кВт</td>
    <td width="133">Газ</td>
    <td width="133">&nbsp;</td>
    <td width="159">230</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="98">5</td>
    <td width="154">АКОТ-23,2    кВт</td>
    <td width="133">Газ</td>
    <td width="133">&nbsp;</td>
    <td width="159">230</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="98">6</td>
    <td width="154">АКОТ-23,2    кВт</td>
    <td width="133">Газ</td>
    <td width="133">&nbsp;</td>
    <td width="159">230</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="98">7</td>
    <td width="154">АКОТ-23,2    кВт</td>
    <td width="133">Газ</td>
    <td width="133">&nbsp;</td>
    <td width="159">230</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="98">8</td>
    <td width="154">АКОТ-23,2    кВт</td>
    <td width="133">Газ</td>
    <td width="133">&nbsp;</td>
    <td width="159">230</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="98">9</td>
    <td width="154">АКОТ-23,2    кВт</td>
    <td width="133">Газ</td>
    <td width="133">&nbsp;</td>
    <td width="159">230</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="98">10</td>
    <td width="154">АКОТ-23,2    кВт</td>
    <td width="133">Газ</td>
    <td width="133">&nbsp;</td>
    <td width="159">230</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="98">11</td>
    <td width="154">АКОТ-23,2    кВт</td>
    <td width="133">Газ</td>
    <td width="133">&nbsp;</td>
    <td width="159">230</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="98">12</td>
    <td width="154">АКОТ-31,5    кВт</td>
    <td width="133">Газ</td>
    <td width="133">&nbsp;</td>
    <td width="159">320</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="98">13</td>
    <td width="154">АКОТ-31,5    кВт</td>
    <td width="133">Газ</td>
    <td width="133">&nbsp;</td>
    <td width="159">320</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="98">14</td>
    <td width="154">АКОТ-40    кВт</td>
    <td width="133">Газ</td>
    <td width="133">&nbsp;</td>
    <td width="159">410</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" width="234">Итог </td>
    <td width="98">14</td>
    <td width="154">хххх</td>
    <td width="133">хххх</td>
    <td width="133">хххх</td>
    <td width="159">3550</td>
    <td>11</td>
  </tr>
  <tr>
    <td rowspan="5" width="64">6</td>
    <td rowspan="5" width="170">6-школа</td>
    <td width="98">1</td>
    <td width="154">КОМ-50    кВт </td>
    <td width="133">&nbsp;</td>
    <td width="133">Газ </td>
    <td width="159">500</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="98">2</td>
    <td width="154">АКОТ-60</td>
    <td width="133">&nbsp;</td>
    <td width="133">Газ </td>
    <td width="159">650</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="98">3</td>
    <td width="154">АКОТ-60</td>
    <td width="133">&nbsp;</td>
    <td width="133">Газ </td>
    <td width="159">650</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="98">4</td>
    <td width="154">АКОТ-60</td>
    <td width="133">&nbsp;</td>
    <td width="133">Газ </td>
    <td width="159">650</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="98">5</td>
    <td width="154">АКОТ-60</td>
    <td width="133">Алмаштириш</td>
    <td width="133">Газ </td>
    <td width="159">650</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" width="234">Итог </td>
    <td width="98">5</td>
    <td width="154">хххх</td>
    <td width="133">0</td>
    <td width="133">хххх</td>
    <td width="159">3100</td>
    <td width="154">4</td>
  </tr>
  <tr>
    <td rowspan="3" width="64">7</td>
    <td rowspan="3" width="170">7-школа</td>
    <td width="98">1</td>
    <td width="154">КВ-30Т</td>
    <td width="133">13</td>
    <td width="133">Алмашди</td>
    <td width="159">300</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="98">2</td>
    <td width="154">МТУ-0,2ТГн    100</td>
    <td width="133">97,8</td>
    <td width="133">&nbsp;</td>
    <td width="159">1000</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="98">3</td>
    <td width="154">МТУ-0,2ТГн    100</td>
    <td width="133">97,8</td>
    <td width="133">&nbsp;</td>
    <td width="159">1000</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" width="234">Итог </td>
    <td width="98">3</td>
    <td width="154">хххх</td>
    <td width="133">208,6</td>
    <td width="133">хххх</td>
    <td width="159">2300</td>
    <td width="154">2</td>
  </tr>
</table>
					</div>
                    </div>

					
				</div>
				<!-- /vertical form options -->
			</div>
			<!-- /content area -->

			<!-- Footer -->
			<?php include('footer.php') ; ?>
			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->
	<script type="text/javascript" charset="utf-8">
  $(function() {

    /* For jquery.chained.js */
    $("#series").chained("#mark");
    $("#model").chained("#series");
    $("#engine").chained("#series, #model");

    /* Show button after each pulldown has a value. */
    $("#engine").bind("change", function(event) {
        if ("" != $("option:selected", this).val() && "" != $("option:selected", $("#model")).val()) {
            $("#button").fadeIn();
        } else {
            $("#button").hide();
        }
    });

    $("#c").chained("#a,#b");

    

    /* Show button after each pulldown has a value. */
    $("#engine-remote").bind("change", function(event) {
        if ("" != $("option:selected", this).val() && "" != $("option:selected", $("#model-remote")).val()) {
            $("#button-remote").fadeIn();
        } else {
            $("#button-remote").hide();
        }
    });

    $("#c-remote").remoteChained("#a-remote,#b-remote", "json.php");

    

    /* For multiple jquery.chained.js */
    $(".series").each(function() {
        $(this).chained($(".mark", $(this).parent()));
    });
    $(".model").each(function() {
        $(this).chained($(".series", $(this).parent()));
    });
    $(".engine").each(function() {
        $(this).chained([
            $(".series", $(this).parent()),
            $(".model", $(this).parent())
        ]);
    });

    


  });
  </script>
</body>
</html>
