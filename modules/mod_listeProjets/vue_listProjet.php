<?php
class VueListProjet{

	public function __construct(){}

	public function afficherListProjet($list) {
		?>
		<div class="container mt-4">
		<h1 class="text-center mb-4">Projets</h1>
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">
					<div class="d-flex flex-column gap-3">
						<?php foreach ($list as $data) { ?>
							<div class="card">
								<div class="card-body">
									<a href="index.php?module=listeProjets&action=descrProjet&idProj&id=<?= $data['idProjet'] ?>" 
									   class="text-dark text-decoration-none">
										<h5 class="card-card"><?= $data['titre'] ?></h5>
									</a>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<?php
	}

	public function afficherDetailProjet($projet, $prof,$grp){
		?>
		
		<h1><?=$projet['titre']?></h1>
		<li><?=$this->affciherProfs($prof)?></li>
		<li><?=$this->affciherMembreGrp($grp)?></li>
		<li><?=$this->afficherObjectif($projet)?></li>
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
		<h4><?php echo $grp[1]['nomGroupe']?></h4>
		<?php
		foreach ($grp[0] as $etudiant) {
		?>
			<a href='https://moodle.iut.univ-paris8.fr/'><?=$etudiant['login']?></a>
			<?php
		}
	}

	public function afficherObjectif($projet){
		?>
		<h4>Objectif</h4>
		<?php
		echo $projet['description'];
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