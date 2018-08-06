<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<style>

body {
	background-color: #674784;
}

.container-fluid {
	max-width: 1150px;
	margin-right: 0;
	margin-left: auto;

}

h1.page_title {
	color: #FFFFFF;
}

.music_block {
  color: #00274c;
  background: #ffffff;  
  width: 340px;
  height: 260px;
  padding:10px 15px;  
  float: left;
  margin: 10px;
  border-radius: 10px;
}

.rating_star {
	font-size: 200%;
	top: 12px;
	position: relative;
	line-height: 0;
}

</style>

<body>
	<div class="container-fluid">
	<h1 class="page_title">Music Collection Database</h1>
	<p><a href="welcome.php" style="color:#FFFFFF">&#8592; Back to Music Collection Database home page</a></p>	

<?php
	require_once 'OLDlogin.php';
	$conn = new mysqli($hn, $un, $pw, $dbname);
	
	if ($conn->connect_error) die($conn->connect_error);

	//show musical artist or band
	$query_artist = "SELECT * FROM music_collection.music_artist";
	$result_artist = $conn->query($query_artist);
	
	if (!$result_artist) die($conn->error);

	$rows = $result_artist->num_rows;

	for ($j=0; $j < $rows; ++$j) { 
		$result_artist->data_seek($j);

		$row = $result_artist->fetch_array(MYSQLI_ASSOC);
		echo '<div class="music_block">';
		echo '<h3>' . $row['Band_or_Artist']  . '</h3>';

		//show music genre associated with artist
		$show_genre =$row['genre_id'];
		$query_genre = "SELECT * FROM music_collection.music_genre WHERE genre_id = $show_genre";
		$result_genre = $conn->query($query_genre);	
		if (!$result_genre) die($conn->error);	

		$grow = $result_genre->fetch_array(MYSQLI_ASSOC);		
		echo '<h4>Music Type : ' . $grow['genre']  . '</h4>';
		
		//show album titles associated with artist
		$show_album =$row['artist_id'];
		$query_album = "SELECT * FROM music_collection.music_album WHERE artist_id = $show_album";
		$result_album = $conn->query($query_album);	
		if (!$result_album) die($conn->error);	

		$arow = $result_album->fetch_array(MYSQLI_ASSOC);		
		echo '<h4>Album Title : ' . $arow['Album_Title']  . '</h4>';
		echo 'Songs<ul style="margin-top: 0;"> ';

		//show song titles and song ratings associated with artist
		$show_song =$row['artist_id'];
		$query_song = "SELECT * FROM music_collection.music_song_title WHERE artist_id = $show_song";
		$result_song = $conn->query($query_song);	
		if (!$result_song) die($conn->error);
		
		$srows = $result_song->num_rows;
		
		for ($k=0; $k < $srows; ++$k) { 
			$result_song->data_seek($k);
			$srow = $result_song->fetch_array(MYSQLI_ASSOC);
			echo '<li> ' . $srow['Song_Title']  . '&nbsp;&nbsp;&nbsp;&nbsp;Rating :&nbsp;&nbsp;<span class="rating_star">'. $srow['Rating'] . '</span></li>' ;
		}	


		echo '</ul> </div><!--End of music_block--> ';


	}

	$result->close();
	$conn->close();
?>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</div><!-- end of container -->
</body>
</html>