<?php
use Controller\Page\PageController;
require_once('autoload.php');

$GetLink = new PageController;
ob_start();
?>

<!DOCTYPE html>
<html lang="Es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no,width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#81B9AF">
    <title>MiniSuper</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/userStyle.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/SidebarStyle.css">
   <script src="https://kit.fontawesome.com/19795a1502.js" crossorigin="anonymous"></script>
   <script src="assets/Js/rederigir.js"></script>
   <script src="assets/Js/ShopCart.js"></script>
   <script src="assets/Js/CargarDepartamento.js"></script>
   
</head>



<body>
    <div class="MainPage">
        <?php
        require_once('View/Partials/SideBar.php');
        $GetLink->LinkPage();
        ?>
    </div>
</body>

<footer class="Main-Footer">
</footer>

</html>
<?php
ob_end_flush();
?>