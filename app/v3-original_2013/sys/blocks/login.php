<?php
  include ("sys/loggedin.php");
  if ($loggedin == 1) {
?>

<TABLE cellspacing="2" cellpadding="0" border="0" align="center">
  <TR>
    <TD class="font1" align="center">
      Bejelentkezve: <b><?php echo $_COOKIE['usernev']; ?></b>
    </TD>
  </TR>
  <TR>
    <TD class="font2" align="center">
      <br><A href="register_mod.php" class="mainmenu_link">Adatmódosítás</A>
      <br><A href="myrent.php" class="mainmenu_link">Foglalásaim</A>
      <br><A href="logout.php" class="mainmenu_link">Kijelentkezés</A>
    </TD>
  </TR>
</TABLE>  

<?php
  } else {
?>
<FORM action="user.php" method="post">
  <TABLE cellspacing="0" cellpadding="2" border="0" align="center">
    <TR>
      <TD class="font1">
        Felhasználónév:
      </TD>
      <TD class="font1">
        <INPUT name="usernev" type="text" class="input" style="width: 90px;">
      </TD>
    </TR>
    <TR>
      <TD class="font1">
        Jelszó:
      </TD>
      <TD class="font1">
        <INPUT name="pass" type="password" class="input" style="width: 90px;">
      </TD>
    </TR>
    <TR>
      <TD colspan="2" align="right">
        <INPUT type="submit" value="OK" class="button">
      </TD>
    </TR>
</FORM>
    <TR>
      <TD colspan="2" align="center" class="font2">
        <A href="register.php" class="mainmenu_link">Regisztráció</A>
      </TD>
    </TR>
  </TABLE>
<?php
  }
?>