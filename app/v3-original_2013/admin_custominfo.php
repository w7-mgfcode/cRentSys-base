<?php

  $ugyfel = $_POST['ugyfel'];

  include ("sys/header.php");
  include ("sys/loggedin.php");
  include ("sys/connect.php");

  if ($loggedlevel == 9) {

$result = mysql_query ("SELECT v3_user.uid, v3_user.szint, v3_user.usernev, v3_user.veznev, v3_user.kernev, v3_user.mail, v3_user.anynev, v3_user.szulido, v3_user.szulhely, v3_user.nemzet, v3_user.szemig, v3_user.jogsi, v3_user.lakvaros, v3_user.lakcim, v3_user.lakirsz, v3_user.tel, v3_user.veztel
                        FROM v3_user
                        WHERE v3_user.uid = '$ugyfel'
                       ") or die (mysql_error ());

while($row = mysql_fetch_array($result)){
?>
<TABLE border="1" style="font-size: 12px;" cellspacing="0" cellpadding="2">
  <TR>
    <TD>Név</TD><TD><?php echo $row['veznev']; ?> <?php echo $row['kernev']; ?></TD>
  </TR>
  <TR>
    <TD>Született</TD><TD><?php echo $row['szulhely']; ?>, <?php echo $row['szulido']; ?></TD>
  </TR>
  <TR>
    <TD>Anyja neve</TD><TD><?php echo $row['anynev']; ?></TD>
  </TR>
  <TR>
    <TD>Állampolgárság</TD><TD><?php echo $row['nemzet']; ?></TD>
  </TR>
  <TR>
    <TD>Sz. ig. szám</TD><TD><?php echo $row['szemig']; ?></TD>
  </TR>
  <TR>
    <TD>Vez. eng. szám</TD><TD><?php echo $row['jogsi']; ?></TD>
  </TR>
  <TR>
    <TD>E-mail</TD><TD><?php echo $row['mail']; ?></TD>
  </TR>
  <TR>
    <TD>Cím</TD><TD><?php echo $row['lakirsz']; ?> <?php echo $row['lakvaros']; ?>, <?php echo $row['lakcim']; ?></TD>
  </TR>
  <TR>
    <TD>Mobiltelefon</TD><TD><?php echo $row['tel']; ?></TD>
  </TR>
  <TR>
    <TD>Vezetékes telefon</TD><TD><?php echo $row['veztel']; ?></TD>
  </TR>
</TABLE>

<?php
}
?>
<br>Az ügyfél eddigi megrendelései:<br /><br />
<?php
$result = mysql_query ("SELECT v3_rent.rentid, v3_rent.userid, v3_rent.autoid, v3_rent.eleje, v3_rent.vege, v3_rent.felvetel, v3_rent.vissza, v3_rent.autoar, v3_rent.felvar, v3_rent.visszar, v3_rent.megj, v3_auto.autid, v3_auto.auttip, v3_auto.kod, v3_autotip.tipid, v3_autotip.gyarto, v3_autotip.tipus
                        FROM v3_rent
                        LEFT JOIN v3_auto
                        ON v3_rent.autoid = v3_auto.autid
                        LEFT JOIN v3_autotip
                        ON v3_auto.auttip = v3_autotip.tipid
                        WHERE v3_rent.userid = '$ugyfel'
                        ORDER BY v3_rent.eleje
                       ") or die (mysql_error ());

while($row = mysql_fetch_array($result)){
?>
<TABLE border="1" style="font-size: 12px;" cellspacing="0" cellpadding="2">
  <TR>
    <TD>Bérlet eleje</TD><TD><?php echo $row['eleje']; ?></TD>
  </TR>
  <TR>
    <TD>Bérlet vége</TD><TD><?php echo $row['vege']; ?></TD>
  </TR>
  <TR>
    <TD>Autó</TD><TD><?php echo $row['gyarto']; ?> <?php echo $row['tipus']; ?> (<?php echo $row['kod']; ?>)</TD>
  </TR>
  <TR>
    <TD>Felvétel</TD><TD><?php echo $row['felvetel']; ?> (<?php echo $row['felvar']; ?> Ft)</TD>
  </TR>
  <TR>
    <TD>Visszaadás</TD><TD><?php echo $row['vissza']; ?> (<?php echo $row['visszar']; ?> Ft)</TD>
  </TR>
  <TR>
    <TD>Autó bérlet ára</TD><TD><?php echo $row['autoar']; ?></TD>
  </TR>
  <TR>
    <TD>Ügyfél megjegyzése</TD><TD><?php echo $row['megj']; ?></TD>
  </TR>
  <TR>
    <TD>Összesen fizetett</TD><TD><?php echo $row['autoar']+$row['felvar']+$row['visszar']; ?></TD>
  </TR>
  <TR>
    <TD>Szerzõdés</TD><TD><A href="contractor.php?rentid=<?php echo $row['rentid']; ?>" target="_blank">Klikk ide</A></TD>
  </TR>
</TABLE>
<?php
}
  } else {
  echo ('Nincs jogosultsága ehhez a területhez!');
  }
  include ("sys/footer.php");
?>
