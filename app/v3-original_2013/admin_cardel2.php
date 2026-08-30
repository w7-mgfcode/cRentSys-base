<?php
  $carid = $_GET['carid'];
  include ("sys/header.php");
  include ("sys/loggedin.php");
  include ("sys/connect.php");

  if ($loggedlevel == 9) {

  mysql_query("DELETE FROM v3_auto WHERE autid='$carid'") or die(mysql_error());  
?>
  Autó TÖRÖLVE
<?php  

  } else {
  echo ('Nincs jogosultsága ehhez a területhez!');
  }
  include ("sys/footer.php");
?>
