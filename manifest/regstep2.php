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
							<span class="breadcrumb-item active">Регистрация организации</span>
						</div>

						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

					
				</div>
			</div>
			<!-- /page header -->


			<!-- Content area -->
			<div class="content">
			<?php 
    $result = $DB->query("SELECT * FROM regs r 
	INNER JOIN regionsname g on g.id=r.region 
	INNER JOIN cityname c ON c.id = r.city 
	INNER JOIN types t ON t.id = r.orgtype 
	WHERE r.id = ? ", array($_GET['id']));
    foreach ($result as $row) :
			?>
				<div class="card">
					<div class="card-header bg-transparent header-elements-inline">
						<h6 class="card-title">Организация - <?php echo $row["orgname"]; ?></h6>
						<div class="header-elements">
							<button type="button" class="btn btn-light btn-sm"><i class="icon-file-check mr-2"></i> Экспорт в PDF</button>
							<button type="button" class="btn btn-light btn-sm ml-3"><i class="icon-printer mr-2"></i> Печать</button>
	                	</div>
					</div>

					<div class="card-body">
						<div class="row">
							<div class="col-sm-6">
								<div class="mb-4">
		 							<ul class="list list-unstyled mb-0">
										<li>Регион : <?php echo $row["regionname"]; ?></li>
										<li>Город или район : <?php echo $row["cityname"]; ?> </li>
										<li>Тип организации : <?php echo $row["typename"]; ?></li>
									</ul>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="mb-4">
									<div class="text-sm-right">
										<h4 class="text-primary mb-2 mt-md-2">ID организации : <?php echo $row["id"]; ?></h4>
										<ul class="list list-unstyled mb-0">
											<li>Дата добавления: <span class="font-weight-semibold"><?php echo $row["addate"]; ?></span></li>
											<li>Инспектор: <span class="font-weight-semibold"><?php echo $row["inspector"]; ?></span></li>
										</ul>
									</div>
								</div>
							</div>
						</div>

					
					</div>
					<?php endforeach ; ?>


					<div class="card-body">


					<ul class="nav nav-tabs nav-tabs-top nav-justified">
									<li class="nav-item"><a href="#top-justified-tab1" class="nav-link active" data-toggle="tab">Котельные</a></li>
									<li class="nav-item"><a href="#top-justified-tab2" class="nav-link" data-toggle="tab">Котлы</a></li>
								</ul>

								<div class="tab-content">
									<div class="tab-pane fade show active" id="top-justified-tab1">
									<button type="button" data-toggle="modal" data-target="#addbroom" class="btn btn-light btn-sm"><i class="icon-stack mr-2"></i> Добавить котельную</button>

									<div class="table-responsive">
					    <table class="table table-lg">
					        <thead>
					            <tr>
					                <th>№</th>
					                <th>Котельная</th>
					                <th>Проблемы котельной</th>
									<th>Топливо</th>
					                <th>Подача газа</th>
					                <th>Действия</th>
					                
					            </tr>
					        </thead>
					        <tbody>
							<?php 
							$last = $_GET['id'] ; 
    $result = $DB->query("SELECT * FROM brooms WHERE parent_id=".$last);
	$i=0 ; 
    foreach ($result as $row) : 
	$i++ ; 
	$broom_id = $row["id"];
			?>
					            <tr>
								<td><?php echo $i ;  ?></td>

					                <td>
					                	<h6 class="mb-0"><?php echo $row["broomname"]; ?></h6>
					                	<span class="text-muted"><?php echo $row["broomdesc"]; ?>.</span>
				                	</td>
					                <td>
										<?php
	$result_c = $DB->query("SELECT * FROM broomcheck WHERE broom_id=$broom_id");
    foreach ($result_c as $row_c) : 
		echo $row_c["problems"];
		echo "<br>" ; 
		echo $row_c["checkdescription"];

		endforeach ; 

										?>
									</td>
									<td><?php echo $row["topl"]; ?></td>
									<td><?php echo setGaz($row["gaz"]); ?></td>
					                <td>
									<button type="button" data-id="<?php echo $row["id"]; ?>" data-toggle="modal" data-target="#addbroomcheck" class="passingID btn btn-light btn-sm"><i class="icon-stack mr-2"></i> Проверка</button>

									</td>
					                
					            </tr>
					            
					  <?php endforeach ;  ?>         
					            
					        </tbody>
					    </table>
					</div>
					<script>
						$(".passingID").click(function () {
						var ids = $(this).attr('data-id');
						$("#idkl").val( ids );
						// $('#myModal').modal('show');
						});
					</script>

									</div>

									<div class="tab-pane fade" id="top-justified-tab2">

									<button type="button" data-toggle="modal"  data-target="#addb" class="btn btn-light btn-sm"><i class="icon-stack mr-2"></i> Добавить котел</button>

									<div class="table-responsive">
					    <table class="table table-lg">
					        <thead>
					            <tr>
					                <th>№</th>
					                <th>Котел</th>
					                <th>Проблемы котла</th>
					                <th>Действия</th>
					                
					            </tr>
					        </thead>
					        <tbody>
							<?php 
							
    $result = $DB->query("SELECT * FROM boilers WHERE parent_id=".$_GET['id']);

	$i=0 ; 
    foreach ($result as $row) : 
	$i++ ; 
	$broom_id = $row["broom_id"];
	$b_id = $row["id"];
			?>
					            <tr>
								<td><?php echo $i ;  ?></td>
					                <td>
					                	<h6 class="mb-0"><?php echo $row["kotel"]; ?></h6>
					                	<span class="text-muted"> Котельная : 
										<?php
	$result_c = $DB->query("SELECT * FROM brooms WHERE id=$broom_id");
    foreach ($result_c as $row_c) : 
		echo $row_c["broomname"];


		endforeach ; 

										?>
										</span>
				                	</td>
					                <td>
									<?php
	$result_c = $DB->query("SELECT * FROM boilercheck WHERE boiler_id=$b_id");
    foreach ($result_c as $row_c) : 
		echo $row_c["problems"];
		echo "<br>" ; 
		echo $row_c["checkdescription"];

		endforeach ; 

										?>										
									</td>
					                <td>
									<button type="button" data-id="<?php echo $row["id"]; ?>" data-toggle="modal" data-target="#addbcheck" class="passingID2 btn btn-light btn-sm"><i class="icon-stack mr-2"></i> Проверка</button>

									</td>
					                
					            </tr>
					        <?php endforeach ; ?>
					        </tbody>
					    </table>
					</div>
					<script>
						$(".passingID2").click(function () {
						var ids2 = $(this).attr('data-id');
						$("#idkl2").val( ids2 );
						// $('#myModal').modal('show');
						});
					</script>



									</div>
							
						</div>

				</div>

				<!-- /2 columns form -->
				
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
