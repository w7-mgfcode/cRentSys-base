<?php

  $auttip = $_POST['auttip'];
  $rendszam = $_POST['rendszam'];
  $alvaz = $_POST['alvaz'];
  $motor = $_POST['motor'];
  $forgalmi = $_POST['forgalmi'];
  $tulaj = $_POST['tulaj'];
  $kod = $_POST['kod'];

  include ("sys/header.php");
  include ("sys/loggedin.php");
  include ("sys/connect.php");

  if ($loggedlevel == 9) {
    mysql_query ("INSERT INTO v3_auto (auttip, rendszam, alvaz, motor, forgalmi, tulaj, kod) VALUES ('$auttip', '$rendszam', '$alvaz', '$motor', '$forgalmi', '$tulaj', '$kod') ") or die (mysql_error());
?>
  A jármûvet rögzítettük.
  <br><A href="admin_cartypmod.php?cartypid=<?php echo $auttip; ?>" class="mainmenu_link"><B>Vissza</B></A>
<?php
  } else {
  echo ('Nincs jogosultsága ehhez a területhez!');
  }
  include ("sys/footer.php");
?>