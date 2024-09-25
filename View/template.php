<?php
use Controller\Page\PageController;
require_once('autoload.php');

$GetLink = new PageController;
ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiniSuper</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Super</title>
    <link rel="stylesheet" href="assets/css/userStyle.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://kit.fontawesome.com/19795a1502.js" crossorigin="anonymous"></script>

</head>



<body>
    <div class="MainPage">
        <?php
        require_once('View/SideBar.php');
        $GetLink->LinkPage();
        ?>
    </div>
</body>

<footer class="bg-dark text-light text-center py-3 bottom">
</footer>

</html>
<?php
ob_end_flush();
?>