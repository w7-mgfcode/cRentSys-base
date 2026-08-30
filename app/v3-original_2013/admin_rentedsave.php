<?php
  $rentid = $_POST['rentid'];
  $autid = $_POST['autid'];
  $eleje = $_POST['eleje'];
  $vege = $_POST['vege'];
  $felvetel = $_POST['felvetel'];
  $vissza = $_POST['vissza'];
  $autoar = $_POST['autoar'];
  $felvar = $_POST['felvar'];
  $visszar = $_POST['visszar'];

  include ("sys/header.php");
  include ("sys/loggedin.php");
  include ("sys/connect.php");

  if ($loggedlevel == 9) {

    mysql_query ("UPDATE v3_rent SET autoid='$autid' WHERE rentid='$rentid'") or die (mysql_error());
    mysql_query ("UPDATE v3_rent SET eleje='$eleje' WHERE rentid='$rentid'") or die (mysql_error());
    mysql_query ("UPDATE v3_rent SET vege='$vege' WHERE rentid='$rentid'") or die (mysql_error());
    mysql_query ("UPDATE v3_rent SET felvetel='$felvetel' WHERE rentid='$rentid'") or die (mysql_error());
    mysql_query ("UPDATE v3_rent SET vissza='$vissza' WHERE rentid='$rentid'") or die (mysql_error());
    mysql_query ("UPDATE v3_rent SET autoar='$autoar' WHERE rentid='$rentid'") or die (mysql_error());
    mysql_query ("UPDATE v3_rent SET felvar='$felvar' WHERE rentid='$rentid'") or die (mysql_error());
    mysql_query ("UPDATE v3_rent SET visszar='$visszar' WHERE rentid='$rentid'") or die (mysql_error());
?>
Az adatokat módosítottuk.
<?php
  } else {
  echo ('Nincs jogosultsága ehhez a területhez!');
  }
  include ("sys/footer.php");
?>
