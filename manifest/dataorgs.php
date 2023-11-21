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
			
            <div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Сведения по городам организациям</h5>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                	</div>
	                	</div>
					</div>

					<div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-hover table-bordered">
  <thead>
    <tr>
      <th>№ </th>
      <th> организации</th>
<th>Общее количетсво котельных</th>
<th>Проверенные котельные </th>
<th>Котельные не соответвующие техническим требованиям</th>
<th>Подача газа прекращена</th>
<th>Общее количество котлов </th>
<th>Проверенные котлы </th>
<th>Котлы не соответвующие техническим требованиям</th>
<th> Действия</th>

    </tr>
    </thead>
    <tbody>
    <?php 
    // $result = $DB->query("SELECT id, region_id, SUM(ischeck) as ischecksum,
    // SUM(gaz) as sumgaz,
    // SUM(flag) as sumflag, SUM(treb) as sumtreb FROM brooms GROUP BY region_id;
    // ");
    // $i = 0 ; 
    // foreach ($result as $row) :
    //     $i++ ; 
			?>
    <?php 
    $data = $_GET['id'] ;
    $result = $DB->query("SELECT * FROM brooms  WHERE city_id = '$data'");
    $i = 0 ; 
    foreach ($result as $row) :
        $i++ ; 
			?>
    <tr>
    
      <td><?php echo $i; ?></td>
      <td><?php 
      $regionid = $row["parent_id"];
        $result3 = $DB->query("SELECT * FROM regs WHERE id=$regionid");
        foreach($result3 as $row3):
        $region_id = $row3["orgname"];
        echo $region_id ;  
        endforeach ;
       
       ?></td>
      <td><?php echo $row["flag"]; ?></td>
      <td><?php echo $row["ischeck"]; ?></td>
      <td><?php echo $row["treb"]; ?></td>
      <td><?php echo $row["gaz"]; ?></td>
      <td><?php echo $row["ischeck"]; ?></td>
	  <td><?php echo $row["ischeck"]; ?></td>
      <td><?php echo $row["treb"]; ?></td>
      <td><a href="regstep2.php?id=<?php echo $row["id"];  ?>"><button class="btn btn-sm btn-info">Перейти </button></a></td>
     
      

      
    </tr>
    <?php endforeach ;  ?>

  </tbody>
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
