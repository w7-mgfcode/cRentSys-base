<?php
  $carid = $_GET['carid'];
  $ev = $_GET['ev'];
  $ho = $_GET['ho'];

  include ("sys/header.php");
  include ("sys/loggedin.php");
  include ("sys/connect.php");

  if ($loggedlevel == 9) {

  if ($ev == '') {
    $ev = strftime ("%Y");
    $ho = strftime ("%m");
  }

  $datfull = $ev."-".$ho."-01 00:00:00";
  $da1full = $ev."-".$ho."-31 23:59:59";

$result = mysql_query ("SELECT v3_auto.autid, v3_auto.kod, v3_auto.auttip, v3_autotip.tipid, v3_autotip.gyarto, v3_autotip.tipus
                        FROM v3_auto
                        LEFT JOIN v3_autotip
                        ON v3_auto.auttip = v3_autotip.tipid
                        WHERE v3_auto.autid = '$carid'
                       ") or die (mysql_error ());

while($row = mysql_fetch_array($result)){
  $auto = $row['gyarto']." ".$row['tipus']." (".$row['kod'].")";
}

?>
  <center><?php echo $ev; ?>/<?php echo $ho; ?></center>
  <br />
  <center><?php echo $auto; ?></center>
<TABLE border="1" cellpadding="2" cellspacing="0">
  <TR>
    <TD>Eleje</TD><TD>Vége</TD><TD>Nap</TD><TD>Nettó</TD><TD>Bruttó</TD>
  </TR>
<?php
$ossznap = 0;
$osszlove = 0;
    $result = mysql_query ("SELECT v3_rent.autoid, v3_rent.eleje, v3_rent.vege, v3_rent.autoar
                            FROM v3_rent
                            WHERE v3_rent.autoid = '$carid' AND v3_rent.eleje >= '$datfull' AND v3_rent.eleje <= '$da1full'
                            ORDER BY v3_rent.eleje ASC
                            ") or die (mysql_error ());

    while($row = mysql_fetch_array($result)){
$eleje = strtotime($row['eleje']);
$vege = strtotime($row['vege']);
$kulonbseg = $vege-$eleje-1;
$nap=(int)($kulonbseg/86400);
$nap=$nap+1;
?>
  <TR>
    <TD><?php echo $row['eleje']; ?></TD><TD><?php echo $row['vege']; ?></TD><TD><?php echo $nap; ?></TD><TD><?php echo $row['autoar']; ?> Ft</TD><TD><?php echo ($row['autoar']/5*6); ?> Ft</TD>
  </TR>
<?php
  $ossznap = ($ossznap+$nap);
  $osszlove = ($osszlove+$row['autoar']);
    }
?>
  <TR>
    <TD colspan="2">Összesen</TD><TD><?php echo $ossznap; ?></TD><TD><?php echo $osszlove; ?> Ft</TD><TD><?php echo ($osszlove/5*6); ?> Ft</TD>
  </TR>
  <TR>
    <TD colspan="3">50%</TD><TD><?php echo ($osszlove/2); ?> Ft</TD><TD><?php echo ($osszlove/5*3); ?> Ft</TD>
  </TR>
</TABLE>
<FORM action="admin_carincome.php">
  <SELECT name="ev">
    <OPTION <?php if ($ev == '2005') { echo 'selected="yes"'; } ?>>2005</OPTION>
    <OPTION <?php if ($ev == '2006') { echo 'selected="yes"'; } ?>>2006</OPTION>
    <OPTION <?php if ($ev == '2007') { echo 'selected="yes"'; } ?>>2007</OPTION>
    <OPTION <?php if ($ev == '2008') { echo 'selected="yes"'; } ?>>2008</OPTION>
    <OPTION <?php if ($ev == '2009') { echo 'selected="yes"'; } ?>>2009</OPTION>
    <OPTION <?php if ($ev == '2010') { echo 'selected="yes"'; } ?>>2010</OPTION>
  </SELECT>
  <SELECT name="ho">
    <OPTION <?php if ($ho == '01') { echo 'selected="yes"'; } ?>>01</OPTION>
    <OPTION <?php if ($ho == '02') { echo 'selected="yes"'; } ?>>02</OPTION>
    <OPTION <?php if ($ho == '03') { echo 'selected="yes"'; } ?>>03</OPTION>
    <OPTION <?php if ($ho == '04') { echo 'selected="yes"'; } ?>>04</OPTION>
    <OPTION <?php if ($ho == '05') { echo 'selected="yes"'; } ?>>05</OPTION>
    <OPTION <?php if ($ho == '06') { echo 'selected="yes"'; } ?>>06</OPTION>
    <OPTION <?php if ($ho == '07') { echo 'selected="yes"'; } ?>>07</OPTION>
    <OPTION <?php if ($ho == '08') { echo 'selected="yes"'; } ?>>08</OPTION>
    <OPTION <?php if ($ho == '09') { echo 'selected="yes"'; } ?>>09</OPTION>
    <OPTION <?php if ($ho == '10') { echo 'selected="yes"'; } ?>>10</OPTION>
    <OPTION <?php if ($ho == '11') { echo 'selected="yes"'; } ?>>11</OPTION>
    <OPTION <?php if ($ho == '12') { echo 'selected="yes"'; } ?>>12</OPTION>
  </SELECT>
  <INPUT type="hidden" name="carid" value="<?php echo $carid; ?>">
  <INPUT type="submit" value="OK">
</FORM>
<?php
  } else {
  echo ('Nincs jogosultsága ehhez a területhez!');
  }
  include ("sys/footer.php");
?>
