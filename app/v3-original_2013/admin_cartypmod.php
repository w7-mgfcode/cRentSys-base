<?php
  $cartypid = $_GET['cartypid'];
  include ("sys/header.php");
  include ("sys/loggedin.php");
  include ("sys/connect.php");

  if ($loggedlevel == 9) {

$result = mysql_query ("SELECT v3_autotip.tipid, v3_autotip.gyarto, v3_autotip.tipus, v3_autotip.extra, v3_autotip.ar, v3_autotip.megjegy, v3_autotip.kep
                        FROM v3_autotip
                        WHERE v3_autotip.tipid = '$cartypid'
                       ") or die (mysql_error ());

while($row = mysql_fetch_array($result)){

?>

<A href="admin_carnew.php?cartypid=<?php echo $row['tipid']; ?>" class="mainmenu_link"><B>Új jármû a típuson belül ...</B></A>
<BR />
<BR /><DIV style="font-size: 14px; font-weight: bold;">Jármûvek a típuson belül</DIV>
<TABLE cellspacing="0" cellpadding="2" border="0">
  <TR>
    <TD style="font-size: 11px; border: 1px solid #000000;">
      <B>Rendszám</B>
    </TD>
    <TD style="font-size: 11px; border: 1px solid #000000;">
      <B>Alvázszám</B>
    </TD>
    <TD style="font-size: 11px; border: 1px solid #000000;">
      <B>Motorszám</B>
    </TD>
    <TD style="font-size: 11px; border: 1px solid #000000;">
      <B>Forgalmi</B>
    </TD>
    <TD style="font-size: 11px; border: 1px solid #000000;">
      <B>Tulajdonos</B>
    </TD>
    <TD style="font-size: 11px; border: 1px solid #000000;">
      <B>Kódnév</B>
    </TD>
    <TD style="font-size: 11px; border: 1px solid #000000;">
      <B>Admin</B>
    </TD>
  </TR>
<?php
}
$result = mysql_query ("SELECT v3_auto.autid, v3_auto.auttip, v3_auto.rendszam, v3_auto.alvaz, v3_auto.motor, v3_auto.forgalmi, v3_auto.tulaj, v3_auto.kod
                        FROM v3_auto
                        WHERE v3_auto.auttip = '$cartypid'
                       ") or die (mysql_error ());

while($row = mysql_fetch_array($result)){
?>

  <TR>
    <TD style="font-size: 11px; border: 1px solid #000000;">
      <b><?php echo $row['rendszam']; ?></b>
    </TD>
    <TD style="font-size: 11px; border: 1px solid #000000;">
      <?php echo $row['alvaz']; ?>
    </TD>
    <TD style="font-size: 11px; border: 1px solid #000000;">
      <?php echo $row['motor']; ?>
    </TD>
    <TD style="font-size: 11px; border: 1px solid #000000;">
      <?php echo $row['forgalmi']; ?>
    </TD>
    <TD style="font-size: 11px; border: 1px solid #000000;">
      <?php echo $row['tulaj']; ?>
    </TD>
    <TD style="font-size: 11px; border: 1px solid #000000;">
      <?php echo $row['kod']; ?>
    </TD>
    <TD style="font-size: 11px; border: 1px solid #000000;">
      <A href="admin_carmod.php?carid=<?php echo $row['autid']; ?>" class="mainmenu_link"><B>Részletek...</B></A>
      <BR><A href="admin_carincome.php?carid=<?php echo $row['autid']; ?>" class="mainmenu_link"><B>Bevételek...</B></A>
      <BR><A href="admin_cardel.php?carid=<?php echo $row['autid']; ?>" class="mainmenu_link" style="color: #FF0000;"><B>Törlés...</B></A>
    </TD>
  </TR>

<?php
}
$result = mysql_query ("SELECT v3_autotip.tipid, v3_autotip.gyarto, v3_autotip.tipus, v3_autotip.extra, v3_autotip.ar, v3_autotip.megjegy, v3_autotip.kep
                        FROM v3_autotip
                        WHERE v3_autotip.tipid = '$cartypid'
                       ") or die (mysql_error ());

while($row = mysql_fetch_array($result)){
?>
</TABLE>

<BR />
<BR /><DIV style="font-size: 14px; font-weight: bold;">Típus adatai</DIV>
<FORM action="admin_cartypmodsave.php" method="post">
<TABLE cellspacing="2" cellpadding="0" border="0">
  <TR>
    <TD style="font-size: 11px;">
      Gyártó:
    </TD>
    <TD>
      <INPUT name="gyarto" type="text" class="input" value="<?php echo $row['gyarto']; ?>">
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Típus:
    </TD>
    <TD>
      <INPUT name="tipus" type="text" class="input" value="<?php echo $row['tipus']; ?>">
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Extra:
    </TD>
    <TD>
      <INPUT name="extra" type="text" class="input" value="<?php echo $row['extra']; ?>">
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Ár:
    </TD>
    <TD>
      <INPUT name="ar" type="text" class="input" value="<?php echo $row['ar']; ?>">
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Megjegyzés:
    </TD>
    <TD>
      <INPUT name="megjegy" type="text" class="input" value="<?php echo $row['megjegy']; ?>">
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Kép:
    </TD>
    <TD style="font-size: 11px;">
      <INPUT name="kep" type="text" class="input" value="<?php echo $row['kep']; ?>">.jpg (a photos és a photos/thumb mappában, azonos fájlnévvel)
    </TD>
  </TR>
  <TR>
    <TD colspan="2" style="font-size: 11px; font-weight: bold;">
<INPUT type="hidden" name="tipid" value="<?php echo $row['tipid']; ?>">
      <INPUT type="submit" value="OK" class="button"> <A href="admin_car.php" class="mainmenu_link">Vissza</A>
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
