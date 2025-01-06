<?php
class VueListProjet{

	public function __construct(){}

	public function afficherListProjet($list){
		echo '<h1>Liste Des Projet</h1>';

		foreach ($list as $data) {
			echo '<pre>';
			echo  "<a href='mod_listProjet.php?action=descrProjet&idProj&id=".$data['idProjet']."'>". $data['idProjet'] .' / '.$data['titre'].  "</a>";  
			echo '</pres>';
		}    
	}

	public function afficherDetailProjet($projet){
		echo '<h1>Détail du Projet</h1>';
		echo '<pre>';
		echo '<h4>Nom du Projet</h4>';
		echo '<ul>'.$projet['titre'].'</ul>';
		echo '<h4>Description</h4>';
		echo '<ul>'.$projet['description'].'</ul>';
		echo '</pre>';
	}

	public function affciherProfs($profs){
		echo '<pre>';
		echo '<h4>Liste Enseignant</h4>';
		foreach ($profs as $prof) {
			echo $prof['login']. "  ";
		}
		echo '</pre>';
	}
} 
?>