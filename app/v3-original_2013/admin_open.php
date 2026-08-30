<?php
  include ("sys/header.php");
  include ("sys/loggedin.php");
  include ("sys/connect.php");

  if ($loggedlevel == 9) {
?>
Nyitvatartás (óó:pp:mm)
<TABLE cellspacing="0" cellpadding="2" border="0">
  <TR>
    <TD>
    </TD>
    <TD style="font-size: 11px; font-weight: bold;">
      Hétfõ
    </TD>
    <TD style="font-size: 11px; font-weight: bold;">
      Kedd
    </TD>
    <TD style="font-size: 11px; font-weight: bold;">
      Szerda
    </TD>
    <TD style="font-size: 11px; font-weight: bold;">
      Csütörtök
    </TD>
    <TD style="font-size: 11px; font-weight: bold;">
      Péntek
    </TD>
    <TD style="font-size: 11px; font-weight: bold;">
      Szombat
    </TD>
    <TD style="font-size: 11px; font-weight: bold;">
      Vasárnap
    </TD>
  </TR>
<FORM action="admin_opensave.php" method="post">
  <TR>
    <TD style="font-size: 11px; font-weight: bold;">
      Nyitás
    </TD>
<?php
    $result = mysql_query ("SELECT v3_nyitva.nap, v3_nyitva.nyitora
                            FROM v3_nyitva
                            ORDER BY v3_nyitva.nap
                           ") or die (mysql_error ());

    while($row = mysql_fetch_array($result)){
?>
    <TD>
      <INPUT name="nyit<?php echo $row['nap']; ?>" value="<?php echo $row['nyitora']; ?>" type="text" class="input" size="6">
    </TD>
<?php
    }
?>
  </TR>
  <TR>
    <TD style="font-size: 11px; font-weight: bold;">
      Zárás
    </TD>
<?php
    $result = mysql_query ("SELECT v3_nyitva.nap, v3_nyitva.zarora
                            FROM v3_nyitva
                            ORDER BY v3_nyitva.nap
                           ") or die (mysql_error ());

    while($row = mysql_fetch_array($result)){
?>
    <TD>
      <INPUT name="zar<?php echo $row['nap']; ?>" value="<?php echo $row['zarora']; ?>" type="text" class="input" size="6">
    </TD>
<?php
    }
?>
  </TR>
</TABLE>
<INPUT type="submit" value="Mentés" class="button">
</FORM>
<BR>Gépjármûfelvételi árak
<TABLE cellspacing="0" cellpadding="2" border="0">
  <TR>
    <TD>
    </TD>
    <TD style="font-size: 11px; font-weight: bold;">
      Iroda
    </TD>
    <TD style="font-size: 11px; font-weight: bold;">
      Ferihegy
    </TD>
    <TD style="font-size: 11px; font-weight: bold;">
      Egyéb
    </TD>
  </TR>
<FORM action="admin_pricesave.php" method="post">
<?php
    $result = mysql_query ("SELECT v3_felv_ar.nyitva, v3_felv_ar.iroda, v3_felv_ar.ferihegy, v3_felv_ar.egyeb
                            FROM v3_felv_ar
                            WHERE v3_felv_ar.nyitva = '1'
                           ") or die (mysql_error ());

    while($row = mysql_fetch_array($result)){
?>
  <TR>
    <TD style="font-size: 11px; font-weight: bold;">
      Nyitva
    </TD>
    <TD style="font-size: 11px; font-weight: bold;">
      <INPUT name="iroda1" value="<?php echo $row['iroda']; ?>" type="text" class="input" size="6">
    </TD>
    <TD style="font-size: 11px; font-weight: bold;">
      <INPUT name="ferih1" value="<?php echo $row['ferihegy']; ?>" type="text" class="input" size="6">
    </TD>
    <TD style="font-size: 11px; font-weight: bold;">
      <INPUT name="egyeb1" value="<?php echo $row['egyeb']; ?>" type="text" class="input" size="6">
    </TD>
  </TR>
<?php
}
    $result = mysql_query ("SELECT v3_felv_ar.nyitva, v3_felv_ar.iroda, v3_felv_ar.ferihegy, v3_felv_ar.egyeb
                            FROM v3_felv_ar
                            WHERE v3_felv_ar.nyitva = '0'
                           ") or die (mysql_error ());

    while($row = mysql_fetch_array($result)){
?>
  <TR>
    <TD style="font-size: 11px; font-weight: bold;">
      Zárva
    </TD>
    <TD style="font-size: 11px; font-weight: bold;">
      <INPUT name="iroda0" value="<?php echo $row['iroda']; ?>" type="text" class="input" size="6">
    </TD>
    <TD style="font-size: 11px; font-weight: bold;">
      <INPUT name="ferih0" value="<?php echo $row['ferihegy']; ?>" type="text" class="input" size="6">
    </TD>
    <TD style="font-size: 11px; font-weight: bold;">
      <INPUT name="egyeb0" value="<?php echo $row['egyeb']; ?>" type="text" class="input" size="6">
    </TD>
  </TR>
<?php
}
?>
</TABLE>
<INPUT type="submit" value="Mentés" class="button">
</FORM>
<?php
  } else {
  echo ('Nincs jogosultsága ehhez a területhez!');
  }
  include ("sys/footer.php");
?>
