<?php
class Router {
    public static function goToLogin() {
        header("Location: /login.php");
        exit();
    }
    public static function goToHome() {
        header("Location: /");
        exit();
    }
    
    public static function route() {
        $page = filter_input(INPUT_GET, "page");
        if($page == "contact") {
            DefaultController::contact();
        }elseif ($page == "addprof") {
            AddprofController::index();
        }elseif ($page == "addnote") {
            AddnoteController::index();
        }else {
            UserController::index();
        }
    }
}