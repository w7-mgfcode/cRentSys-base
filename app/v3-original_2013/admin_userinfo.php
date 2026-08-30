<?php
  $userid = $_GET['userid'];
  include ("sys/header.php");
  include ("sys/loggedin.php");
  include ("sys/connect.php");

  if ($loggedlevel == 9) {

$result = mysql_query ("SELECT v3_user.uid, v3_user.szint, v3_user.usernev, v3_user.veznev, v3_user.kernev, v3_user.mail, v3_user.anynev, v3_user.szulido, v3_user.szulhely, v3_user.nemzet, v3_user.szemig, v3_user.jogsi, v3_user.lakvaros, v3_user.lakcim, v3_user.lakirsz, v3_user.tel
                        FROM v3_user
                        WHERE v3_user.uid = '$userid'
                       ") or die (mysql_error ());

while($row = mysql_fetch_array($result)){

?>

<FORM action="admin_usermod.php" method="post">
<INPUT type="hidden" name="user" value="<?php echo $userid; ?>">
<TABLE cellspacing="2" cellpadding="0" border="0">
  <TR>
    <TD style="font-size: 11px; font-weight: bold" colspan="2">
      ALAPADATOK
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Felhasználónév:
    </TD>
    <TD style="font-size: 11px; font-weight: bold;">
      <?php echo $row['usernev']; ?>
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Vezetéknév:
    </TD>
    <TD style="font-size: 11px; font-weight: bold;">
      <?php echo $row['veznev']; ?>
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Keresztnév:
    </TD>
    <TD style="font-size: 11px; font-weight: bold;">
      <?php echo $row['kernev']; ?>
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      E-mail cím:
    </TD>
    <TD style="font-size: 11px; font-weight: bold;">
      <?php echo $row['mail']; ?>
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px; font-weight: bold" colspan="2">
      SZEMÉLYES ADATOK
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Anyja neve:
    </TD>
    <TD style="font-size: 11px; font-weight: bold;">
      <?php echo $row['anynev']; ?>
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Születési idõ:
    </TD>
    <TD style="font-size: 11px; font-weight: bold;">
      <?php echo $row['szulido']; ?>
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Születési hely:
    </TD>
    <TD style="font-size: 11px; font-weight: bold;">
      <?php echo $row['szulhely']; ?>
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Állampolgárság:
    </TD>
    <TD style="font-size: 11px; font-weight: bold;">
      <?php echo $row['nemzet']; ?>
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Személyi igazolvány száma:
    </TD>
    <TD style="font-size: 11px; font-weight: bold;">
      <?php echo $row['szemig']; ?>
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Vezetõi engedély száma:
    </TD>
    <TD style="font-size: 11px; font-weight: bold;">
      <?php echo $row['jogsi']; ?>
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px; font-weight: bold" colspan="2">
      ÁLLANDÓ ELÉRHETÕSÉGEK
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Város:
    </TD>
    <TD style="font-size: 11px; font-weight: bold;">
      <?php echo $row['lakvaros']; ?>
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Cím:
    </TD>
    <TD style="font-size: 11px; font-weight: bold;">
      <?php echo $row['lakcim']; ?>
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Irányítószám:
    </TD>
    <TD style="font-size: 11px; font-weight: bold;">
      <?php echo $row['lakirsz']; ?>
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Telefonszám:
    </TD>
    <TD style="font-size: 11px; font-weight: bold;">
      <?php echo $row['tel']; ?>
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Szint:
    </TD>
    <TD style="font-size: 11px; font-weight: bold;">
      <SELECT name="level" class="input">
        <OPTION <?php if ($row['szint'] == '0') { echo 'selected="yes"'; } ?>>0</OPTION>
        <OPTION <?php if ($row['szint'] == '1') { echo 'selected="yes"'; } ?>>1</OPTION>
        <OPTION <?php if ($row['szint'] == '9') { echo 'selected="yes"'; } ?>>9</OPTION>
      </SELECT> (0 = deaktivál)
    </TD>
  </TR>
  <TR>
    <TD colspan="2" style="font-size: 11px; font-weight: bold;">
      <INPUT type="submit" value="OK" class="button"> <A href="admin_user.php" class="mainmenu_link">Vissza</A>
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
