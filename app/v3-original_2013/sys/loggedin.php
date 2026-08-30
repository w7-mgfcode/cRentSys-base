<?php
  $loggedin = 0;
  $loggedlevel = 0;
  include ("sys/connect.php");

  $result = mysql_query ("SELECT v3_user.uid, v3_user.usernev, v3_user.pass, v3_user.szint
                          FROM v3_user
                         ") or die (mysql_error ());

  while($row = mysql_fetch_array($result)){
    if ($row['usernev'] == $_COOKIE['usernev'] AND $row['pass'] == $_COOKIE['pass'] AND $row['szint'] > 0) {
    $loggedin = 1;
    $loggedlevel = $row['szint'];
    $ulogged = $row['uid'];
    }
  }
?>