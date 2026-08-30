<?php

  $tipid = $_POST['tipid'];
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
    mysql_query ("UPDATE v3_autotip SET gyarto='$gyarto' WHERE tipid='$tipid'") or die (mysql_error());
    mysql_query ("UPDATE v3_autotip SET tipus='$tipus' WHERE tipid='$tipid'") or die (mysql_error());
    mysql_query ("UPDATE v3_autotip SET extra='$extra' WHERE tipid='$tipid'") or die (mysql_error());
    mysql_query ("UPDATE v3_autotip SET ar='$ar' WHERE tipid='$tipid'") or die (mysql_error());
    mysql_query ("UPDATE v3_autotip SET megjegy='$megjegy' WHERE tipid='$tipid'") or die (mysql_error());
    mysql_query ("UPDATE v3_autotip SET kep='$kep' WHERE tipid='$tipid'") or die (mysql_error());
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