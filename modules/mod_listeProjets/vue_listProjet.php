<?php
class VueListProjet {
    public function __construct() {}

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
                                        <h5 class="card-title"><?= $data['titre'] ?></h5>
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

    public function afficherDetailProjet($projet, $profs, $grp) {
        ?>
        <div class="container mt-4">
            <h1 class="text-center mb-4"><?= $projet['titre'] ?></h1>
            <div class="card shadow-sm mx-auto" style="max-width: 40%;">
                <div class="card-body px-0">
                    <div class="mb-4">
                        <?php $this->afficherProfs($profs); ?>
                    </div>
                    <div class="mb-4 ps-4"> <!-- Ajout du padding-left -->
                        <?php $this->afficherMembreGrp($grp); ?>
                    </div>
                    <div class="px-3">
                        <?php $this->afficherObjectif($projet); ?>
                    </div>
                    <div class="text-end mt-4 px-3">
                        <a href="index.php?module=Ressources&action=menue&idProjet=<?=$projet['idProjet']?>" 
                           class="btn btn-dark text-white rounded-pill">
                            Accès aux ressources du projet <?= $projet['titre']; ?> >>>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    public function afficherProfs($profs) {
        ?>
        <h4 class="mb-3 px-3 fw-semibold">Enseignants</h4>
        <div class="d-flex gap-3" style="overflow-x: auto; padding: 0 1rem 1rem 1rem;"> <!-- Changé gap-5 en gap-3 -->
            <?php foreach ($profs as $prof): ?>
                <a href="index.php?module=Profile&id=<?= $prof['login']; ?>" class="text-dark text-decoration-none">
                    <div class="d-flex flex-column align-items-center">
                        <?php
                        $image = base64_encode($prof["image"]);
                        echo "<img src='data:image/png;base64,$image' alt='Image de profil' class='rounded-circle mb-2' width='50' height='50'/>";
                        echo "<div>" . $prof['login'] . "</div>";
                        ?>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
        <style>
            .d-flex::-webkit-scrollbar {
                display: none;
            }
            .d-flex {
                -ms-overflow-style: none;
                scrollbar-width: none;
            }
        </style>
        <?php
    }

	public function afficherMembreGrp($groupe) {
		?>
		<h4 class="mb-3 fw-semibold"><?= $groupe[0]['nomGroupe']; ?></h4>
		<div class="d-flex flex-wrap gap-4 justify-content-start">
			<?php foreach ($groupe[1] as $etudiant): ?>
				<a href="index.php?module=Profile&id=<?= $etudiant['login']; ?>" class="text-dark text-decoration-none">
					<div class="d-flex flex-column align-items-center">
						<?php
						$image = base64_encode($etudiant["image"]);
						echo "<img src='data:image/png;base64,$image' alt='Image de profil' class='rounded-circle mb-2' width='50' height='50' style='display: block;' />";
						echo "<span class='text-center'>" . $etudiant['login'] . "</span>"; // Le texte est centré avec la classe text-center
						?>
					</div>
				</a>
			<?php endforeach; ?>
		</div>
		<?php
	}
	

    public function afficherObjectif($projet) {
        ?>
        <h4 class="mb-3 fw-semibold">Objectif</h4>
        <p class="fst-italic">"<?= $projet['description']; ?>"</p>
        <?php
    }

    public function afficherMenue() {
        ?>
        <div class="menu-container" style="height: 100vh; display: flex; align-items: center; justify-content: center;">
            <a href="index.php?module=listeProjets" 
               class="btn btn-primary btn-lg d-flex flex-column align-items-start justify-content-center position-relative bg-white text-dark border-0 w-50" 
               style="font-size: 3em; padding: 30px 0 0 0; border-radius: 15px;">
                <span class="ms-3">Projets</span>
                <img src="images/imageGRP.jpg" alt="Icone Projets" 
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
