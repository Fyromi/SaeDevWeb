<html>
<link rel="stylesheet" href="style.css">
<head><title>Rajouter ici le titre set par le module</title></head>
<body>
<header><?php echo $menu->getAffichage(); ?>
    <h1><?$module_html_name?></h1>
</header>

<main>
<?=$module_html?>
</main>

<footer><?php echo $footer->getAffichage();?></footer>
</body>
