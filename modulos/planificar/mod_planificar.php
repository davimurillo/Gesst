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
$dir="../"; require_once('../common.php'); checkUser(); 
?>
<head>
	<meta charset="utf-8">
	<meta name="description" content="Salud, Trabajo, Ocupación, Seguridad">
	<meta name="author" content="Gessalud">
	<meta name="keyword" content="Salud, Trabajo, Ocupación, Seguridad">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gesstrab</title>
    <!-- start: Css -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
	<script src="../../assets/js/jquery.min.js"></script>
	<script src="../../assets/js/bootstrap.min.js"></script>
      <!-- plugins -->
      <link rel="stylesheet" type="text/css" href="../../assets/css/plugins/font-awesome.min.css"/>
      <link rel="stylesheet" type="text/css" href="../../assets/css/plugins/simple-line-icons.css"/>
      <link rel="stylesheet" type="text/css" href="../../assets/css/plugins/animate.min.css"/>
	<!-- end: Css -->
	<link rel="shortcut icon" href="../../img/logos/logo.png">

  </head>
 <body id="mimin" class="dashboard">
      <!-- start: Header -->
		<?php require("../cabecera.php"); ?>
	  <!-- end: Header -->
    <div class="container-fluid mimin-wrapper">
           <!-- start:Left Menu -->
		   <?php require("cfg_menu_izquierdo_planificar.php"); ?>
		    <!-- end:Left Menu -->
          <!-- start: content -->
        <div id="content">
                <div class="col-md-12" style="padding:20px;">
				<div class="col-md-12 padding-0">
						<div class="col-md-12 padding-0">
							
							<div class="col-md-3">
								<a href="mod_planificar_plan_anual.php" >
									<div class="panel box-v1">
										<div class="progress progress-mini">
												<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
												</div>
										</div>
										<div class="panel-heading bg-white border-none">
											<div class="col-md-12 col-sm-12 col-xs-12 text-left">
													<span class=" icon-direction icon text-left" style="font-Size:24px"></span>
											</div>
										</div>
										<div class="panel-body text-left" style="margin-top:-20px">
											<h1><strong>Plan Anual</strong></h1>
											<p>Politicas, Objetivos y Metas</p>
										</div>
									</div>
								</a>
							</div>
							<div class="col-md-3">
								<a href="mod_planificar_plan_anual_iper.php" >
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
										<h1><strong>Plan IPER</strong></h1>
										<p>Plan de Evaluación de Riesgos</p>
									</div>
								</div>
								</a>
							</div>
							<div class="col-md-3">
								<a href="mod_planificar_plan_anual_mapa_riesgo.php" >
									<div class="panel box-v1">
										<div class="progress progress-mini">
												<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
												</div>
										</div>
										<div class="panel-heading bg-white border-none">
											<div class="col-md-12 col-sm-12 col-xs-12 text-left">
													<span class="icon-map icon text-left" style="font-Size:24px"></span>
											</div>
										</div>
										<div class="panel-body text-left" style="margin-top:-20px">
											<h1><strong>Mapa de Riesgo</strong></h1>
											<p>Identificación y Puntos de Riesgos</p>
										</div>
									</div>
								</a>
							</div>
							<div class="col-md-3">
								<div class="panel box-v1">
									<div class="progress progress-mini">
											<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
											</div>
									</div>
									<div class="panel-heading bg-white border-none">
										<div class="col-md-12 col-sm-12 col-xs-12 text-left">
												<span class=" icon-drawar icon text-left" style="font-Size:24px"></span>
										</div>
									</div>
									<div class="panel-body text-left" style="margin-top:-20px">
										<h1><strong>Repositorio</strong></h1>
										<p>Documentos, Images, Videos ...</p>
									</div>
								</div>
							</div>
					
					</div>
                    
					
      		</div>
      		</div>
      		</div>

  </body>
</html>