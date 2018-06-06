<?PHP
	
	// definición de variables globales -----//
	
		define("g_dir", $dir."../");
	
	//-------------------------------------------------------------------------
	
	
	// definición de variables para el servidor de Base de Datos -----//
	
		define("g_TipoBaseDatos", "pgsql");
		define("g_User", "postgres");
		define("g_Pass", "usbw");
		define("g_Port", "5432");
		define("g_ServidorBaseDatos","localhost");
		define("g_BaseDatos", "GESSALUD");
	
	//-------------------------------------------------------------------------
	
	
	
	// --- FUNCIONES/
	
		include_once(g_dir.'lib/php/lib.bd.php'); 	
	    include_once(g_dir.'lib/php/lib.funciones.php'); 		
	
	//-------------------------------------------------------------------------

?>
