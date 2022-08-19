<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    
    <link rel="stylesheet" href="styles/login.css"/>
    <link rel="stylesheet" href="styles/headerAdmin.css"/>
    <link rel="stylesheet" href="styles/header.css"/>
    <link rel="stylesheet" href="styles/footer.css"/>
    <link rel="stylesheet" href="styles/listAbs.css"/>
    
    <!-- cdn bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="scriptJS/jquery-3.6.0.js"></script>
    <script src="scriptJS/login.js"></script>

    <style>
        body{
            background-color:#fff;
            min-height: 100vh !important;
        }
        table td {
            text-transform: capitalize;
        }
    </style>

</head>
<body>
    <?php
        header('Cache-Control: no-cahe, must-revalidate, max-age=0');
        include 'controleur/controleur.php';
        $controleur = new Controleur_app();
        $controleur->execute_app();

    ?>

</body>
</html>