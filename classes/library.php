<?php

// pc users may have to rework the include statements until we figure out how mto do autoloading
include "/Applications/XAMPP/xamppfiles/htdocs/songlibrary2/classes/connector.php";


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
                            . "<td>" . '<button><i class="fas fa-plus"></i></button>' . "</td>"
                        . "</tr>";
                } 
                }  catch (PDOException $e) {
                        die("There was a problem " . $e->getMessage());
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
                            . "<td>" . '<button><i class="fas fa-plus"></i></button>' . "</td>"
                        . "</tr>";
                }
        }           catch (PDOException $e) {
                        die("Artist search failed sorry ..." . $e->getMessage());
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
                            . "<td>" . '<button><i class="fas fa-plus"></i></button>' . "</td>"
                        . "</tr>";
                }
        }           catch (PDOException $e) {
                        die("Genre search failed sorry ..." . $e->getMessage());
                    }
        unset($stmt);
}
}

