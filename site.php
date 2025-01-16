<?php


class Site {

	private $module_name;
	private $module;
	
	
	public function __construct() {
		$this->module_name = isset($_GET['module']) ? $_GET['module'] : "CONNEXION";
		switch ($this->module_name) {
			case "CONNEXION" :
				require_once "modules/mod_".$this->module_name."/module_".$this->module_name.".php";
				break;
			case "PROJETS" :
				require_once "modules/mod_".$this->module_name."/module_".$this->module_name.".php";
				break;
			case "RESSOURCES" :
				require_once "modules/mod_".$this->module_name."/module_".$this->module_name.".php";
				break;
			case "ENSEIGNANTS" :
				require_once "modules/mod_".$this->module_name."/module_".$this->module_name.".php";
				break;
			case "CREATION" :
				require_once "modules/mod_".$this->module_name."/module_".$this->module_name.".php";
				break;
			case "DETAILS" : 
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
