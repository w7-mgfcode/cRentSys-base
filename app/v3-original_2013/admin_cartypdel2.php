<?php
  $cartypid = $_GET['cartypid'];
  include ("sys/header.php");
  include ("sys/loggedin.php");
  include ("sys/connect.php");

  if ($loggedlevel == 9) {

  mysql_query("DELETE FROM v3_auto WHERE auttip='$cartypid'") or die(mysql_error());  
  mysql_query("DELETE FROM v3_autotip WHERE tipid='$cartypid'") or die(mysql_error());
?>
  Autótípus és a benne lévõ jármûvek TÖRÖLVE
<?php  

  } else {
  echo ('Nincs jogosultsága ehhez a területhez!');
  }
  include ("sys/footer.php");
?>
