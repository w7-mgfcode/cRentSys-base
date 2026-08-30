<?php
  include ("sys/header.php");
  include ("sys/loggedin.php");
  if ($loggedin==0) {
    echo 'Nincs bejelentkezve!';
  } else {

  $userlogged = $_COOKIE['usernev'];

  $result = mysql_query ("SELECT v3_user.usernev, v3_user.veznev, v3_user.kernev, v3_user.mail, v3_user.anynev, v3_user.szulido, v3_user.szulhely, v3_user.nemzet, v3_user.szemig, v3_user.jogsi, v3_user.lakvaros, v3_user.lakcim, v3_user.lakirsz, v3_user.tel
                          FROM v3_user
                          WHERE v3_user.usernev = '$userlogged'
                         ") or die (mysql_error ());

  while($row = mysql_fetch_array($result)){
?>

<FORM action="register_modsave.php" method="post">
<TABLE cellspacing="2" cellpadding="0" border="0">
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
      <INPUT name="veznev" type="text" class="input" value="<?php echo $row['veznev']; ?>">
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Keresztnév:
    </TD>
    <TD>
      <INPUT name="kernev" type="text" class="input" value="<?php echo $row['kernev']; ?>">
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      E-mail cím:
    </TD>
    <TD>
      <INPUT name="mail" type="text" class="input" value="<?php echo $row['mail']; ?>">
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
      <INPUT name="nemzet" type="text" class="input" value="<?php echo $row['nemzet']; ?>">
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Személyi igazolvány száma:
    </TD>
    <TD>
      <INPUT name="szemig" type="text" class="input" value="<?php echo $row['szemig']; ?>">
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Vezetõi engedély száma:
    </TD>
    <TD>
      <INPUT name="jogsi" type="text" class="input" value="<?php echo $row['jogsi']; ?>">
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
      <INPUT name="lakvaros" type="text" class="input" value="<?php echo $row['lakvaros']; ?>">
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Cím:
    </TD>
    <TD>
      <INPUT name="lakcim" type="text" class="input" value="<?php echo $row['lakcim']; ?>">
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Irányítószám:
    </TD>
    <TD>
      <INPUT name="lakirsz" type="text" class="input" value="<?php echo $row['lakirsz']; ?>">
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Telefonszám:
    </TD>
    <TD>
      <INPUT name="tel" type="text" class="input" value="<?php echo $row['tel']; ?>">
    </TD>
  </TR>
  <TR>
    <TD>
      <INPUT type="submit" value="OK" class="button">
    </TD>
  </TR>
</TABLE>
</FORM>

<?php
    }
  }
  include ("sys/footer.php");
?>