
<?php
require "../App/Controllers/Connexion.php";
require "../App/Models/UserModel.php";
class RegisterController {

    /**
     * $usermodel; on va utiliser cette variable pour instancier la classe UserModel dans le controller
     */
    public $usermodel;

    public $firstname;
    public $lastname;
    public $date;
    public $email;
    public $user_username;
    public $wordkey;
    public $sexe;
    public $matrimonial;

    
    /**
     * formOne(); pour récupérer les données de l'utilisateur et agit en fonction
     */
    public function formOne() {
        if(isset($_POST["firstname"])) {
            
            $this->firstname = $this->sanitaze($_POST["firstname"]);
            $this->lastname = $this->sanitaze($_POST["lastname"]);
            $this->date = $this->sanitaze($_POST["date"]);
            $this->emptyInputsOne();

            echo  "That's good";

        }
    }
    
    /**
     * formTwo(); pour récupérer les données de l'utilisateur et agit en fonction
     */
    public function formTwo() {
        if(isset($_POST["useremail"])) {
            
            $this->email = $this->sanitaze($_POST["useremail"]);
            $this->user_username = $this->sanitaze($_POST["username"]);
            $this->wordkey = $this->sanitaze($_POST["wordkey"]);
            $this->emptyInputsTwo();
            $this->email = $this->verifyEmail($this->email);
            $this->user_username = $this->userName($this->user_username);
            $this->wordkey = $this->wordKey($this->wordkey);

            $this->verifyControl();

        }
    }
    
    /**
     * formThree(); pour récupérer les données de l'utilisateur et agit en fonction
     */
    public function formThree() {
        if(isset($_POST["sexe"])) {
            
            $this->sexe = $_POST["sexe"];
            $this->matrimonial = $_POST["matrimonial"];
            $this->emptyInputsThree();
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
     * userName(), format des noms d'utilisateur qu'on accepte
     */
    public function userName($data) {

        if(preg_match("/^[a-zA-Z-^\@]+[\d]+\$/i", $data)) {
            if(preg_match("/[\@]/i", $data)) {
                echo "Le nom d'utilisateur doit pas contenir des caractères spéciaux !!!";
                exit();
            }
            return true;
        }
        
        else {
            echo "Le nom d'utilisateur ne respecte pas nos critères !!!";
            exit();
        }

    }

    /**
     * wordKey(), format des mots clés qu'on accepte
     */
    public function wordKey($data) {

        if(preg_match("/^[a-zA-Z-\@]+/i", $data) && strlen($data) >= 10) {
            return true;
        } 
        
        else {
            echo "Le mot-clé ne respecte pas nos critères. Il doit avoir minimum 10 caractères !!!";
            exit();
        }

    }

    /**
     * passWord(), format des mots de passe qu'on accepte
     */
    public function passWord($data) {

        if(preg_match("/^[a-zA-Z-\@]+[\d]+/i", $data) && strlen($data) >= 8) {
            return true;
        } 
        
        else {
            echo "Le mot de passe inséré ne respecte pas nos critères !!!";
            exit();
        }

    }

    /**
     * verifyControl(), vérifie s'il existe un utilisateur dans la bd et compte tenu du résultat ajoute ou non dans la bd
     */
    public function verifyControl() {

      //Instanciation de la classe UserModel
      $this->usermodel = new UserModel();
      $res = $this->usermodel->verify($this->email, $this->user_username, $this->wordkey);
      $count = count($res);

       if($count>0) {

        if($this->email == $res[0]["user_email"]) {
            echo "Un utilisateur portant cet email existe déjà !!!";
            exit();
        }

        elseif($this->user_username == $res[0]["user_username"]) {
            echo "Ce nom d'utilisateur est déjà utilisé !!!";
            exit();
        }

        else {
            echo "Le mot-clé est déjà utilisé !!!";
            exit();
        }

        } 

        else {
            echo "That's good";
            exit();
        }

    }

    
    /**
     * emptyInputsOne(), pour vérifiez si un des champs est vide
     */
    public function emptyInputsOne() {

        if(empty($this->firstname) || empty($this->lastname) || empty($this->date)){
            echo "Remplissez tous les champs !!!";
            exit();
        } 
            else{
            return false;
        }
    }
    
    /**
     * emptyInputsTwo(), pour vérifiez si un des champs est vide
     */
    public function emptyInputsTwo() {

        if(empty($this->email) || empty($this->user_username) || empty($this->wordkey)){
            echo "Remplissez tous les champs !!!";
            exit();
        } 
            else{
            return false;
        }
    }
    
    /**
     * emptyInputsThree(), pour vérifiez si un des champs est vide
     */
    public function emptyInputsThree() {

        if(empty($this->sexe) || empty($this->matrimonial)){
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
            header("Location:/receive/register?msg_password_error=password_error&firstname=$this->firstname&lastname=$this->lastname&email=$this->email&username=$this->user_username&word_key=$this->wordkey");
            exit();
       } 
       return false;

    }

    /**
     * verifyEmail(), pour vérifiez si l'email suis les normes pré-requises
     */
    public function verifyEmail() {
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            echo "Votre email ne respecte pas les normes requises !!!";
            exit();
        }
        return false;
        
    }

}