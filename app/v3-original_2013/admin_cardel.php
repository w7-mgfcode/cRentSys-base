<?php
  $carid = $_GET['carid'];
  include ("sys/header.php");
  include ("sys/loggedin.php");
  include ("sys/connect.php");

  if ($loggedlevel == 9) {

?>
  Biztos???
<A href="admin_cardel2.php?carid=<?php echo $carid; ?>">Igen</A>
<?php  

  } else {
  echo ('Nincs jogosultsága ehhez a területhez!');
  }
  include ("sys/footer.php");
?>
