<?php
    include_once "Controller/pagesController.php";

    if(isset($_GET['request'])){
        $request = $_GET['request'];
    } else {
        $request = '';
    }

    $controller = new PagesController();

    switch ($request) {
        case 'login':
            $controller->login();
            break;
        case 'register':
            $controller->register();
            break;
        case 'dashboard':
            $controller->dashboard();
            break;
        default:
            $controller->error();
            break;
    }
?> 
