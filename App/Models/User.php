<?php

/**
 * class User pour faire toutes les requêtes liées à la table users de la bd
 */
class User extends Connexion {

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
    public $code;

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
    public function verifyMail($email) {
        $this->email = $email;

        $conn = $this->connect();

        /**
         * $sql, pour les requêtes vers la base de données
         */
        $sql = "SELECT * FROM `vision_chat`.users WHERE user_email = ?;";

        /**
         * $stmt, pour recupérer la requête préparée
         */
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->email]);
        $result = $stmt->fetchAll();
        return $result;
    }

    /**
     * verifyName0(), pour vérifier si il y a un utilisateur dans la bd ayant déjà ses éléments là
     */
    public function verifyName0($user_username) {
        $this->user_username = $user_username;

        $conn = $this->connect();

        /**
         * $sql, pour les requêtes vers la base de données
         */
        $sql = "SELECT * FROM `vision_chat`.users WHERE user_username = :username;";

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
     * verifyId(), pour vérifier si il y a un utilisateur dans la bd ayant déjà cet id
     */
    public function verifyId($id) {
        $this->id = $id;

        $conn = $this->connect();

        /**
         * $sql, pour les requêtes vers la base de données
         */
        $sql = "SELECT * FROM `vision_chat`.users WHERE user_id = :id;";

        /**
         * $stmt, pour recupérer la requête préparée
         */
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ":id" => $this->id
        ]);
        $result = $stmt->fetchAll();
        return $result;
    }

    /**
     * updateStatus()
     */
    public function updateStatus($id) {
        $this->id = $id;
        $status = "not_active";

        $conn = $this->connect();

        /**
         * $sql, pour les requêtes vers la base de données
         */
        $sql = "UPDATE `vision_chat`.users SET `user_status`= :status WHERE user_id = :id;";

        /**
         * $stmt, pour recupérer la requête préparée
         */
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ":id" => $this->id,
            ":status" => $status
        ]);
    }

    /**
     * updateStatusActive()
     */
    public function updateStatusActive($id) {
        $this->id = $id;
        $status = "Active";

        $conn = $this->connect();

        /**
         * $sql, pour les requêtes vers la base de données
         */
        $sql = "UPDATE `vision_chat`.users SET `user_status`= :status WHERE user_id = :id;";

        /**
         * $stmt, pour recupérer la requête préparée
         */
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ":id" => $this->id,
            ":status" => $status
        ]);
    }

   /**
     * insertUser(), pour insérer dans la bd des utilisateurs
     */
    public function insertUser($firstname, $lastname, $date, $user_username, $email, $user_image, $sexe, $situation, $password, $user_role, $status, $timestamps) {

        $conn = $this->connect();
  
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
        $sql = "INSERT INTO `vision_chat`.users VALUES(NULL, :firstname, :lastname, :date, :user_username, :email, :user_image, :sexe, :situation, NULL, :password, :role, :status, :timesdate)";
        
        /**
         * $stmt, pour recupérer la requête préparée
         */
        $stmt = $conn->prepare($sql);
        $stmt->execute([
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

     // Fais une modification dans la table users plus précisement dans le champ email_code
     public function updateCode($code, $email)
     {
         $conn = $this->connect();
         $this->email = $email;
         $this->code = $code;
         /**
          * $sql, pour les requêtes vers la base de données
          */
         $sql = "UPDATE `vision_chat`.users set `users`.number_rand = :code WHERE `users`.user_email = :email";
         /**
          * $stmt, pour recupérer la requête préparée
          */
         $stmt = $conn->prepare($sql);
         $stmt->execute([
             ":code" => $this->code,
             ":email" => $this->email
         ]);
     }
    
}