<?php
class CDMusic extends Product{
    public $artist;
    public $genre;

    public function __construct($name,$price,$discount,$artist,$genre){
        parent::__construct($name,$price,$discount);
        $this->artist = $artist;
        $this->genre = $genre;
    }

    public function setArtist($artist){
        $this->artist = $artist;
    }

    public function getArtist(){
        return $this->artist;
    }

    public function setGenre($genre){
        $this->genre = $genre;
    }

    public function getGenre(){
        return $this->genre;
    }
}
?>