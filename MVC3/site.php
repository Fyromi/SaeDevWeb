<?php

class Site {

	private $module_name;
	private $module;
	
	
	public function __construct() {
		$this->module_name = isset($_GET['module']) ? $_GET['module'] : "connexion";
		switch ($this->module_name) {
			case "connexion" :
				require_once "modules/mod_".$this->module_name."/module_".$this->module_name.".php";
				break;
			default :
				die ("Module inexistant");
		}
	}
	
	public function exec_module() {
		$module_class = "Mod".$this->module_name;
		$this->module = new $module_class();
		$this->module->exec();
	}

	public function get_module() {
		return $this->module;
	}
    public function get_module_name() {
        return $this->module_name;
    }

}	
