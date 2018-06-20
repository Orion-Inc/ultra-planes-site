<?php
    session_start();
    $page = explode('/', $_GET['url'])[0];
    
    spl_autoload_register(function ($class_name){
        if (file_exists('config/Classes/'.$class_name.'.Class.php')) {
            require_once 'config/Classes/'.$class_name.'.Class.php';
        }else if (file_exists('config/Controllers/'.$class_name.'.php')) {
            require_once 'config/Controllers/'.$class_name.'.php';
        }
    });

    if ($page == "index.php") {
        header("Location: home");
    }
?>