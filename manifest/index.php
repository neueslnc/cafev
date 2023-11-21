<?php     header("Content-Type: text/html; charset=utf-8");
session_start();
if(!isset($_SESSION["session_username"])) 
{
	header("location:login.php");
}
//require ('development_mode_control.php') ;

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

					<div class="header-elements d-none">
						<div class="d-flex justify-content-center">
							<a href="#" data-toggle="modal" data-target="#addregion" class="btn btn-link btn-float font-size-sm font-weight-semibold text-default">
								<i class="icon-bars-alt text-pink-300"></i>
								<span>Добавить регион</span>
							</a>
							<a href="#" data-toggle="modal" data-target="#addcity" class="btn btn-link btn-float font-size-sm font-weight-semibold text-default">
								<i class="icon-calculator text-pink-300"></i>
								<span>Добавить город/район</span>
							</a>
							<a href="#" data-toggle="modal" data-target="#addtype" class="btn btn-link btn-float font-size-sm font-weight-semibold text-default">
								<i class="icon-calendar5 text-pink-300"></i>
								<span>Добавить тип организации</span>
							</a>
						</div>
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
							if (isset($_POST['submit']))
								{
	$orgname=$_POST['orgname'] ; 
	$region=$_POST['region'] ; 
	$city=$_POST['city'] ; 
	$orgtype=$_POST['orgtype'] ; 
	$addate=date('Y-m-d') ; 
	$inspector = $_SESSION["session_username"] ;
	
	if ($DB->query("INSERT INTO regs (id,orgname,region, city, orgtype, addate, inspector )
	 VALUES(?,?,?,?,?,?,?)", array(null,"$orgname","$region", "$city", "$orgtype", "$addate", "$inspector"))); {
	 $lastid = $DB->lastInsertId();
	 echo "<script>window.location.href = 'regstep2.php?id=$lastid&region=$region&city_id=$city'</script>" ;
 	 echo "<div class='alert alert-success alert-styled-right alert-arrow-right alert-bordered'>
										<button type='button' class='close' data-dismiss'alert'><span>×</span><span class='sr-only'>Close</span></button>
										<span class='text-semibold'>Успешно сохранено!</span> 
								    </div>" ;
						}
					}
								?>
				<!-- Horizontal form options -->
											
				<!-- 2 columns form -->
				<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Регистрация</h5>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                	</div>
	                	</div>
					</div>

					<div class="card-body" id="maindiv">
						<form action="" method="POST">
							<div class="row">
								<div class="col-md-6">
									<fieldset>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Название:</label>
											<div class="col-lg-9">
												<input type="text" required name="orgname" class="form-control" placeholder="Введите название организации">
											</div>
										</div>

										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Регион</label>
											<div class="col-lg-9">
												<select name="region" id="mark"  data-placeholder="Выберите область" class="form-control form-control-select2" data-fouc>
												<option></option>
													<?php
                                                    $result =  $DB->query("SELECT * FROM regionsname");
                                                    foreach($result as $row): ?>
														<option value="<?php echo $row["id"]; ?>"><?php echo $row["regionname"]; ?></option>
												    <?php endforeach ; ?>
												</select>
											</div>
										</div>

										
									</fieldset>
								</div>

								<div class="col-md-6">
									<fieldset>

										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Город/район</label>
											<div class="col-lg-9">
												<select name="city" id="series" data-placeholder="Выберите город или район" class="form-control form-control-select2" data-fouc>
													<?php
                                                    $result =  $DB->query("SELECT * FROM cityname");
                                                    foreach($result as $row): ?>
														<option value="<?php echo $row["id"]; ?>" data-chained="<?php echo $row["regionname"]; ?>"><?php echo $row["cityname"]; ?></option>
												    <?php endforeach ; ?>
												</select>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Тип организации</label>
											<div class="col-lg-9">
												<select name="orgtype" data-placeholder="Выберите город или район" class="form-control form-control-select2" data-fouc>
												<option></option>
													<?php
                                                    $result =  $DB->query("SELECT * FROM types");
                                                    foreach($result as $row): ?>
														<option value="<?php echo $row["id"]; ?>"><?php echo $row["typename"]; ?></option>
												    <?php endforeach ; ?>
												
												</select>
											</div>
										</div>
										


									</fieldset>
								</div>
							</div>

							<div class="text-right">
								<button name="submit" type="submit" class="btn btn-primary">Следующий шаг <i class="icon-paperplane ml-2"></i></button>
							</div>
						</form>
					</div>
				</div>
				<!-- /2 columns form -->
				<div class="row">

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
