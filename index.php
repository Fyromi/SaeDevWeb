<?php
ob_start();
session_start();

require_once "connexion.php";
require_once "site.php";
require_once "vue_generique.php";
require_once "module_generique.php";
require_once "composant_generique.php";
require_once "vue_composant_generique.php";

require_once "composants/menu/composant_menu.php";
require_once "composants/footer/composant_footer.php";

Connexion::init_connexion();
$site = new Site();
$site->exec_module();

$menu = new ComposantMenu();
$footer = new ComposantFooter();


$module_html_name = $site->get_module_name();
$module_html = $site->get_module()->get_affichage();
include_once "template.php";
ob_end_flush();

