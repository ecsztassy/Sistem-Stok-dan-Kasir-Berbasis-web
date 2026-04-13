<?php
	@ob_start();
	session_start();

	if(!empty($_SESSION['admin'])){
		require 'config.php';
		
		// Include access control system
		include 'access_control.php';
		
		include $view;
		$lihat = new view($config);
		$toko = $lihat -> toko();
		
		//  admin
			include 'admin/template/header.php';
			include 'admin/template/sidebar.php';
				if(!empty($_GET['page'])){
					// Access control sudah di-handle di access_control.php
					include 'admin/module/'.$_GET['page'].'/index.php';
				}else{
					include 'admin/template/home.php';
				}
			include 'admin/template/footer.php';
		// end admin
	}else{
		echo '<script>window.location="login.php";</script>';
		exit;
	}
?>