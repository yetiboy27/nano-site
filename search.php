<?php 
  require_once 'header.php';

  if (!$loggedin) die();

  echo "<div class='main'>";
  echo "<h3>Hey $user you can search for any music in the database</h3>";
echo <<<_END

  <form action="search_results.php" method="get" class="music_data_search" >
    <label for="band_or_artist">
      Please enter your search term
      <input type="text" value="Search..." name="lookup">
    </label>
    <label for="music_type">
      
    <input type="submit" value="Search for Tunes" name="completedsearch">
  </form>
  

_END;
  die("</div></body></html>");  
?>

    </div>
  </body>
</html>
