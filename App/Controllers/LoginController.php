<?php
require "../App/Controllers/Connexion.php";
require "../App/Models/User.php";
class LoginController
{

    /**
     * $usermodel; on va utiliser cette variable pour instancier la classe UserModel dans le controller
     */
    public $usermodel;

    public $user_username;
    public $password;

    /**
     * formTwo(); pour récupérer les données de l'utilisateur et agit en fonction
     */
    public function formulaire()
    {
        $donnees = file_get_contents("php://input");
        $donnees = json_decode($donnees);

        $this->user_username = $this->sanitaze($donnees->nameOrEmail);
        $this->password = $this->sanitaze($donnees->pass);
        $this->emptyInputs();
        $this->verifyControl();
    }

    /**
     * sanitaze(); pour les espacements et les injections de codes
     */
    public function sanitaze($data)
    {
        $reg = preg_replace("/\s+/", " ", $data);
        $reg = preg_replace("/^\s*/", "", $reg);
        $reg = htmlspecialchars($reg);
        $reg = stripslashes($reg);
        $data = $reg;
        return $data;
    }

    /**
     * verifyControl(), vérifie s'il existe un utilisateur dans la bd et compte tenu du résultat ajoute ou non dans la bd
     */
    public function verifyControl()
    {

        //Instanciation de la classe User
        $this->usermodel = new User();
        $res = $this->usermodel->verifyName($this->user_username);
        $count = count($res);

        if ($count > 0) {
            $password = password_verify($this->password, $res[0]["user_password"]);
            if ($password === true) {
                $this->usermodel->updateStatusActive($res[0]["user_id"]);
                $res = $this->usermodel->verifyName($this->user_username);
                session_start();
                $_SESSION["id"] = $res[0]["user_id"];
                $_SESSION["firstname"] = $res[0]["user_firstname"];
                $_SESSION["lastname"] = $res[0]["user_lastname"];
                $_SESSION["email"] = $res[0]["user_email"];
                $_SESSION["username"] = $res[0]["user_username"];
                $_SESSION["image"] = $res[0]["user_image"];
                $_SESSION["sexe"] = $res[0]["user_sexe"];
                $_SESSION["role"] = $res[0]["user_role"];
                $_SESSION["status"] = $res[0]["user_status"];
                $_SESSION["situation"] = $res[0]["user_situation"];
                echo json_encode(["route"=>"/home/space", "result"=>"good"]);
                exit();
            } else {
                echo json_encode(["error"=>"Le mot de passe est incorrect !!!"]);
                exit;
            }
        } else {
            echo json_encode(["error"=>"Pas de correspondance !! Vous êtes sûr que ce sont vos données sont correctes !!!"]);
            exit;
        }

    }

    /**
     * emptyInputs(), pour vérifiez si un des champs est vide
     */
    public function emptyInputs()
    {

        if (empty($this->user_username) || empty($this->password)) {
            echo "Remplissez tous les champs !!!";
            exit();
        } else {
            return false;
        }
    }

    public function logOut()
    {
        session_start();
        $id = $_SESSION["id"];
        //Instanciation de la classe UserModel
        $this->usermodel = new User();
        $this->usermodel->updateStatus($id);
        $res = $this->usermodel->verifyId($id);
        session_unset();
        session_destroy();
        header("Location:/");
        // require "../App/Views/Users/login.php";
    }

}