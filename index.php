<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
   <title>GESSALUD ® </title>
	<link rel="shortcut icon" href="img/logos/logo.png">
   <!-- Bootstrap core CSS -->
	<link href="lib/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="lib/css/animate.css" >
	<link href="lib/fonts/css/font-awesome.css" rel="stylesheet">
	<link href="style.css" rel="stylesheet">
	<style>
		html, body {
			height: 100%;
			width: 100%;
			padding: 0;
			margin: 0;
		}
    #full-screen-background-image {
        z-index: -999;
        width: 100%;
        height: 100%;
        position: fixed;
        top: 0%;
        left: 0%;
		opacity:0.9
    }

	</style>
  </head>
  <body  >
	 <img alt="full screen background image" src="img/sistema/background.jpg" id="full-screen-background-image" /> 
    <div class="container" align="center" style="margin-top:10%" >
	  <div class="col-lg-4 col-md-4 col-sm-2 col-xs-1"></div>
	  <form id="form1" action="javascript:iniciar();" data-parsley-validate>
	  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-10 animated slideInDown"   >
		   <div class="row session" style="margin-top:10px; width:320px" >
				<div class="row" align="center" style="color:#999; font-size: 12px; margin-top:20px">
					CONTROL DE ACCESO
				</div>
				<div class="row" align="center" style="font-size:2.0em; color:#337AB7; margin-top:10px; font-weight:bold" >
					GESSALUD <span style="font-size:0.55em;" >®</span>
				</div>
				<div class="row" align="center" style="color:#ccc; font-size: 10px; margin-top:30px">
					<input class="form-control" type="email"  id="correo_usuario" placeholder="Introduzca su correo electrónico" style="width:70%" required="required">
				</div>
				<div class="row" align="center" style="color:#ccc; font-size: 10px; margin-top:10px">
					<input class="form-control" type="password" id="clave_usuario" placeholder="Contraseña" style="width:70%" required="required" >
				</div>
				<p></p>
				<div class="col-lg-12" align="center" style="color:#ccc; margin-top:20px; margin-bottom:20px">
				<button type="submit" class="btn btn-primary" id="iniciar" style="width:85%">Ingresar Sesión</button>
				</div>
				<div class="row" id="inicio_sesion" > </div>
		   </div>
	  </div>
	  </form>
	  <div class="col-lg-4 col-md-4 col-sm-3 col-xs-1"></div>
	  </div>
    </div><!-- /.container -->
	<div class="modal fade" tabindex="-1" id="myModal_recuperacion" role="dialog" style="color:#999">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h2 class="modal-title"><span class="fa fa-key" style="margin-right:10px"></span> Recuperación de Clave</h2>
		  </div>
		  <div align="center" id="sesion_recupera" class="modal-body" >
		   </div>
		</div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="lib/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="lib/js/bootstrap.min.js"></script>
	<script>
		//funcion para iniciar sesion de usuario
		function iniciar(){
			$( "#inicio_sesion" ).load( "modulos/login.php", { correo: $('#correo_usuario').val(),clave: $('#clave_usuario').val(), envio:"1"  } );
		}
		$( "#iniciar" ).click(function() {
			$( "#inicio_sesion" ).load( "modulos/login.php", { correo: $('#correo_usuario').val(),clave: $('#clave_usuario').val(), envio:"1"  } );
		});
		//funcion para recuperación de clave de acceso
		$( "#contrasena_recuperar" ).click(function() {
			$( "#sesion_recupera" ).load( "modulos/mod_recuperar.php", { f:"0"  } );
			$('#myModal_recuperacion').modal('show');
		});
		//funcion para recuperación de clave de acceso
		function enviar() {
			$( "#sesion_recupera" ).load( "modulos/mod_recuperar.php", { correo: $('#correo_contacto').val(), envio:"1", 'f':1  } );
		}
		$('#correo_usuario').focus();
	</script>
  </body>
</html>