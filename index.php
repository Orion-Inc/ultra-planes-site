<?php require_once 'Autoloader.php';?>
<!DOCTYPE html>
<html lang="en">
    <?php App::ViewPartial('header', 'html_blocks')?>
    <body class=" ">
        <?php require_once 'config/Routes/Routes.php'; ?>
        <?php App::ViewPartial('js-scripts', 'html_blocks')?>
    </body>
</html>