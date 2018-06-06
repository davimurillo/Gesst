<?php require_once('common.php'); checkUser(); 
// mostrar objetivos a partir de la selección de la politica
if ($_POST['evento']==1){ ?>
	<label>Objetivo</label>
	<select id="objetivo" class="form-control" >
		<option>--Seleccione--</option>
		<?php 
			$sql="SELECT id_objetivo, tx_objetivo FROM mod_empresa_objetivo where id_estatus=1 and id_politica=".$_POST['politica'];
			$res=abredatabase(g_BaseDatos,$sql);
			while ($row=dregistro($res)){
		?>
				<option value="<?php echo $row['id_objetivo']; ?>"><?php echo $row['tx_objetivo']; ?></option>
			<?php } ?>
	</select>
<?php } 
// registra plan anual y muestra la carga de datos
if ($_POST['evento']==2){ 
$sql="INSERT INTO mod_empresa_plan_anual (
  id_empresa,
  id_ano_fiscal,
  tx_plan,
  id_politica,
  id_objetivo,
  tx_actividad,
  tx_meta,
  tx_indicador,
  id_unidad,
  id_frecuencia,
  tx_recursos,
  id_estado,
  tx_responsable,
  tx_observaciones,
  id_usuario,
  id_estatus,
  id_version) 
  VALUES (
  ".$_POST['empresa'].",
  ".$_POST['ano_fiscal'].",
  '".$_POST['plan']."',
  ".$_POST['politica'].",
  ".$_POST['objetivo'].",
  '".$_POST['actividad']."',
  '".$_POST['meta']."',
  '".$_POST['indicador']."',
  ".$_POST['unidad'].",
  ".$_POST['frecuencia'].",
  '".$_POST['recurso']."',
  ".$_POST['estado'].",
  '".$_POST['responsable']."',
  '".$_POST['observaciones']."',
  ".$_SESSION['id_usuario'].",
  43,
  ".$_POST['version']."
  )";
  $res=abredatabase(g_BaseDatos,$sql);
  $sql="SELECT id_plan, tx_actividad, tx_meta, tx_indicador, (SELECT tx_tipo FROM cfg_tipo_objeto WHERE id_tipo_objeto=a.id_unidad) as id_unidad, (SELECT tx_tipo FROM cfg_tipo_objeto WHERE id_tipo_objeto=a.id_frecuencia) as id_frecuencia, tx_responsable, (SELECT tx_tipo FROM cfg_tipo_objeto WHERE id_tipo_objeto=a.id_estado) as id_estado FROM mod_empresa_plan_anual a WHERE id_empresa=".$_POST['empresa']." AND  id_ano_fiscal=".$_POST['ano_fiscal']." AND id_version=".$_POST['version'];
  $res=abredatabase(g_BaseDatos,$sql);
?>
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
<?php  while ($row=dregistro($res)){ ?>
                        <tr>
                          <td><?php echo $row['tx_actividad']; ?></td>
                          <td><?php echo $row['tx_meta']; ?></td>
                          <td><?php echo $row['tx_indicador']; ?></td>
                          <td><?php echo $row['id_unidad']; ?></td>
                          <td><?php echo $row['id_frecuencia']; ?></td>
                          <td><?php echo $row['tx_responsable']; ?></td>
                          <td><?php echo $row['id_estado']; ?></td>
                          <td  align="center"><a href="javascript:borrar(<?php echo $row['id_plan']; ?>);"><i class="fa fa-trash"></i></a></td></td>
                        </tr>
<?php } ?>
                      </tbody>
                        </table>
<?php } 
// mostrar sucursales a partir de la selección de la empresa
if ($_POST['evento']==3){ ?>
	<label>Sucursal</label>
	<select id="sucursal" class="form-control" Onchange="javascript:sucursal(this.value);">
		<option>--Seleccione--</option>
		<?php 
			$sql="SELECT id_sucursal, tx_sucursal FROM tbl_empresa_sucursal where id_estatus=1 and id_empresa=".$_POST['empresa'];
			$res=abredatabase(g_BaseDatos,$sql);
			while ($row=dregistro($res)){
		?>
				<option value="<?php echo $row['id_sucursal']; ?>"><?php echo $row['tx_sucursal']; ?></option>
			<?php } ?>
	</select>
<?php }
// mostrar sucursales a partir de la selección de la sucursal
if ($_POST['evento']==4){ ?>
	<label>Área</label>
	<select id="area" class="form-control" Onchange="javascript:area(this.value);">
		<option>--Seleccione--</option>
		<?php 
			$sql="SELECT id_area, tx_area FROM tbl_empresa_sucursal_areas where id_estatus=1 and id_sucursal=".$_POST['sucursal'];
			$res=abredatabase(g_BaseDatos,$sql);
			while ($row=dregistro($res)){
		?>
				<option value="<?php echo $row['id_area']; ?>"><?php echo $row['tx_area']; ?></option>
			<?php } ?>
	</select>
<?php }
// mostrar areas a partir de la selección de la area
if ($_POST['evento']==5){ ?>
	<label>Cargo</label>
	<?php 
			$sql="SELECT id_tipo_objeto, tx_tipo FROM cfg_tipo_objeto where id_tipo_objeto IN (SELECT id_ocupacion FROM tbl_nomina WHERE id_area=".$_POST['area']." GROUP BY id_ocupacion)";
	?>
	<select id="cargo" class="form-control" >
		<option>--Seleccione--</option>
		<?php 
			$res=abredatabase(g_BaseDatos,$sql);
			while ($row=dregistro($res)){
		?>
				<option value="<?php echo $row['id_tipo_objeto']; ?>"><?php echo $row['tx_tipo']; ?></option>
			<?php } ?>
	</select>
<?php }
// mostrar procesos a partir de la selección de la area
if ($_POST['evento']==6){ ?>
	<label>Proceso</label>
	<select id="proceso" class="form-control" >
		<option>--Seleccione--</option>
		<?php 
			$sql="SELECT id_proceso, tx_proceso FROM mod_empresa_procesos where id_area=".$_POST['area']." AND id_ano_fiscal=".$_POST['ano_fiscal']."";
			$res=abredatabase(g_BaseDatos,$sql);
			while ($row=dregistro($res)){
		?>
				<option value="<?php echo $row['id_proceso']; ?>"><?php echo $row['tx_proceso']; ?></option>
			<?php } ?>
	</select>
<?php }
// registra plan anual y muestra la carga de datos
if ($_POST['evento']==7){ 
 $sql="INSERT INTO mod_empresa_plan_iper (
  id_empresa,
  id_sucursal,
  id_area,
  id_proceso,
  id_ano_fiscal,
  id_version,
  tx_plan,
  tx_actividad,
  tx_peligro,
  tx_consecuencia,
  tx_requisito,
  tx_control_existente,
  id_probabilidad,
  id_severidad,
  tx_control_implementar,
  tx_responsable,
  tx_observaciones,
   id_estatus,
  id_usuario) 
  VALUES (
  ".$_POST['empresa'].",
  ".$_POST['sucursal'].",
  ".$_POST['area'].",
  ".$_POST['proceso'].",
  ".$_POST['ano_fiscal'].",
  ".$_POST['version'].",
  '".$_POST['plan']."',
  '".$_POST['actividad']."',
  '".$_POST['peligro']."',
  '".$_POST['consecuencia']."',
  '".$_POST['requisitos']."',
  '".$_POST['existentes']."',
  ".$_POST['probabilidad'].",
  ".$_POST['severidad'].",
  '".$_POST['implementar']."',
  '".$_POST['responsable']."',
  '".$_POST['observaciones']."',
  43,
  ".$_SESSION['id_usuario']."
  )";
  $res=abredatabase(g_BaseDatos,$sql);
  $sql="SELECT id_iper, tx_actividad, tx_peligro, tx_consecuencia, tx_control_existente, id_probabilidad, id_severidad, (id_probabilidad * id_severidad) as total, tx_control_implementar, tx_responsable FROM mod_empresa_plan_iper WHERE id_area=".$_POST['area']." AND  id_ano_fiscal=".$_POST['ano_fiscal']." AND  id_version=".$_POST['version'];
  $res=abredatabase(g_BaseDatos,$sql);
?>
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
<?php  while ($row=dregistro($res)){ 
	$color="green";
	$total=$row['total'];
	if ($total <=3 ){ $color="green"; }
	if (3 < $total && $total <=10 ){ $color="yellow"; }
	if (10 < $total && $total <=50 ){ $color="orange"; }
	if (50 < $total && $total <=250 ){ $color="red"; }
?>
                        <tr>
                          <td><?php echo $row['tx_actividad']; ?></td>
                          <td><?php echo $row['tx_peligro']; ?></td>
                          <td><?php echo $row['tx_consecuencia']; ?></td>
                          <td><?php echo $row['id_probabilidad']; ?></td>
                          <td><?php echo $row['id_severidad']; ?></td>
                          <td align="center" style="background:<?php echo $color; ?>; color:#fff;"><?php echo $row['total']; ?></td>
                           <td  align="center"><a href="javascript:borrar(<?php echo $row['id_iper']; ?>);"><i class="fa fa-trash"></i></a></td></td>
                        </tr>
<?php } ?>
                      </tbody>
                        </table>
<?php } 
if ($_POST['evento']==8){ 
	 $version=1;
	 if ($_POST['ano_fiscal']>0){
		 $sql="SELECT (id_version+1) as version FROM mod_empresa_plan_anual WHERE id_ano_fiscal=".$_POST['ano_fiscal']." ORDER BY id_version DESC LIMIT 1";
		 $res=abredatabase(g_BaseDatos,$sql);
		 $row=dregistro($res);
		 if (isset($row['version']))  $version=$row['version']; else $version=$version;
	 }
?>
	<label>Versión</label>
	<input id="ultima_version" class="form-control" type="text" disabled value="<?php echo $version; ?>">
<?php
}
if ($_POST['evento']==9){ 
$sql="SELECT id_plan,tx_actividad, tx_meta, tx_indicador, (SELECT tx_tipo FROM cfg_tipo_objeto WHERE id_tipo_objeto=a.id_unidad) as id_unidad, (SELECT tx_tipo FROM cfg_tipo_objeto WHERE id_tipo_objeto=a.id_frecuencia) as id_frecuencia, tx_responsable, (SELECT tx_tipo FROM cfg_tipo_objeto WHERE id_tipo_objeto=a.id_estado) as id_estado FROM mod_empresa_plan_anual a WHERE id_empresa=".$_POST['empresa']." AND  id_ano_fiscal=".$_POST['ano_fiscal']." AND id_version=".$_POST['version'];
  $res=abredatabase(g_BaseDatos,$sql);
?>
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
<?php  while ($row=dregistro($res)){ ?>
                        <tr>
                          <td><?php echo $row['tx_actividad']; ?></td>
                          <td><?php echo $row['tx_meta']; ?></td>
                          <td><?php echo $row['tx_indicador']; ?></td>
                          <td><?php echo $row['id_unidad']; ?></td>
                          <td><?php echo $row['id_frecuencia']; ?></td>
                          <td><?php echo $row['tx_responsable']; ?></td>
                          <td><?php echo $row['id_estado']; ?></td>
                          <td align="center"><a href="javascript:borrar(<?php echo $row['id_plan']; ?>);"><i class="fa fa-trash"></i></a></td></td>
                        </tr>
<?php } ?>
                      </tbody>
                        </table>
<?php }
//aprobar plan anual
if ($_POST['evento']==10){  
	$sql="UPDATE mod_empresa_plan_anual SET id_estatus=42 WHERE id_empresa=".$_POST['empresa']." AND  id_ano_fiscal=".$_POST['ano_fiscal']." AND id_version=".$_POST['version'];
    $res=abredatabase(g_BaseDatos,$sql);
	$sql="UPDATE mod_empresa_plan_anual SET id_estatus=44 WHERE id_empresa=".$_POST['empresa']." AND  id_ano_fiscal=".$_POST['ano_fiscal']." AND id_version<>".$_POST['version'];
    $res=abredatabase(g_BaseDatos,$sql);
	echo "<script>location.href='mod_planificar_plan_anual.php'</script>";
 }
 //borrar plan anual elemento
 if ($_POST['evento']==11){  
	 $sql="DELETE  FROM mod_empresa_plan_anual WHERE id_plan=".$_POST['id'];
    $res=abredatabase(g_BaseDatos,$sql);
 } 

 //buscar version plan iper
 if ($_POST['evento']==12){ 
	 $version=1;
	 if ($_POST['ano_fiscal']>0){
		 $sql="SELECT (id_version+1) as version FROM mod_empresa_plan_iper WHERE id_ano_fiscal=".$_POST['ano_fiscal']." ORDER BY id_version DESC LIMIT 1";
		 $res=abredatabase(g_BaseDatos,$sql);
		 $row=dregistro($res);
		 if (isset($row['version']))  $version=$row['version']; else $version=$version;
	 }
?>
	<label>Versión</label>
	<input id="ultima_version" class="form-control" type="text" disabled value="<?php echo $version; ?>" style="text-align:center">
 <?php } 
 // refrescar plan iper
 if ($_POST['evento']==13){ 
 $sql="SELECT id_iper, tx_actividad, tx_peligro, tx_consecuencia, tx_control_existente, id_probabilidad, id_severidad, (id_probabilidad * id_severidad) as total, tx_control_implementar, tx_responsable FROM mod_empresa_plan_iper WHERE id_empresa=".$_POST['empresa']." AND  id_ano_fiscal=".$_POST['ano_fiscal']." AND  id_version=".$_POST['version'];
  $res=abredatabase(g_BaseDatos,$sql);
?>
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
<?php  while ($row=dregistro($res)){ 
	$color="green";
	$total=$row['total'];
	if ($total <=3 ){ $color="green"; }
	if (3 < $total && $total <=10 ){ $color="yellow"; }
	if (10 < $total && $total <=50 ){ $color="orange"; }
	if (50 < $total && $total <=250 ){ $color="red"; }
?>
                        <tr>
                          <td><?php echo $row['tx_actividad']; ?></td>
                          <td><?php echo $row['tx_peligro']; ?></td>
                          <td><?php echo $row['tx_consecuencia']; ?></td>
                          <td><?php echo $row['id_probabilidad']; ?></td>
                          <td><?php echo $row['id_severidad']; ?></td>
                          <td align="center" style="background:<?php echo $color; ?>; color:#fff;"><?php echo $row['total']; ?></td>
                           <td  align="center"><a href="javascript:borrar(<?php echo $row['id_iper']; ?>);"><i class="fa fa-trash"></i></a></td></td>
                        </tr>
<?php } ?>
                      </tbody>
                        </table>
<?php } 

 //borrar plan anual
 if ($_POST['evento']==14){  
	 $sql="DELETE  FROM mod_empresa_plan_iper WHERE id_iper=".$_POST['id'];
    $res=abredatabase(g_BaseDatos,$sql);
 } 
 
 //aprobar plan iper
if ($_POST['evento']==15){  
	$sql="UPDATE mod_empresa_plan_iper SET id_estatus=42 WHERE id_empresa=".$_POST['empresa']." AND  id_ano_fiscal=".$_POST['ano_fiscal']." AND id_version=".$_POST['version'];
    $res=abredatabase(g_BaseDatos,$sql);
	$sql="UPDATE mod_empresa_plan_iper SET id_estatus=44 WHERE id_empresa=".$_POST['empresa']." AND  id_ano_fiscal=".$_POST['ano_fiscal']." AND id_version<>".$_POST['version'];
    $res=abredatabase(g_BaseDatos,$sql);
	echo "<script>location.href='mod_planificar_plan_anual_iper.php'</script>";
 }
 //borrar plan iper
 if ($_POST['evento']==16){  
	 $sql="DELETE  FROM mod_empresa_plan_iper WHERE id_empresa=".$_POST['empresa']." AND  id_ano_fiscal=".$_POST['ano_fiscal']." AND id_version=".$_POST['version'];
    $res=abredatabase(g_BaseDatos,$sql);
	echo "<script>location.href='mod_planificar_plan_anual_iper.php'</script>";
 } 
 
 //borrar plan anual
 if ($_POST['evento']==17){  
	 $sql="DELETE  FROM mod_empresa_plan_anual WHERE id_empresa=".$_POST['empresa']." AND  id_ano_fiscal=".$_POST['ano_fiscal']." AND id_version=".$_POST['version'];
    $res=abredatabase(g_BaseDatos,$sql);
	echo "<script>location.href='mod_planificar_plan_anual.php'</script>";
 } 
 
 //buscar version plan mapa de riesgo
 if ($_POST['evento']==18){ 
	 $version=1;
	 if ($_POST['ano_fiscal']>0){
		 $sql="SELECT (id_version+1) as version FROM mod_empresa_mapa_riesgo WHERE id_ano_fiscal=".$_POST['ano_fiscal']." ORDER BY id_version DESC LIMIT 1";
		 $res=abredatabase(g_BaseDatos,$sql);
		 $row=dregistro($res);
		 if (isset($row['version']))  $version=$row['version']; else $version=$version;
	 }
?>
	<label>Versión</label>
	<input id="ultima_version" class="form-control" type="text" disabled value="<?php echo $version; ?>" style="text-align:center">
 <?php }