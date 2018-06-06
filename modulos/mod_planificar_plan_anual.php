 <?php require_once('common.php'); checkUser(); ?>
<!DOCTYPE html>
<html lang="en">
<?php require("cabecera.php"); ?>
 <body id="mimin" class="dashboard">
      <!-- start: Header -->
			  <?php require("cfg_cabecera.php"); ?>
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
                          <a href="index.php">Dashboard Planificar</a> <span class="fa-angle-right fa"></span> Plane Anuales
                        </p>
                    </div>
                  </div>
            </div>
			<div  id="resultado" class="col-md-12 top-10 padding-0">
				
			</div>
              <div class="col-md-12 top-10 padding-0">
                <div class="col-md-12">
                  <div class="panel">
                    <div class="panel-heading" align="right">
						<h4><a href="mod_planificar_plan_anual_registro.php" class="btn btn-lg btn-info"><i class="fa fa-file-text-o"></i> Nuevo Plan</a>
						</h4>
					</div>
                    <div class="panel-body">
                      <div class="responsive-table">
                      <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                      <thead>
                        <tr align="center">
                          <th>Empresa</th>
                          <th>Plan</th>
                          <th>Año</th>
                          <th>Creado por</th>
                          <th>Estatus</th>
                          <th>Versión</th>
                          <th>Act.</th>
                        </tr>
                      </thead>
                      <tbody>
					  <?php 
						 $sql="SELECT (SELECT tx_nombre FROM tbl_empresa WHERE id_empresa=a.id_empresa) as empresa,id_empresa, tx_plan, (SELECT tx_tipo FROM cfg_tipo_objeto WHERE id_tipo_objeto=a.id_ano_fiscal) as ano_fiscal, id_ano_fiscal, (SELECT tx_nombre_apellido FROM cfg_usuario WHERE id_usuario=a.id_usuario) as id_usuario, (SELECT tx_tipo FROM cfg_tipo_objeto WHERE id_tipo_objeto=a.id_estatus) as id_estatus, id_version FROM mod_empresa_plan_anual a where id_ano_fiscal IN ((SELECT id_tipo_objeto FROM cfg_tipo_objeto 	WHERE tx_objeto='ano_fiscal' and id_estatus=1)) GROUP BY id_empresa, tx_plan, id_ano_fiscal, id_usuario, id_estatus, id_version ORDER BY id_ano_fiscal, id_estatus,  id_version";
						$res=abredatabase(g_BaseDatos,$sql);
						 while ($row=dregistro($res)){ 
					?>
                        <tr>
                          <td><?php echo $row['empresa']; ?></td>
                          <td><?php echo $row['tx_plan']; ?></td>
                          <td align="center"><?php echo $row['ano_fiscal']; ?></td>
                          <td><?php echo $row['id_usuario']; ?></td>
						  <td align="center"><?php echo $row['id_estatus']; ?></td>
						  <td align="center"><?php echo $row['id_version']; ?></td>
                          <td align="center" style="font-size:20px">
							<a href="javascript:aprobar(<?php echo $row['id_empresa']; ?>,<?php echo $row['id_ano_fiscal']; ?>,<?php echo $row['id_version']; ?>);"> <i class="fa fa-check-circle-o"></i> </a>
							<a href="mod_planificar_plan_anual_registro.php?empresa=<?php echo $row['id_empresa']; ?>&ano_fiscal=<?php echo $row['id_ano_fiscal']; ?>&version=<?php echo $row['id_version']; ?>&plan=<?php echo $row['tx_plan']; ?>&edit=1"> <i class="fa fa-edit"></i> </a>
							<i class="fa fa-print"></i> 
							<a href="javascript:borrar(<?php echo $row['id_empresa']; ?>,<?php echo $row['id_ano_fiscal']; ?>,<?php echo $row['id_version']; ?>);"><i class="fa fa-trash"></i></a></td>
                        </tr>
						<?php } ?>
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
  function aprobar(empresa,ano_fiscal,version){
	  $("#resultado").load('mod_eventos.php',{  empresa : empresa, ano_fiscal : ano_fiscal, version : version, evento : 10 });
  }
   function borrar(empresa,ano_fiscal,version){
	  $("#resultado").load('mod_eventos.php',{  empresa : empresa, ano_fiscal : ano_fiscal, version : version, evento : 17 });
  }
</script>
<!-- end: Javascript -->
  </body>
</html>