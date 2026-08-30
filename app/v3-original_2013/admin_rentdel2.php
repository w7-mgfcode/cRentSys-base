<?php
  $rentid = $_GET['rentid'];
  include ("sys/header.php");
  include ("sys/loggedin.php");
  include ("sys/connect.php");

  if ($loggedlevel == 9) {

  mysql_query("DELETE FROM v3_rent WHERE rentid='$rentid'") or die(mysql_error());  
?>
  Autó TÖRÖLVE
<?php  

  } else {
  echo ('Nincs jogosultsága ehhez a területhez!');
  }
  include ("sys/footer.php");
?>
