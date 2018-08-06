

<?php
require_once 'header.php';

if (!$loggedin) die();

    if(isset($_GET['completedsearch']))
        echo "<h3 style=\"margin-bottom: 15px;\">Here are the results of your music collection search</h3>";
    {
        $term = $_GET['lookup'];
        $query_artist = queryMysql("SELECT * FROM music_artist WHERE Band_or_Artist LIKE '%".$term."%' ");

          
        $search_artist = $query_artist->num_rows;
        for ($j = 0 ; $j < $search_artist ; ++$j) {             
          $row           = $query_artist->fetch_array(MYSQLI_ASSOC);
          echo "artist:&nbsp;&nbsp;" . $row['Band_or_Artist'] . "<br><br>";
        }

        $query_album = queryMysql("SELECT * FROM music_album WHERE Album_Title LIKE '%".$term."%' ");
        $search_album = $query_album->num_rows;
        for ($k = 0 ; $k < $search_album ; ++$k)
        {                                                                    
          $row           = $query_album->fetch_array(MYSQLI_ASSOC);
          echo "album:&nbsp;&nbsp;" . $row['Album_Title'] . " by ";
          $myartistid = $row['artist_id'];          
          $query_album_artist =  queryMysql("SELECT * FROM music_artist WHERE artist_id = '$myartistid'");
          $srow           = $query_album_artist->fetch_array(MYSQLI_ASSOC);
          echo $srow['Band_or_Artist'] . "<br><br>" ;        
        }

        

        $query_song = queryMysql("SELECT * FROM music_song_title WHERE song_Title LIKE '%".$term."%' ");
        $search_song = $query_song->num_rows;
        for ($l = 0 ; $l < $search_song ; ++$l)
        {                                                                    
          $row           = $query_song->fetch_array(MYSQLI_ASSOC);
          echo "song:&nbsp;&nbsp;" . $row['Song_Title'] . " by ";          
          $myartistid = $row['artist_id'];          
          $query_song_artist =  queryMysql("SELECT * FROM music_artist WHERE artist_id = '$myartistid'");
          $srow           = $query_song_artist->fetch_array(MYSQLI_ASSOC);
          echo $srow['Band_or_Artist'] . " on the album ";$myartistid = $row['artist_id'];          
          

          $myalbumid = $row['album_id'];          
          $query_song_album =  queryMysql("SELECT * FROM music_album WHERE album_id = '$myalbumid'");
          $arow           = $query_song_album->fetch_array(MYSQLI_ASSOC);
          echo $arow['Album_Title'] . "<br><br>";
        }      
    }
?>

