<?php


class Site {

	private $module_name;
	private $module;
	
	
	public function __construct() {
		$this->module_name = isset($_GET['module']) ? $_GET['module'] : "Connexion";
		$_GET['module'] = $this->module_name;
		switch ($this->module_name) {
			case "Connexion" :
				require_once "modules/mod_".$this->module_name."/module_".$this->module_name.".php";
				break;
			case "Projets" :
				require_once "modules/mod_".$this->module_name."/module_".$this->module_name.".php";
				break;
			case "Ressources" :
				require_once "modules/mod_".$this->module_name."/module_".$this->module_name.".php";
				break;
			case "Enseignants" :
				require_once "modules/mod_".$this->module_name."/module_".$this->module_name.".php";
				break;
			case "Creation" :
				require_once "modules/mod_".$this->module_name."/module_".$this->module_name.".php";
				break;
			case "Details" : 
				require_once "modules/mod_".$this->module_name."/module_".$this->module_name.".php";
				break;
			case 'Depot' :
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
