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
		   <?php require("../menu_izquierdo.php"); ?>
		    <!-- end:Left Menu -->
          <!-- start: content -->
        <div id="content">
                
			<div class="panel box-shadow-none content-header">
                  <div class="panel-body">
                    <div class="col-md-12">
                        <h3 class="animated fadeInLeft">Empresa > Registro Nomina</h3>
                        <p class="animated fadeInDown">
                          <a href="index.php">Dashboard</a> <span class="fa-angle-right fa"></span>  <a href="mod_registro_empresa.php">Empresa </a>  <span class="fa-angle-right fa"></span> Nomina
                        </p>
                    </div>
                  </div>
            </div>
			
			
			<div class="col_lg-12 col-md-12 col-sm-12 col-xs-12" > 
			 <label><span class="icons icon-layers"></span> Empresa </label>
				<select id="tipos" class="form-control" onchange="javascript:location.href='mod_registro_nomina.php?empresa='+this.value;">
					<option value="0">--Seleccione--</option>
					<?php 
					$valor="";
					$sql="SELECT id_empresa, tx_nombre FROM tbl_empresa WHERE id_estatus=1 ORDER BY tx_nombre";
					$res=abredatabase(g_BaseDatos,$sql);
					while ($row=dregistro($res)){
					if (isset($_GET['empresa'])){
						if ($row['id_empresa']==$_GET['empresa']){
							$valor="selected";
							$descripcion=$row['tx_nombre'];
						}else{
							$valor="";
							$descripcion="";
						}
					}
					?>
					<option value="<?php echo $row['id_empresa']; ?>" <?php echo $valor; ?>><?php echo $row['tx_nombre']; ?></option>
					<?php } 
					cierradatabase();
					?>
				</select>
			 </div>
			 
			 <div class="col_lg-12 col-md-12 col-sm-12 col-xs-12" > 
			 <label><span class="icons icon-layers"></span> Sucursal </label>
				<select id="tipos" class="form-control" onchange="javascript:location.href='mod_registro_nomina.php?empresa=<?php echo $_GET['empresa']; ?>&sucursal='+this.value;">
					<option value="0">--Seleccione--</option>
					<?php 
					if (isset($_GET['empresa'])){
					$valor="";
					$sql="SELECT id_sucursal, tx_sucursal FROM tbl_empresa_sucursal WHERE id_estatus=1 and id_empresa=".$_GET['empresa']." ORDER BY tx_sucursal ";
					$res=abredatabase(g_BaseDatos,$sql);
					while ($row=dregistro($res)){
					if (isset($_GET['sucursal'])){
						if ($row['id_sucursal']==$_GET['sucursal']){
							$valor="selected";
							$descripcion=$row['tx_sucursal'];
						}else{
							$valor="";
							$descripcion="";
						}
					}
					?>
					<option value="<?php echo $row['id_sucursal']; ?>" <?php echo $valor; ?>><?php echo $row['tx_sucursal']; ?></option>
					<?php } cierradatabase();
					}
					
					?>
				</select>
			 </div>
			 
			 <div class="col_lg-12 col-md-12 col-sm-12 col-xs-12" > 
			 <label><span class="icons icon-layers"></span> Área </label>
				<select id="tipos" class="form-control" onchange="javascript:location.href='mod_registro_nomina.php?empresa=<?php echo $_GET['empresa']; ?>&sucursal=<?php echo $_GET['sucursal']; ?>&area='+this.value;">
					<option value="0">--Seleccione--</option>
					<?php 
					if (isset($_GET['empresa'])){
					$valor="";
					$sql="SELECT id_area, tx_area FROM tbl_empresa_sucursal_areas WHERE id_estatus=1 and id_sucursal=".$_GET['sucursal']." ORDER BY tx_area ";
					$res=abredatabase(g_BaseDatos,$sql);
					while ($row=dregistro($res)){
					if (isset($_GET['area'])){
						if ($row['id_area']==$_GET['area']){
							$valor="selected";
							$descripcion=$row['tx_area'];
						}else{
							$valor="";
							$descripcion="";
						}
					}
					?>
					<option value="<?php echo $row['id_area']; ?>" <?php echo $valor; ?>><?php echo $row['tx_area']; ?></option>
					<?php } cierradatabase();
					}
					
					?>
				</select>
			 </div>
			 
			  <div class="col_lg-12 col-md-12 col-sm-12 col-xs-12">
				<hr>
			</div>

            <div class="col-md-12" style="padding:20px;">
                 <div class="col_lg-12 col-md-12 col-sm-12 col-xs-12">
					<?php
					if (isset($_GET["empresa"]) && isset($_GET["sucursal"]) && isset($_GET["area"])){
					$mode = (isset($_GET['f_mode'])) ? $_GET['f_mode'] : ""; 
					$rid = (isset($_GET['f_rid'])) ? $_GET['f_rid'] : ""; 
					################################################################################   
					## +---------------------------------------------------------------------------+
					## | 1. Creating & Calling:                                                    | 
					## +---------------------------------------------------------------------------+
					##  *** only relative (virtual) path (to the current document)
					  define ("DATAGRID_DIR", $dir."../lib/datagrid/");
					  define ("PEAR_DIR", $dir."../lib/datagrid/pear/");
					  
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

						$sql="SELECT  id_nomina, tx_codigo_nomina, tx_nombres_apellidos, CASE WHEN id_estatus=1 THEN 'ACTIVA' ELSE 'INACTIVA' END AS estatus FROM tbl_nomina a WHERE id_area=".$_GET['area'];

					##  *** set needed options
					  $debug_mode = false;
					  $messaging = true;
					  $unique_prefix = "f_";  
					  $dgrid = new DataGrid($debug_mode, $messaging, $unique_prefix, DATAGRID_DIR);
					##  *** set data source with needed options
					  $default_order_field = "id_nomina";
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

					$http_get_vars = array("empresa","sucursal", "area");
					$dgrid->SetHttpGetVars($http_get_vars);


					##  *** set interface language (default - English)
					##  *** (en) - English     (de) - German     (se) Swedish     (hr) - Bosnian/Croatian
					##  *** (hu) - Hungarian   (es) - Espanol    (ca) - Catala    (fr) - Francais
					##  *** (nl) - Netherlands/"Vlaams"(Flemish) (it) - Italiano  (pl) - Polish
					##  *** (ch) - Chinese     (sr) - Serbian
					 $dg_language = "es";  
					 $dgrid->setInterfaceLang($dg_language);

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
						"id_nomina"  =>array("header"=>"ID","header_align"=>"center","type"=>"label", "width"=>"5%", "align"=>"left",    "wrap"=>"wrap", "text_length"=>"-1", "case"=>"normal"),
						"tx_codigo_nomina"  =>array("header"=>"COD. NOMINA","header_align"=>"center","type"=>"label", "width"=>"10%", "align"=>"left",    "wrap"=>"wrap", "text_length"=>"-1", "case"=>"normal"),
						"tx_nombres_apellidos"  =>array("header"=>"NOMBRES Y APELLIDOS","header_align"=>"center","type"=>"label", "width"=>"80%", "align"=>"left",    "wrap"=>"wrap", "text_length"=>"-1", "case"=>"normal"),
						"estatus"  =>array("header"=>"ESTATUS","header_align"=>"center","type"=>"label", "width"=>"5%", "align"=>"left",    "wrap"=>"wrap", "text_length"=>"-1", "case"=>"normal")
						
					  );
					  
					  $dgrid->setColumnsInViewMode($vm_colimns);
					## +---------------------------------------------------------------------------+
					## | 7. Add/Edit/Details Mode settings:                                        | 
					## +---------------------------------------------------------------------------+
					##  ***  set settings for edit/details mode

					//*****ARREGLOS ******//
					
					$tema_array_sql = "SELECT tx_tipo, id_tipo_objeto FROM cfg_tipo_objeto WHERE tx_objeto='categoria_trabajador' ORDER BY tx_tipo";
					$especial_array_str = crearArregloDataGrid($tema_array_sql,"categoria_array",g_BaseDatos);
					eval($especial_array_str);	
					
					$tema_array_sql = "SELECT tx_tipo, id_tipo_objeto FROM cfg_tipo_objeto WHERE tx_objeto='estado_civil_trabajador' ORDER BY tx_tipo";
					$especial_array_str = crearArregloDataGrid($tema_array_sql,"estado_civil_array",g_BaseDatos);
					eval($especial_array_str);
					
					$tema_array_sql = "SELECT tx_tipo, id_tipo_objeto FROM cfg_tipo_objeto WHERE tx_objeto='situacion_academica_trabajador' ORDER BY tx_tipo";
					$especial_array_str = crearArregloDataGrid($tema_array_sql,"situacion_academica_array",g_BaseDatos);
					eval($especial_array_str);	
					
					$tema_array_sql = "SELECT tx_tipo, id_tipo_objeto FROM cfg_tipo_objeto WHERE tx_objeto='ocupacion_trabajador' ORDER BY tx_tipo";
					$especial_array_str = crearArregloDataGrid($tema_array_sql,"ocupacion_trabajador_array",g_BaseDatos);
					eval($especial_array_str);

					$tema_array_sql = "SELECT tx_tipo, id_tipo_objeto FROM vie_tipo_contrato";
					$especial_array_str = crearArregloDataGrid($tema_array_sql,"contrato_trabajador_array",g_BaseDatos);
					eval($especial_array_str);
					
					$tema_array_sql = "SELECT tx_tipo, id_tipo_objeto FROM vie_tipo_turno_laboral";
					$especial_array_str = crearArregloDataGrid($tema_array_sql,"turno_trabajador_array",g_BaseDatos);
					eval($especial_array_str);					
					
					$tema_array_sql = "SELECT tx_nombre, id_seguro FROM mod_seguro WHERE id_tipo_seguro=55  AND id_estatus=1 ORDER BY tx_nombre";
					$especial_array_str = crearArregloDataGrid($tema_array_sql,"seguro_privado_array",g_BaseDatos);
					eval($especial_array_str);
					
					$tema_array_sql = "SELECT tx_nombre, id_seguro FROM mod_seguro WHERE id_tipo_seguro=56  AND id_estatus=1 ORDER BY tx_nombre";
					$especial_array_str = crearArregloDataGrid($tema_array_sql,"seguro_publico_array",g_BaseDatos);
					eval($especial_array_str);	
					
					//******FIN DE ARREGLO *****///
				
					 $estatus=array(""=>"SELECCIONE","1"=>"ACTIVA", "0"=>"INACTIVA");
					 
					 $estatus_decision=array(""=>"SELECCIONE","1"=>"SI", "0"=>"NO");

					 $genero=array(""=>"SELECCIONE","F"=>"FEMENINO", "M"=>"MASCULINO");
					 
					  $tipo_documento=array(""=>"SELECCIONE","1"=>"DNI", "2"=>"CE");
					 
					  $table_name = "tbl_nomina";
					  $primary_key = "id_nomina";
					  $condition = "";
					  $dgrid->setTableEdit($table_name, $primary_key, $condition);
					  $dgrid->setAutoColumnsInEditMode(false);
					   $em_columns = array(
						
						"tx_codigo_nomina" =>array("header"=>"CODIGO DE NOMINA", "type"=>"textbox", "width"=>"100%", "req_type"=>"rty", "title"=>"", "unique"=>false, "default"=>""),
						
						"tx_nombres_apellidos" =>array("header"=>"NOMBRES Y APELLIDOS", "type"=>"textbox", "width"=>"100%", "req_type"=>"rty", "title"=>"", "unique"=>false, "default"=>""),
						
						"id_tipo_documento" =>array("header"=>"TIPO DE DOC.", "type"=>"enum",  "source"=>$tipo_documento, "view_type"=>"dropdownlist", "width"=>"210px", "req_type"=>"ry", "title"=>"", "unique"=>false, "default"=>"1"),
										
						"tx_documento" =>array("header"=>"N° DE DOCUMENTO", "type"=>"textbox", "width"=>"100%", "req_type"=>"rty", "title"=>"", "unique"=>false, "default"=>""),
						
						"fe_nacimiento"  =>array("header"=>"FECHA DE NACIMIENTO", "type"=>"date",       "req_type"=>"rt", "width"=>"187px", "title"=>"", "readonly"=>"false", "maxlength"=>"-1", "default"=>"", "unique"=>"false", "unique_condition"=>"", "visible"=>"true", "on_js_event"=>"", "calendar_type"=>"floating"),
						
						"id_genero" =>array("header"=>"GENERO DEL TRABAJADOR", "type"=>"enum",  "source"=>$genero, "view_type"=>"dropdownlist", "width"=>"210px", "req_type"=>"ry", "title"=>"", "unique"=>false, "default"=>"1"),
						
						"id_estado_civil" =>array("header"=>"ESTADO CIVIL DEL TRABAJADOR", "type"=>"enum",  "source"=>$estado_civil_array, "view_type"=>"dropdownlist", "width"=>"210px", "req_type"=>"ry", "title"=>"", "unique"=>false, "default"=>"1"),
						
						"tx_domicilio" =>array("header"=>"DOMICILIO", "type"=>"textbox", "width"=>"100%", "req_type"=>"rty", "title"=>"", "unique"=>false, "default"=>""),
						
						"tx_departamento" =>array("header"=>"DEPARTAMENTO", "type"=>"textbox", "width"=>"100%", "req_type"=>"rty", "title"=>"", "unique"=>false, "default"=>""),
						
						"tx_provincia" =>array("header"=>"PROVINCIA", "type"=>"textbox", "width"=>"100%", "req_type"=>"rty", "title"=>"", "unique"=>false, "default"=>""),
						
						"tx_distrito" =>array("header"=>"DISTRITO", "type"=>"textbox", "width"=>"100%", "req_type"=>"rty", "title"=>"", "unique"=>false, "default"=>""),
												
						"tx_telefonos" =>array("header"=>"TELEFONOS (C0D) + NUMERO", "type"=>"textbox", "width"=>"100%", "req_type"=>"rty", "title"=>"", "unique"=>false, "default"=>""),
						
						"tx_correo_electronico" =>array("header"=>"CORREO ELECTRÓNICO", "type"=>"textbox", "width"=>"100%", "req_type"=>"rty", "title"=>"", "unique"=>false, "default"=>""),
						
						"nu_estatura" =>array("header"=>"ESTATURA", "type"=>"textbox", "width"=>"100%", "req_type"=>"rns", "title"=>"", "unique"=>false, "default"=>""),
						
						"nu_peso" =>array("header"=>"PESO", "type"=>"textbox", "width"=>"100%", "req_type"=>"rns", "title"=>"", "unique"=>false, "default"=>""),
						
						"n_hijos" =>array("header"=>"N° DE HIJOS", "type"=>"textbox", "width"=>"100%", "req_type"=>"rny", "title"=>"", "unique"=>false, "default"=>""),
						
						"id_situacion_academica" =>array("header"=>"SITUACIÓN ACÁDEMICA", "type"=>"enum",  "source"=>$situacion_academica_array, "view_type"=>"dropdownlist", "width"=>"210px", "req_type"=>"ry", "title"=>"", "unique"=>false),
						
						"id_tipo_contrato" =>array("header"=>"TIPO DE CONTRATO", "type"=>"enum",  "source"=>$contrato_trabajador_array, "view_type"=>"dropdownlist", "width"=>"210px", "req_type"=>"ry", "title"=>"", "unique"=>false),"
						
						id_turno_laboral" =>array("header"=>"TURNO LABORAL", "type"=>"enum",  "source"=>$turno_trabajador_array, "view_type"=>"dropdownlist", "width"=>"210px", "req_type"=>"ry", "title"=>"", "unique"=>false),
						
						"id_categoria_trabajo" =>array("header"=>"CATEGORIA DEL TRABAJADOR", "type"=>"enum",  "source"=>$categoria_array, "view_type"=>"dropdownlist", "width"=>"210px", "req_type"=>"ry", "title"=>"", "unique"=>false),
						
						"id_ocupacion" =>array("header"=>"OCUPACIÓN", "type"=>"enum",  "source"=>$ocupacion_trabajador_array, "view_type"=>"dropdownlist", "width"=>"210px", "req_type"=>"ry", "title"=>"", "unique"=>false),
						
						"fe_ingreso"  =>array("header"=>"FECHA DE INGRESO", "type"=>"date",       "req_type"=>"rt", "width"=>"187px", "title"=>"", "readonly"=>"false", "maxlength"=>"-1", "default"=>"", "unique"=>"false", "unique_condition"=>"", "visible"=>"true", "on_js_event"=>"", "calendar_type"=>"floating"),
						
						"id_privado" =>array("header"=>"SEGURO PRIVADO", "type"=>"enum",  "source"=>$seguro_privado_array, "view_type"=>"dropdownlist", "width"=>"210px", "req_type"=>"ry", "title"=>"", "unique"=>false),
						
						"id_publico" =>array("header"=>"SEGURO PUBLICO", "type"=>"enum",  "source"=>$seguro_publico_array, "view_type"=>"dropdownlist", "width"=>"210px", "req_type"=>"ry", "title"=>"", "unique"=>false),
						
						"id_estatus" =>array("header"=>"ESTATUS", "type"=>"enum",  "source"=>$estatus, "view_type"=>"dropdownlist", "width"=>"210px", "req_type"=>"ry", "title"=>"", "unique"=>false, "default"=>"1"),
						
						"id_usuario" =>array("header"=>"",       "type"=>"hidden",    "req_type"=>"sny", "default"=>$_SESSION['id_usuario'], "visible"=>"false", "unique"=>false),
						
						"id_area" =>array("header"=>"",       "type"=>"hidden",    "req_type"=>"sty", "default"=>$_GET['area'], "visible"=>"false", "unique"=>false)
																	
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
					 
					}
					
					?>
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
    <script src="asset/js/plugins/jquery.nicescroll.js"></script>
    <script src="asset/js/plugins/jquery.mask.min.js"></script>
	<script src="asset/js/plugins/jquery.validate.min.js"></script>


    <!-- custom -->
     <script src="asset/js/main.js"></script>
     <script type="text/javascript">
      (function(jQuery){

       
		
		 $('.mask-phone_us').mask('(000) 000-00.00.00');

      })(jQuery);
     </script>
  <!-- end: Javascript -->
  </body>
</html>