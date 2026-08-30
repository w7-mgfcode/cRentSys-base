<?php
  include ("sys/header.php");
  include ("sys/loggedin.php");
  include ("sys/connect.php");

  if ($loggedlevel == 9) {
?>

  <TABLE cellspacing="1" cellpadding="1" border="0">
    <TR><TD></TD>
<?php
  $datumev = date ("Y");
  $datumho = date ("m");
  $datumnap = date ("d");
  $elsonapstamp = mktime (0, 0, 0, $datumho, $datumnap, $datumev) - 1382400;

  for ($ciklus = 1; $ciklus <= 31; $ciklus++) {

    $napstamp = $elsonapstamp+($ciklus*86400);
    $hetnapja = date ("w", $napstamp);

    switch ($hetnapja) {
      case 0:
        $napszov = "V";
        break;
      case 1:
        $napszov = "H";
        break;
      case 2:
        $napszov = "K";
        break;
      case 3:
        $napszov = "Sz";
        break;
      case 4:
        $napszov = "Cs";
        break;
      case 5:
        $napszov = "P";
        break;
      case 6:
        $napszov = "Sz";
        break;
    }
  if ($hetnapja == "6" or $hetnapja == "0") {
?>
      <TD align="center" style="width: 10px; font-size: 10px; color: #FFFFFF;" bgcolor="#FF8080"><?php echo $napszov; ?></TD>
<?php
  } else {
?>
      <TD align="center" style="width: 10px; font-size: 10px; color: #FFFFFF;" bgcolor="#808080"><?php echo $napszov; ?></TD>
<?php
  }
  }
?>
    </TR>
    <TR><TD></TD>
<?php

  for ($ciklus = 1; $ciklus <= 31; $ciklus++) {

    $napstamp = $elsonapstamp+($ciklus*86400);
    $napdatum = strftime ("%d", $napstamp);


?>
      <TD align="center" style="font-size: 10px; color: #FFFFFF;" bgcolor="#404040"><?php echo $napdatum; ?></TD>
<?php
  }
?>
    </TR>
<?php

$result = mysql_query ("SELECT v3_auto.autid, v3_auto.auttip, v3_auto.rendszam, v3_auto.kod, v3_autotip.tipid, v3_autotip.gyarto, v3_autotip.tipus, v3_autotip.ar
                        FROM v3_auto
                        LEFT JOIN v3_autotip
                        ON v3_auto.auttip = v3_autotip.tipid
                        ORDER BY v3_autotip.ar
                       ") or die (mysql_error ());

while($row = mysql_fetch_array($result)){
  $currauto = $row['autid'];
?>
    <TR>
      <TD style="font-size: 10px;" bgcolor="#C0C0C0">
<?php
  $autoout = $row['gyarto']." ".$row['tipus'];
  echo str_replace(" ", "&nbsp;", $autoout);
?>
        <BR><FONT style="font-size: 11px; font-weight: bold;"><?php echo $row['kod']; ?></FONT>
      </TD>
<?php
  for ($ciklus = 1; $ciklus <= 31; $ciklus++) {
    $napstamp = $elsonapstamp+($ciklus*86400);
    $hetnapja = date ("w", $napstamp);
?>
  <TD style="<?php
if ($datumev == $maiev AND $datumho == $maiho AND $ciklus == $mainap) {
  echo "border-left: 2px solid #FFFF00; border-right: 2px solid #FFFF00;";
}
if ($hetnapja == 0) { echo "border-right: 1px solid #FFFFFF;"; }
if ($hetnapja == 1) { echo "border-left: 1px solid #FFFFFF;"; }
?>" bgcolor="#<?php

    $napstamp = $elsonapstamp+($ciklus*86400);
    $napdatum = date ("Y-m-d", $napstamp);

if ($hetnapja == 0 or $hetnapja == 6) {
    $szin = "FF8080";
} else {
    $szin = "C0C0C0";
}
    $esemeny = "";

    $result2 = mysql_query ("SELECT v3_rent.autoid, v3_rent.eleje, v3_rent.vege, v3_rent.userid, v3_user.uid, v3_user.veznev, v3_user.kernev, v3_user.tel, v3_user.veztel
                             FROM v3_rent
                             LEFT JOIN v3_user
                             ON v3_rent.userid = v3_user.uid
                             WHERE v3_rent.autoid = '$currauto'
                            ") or die (mysql_error ());

    while($row2 = mysql_fetch_array($result2)){

      $eleje = substr($row2['eleje'], 0, 10);
      $vege = substr($row2['vege'], 0, 10);

      if ($napdatum > $eleje AND $napdatum < $vege) {
        $szin = "FF0000";
        $esemeny .= "<BR>Autó kimegy: ".$row2['eleje'];
        $esemeny .= "<BR>Autó bejön: ".$row2['vege'];
        $esemeny .= "<BR>&nbsp;";
      }

      if ($napdatum == $eleje OR $napdatum == $vege) {
        $szin = "0000FF";
        if ($napdatum == $eleje) {
          $esemeny .="<BR><B>Autó kimegy ma: ".substr($row2['eleje'], 5, 5)." - ".substr($row2['eleje'], 11, 5)." órakor!</B>";
          $esemeny .="<BR>Bérlõ: ".$row2['veznev']." ".$row2['kernev']." - mobil: ".$row2['tel'].", vez.: ".$row2['veztel']."";
          $esemeny .="<BR>(Bejön: ".$row2['vege'].")";
          $esemeny .= "<BR>&nbsp;";
        }
        if ($napdatum == $vege) {
          $esemeny .="<BR><B>Autó bejön ma: ".substr($row2['vege'], 5, 5)." - ".substr($row2['vege'], 11, 5)." órakor!</B>";
          $esemeny .="<BR>(Kiment: ".$row2['eleje'].")";
          $esemeny .= "<BR>&nbsp;";
        }
      }

    }

    echo $szin;

?>" style="font-size: 12px; font-weight: bold;"><a href="admin_caldetails.php?car=<?php echo $currauto; ?>&date=<?php echo $napdatum; ?>" onmouseover="return escape('<?php
  echo $esemeny;
?>')" style="text-decoration: none; color: #<?php echo $szin; ?>;">O</a></TD>
<?php
  }
?>
    </TR>
<?php
}
?>
    <TR><TD></TD>
<?php

  for ($ciklus = 1; $ciklus <= 31; $ciklus++) {
    $napstamp = $elsonapstamp+($ciklus*86400);
    $napdatum = strftime ("%d", $napstamp);
?>
      <TD align="center" style="font-size: 10px; color: #FFFFFF;" bgcolor="#404040"><?php echo $napdatum; ?></TD>
<?php
  }
?>
    </TR>
    <TR><TD></TD>
<?php

  $datumev = date ("Y");
  $datumho = date ("m");
  $datumnap = date ("d");
  $elsonapstamp = mktime (0, 0, 0, $datumho, $datumnap, $datumev) - 1382400;

  for ($ciklus = 1; $ciklus <= 31; $ciklus++) {

    $napstamp = $elsonapstamp+($ciklus*86400);
    $hetnapja = date ("w", $napstamp);

    switch ($hetnapja) {
      case 0:
        $napszov = "V";
        break;
      case 1:
        $napszov = "H";
        break;
      case 2:
        $napszov = "K";
        break;
      case 3:
        $napszov = "Sz";
        break;
      case 4:
        $napszov = "Cs";
        break;
      case 5:
        $napszov = "P";
        break;
      case 6:
        $napszov = "Sz";
        break;
    }
  if ($hetnapja == "6" or $hetnapja == "0") {
?>
      <TD align="center" style="width: 10px; font-size: 10px; color: #FFFFFF;" bgcolor="#FF8080"><?php echo $napszov; ?></TD>
<?php
  } else {
?>
      <TD align="center" style="width: 10px; font-size: 10px; color: #FFFFFF;" bgcolor="#808080"><?php echo $napszov; ?></TD>
<?php
}
}
?>
    </TR>
  </TABLE>

  <BR /><FORM action="admin_calendar.php">
    <SELECT name="datumev" class="input">
      <OPTION>2007</OPTION>
      <OPTION <?php if ($datumev == "2008") { ?>selected="yes"<?php } ?>>2008</OPTION>
      <OPTION <?php if ($datumev == "2009") { ?>selected="yes"<?php } ?>>2009</OPTION>
      <OPTION <?php if ($datumev == "2010") { ?>selected="yes"<?php } ?>>2010</OPTION>
      <OPTION <?php if ($datumev == "2011") { ?>selected="yes"<?php } ?>>2011</OPTION>
      <OPTION <?php if ($datumev == "2012") { ?>selected="yes"<?php } ?>>2012</OPTION>
      <OPTION <?php if ($datumev == "2012") { ?>selected="yes"<?php } ?>>2013</OPTION>
      <OPTION <?php if ($datumev == "2012") { ?>selected="yes"<?php } ?>>2014</OPTION>
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
