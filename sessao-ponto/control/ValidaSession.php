<?php

	session_start();

	function getRealIPAddress(){ 

		if(!empty($_SERVER['HTTP_CLIENT_IP'])){
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		}else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		}else{
			$ip = $_SERVER['REMOTE_ADDR'];
		}

		return $ip;

	}

	if((!isset($_SESSION['usuario_id'])) || ($_SESSION['usuario_ip'] != getRealIPAddress()) || ($_SESSION['id'] != session_id())){

		if (ini_get("session.use_cookies")) {
		    $params = session_get_cookie_params();
		    setcookie(session_name(), '', time() - 42000,
		        $params["path"], $params["domain"],
		        $params["secure"], $params["httponly"]
		    );
		}

	    session_destroy();

	    header('Location:../view/index.php');

	}

?>