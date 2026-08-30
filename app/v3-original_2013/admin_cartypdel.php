<?php
  $cartypid = $_GET['cartypid'];
  include ("sys/header.php");
  include ("sys/loggedin.php");
  include ("sys/connect.php");

  if ($loggedlevel == 9) {

?>
  Biztos???
<A href="admin_cartypdel2.php?cartypid=<?php echo $cartypid; ?>">Igen</A>
<?php  

  } else {
  echo ('Nincs jogosultsága ehhez a területhez!');
  }
  include ("sys/footer.php");
?>
