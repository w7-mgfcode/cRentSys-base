<?php
  include ("sys/header.php");
  include ("sys/loggedin.php");
  include ("sys/connect.php");

  if ($loggedlevel == 9) {
?>
<FORM action="admin_cartypnewsave.php" method="post">
<TABLE cellspacing="2" cellpadding="0" border="0">
  <TR>
    <TD style="font-size: 11px;">
      Gyártó:
    </TD>
    <TD>
      <INPUT name="gyarto" type="text" class="input">
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Típus:
    </TD>
    <TD>
      <INPUT name="tipus" type="text" class="input">
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Extra:
    </TD>
    <TD>
      <INPUT name="extra" type="text" class="input">
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Ár:
    </TD>
    <TD>
      <INPUT name="ar" type="text" class="input">
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Megjegyzés:
    </TD>
    <TD>
      <INPUT name="megjegy" type="text" class="input">
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px;">
      Kép:
    </TD>
    <TD style="font-size: 11px;">
      <INPUT name="kep" type="text" class="input">.jpg (a photos és a photos/thumb mappában, azonos fájlnévvel)
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