<?php

  $usernev = $_POST['usernev'];
  $veznev = $_POST['veznev'];
  $kernev = $_POST['kernev'];
  $mail = $_POST['mail'];
  $pass = $_POST['pass'];
  $pass2 = $_POST['pass2'];
  $anynev = $_POST['anynev'];
  $szulido = $_POST['szulido'];
  $szulhely = $_POST['szulhely'];
  $nemzet = $_POST['nemzet'];
  $szemig = $_POST['szemig'];
  $jogsi = $_POST['jogsi'];
  $lakvaros = $_POST['lakvaros'];
  $lakcim = $_POST['lakcim'];
  $lakirsz = $_POST['lakirsz'];
  $tel = $_POST['tel'];
  $veztel = $_POST['veztel'];

  $valid = 1;

  include ("sys/connect.php");
  include ("sys/header.php");
?>

<FORM action="register_save.php" method="post">
<TABLE cellspacing="2" cellpadding="0" border="0">
  <TR>
    <TD style="font-size: 11px;" colspan="2">

<?php

$result = mysql_query ("SELECT v3_user.usernev
                        FROM v3_user
                       ") or die (mysql_error ());

while($row = mysql_fetch_array($result)){
  if ($row['usernev'] == $usernev) {
  $valid = 0;
  echo 'Ez a felhasználónév már foglalt.<br>';
  }
}

if ($usernev == '') {
  echo 'Hiányzó adat: felhasználónév.<br>';
  $valid = 0;
}
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
if ($pass == '') {
  echo 'Nem adott meg jelszót.<br>';
  $valid = 0;
}
if ($pass <> $pass2) {
  echo 'Hiba a jelszómegerõsítésnél.<br>';
  $valid = 0;
}
if ($anynev == '') {
  echo 'Hiányzó adat: anyja neve.<br>';
  $valid = 0;
}
if ($szulido == '') {
  echo 'Hiányzó adat: születési idõ.<br>';
  $valid = 0;
}
if ($szulhely == '') {
  echo 'Hiányzó adat: születési hely.<br>';
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
  echo 'Hiányzó adat: mobil telefonszám.<br>';
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
      Kívánt felhasználói név:
    </TD>
    <TD>
      <INPUT name="usernev" value="<?php echo $usernev; ?>" type="text" class="input">
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
    <TD style="font-size: 11px;">
      Kívánt jelszó:
    </TD>
    <TD>
      <INPUT name="pass" type="text" class="input">
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Jelszó megerõsítése:
    </TD>
    <TD>
      <INPUT name="pass2" type="text" class="input">
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
    <TD>
      <INPUT name="anynev" value="<?php echo $anynev; ?>" type="text" class="input">
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Születési idõ:
    </TD>
    <TD>
      <INPUT name="szulido" value="<?php echo $szulido; ?>" type="text" class="input">
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Születési hely:
    </TD>
    <TD>
      <INPUT name="szulhely" value="<?php echo $szulhely; ?>" type="text" class="input">
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
      Vezetékes telefonszám:
    </TD>
    <TD>
      <INPUT name="veztel" value="<?php echo $tel; ?>" type="text" class="input">
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Mobiltelefonszám:
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
    $regdate = strftime ('%Y-%m-%d %H:%M:%S');
    $regpass = md5 ($pass);
    mysql_query ("INSERT INTO v3_user (usernev, veznev, kernev, mail, regdate, pass, anynev, szulido, szulhely, nemzet, szemig, jogsi, lakvaros, lakcim, lakirsz, veztel, tel) VALUES ('$usernev', '$veznev', '$kernev', '$mail', '$regdate', '$regpass', '$anynev', '$szulido', '$szulhely', '$nemzet', '$szemig', '$jogsi', '$lakvaros', '$lakcim', '$lakirsz', '$veztel', '$tel') ") or die (mysql_error());
?>
  <TR>
    <TD style="font-size: 11px;" colspan="2">
      <b>Köszönjük, hogy regisztrált!</b>
      <br>Most már beléphet felhasználónevével és jelszavával, hogy igénybe vegye szolgáltatásainkat.
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