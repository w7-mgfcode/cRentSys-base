<?php
  $datumev = $_GET['datumev'];
  $datumho = $_GET['datumho'];

  include ("sys/header.php");
  include ("sys/loggedin.php");
  include ("sys/connect.php");

  if ($loggedlevel == 9) {
?>
  <?php echo $datumev; ?>. év <?php echo $datumho; ?>. hónap

  <BR>
  <TABLE cellspacing="0" cellpadding="2" border="1">
    <TR>
      <TD>H</TD>
      <TD>K</TD>
      <TD>Sz</TD>
      <TD>Cs</TD>
      <TD>P</TD>
      <TD>Sz</TD>
      <TD>V</TD>
    </TR>
    <TR>
<?php

  $elsonapstamp = mktime (0, 0, 0, $datumho, 1, $datumev);
  $elsohetnapja = date ("w", $elsonapstamp);
  $napokszama = date ("t", $elsonapstamp);

  if ($elsohetnapja == 0) { $elsohetnapja = 7; }

  for ($ciklus = 1; $ciklus < $elsohetnapja; $ciklus++) {
?>
  <TD></TD>
<?php
  }
  for ($ciklus = 1; $ciklus <= $napokszama; $ciklus++) {
    $napstamp = mktime (0, 0, 0, $datumho, $ciklus, $datumev);
    $hetnapja = date ("w", $napstamp);
    if ($ciklus < 10) { $nap = "0".$ciklus; }
      else { $nap = $ciklus; }
    $aktnap = $datumev."-".$datumho."-".$nap;
    $szin = "#FFFFFF";
    $esem = 0;

    $result2 = mysql_query ("SELECT v3_rent.autoid, v3_rent.eleje, v3_rent.vege
                             FROM v3_rent
                            ") or die (mysql_error ());

    while($row2 = mysql_fetch_array($result2)){

      $eleje = substr($row2['eleje'], 0, 10);
      $vege = substr($row2['vege'], 0, 10);

      if ($aktnap == $eleje OR $aktnap == $vege) { $szin = "#FF0000"; $esem = 1; }
    }
?>
  <TD bgcolor="<?php echo $szin; ?>"><?php if ($esem == 1) { ?><A href="admin_caldaydet.php?nap=<?php echo $aktnap; ?>"><?php } echo $ciklus; ?></A></TD>
<?php
    if ($hetnapja == 0) {
?>
  </TR>
  <TR>
<?php
    }
  }
?>
    </TR>
  </TABLE>
  <BR /><FORM action="admin_calday.php">
    <SELECT name="datumev" class="input">
      <OPTION>2007</OPTION>
      <OPTION <?php if ($datumev == "2008") { ?>selected="yes"<?php } ?>>2008</OPTION>
      <OPTION <?php if ($datumev == "2009") { ?>selected="yes"<?php } ?>>2009</OPTION>
      <OPTION <?php if ($datumev == "2010") { ?>selected="yes"<?php } ?>>2010</OPTION>
      <OPTION <?php if ($datumev == "2011") { ?>selected="yes"<?php } ?>>2011</OPTION>
      <OPTION <?php if ($datumev == "2012") { ?>selected="yes"<?php } ?>>2012</OPTION>
    </SELECT>
    <SELECT name="datumho" class="input">
      <OPTION <?php if ($datumho == "01") { ?>selected="yes"<?php } ?>>01</OPTION>
      <OPTION <?php if ($datumho == "02") { ?>selected="yes"<?php } ?>>02</OPTION>
      <OPTION <?php if ($datumho == "03") { ?>selected="yes"<?php } ?>>03</OPTION>
      <OPTION <?php if ($datumho == "04") { ?>selected="yes"<?php } ?>>04</OPTION>
      <OPTION <?php if ($datumho == "05") { ?>selected="yes"<?php } ?>>05</OPTION>
      <OPTION <?php if ($datumho == "06") { ?>selected="yes"<?php } ?>>06</OPTION>
      <OPTION <?php if ($datumho == "07") { ?>selected="yes"<?php } ?>>07</OPTION>
      <OPTION <?php if ($datumho == "08") { ?>selected="yes"<?php } ?>>08</OPTION>
      <OPTION <?php if ($datumho == "09") { ?>selected="yes"<?php } ?>>09</OPTION>
      <OPTION <?php if ($datumho == "10") { ?>selected="yes"<?php } ?>>10</OPTION>
      <OPTION <?php if ($datumho == "11") { ?>selected="yes"<?php } ?>>11</OPTION>
      <OPTION <?php if ($datumho == "12") { ?>selected="yes"<?php } ?>>12</OPTION>
    </SELECT>
    <INPUT type="submit" class="button">
  </FORM>
<script language="JavaScript" type="text/javascript" src="wz_tooltip.js"></script>
<?php
  } else {
  echo ('Nincs jogosultsága ehhez a területhez!');
  }
  include ("sys/footer.php");
?>
