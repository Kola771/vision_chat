<?php
require "../App/Controllers/Connexion.php";
require "../App/Models/User.php";
class RegisterController
{

    /**
     * $usermodel; on va utiliser cette variable pour instancier la classe UserModel dans le controller
     */
    public $usermodel;

    public $firstname;
    public $lastname;
    public $date;
    public $email;
    public $user_username;
    public $sexe;
    public $matrimonial;

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
     * verifyEmail(), pour vérifiez si l'email suis les normes pré-requises
     */
    public function verifyEmail()
    {
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return $this->email;
    }

    public function verifyData()
    {
        $donnees = file_get_contents("php://input");
        $donnees = json_decode($donnees);

        $this->email = $this->sanitaze($donnees->useremail);
        $this->user_username = $this->sanitaze($donnees->username);
        if (empty($this->email) || empty($this->user_username)) {
            echo json_encode(["error" => "Veuillez bien remplir les champs adresse électronique et pseudo !!!"]);
        } else {
            $result = $this->verifyEmail();
            if ($result) {
                //Instanciation de la classe UserModel
                $this->usermodel = new User();
                $res = $this->usermodel->verifyMail($this->email);
                if(count($res) > 0)
                {
                    echo json_encode(["error" => "Un utilisateur utilise déjà cet e-mail !!!"]);
                } else {
                    if(strlen($this->user_username) >= 4)
                    {
                        $resultat = $this->usermodel->verifyName0($this->user_username);
                        if(count($resultat) > 0)
                        {
                            echo json_encode(["error" => "Un utilisateur utilise déjà ce pseudo !!!"]);
                        } else {
                            echo json_encode(["result" => "good"]);
                        }
                    } else {
                        echo json_encode(["error" => "Votre pseudo doit comportér un certain nombre de caractères supérieurs ou égales à 4 !!!"]);
                    }
                }
            } else {
                echo json_encode(["error" => "L'email entré ne respecte pas le format requis !!!"]);
            }
        }
    }

}