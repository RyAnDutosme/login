<?php
    class PagesController {
        function login() {
            include "View/login.html";
        }
        function register() {
            include "View/register.html";
        }
        function dashboard() {
            include "View/dashboard.html";
        }
        function error() {
            include "View/404.php";
        }
    }
?>