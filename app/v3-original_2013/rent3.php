<?php
  $kezdido = $_POST['kezdido'];
  $vegeido = $_POST['vegeido'];
  $auto = $_POST['auto'];
  $autoar = $_POST['autoar'];

  include ("sys/header.php");
  include ("sys/loggedin.php");
  include ("sys/connect.php");
  if ($loggedin==0) {
    echo 'Nincs bejelentkezve!';
  } else {
?>
  A gépjármûfelvétel díja a nyitvatartási idõhöz igazodik.
<?php

  $nap = strftime ("%u", $kezdido);
  $vizsts = strftime ("%H:%M:%S", $kezdido);

  $result = mysql_query ("SELECT v3_nyitva.nap, v3_nyitva.nyitora, v3_nyitva.zarora
                          FROM v3_nyitva
                          WHERE v3_nyitva.nap = '$nap'
                         ") or die (mysql_error ());

  while($row = mysql_fetch_array($result)){

    if ($vizsts < $row['nyitora'] OR $vizsts > $row['zarora']) {
      $nyitva = 0;
    } else {
      $nyitva = 1;
    }

  }

?>
  <hr width="100%" size="1" color="#000000">
  Ön azt választotta, hogy a gépjármûvet <B>
<?php
  if ($nyitva == 0) { echo 'nem'; }
?>
  nyitvatartási</B> idõben veszi át.
  <br />
<?php

  $result = mysql_query ("SELECT v3_felv_ar.nyitva, v3_felv_ar.iroda, v3_felv_ar.ferihegy, v3_felv_ar.egyeb
                          FROM v3_felv_ar
                          WHERE v3_felv_ar.nyitva = '$nyitva'
                         ") or die (mysql_error ());

  while($row = mysql_fetch_array($result)){

?>
  <br /><DIV class="title">Hol kívánja a gépjármûvet átvenni?</DIV>
  <FORM method="post" action="rent4.php">
  <TABLE>
    <TR>
      <TD bgcolor="#e8d684" style="font-size: 12px;"><input type="radio" name="hely" value="iroda" checked="yes"> Iroda  - <?php echo $row['iroda']; ?> Ft</TD>
    </TR>
    <TR>
      <TD bgcolor="#e8d684" style="font-size: 12px;"><input type="radio" name="hely" value="ferih"> Budapest Airport - <?php echo $row['ferihegy']; ?> Ft</TR>
    <TR>
      <TD bgcolor="#e8d684" style="font-size: 12px;"><input type="radio" name="hely" value="egyeb"> Egyéb (kérjük, írja be): <input name="egyeb" type="text" class="input"> - <?php echo $row['egyeb']; ?> Ft</TD>
    </TR>
  </TABLE>
<?php
  }
  $nap = strftime ("%u", $vegeido);
  $vizsts = strftime ("%H:%M:%S", $vegeido);

  $result = mysql_query ("SELECT v3_nyitva.nap, v3_nyitva.nyitora, v3_nyitva.zarora
                          FROM v3_nyitva
                          WHERE v3_nyitva.nap = '$nap'
                         ") or die (mysql_error ());

  while($row = mysql_fetch_array($result)){

    if ($vizsts < $row['nyitora'] OR $vizsts > $row['zarora']) {
      $nyitva = 0;
    } else {
      $nyitva = 1;
    }

  }

?>
  <hr width="100%" size="1" color="#000000">
  Ön azt választotta, hogy a gépjármûvet<b>
<?php
  if ($nyitva == 0) { echo 'nem'; }
?>
  nyitvatartási</b> idõben juttatja vissza.
  <br />
<?php

  $result = mysql_query ("SELECT v3_felv_ar.nyitva, v3_felv_ar.iroda, v3_felv_ar.ferihegy, v3_felv_ar.egyeb
                          FROM v3_felv_ar
                          WHERE v3_felv_ar.nyitva = '$nyitva'
                         ") or die (mysql_error ());

  while($row = mysql_fetch_array($result)){
?>


  <br /><DIV class="title">Hová kívánja a gépjármûvet visszajuttatni?</DIV>
  <TABLE>
    <TR>
      <TD bgcolor="#e8d684" style="font-size: 12px;"><input type="radio" name="vhely" value="iroda" checked="yes"> Iroda - <?php echo $row['iroda']; ?> Ft</TD>
    </TR>
    <TR>
      <TD bgcolor="#e8d684" style="font-size: 12px;"><input type="radio" name="vhely" value="ferih"> Budapest Airport - <?php echo $row['ferihegy']; ?> Ft</TD>
    </TR>
    <TR>
      <TD bgcolor="#e8d684" style="font-size: 12px;"><input type="radio" name="vhely" value="egyeb"> Egyéb (kérjük, írja be): <input name="vegyeb" type="text" class="input"> - <?php echo $row['egyeb']; ?> Ft</TD>
    </TR>
  </TABLE>

  <input type="hidden" name="kezdido" value="<?php echo $kezdido; ?>">
  <input type="hidden" name="vegeido" value="<?php echo $vegeido; ?>">
  <input type="hidden" name="auto" value="<?php echo $auto; ?>">
  <input type="hidden" name="autoar" value="<?php echo $autoar; ?>">
  <hr width="100%" size="1" color="#000000">
  <TABLE>
    <TR>
      <TD><INPUT type="checkbox" name="apaly" value="igen"></TD><TD style="font-size: 12px;">Kérjük, jelölje be a négyzetet, ha kér autópálya-használatot.</TD>
    </TR>
    <TR>
      <TD><INPUT type="checkbox" name="takar" value="igen"></TD><TD style="font-size: 12px;">Kérjük, jelölje be a négyzetet, ha a gépjármû visszaadása után külsõ-belsõ takarítást kér (2500 Ft)</TD>
    </TR>
    <TR>
      <TD><INPUT type="checkbox" name="hatar" value="igen"></TD><TD style="font-size: 12px;">Kérjük, jelölje be a négyzetet, ha kér határátlépési engedélyt.</TD>
    </TR>
    <TR>
      <TD><INPUT type="checkbox" name="gps" value="igen"></TD><TD style="font-size: 12px;">Kérjük, jelölje be a négyzetet, ha kér <strong>GPS navigációt</strong>. (<strong>500</strong> Ft/nap)</TD>
    </TR>
  </TABLE>
  <hr width="100%" size="1" color="#000000">
  <input type="submit" class="button" value="Elküld">
  </FORM>
<?php
  }
  }
  include ("sys/footer.php");
?>