<?php
  $rentid = $_GET['rentid'];
  include ("sys/header.php");
  include ("sys/loggedin.php");
  include ("sys/connect.php");

  if ($loggedlevel == 9) {

?>
A következõ adatokat módosíthatod:
<?php
$result = mysql_query ("SELECT v3_rent.rentid, v3_rent.autoid, v3_rent.eleje, v3_rent.vege, v3_rent.felvetel, v3_rent.vissza, v3_rent.autoar, v3_rent.felvar, v3_rent.visszar, v3_rent.megj
                        FROM v3_rent
                        WHERE v3_rent.rentid = '$rentid'
                       ") or die (mysql_error ());

while($row = mysql_fetch_array($result)){
?>
<FORM action="admin_rentedsave.php" method="post">
  <TABLE>
    <TR>
      <TD>Jármû</TD><TD><SELECT name="autid"><?php
$result2 = mysql_query ("SELECT v3_auto.autid, v3_auto.kod, v3_auto.auttip, v3_autotip.tipid, v3_autotip.gyarto, v3_autotip.tipus
                        FROM v3_auto
                        LEFT JOIN v3_autotip
                        ON v3_auto.auttip = v3_autotip.tipid
                       ") or die (mysql_error ());

while($row2 = mysql_fetch_array($result2)){
?>
<OPTION <?php if ($row['autoid'] == $row2['autid']) { echo 'selected="yes"'; } ?> value="<?php echo $row2['autid']; ?>"><?php echo $row2['gyarto']; ?> <?php echo $row2['tipus']; ?> (<?php echo $row2['kod']; ?>)</OPTION>
<?php
}
?>
</SELECT></TD>

    </TR>
    <TR>
      <TD>Bérlet kezdete</TD><TD><INPUT name="eleje" type="text" value="<?php echo $row['eleje']; ?>"></TD>
    </TR>
    <TR>
      <TD>Bérlet vége</TD><TD><INPUT name="vege" type="text" value="<?php echo $row['vege']; ?>"></TD>
    </TR>
    <TR>
      <TD>Felvétel helye</TD><TD><INPUT name="felvetel" type="text" value="<?php echo $row['felvetel']; ?>"></TD>
    </TR>
    <TR>
      <TD>Visszaadás helye</TD><TD><INPUT name="vissza" type="text" value="<?php echo $row['vissza']; ?>"></TD>
    </TR>
    <TR>
      <TD>Jármûbérlet ára</TD><TD><INPUT name="autoar" type="text" value="<?php echo $row['autoar']; ?>"></TD>
    </TR>
    <TR>
      <TD>Felvétel díja</TD><TD><INPUT name="felvar" type="text" value="<?php echo $row['felvar']; ?>"></TD>
    </TR>
    <TR>
      <TD>Visszavétel díja</TD><TD><INPUT name="visszar" type="text" value="<?php echo $row['visszar']; ?>"></TD>
    </TR>
  </TABLE>
<INPUT name="rentid" type="hidden" value="<?php echo $rentid; ?>">
<INPUT type="submit" value="Elküld">
</FORM>
<?php
}

  } else {
  echo ('Nincs jogosultsága ehhez a területhez!');
  }
  include ("sys/footer.php");
?>
