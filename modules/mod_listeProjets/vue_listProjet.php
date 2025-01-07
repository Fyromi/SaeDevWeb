<?php
class VueListProjet{

	public function __construct(){}

	public function afficherListProjet($list){
		?>	
		<h1>Liste Des	 Projet</h1>
		<?php
		foreach ($list as $data) {
			?>
			<ul>
			<li><a href='index.php?module=listeProjets&action=descrProjet&idProj&id=<?=$data['idProjet']?>'> <?=$data['idProjet']?> / <?=$data['titre']?> </a></li>
		</ul>
			<?php
		}    
	}

	public function afficherDetailProjet($projet){
		?>
		
		<h1>Détail du Projet</h1>
		<h4>Nom du Projet</h4>
		<li><?=$projet['titre']?></li>
		<h4>Description</h4>
		<li><?=$projet['description']?></li>
		<?php
	}

	public function affciherProfs($profs){
		?>
		<h4>Liste Enseignant</h4>
		<?php
		foreach ($profs as $prof) {
		?>
			<?=$prof['login']?>  
			<?php
		}
	}
} 
?>