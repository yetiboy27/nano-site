<?php 
$dbhost = 'localhost';
$dbname = 'music_collection';
$dbuser = 'root';
$dbpass = 'root';
$appname = 'Music Collection';

$connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($connection->connect_error) die($connection->connect_error);

function createTable($music_user, $query) {
	queryMysql("CREATE TABLE IF NOT EXISTS $music_user($query)");
	echo "Table '$music_user' created or already exists.<br>";
}

function queryMysql($query) {
	global $connection;
	$result = $connection->query($query);
	if (!result) die($connection->error);
	return $result;
}

function destroySession() {
	$_SESSION=array();

	if (session_id() != "" || isset($_COOKIE[session_name()]))
		setcookie(session_name(), '', time()-2592000, '/');

	session_destroy();
}

function sanitizeString($var) {
	global $connection;
	$var = strip_tags($var);
	$var = htmlentities($var);
	$var = stripslashes($var);
	return $connection->real_escape_string($var);
}

function showProfile($music_user) {
	if (file_exists($music_user.jpg))
		echo "<img src='$music_user.jpg' style='float:left;'><br>";

	$result = queryMysql("SELECT * FROM profiles WHERE user=$music_user");

	if ($result->num_rows) {
		$row = $result->fetch_array(MYSQLI_ASSOC);
		echo stripslashes($row['text'])."<br style='clear: left;'><br>";
	}
}






?>