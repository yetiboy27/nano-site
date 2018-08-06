<?php 
  require_once 'header.php';

  if (!$loggedin) die();

  echo "<div class='main'>";
  echo "<h3 class=\"welcome\">Welcome $user to the Music Collection database</h3>";
  echo "<h3 class=\"welcome\"><a class=\"welcome_link\" href='search.php'>Search existing entries in the the Music Collection database</h3>";
  echo "<h3 class=\"welcome\"><a class=\"welcome_link\" href='add_music.php'>Add your own entry into the Music Collection database</h3>";
  
  die("</div></body></html>");
  
?>

    </div>
  </body>
</html>
