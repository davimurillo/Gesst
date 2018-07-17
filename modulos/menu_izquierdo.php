<div class="izquierdo" > 
	<div class="menu">
		<div id="left-menu">
		  <div class="sub-left-menu" >
			<ul class="nav nav-list scroll ">
				<li class="ripple" >
				 <input class="form-control inputsearch" placeholder="Buscar..." >
				</li>
				<?php 
					 $c=0;
					 $modulo="";
					 $sql="SELECT a.id_modulo,a.tx_modulo,CASE WHEN (b.tx_modulo) <> '' THEN b.tx_modulo ELSE '#' END sub_modulos ,CASE WHEN(SELECT count(id_modulo) FROM cfg_modulo WHERE id_modulo_padre=a.id_modulo)>0 THEN  'SUB-MODULO' ELSE 'MODULO' END  AS TIPO, a.n_orden, b.tx_ruta, a.tx_icono, b.tx_icono  as icon_modulo FROM cfg_modulo a LEFT JOIN cfg_modulo b ON b.id_modulo_padre=a.id_modulo WHERE a.id_modulo_padre=0 ORDER BY a.n_orden, b.n_orden ";
					$res=abredatabase(g_BaseDatos,$sql);
					while ($row=dregistro($res)){
						if ($row['tipo']=='MODULO'){
							if ($c==1){
								$c=0;
								echo "</ul>";
							}
					?>
						<li class="ripple" >
						 <a href="<?php echo $dir; ?>" style="font-size:12px; padding-left:-10px">
							<span class="<?php echo $row['tx_icono']; ?>"></span> <?php echo $row['tx_modulo']; ?> 
						</a>
						</li>
					<?php
						}else
						{
						if ($modulo!=$row['tx_modulo']){
							if ($c==1){
								$c=0;
								echo "</ul>";
							}
					?>
							<li class="ripple" data-toggle="collapse" data-target="#demo<?php echo $row['id_modulo']; ?>" style="padding-left:25px">
							 <span class="<?php echo $row['tx_icono']; ?>"></span> <?php echo $row['tx_modulo']; ?> 
							</li>
							<ul id="demo<?php echo $row['id_modulo']; ?>"  class="collapse">
						<?php $c=1; $modulo=$row['tx_modulo']; } ?>
						<li  >
						  <a href="<?php echo $dir.$row['tx_ruta']; ?>" class="ripple nav-sub-modulo" style="font-Size:10px"><span class="<?php echo $row['icon_modulo']; ?>"></span> <?php echo $row['sub_modulos']; ?> </a>
						</li>
					<?php
						}
					}
				?>
			  </ul>
			</div>
		</div>
	</div>
  </div>