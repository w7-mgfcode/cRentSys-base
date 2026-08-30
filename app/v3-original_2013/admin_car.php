<?php
  include ("sys/header.php");
  include ("sys/loggedin.php");
  include ("sys/connect.php");

  if ($loggedlevel == 9) {
?>
<A href="admin_cartypnew.php" class="mainmenu_link"><B>Új autótípus ...</B></A>
<BR />
<BR />

<TABLE cellspacing="0" cellpadding="2" border="0">
  <TR>
    <TD style="font-size: 11px; border: 1px solid #000000;">
      <B>Gyártó és típus</B>
    </TD>
    <TD style="font-size: 11px; border: 1px solid #000000;">
      <B>Extra</B>
    </TD>
    <TD style="font-size: 11px; border: 1px solid #000000;">
      <B>Ár</B>
    </TD>
    <TD style="font-size: 11px; border: 1px solid #000000;">
      <B>Megjegyzés</B>
    </TD>
    <TD style="font-size: 11px; border: 1px solid #000000;">
      <B>Kép</B>
    </TD>
    <TD style="font-size: 11px; border: 1px solid #000000;">
      <B>Admin</B>
    </TD>
  </TR>

<?php
$result = mysql_query ("SELECT v3_autotip.tipid, v3_autotip.gyarto, v3_autotip.tipus, v3_autotip.extra, v3_autotip.ar, v3_autotip.megjegy, v3_autotip.kep
                        FROM v3_autotip
                        ORDER BY v3_autotip.ar
                       ") or die (mysql_error ());

while($row = mysql_fetch_array($result)){
?>

  <TR>
    <TD style="font-size: 11px; border: 1px solid #000000;">
      <b><?php echo $row['gyarto']; ?> <?php echo $row['tipus']; ?></b>
    </TD>
    <TD style="font-size: 11px; border: 1px solid #000000;">
      <?php echo $row['extra']; ?>
    </TD>
    <TD style="font-size: 11px; border: 1px solid #000000;">
      <?php echo $row['ar']; ?>
    </TD>
    <TD style="font-size: 11px; border: 1px solid #000000;">
      <?php echo $row['megjegy']; ?>&nbsp;
    </TD>
    <TD style="font-size: 11px; border: 1px solid #000000;">
      <A href="photos/<?php echo $row['kep']; ?>.jpg" target="_blank"><IMG src="photos/thumb/<?php echo $row['kep']; ?>.jpg" vspace="0" hspace="0" border="0"></A>
    </TD>
    <TD style="font-size: 11px; border: 1px solid #000000;">
      <A href="admin_cartypmod.php?cartypid=<?php echo $row['tipid']; ?>" class="mainmenu_link"><B>Részletek...</B></A>
      <BR><A href="admin_cartypdel.php?cartypid=<?php echo $row['tipid']; ?>" class="mainmenu_link" style="color: #FF0000;"><B>Törlés...</B></A>
    </TD>
  </TR>

<?php
}
?>
</TABLE>
<?php
  } else {
  echo ('Nincs jogosultsága ehhez a területhez!');
  }
  include ("sys/footer.php");
?>
