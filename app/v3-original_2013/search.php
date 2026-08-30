<?php
  $kev = $_POST['kev'];
  $kho = $_POST['kho'];
  $kna = $_POST['kna'];
  $kor = $_POST['kor'];
  $kpe = $_POST['kpe'];
  $vev = $_POST['vev'];
  $vho = $_POST['vho'];
  $vna = $_POST['vna'];
  $vor = $_POST['vor'];
  $vpe = $_POST['vpe'];

  include ("sys/header.php");
  include ("sys/loggedin.php");
  include ("sys/connect.php");

    $kezdboo = checkdate($kho, $kna, $kev);
    $vegeboo = checkdate($vho, $vna, $vev);

    if ($kezdboo===true AND $vegeboo===true) {

$kezdstm=mktime($kor, $kpe, 0, $kho, $kna, $kev);
$vegestm=mktime($vor, $vpe, 0, $vho, $vna, $vev);
$kezdtelj=$kev."-".$kho."-".$kna." ".$kor.":".$kpe.":00";
$vegetelj=$vev."-".$vho."-".$vna." ".$vor.":".$vpe.":00";
$kezdvizs=strftime ("%Y-%m-%d %H:%M:%S", ($kezdstm-7199));
$kulonbseg=$vegestm-$kezdstm-1;
$kulnap=(int)($kulonbseg/86400);
$kulnap=$kulnap+1;


?>
A megadott idõpontban a következõ jármûvek állnak rendelkezésre:
<TABLE cellspacing="2" cellpadding="5" border="0" width="500" align="center">
<?php
      $result = mysql_query ("SELECT v3_autotip.tipid, v3_autotip.gyarto, v3_autotip.tipus, v3_autotip.extra, v3_autotip.ar, v3_autotip.megjegy, v3_autotip.kep
                              FROM v3_autotip
                              ORDER BY v3_autotip.ar
                             ") or die (mysql_error ());
  
      while($row = mysql_fetch_array($result)){
  
        $tipus = $row['tipid'];

        $result2 = mysql_query ("SELECT v3_auto.autid, v3_auto.auttip, v3_auto.rendszam, v3_auto.alvaz, v3_auto.motor, v3_auto.forgalmi, v3_auto.tulaj
                                 FROM v3_auto
                                 WHERE v3_auto.auttip = '$tipus'
                                ") or die (mysql_error ());

        $auto = 0;

        while($row2 = mysql_fetch_array($result2)){

          $autoch = $row2['autid'];
          $szabad = 1;

          $result3 = mysql_query ("SELECT v3_rent.autoid, v3_rent.eleje, v3_rent.vege
                                   FROM v3_rent
                                   WHERE v3_rent.autoid = '$autoch'
                                  ") or die (mysql_error ());

          while($row3 = mysql_fetch_array($result3)){

            if ($kezdvizs >= $row3['eleje'] AND $kezdvizs <= $row3['vege']) {
              $szabad = 0;
            }

            if ($vegetelj >= $row3['eleje'] AND $vegetelj <= $row3['vege']) {
              $szabad = 0;
            }

            if ($row3['eleje'] >= $kezdvizs AND $row3['eleje'] <= $vegetelj) {
              $szabad = 0;
            }

            if ($row3['vege'] >= $kezdvizs AND $row3['vege'] <= $vegetelj) {
              $szabad = 0;
            }

          }


          if ($szabad == 1) {
            $auto = $autoch;
          }

        }

        if ($auto > 0) {

  $ara=$row['ar']*$kulnap;

?>
  <TR>
    <TD bgcolor="#E0E0E0" width="130">
      <A href="photos/<?php echo $row['kep']; ?>.jpg" target="_blank"><IMG src="photos/thumb/<?php echo $row['kep']; ?>.jpg" vspace="0" hspace="0" border="0"></A>
    </TD>
    <TD bgcolor="#E0E0E0" style="font-size: 11px;" valign="top">
      <B><?php echo $row['gyarto']." ".$row['tipus']; ?></B>
      <BR><B>Extrák:</B> <?php echo $row['extra']; ?>
      <BR><B>Megjegyzés:</B> <?php echo $row['megjegy']; ?>
      <BR><B>Ár:</B> <?php echo $ara." Ft / ".$kulnap." napra"; ?>
    </TD>
  </TR>

<?php

        }

      }
?>
</TABLE>
<br>A képek csak illusztrációk.

<?php
    } else {
      echo 'Érvénytelen dátum!';
    }

  include ("sys/footer.php");
?>