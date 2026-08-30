<?php
  include ("sys/header.php");
?>

<FORM action="register_save.php" method="post">
<TABLE cellspacing="2" cellpadding="0" border="0">
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
      <INPUT name="usernev" type="text" class="input">
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Vezetéknév:
    </TD>
    <TD>
      <INPUT name="veznev" type="text" class="input">
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Keresztnév:
    </TD>
    <TD>
      <INPUT name="kernev" type="text" class="input">
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      E-mail cím:
    </TD>
    <TD>
      <INPUT name="mail" type="text" class="input">
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Kívánt jelszó:
    </TD>
    <TD>
      <INPUT name="pass" type="password" class="input">
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Jelszó megerõsítése:
    </TD>
    <TD>
      <INPUT name="pass2" type="password" class="input">
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
      <INPUT name="anynev" type="text" class="input">
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Születési idõ:
    </TD>
    <TD>
      <INPUT name="szulido" type="text" class="input">
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Születési hely:
    </TD>
    <TD>
      <INPUT name="szulhely" type="text" class="input">
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Állampolgárság:
    </TD>
    <TD>
      <INPUT name="nemzet" type="text" class="input">
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Személyi igazolvány száma:
    </TD>
    <TD>
      <INPUT name="szemig" type="text" class="input">
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Vezetõi engedély száma:
    </TD>
    <TD>
      <INPUT name="jogsi" type="text" class="input">
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
      <INPUT name="lakvaros" type="text" class="input">
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Cím:
    </TD>
    <TD>
      <INPUT name="lakcim" type="text" class="input">
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Irányítószám:
    </TD>
    <TD>
      <INPUT name="lakirsz" type="text" class="input">
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Vezetékes telefonszám:
    </TD>
    <TD>
      <INPUT name="veztel" type="text" class="input">
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Mobiltelefonszám:
    </TD>
    <TD>
      <INPUT name="tel" type="text" class="input">
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
  include ("sys/footer.php");
?>