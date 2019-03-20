<?php

class genre {
    //assign attributes to genre and construct
    private $genre;
    public function __construct($genre) {		
		$this->genre = $genre;
	}
        // convert to string to show data for add genre function in library class  
    public function __toString(){
            return 'Genre: ' . $this->genre . "\n";
        }
}

