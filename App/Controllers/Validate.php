<?php
require "../App/Controllers/Connexion.php";
require "../App/Models/User.php";
class Validate
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
    public $image;
    public $sexe;
    public $matrimonial;
    public $password;
    public $confirm_password;
    public $created_at;
    public $status;
    public $role;


    public function insertData()
    {
        $donnees = file_get_contents("php://input");
        $donnees = json_decode($donnees);
        $this->firstname = $this->sanitaze($donnees->firstname);
        $this->firstname = $this->ucWords($this->firstname);

        $this->lastname = $this->sanitaze($donnees->lastname);
        $this->lastname = $this->capitalLetter($this->lastname);

        $this->date = $this->sanitaze($donnees->date);

        $this->email = $this->sanitaze($donnees->useremail);

        $this->image = "account.jpg";

        $this->user_username = $this->sanitaze($donnees->username);
        $this->user_username = $this->ucWords($this->user_username);

        $this->sexe = $donnees->sexe;
        $this->matrimonial = $donnees->valSelect;

        $this->password = $this->sanitaze($donnees->password);
        $this->confirm_password = $this->sanitaze($donnees->confirm_password);

        $this->status = "Active";

        $this->role = "user";

        $this->created_at = date("Y-m-d h:i:s");

        $re1 = $this->passWord($this->password);
        $re2 = $this->passWord($this->confirm_password);
        if ($re1) {
            if ($re2) {
                $ver = $this->verifyPassword();
                if ($ver) {
                    $this->usermodel = new User();
                    $this->usermodel->insertUser($this->firstname, $this->lastname, $this->date, $this->user_username, $this->email, $this->image, $this->sexe, $this->matrimonial, $this->password, $this->role, $this->status, $this->created_at);
                    $res = $this->usermodel->verifyName($this->user_username);
                    if (count($res) > 0) {
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
                        echo json_encode(["route" => "/home/space", "result" => "good"]);
                    } else {
                        echo json_encode(["error" => "Insertion non réussie !!!"]);
                    }
                } else {
                    echo json_encode(["error" => "Les mots de passes ne sont pas identiques !!!"]);
                }
            } else {
                echo json_encode(["error" => "Le mot de passe inséré ne respecte pas nos critères. Il faut minimum 8 caractères. <br> Ex: xszedrftgh@2000!!!"]);
            }
        } else {
            echo json_encode(["error" => "Le mot de passe inséré ne respecte pas nos critères. Il faut minimum 8 caractères contenant des chiffres. <br> Ex: xszedrftgh@2000!!!"]);
        }
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
     * ucWords(); pour transformer les premières lettres en majuscule
     */
    public function ucWords($data)
    {
        $data = ucwords($data, " ");
        return $data;
    }

    /**
     * capitalLetter(); pour transformer toutes les lettres en majuscule
     */
    public function capitalLetter($data)
    {
        $data = strtoupper($data);
        return $data;
    }

    /**
     * passWord(), format des mots de passe qu'on accepte
     */
    public function passWord($data)
    {
        if (strlen($data) >= 8) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * verifyPassword(), pour vérifiez si les deux mot de passe que l'utilisateur entre sont corrects
     */
    public function verifyPassword()
    {
        if ($this->password === $this->confirm_password) {
            return true;
        } else {
            return false;
        }
    }

}