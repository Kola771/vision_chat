<?php
require "../App/Controllers/Connexion.php";
require "../App/Models/StoryModel.php";
class StoryController {

    public $storymodel;
    public $user_id;
    public $name;
    public $tmp_name;
    public $error;
    public $size;
    public $times;
    public function sendPicture()
    {
        if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["file"])) {

            $this->name = $_FILES["file"]["name"];
            $this->tmp_name = $_FILES["file"]["tmp_name"];
            $this->error = $_FILES["file"]["error"];
            $this->size = $_FILES["file"]["size"];
            $count = count($this->name);

            $this->user_id = $_POST["user_id"];

            $this->times = date("Y-m-d h:i:s");

            $this->storymodel = new StoryModel();

            for($i=0; $i<$count; $i++)
            {
                $last_extension = pathinfo($this->name[$i], PATHINFO_EXTENSION);

                $extension = strtolower($last_extension);
                
                $tableau_extension = ["jpg", "jpeg", "png", "gif"];

                $taille_maximale_image = 8000000;

                if(in_array($extension, $tableau_extension)) {

                    if($this->size[$i] <= $taille_maximale_image) {
                        
                        if($this->error[$i] == 0) {
                            $name_unique = uniqid("story-image", true);
                            $file_unique = $name_unique . "." . $extension;
                            $file = "../public/assets/stories/$file_unique";

                            move_uploaded_file($this->tmp_name[$i], $file);

                            $this->storymodel->insertStory($file_unique, $this->user_id, $this->times);
                        } else {
                            header("Location:/home/space");
                            exit;
                        }

                    } else {
                        header("Location:/home/space");
                        exit;
                    }
                    
                } else {
                    header("Location:/home/space");
                    exit;
                }
            }

        }
        header("Location:/home/space");
        exit;
    }

    public function selectUser() 
    {
        session_start();
        $this->user_id = $_SESSION["id"];
        $this->storymodel = new StoryModel();
        $data = $this->storymodel->selectStoryUser($this->user_id);
        $tableau = [];
        foreach($data as $key => $values) {

            //je transforme en tableau la date de création du chapitre
            $explode= explode(" ", $values["created_at"]);

            //date de création
            $date1 = $explode[0]; 

            //date aujourd'hui
            $date2 = date("Y-m-d");

            $date1=date_create($date1);
            $date2=date_create($date2);

            //différence entre la date aujourd'hui et la date de création
            $diff=date_diff($date1,$date2);

            //la différence en jour entre la date aujourd'hui et la date de création
            $difference = $diff->format("%a");

            if($difference <= 1) {
                array_push($tableau, $data[$key]);
            }
        }
        
        return $tableau;
    }

    public function selectUserNot() 
    {
        @session_start();
        $this->user_id = $_SESSION["id"];
        $this->storymodel = new StoryModel();
        $data = $this->storymodel->selectStoryNot($this->user_id);
        $tableau = [];
        foreach($data as $key => $values) {

            //je transforme en tableau la date de création du chapitre
            $explode= explode(" ", $values["created_at"]);

            //date de création
            $date1 = $explode[0]; 

            //date aujourd'hui
            $date2 = date("Y-m-d");

            $date1=date_create($date1);
            $date2=date_create($date2);

            //différence entre la date aujourd'hui et la date de création
            $diff=date_diff($date1,$date2);

            //la différence en jour entre la date aujourd'hui et la date de création
            $difference = $diff->format("%a");

            if($difference <= 1) {
                array_push($tableau, $data[$key]);
            }
        }
        
        return $tableau;
    }
}