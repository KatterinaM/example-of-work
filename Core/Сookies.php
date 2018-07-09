<?php
namespace Core;	
	
	class Cookies{
		
		/*protected static $instance;
		
		public static function instance(){
		if(self::$instance == null){
			self::$instance = new self();
		}

		return self::$instance;
		}*/

		public static function add($name, $value, $time = null, $path = '/'){
			setcookie($name, $value, $time, $path);
			$_COOKIE[$name] = $value;
		}

		public static function read($name){
			return $_COOKIE[$name] ?? null;
		}

		public static function slice($name){
			$value = self::read($name);
			self::remove($name);
			return $name;
		}

		public static function remove($name){
			setcookie($name, '', 1, $path);
			
			if(isset($_COOKIE[$name])){
			unset($_COOKIE[$name]);
			}
		}

		public static function removeAll(){
			foreach ($_COOKIE as $name => $value){
			self::remove($name);	
		}
	}	
