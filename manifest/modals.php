
<?php 
							if (isset($_POST['addregionname']))
								{
	$regionname=$_POST['regionname'] ; 
	
	
	if ($DB->query("INSERT INTO regionsname (id,regionname )
	 VALUES(?,?)", array(null,"$regionname"))); {
    echo "<div class='alert alert-success alert-styled-right alert-arrow-right alert-bordered'>
										<button type='button' class='close' data-dismiss'alert'><span>×</span><span class='sr-only'>Close</span></button>
										<span class='text-semibold'>Регион добавлен!</span> 
								    </div>" ;
    echo "<script>
    
    $( '#maindiv' ).load(window.location.href + ' #maindiv' );

        </script>" ;
									
						}
					}


//добавить город для области 


                    if (isset($_POST['addcity']))
								{
	$cityname=$_POST['cityname'] ; 
	$regionname=$_POST['regionname'] ; 
	
	
	if ($DB->query("INSERT INTO cityname (id,cityname, regionname )
	 VALUES(?,?,?)", array(null, "$cityname" ,"$regionname"))); {
    echo "<div class='alert alert-success alert-styled-right alert-arrow-right alert-bordered'>
										<button type='button' class='close' data-dismiss'alert'><span>×</span><span class='sr-only'>Close</span></button>
										<span class='text-semibold'>Город/район добавлен!</span> 
								    </div>" ;
    echo "<script>

    $( '#maindiv' ).load(window.location.href + ' #maindiv' );

        </script>" ;	
						}
					}


                    //добавить тип 


                    if (isset($_POST['addtype']))
								{
	$type=$_POST['type'] ; 
	
	
	if ($DB->query("INSERT INTO types (id,typename) VALUES(?,?)", array(null, "$type" ))); {
    echo "<div class='alert alert-success alert-styled-right alert-arrow-right alert-bordered'>
										<button type='button' class='close' data-dismiss'alert'><span>×</span><span class='sr-only'>Close</span></button>
										<span class='text-semibold'>Тип организации добавлен!</span> 
								    </div>" ;
    echo "<script>

    $( '#maindiv' ).load(window.location.href + ' #maindiv' );

        </script>" ; 
									
						}
					}
								?>

<!-- Добавить регион -->
<!-- Добавление котельной -->
<?php 
							if (isset($_POST['addbroom']))
							{
								
$broomname=$_POST['broomname'] ; 
$parent_id=$_POST['parent_id'] ; 
$region_id=$_POST['region_id'] ; 
$city_id=$_POST['city_id'] ; 
$topl=$_POST['topl'] ; 
$gaz=$_POST['gaz'] ; 
$treb=$_POST['treb'] ; 
$ischeck=0 ; 
$isorder=1 ; 
$flag=1 ; 
$broomdesc=$_POST['broomdesc'] ;


if ($DB->query("INSERT INTO brooms (id,broomname,  region_id, city_id ,parent_id, ischeck, isorder, broomdesc, topl, gaz, flag, treb )
VALUES(?,?,?,?,?,?,?,?,?,?,?,?)", array(null, "$broomname" ,"$region_id" ,"$city_id" ,"$parent_id" ,"$ischeck" ,"$isorder" ,"$broomdesc" ,"$topl" ,"$gaz" ,"$flag","$treb"))); {
echo "<div class='alert alert-success alert-styled-right alert-arrow-right alert-bordered'>
									<button type='button' class='close' data-dismiss'alert'><span>×</span><span class='sr-only'>Close</span></button>
									<span class='text-semibold'>Котельная добавлена!</span> 
								</div>" ;
echo "<script>

$( '#maindiv' ).load(window.location.href + ' #maindiv' );

	</script>" ;	
					}
				}
						?>



<?php 
	if (isset($_POST['addbroomcheck']))
	{
		$state_string = implode(', ', $_POST['checkregionname']);

$checkdescription=$_POST['checkdescription'] ; 
$idkl=$_POST['idkl'] ; 


if ($DB->query("INSERT INTO broomcheck (id,problems, checkdescription, broom_id )
VALUES(?,?,?,?)", array(null, "$state_string" ,"$checkdescription", "$idkl")));

$DB->query("UPDATE brooms SET ischeck = ? WHERE id = ?", array("1","$idkl"));

{
echo "<div class='alert alert-success alert-styled-right alert-arrow-right alert-bordered'>
			<button type='button' class='close' data-dismiss'alert'><span>×</span><span class='sr-only'>Close</span></button>
			<span class='text-semibold'>Успешно добавлено!</span> 
		</div>" ;
echo "<script>

$( '#maindiv' ).load(window.location.href + ' #maindiv' );

</script>" ;	
}
}
?>
<!-- Добавить котел -->

<?php 
							if (isset($_POST['addb']))
							{
								
$kotel=$_POST['bname'] ; 
$broomid=$_POST['broomid'] ; 

$parent_id=$_POST['parent_id'] ; 
$region_id=$_POST['region_id'] ; 
$city_id=$_POST['city_id'] ;

$topl=$_POST['toplb'] ; 
$gaz=$_POST['gazboiler'] ; 
$treb=$_POST['trebboiler'] ; 
$ischeck=0 ; 
$flag=1 ; 

if ($DB->query("INSERT INTO boilers (id,kotel,  broom_id, region_id ,city_id,parent_id, ischeck, topl, flag, treb, gaz )
VALUES(?,?,?,?,?,?,?,?,?,?,?)", array(null, "$kotel" , "$broomid" ,"$region_id" ,"$city_id" ,"$parent_id" ,"$ischeck" ,"$topl" ,"$flag" ,"$treb" ,"$gaz"))); {
echo "<div class='alert alert-success alert-styled-right alert-arrow-right alert-bordered'>
									<button type='button' class='close' data-dismiss'alert'><span>×</span><span class='sr-only'>Close</span></button>
									<span class='text-semibold'>Успещно добавлено!</span> 
								</div>" ;
echo "<script>
$( '#maindiv' ).load(window.location.href + ' #maindiv' );
	</script>" ;	
					}
				}
						?>





<!-- Проверка котла -->


						
                
                <div id="addregion" class="modal fade" tabindex="-1">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Добавить регион (область)</h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>

							<form action="" method="POST">
								<div class="modal-body">
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6">
												<label>Название региона</label>
												<input type="text" name="regionname" placeholder="Название региона (области)" class="form-control">
											</div>

										</div>
									</div>
								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-link" data-dismiss="modal">Закрыть</button>
									<button type="submit" name="addregionname" class="btn bg-primary">Сохранить</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- /Добавить регион -->


                <!-- Добавить город -->
                
                <div id="addcity" class="modal fade" tabindex="-1">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Добавить город/район </h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>

							<form action="" method="POST">
								<div class="modal-body">
									<div class="form-group">
										<div class="row">
                                        <label class="col-lg-5 col-form-label">Название города/района</label>
											<div class="col-sm-7">
												<input type="text" name="cityname" placeholder="Название города или района" class="form-control">
											</div>

											
										</div>
									</div>

                                    <div class="form-group row">
											<label class="col-lg-5 col-form-label">Выберите область</label>
											<div class="col-lg-7">
												<select name="regionname"  data-placeholder="Выберите область" class="form-control form-control-select2" data-fouc>
													<option></option>
													<?php
                                                    $result =  $DB->query("SELECT * FROM regionsname");
                                                    foreach($result as $row): ?>
														<option value="<?php echo $row["id"]; ?>"><?php echo $row["regionname"]; ?></option>
												    <?php endforeach ; ?>
												</select>
											</div>
										</div>

								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-link" data-dismiss="modal">Закрыть</button>
									<button type="submit" name="addcity" class="btn bg-primary">Сохранить</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- /Добавить город -->


                <!-- Добавить тип -->
                
                <div id="addtype" class="modal fade" tabindex="-1">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Добавить тип организации </h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>

							<form action="" method="POST">
								<div class="modal-body">
									<div class="form-group">
										<div class="row">
                                        <label class="col-lg-5 col-form-label">Тип для организации</label>
											<div class="col-sm-7">
												<input type="text" name="type" placeholder="Введите тип" class="form-control">
											</div>
										</div>
									</div>

                                    
									
								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-link" data-dismiss="modal">Закрыть</button>
									<button type="submit" name="addtype" class="btn bg-primary">Сохранить</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- /Добавить тип -->




				<!-- Добавить  бойлерную -->
                <div id="addbroom" class="modal fade" tabindex="-1">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Добавить котельную </h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<form action="" method="POST">
								<div class="modal-body">
									<div class="form-group">
										<div class="row">
                                        <label class="col-lg-5 col-form-label">Название котельной</label>
											<div class="col-sm-7">
												<input type="text" name="broomname" placeholder="" class="form-control">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
                                        <label class="col-lg-5 col-form-label">Описание</label>
											<div class="col-sm-7">
												<input type="text" name="broomdesc" placeholder="" class="form-control">
											</div>
										</div>
									</div>

									<div class="form-group row">
											<label class="col-lg-5 col-form-label">Топливо</label>
											<div class="col-lg-7">
												<select name="topl"  data-placeholder="Выберите один" class="form-control form-control-select2" data-fouc>
													<option>Газ</option>
													<option>Уголь</option>
													
												</select>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-lg-5 col-form-label">Подача газа</label>
											<div class="col-lg-7">
												<select name="gaz"  data-placeholder="Выберите один" class="form-control form-control-select2" data-fouc>
													<option value="0">Не прекращено</option>
													<option value="1">Прекращено</option>
													
												</select>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-lg-5 col-form-label">Соответсвие техническим требованиям</label>
											<div class="col-lg-7">
												<select name="treb"  data-placeholder="Выберите один" class="form-control form-control-select2" data-fouc>
													<option value="0">Соответсвует</option>
													<option value="1">Не соответсвует</option>
													
												</select>
											</div>
										</div>
								

                                    <input type="hidden" value="<?php echo $_GET['id'] ?>" name="parent_id">
                                    <input type="hidden" value="<?php echo $_GET['region'] ?>" name="region_id">
                                    <input type="hidden" value="<?php echo $_GET['city_id'] ?>" name="city_id">
									
								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-link" data-dismiss="modal">Закрыть</button>
									<button type="submit" name="addbroom" class="btn bg-primary">Сохранить</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- /Добавить проблему бойлерную -->




				<!-- #addbroomcheck -->
                
                <div id="addbroomcheck" class="modal fade modal-full" tabindex="-1">
					<div class="modal-dialog modal-full">
						<div class="modal-content modal-full">
							<div class="modal-header">
								<h5 class="modal-title">Проверка котельной </h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>

							<form action="" method="POST">
								<div class="modal-body">
									
									
									<div class="form-group row">
											<label class="col-lg-5 col-form-label">Выберите проблему</label>
											<div class="col-lg-7">
												<select name="checkregionname[]" multiple="multiple" data-placeholder="Выберите область" class="form-control form-control-select2" data-fouc>
													<option>Наличие и ведение журнала дежурства по котельной в учреждении.
(глава 3 п.136 Правил охраны труда при устройстве и эксплуатации водогрейных котлов высокого давления, водогрейных и паровых котлов)</option>
													<option>Операторы котлов прошли обучение и проверку знаний.
(п. 4 «Типовой инструкции» Минюста, зарегистрированной № 272 14 августа 1996 г.)</option>
													<option>Наличие проекта котельной.
 (КМК 2.04.13-99 Котельные установки) Глава 2
</option>
													<option>Установка и наладка водяных насосов (рабочих и запасных) для циркуляции воды в котельной (только для системы принудительной циркуляции воды).
(глава 4 п. 229 правил охраны труда при устройстве и эксплуатации водогрейных котлов высокого давления, водогрейных и паровых котлов)</option>
													<option>Состояние светотехнического оборудования котельной (есть/отсутствует, защитный кожух есть/отсутствует).
(КМК 2.04.13-99 Котельные установки) п.14.14
</option>
													<option>Общее состояние котельной (крыша, окна и т.д.).
(глава 2 п.76 правил охраны труда при устройстве и эксплуатации водогрейных котлов высокого давления, водогрейных и паровых котлов)</option>
													
												</select>
											</div>
										</div>
										<div class="form-group">
										<div class="row">
                                        <label class="col-lg-5 col-form-label">Описание</label>
											<div class="col-sm-7">
												<input type="text" name="checkdescription" placeholder="" class="form-control">
											</div>
										</div>
									</div>
									<input type="hidden" class="form-control" name="idkl" id="idkl" value="">

									
								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-link" data-dismiss="modal">Закрыть</button>
									<button type="submit" name="addbroomcheck" class="btn bg-primary">Сохранить</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- /#addbroomcheck -->










				<!-- Добавить  котел -->
                
                <div id="addb" class="modal fade" tabindex="-1">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Добавить котел </h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							
							<form action="" method="POST">
								<div class="modal-body">
									<div class="form-group">
										<div class="row">
                                        <label class="col-lg-5 col-form-label">Марка котла</label>
											<div class="col-sm-7">
												<input type="text" name="bname" placeholder="" class="form-control">
											</div>
										</div>
									</div>
									<!-- <input type="text" class="form-control" name="idkl2" id="idkl2" value=""> -->
									
									<div class="form-group row">
											<label class="col-lg-5 col-form-label">К какому котельному относится</label>
											<div class="col-lg-7">
												<select name="broomid"  data-placeholder="Выберите" class="form-control form-control-select2" data-fouc>
												<option></option>
												<?php
                                                    $result =  $DB->query("SELECT * FROM brooms ");
                                                    foreach($result as $row): ?>
														<option value="<?php echo $row["id"]; ?>"><?php echo $row["broomname"]; ?></option>
												    <?php endforeach ; ?>
												</select>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-lg-5 col-form-label">Подача газа</label>
											<div class="col-lg-7">
												<select name="gazboiler"  data-placeholder="Выберите один" class="form-control form-control-select2" data-fouc>
													<option value="0">Не прекращено</option>
													<option value="1">Прекращено</option>
													
												</select>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-lg-5 col-form-label">Соответсвие техническим требованиям</label>
											<div class="col-lg-7">
												<select name="trebboiler"  data-placeholder="Выберите один" class="form-control form-control-select2" data-fouc>
													<option value="1">Соответсвует</option>
													<option value="0">Не соответсвует</option>
												</select>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-lg-5 col-form-label">Топливо</label>
											<div class="col-lg-7">
												<select name="toplb"  data-placeholder="Выберите один" class="form-control form-control-select2" data-fouc>
													<option>Газ</option>
													<option>Уголь</option>													
												</select>
											</div>
										</div>
										
										<input type="hidden" value="<?php echo $_GET['id'] ?>" name="parent_id">
                                    <input type="hidden" value="<?php echo $_GET['region'] ?>" name="region_id">
                                    <input type="hidden" value="<?php echo $_GET['city_id'] ?>" name="city_id">
								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-link" data-dismiss="modal">Закрыть</button>
									<button type="submit" name="addb" class="btn bg-primary">Сохранить</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- /Добавить проблему бойлерную -->





				<?php 
	if (isset($_POST['addbcheck']))
	{
		$state_string = implode(', ', $_POST['boilerprobs']);

$boilercheckdesc=$_POST['boilercheckdesc'] ; 
$idkl=$_POST['idkl2'] ; 


if ($DB->query("INSERT INTO boilercheck (id,problems, checkdescription, boiler_id )
VALUES(?,?,?,?)", array(null, "$state_string" ,"$boilercheckdesc", "$idkl")));

$DB->query("UPDATE boilers SET ischeck = ? WHERE id = ?", array("1","$idkl"));

{
echo "<div class='alert alert-success alert-styled-right alert-arrow-right alert-bordered'>
			<button type='button' class='close' data-dismiss'alert'><span>×</span><span class='sr-only'>Close</span></button>
			<span class='text-semibold'>Успешно добавлено!</span> 
		</div>" ;
echo "<script>

$( '#maindiv' ).load(window.location.href + ' #maindiv' );

</script>" ;	
}
}
?>


				<!-- #addbroomcheck -->
                
                <div id="addbcheck" class="modal fade modal-full" tabindex="-1">
					<div class="modal-dialog modal-full">
						<div class="modal-content modal-full">
							<div class="modal-header">
								<h5 class="modal-title">Проверка котла </h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>

							<form action="" method="POST">
								<div class="modal-body">
									
									
									<div class="form-group row">
											<label class="col-lg-5 col-form-label">Выберите проблему</label>
											<div class="col-lg-7">
												<select name="boilerprobs[]" multiple="multiple" data-placeholder="Выберите область" class="form-control form-control-select2" data-fouc>
													<option>Состояние дымоходов котлов</option>
													<option>Лицо, ответственное за обслуживание котлов в учреждении, прикрепляется приказом.
(глава 3 п.135 Правил по охране труда при устройстве и эксплуатации водогрейных котлов высокого давления, водогрейных и паровых котлов)</option>
													<option>Наличие паспортов котлов.
(глава 3 п.136 Правил охраны труда при устройстве и эксплуатации водогрейных котлов высокого давления, водогрейных и паровых котлов)</option>
													<option>Наличие и настройка автомата регулирования температуры воды в котле, превышающей установленную норму).
(глава 4 п. 244 правил охраны труда при устройстве и эксплуатации водогрейных котлов высокого давления, водогрейных и паровых котлов)</option>
													<option>Наличие и настройка автомата регулирования температуры воды в котле, превышающей установленную норму).
(глава 4 п. 244 правил охраны труда при устройстве и эксплуатации водогрейных котлов высокого давления, водогрейных и паровых котлов)</option>
													<option>наличие, состояние и сравнение клапана, предохраняющего от повышения давления в котле).
(глава 4 п. 237 правил охраны труда при устройстве и эксплуатации водогрейных котлов высокого давления, водогрейных и паровых котлов)</option>
													<option>Установка автоматической газовой защиты на горелку и ее регулировка.
(глава 4 п. 244 правил охраны труда при устройстве и эксплуатации водогрейных котлов высокого давления, водогрейных и паровых котлов)</option>
													<option>Состояние горелки котла (горелка ручной работы или сертифицирована).
(глава 4 п. 244 правил охраны труда при устройстве и эксплуатации водогрейных котлов высокого давления, водогрейных и паровых котлов)</option>
													
													
												</select>
											</div>
										</div>
										<div class="form-group">
										<div class="row">
                                        <label class="col-lg-5 col-form-label">Описание</label>
											<div class="col-sm-7">
												<input type="text" name="boilercheckdesc" placeholder="" class="form-control">
											</div>
										</div>
									</div>
                                    
									<input type="text" class="form-control" name="idkl2" id="idkl2" value="">

								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-link" data-dismiss="modal">Закрыть</button>
									<button type="submit" name="addbcheck" class="btn bg-primary">Сохранить</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- /#addbroomcheck -->