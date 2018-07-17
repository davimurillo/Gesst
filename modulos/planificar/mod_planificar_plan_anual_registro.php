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
	  <link rel="stylesheet" type="text/css" href="../../assets/css/plugins/datatables.bootstrap.min.css"/>
	  <link href="../../assets/css/style.css" rel="stylesheet">
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
			<div class="panel box-shadow-none content-header">
                  <div class="panel-body">
                    <div class="col-md-12">
                        <h3 class="animated fadeInLeft">Registro de Plan Anual </h3>
                        <p class="animated fadeInDown">
                          <a href="index.php">Dashboard Planificar</a> <span class="fa-angle-right fa"></span> <a href="mod_planificar_plan_anual.php">Plan Anual</a>
                        </p>
                    </div>
                  </div>
            </div>
			<?php
				$empresa=$_GET['empresa']? $_GET['empresa'] : 0;
				$ano_fiscal=$_GET['ano_fiscal']? $_GET['ano_fiscal'] : 0;
				$version=$_GET['version']? $_GET['version'] : 0;
				$plan=$_GET['plan']? $_GET['plan'] : 0;
			?>
              <div class="col-md-12 top-10 padding-0">
                <div class="col-md-12">
                  <div class="panel">
                    <div class="panel-heading"><h3>Identificación del Plan</h3></div>
                    <div class="panel-body">
							<div class="col-md-12">
								<div class="form-group " >
									<label>Empresa</label>
									<select id="empresa" class="form-control">
										<option>--Seleccione--</option>
										<?php 
											$sql="SELECT id_empresa, tx_nombre FROM tbl_empresa WHERE  id_estatus=1";
											$res=abredatabase(g_BaseDatos,$sql);
											while ($row=dregistro($res)){
												$seleccion=$empresa==$row['id_empresa']? 'selected' : '';
										?>
												<option value="<?php echo $row['id_empresa']; ?>" <?php echo $seleccion; ?>><?php echo $row['tx_nombre']; ?></option>
											<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group " >
									<label>Año Fiscal</label>
									<select id="ano_fiscal" class="form-control" Onchange="javascript:busca_version(this.value);">
										<option>--Seleccione--</option>
										<?php 
											$sql="SELECT id_tipo_objeto, tx_tipo FROM cfg_tipo_objeto WHERE tx_objeto='ano_fiscal' AND id_estatus=1";
											$res=abredatabase(g_BaseDatos,$sql);
											while ($row=dregistro($res)){
												$seleccion=$ano_fiscal==$row['id_tipo_objeto']? 'selected' : '';
										?>
												<option value="<?php echo $row['id_tipo_objeto']; ?>" <?php echo $seleccion; ?>><?php echo $row['tx_tipo']; ?></option>
											<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-md-1">
								<div id="version" class="form-group " >
									<label>Versión</label>
									<input id="ultima_version"class="form-control" type="text" disabled value="<?php echo $version; ?>">
								</div>
							</div>
							<div class="col-md-9">
								<div class="form-group form-animate-text" style="margin-top:10px !important;" >
									<input id="descripcion" type="text" class="form-text"  required="" aria-required="true" value="<?php echo $plan; ?>">
									<span class="bar"></span>
									<label>Descripción del Plan</label>
								</div>
							</div>
                      </div>
                  </div>
              </div>  
			  <div class="col-md-12">
                  <div class="panel">
                    <div class="panel-heading"><h3>Contenido del Plan</h3></div>
                    <div class="panel-body">
							<div class="col-md-12">
								<div class="col-md-5">
									<div id="politicas" class="form-group" >
										<label>Política</label>
										<select id="politica" class="form-control" style="float:left" Onchange="javascript:objetivos(this.value);">
											<option>--Seleccione--</option>
											<?php 
												$sql="SELECT id_politica, tx_politica FROM mod_empresa_politica where id_estatus=1 and id_empresa=1";
												$res=abredatabase(g_BaseDatos,$sql);
												while ($row=dregistro($res)){
											?>
													<option value="<?php echo $row['id_politica']; ?>"><?php echo $row['tx_politica']; ?></option>
												<?php } ?>
										</select>
									</div>
								</div>
								<div class="col-md-1 text-left" style="padding:30px">
									<i class="icons icon-plus" style="font-size:20px"></i>
								</div>
								<div class="col-md-5">
									<div id="objetivos" class="form-group" >
										<label>Objetivo</label>
										<select id="objetivo" class="form-control">
											<option>--Seleccione--</option>
										</select>
									</div>
								</div>
								<div class="col-md-1 text-left" style="padding:30px">
									<i class="icons icon-plus" style="font-size:20px"></i>
								</div>
							</div>
							<div class="col-md-12">
								<div class="col-md-6">
									<div class="form-group form-animate-text" >
										<input id="actividad" type="text" class="form-text"  required="" aria-required="true">
										<span class="bar"></span>
										<label>Actividad</label>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group form-animate-text" >
										<input id="meta" type="text" class="form-text"  required="" aria-required="true">
										<span class="bar"></span>
										<label>Meta</label>
									</div>
								</div>
						    </div>
							<div class="col-md-12">
								<div class="col-md-6">
									<div class="form-group form-animate-text" >
										<input id="indicador" type="text" class="form-text"  required="" aria-required="true">
										<span class="bar"></span>
										<label>Indicador</label>
									</div>
								</div>
								<div class="col-md-5">
									<div id="unidad_medidas" class="form-group" style="margin-top:-10px">
										<label>Unidad de Medida</label>
										<select id="unidad" class="form-control" >
											<option>--Seleccione--</option>
											<?php 
												$sql="SELECT id_tipo_objeto, tx_tipo FROM cfg_tipo_objeto where id_estatus=1 and tx_objeto='unidad_medida'";
												$res=abredatabase(g_BaseDatos,$sql);
												while ($row=dregistro($res)){
											?>
													<option value="<?php echo $row['id_tipo_objeto']; ?>"><?php echo $row['tx_tipo']; ?></option>
												<?php } ?>
										</select>
									</div>
								</div>
								<div class="col-md-1 text-left" style="padding:30px">
									<i class="icons icon-plus" style="font-size:20px"></i>
								</div>
							</div>
							<div class="col-md-12">
								<div class="col-md-5">
									<div id="frecuencias" class="form-group" style="margin-top:-10px">
										<label>Frecuencias</label>
										<select id="frecuencia" class="form-control" >
											<option>--Seleccione--</option>
											<?php 
												$sql="SELECT id_tipo_objeto, tx_tipo FROM cfg_tipo_objeto where id_estatus=1 and tx_objeto='frecuencia'";
												$res=abredatabase(g_BaseDatos,$sql);
												while ($row=dregistro($res)){
											?>
													<option value="<?php echo $row['id_tipo_objeto']; ?>"><?php echo $row['tx_tipo']; ?></option>
												<?php } ?>
										</select>
									</div>
								</div>
								<div class="col-md-1 text-left" style="padding:30px">
									<i class="icons icon-plus" style="font-size:20px"></i>
								</div>
								<div class="col-md-6">
									<div class="form-group form-animate-text" >
										<input id="recursos" type="text" class="form-text"  required="" aria-required="true">
										<span class="bar"></span>
										<label>Recursos Necesarios</label>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="col-md-5">
									<div id="estados" class="form-group" style="margin-top:-10px">
										<label>Estado</label>
										<select id="estado" class="form-control" >
											<option>--Seleccione--</option>
											<?php 
												$sql="SELECT id_tipo_objeto, tx_tipo FROM cfg_tipo_objeto where id_estatus=1 and tx_objeto='estado_actividad'";
												$res=abredatabase(g_BaseDatos,$sql);
												while ($row=dregistro($res)){
											?>
													<option value="<?php echo $row['id_tipo_objeto']; ?>"><?php echo $row['tx_tipo']; ?></option>
												<?php } ?>
										</select>
									</div>
								</div>
								<div class="col-md-1 text-left" style="padding:30px">
									<i class="icons icon-plus" style="font-size:20px"></i>
								</div>
								<div class="col-md-6">
									<div class="form-group form-animate-text" >
										<input id="responsable" type="text" class="form-text"  required="" aria-required="true">
										<span class="bar"></span>
										<label>Responsable</label>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="col-md-12">
									<div class="form-group form-animate-text" >
										<input id="observaciones"type="text" class="form-text"  required="" aria-required="true">
										<span class="bar"></span>
										<label>Observaciones</label>
									</div>
								</div>
							</div>
							<div class="col-md-12 text-center">
								<button class="btn btn-lg btn-success" Onclick="javascript:registrar();">Registrar</button>
							</div>
                      </div>
                  </div>
              </div>  
			  <div class="col-md-12">
                  <div class="panel">
                    <div class="panel-heading"><h3>Registro de Plan</h3></div>
                    <div class="panel-body">
                      <div id="actividades" class="responsive-table">
					  <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Actividad</th>
                          <th>Meta</th>
                          <th>Indicador</th>
                          <th>Und.</th>
                          <th>Frecuencia</th>
                          <th>Responsable</th>
                          <th>Estado</th>
                          <th>Act.</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                        </table>
                      </div>
                  </div>
                </div>
              </div> 
              </div>
        </div>
    </div>
          <!-- end: content -->

<!-- plugins -->
<script src="../../asset/js/plugins/moment.min.js"></script>
<script src="../../asset/js/plugins/jquery.datatables.min.js"></script>
<script src="../../asset/js/plugins/datatables.bootstrap.min.js"></script>
<script src="../../asset/js/plugins/jquery.nicescroll.js"></script>
<!-- custom -->
<script src="../../asset/js/main.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#datatables-example').DataTable();
  });
  function objetivos(id){
	  $('#objetivos').load("mod_eventos.php",{ evento : 1, politica : id });
  }
  function busca_version(id){
	  $('#version').load("mod_eventos.php",{ evento : 8, ano_fiscal : id });
  }
  function registrar(){
	  
	   $('#actividades').load("mod_eventos.php",{ evento : 2, empresa : $('#empresa').val(), ano_fiscal : $('#ano_fiscal').val(), version : $('#ultima_version').val(), plan : $('#descripcion').val(), politica : $('#politica').val(), objetivo : $('#objetivo').val(), actividad : $('#actividad').val(), meta : $('#meta').val(), indicador : $('#indicador').val(), unidad : $('#unidad').val(), frecuencia : $('#frecuencia').val(), recurso: $('#recursos').val(), estado : $('#estado').val(), responsable : $('#responsable').val(), observaciones : $('#observaciones').val()  });
  }
  function refrescar(){
	  $('#actividades').load("mod_eventos.php",{ evento :9, empresa : $('#empresa').val(), ano_fiscal : $('#ano_fiscal').val(), version : $('#ultima_version').val()});
  }
  if (1==<?php echo $_GET['edit']; ?>){
	  refrescar();
  } 
  function borrar(id){
	    $('#actividades').load("mod_eventos.php",{ evento :11, id : id});
		refrescar();
  }
</script>
<!-- end: Javascript -->
  </body>
</html>