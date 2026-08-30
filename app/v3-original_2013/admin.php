<?php
  include ("sys/header.php");
  include ("sys/loggedin.php");

  if ($loggedlevel == 9) {
    $datumev = date ("Y");
    $datumho = date ("m");

?>
<center>
----------------------------------------------------------------------------------
<BR><STRONG> Adminisztrációs Felület  <font size="0,5">@ <font color="#FF9900">c</font>RentSys V1 alpha </font></STRONG>
<BR>----------------------------------------------------------------------------------
<BR>
<BR>
<BR>

<BR><A href="admin_open.php" class="mainmenu_link"><b>Nyitvatartás és felvételi árak</b></A>
<BR>-----------------------------------------
<BR><A href="admin_calendar.php?datumev=<?php echo $datumev; ?>&datumho=<?php echo $datumho; ?>" class="mainmenu_link"><b>Naptár - autónkénti bontás</b></A>
<BR>---------------------------------------
<BR><A href="admin_calday.php?datumev=<?php echo $datumev; ?>&datumho=<?php echo $datumho; ?>" class="mainmenu_link"><b>Naptár - napi bontás</b></A>
<BR>-------------------------------------
<BR><A href="admin_cal2.php?datumev=<?php echo $datumev; ?>&datumho=<?php echo $datumho; ?>" class="mainmenu_link"><b>Naptár - +/- 15 nap</b></A>
<BR>-------------------------------------
<BR><A href="admin_customer.php" class="mainmenu_link"><b>Ügyfélinformációk</b></A>
<BR>-----------------------------------
<BR><A href="admin_user.php" class="mainmenu_link"><b>Felhasználók</b></A>
<BR>---------------------------------
<BR><A href="admin_car.php" class="mainmenu_link"><b>Jármûvek</b></A>
<BR>---------------------------------
<BR><A href="admin_allincome.php" class="mainmenu_link"><b>Bevételek</b></A>
<BR>-------------------------------
<BR><A href="https://control.actiweb.hu/mail" class="mainmenu_link"><b>E-mail</b></A>
</center>
<?php
  } else {
  echo ('Nincs jogosultsága ehhez a területhez!');
  }
  include ("sys/footer.php");
?>
