<?php

/**
 * class UserModel pour faire toutes les requêtes liées à la table users de la bd
 */
class UserModel extends Connexion {

    /**
     * $conn, variable pour instancier la classe Connexion et pour faire la connexion à la bd avec la fonction connect()
     * 
     * $conn = $this->connect();
     */
    public $conn;

    public $id;
    public $firstname;
    public $lastname;
    public $date;
    public $email;
    public $user_username;
    public $user_image;
    public $password;
    public $situation;
    public $sexe;
    public $status;
    public $user_role;
    public $timestamps;

    /**
     * verify(), pour vérifier si il y a un utilisateur dans la bd ayant déjà ses éléments là
     */
    public function verify($email, $user_username) {
        $this->email = $email;
        $this->user_username = $user_username;

        $conn = $this->connect();

        /**
         * $sql, pour les requêtes vers la base de données
         */
        $sql = "SELECT * FROM `vision_chat`.users WHERE user_email = ? OR user_username = ?;";

        /**
         * $stmt, pour recupérer la requête préparée
         */
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->email, $this->user_username]);
        $result = $stmt->fetchAll();
        return $result;
    }

    /**
     * verifyName(), pour vérifier si il y a un utilisateur dans la bd ayant déjà ses éléments là
     */
    public function verifyName($user_username) {
        $this->user_username = $user_username;

        $conn = $this->connect();

        /**
         * $sql, pour les requêtes vers la base de données
         */
        $sql = "SELECT * FROM `vision_chat`.users WHERE user_email = :username OR user_username = :username;";

        /**
         * $stmt, pour recupérer la requête préparée
         */
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ":username" => $this->user_username
        ]);
        $result = $stmt->fetchAll();
        return $result;
    }

   /**
     * insertUser(), pour insérer dans la bd des utilisateurs
     */
    public function insertUser($id, $firstname, $lastname, $date, $user_username, $email, $user_image, $sexe, $situation, $password, $user_role, $status, $timestamps) {

        $conn = $this->connect();
  
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->date = $date;
        $this->user_username = $user_username;
        $this->email = $email;
        $this->user_image = $user_image;
        $this->password = $password;
        $this->user_role = $user_role;
        $this->situation = $situation;
        $this->sexe = $sexe;
        $this->status = $status;
        $this->timestamps = $timestamps;
  
        /**
         * $sql, pour les requêtes vers la base de données
         */
        $sql = "INSERT INTO `vision_chat`.users VALUES(:id, :firstname, :lastname, :date, :user_username, :email, :user_image, :sexe, :situation, :password, :role, :status, :timesdate)";
        
        /**
         * $stmt, pour recupérer la requête préparée
         */
        $stmt = $conn->prepare($sql);
        $stmt->execute([
           ":id" => $this->id,
           ":firstname" => $this->firstname,
            ":lastname" => $this->lastname,
            ":date" => $this->date,
            ":user_username" => $this->user_username,
            ":email" => $this->email,
            ":user_image" => $this->user_image,
            ":password" => password_hash($this->password, PASSWORD_DEFAULT),
            ":status" => $this->status,
            ":situation" => $this->situation,
            ":sexe" => $this->sexe,
            ":role" => $this->user_role,
            ":timesdate" => $this->timestamps
        ]);
  
    }
    
}