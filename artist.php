<?php

class artist {
    //assign attributes to artist (don't think genre is necessarily needed?)
    // only construct artist  
    // songs array would be added to an artist in a separate way (might not be needed?)
	private $artist;
	private $songs = [];

	public function __construct($artist) {
		$this->artist = $artist;		
	}
    //add songs to artist --- I think this might be the wrong way to go about connecting songs to artists
       public function addSong($song) {
        array_push($this->songs, $song);
    }
    // function to list songs associated with an artist - not sure if this is needed...
    public function listSongs() {
        echo "Songs associated with artist: " . "\n";
        foreach ($this->songs as $value) {
            echo $value . "\n";
        }
        echo "\n";
    }
    // convert to string to show data for add artist function in library class  
       public function __toString(){
            return 'Artist: ' . $this->artist . "\n";
        }
}
