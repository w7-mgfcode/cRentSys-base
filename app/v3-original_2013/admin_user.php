<?php
  include ("sys/header.php");
  include ("sys/loggedin.php");
  include ("sys/connect.php");

  if ($loggedlevel == 9) {
?>
<TABLE cellspacing="0" cellpadding="2" border="0">
  <TR>
    <TD style="font-size: 11px; border: 1px solid #000000;">
      <B>Felhasználónév</B>
    </TD>
    <TD style="font-size: 11px; border: 1px solid #000000;">
      <B>Teljes név</B>
    </TD>
    <TD style="font-size: 11px; border: 1px solid #000000;">
      <B>E-mail</B>
    </TD>
    <TD style="font-size: 11px; border: 1px solid #000000;">
      <B>Szint</B>
    </TD>
    <TD style="font-size: 11px; border: 1px solid #000000;">
      <B>Admin</B>
    </TD>
  </TR>

<?php
$result = mysql_query ("SELECT v3_user.uid, v3_user.usernev, v3_user.veznev, v3_user.kernev, v3_user.mail, v3_user.szint
                        FROM v3_user
                        ORDER BY v3_user.usernev
                       ") or die (mysql_error ());

while($row = mysql_fetch_array($result)){
?>

  <TR>
    <TD style="font-size: 11px; border: 1px solid #000000;">
      <?php echo $row['usernev']; ?>
    </TD>
    <TD style="font-size: 11px; border: 1px solid #000000;">
      <?php echo $row['veznev']; ?> <?php echo $row['kernev']; ?>
    </TD>
    <TD style="font-size: 11px; border: 1px solid #000000;">
      <?php echo $row['mail']; ?>
    </TD>
    <TD style="font-size: 11px; border: 1px solid #000000;">
      <?php echo $row['szint']; ?>
    </TD>
    <TD style="font-size: 11px; border: 1px solid #000000;">
      <A href="admin_userinfo.php?userid=<?php echo $row['uid']; ?>" class="mainmenu_link"><B>Részletek...</B></A>
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
