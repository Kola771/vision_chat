<?php 
    class Home {
        public function index() {
            require "../App/Views/index.php";
        }

        public function friends() {
            require "../App/Views/Users/friends.php";
        }

        public function login() {
            require "../App/Views/Users/login.php";
        }

        public function profil() {
            require "../App/Views/Users/profil.php";
        }

        public function space() {
            require "../App/Views/Users/space.php";
        }

        public function forget() {
            require "../App/Views/Users/forget.php";
        }
        public function log() {
            session_start();
            session_unset();
            session_destroy();
            require "../App/Views/Users/login.php";
        }
    }