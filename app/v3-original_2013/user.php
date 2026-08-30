<?php
  $usernev = $_POST['usernev'];
  $pass = $_POST['pass'];

  include ("sys/connect.php");
  $valid = 0;
  $regpass = md5($pass);

  $result = mysql_query ("SELECT v3_user.usernev, v3_user.pass
                          FROM v3_user
                         ") or die (mysql_error ());

  while($row = mysql_fetch_array($result)){
    if ($row['usernev'] == $usernev AND $row['pass'] == $regpass) {
    $valid = 1;
    }
  }

  if ($valid == 1) {
    setcookie (usernev, $usernev);
    setcookie (pass, $regpass);
?>
<HTML>
  <HEAD>
    <META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">
  </HEAD>
<BODY>
</BODY>
</HTML>
<?php
  }

 else {
    include ("sys/header.php");
    echo 'Hibás felhasználói név és/vagy jelszó!';
    include ("sys/footer.php");
  }

?>