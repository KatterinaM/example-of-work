<?php

namespace Core;

class ModelAuth{
	protected static $instance;
	
	public function instance(){
		if(self::$instance == null){
			self::$instance = new self();
		}

		return self::$instance;
	}
	
	public function hash($str) {
		$salt = '20fjdl';
		return hash('sha256', $str. $salt);
	}
	
	public function addToken($remember){
		$token = hash('sha256', time() . mt_rand(0, 1000000));

		$_SESSION['auth'] = $token;

		if($remember) {
			setcookie('auth', $token, time() + 3600 * 24 * 14, '/');
		}

		return $token;
	}
	
	public function getToken(){
		if(isset($_SESSION['auth'])){
			return $_SESSION['auth'];
		}

		if(isset($_COOKIE['auth'])){
			$_SESSION['auth'] = $_COOKIE['auth'];
			return $_COOKIE['auth'];
		}

		return null;
	}

	public function removeToken(){
		unset($_SESSION['auth']);
		setcookie('auth', '', time() - 1, '/');
	}
}
