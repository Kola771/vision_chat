
<?php
require "../App/Controllers/Connexion.php";
require "../App/Models/User.php";
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
            $this->emptyInputsTwo();
            $this->email = $this->verifyEmail($this->email);
            $this->user_username = $this->userName($this->user_username);
            
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
            return $data;
        }
        
        else {
            echo "Le nom d'utilisateur ne respecte pas nos critères !!!";
            exit();
        }

    }

    /**
     * verifyControl(), vérifie s'il existe un utilisateur dans la bd et compte tenu du résultat ajoute ou non dans la bd
     */
    public function verifyControl() {

      //Instanciation de la classe UserModel
      $this->usermodel = new User();
      $res = $this->usermodel->verify($this->email, $this->user_username);
      $count = count($res);

       if($count>0) {
        if($this->email == $res[0]["user_email"]) {
            echo "Un utilisateur portant cet email existe déjà !!!";
            exit();
        }

        else {
            echo "Ce nom d'utilisateur est déjà utilisé !!!";
            exit;
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

        if(empty($this->firstname)){
            echo "firstname";
            exit();
        } 

        if(empty($this->lastname)){
            echo "lastname";
            exit();
        } 

        if(empty($this->date)){
            echo "date";
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

        if(empty($this->email)){
            echo "useremail";
            exit();
        } 

        if(empty($this->user_username)){
            echo "username";
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
            echo "Faîtes votre sélection !!!";
            exit();
        } 
            else{
            return false;
        }
    }

    /**
     * verifyEmail(), pour vérifiez si l'email suis les normes pré-requises
     */
    public function verifyEmail() {
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            echo "Votre email ne respecte pas les normes requises !!!";
            exit();
        }
        return $this->email;
        
    }

}