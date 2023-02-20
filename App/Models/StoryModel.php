<?php 

class StoryModel extends Connexion {
    public $conn;

    public $image;
    public $user_id;
    public $created_at;

    public function insertStory($image, $user_id, $created_at)
    {
        $conn = $this->connect();
        $this->image = $image;
        $this->user_id = $user_id;
        $this->created_at = $created_at;

        try {
            $requete_sql_server = "INSERT INTO `vision_chat`.story VALUES(NULL, :files, :user_id, :created_at)";
            $statement = $conn->prepare($requete_sql_server);
            $statement->execute([
                ":files" => $this->image,
                ":user_id" => $this->user_id,
                ":created_at" => $this->created_at
            ]);
        
        } catch(Exception $mes) {
                    echo $mes;
        }
        
    }

    public function selectStoryUser($user_id) 
    {
        $conn = $this->connect();
        $this->user_id = $user_id;
            $requete_sql_server = "SELECT `story`.created_at, `story`.story_image, `story`.user_id, `users`.user_username FROM `vision_chat`.users, `vision_chat`.story WHERE `story`.user_id = `users`.user_id AND `story`.user_id = ?";
            $statement = $conn->prepare($requete_sql_server);
            $statement->execute([$this->user_id]);

            $resultat = $statement->fetchAll();
            return $resultat;
    }

    public function selectStoryNot($user_id)
    {
        $conn = $this->connect();
        $this->user_id = $user_id;
            $requete_sql_server = "SELECT `story`.created_at, `story`.story_image, `story`.user_id, `users`.user_username FROM `vision_chat`.users, `vision_chat`.story WHERE `story`.user_id = `users`.user_id AND NOT `story`.user_id = ? ORDER BY `users`.user_id ASC";
            $statement = $conn->prepare($requete_sql_server);
            $statement->execute([$this->user_id]);

            $resultat = $statement->fetchAll();
            return $resultat;
    }
}