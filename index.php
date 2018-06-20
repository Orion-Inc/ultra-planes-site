<?php require_once 'Autoloader.php';?>
<!DOCTYPE html>
<html lang="en">
    <?php App::ViewPartial('header', 'html_blocks')?>
    <body class=" ">
        <a id="start"></a>
        <?php App::ViewPartial('side-bar', 'html_blocks')?>
        <div class="main-container">
            <?php require_once 'config/Routes/Routes.php'; ?>
            <?php App::ViewPartial('footer', 'html_blocks')?>
        </div>
        <a class="back-to-top inner-link" href="#start" data-scroll-class="100vh:active">
            <i class="stack-interface stack-up-open-big"></i>
        </a>
        <?php App::ViewPartial('js-scripts', 'html_blocks')?>
    </body>
</html>