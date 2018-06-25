<!DOCTYPE html>
<html lang="en">
<?php 
/*
Sistema: Gessalud
Author: Davi Murillo
Description: Sistema de Seguridad y Salud Ocupacional.
Version: 1.0
Tags: seguridad, salud, ocupacional, PAVH, IPER
*/
require_once('common.php'); checkUser(); 
?>
<head>
	<meta charset="utf-8">
	<meta name="description" content="Salud, Trabajo, Ocupación, Seguridad">
	<meta name="author" content="Gessalud">
	<meta name="keyword" content="Salud, Trabajo, Ocupación, Seguridad">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gesstrab</title>
    <!-- start: Css -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
	<script src="../assets/js/jquery.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
      <!-- plugins -->
      <link rel="stylesheet" type="text/css" href="../assets/css/plugins/font-awesome.min.css"/>
      <link rel="stylesheet" type="text/css" href="../assets/css/plugins/simple-line-icons.css"/>
      <link rel="stylesheet" type="text/css" href="../assets/css/plugins/animate.min.css"/>
	<!-- end: Css -->
	<link rel="shortcut icon" href="../img/logos/logo.png">

  </head>
 <body id="mimin" class="dashboard">
      <?php require("cabecera.php"); ?>
	   <div class="container-fluid mimin-wrapper">
		   <?php require("menu_izquierdo.php"); ?>
		  <div id="content">
            <div class="col-md-12" style="padding:20px; ">
				<div class="col-md-12 padding-0">
						<div class="col-md-12 padding-0">
							<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
								<a href="mod_planificar.php"  >
									<div class="panel box-v1">
										<div class="progress progress-mini">
												<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
												</div>
										</div>
										<div class="panel-heading bg-white border-none">
											<div class="col-md-12 col-sm-12 col-xs-12 text-left">
													<span class="icon-briefcase icon text-left" style="font-Size:24px"></span>
											</div>
										</div>
										<div class="panel-body text-left" style="margin-top:-20px">
											<h1><strong>Planificar</strong></h1>
											<p>¿Que, Cuando, Donde y Porque?</p>
										</div>
									</div>
								</a>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
								<a href="mod_hacer.php" >
									<div class="panel box-v1">
										<div class="progress progress-mini">
												<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
												</div>
										</div>
										<div class="panel-heading bg-white border-none">
											<div class="col-md-12 col-sm-12 col-xs-12 text-left">
													<span class="icon-layers icon text-left" style="font-Size:24px"></span>
											</div>
										</div>
										<div class="panel-body text-left" style="margin-top:-20px">
											<h1><strong>Hacer</strong></h1>
											<p>Ejecutar, Medir y Documentar</p>
										</div>
									</div>
								</a>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
								<a href="mod_verificar.php" >
									<div class="panel box-v1">
										<div class="progress progress-mini">
												<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
												</div>
										</div>
										<div class="panel-heading bg-white border-none">
											<div class="col-md-12 col-sm-12 col-xs-12 text-left">
													<span class="icon-check icon text-left" style="font-Size:24px"></span>
											</div>
										</div>
										<div class="panel-body text-left" style="margin-top:-20px">
											<h1><strong>Verificar</strong></h1>
											<p>Logros, Efectividad e Impacto</p>
										</div>
									</div>
								</a>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
								<a href="mod_actuar.php" >
									<div class="panel box-v1">
										<div class="progress progress-mini">
												<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
												</div>
										</div>
										<div class="panel-heading bg-white border-none">
											<div class="col-md-12 col-sm-12 col-xs-12 text-left">
													<span class="icon-clock icon text-left" style="font-Size:24px"></span>
											</div>
										</div>
										<div class="panel-body text-left" style="margin-top:-20px">
											<h1><strong>Actuar</strong></h1>
											<p>Corregir, Implementar y Aprender</p>
										</div>
									</div>
								</a>
							</div>
					</div>
				</div>
			</div>
		  </div>
		</div>
  </body>
</html>