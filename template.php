    <html>
<link rel="stylesheet" href="style.css">
<head><title>Rajouter ici le titre set par le module</title></head>
<body>
<header >
<h1><?php echo $site->get_module_name()?></h1>
<?php echo $menu->getAffichage(); ?>
</header>

<main>
<?=$module_html?>
</main>

<footer><?php echo $footer->getAffichage();?></footer>
</body>
