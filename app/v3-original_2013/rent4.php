<?php
  $kezdido = $_POST['kezdido'];
  $vegeido = $_POST['vegeido'];
  $auto = $_POST['auto'];
  $autoar = $_POST['autoar'];
  $hely = $_POST['hely'];
  $egyeb = $_POST['egyeb'];
  $vhely = $_POST['vhely'];
  $vegyeb = $_POST['vegyeb'];
  $apaly = $_POST['apaly'];
  $takar = $_POST['takar'];
  $hatar = $_POST['hatar'];
  $gps = $_POST['gps'];

  include ("sys/header.php");
  include ("sys/loggedin.php");
  include ("sys/connect.php");
  if ($loggedin==0) {
    echo 'Nincs bejelentkezve!';
  } else {
  $kezdtelj = strftime("%Y. %m. %d. %H:%M", $kezdido);
  $vegetelj = strftime("%Y. %m. %d. %H:%M", $vegeido);
  $kulonbseg=$vegeido-$kezdido-1;
  $kulnap=(int)($kulonbseg/86400);
  $kulnap=$kulnap+1;
  $felvhely = $hely;
  $viszhely = $vhely;

  if ($hely == 'egyeb') {$hely = $egyeb;}
  if ($vhely == 'egyeb') {$vhely = $vegyeb;}
  $gps_ara=500*$kulnap;
?>
  <DIV class="title">Ön a következõ adatokat adta meg:</DIV>
  <TABLE cellspacing="0" cellpadding="2" border="0">
    <TR>
      <TD style="font-size: 12px;">
        Gépjármû típusa:
      </TD>
      <TD style="font-size: 12px; font-weight: bold;">
<?php
        $result = mysql_query ("SELECT v3_auto.autid, v3_auto.auttip
                                FROM v3_auto
                                WHERE v3_auto.autid = '$auto'
                               ") or die (mysql_error ());

        while($row = mysql_fetch_array($result)){

          $autotip = $row['auttip'];

          $result2 = mysql_query ("SELECT v3_autotip.tipid, v3_autotip.gyarto, v3_autotip.tipus
                                   FROM v3_autotip
                                   WHERE v3_autotip.tipid = '$autotip'
                                  ") or die (mysql_error ());

          while($row2 = mysql_fetch_array($result2)){
            echo $row2['gyarto']." ".$row2['tipus'];
          }

        }
?>
      </TD>
    </TR>
    <TR>
      <TD style="font-size: 12px;">
        Bérleti idõszak kezdete:
      </TD>
      <TD style="font-size: 12px; font-weight: bold;">
        <?php echo $kezdtelj; ?>
      </TD>
    </TR>
    <TR>
      <TD style="font-size: 12px;">
        Bérleti idõszak vége:
      </TD>
      <TD style="font-size: 12px; font-weight: bold;">
        <?php echo $vegetelj; ?>
      </TD>
    </TR>
    <TR>
      <TD style="font-size: 12px;">
        Felvétel helye:
      </TD>
      <TD style="font-size: 11px; font-weight: bold;">
        <?php
          if ($hely == 'iroda') { echo "Iroda"; }
          if ($hely == 'ferih') { echo "Budapest Airport"; }
          if ($hely <> 'iroda' AND $hely <> 'ferih') { echo $hely; }
        ?>
      </TD>
    </TR>
    <TR>
      <TD style="font-size: 12px;">
        Visszavétel helye:
      </TD>
      <TD style="font-size: 12px; font-weight: bold;">
        <?php
          if ($vhely == 'iroda') { echo "Iroda"; }
          if ($vhely == 'ferih') { echo "Budapest Airport"; }
          if ($vhely <> 'iroda' AND $vhely <> 'ferih') { echo $vhely; }
        ?>
      </TD>
    </TR>
  </TABLE>
  <HR width="100%" size="1" color="#000000">
  <DIV class="title">A gépjármûfelvétel teljes költsége:</DIV>
  <TABLE cellspacing="0" cellpadding="2" border="0">
    <TR>
      <TD style="font-size: 12px;">
        Gépjármûbérlet díja:
      </TD>
      <TD style="font-size: 12px; font-weight: bold;">
        <?php echo $autoar; ?> Ft / <?php echo $kulnap; ?> napra
      </TD>
    </TR>
    <TR>
      <TD style="font-size: 12px;">
        Gépjármûfelvétel díja:
      </TD>
      <TD style="font-size: 12px; font-weight: bold;">
        <?php

          $felvnap = strftime ("%u", $kezdido);
          $felvido = strftime ("%H:%M:%S", $kezdido); 

          $result = mysql_query ("SELECT v3_nyitva.nap, v3_nyitva.nyitora, v3_nyitva.zarora
                                  FROM v3_nyitva
                                  WHERE v3_nyitva.nap = '$felvnap'
                                 ") or die (mysql_error ());

          while($row = mysql_fetch_array($result)){

            if ($felvido < $row['nyitora'] OR $felvido > $row['zarora']) {
              $nyitva = 0;
            } else {
              $nyitva = 1;
            }

          }

          $result = mysql_query ("SELECT v3_felv_ar.nyitva, v3_felv_ar.iroda, v3_felv_ar.ferihegy, v3_felv_ar.egyeb
                                  FROM v3_felv_ar
                                  WHERE v3_felv_ar.nyitva = '$nyitva'
                                 ") or die (mysql_error ());

          while($row = mysql_fetch_array($result)){

            if ($felvhely == "ferih") { $felvar = $row['ferihegy']; }
            if ($felvhely == "iroda") { $felvar = $row['iroda']; }
            if ($felvhely == "egyeb") { $felvar = $row['egyeb']; }

          }

          echo $felvar." Ft ";

        ?>
      </TD>
    </TR>
    <TR>
      <TD style="font-size: 12px;">
        Gépjármûvisszavétel díja:
      </TD>
      <TD style="font-size: 12px; font-weight: bold;">
        <?php

          $visznap = strftime ("%u", $vegeido);
          $viszido = strftime ("%H:%M:%S", $vegeido); 

          $result = mysql_query ("SELECT v3_nyitva.nap, v3_nyitva.nyitora, v3_nyitva.zarora
                                  FROM v3_nyitva
                                  WHERE v3_nyitva.nap = '$visznap'
                                 ") or die (mysql_error ());

          while($row = mysql_fetch_array($result)){

            if ($viszido < $row['nyitora'] OR $viszido > $row['zarora']) {
              $nyitva = 0;
            } else {
              $nyitva = 1;
            }

          }

          $result = mysql_query ("SELECT v3_felv_ar.nyitva, v3_felv_ar.iroda, v3_felv_ar.ferihegy, v3_felv_ar.egyeb
                                  FROM v3_felv_ar
                                  WHERE v3_felv_ar.nyitva = '$nyitva'
                                 ") or die (mysql_error ());

          while($row = mysql_fetch_array($result)){

            if ($viszhely == "ferih") { $viszar = $row['ferihegy']; }
            if ($viszhely == "iroda") { $viszar = $row['iroda']; }
            if ($viszhely == "egyeb") { $viszar = $row['egyeb']; }

          }

          echo $viszar." Ft ";

        ?>
      </TD>
    </TR>
  </TABLE>
  <HR width="100%" size="1" color="#000000">
<?php
  if ($apaly == 'igen') {
?>
Autópálya-használat engedélyezve.
<?php
  }
?>
<?php
  if ($takar == 'igen') {
?>
<BR>A jármû külsõ-belsõ takarítása visszaszállítás után. <strong>(+2500 Ft)</strong>
<?php
  }
?>
<?php
  if ($hatar == 'igen') {
?>
<BR>Határátlépési engedély megadva.
<?php
  }
?>
<?php
  if ($apaly == 'igen') {
?>
<BR>GPS navigáció igénylése.<strong> (+<?php echo $gps_ara; ?> Ft / <?php echo $kulnap; ?> napra)</strong>
<?php
  }
?>
  <HR width="100%" size="1" color="#000000">
  Ha megrendeléséhez szeretne bármilyen megjegyzést fûzni munkatársaink számára, kérjük, írja ide:
  <FORM action="rent5.php" method="post">
    <TEXTAREA name="megj" rows="5" cols="50" wrap="physical" class="input"></TEXTAREA>
  <HR width="100%" size="1" color="#000000">
    Az "Elküld" gombra kattintva Ön véglegesen megerõsíti megrendelési szándékát, a megrendelést rögzítjük adatbázisunkban.
    <INPUT type="hidden" name="kezdido" value="<?php echo $kezdido; ?>">
    <INPUT type="hidden" name="vegeido" value="<?php echo $vegeido; ?>">
    <INPUT type="hidden" name="auto" value="<?php echo $auto; ?>">
    <INPUT type="hidden" name="hely" value="<?php echo $hely; ?>">
    <INPUT type="hidden" name="vhely" value="<?php echo $vhely; ?>">
    <INPUT type="hidden" name="autoar" value="<?php echo $autoar; ?>">
    <INPUT type="hidden" name="felvar" value="<?php echo $felvar; ?>">
    <INPUT type="hidden" name="viszar" value="<?php echo $viszar; ?>">
    <INPUT type="hidden" name="apaly" value="<?php echo $apaly; ?>">
    <INPUT type="hidden" name="takar" value="<?php echo $takar; ?>">
    <INPUT type="hidden" name="hatar" value="<?php echo $hatar; ?>">
    <INPUT type="hidden" name="gps" value="<?php echo $gps; ?>">
    <INPUT type="hidden" name="gps_ar" value="<?php echo $gps_ar; ?>">
    <INPUT type="hidden" name="kulnap" value="<?php echo $kulnap; ?>">
  <HR width="100%" size="1" color="#000000">
    <INPUT type="submit" value="Elküld" class="button">
  </FORM>
<?php
  }

  include ("sys/footer.php");
?>