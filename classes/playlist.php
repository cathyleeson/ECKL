<?php

include_once "/Applications/XAMPP/xamppfiles/htdocs/songlibrary2/classes/connector.php";
class Playlist {
    // assign attributes to playlist and only construct name and user
    //we add songs in later once the playlist has been created
    use Connector;
    private $playlistName;
    private $playlistUser;
    private $songs = [];
   
    public function __construct($playlistName, $playlistUser){
        $this->playlistName = $playlistName;
        $this->playlistUser = $playlistUser;
    } 

public function createPlaylist() {
        $pdo = $this->connect();
        //the sql statement below inserts values to playlist to user 
        // using the select UserID from Users to add the playlist for the current user
        $sql = "INSERT INTO playlist_to_user (PlaylistName, PlaylistOwnerID, CreationDate, ExpiryDate, DaysLeft) "
                . "VALUES (:playlistname, "
                . "(SELECT UserID from users WHERE Username = :user),  "
                . "CURRENT_DATE, "
                . "ADDDATE(CURRENT_DATE, 10), "
                . "10)"
                    ;
        try {
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['playlistname'=> $this->playlistName, 'user'=> $this->playlistUser]);
                }

        catch (PDOException $e) {
            $error = $e->errorInfo();
            die("Adding playlist failed sorry ..." . $error . $e->getMessage());
        }
        unset($stmt);
    }
    
    public function set($playlistName, $value){
        $this->$playlistName = $value;
    }
    
    // to allow the get playlist function in library class access,
    // need to get playlist name - for being able to change the playlist name (and set above)
    public function get($playlistName){
        return $this->$playlistName;
    }
    

}

