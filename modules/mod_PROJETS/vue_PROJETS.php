<?php
class VuePROJETS {
    public function __construct() {}

    public function afficherListProjet($list) {
        ?>
        <div class="row pb-5">
            <div class="col-sm-10 col-xs-6 col-9">
                <h3 class="border-bottom border-secondary pb-3">Liste de projets</h3>
            </div>
            <div class="col-sm-1 col-xs-1 col-1 text-end">
                <a href="index.php?module=Projets&action=menu" class="btn">
                    <div class="card shadow-sm text-center p-1">
                        <img class="card-img m-0" src="icons/retour.png" alt="Retour">
                        <span class="card-title h6">Retour</span>
                    </div>
                </a>
            </div>
            <?php foreach ($list as $data) { ?>
                <div class="col-6 mb-4">
                    <a href="index.php?module=Projets&action=descrProjet&idProj&id=<?= htmlspecialchars($data['idProjet']) ?>" 
                        class="text-dark text-decoration-none">
                        <div class="card shadow-sm">
                            <div class="card-body text-center py-4">
                                <h5 class="card-title fs-3 p-3 mb-0"><?= htmlspecialchars($data['titre']) ?></h5>
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
        <?php
    }

    public function afficherDetailProjet($projet, $profs, $grp) {
        ?>
        <div class="row">
            <div class="col-sm-10 col-xs-6 col-9">
                <h3 class="border-bottom border-secondary pb-3"><?= htmlspecialchars($projet['titre']) ?></h3>
            </div>
            <div class="col-sm-1 col-xs-1 col-1 text-end">
                <a href="index.php?module=Projets" class="btn">
                    <div class="card shadow-sm text-center p-1">
                        <img class="card-img m-0" src="icons/retour.png" alt="Retour">
                        <span class="card-title h6">Retour</span>
                    </div>
                </a>
            </div>
        </div>
        <div class="card">
            <?php $this->afficherProfs($profs); ?>
            <?php $this->afficherMembreGrp($grp); ?>
            <?php $this->afficherObjectif($projet); ?>
            <a href="index.php?module=Ressources&action=menue&idProjet=<?= htmlspecialchars($projet['idProjet']) ?>" 
                class="btn btn-dark text-white m-3">
                Accès aux ressources du projet <?= htmlspecialchars($projet['titre']); ?> >>>
            </a>
        </div>
        <?php
    }

    public function afficherProfs($profs) {
        ?>
        <h5 class="card-header">Enseignants</h5>
        <div class="card-body">
            <div class="row">
            <?php foreach ($profs as $prof): ?>
                <div class="col-4">
                    <div class="d-flex flex-column align-items-center">
                        <?php
                        echo "<img src=" . htmlspecialchars($prof['image']) . " alt='Image de profil' class='rounded-circle mb-2' width='50' height='50'/>";
                        echo "<div>" . htmlspecialchars($prof['login']) . "</div>";
                        ?>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
        <?php
    }

    public function afficherMembreGrp($groupe) {
        ?>
        <h5 class="card-header"><?= htmlspecialchars($groupe[0]['nomGroupe']); ?></h5>
        <div class="card-body">
            <div class="row">
            <?php foreach ($groupe[1] as $etudiant): ?>
                <div class="col-4">
                    <div class="d-flex flex-column align-items-center">
                        <?php                        
                        echo "<img src=" . htmlspecialchars($etudiant['image']) . " alt='Image de profil' class='rounded-circle mb-2' width='50' height='50'/>";
                        echo "<span class='text-center'>" . htmlspecialchars($etudiant['login']) . "</span>"; // Le texte est centré avec la classe text-center
                        ?>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
        <?php
    }

    public function afficherObjectif($projet) {
        ?>
        <h5 class="card-header">Objectif</h5>
            <div class="card-body">
            <p class="card-text">"<?= htmlspecialchars($projet['description']); ?>"</p>
            </div>
        <?php
    }

    public function afficherMenue() {
        ?>
        <div class="col-sm-6">
            <a href="index.php?module=Projets" class="text-decoration-none">
                <div class="card shadow-sm">
                    <div class="card-body text-center p-0">
                        <h5 class="card-title fs-3 p-3 mb-0">Liste de projets</h5>
                        <img src="images/imageGRP.jpg" class="card-img m-0" alt="Icone Projets">
                    </div>
                </div>
            </a>
        </div>
        <?php
    }
}
?>
