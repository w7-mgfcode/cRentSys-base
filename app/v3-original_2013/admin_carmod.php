<?php
  $carid = $_GET['carid'];
  include ("sys/header.php");
  include ("sys/loggedin.php");
  include ("sys/connect.php");

  if ($loggedlevel == 9) {

$result = mysql_query ("SELECT v3_auto.autid, v3_auto.auttip, v3_auto.rendszam, v3_auto.alvaz, v3_auto.motor, v3_auto.forgalmi, v3_auto.tulaj, v3_auto.kod
                        FROM v3_auto
                        WHERE v3_auto.autid = '$carid'
                       ") or die (mysql_error ());

while($row = mysql_fetch_array($result)){
?>
<FORM action="admin_carmodsave.php" method="post">
<INPUT type="hidden" name="carid" value="<?php echo $carid; ?>">
<TABLE cellspacing="2" cellpadding="0" border="0">
  <TR>
    <TD style="font-size: 11px;">
      Rendszám:
    </TD>
    <TD>
      <INPUT name="rendszam" type="text" class="input" value="<?php echo $row['rendszam']; ?>">
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Alvázszám:
    </TD>
    <TD>
      <INPUT name="alvaz" type="text" class="input" value="<?php echo $row['alvaz']; ?>">
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Motorszám:
    </TD>
    <TD>
      <INPUT name="motor" type="text" class="input" value="<?php echo $row['motor']; ?>">
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Forgalmi engedély száma:
    </TD>
    <TD>
      <INPUT name="forgalmi" type="text" class="input" value="<?php echo $row['forgalmi']; ?>">
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Tulajdonos:
    </TD>
    <TD>
      <INPUT name="tulaj" type="text" class="input" value="<?php echo $row['tulaj']; ?>">
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Kódnév:
    </TD>
    <TD>
      <INPUT name="kod" type="text" class="input" value="<?php echo $row['kod']; ?>">
    </TD>
  </TR>
  <TR>
    <TD>
      <INPUT type="hidden" name="autoid" value="<?php echo $row['autid']; ?>">
      <INPUT type="submit" value="OK" class="button">
    </TD>
  </TR>
</TABLE>
</FORM>

<?php
    }
  } else {
  echo ('Nincs jogosultsága ehhez a területhez!');
  }
  include ("sys/footer.php");
?>