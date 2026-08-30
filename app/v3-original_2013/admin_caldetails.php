<?php
  $auto = $_GET['car'];
  $datum = $_GET['date'];

  include ("sys/header.php");
  include ("sys/loggedin.php");
  include ("sys/connect.php");

  if ($loggedlevel == 9) {
?>
  <?php echo $datum; ?>
<?php

$result = mysql_query ("SELECT v3_auto.autid, v3_auto.auttip, v3_auto.rendszam, v3_auto.kod, v3_autotip.tipid, v3_autotip.gyarto, v3_autotip.tipus
                        FROM v3_auto
                        LEFT JOIN v3_autotip
                        ON v3_auto.auttip = v3_autotip.tipid
                        WHERE v3_auto.autid = '$auto'
                       ") or die (mysql_error ());

while($row = mysql_fetch_array($result)){
?>
<BR><?php echo $row['gyarto']; ?> <?php echo $row['tipus']; ?> (<?php echo $row['kod']; ?>, <?php echo $row['rendszam']; ?>)
<BR />
<?php
}

$result = mysql_query ("SELECT v3_rent.rentid, v3_rent.userid, v3_rent.autoid, v3_rent.eleje, v3_rent.vege, v3_rent.felvetel, v3_rent.vissza, v3_rent.autoar, v3_rent.felvar, v3_rent.visszar, v3_rent.megj, v3_user.uid, v3_user.mail, v3_user.veznev, v3_user.kernev, v3_user.szulido, v3_user.szulhely, v3_user.anynev, v3_user.nemzet, v3_user.szemig, v3_user.lakvaros, v3_user.lakcim, v3_user.lakirsz, v3_user.tel, v3_user.jogsi
                        FROM v3_rent
                        LEFT JOIN v3_user
                        ON v3_rent.userid = v3_user.uid
                        WHERE v3_rent.autoid = '$auto'
                       ") or die (mysql_error ());

while($row = mysql_fetch_array($result)){

  $eleje = substr($row['eleje'], 0, 10);
  $vege = substr($row['vege'], 0, 10);
  $esemeny = 0;

  if ($datum == $eleje AND $datum == $vege) {
    $esemeny = 1;
?>
  <BR>Esemény: az autó kimegy <?php echo substr($row['eleje'], 11, 5); ?> órakor és bejön <?php echo substr($row['vege'], 11, 5); ?> órakor
<?php
  } else {
    if ($datum == $eleje) {
      $esemeny = 1;
?>
  <BR>Esemény: az autó kimegy <?php echo substr($row['eleje'], 11, 5); ?> órakor
<?php
    }
    if ($datum == $vege) {
      $esemeny = 1;
?>
  <BR>Esemény: az autó bejön <?php echo substr($row['vege'], 11, 5); ?> órakor
<?php
    }
  }

  if ($datum > $eleje AND $datum < $vege) {
    $esemeny = 1;
?>
  <BR>Esemény: az autó kinn van.
<?php
  }
if ($esemeny == 1) {
?>
<BR>Részletek:
<TABLE>
  <TR>
    <TD>Bérlet kezdete:</TD><TD><?php echo $eleje; ?></TD>
  </TR>
  <TR>
    <TD>Bérlet vége:</TD><TD><?php echo $vege; ?></TD>
  </TR>
  <TR>
    <TD>Bérlõ:</TD><TD><A href="admin_userinfo.php?userid=<?php echo $row['userid']; ?>"><?php echo $row['veznev']; ?> <?php echo $row['kernev']; ?></A></TD>
  </TR>
  <TR>
    <TD>E-mail:</TD><TD><?php echo $row['mail']; ?></TD>
  </TR>
  <TR>
    <TD>Tel.:</TD><TD><?php echo $row['tel']; ?></TD>
  </TR>
  <TR>
    <TD>Jármûbérlet díja:</TD><TD><?php echo $row['autoar']; ?></TD>
  </TR>
  <TR>
    <TD>Jármûfelvétel díja:</TD><TD><?php echo $row['felvar']; ?></TD>
  </TR>
  <TR>
    <TD>Jármûfelvétel díja:</TD><TD><?php echo $row['felvar']; ?></TD>
  </TR>
  <TR>
    <TD>Jármûfelvétel helye:</TD><TD><?php echo $row['felvetel']; ?></TD>
  </TR>
  <TR>
    <TD>Bérlõ megjegyzése:</TD><TD><?php echo $row['megj']; ?></TD>
  </TR>
  <TR>
    <TD>Szerzõdés:</TD><TD><A href="contractor.php?rentid=<?php echo $row['rentid']; ?>">Klikk ide</A></TD>
  </TR>
  <TR>
    <TD>Rendelés szerkesztése:</TD><TD><A href="admin_rentedit.php?rentid=<?php echo $row['rentid']; ?>">Klikk ide</A></TD>
  </TR>
  <TR>
    <TD>Rendelés törlése:</TD><TD><A href="admin_rentdel.php?rentid=<?php echo $row['rentid']; ?>">Klikk ide</A></TD>
  </TR>
</TABLE>
<?php
}

}

  } else {
  echo ('Nincs jogosultsága ehhez a területhez!');
  }
  include ("sys/footer.php");
?>
