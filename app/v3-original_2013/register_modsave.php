<?php

  $veznev = $_POST['veznev'];
  $kernev = $_POST['kernev'];
  $mail = $_POST['mail'];
  $nemzet = $_POST['nemzet'];
  $szemig = $_POST['szemig'];
  $jogsi = $_POST['jogsi'];
  $lakvaros = $_POST['lakvaros'];
  $lakcim = $_POST['lakcim'];
  $lakirsz = $_POST['lakirsz'];
  $tel = $_POST['tel'];

  $valid = 1;

  include ("sys/connect.php");
  include ("sys/header.php");
?>

<FORM action="register_modsave.php" method="post">
<TABLE cellspacing="2" cellpadding="0" border="0">
  <TR>
    <TD style="font-size: 11px;" colspan="2">

<?php

$result = mysql_query ("SELECT v3_user.usernev
                        FROM v3_user
                       ") or die (mysql_error ());

if ($veznev == '') {
  echo 'Hiányzó adat: vezetéknév.<br>';
  $valid = 0;
}
if ($kernev == '') {
  echo 'Hiányzó adat: keresztnév.<br>';
  $valid = 0;
}
if ($mail == '') {
  echo 'Hiányzó adat: e-mail cím.<br>';
  $valid = 0;
}
if (strrpos($mail, '@') === false OR strrpos($mail, '.') === false) {
  echo 'Hibás e-mail cím.<br>';
  $valid = 0;
}
if ($nemzet == '') {
  echo 'Hiányzó adat: állampolgárság.<br>';
  $valid = 0;
}
if ($szemig == '') {
  echo 'Hiányzó adat: személyi igazolvány.<br>';
  $valid = 0;
}
if ($jogsi == '') {
  echo 'Hiányzó adat: vezetõi engedély.<br>';
  $valid = 0;
}
if ($lakvaros == '') {
  echo 'Hiányzó adat: város.<br>';
  $valid = 0;
}
if ($lakcim == '') {
  echo 'Hiányzó adat: cím.<br>';
  $valid = 0;
}
if ($lakirsz == '') {
  echo 'Hiányzó adat: irányítószám.<br>';
  $valid = 0;
}
if ($tel == '') {
  echo 'Hiányzó adat: telefonszám.<br>';
  $valid = 0;
}
?>

    </TD>
  </TR>

<?php

if ($valid == 0) {

?>

  <TR>
    <TD style="font-size: 12px; font-weight: bold; padding: 5px 0px; border-bottom: 1px solid #000000;" colspan="2">
      Kérjük, javítsa a fenti hibákat!
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px; font-weight: bold" colspan="2">
      ALAPADATOK
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Vezetéknév:
    </TD>
    <TD>
      <INPUT name="veznev" value="<?php echo $veznev; ?>" type="text" class="input">
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Keresztnév:
    </TD>
    <TD>
      <INPUT name="kernev" value="<?php echo $kernev; ?>" type="text" class="input">
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      E-mail cím:
    </TD>
    <TD>
      <INPUT name="mail" value="<?php echo $mail; ?>" type="text" class="input">
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px; font-weight: bold" colspan="2">
      SZEMÉLYES ADATOK
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Állampolgárság:
    </TD>
    <TD>
      <INPUT name="nemzet" value="<?php echo $nemzet; ?>" type="text" class="input">
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Személyi igazolvány száma:
    </TD>
    <TD>
      <INPUT name="szemig" value="<?php echo $szemig; ?>" type="text" class="input">
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Vezetõi engedély száma:
    </TD>
    <TD>
      <INPUT name="jogsi" value="<?php echo $jogsi; ?>" type="text" class="input">
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
    <TD>
      <INPUT name="lakvaros" value="<?php echo $lakvaros; ?>" type="text" class="input">
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Cím:
    </TD>
    <TD>
      <INPUT name="lakcim" value="<?php echo $lakcim; ?>" type="text" class="input">
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Irányítószám:
    </TD>
    <TD>
      <INPUT name="lakirsz" value="<?php echo $lakirsz; ?>" type="text" class="input">
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Telefonszám:
    </TD>
    <TD>
      <INPUT name="tel" value="<?php echo $tel; ?>" type="text" class="input">
    </TD>
  </TR>
  <TR>
    <TD>
      <INPUT type="submit" value="OK" class="button">
    </TD>
  </TR>
<?php
  } else {
    $userlogged = $_COOKIE['usernev'];
    $regdate = strftime ('%Y-%m-%d %H:%M:%S');
    $regpass = md5 ($pass);
    mysql_query ("UPDATE v3_user SET veznev='$veznev' WHERE usernev='$userlogged'") or die (mysql_error());
    mysql_query ("UPDATE v3_user SET kernev='$kernev' WHERE usernev='$userlogged'") or die (mysql_error());
    mysql_query ("UPDATE v3_user SET mail='$mail' WHERE usernev='$userlogged'") or die (mysql_error());
    mysql_query ("UPDATE v3_user SET nemzet='$nemzet' WHERE usernev='$userlogged'") or die (mysql_error());
    mysql_query ("UPDATE v3_user SET szemig='$szemig' WHERE usernev='$userlogged'") or die (mysql_error());
    mysql_query ("UPDATE v3_user SET jogsi='$jogsi' WHERE usernev='$userlogged'") or die (mysql_error());
    mysql_query ("UPDATE v3_user SET lakvaros='$lakvaros' WHERE usernev='$userlogged'") or die (mysql_error());
    mysql_query ("UPDATE v3_user SET lakcim='$lakcim' WHERE usernev='$userlogged'") or die (mysql_error());
    mysql_query ("UPDATE v3_user SET lakirsz='$lakirsz' WHERE usernev='$userlogged'") or die (mysql_error());
    mysql_query ("UPDATE v3_user SET tel='$tel' WHERE usernev='$userlogged'") or die (mysql_error());
?>
  <TR>
    <TD style="font-size: 11px;" colspan="2">
      <b>Adatait módosítottuk!</b>
    </TD>
  </TR>
<?php
  }
?>
</TABLE>
</FORM>

<?php
  include ("sys/footer.php");
?>