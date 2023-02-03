
<?php
require "../App/Controllers/Connexion.php";
require "../App/Models/UserModel.php";
class Validate {

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

    
    public function insertData() {
        if($_POST["password"]) { 
            $id = rand(0, 1000000);
            $this->firstname = $this->sanitaze($_POST["firstname"]);
            $this->firstname = $this->ucWords($this->firstname);
            
            $this->lastname = $this->sanitaze($_POST["lastname"]);
            $this->lastname = $this->capitalLetter($this->lastname);

            $this->date = $this->sanitaze($_POST["date"]);

            $this->email = $this->sanitaze($_POST["useremail"]);
            
            $this->image = "account.jpg";

            $this->user_username = $this->sanitaze($_POST["username"]);
            $this->user_username = $this->ucWords($this->user_username);

            $this->sexe = $_POST["sexe"];
            $this->matrimonial = $_POST["matrimonial"];

            $this->password = $this->sanitaze($_POST["password"]);
            $this->confirm_password = $this->sanitaze($_POST["confirm_password"]);

            $this->status = "Active";

            $this->role = "user";

            $this->created_at = date("Y-m-d h:i:s");

            $this->emptyInputs();
            $this->passWord($this->password);
            $this->passWord($this->confirm_password);
            $this->verifyPassword();
            
            $this->usermodel = new UserModel();
            $this->usermodel->insertUser($id, $this->firstname, $this->lastname, $this->date, $this->user_username, $this->email, $this->image, $this->sexe, $this->matrimonial, $this->password, $this->role, $this->status, $this->created_at);
            echo "That's good";
            exit;
        }
    }

    /**
     * sanitaze(); pour les espacements et les injections de codes
     */
    public function sanitaze($data) {
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
    public function ucWords($data) {
        $data = ucwords($data, " ");
        return $data;
    }
    
    /**
     * capitalLetter(); pour transformer toutes les lettres en majuscule
     */
    public function capitalLetter($data) {
        $data = strtoupper($data);
        return $data;
    }

    /**
     * passWord(), format des mots de passe qu'on accepte
     */
    public function passWord($data) {

        if(preg_match("/^[a-zA-Z-\@]+[\d]+/i", $data) && strlen($data) >= 8) {
            return true;
        } 
        
        else {
            echo "Le mot de passe inséré ne respecte pas nos critères. Il faut minimum 8 caractères contenant des chiffres et pas de caractères spéciaux. <br> Ex: Username2000!!!";
            exit();
        }

    }
    
    /**
     * emptyInputs(), pour vérifiez si un des champs est vide
     */
    public function emptyInputs() {

        if(empty($this->password) || empty($this->confirm_password)){
            echo "Remplissez tous les champs !!!";
            exit();
        } 
            else{
            return false;
        }
    }
    
    /**
     * verifyPassword(), pour vérifiez si les deux mot de passe que l'utilisateur entre sont corrects
     */
    public function verifyPassword() {

        if ($this->password !== $this->confirm_password) {
            echo "Les mots de passes ne sont pas identiques !!!";
            exit();
       } 
       return false;

    }

}