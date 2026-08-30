<?php
  include ("sys/header.php");
  include ("sys/loggedin.php");
  if ($loggedin==0) {
    echo 'Nincs bejelentkezve!';
  } else {
  $maidatum = strftime("%Y-%m-%d %H:%M:%S");
?>
  Aktuális foglalásaim:
<?php
  $result = mysql_query ("SELECT v3_rent.userid, v3_rent.autoid, v3_rent.eleje, v3_rent.vege, v3_rent.felvetel, v3_rent.vissza, v3_rent.autoar, v3_rent.felvar, v3_rent.visszar, v3_rent.megj, v3_auto.autid, v3_auto.auttip, v3_autotip.tipid, v3_autotip.gyarto, v3_autotip.tipus
                          FROM v3_rent
                          LEFT JOIN v3_auto
                          ON v3_rent.autoid = v3_auto.autid
                          LEFT JOIN v3_autotip
                          ON v3_auto.auttip = v3_autotip.tipid
                          WHERE v3_rent.userid = '$ulogged' AND v3_rent.vege >= '$maidatum'
                         ") or die (mysql_error ());

  while($row = mysql_fetch_array($result)){
?>
  <TABLE cellspacing="0" cellpadding="2" border="1">
    <TR>
      <TD style="font-size: 11px; font-weight: bold;">
        Foglalás kezdete:
      </TD>
      <TD style="font-size: 11px;">
        <?php echo $row['eleje']; ?>
      </TD>
    </TR>
    <TR>
      <TD style="font-size: 11px; font-weight: bold;">
        Foglalás vége:
      </TD>
      <TD style="font-size: 11px;">
        <?php echo $row['vege']; ?>
      </TD>
    </TR>
    <TR>
      <TD style="font-size: 11px; font-weight: bold;">
        Autó típusa:
      </TD>
      <TD style="font-size: 11px;">
        <?php echo $row['gyarto']; ?> <?php echo $row['tipus']; ?>
      </TD>
    </TR>
    <TR>
      <TD style="font-size: 11px; font-weight: bold;">
        Jármûfelvétel helye:
      </TD>
      <TD style="font-size: 11px;">
        <?php echo $row['felvetel']; ?>
      </TD>
    </TR>
    <TR>
      <TD style="font-size: 11px; font-weight: bold;">
        Jármûvisszavétel helye:
      </TD>
      <TD style="font-size: 11px;">
        <?php echo $row['vissza']; ?>
      </TD>
    </TR>
    <TR>
      <TD style="font-size: 11px; font-weight: bold;">
        Jármûbérlet díja:
      </TD>
      <TD style="font-size: 11px;">
        <?php echo $row['autoar']; ?> Ft      </TD>
    </TR>
    <TR>
      <TD style="font-size: 11px; font-weight: bold;">
        Jármûfelvétel díja:
      </TD>
      <TD style="font-size: 11px;">
        <?php echo $row['felvar']; ?> Ft      </TD>
    </TR>
    <TR>
      <TD style="font-size: 11px; font-weight: bold;">
        Jármûvisszavétel díja:
      </TD>
      <TD style="font-size: 11px;">
        <?php echo $row['visszar']; ?> Ft      </TD>
    </TR>
    <TR>
      <TD style="font-size: 11px; font-weight: bold;">
        Megjegyzés:
      </TD>
      <TD style="font-size: 11px;">
        <?php echo $row['megj']; ?>
      </TD>
    </TR>
  </TABLE>
<?php
  }
?>
  <BR>Lejárt foglalásaim:
<?php
  $result = mysql_query ("SELECT v3_rent.userid, v3_rent.autoid, v3_rent.eleje, v3_rent.vege, v3_rent.felvetel, v3_rent.autoar, v3_rent.felvar, v3_rent.megj, v3_auto.autid, v3_auto.auttip, v3_autotip.tipid, v3_autotip.gyarto, v3_autotip.tipus
                          FROM v3_rent
                          LEFT JOIN v3_auto
                          ON v3_rent.autoid = v3_auto.autid
                          LEFT JOIN v3_autotip
                          ON v3_auto.auttip = v3_autotip.tipid
                          WHERE v3_rent.userid = '$ulogged' AND v3_rent.vege < '$maidatum'
                         ") or die (mysql_error ());

  while($row = mysql_fetch_array($result)){
?>
  <TABLE cellspacing="0" cellpadding="2" border="1">
    <TR>
      <TD style="font-size: 11px; font-weight: bold;">
        Foglalás kezdete:
      </TD>
      <TD style="font-size: 11px;">
        <?php echo $row['eleje']; ?>
      </TD>
    </TR>
    <TR>
      <TD style="font-size: 11px; font-weight: bold;">
        Foglalás vége:
      </TD>
      <TD style="font-size: 11px;">
        <?php echo $row['vege']; ?>
      </TD>
    </TR>
    <TR>
      <TD style="font-size: 11px; font-weight: bold;">
        Autó típusa:
      </TD>
      <TD style="font-size: 11px;">
        <?php echo $row['gyarto']; ?> <?php echo $row['tipus']; ?>
      </TD>
    </TR>
    <TR>
      <TD style="font-size: 11px; font-weight: bold;">
        Jármûfelvétel helye:
      </TD>
      <TD style="font-size: 11px;">
        <?php echo $row['felvetel']; ?>
      </TD>
    </TR>
    <TR>
      <TD style="font-size: 11px; font-weight: bold;">
        Jármûbérlet díja:
      </TD>
      <TD style="font-size: 11px;">
        <?php echo $row['autoar']; ?> Ft      </TD>
    </TR>
    <TR>
      <TD style="font-size: 11px; font-weight: bold;">
        Jármûfelvétel díja:
      </TD>
      <TD style="font-size: 11px;">
        <?php echo $row['felvar']; ?> Ft      </TD>
    </TR>
    <TR>
      <TD style="font-size: 11px; font-weight: bold;">
        Megjegyzés:
      </TD>
      <TD style="font-size: 11px;">
        <?php echo $row['megj']; ?>
      </TD>
    </TR>
  </TABLE>
<?php
  }
  }
  include ("sys/footer.php");
?>