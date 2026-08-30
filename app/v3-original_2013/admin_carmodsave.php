<?php

  $autoid = $_POST['autoid'];
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
    mysql_query ("UPDATE v3_auto SET rendszam='$rendszam' WHERE autid='$autoid'") or die (mysql_error());
    mysql_query ("UPDATE v3_auto SET alvaz='$alvaz' WHERE autid='$autoid'") or die (mysql_error());
    mysql_query ("UPDATE v3_auto SET motor='$motor' WHERE autid='$autoid'") or die (mysql_error());
    mysql_query ("UPDATE v3_auto SET forgalmi='$forgalmi' WHERE autid='$autoid'") or die (mysql_error());
    mysql_query ("UPDATE v3_auto SET tulaj='$tulaj' WHERE autid='$autoid'") or die (mysql_error());
    mysql_query ("UPDATE v3_auto SET kod='$kod' WHERE autid='$autoid'") or die (mysql_error());
?>
<TABLE>
  <TR>
    <TD style="font-size: 11px;" colspan="2">
      <b>Az adatokat módosítottuk!</b>
    </TD>
  </TR>
</TABLE>
<?php
  }
?>
<?php
  include ("sys/footer.php");
?>