<?php
  $nap = $_GET['nap'];

  include ("sys/header.php");
  include ("sys/loggedin.php");
  include ("sys/connect.php");

  if ($loggedlevel == 9) {
?>
  <?php echo $nap; ?>
<TABLE border="1">
<?php
    $result = mysql_query ("SELECT v3_rent.rentid, v3_rent.userid, v3_rent.autoid, v3_rent.eleje, v3_rent.vege, v3_rent.felvetel, v3_rent.vissza, v3_rent.autoar, v3_rent.felvar, v3_rent.visszar, v3_rent.megj, v3_user.uid, v3_user.mail, v3_user.veznev, v3_user.kernev, v3_user.tel, v3_auto.autid, v3_auto.auttip, v3_auto.rendszam, v3_auto.kod, v3_autotip.tipid, v3_autotip.gyarto, v3_autotip.tipus
                            FROM v3_rent
                            LEFT JOIN v3_auto
                            ON v3_rent.autoid = v3_auto.autid
                            LEFT JOIN v3_user
                            ON v3_rent.userid = v3_user.uid
                            LEFT JOIN v3_autotip
                            ON v3_auto.auttip = v3_autotip.tipid
                            ORDER BY v3_rent.eleje, v3_rent.vege
                            ") or die (mysql_error ());

    while($row = mysql_fetch_array($result)){

      $eleje = substr($row['eleje'], 0, 10);
      $vege = substr($row['vege'], 0, 10);

      if ($nap == $eleje) {
?>
  <TR>
  <TD><?php echo substr($row['eleje'], 11, 5); ?></TD><TD><?php echo $row['felvetel']; ?></TD><TD><?php echo $row['gyarto']; ?> <?php echo $row['tipus']; ?> (<?php echo $row['kod']; ?>)</TD><TD><?php echo $row['megj']; ?></TD><TD><A href="contractor.php?rentid=<?php echo $row['rentid']; ?>" target="_blank">szerzõdés</A></TD><TD><A href="admin_rentedit.php?rentid=<?php echo $row['rentid']; ?>">szerkeszt</A></TD><TD>>></TD>
  </TR>
<?php
      }

      if ($nap == $vege) {
?>
  <TR>
  <TD><?php echo substr($row['vege'], 11, 5); ?></TD><TD><?php echo $row['vissza']; ?></TD><TD><?php echo $row['gyarto']; ?> <?php echo $row['tipus']; ?> (<?php echo $row['kod']; ?>)</TD><TD><?php echo $row['megj']; ?></TD><TD><A href="contractor.php?rentid=<?php echo $row['rentid']; ?>">szerzõdés</A></TD><TD><A href="admin_rentedit.php?rentid=<?php echo $row['rentid']; ?>">szerkeszt</A></TD><TD><<</TD>
  </TR>
<?php
      }

    }
?></TABLE><?php

  } else {
  echo ('Nincs jogosultsága ehhez a területhez!');
  }
  include ("sys/footer.php");
?>
