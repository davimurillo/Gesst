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
				if (isset($_GET['ano_fiscal']) && isset($_GET['version'])){		
					 $sql="SELECT tx_plan, id_sucursal, id_area, id_empresa FROM mod_empresa_plan_iper WHERE  id_ano_fiscal=".$_GET['ano_fiscal']." AND  id_version=".$_GET['version'];
					$res=abredatabase(g_BaseDatos,$sql);
					if (dnumerofilas($res)>0){
						$row=dregistro($res);
						$plan=$row['tx_plan'];
					}else{
						$plan=$_GET['plan']? $_GET['plan'] : '';
					}
				}else{
					$plan=$_GET['plan']? $_GET['plan'] : '';
				}
			 ?>
		    <!-- end:Left Menu -->
          <!-- start: content -->
        <div id="content">
			<div class="panel box-shadow-none content-header">
                  <div class="panel-body">
                    <div class="col-md-12">
                        <h3 class="animated fadeInLeft">Registro de Mapa de Riesgo </h3>
                        <p class="animated fadeInDown">
                          <a href="index.php">Dashboard Planificar</a> <span class="fa-angle-right fa"></span> <a href="mod_planificar_plan_anual_mapa_riesgo.php">Plan Mapa de Riesgo </a>
                        </p>
                    </div>
                  </div>
            </div>
              <div class="col-md-12 top-10 padding-0">
                <div class="col-md-12">
                  <div class="panel">
                    <div class="panel-heading"><h3>Identificación del Mapa de Riesgo</h3></div>
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
							<div class="col-md-12">
								<div class="form-group " >
									<label>Empresa</label>
									<select id="empresa" class="form-control" >
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
						
                      </div>
                  </div>
              </div>  
			  <div class="col-md-12">
                  <div class="panel">
                    <div class="panel-heading">
						<h3 class="col-lg-10">Mapa de Riesgo</h3>
						<h3 class="col-lg-offset-2" align="right"><button class="btn btn-md btn-success " style="margin-right:10px" onclick="javascript:nuevo_mapa();">Registrar Mapa</button></h3>
					</div>
                    <div id="contenido" class="panel-body">
						<?php
					$mode = (isset($_GET['f_mode'])) ? $_GET['f_mode'] : ""; 
					$rid = (isset($_GET['f_rid'])) ? $_GET['f_rid'] : ""; 
					################################################################################   
					## +---------------------------------------------------------------------------+
					## | 1. Creating & Calling:                                                    | 
					## +---------------------------------------------------------------------------+
					##  *** only relative (virtual) path (to the current document)
					  define ("DATAGRID_DIR", "../lib/datagrid/");
					  define ("PEAR_DIR", "../lib/datagrid/pear/");
					  require_once(DATAGRID_DIR.'datagrid.class.php');
					  require_once(PEAR_DIR.'PEAR.php');
					  require_once(PEAR_DIR.'DB.php');
					##  *** creating variables that we need for database connection 
					  $DB_BASE=g_TipoBaseDatos;
					  $DB_USER=g_User;            
					  $DB_PASS=g_Pass;           
					  $DB_HOST=g_ServidorBaseDatos;       
					  $DB_NAME=g_BaseDatos;  
					ob_start();
					  $db_conn = DB::factory($DB_BASE); 
					  $db_conn -> connect(DB::parseDSN($DB_BASE.'://'.$DB_USER.':'.$DB_PASS.'@'.$DB_HOST.'/'.$DB_NAME));
					##  *** put a primary key on the first place 
						$sql="SELECT id_mapa, tx_descripcion, tx_archivo, (SELECT tx_sucursal FROM tbl_empresa_sucursal WHERE id_sucursal=a.id_sucursal) as sucursal,  (SELECT tx_area FROM tbl_empresa_sucursal_areas WHERE id_area=a.id_area) as area,   (SELECT tx_nombre_apellido FROM cfg_usuario WHERE id_usuario=a.id_usuario) as id_usuario  FROM mod_empresa_mapa_riesgo a WHERE id_ano_fiscal =".$ano_fiscal." and id_empresa=".$empresa." and id_version=".$version;
					##  *** set needed options
					  $debug_mode = false;
					  $messaging = true;
					  $unique_prefix = "f_";  
					  $dgrid = new DataGrid($debug_mode, $messaging, $unique_prefix, DATAGRID_DIR);
					##  *** set data source with needed options
					  $default_order_field = "id_mapa";
					//  $default_order_field = "direccion,primer_apellido";
					  $default_order_type = "ASC";
					  $dgrid->dataSource($db_conn, $sql, $default_order_field, $default_order_type);	    
					## +---------------------------------------------------------------------------+
					## | 2. General Settings:                                                      | 
					## +---------------------------------------------------------------------------+
					##  *** set encoding and collation (default: utf8/utf8_unicode_ci)
					$postback_method = "GET";
					$dgrid->SetPostBackMethod($postback_method);
					$dgrid->firstFieldFocusAllowed = "true";
					 $dg_encoding = "utf8";
					 $dg_collation = "utf8_unicode_ci";
					 $dgrid->setEncoding($dg_encoding, $dg_collation);
					$modes = array(
					  "add"     =>array("view"=>true, "edit"=>false, "type"=>"image"),
					  "edit"    =>array("view"=>true, "edit"=>true, "type"=>"image"),
					  "cancel"  =>array("view"=>true, "edit"=>true, "type"=>"image"),
					  "details" =>array("view"=>false, "edit"=>false, "type"=>"image"),
					  "delete"  =>array("view"=>true, "edit"=>false, "type"=>"image")
					);
					$dgrid->setModes($modes);
					 $multirow_option = true;
					 $dgrid->allowMultirowOperations($multirow_option);
					 $multirow_operations = array(
						"delete"  => array("view"=>true),
						"details" => array("view"=>false),
						"edit" => array("view"=>true)
					 );
					 $dgrid->setMultirowOperations($multirow_operations); 
					##  *** set interface language (default - English)
					##  *** (en) - English     (de) - German     (se) Swedish     (hr) - Bosnian/Croatian
					##  *** (hu) - Hungarian   (es) - Espanol    (ca) - Catala    (fr) - Francais
					##  *** (nl) - Netherlands/"Vlaams"(Flemish) (it) - Italiano  (pl) - Polish
					##  *** (ch) - Chinese     (sr) - Serbian
					 $dg_language = "es";  
					 $dgrid->setInterfaceLang($dg_language);
					 
					 $http_get_vars = array("ano_fiscal","empresa","version","plan");
					 $dgrid->SetHttpGetVars($http_get_vars);
					#
					##  *** set layouts: "0" - tabular(horizontal) - default, "1" - columnar(vertical), "2" - customized
					#
					  $layouts = array("view"=>"0", "edit"=>"1", "details"=>"1", "filter"=>"1");
					#
					  $dgrid->SetLayouts($layouts);
					 $css_class = "x-blue";
					 if($css_class == "") $css_class = "default"; 
					## "embedded" - use embedded classes, "file" - link external css file
					 $css_type = "embedded"; 
					 $dgrid->setCssClass($css_class, $css_type);
					## +---------------------------------------------------------------------------+
					## | 3. Printing & Exporting Settings:                                         | 
					## +---------------------------------------------------------------------------+
					##  *** set printing option: true(default) or false 
					 $printing_option = false;
					 $dgrid->allowPrinting($printing_option);
					##  *** set exporting option: true(default) or false 
					 $exporting_option = false;
					 $dgrid->allowExporting($exporting_option);
					##
					##
						## +---------------------------------------------------------------------------+
						## | 4. Sorting & Paging Settings:                                             | 
						## +---------------------------------------------------------------------------+
						##  *** set sorting option: true(default) or false 
					$paging_option = true;
					$rows_numeration = false;
					$numeration_sign = "N #";
					$dgrid->allowPaging($paging_option, $rows_numeration, $numeration_sign);
					$bottom_paging = array(
							 "results"=>true, "results_align"=>"left", 
							 "pages"=>true, "pages_align"=>"center", 
							 "page_size"=>true, "page_size_align"=>"right");
					$top_paging = array(
							 "results"=>true, "results_align"=>"left",
							 "pages"=>true, "pages_align"=>"center",
							 "page_size"=>true, "page_size_align"=>"right");
					$pages_array = array("10"=>"10", "25"=>"25", "50"=>"50", "100"=>"100", "250"=>"250", "500"=>"500", "1000"=>"1000", "2000"=>"2000");
					$default_page_size = 10;
					$paging_arrows = array("first"=>"|<<", "previous"=>"<<", "next"=>">>", "last"=>">>|");
					$dgrid->setPagingSettings($bottom_paging, $top_paging, $pages_array, $default_page_size);
					##
					## +---------------------------------------------------------------------------+
					## | 5. Filter Settings:                                                       | 
					## +---------------------------------------------------------------------------+
					##  *** set filtering option: true or false(default)
					 $filtering_option = false;
					 $dgrid->allowFiltering($filtering_option);
					##  *** set aditional filtering settings
					  $filtering_fields = array(
						"Objeto"     =>array("table"=>"cfg_tipo_objeto", "field"=>"tx_objeto", "source"=>"self","operator"=>false, "default_operator"=>"%like%", "type"=>"textbox", "autocomplete"=>false,"case_sensitive"=>true,  "comparison_type"=>"string")
					  );
					  $dgrid->setFieldsFiltering($filtering_fields);
					##
					## 
					## +---------------------------------------------------------------------------+
					## | 6. View Mode Settings:                                                    | 
					## +---------------------------------------------------------------------------+
					##  *** set columns in view mode
					   //$dgrid->setAutoColumnsInViewMode(true);  
					  $vm_table_properties = array("width"=>"100%","sortable"=>false);
					  $dgrid->SetViewModeTableProperties($vm_table_properties); 
						$vm_colimns = array(
						"sucursal"=>array("header"=>"Sucursal","header_align"=>"center","type"=>"label", "width"=>"15%", "align"=>"left",    "wrap"=>"wrap", "text_length"=>"-1", "case"=>"normal"),
						"area"=>array("header"=>"Area","header_align"=>"center","type"=>"label", "width"=>"15%", "align"=>"left",    "wrap"=>"wrap", "text_length"=>"-1", "case"=>"normal"),
						"tx_descripcion"=>array("header"=>"Descripción","header_align"=>"center","type"=>"label", "width"=>"55%", "align"=>"left",    "wrap"=>"wrap", "text_length"=>"-1", "case"=>"normal"),
						"tx_archivo"  =>array("header"=>"Mapa","header_align"=>"center","type"=>"label", "width"=>"15%", "align"=>"left",    "wrap"=>"wrap", "text_length"=>"-1", "case"=>"normal")
					  );
					  $dgrid->setColumnsInViewMode($vm_colimns);
					## +---------------------------------------------------------------------------+
					## | 7. Add/Edit/Details Mode settings:                                        | 
					## +---------------------------------------------------------------------------+
					##  ***  set settings for edit/details mode
					  
					  $estatus=array(""=>"SELECCIONE","1"=>"ACTIVA", "0"=>"INACTIVA");
					  $table_name = "mod_empresa_mapa_riesgo";
					  $primary_key = "id_mapa";
					  $condition = "";
					  $dgrid->setTableEdit($table_name, $primary_key, $condition);
					  $dgrid->setAutoColumnsInEditMode(false);
					   $em_columns = array(
						"tx_descripcion" =>array("header"=>"Descripción", "type"=>"textbox", "width"=>"100%", "req_type"=>"rty", "title"=>"", "unique"=>false, "default"=>""),
						"tx_archivo"  =>array("header"=>"Imagen del Mapa Riesgo", "type"=>"image",      "req_type"=>"st", "width"=>"210px", "title"=>"", "readonly"=>"false", "maxlength"=>"-1", "default"=>"", "unique"=>"false", "unique_condition"=>"", "visible"=>"true", "on_js_event"=>"", "target_path"=>"repositorio/importes/", "allow_image_updating"=>"false", "max_file_size"=>"2M", "image_width"=>"128px", "image_height"=>"128px", "resize_image"=>"false", "magnify"=>"true", "magnify_type"=>"lightbox", "magnify_power"=>"8", "file_name"=>"", "host"=>"local", "allow_downloading"=>"false", "allowed_extensions"=>""),
						"id_empresa" =>array("header"=>"",       "type"=>"hidden",    "req_type"=>"sny", "default"=>$empresa, "visible"=>"false", "unique"=>false),
						"id_ano_fiscal" =>array("header"=>"",       "type"=>"hidden",    "req_type"=>"sny", "default"=>$ano_fiscal, "visible"=>"false", "unique"=>false),
						"id_version" =>array("header"=>"",       "type"=>"hidden",    "req_type"=>"sny", "default"=>$version, "visible"=>"false", "unique"=>false),
						"id_usuario" =>array("header"=>"",       "type"=>"hidden",    "req_type"=>"sny", "default"=>$_SESSION['id_usuario'], "visible"=>"false", "unique"=>false)
					  );
					$dgrid->setColumnsInEditMode($em_columns);
					##  *** set auto-genereted eName_1.FieldName > 'a' AND TableName_1.FieldName < 'c'"
					##  *** Ex.: "on_js_event"=>"onclick='alert(\"Yes!!!\");'"
					## +---------------------------------------------------------------------------+
					## | 8. Bind the DataGrid:                                                     | 
					## +---------------------------------------------------------------------------+
					##  *** set debug mode & messaging options
						$dgrid->bind();        
						ob_end_flush();
						
					?>
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

  function busca_version(id){
	  $('#version').load("mod_eventos.php",{ evento : 18, ano_fiscal : id });
  }
  
  function nuevo_mapa(){
	  location.href = 'mod_planificar_plan_anual_mapa_riesgo_registro.php?empresa='+$('#empresa').val()+'&ano_fiscal='+$('#ano_fiscal').val()+'&version='+$('#ultima_version').val()+'&plan='+$('#descripcion').val().'&f_mode=add&f_rid=-1&f_page_size=10&f_p=1';
  }
 
</script>
<!-- end: Javascript -->
  </body>
</html>