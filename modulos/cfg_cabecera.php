<?php
$sql="SELECT (tx_nombre_apellido) as nombre, tx_foto_usuario, (SELECT tx_telefono FROM cfg_usuario_telefono WHERE id_usuario=a.id_usuario LIMIT 1) AS telefono, CASE WHEN id_estatu=1 THEN 'Activo' ELSE 'Inactivo' END AS estatus, to_char(fe_ultima_actualizacion, 'DD/MM/YYYY a las HH:MI am') as fecha_actualizacion, (SELECT tx_perfil FROM cfg_perfil WHERE id_perfil=a.id_perfil) AS perfil FROM cfg_usuario a WHERE id_usuario=".$_SESSION['id_usuario'];
	$res=abredatabase(g_BaseDatos,$sql);
	$row=dregistro($res);
	$nombre_usuario=$row['nombre'];
	$telefono_usuario=$row['telefono'];
	$estatus_usuario=$row['estatus'];
	$perfil=$row['perfil'];
	$fecha_actualizacion=$row['fecha_actualizacion'];
	$foto=$row['tx_foto_usuario'];
	cierradatabase();
	if ($foto==""){
		$foto="../img/fotos/img.jpg";	
	}else{
		$foto="repositorio/fotos_usuario/".$foto;
	}
?>
<style>
#left-menu .sub-left-menu {
  background-color: #fff;
  left: 0;
  padding-top: 50px;
  z-index: 222;
  width: 230px;
  height: 100%;
  position: fixed;
  overflow-y: scroll;
  -webkit-box-shadow: 0 2px 5px 0 rgba(239, 235, 235, 0.16), 0 2px 10px 0 rgba(72, 70, 70, 0.12);
  -moz-box-shadow: 0 2px 5px 0 rgba(239, 235, 235, 0.16), 0 2px 10px 0 rgba(72, 70, 70, 0.12);
  -ms-box-shadow: 0 2px 5px 0 rgba(239, 235, 235, 0.16), 0 2px 10px 0 rgba(72, 70, 70, 0.12);
  -o-box-shadow: 0 2px 5px 0 rgba(239, 235, 235, 0.16), 0 2px 10px 0 rgba(72, 70, 70, 0.12);
  box-shadow: 0 2px 5px 0 rgba(239, 235, 235, 0.16), 0 2px 10px 0 rgba(72, 70, 70, 0.12);
}
#left-menu .sub-left-menu a {
  color: #918C8C;
  font-size: 12px;
  font-weight: 500;
  line-height: 30px;
}
</style>
 <!-- start: Header -->
        <nav class="navbar navbar-default header navbar-fixed-top">
          <div class="col-md-12 nav-wrapper">
            <div class="navbar-header" style="width:100%;">
				<div class="opener-left-menu is-open">
					<span class="top"></span>
					<span class="middle"></span>
					<span class="bottom"></span>
				</div>
				<a href="index.php" class="navbar-brand" > 
                 <b><img src="../img/logos/logo_mini_gesstrab.png" width="30px" height="30px" style="margin-top:-5px" ></b>
                </a>
              <ul class="nav navbar-nav search-nav">
				<li>
                   <div class="search">
                    <span class="fa fa-search icon-search" style="font-size:23px;"></span>
                    <div class="form-group form-animate-text">
                      <input type="text" class="form-text" required>
                      <span class="bar"></span>
                      <label class="label-search">Que desea <b>Buscar</b> </label>
                    </div>
                  </div>
                </li>
              </ul>
              <ul class="nav navbar-nav navbar-right user-nav">
                <li ><a href="#" class="opener-right-menu " style="margin-top:-10px"> <img src="<?php echo $foto; ?>" class="img-circle avatar" alt="user name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"/></a></li>
              </ul>
            </div>
          </div>
        </nav>
      <!-- end: Header -->