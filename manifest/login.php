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
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="apple-touch-icon" sizes="180x180" href="fav/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="fav/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="fav/favicon-16x16.png">
	<link rel="manifest" href="fav/site.webmanifest">
	<link rel="mask-icon" href="fav/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">
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
	<script src="assets/js/app.js"></script>

</head>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-expand-lg navbar-dark bg-indigo navbar-static">
		<div class="navbar-brand ml-2 ml-lg-0">
			<a href="login.php" class="d-inline-block">
			<?php echo showTitle() ;  ?>
			</a>
		</div>

		<div class="d-flex justify-content-end align-items-center ml-auto">
			
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Inner content -->
			<div class="content-inner">
				<!-- Content area -->
				<div class="content d-flex justify-content-center align-items-center">

					<!-- Login form -->
					<form class="login-form" method="POST" action="">
						<div class="card mb-0">
							<div class="card-body">
                            
								<div class="text-center mb-3">
                                <!-- <img src="logo.jpg" alt="" class=" rounded-pill  mb-3 mt-1" style="width:64px; height:48px;"> -->

									<i class="icon-user icon-2x text-secondary border-secondary border-3 rounded-pill p-3 mb-3 mt-1"></i>
									<h5 class="mb-0"><?php echo showTitle() ;  ?></h5>
									<span class="d-block text-muted">Пожалуйста войдите</span>
                                    <?php  
                if(isset($message))  
                {  
                     echo '<label class="text-danger">'.$message.'</label>';  
                }  
                ?>  
								</div>
                              
								<div class="form-group form-group-feedback form-group-feedback-left">
									<input type="text" name="username" class="form-control" placeholder="Логин">
									<div class="form-control-feedback">
										<i class="icon-user text-muted"></i>
									</div>
								</div>

								<div class="form-group form-group-feedback form-group-feedback-left">
									<input type="password" name="password" class="form-control" placeholder="Пароль">
									<div class="form-control-feedback">
										<i class="icon-lock2 text-muted"></i>
									</div>
								</div>

								<div class="form-group">
									<button type="submit" name="login" class="btn btn-primary btn-block">Войти</button>
								</div>

							</div>
						</div>
					</form>
					<!-- /login form -->

				</div>
				<!-- /content area -->


			</div>
			<!-- /inner content -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>
</html>
