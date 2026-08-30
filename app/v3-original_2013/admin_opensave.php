<?php

  $nyit1 = $_POST['nyit1'];
  $nyit2 = $_POST['nyit2'];
  $nyit3 = $_POST['nyit3'];
  $nyit4 = $_POST['nyit4'];
  $nyit5 = $_POST['nyit5'];
  $nyit6 = $_POST['nyit6'];
  $nyit7 = $_POST['nyit7'];
  $zar1 = $_POST['zar1'];
  $zar2 = $_POST['zar2'];
  $zar3 = $_POST['zar3'];
  $zar4 = $_POST['zar4'];
  $zar5 = $_POST['zar5'];
  $zar6 = $_POST['zar6'];
  $zar7 = $_POST['zar7'];

  include ("sys/connect.php");
  include ("sys/header.php");

  if ($loggedlevel == 9) {
    mysql_query ("UPDATE v3_nyitva SET nyitora='$nyit1' WHERE nap='1'") or die (mysql_error());
    mysql_query ("UPDATE v3_nyitva SET nyitora='$nyit2' WHERE nap='2'") or die (mysql_error());
    mysql_query ("UPDATE v3_nyitva SET nyitora='$nyit3' WHERE nap='3'") or die (mysql_error());
    mysql_query ("UPDATE v3_nyitva SET nyitora='$nyit4' WHERE nap='4'") or die (mysql_error());
    mysql_query ("UPDATE v3_nyitva SET nyitora='$nyit5' WHERE nap='5'") or die (mysql_error());
    mysql_query ("UPDATE v3_nyitva SET nyitora='$nyit6' WHERE nap='6'") or die (mysql_error());
    mysql_query ("UPDATE v3_nyitva SET nyitora='$nyit7' WHERE nap='7'") or die (mysql_error());
    mysql_query ("UPDATE v3_nyitva SET zarora='$zar1' WHERE nap='1'") or die (mysql_error());
    mysql_query ("UPDATE v3_nyitva SET zarora='$zar2' WHERE nap='2'") or die (mysql_error());
    mysql_query ("UPDATE v3_nyitva SET zarora='$zar3' WHERE nap='3'") or die (mysql_error());
    mysql_query ("UPDATE v3_nyitva SET zarora='$zar4' WHERE nap='4'") or die (mysql_error());
    mysql_query ("UPDATE v3_nyitva SET zarora='$zar5' WHERE nap='5'") or die (mysql_error());
    mysql_query ("UPDATE v3_nyitva SET zarora='$zar6' WHERE nap='6'") or die (mysql_error());
    mysql_query ("UPDATE v3_nyitva SET zarora='$zar7' WHERE nap='7'") or die (mysql_error());
?>
  Az adatokat módosítottuk.
<?php
  }
?>

<?php
  include ("sys/footer.php");
?>