<?php

class Movie {
    private $movie_id;
    private $title;
    private $year;
    private $genre;

    protected function getMovieId() {
        $sql="SELECT * FROM movies WHERE name='$this->title'";
        $result=AppCore::getDB()->sendQuery($sql);
        if(mysqli_num_rows($result) == 1)
        {
            while($row = $result->fetch_assoc())
            {
                  $this->movie_id = $row['movie_id'];
            }
        }
    }

    public function getApiRecords() {
        
    }
}