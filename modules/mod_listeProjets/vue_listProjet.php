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

	public function affciherMembreGrp($grp){
		?>
		<h4>Membre du Groupe</h4>
		<?php
		foreach ($grp as $etudiant) {
		?>
			<?=$etudiant['login']?>  
			<?php
		}
	}

	public function afficherMenue() {
		?>
		<div class="menu-container" style="height: 100vh; display: flex; align-items: center; justify-content: center;">
			<a href="index.php?module=listeProjets" 
			   class="btn btn-primary btn-lg d-flex flex-column align-items-start justify-content-center position-relative bg-white text-dark border-0 w-50" 
			   style="font-size: 3em; padding: 30px 0 0 0; border-radius: 15px;">
				<span class="ms-3">Projets</span>
				<img src="imageGRP.jpg" alt="Icone Projets" 
					 style="width: 100%; 
							height: 200px; 
							object-fit: cover; 
							margin-top: 30px; 
							display: block;
							border-radius: 15px;"> 
			</a>
		</div>
		<?php
	}
	
	

	
	

} 
?>