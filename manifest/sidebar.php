<div class="sidebar-content">

				<!-- User menu -->
				<div class="sidebar-user-material">
					<div class="sidebar-user-material-body">
						<div class="card-body text-center">
							<a href="#">
								<!-- <img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="img-fluid rounded-circle shadow-1 mb-3" width="80" height="80" alt=""> -->
							</a>
							<h6 class="mb-0 text-white text-shadow-dark"><?php echo $_SESSION["session_id"] ; ?></h6>
							<span class="font-size-sm text-white text-shadow-dark"><?php echo $_SESSION["session_username"] ; ?></span>
							<br>
							<span class="font-size-sm text-danger text-shadow-dark">ВНИМАНИЕ: программа работает в тестовом режиме</span>
						</div>
													
						<div class="sidebar-user-material-footer">
							<a href="#user-nav" class="d-flex justify-content-between align-items-center text-shadow-dark dropdown-toggle" data-toggle="collapse"><span>Аккаунт</span></a>
						</div>
					</div>

					<div class="collapse" id="user-nav">
						<ul class="nav nav-sidebar">
							<li class="nav-item">
								<a href="logout.php" class="nav-link">
									<i class="icon-switch2"></i>
									<span>Выйти</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- /user menu -->


				<!-- Main navigation -->
				<div class="card card-sidebar-mobile">
					<ul class="nav nav-sidebar" data-nav-type="accordion">

						<!-- Main -->
						<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Разделы</div> <i class="icon-menu" title="Main"></i></li>
						<li class="nav-item">
							<a href="index.php" class="nav-link">
								<i class="icon-home4"></i>
								<span>
									Главная
									<span class="d-block font-weight-normal opacity-50">Регистрация</span>
								</span>
							</a>
						</li>
                        <li class="nav-item">
							<a href="regions.php" class="nav-link">
								<i class="icon-pencil3"></i>
								<span>
									Регионы
									<span class="d-block font-weight-normal opacity-50">Добавление регионов</span>
								</span>
							</a>
						</li>
                        <li class="nav-item">
							<a href="cities.php" class="nav-link">
								<i class="icon-pencil4"></i>
								<span>
									Города/Районы
									<span class="d-block font-weight-normal opacity-50">Города и районы регионов</span>
								</span>
							</a>
						</li>
                        <li class="nav-item">
							<a href="orgs.php" class="nav-link">
								<i class="icon-copy"></i>
								<span>
									Соц сфера
									<span class="d-block font-weight-normal opacity-50">Типы организаций</span>
								</span>
							</a>
						</li>
						<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Для администратора</div> <i class="icon-menu" title="Main"></i></li>

						
                        <li class="nav-item">
							<a href="dataregions.php" class="nav-link">
								<i class="icon-copy"></i>
								<span>
									Таблица сведений
									<span class="d-block font-weight-normal opacity-50">Иерархическая структура</span>
								</span>
							</a>
						</li>

						<li class="nav-item">
							<a href="result.php" class="nav-link">
								<i class="icon-copy"></i>
								<span>
Общий свод
								<span class="d-block font-weight-normal opacity-50">Общие данные</span>
								</span>
							</a>
						</li>

						
					
						<!-- <li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-stack"></i> <span>Отчеты</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="Starter kit">
								<li class="nav-item"><a href="#" class="nav-link">По дате</a></li>
								<li class="nav-item"><a href="#" class="nav-link">По организациям</a></li>
								<li class="nav-item"><a href="#" class="nav-link">По проблемам</a></li>
							</ul>
						</li>
					 -->
						<!-- /page kits -->

					</ul>
				</div>
				<!-- /main navigation -->

			</div>