<?php

  $iroda0 = $_POST['iroda0'];
  $iroda1 = $_POST['iroda1'];
  $ferih0 = $_POST['ferih0'];
  $ferih1 = $_POST['ferih1'];
  $egyeb0 = $_POST['egyeb0'];
  $egyeb1 = $_POST['egyeb1'];

  include ("sys/connect.php");
  include ("sys/header.php");

  if ($loggedlevel == 9) {
    mysql_query ("UPDATE v3_felv_ar SET iroda='$iroda0' WHERE nyitva='0'") or die (mysql_error());
    mysql_query ("UPDATE v3_felv_ar SET iroda='$iroda1' WHERE nyitva='1'") or die (mysql_error());
    mysql_query ("UPDATE v3_felv_ar SET ferihegy='$ferih0' WHERE nyitva='0'") or die (mysql_error());
    mysql_query ("UPDATE v3_felv_ar SET ferihegy='$ferih1' WHERE nyitva='1'") or die (mysql_error());
    mysql_query ("UPDATE v3_felv_ar SET egyeb='$egyeb0' WHERE nyitva='0'") or die (mysql_error());
    mysql_query ("UPDATE v3_felv_ar SET egyeb='$egyeb1' WHERE nyitva='1'") or die (mysql_error());
?>
  Az adatokat módosítottuk.
<?php
  }
?>

<?php
  include ("sys/footer.php");
?>