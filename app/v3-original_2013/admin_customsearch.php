<?php

  $keres = $_POST['keres'];

  include ("sys/header.php");
  include ("sys/loggedin.php");
  include ("sys/connect.php");

  if ($loggedlevel == 9) {
?>
Találatok:<BR>
<FORM action="admin_custominfo.php" method="post">
  <SELECT multiple name="ugyfel" size="10" class="input">

<?php
$result = mysql_query ("SELECT v3_user.uid, v3_user.usernev, v3_user.veznev, v3_user.kernev, v3_user.anynev, v3_user.mail, v3_user.szint
                        FROM v3_user
                        WHERE v3_user.veznev LIKE '%$keres%'
                       ") or die (mysql_error ());

while($row = mysql_fetch_array($result)){
?>
  <OPTION value="<?php echo $row['uid']; ?>"><?php echo $row['veznev']; ?> <?php echo $row['kernev']; ?> (a. n. <?php echo $row['anynev']; ?>)</OPTION>
<?php
}
?>
  </SELECT>
  <INPUT type="submit" value="OK" class="button">
</FORM>

<?php
  } else {
  echo ('Nincs jogosultsága ehhez a területhez!');
  }
  include ("sys/footer.php");
?>
