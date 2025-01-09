<!DOCTYPE html>
<html lang="fr">
    <head><title>SAE WEB</title></head>
    <body>
    <header>
        <?php echo $menu->getAffichage(); ?>
        <h1><?$module_html_name?></h1>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="style.css">

</header>

    <main>
        <?=$module_html?>
    </main>

    <footer>
        <?php echo $footer->getAffichage();?>
    </footer>
    </body>
</html>
