<?php

// eventually this will be split out but I figured it was easier for now to keep it together!

class Library {
//relevant attributes at the library level that we would want to see/search through   
    private $playlists;
    private $genres;
    private $artists;
    private $songs;
    private $users;
    
//construct arrays of the attributes at library level to keep a full list   
    public function __construct(){
        $this->playlists = array();
        $this->genres = array();
        $this->artists = array();
        $this->songs = array();
        $this->users = array();
    } 
// function to give ability to add playlist at the library level and add it to the list of all playlists in the library      
    public function createPlaylist($name, $user) {
        $playlist = new Playlist($name, $user);
        array_push($this->playlists, $playlist);
        return $playlist;   
    }
    
// function to add songs at the library level
    public function createSong($title, $artist, $genre) {
        $song = new Song($title, $artist, $genre);
        array_push($this->songs, $song);   //---- do we also want to push these to artists and genres?
        echo $song; // this is here just to check what the song details are in tests - echo not really required
        return $song;   
    }
      
// function to add users to the library level
    public function createUser($firstName, $lastName, $username, $password) {
    	$user = new User($firstName, $lastName, $username, $password);
        array_push($this->users, $user);
     	return $user;
        }
        
// function to add genres to the library level - may be unnecessary 
// and break things as we only want genres linked to songs
    public function createGenre($genre) {
    	$genreNew = new genre($genre);
        array_push($this->genres, $genreNew);
     	return $genreNew;
        }

// function to add artists to the library level - may be unnecessary
// and break things as we only want artists linked to songs
    public function createArtist($artist) {
    	$artistNew = new Artist($artist);
        array_push($this->artists, $artistNew);
     	return $artistNew;
        }
        
// function to search for a specific playlist owned by a specific user at the library level    
    public function getPlaylist($name, $user) {
        // Create null playlist
        $playlist = null;
        // Loop through the library playlist array
        foreach ($this->playlists as $value) {
        // Check the value of the current items properties in the array to see if they match the $name and $user
            if ($value->playlistName == $name && $value->playlistUser == $user){
                // if they match, assign $playlist to the $value
                $playlist = $value;
                // break out of the loop
                break;
            }
        }
        // Return $playlist, either null or equal to $value
        return $playlist;
    }
         
// function to search by artist at the library level ---- not entirely sure if this is a good way to do this but it works 
    public function getSongsbyArtist($artist) {
        // create null artist
        $searchArtist[] = null;
        // Loop through the songs array
        foreach ($this->songs as $value) {
        // Check the value of the current items properties in the array to see if they match the artist we are looking for
            if($value->artist == $artist){
        //if the artist does match the one we are looking for, push it to the search artist array and echo values
                array_push($searchArtist, $value);
                echo $value . "\n";
        }
        }
        //return print_r($searchArtist);
    }
        
// function to search by genre at the library level ---- not entirely sure if this is a good way to do this but it works 
    public function getSongsbyGenre($genre) {
        // create null genre
        $searchGenre[] = null;
        // Loop through the genre array
        foreach ($this->songs as $value) {
            // Check the value of the current items properties in the array to see if they match the genre we are looking for
            if($value->genre == $genre){
            //if the genre does match the one we are looking for, push it to the search genre array and echo values
                array_push($searchGenre, $value);
        echo $value . "\n";
        }
    }
           // return print_r($searchGenre);
    }
                
        
// function to search by song at the library level ---- not entirely sure if this is a good way to do this but it works
    public function getSongsbyTitle($title) {
        // create null song
        $searchSong[] = null;
        // Loop through the song array
        foreach ($this->songs as $value) {
            // Check the value of the current items properties in the array to see if they match the song title we are looking for
            if($value->title == $title){
            //if the title does match the one we are looking for, push it to the search song array and echo values
                array_push($searchSong, $value);
                echo $value . "\n";
        }
        }
        //return print_r($searchSong);
    }
         
}   
        
// ---------- end of library class, onto more specific classes -------------------
        
        
/* 
       * 
       * 
       * The below is still left to do
       * 
       * 
       * 
        test setting a new playlist name in testing section
        alter username/password/email addresses
       add a time limit on playlists
       add a song limit on playlists
      
       basically all the remove functions
        public function  removeUserfromDB($User) {
	        }
        public function  removeSongfromDB($Song) {
	        }

        public function  removeUserPlaylist($Playlist, $User) {
	        }
        public function  removeSongfromPlaylist($Playlist, $Song) {
	        }
        public function userLogin() {
       }
       *        */