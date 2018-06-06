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
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="description" content="Salud, Trabajo, Ocupación, Seguridad">
	<meta name="author" content="Gessalud">
	<meta name="keyword" content="Salud, Trabajo, Ocupación, Seguridad">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gesstrab</title>
    <!-- start: Css -->
    <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">
      <!-- plugins -->
      <link rel="stylesheet" type="text/css" href="asset/css/plugins/font-awesome.min.css"/>
      <link rel="stylesheet" type="text/css" href="asset/css/plugins/simple-line-icons.css"/>
      <link rel="stylesheet" type="text/css" href="asset/css/plugins/animate.min.css"/>
      <link rel="stylesheet" type="text/css" href="asset/css/plugins/fullcalendar.min.css"/>
	 
	<!-- end: Css -->
	<link rel="shortcut icon" href="../img/logos/logo.png">
	<style>
		body {
		  font-family: "Source Sans Pro","Helvetica Neue",Helvetica,Arial,sans-serif;
		  font-size: 13px;
		  background-color:#f0f3f4;
		  line-height: 1.42857143 !important;
		  color: #58666e !important;
		}
		.cabecera{
			width: 100%;
			height: 60px;
			color:#ccc; font-size: 12px;  
			background-color:#333;
			-moz-border-radius: 2px;
			-webkit-border-radius: 2px;
			border-radius: 2px;
			-moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
			-webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
			box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
			position: fixed;
		}
		.izquierdo{
			margin-top:61px;
		}
		.sub-left-menu{
			height: 100px;
			left: 0;
			position: relative;
			margin-left: -2px;
			width:300px;
			
		}
		#left-menu .sub-left-menu {
		  background-color: #fff;
		  z-index: 222;
		  left:0px;
		  width: 230px;
		  height: 100%;
		  position: fixed;
		  overflow-y: auto;
		  -webkit-box-shadow: 0 2px 5px 0 rgba(239, 235, 235, 0.16), 0 2px 10px 0 rgba(72, 70, 70, 0.12);
		  -moz-box-shadow: 0 2px 5px 0 rgba(239, 235, 235, 0.16), 0 2px 10px 0 rgba(72, 70, 70, 0.12);
		  -ms-box-shadow: 0 2px 5px 0 rgba(239, 235, 235, 0.16), 0 2px 10px 0 rgba(72, 70, 70, 0.12);
		  -o-box-shadow: 0 2px 5px 0 rgba(239, 235, 235, 0.16), 0 2px 10px 0 rgba(72, 70, 70, 0.12);
		  box-shadow: 0 2px 5px 0 rgba(239, 235, 235, 0.16), 0 2px 10px 0 rgba(72, 70, 70, 0.12);
		}
		#left-menu .sub-left-menu a {
		  color: #918C8C;
		  font-Size: 16px;
		  font-weight: 500;
		  line-height: 30px;
		}
		#left-menu .sub-left-menu .time h1 {
		  font-weight: 500;
		  font-family: "open sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
		  font-size: 50px;
		  text-align: center;
		  color: #918C8C;
		}
		#left-menu .sub-left-menu .time p {
		  margin-top: -25px;
		  text-align: center;
		  font-size: 12px;
		  color: #918C8C;
		}
		#left-menu .sub-left-menu li ripple:hover {
		  background: #ccc;
		  -webkit-text-decoration: none;
		  -moz-text-decoration: none;
		  -ms-text-decoration: none;
		  -o-text-decoration: none;
		  text-decoration: none;
		}
		#left-menu .sub-left-menu span {
		  padding-right: 10px;
		}
		#left-menu .sub-left-menu li {
		  line-height: 44px;
		  padding-left:10px;
		  border-bottom: 1px solid #ccc;
		}
		#content {
		  margin-top: 51px;
		  padding: 0px;
		  padding-bottom: 10px;
		  padding-left: 230px;
		  width: 100%;
		  color: #918C8C;
		}
		a,
		a:hover {
		  -webkit-text-decoration: none;
		  -moz-text-decoration: none;
		  -ms-text-decoration: none;
		  -o-text-decoration: none;
		  text-decoration: none;
		  color: #888;
		  font-weight: bold;
		}
		a h1{
			 font-Size: 2em;
		}
		a p{
			 font-Size: 0.9em;
		}
		.logo{
			margin: 10px 5px 0px 20px;
		}
		.inputsearch{
			margin: 8px 0px 8px 0px;
			width:96%
		}
	</style>
  </head>
 <body id="mimin" class="dashboard">
      <div class="cabecera"> 
		<div class="logo"><img src="../img/logos/logo.png"> GESSTRAB v 1.0</div>
	  </div>
	   <div class="container-fluid mimin-wrapper">
		  <div class="izquierdo" > 
			<div class="menu">
				<div id="left-menu">
				  <div class="sub-left-menu" >
					<ul class="nav nav-list scroll ">
						<li class="time">
						  <h1 class="animated fadeInLeft" style="font-size:50px">21:00</h1>
						  <p class="animated fadeInRight">Sat,October 1st 2029</p>
						</li>
						<li class="ripple" >
						 <input class="form-control inputsearch" placeholder="Buscar">
						</li>
						<li class="ripple" >
						  <a href="index.php" class=" nav-header"><span class="icons icon-screen-desktop"></span> Dashboard 
						  </a>
						</li>
						<li class="ripple">
						  <a class="tree-toggle nav-header">
							<span class="icons  icon-grid"></span> Empresa
						  </a>
						</li>					
					   <li class="ripple">
						  <a class="tree-toggle nav-header">
							<span class="icons icon-grid"></span> PHVA
						  </a>
						</li>
						<li class="ripple">
						  <a class="tree-toggle nav-header">
							<span class="icons icon-printer"></span> Reportes
						  </a>
						</li>
						<li class="ripple">
						  <a class="tree-toggle nav-header">
							<span class="icons icon-grid"></span> Configurar
						  </a>
						</li>
						<li><a href="credits.html"> <span class="icons icon-question"></span> Ayuda</a></li>
					  </ul>
					</div>
				</div>
			</div>
		  </div>
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