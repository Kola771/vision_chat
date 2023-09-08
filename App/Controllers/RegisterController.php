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
    public $password;
    public $confirm_password;
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
                if (count($res) > 0) {
                    echo json_encode(["error" => "Un utilisateur utilise déjà cet e-mail !!!"]);
                } else {
                    if (strlen($this->user_username) >= 4) {
                        $resultat = $this->usermodel->verifyName0($this->user_username);
                        if (count($resultat) > 0) {
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

    public function verifyEmailInp()
    {
        $donnees = file_get_contents("php://input");
        $donnees = json_decode($donnees);
        $this->email = $this->sanitaze($donnees->email);
        //Instanciation de la classe UserModel
        $this->usermodel = new User();
        $res = $this->usermodel->verifyMail($this->email);
        $result = $this->verifyEmail();
        if ($result) {
            if (count($res) > 0) {
                $code = rand(0, 1000000);
                    $this->usermodel->updateCode($code, $this->email);
                    $result = $this->usermodel->verifyMail($this->email);
                    try {
                        $to = $result[0]["user_email"];
                        $code_randown = $result[0]["number_rand"];
                        $subject = "Pour la réintialisation de votre mot de passe vous devez entrer le code ci-dessous.";
                        $message = "Code de confirmation d'email : " . $code_randown;
                        $headers = "From: DM" . "\r\n" . "CC: dmchat@gmail.com";
                        // NB: geniusblog@gmail.com, cet email dépend de l'hébergeur sur lequel se trouve notre site et doit être valide.
                        mail($to, $subject, $message, $headers);
                        echo json_encode(["result" => "good"]);
                    } catch (\Throwable $th) {
                        echo json_encode(["result" => "Erreur subvenue lors de l'envoi du code !!!"]);
                    }
            } else {
                echo json_encode(["error" => "L'email entré n'existe pas dans notre base !!!"]);
            }
        } else {
            echo json_encode(["error" => "L'email entré ne respecte pas le format requis !!!"]);
        }
    }

    public function verifyCodeInp()
    {
        $donnees = file_get_contents("php://input");
        $donnees = json_decode($donnees);
        $this->email = $this->sanitaze($donnees->email);
        $codeInp = $this->sanitaze($donnees->code);
        //Instanciation de la classe UserModel
        $this->usermodel = new User();
        $res = $this->usermodel->verifyMail($this->email);
        $result = $this->verifyEmail();
        if ($result) {
            if (count($res) > 0) {
                if($res[0]["number_rand"] === intval($codeInp))
                {
                    echo json_encode(["result" => "Le code est correct !!!"]);
                } else {
                    echo json_encode(["error" => "Le code entré n'est pas correct !!!"]);
                }
            } else {
                echo json_encode(["error" => "L'email entré n'existe pas dans notre base !!!"]);
            }
        } else {
            echo json_encode(["error" => "L'email entré ne respecte pas le format requis !!!"]);
        }
    }

    public function updatePassword()
    {
        $donnees = file_get_contents("php://input");
        $donnees = json_decode($donnees);
        $this->email = $this->sanitaze($donnees->email);
        
        $this->password = $this->sanitaze($donnees->password);
        $this->confirm_password = $this->sanitaze($donnees->confirm_password);

        $re1 = $this->passWord($this->password);
        $re2 = $this->passWord($this->confirm_password);

        if ($re1) {
            if ($re2) {
                $ver = $this->verifyPassword();
                if ($ver) {
                    //Instanciation de la classe UserModel
                    $this->usermodel = new User();
                    $this->usermodel->updatePassword($this->password, $this->email);
                    echo json_encode(["route" => "/", "result" => "good"]);
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