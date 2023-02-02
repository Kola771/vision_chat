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

    public $email;
    public $user_username;
    public $wordkey;

    /**
     * verify(), pour vérifier si il y a un utilisateur dans la bd ayant déjà ses éléments là
     */
    public function verify($email, $user_username, $user_wordkey) {
        $this->email = $email;
        $this->user_username = $user_username;
        $this->user_wordkey = $user_wordkey;

        $conn = $this->connect();

        /**
         * $sql, pour les requêtes vers la base de données
         */
        $sql = "SELECT * FROM `vision_chat`.users WHERE user_email = ? OR user_username = ? OR user_wordkey = ?;";

        /**
         * $stmt, pour recupérer la requête préparée
         */
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->email, $this->user_username, $this->user_wordkey]);
        $result = $stmt->fetchAll();
        return $result;
    }

   
    
}