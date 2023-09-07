<?php

require "../App/Controllers/StoryController.php";
    class Home {
    public $storycontroller;

        public function bell() {
            require "../App/Views/Users/bell.php";
        }

        public function index() {
            require "../App/Views/index.php";
        }

        public function message() {
            require "../App/Views/Users/message.php";
        }

        public function friends() {
            require "../App/Views/Users/friends.php";
        }

        public function login() {
            require "../App/Views/Users/Beginning/login.phtml";
        }

        public function inscription() {
            require "../App/Views/Users/Beginning/inscription.phtml";
        }

        public function profil() {
            require "../App/Views/Users/profil.php";
        }

        public function space() {
            $this->storycontroller = new StoryController();
            $resultat = $this->storycontroller->selectUser();
            $données = $this->storycontroller->selectUserNot();
            $data = $this->storycontroller->storyAll();
            $datas = $this->storycontroller->storyDistinct();

            require "../App/Views/Users/space.php";
        }

        public function forget() {
            require "../App/Views/Users/Beginning/forget.phtml";
        }

        public function log() {
            session_start();
            session_unset();
            session_destroy();
            header("Location:/");
            // require "../App/Views/Users/login.php";
        }
    }