<?php
  $user = $_POST['user'];
  $level = $_POST['level'];
  include ("sys/header.php");
  include ("sys/loggedin.php");
  include ("sys/connect.php");

  if ($loggedlevel == 9) {
    mysql_query ("UPDATE v3_user SET szint='$level' WHERE uid='$user'") or die (mysql_error());
?>
  A felhasználó adatait módosítottuk.
  <br><A href="admin_user.php" class="mainmenu_link"><B>Vissza</B></A>
<?php
  } else {
    echo ('Nincs jogosultsága ehhez a területhez!');
  }
  include ("sys/footer.php");
?>