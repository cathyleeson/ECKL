<?php

// pc users may have to rework the include statements until we figure out how mto do autoloading
include_once "/Applications/XAMPP/xamppfiles/htdocs/songlibrary2/classes/connector.php";


class Library {
    //the use statement connects the connector trait which connects the class to the database
    use Connector;
   // this function connects to the database and returns all songs ordered by artist
public function searchbyAll() {
        //this connects to the database
                $pdo = $this->connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //the sql query we would like to run is below
                $sql = "select artists.ArtistName as artist_name, songs.SongName, genres.GenreName as genre_name from songs
                                   join artists on songs.ArtistID = artists.ArtistID
                                   join genres on songs.GenreID = genres.GenreID
                                   order by songs.ArtistID;";
        // this prepares the above sql statement and executes, catching any errors if it is unable
                try {
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute();
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){  
                    echo "<tr>" . "<td>" . $row['artist_name'] . "</td>"
                            . "<td>" . $row['SongName'] . "</td>"
                            . "<td>" . $row['genre_name'] . "</td>"
                            . "<td>" . '<button class = "added" data-toggle="popover" data-placement="right" data-content="Added to Playlist"><i class="fas fa-plus"></i></button>' . "</td>"
                        . "</tr>";
                } 
                }  catch (PDOException $e) {
                        $error = $e->errorInfo();
                        die("There was a problem " . $error . $e->getMessage());
                    }
               unset($stmt);

            
}
        // this function takes a search value from the searchbar and looks for an artist matching
public function searchbyArtist($search) {
        //this connects to the database
        $pdo = $this->connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //the sql query we would like to run is below
        $sql = "select artists.ArtistName as artist_name, songs.SongName, genres.GenreName as genre_name from songs
                join artists on songs.ArtistID = artists.ArtistID
                join genres on songs.GenreID = genres.GenreID
                WHERE artists.ArtistName LIKE :search";
// this prepares the above sql statement and executes, catching any errors if it is unable
        try {
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['search'=>"%".$search."%"]);   
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){  
                    echo "<tr>" . "<td>" . $row['artist_name'] . "</td>"
                            . "<td>" . $row['SongName'] . "</td>"
                            . "<td>" . $row['genre_name'] . "</td>"
                            . "<td>" . '<button class = "added" data-toggle="popover" data-placement="right" data-content="Added to Playlist"><i class="fas fa-plus"></i></button>' . "</td>"
                        . "</tr>";
                }
        }           catch (PDOException $e) {
                            $error = $e->errorInfo();
                        die("Artist search failed sorry ..." . $error . $e->getMessage());
                    }
        unset($stmt);
}
        // this function takes a search value from the searchbar and looks for an genre matching
public function searchbyGenre($search) {
    //this connects to the database
        $pdo = $this->connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //the sql query we would like to run is below
        $sql = "select artists.ArtistName as artist_name, songs.SongName, genres.GenreName as genre_name from songs
                join artists on songs.ArtistID = artists.ArtistID
                join genres on songs.GenreID = genres.GenreID
                WHERE genres.GenreName LIKE :search";
// this prepares the above sql statement and executes, catching any errors if it is unable
        try {
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['search'=>"%".$search."%"]);   
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){  
                    echo "<tr>" . "<td>" . $row['artist_name'] . "</td>"
                            . "<td>" . $row['SongName'] . "</td>"
                            . "<td>" . $row['genre_name'] . "</td>"
                            . "<td>" . '<button class = "added" data-toggle="popover" data-placement="right" data-content="Added to Playlist"><i class="fas fa-plus"></i></button>' . "</td>"
                        . "</tr>";
                }
        }           catch (PDOException $e) {
                                    $error = $e->errorInfo();
                        die("Genre search failed sorry ..." . $error . $e->getMessage());
                    }
        unset($stmt);
}

 public function displayUserPlaylists($user) {
        
        $pdo = $this->connect();
        //the sql statement below inserts values to playlist to user 
        // using the select UserID from Users to display the playlists for the current user
        $sql = "SELECT songs.SongName AS 'song_title', ArtistName AS 'Artist', GenreName as 'Genre', playlist_to_user.PlaylistName AS `playlist_name`, Username
                FROM songs
                JOIN song_to_playlist AS playlist_songs
                    ON  playlist_songs.SongID = songs.SongID
                JOIN playlist_to_user
                    ON playlist_songs.PlaylistID = playlist_to_user.PlaylistID
                JOIN artists as playlist_artist
                    ON songs.ArtistID = playlist_artist.ArtistID
                JOIN genres as playlist_genre
                    ON songs.GenreID = playlist_genre.genreID
                JOIN users as playlist_user
                    ON playlist_to_user.PlaylistOwnerID = UserID
                WHERE playlist_to_user.PlaylistOwnerID LIKE (SELECT UserID from users WHERE Username = :user)
                order by playlist_name;";     
        try {
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['user'=> $user]);
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){  
                    echo "<tr>" . "<td>" . $row['playlist_name'] . "</td>"
                            . "<td>" . $row['Artist'] . "</td>"
                            . "<td>" . $row['song_title'] . "</td>"
                            . "<td>" . $row['Genre'] . "</td>"
                            . "<td>" . '<button class = "removed" data-toggle="popover" data-placement="right" data-content="Removed from Playlist"><i class="far fa-minus-square"></i></button>' . "</td>"
                        . "</tr>";
                }
                }

        catch (PDOException $e) {
            $error = $e->errorInfo();
            die("Displaying all playlists failed sorry ..." . $error . $e->getMessage());
        }
        unset($stmt);
    }


}

