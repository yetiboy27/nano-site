<?php 
  require_once 'header.php';

  if (!$loggedin) die();

  if ((isset($_POST['band_or_artist'])) && (isset($_POST['music_type']))) {    
    $band = $_POST['band_or_artist'];
    $music_genre = $_POST['music_type'];     
    $band_query = queryMysql("INSERT into music_artist (Band_or_Artist, genre_id) VALUES" . "('$band', '$music_genre')");
    $query_album_artist =  queryMysql("SELECT * FROM music_artist WHERE Band_or_Artist = '$band'");
    $album_artist_row  = $query_album_artist->fetch_array(MYSQLI_ASSOC);
    $album_artist_id = $album_artist_row['artist_id'];
           
  } 
  
  if (isset($_POST['album_name'])) {    
    $album = $_POST['album_name'];    
    $album_query = queryMysql("INSERT into music_album (Album_Title, artist_id) VALUES" . "('$album', '$album_artist_id')");
    $query_album =  queryMysql("SELECT * FROM music_album WHERE Album_Title = '$album'");
    $album_row = $query_album->fetch_array(MYSQLI_ASSOC);
    $album_id = $album_row['album_id'];
  }

  if (isset($_POST['song_name'])) {
    $song = $_POST['song_name'];           
    $song_query = queryMysql("INSERT into music_song_title (Song_Title, album_id, artist_id, genre_id) VALUES" . "('$song', '$album_id', '$album_artist_id', '$music_genre')");
    echo "<h1 style=\"margin-bottom: 10px; font-size: 16px; font-weight: bold;\">Your submission was successful</h1><p style=\"margin-bottom: 10px\">Please go to <a href=\"music_collection.php\">Music Collection</a> page to view your entry</p>";
  }


  echo "<div class='main'>";
  echo "<h3>Hey $user you can add music to the Music Collection database</h3>";
echo <<<_END

  <form action="add_music.php" method="post" class="music_data_input">
    <label for="band_or_artist">
      Band or Artist
      <input type="text" name="band_or_artist">
    </label>
    <label for="music_type">
      Type of Music
      <select name="music_type" id="music_type">
        <option value="">-- Please select music genre --</option>
        <option value="1111">Punk</option>
        <option value="1112">Funk</option>
        <option value="1113">Metal</option>
        <option value="1127">Alternative</option>
        <option value="1128">Pop</option>
        <option value="1129">Country</option>
      </select>
    </label>
    <label for="album_name">
      Album Name
      <input type="text" name="album_name">
    </label>
    <label for="song_name">
      Song Name
      <input type="text" name="song_name">
    </label>
    <label for="song_name">
      Song Name
      <input type="text" name="song_name">
    </label>
    <label for="song_name">
      Song Name
      <input type="text" name="song_name">
    </label>    
    <span id="song_info"></span>
    <label for="add_song">Add more songs?
      <input id="add_song" type="radio" name="add_new_song" value="yes" onclick="AddASong()"/> Yes
      <input id="no_song" type="radio" name="add_new_song" value="no" onclick="AddASong()"/> No  
    </label>
    <span id="no_more_songs"></span>
    
    <input type="submit" value="Add Your Music!">
  </form>
  

_END;
  die("</div></body></html>");  
?>

    </div>
  </body>
</html>
