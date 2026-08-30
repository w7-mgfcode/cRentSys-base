<?php
  $rentid = $_GET['rentid'];
  include ("sys/header.php");
  include ("sys/loggedin.php");
  include ("sys/connect.php");

  if ($loggedlevel == 9) {

?>
  Biztos???
<A href="admin_rentdel2.php?rentid=<?php echo $rentid; ?>">Igen</A>
<?php  

  } else {
  echo ('Nincs jogosultsága ehhez a területhez!');
  }
  include ("sys/footer.php");
?>
