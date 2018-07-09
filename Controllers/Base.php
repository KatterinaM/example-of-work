<?php

namespace Controllers;

use Core\Template;

abstract class Base{
	protected $params;
	protected $templateBuilder;

	public function __construct(){
		$this->templateBuilder = Template::instance();
	}

	public function load($params){
		$this->params = $params;
	}
	
	public function __call($name, $params){
		$this->page404();
	}

	public abstract function render();
	
	public abstract function page404();
	
	protected function template($path, $params = []){
		return $this->templateBuilder->render($path, $params);
	}
}