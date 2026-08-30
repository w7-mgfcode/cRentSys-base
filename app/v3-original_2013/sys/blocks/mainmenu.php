<?php
  include ("sys/loggedin.php");
?>
<TABLE>
  <TR>
    <TD align="center"><A href="index.php"><IMG src="sys/images/menu_centrent.gif" border="0"></A></TD><TD><A href="http://www.localrent.hu" class="mainmenu_link">Kezdõlap</A></TD>
  </TR>
  <TR>
    <TD align="center"><A href="aszf.php"><IMG src="sys/images/menu_aszf.gif" border="0"></A></TD><TD><A href="aszf.php" class="mainmenu_link">ÁSZF</A></TD>
  </TR>
  <TR>
    <TD align="center"><A href="index.php"><IMG src="sys/images/menu_info.gif" border="0"></A></TD><TD><A href="index.php" class="mainmenu_link"><STRONG>Információ</STRONG></A></TD>
  </TR>
<?php
  if ($loggedlevel == 9) {
?>
  <TR>
    <TD align="center"><A href="admin.php"><IMG src="sys/images/menu_admin.gif" border="0"></A></TD><TD><A href="admin.php" class="mainmenu_link">Adminisztrátor</A></TD>
  </TR>
<?php
  }
  if ($loggedin == 1) {
?>
  <TR>
    <TD align="center"><A href="rent.php"><IMG src="sys/images/menu_foglal.gif" border="0"></A></TD><TD><A href="rent.php" class="mainmenu_link">Foglalás</A></TD>
  </TR>
<?php
  }
?>
</TABLE>
