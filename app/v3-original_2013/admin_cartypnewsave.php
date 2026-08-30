<?php

  $gyarto = $_POST['gyarto'];
  $tipus = $_POST['tipus'];
  $extra = $_POST['extra'];
  $ar = $_POST['ar'];
  $megjegy = $_POST['megjegy'];
  $kep = $_POST['kep'];

  include ("sys/header.php");
  include ("sys/loggedin.php");
  include ("sys/connect.php");

  if ($loggedlevel == 9) {
    mysql_query ("INSERT INTO v3_autotip (gyarto, tipus, extra, ar, megjegy, kep) VALUES ('$gyarto', '$tipus', '$extra', '$ar', '$megjegy', '$kep') ") or die (mysql_error());
?>
  A jármûtípust rögzítettük.
  <br><A href="admin_car.php" class="mainmenu_link"><B>Vissza</B></A>
<?php
  } else {
  echo ('Nincs jogosultsága ehhez a területhez!');
  }
  include ("sys/footer.php");
?>