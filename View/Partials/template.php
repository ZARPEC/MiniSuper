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
    <title>Mini Super</title>
    <link rel="stylesheet" href="assets/css/userStyle.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/SidebarStyle.css">
    <script src="https://kit.fontawesome.com/19795a1502.js" crossorigin="anonymous"></script>
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