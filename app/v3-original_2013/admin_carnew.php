<?php
  $cartypid = $_GET['cartypid'];
  include ("sys/header.php");
  include ("sys/loggedin.php");
  include ("sys/connect.php");

  if ($loggedlevel == 9) {
?>
<FORM action="admin_carnewsave.php" method="post">
<INPUT type="hidden" name="auttip" value="<?php echo $cartypid; ?>">
<TABLE cellspacing="2" cellpadding="0" border="0">
  <TR>
    <TD style="font-size: 11px;">
      Rendszám:
    </TD>
    <TD>
      <INPUT name="rendszam" type="text" class="input">
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Alvázszám:
    </TD>
    <TD>
      <INPUT name="alvaz" type="text" class="input">
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Motorszám:
    </TD>
    <TD>
      <INPUT name="motor" type="text" class="input">
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Forgalmi engedély száma:
    </TD>
    <TD>
      <INPUT name="forgalmi" type="text" class="input">
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Tulajdonos:
    </TD>
    <TD>
      <INPUT name="tulaj" type="text" class="input">
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Kódnév:
    </TD>
    <TD>
      <INPUT name="kod" type="text" class="input">
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
  } else {
  echo ('Nincs jogosultsága ehhez a területhez!');
  }
  include ("sys/footer.php");
?>