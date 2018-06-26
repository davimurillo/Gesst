 <?php require_once('common.php'); checkUser(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="description" content="Miminium Admin Template v.1">
	<meta name="author" content="Isna Nur Azis">
	<meta name="keyword" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gessalud</title>
    <!-- start: Css -->
    <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">
      <!-- plugins -->
      <link rel="stylesheet" type="text/css" href="asset/css/plugins/font-awesome.min.css"/>
	  <link rel="stylesheet" type="text/css" href="asset/css/plugins/simple-line-icons.css"/>
      <link rel="stylesheet" type="text/css" href="asset/css/plugins/animate.min.css"/>
	  <link rel="stylesheet" type="text/css" href="asset/css/plugins/datatables.bootstrap.min.css"/>
	<link href="asset/css/style.css" rel="stylesheet">
	<!-- end: Css -->
	<link rel="shortcut icon" href="asset/img/logomi.png">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
 <body id="mimin" class="dashboard">
      <!-- start: Header -->
			  <?php require("cfg_cabecera.php"); ?>
	  <!-- end: Header -->
    <div class="container-fluid mimin-wrapper">
           <!-- start:Left Menu -->
		     <?php require("cfg_menu_izquierdo_planificar.php"); 
				$empresa=$_GET['empresa']? $_GET['empresa'] : 0;
				$ano_fiscal=$_GET['ano_fiscal']? $_GET['ano_fiscal'] : 0;
				$version=$_GET['version']? $_GET['version'] : 0;
				$editar=$_GET['edit']? $_GET['edit'] : 0;
				if (isset($_GET['ano_fiscal']) && isset($_GET['version'])){		
					 $sql="SELECT tx_plan FROM mod_empresa_plan_iper WHERE  id_ano_fiscal=".$_GET['ano_fiscal']." AND  id_version=".$_GET['version'];
					$res=abredatabase(g_BaseDatos,$sql);
					$row=dregistro($res);
					$plan=$row['tx_plan'];
				}else{
					$plan='';
				}
				
			 ?>
		    <!-- end:Left Menu -->
          <!-- start: content -->
        <div id="content">
			<div class="panel box-shadow-none content-header">
                  <div class="panel-body">
                    <div class="col-md-12">
                        <h3 class="animated fadeInLeft">Registro de Plan IPER </h3>
                        <p class="animated fadeInDown">
                          <a href="index.php">Dashboard Planificar</a> <span class="fa-angle-right fa"></span> <a href="mod_planificar_plan_anual_iper.php">Plan IPER </a>
                        </p>
                    </div>
                  </div>
            </div>
              <div class="col-md-12 top-10 padding-0">
                <div class="col-md-12">
                  <div class="panel">
                    <div class="panel-heading"><h3>Identificación del Plan de Riesgo</h3></div>
                    <div class="panel-body">
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
									<input id="ultima_version"class="form-control" type="text" disabled value="<?php echo $version; ?>" style="text-align:center">
								</div>
							</div>
							<div class="col-md-9">
								<div class="form-group form-animate-text" style="margin-top:10px !important;" >
									<input id="descripcion" type="text" class="form-text"  required="" aria-required="true" value="<?php echo $plan; ?>">
									<span class="bar"></span>
									<label>Descripción del Plan de Riesgo</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group " >
									<label>Empresa</label>
									<select id="empresa" class="form-control" Onchange="javascript:empresa(this.value);">
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
							<div class="col-md-6">
								<div id="sucursales" class="form-group " >
									<label>Sucursal</label>
									<select id="sucursal" class="form-control">
										<option>--Seleccione--</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div id="areas" class="form-group " >
									<label>Area</label>
									<select id="area" class="form-control">
										<option>--Seleccione--</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div id="cargos" class="form-group " >
									<label>Cargo</label>
									<select id="cargo" class="form-control">
										<option>--Seleccione--</option>
									</select>
								</div>
							</div>
							<div class="col-md-11">
								<div id="procesos" class="form-group" >
									<label>Proceso</label>
									<select id="proceso" class="form-control" >
										<option>--Seleccione--</option>
									</select>
								</div>
							</div>
							<div class="col-md-1 text-left" style="padding:30px">
								<i class="icons icon-plus" style="font-size:20px"></i>
							</div>
                      </div>
                  </div>
              </div>  
			  <div class="col-md-12">
                  <div class="panel">
                    <div class="panel-heading">
								<h3 class="col-lg-11">Contenido del Plan de Riesgo</h3>
								<h3 class="col-lg-offset-1"><i class="fa fa-minus" onclick="javascript:toogle();" ></i></h3>
					</div>
                    <div id="contenido" class="panel-body">
							<div class="col-md-6">
								<div class="form-group form-animate-text" >
									<input id="actividad" type="text" class="form-text"  required="" aria-required="true">
									<span class="bar"></span>
									<label>Actividad</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group form-animate-text" >
									<input id="peligro" type="text" class="form-text"  required="" aria-required="true">
									<span class="bar"></span>
									<label>Peligro</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group form-animate-text" >
									<input id="consecuencia" type="text" class="form-text"  required="" aria-required="true">
									<span class="bar"></span>
									<label>Consecuencia/Riesgo</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group form-animate-text" >
									<input id="requisitos" type="text" class="form-text"  required="" aria-required="true">
									<span class="bar"></span>
									<label>Requisito Legal</label>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group form-animate-text" >
									<input id="existentes" type="text" class="form-text"  required="" aria-required="true">
									<span class="bar"></span>
									<label>Medidas de Control Existentes</label>
								</div>
							</div>
							<div class="col-md-6">
								<div  class="form-group " >
									<label>Probabilidad</label>
									<select id="probabilidad" class="form-control">
										<option>--Seleccione--</option>
										<option value="1" style="background:green">Escasa</option>
										<option value="2" style="background:green">Baja Probabilidad</option>
										<option value="3" style="background:yellow">Puede Suceder</option>
										<option value="4" style="background:orange">Probable</option>
										<option value="5" style="background:red">Muy Probable</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div  class="form-group " >
									<label>Severidad</label>
									<select id="severidad" class="form-control">
										<option>--Seleccione--</option>
										<option value="1" style="background:green">Mínima</option>
										<option value="2" style="background:green">Moderado Leve</option>
										<option value="5" style="background:yellow">Moderado</option>
										<option value="10" style="background:orange">Moderado Alto</option>
										<option value="20" style="background:red">Mayor</option>
										<option value="50" style="background:red">Catastrófico</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group form-animate-text" >
									<input id="implementar" type="text" class="form-text"  required="" aria-required="true">
									<span class="bar"></span>
									<label>Medidas de Control a Implementar</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group form-animate-text" >
									<input id="responsable" type="text" class="form-text"  required="" aria-required="true">
									<span class="bar"></span>
									<label>Responsable</label>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group form-animate-text" >
									<input id="observaciones"type="text" class="form-text"  required="" aria-required="true">
									<span class="bar"></span>
									<label>Observaciones</label>
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
                    <div class="panel-heading">
						<h3 class="col-lg-10">Plan de Riesgo</h3>
						<h3 class="col-lg-offset-2" align="right"><button class="btn btn-md btn-success " style="margin-right:10px" onclick="javascript:refrescar();">Refrescar</button></h3>
					</div>
                    <div class="panel-body">
                      <div id="actividades" class="responsive-table">
					  <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Actividad</th>
                          <th>Peligro</th>
                          <th>Riesgo</th>
                          <th>(P)</th>
                          <th>(S)</th>
                          <th>P x S</th>
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
			  <div class="col-md-12">
                  <div class="panel">
                    <div class="panel-heading"><h3>Valorización</h3></div>
						<div class="panel-body">
							 <div class="col-md-6">
								<img src="../img/sistema/matriz.png" width="100%" >
							 </div>
							 <div class="col-md-6">
								<img src="../img/sistema/valores.png" width="100%" >
							 </div>
						</div>
					</div>
              </div> 	
              </div>
        </div>
    </div>
          <!-- end: content -->
    <!-- start: right menu -->
		<?php require('cfg_menu_derecho.php'); ?>
	<!-- end: right menu -->
      <!-- start: Mobile -->
			<?php require('cfg_menu_movil.php'); ?>
       <!-- end: Mobile -->
   <!-- start: Javascript -->
<script src="asset/js/jquery.min.js"></script>
<script src="asset/js/jquery.ui.min.js"></script>
<script src="asset/js/bootstrap.min.js"></script>
<!-- plugins -->
<script src="asset/js/plugins/moment.min.js"></script>
<script src="asset/js/plugins/jquery.datatables.min.js"></script>
<script src="asset/js/plugins/datatables.bootstrap.min.js"></script>
<script src="asset/js/plugins/jquery.nicescroll.js"></script>
<!-- custom -->
<script src="asset/js/main.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#datatables-example').DataTable();
  });
  function empresa(id){
	  $('#sucursales').load("mod_eventos.php",{ evento : 3, empresa : id });
  }
  function sucursal(id){
	  $('#areas').load("mod_eventos.php",{ evento : 4, sucursal : id });
  }
  function area(id){
	  $('#cargos').load("mod_eventos.php",{ evento : 5, area : id });
	  $('#procesos').load("mod_eventos.php",{ evento : 6, area : id, ano_fiscal :  $('#ano_fiscal').val() });
  }
  function registrar(){
	   $('#actividades').load("mod_eventos.php",{ evento : 7, empresa : $('#empresa').val(), sucursal : $('#sucursal').val(), area : $('#area').val(), proceso : $('#proceso').val(), ano_fiscal : $('#ano_fiscal').val(),  version : $('#ultima_version').val(), plan : $('#descripcion').val(),  actividad : $('#actividad').val(), peligro : $('#peligro').val(), consecuencia : $('#consecuencia').val(), requisitos : $('#requisitos').val(), existentes : $('#existentes').val(), implementar: $('#implementar').val(), probabilidad : $('#probabilidad').val(),
		severidad : $('#severidad').val(),	   responsable : $('#responsable').val(), observaciones : $('#observaciones').val()  });
  }
  function busca_version(id){
	  $('#version').load("mod_eventos.php",{ evento : 12, ano_fiscal : id });
  }
  function toogle(){
  $("#contenido").toggle(function(){
        $(this).animate({height:40},200);
    },function(){
        $(this).animate({height:620},200);
    });
  }
  function refrescar(){
	  $('#actividades').load("mod_eventos.php",{ evento :13, empresa : $('#empresa').val(), ano_fiscal : $('#ano_fiscal').val(), version : $('#ultima_version').val()});
  }
  if (1==<?php echo $editar; ?>){
	  refrescar();
  } 
    function borrar(id){
	    $('#actividades').load("mod_eventos.php",{ evento :14, id : id});
		refrescar();
  }
</script>
<!-- end: Javascript -->
  </body>
</html>