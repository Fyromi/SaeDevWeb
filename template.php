<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAE WEB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        html, body {
            height: 100%; 
            background-color: #DDD1BC;
            margin: 0;
        }
        body {
            display: flex;
            flex-direction: column;
        }
        header {
            flex: 0 0 10%; 
        }
        main {
            flex: 1;
        }
        footer {
            flex: 0 0 auto;
        }
        .scrollable-section {
            max-height: 200px; /* Définir la hauteur maximale */
            overflow-y: auto; /* Activer le défilement vertical */
        }
    </style>
</head>
<body>
    <header class="container my-4 align-items-center">
        <?php echo $header->getAffichage(); ?>
    </header>

    <main class="container my-4">
        <?= $module_html ?>
    </main>

    <footer class="container my-4 text-center">
        <?php echo $footer->getAffichage(); ?>
    </footer>
</body>
</html>
