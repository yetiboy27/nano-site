<?php // Example 26-2: header.php
  session_start();

  echo "<!DOCTYPE html>\n<html><head>";

  require_once 'functions.php';

  $userstr = ' (Guest)';

  if (isset($_SESSION['user']))
  {
    $user     = $_SESSION['user'];
    $loggedin = TRUE;
    $userstr  = " &nbsp;$user";
  }
  else $loggedin = FALSE;

  echo "<title>$appname$userstr</title><link rel='stylesheet' " .
       "href='styles.css' type='text/css'>"                     .
       "<link rel='stylesheet' " .
       "href='light_theme.css' id='light_style' type='text/css'>"                     .
       "</head><body><div id=\"main_content\"><center><canvas id='logo' width='800' "    .
       "height='70'>$appname</canvas></center>"             .
       "<div class='appname'> Logged in to $appname as $userstr</div>"            .
       "<script src='javascript.js'></script>";

  if ($loggedin)
  {
    echo 
         "<br ><ul class='menu'>" .
         "<li><a href='welcome.php?view=$music_user'>Home</a></li>" .         
         "<li><a href='music_collection.php'>Music Collection</a></li>"         .
         "<li><a href='search.php'>Search Music Collection</a></li>"       .
         "<li><a href='add_music.php'>Add to Music Collection</a></li>"    .
         "<li><a href='logout.php'>Log out</a></li></ul><br>"     .
         "<form class=\"theme_change\">" .
          "<label for=\"change_theme\">Change site theme?" .
          "<input id=\"dark_theme\" type=\"radio\" name=\"change_theme\" value=\"yes\" onclick=\"ChangeTheme()\"/> Dark Theme" .
          "<input id=\"light_theme\" type=\"radio\" name=\"change_theme\" value=\"no\" onclick=\"ChangeTheme()\"/> Light Theme"  . 
          "</label>" .
          "</form>" 
         ;
  }
  else
  {
    echo ("<br><ul class='menu'>" .
          "<li><a href='index.php'>Home</a></li>"                .
          "<li><a href='signup.php'>Sign up</a></li>"            .
          "<li><a href='login.php'>Log in</a></li></ul><br>"     .
          "<span class='info'>&#8658; You must be logged in to " .
          "view this page.</span><br><br>");
  }
?>
