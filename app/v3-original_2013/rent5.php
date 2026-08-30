<?php
  $kezdido = $_POST['kezdido'];
  $vegeido = $_POST['vegeido'];
  $auto = $_POST['auto'];
  $hely = $_POST['hely'];
  $vhely = $_POST['vhely'];
  $autoar = $_POST['autoar'];
  $felvar = $_POST['felvar'];
  $viszar = $_POST['viszar'];
  $megj = $_POST['megj'];
  $apaly = $_POST['apaly'];
  $takar = $_POST['takar'];
  $hatar = $_POST['hatar'];
  $gps = $_POST['gps'];
  $gps_ar = $_POST['gps_ar'];
  $kulnap = $_POST['kulnap'];

  include ("sys/header.php");
  include ("sys/loggedin.php");
  include ("sys/connect.php");
  if ($loggedin==0) {
    echo 'Nincs bejelentkezve!';
  } else {
?>
  <DIV class="title">Megrendelését rögzítettük!</DIV>
  <BR><A class="mainmenu_link" href="index.php">Vissza a kezdõoldalra</A>
<?php
  $kezdtelj = strftime("%Y-%m-%d %H:%M", $kezdido);
  $vegetelj = strftime("%Y-%m-%d %H:%M", $vegeido);

  mysql_query ("INSERT INTO v3_rent (userid, autoid, eleje, vege, felvetel, vissza, autoar, felvar, visszar, megj, apaly, takar, hatar) VALUES ('$ulogged', '$auto', '$kezdtelj', '$vegetelj', '$hely', '$vhely', '$autoar', '$felvar', '$viszar', '$megj', '$apaly', '$takar', '$hatar') ") or die (mysql_error());
  }

$result = mysql_query ("SELECT v3_user.uid, v3_user.veznev, v3_user.kernev, v3_user.mail
                        FROM v3_user
                        WHERE v3_user.uid = '$ulogged'
                       ") or die (mysql_error ());

while($row = mysql_fetch_array($result)){
  $megrendnev = $row['veznev']." ".$row['kernev'];
  $megrendmail = $row['mail'];
}
$result = mysql_query ("SELECT v3_auto.autid, v3_auto.kod, v3_auto.auttip, v3_autotip.tipid, v3_autotip.gyarto, v3_autotip.tipus
                        FROM v3_auto
                        LEFT JOIN v3_autotip
                        ON v3_auto.auttip = v3_autotip.tipid
                        WHERE v3_auto.autid = '$auto'
                       ") or die (mysql_error ());

while($row = mysql_fetch_array($result)){
  $jarmu = $row['gyarto']." ".$row['tipus'];
  $kod = $row['kod'];
}

if ($hatar == '') { $hatar = 'nem'; }
if ($apaly == '') { $apaly = 'nem'; }
if ($takar == '') { $takar = 'nem'; }
if ($gps == '') { $gps = 'nem'; }

$mailszoveg = "<center>Tisztelt <B><I>".$megrendnev."</I></B>!</center>";
$mailszoveg .= "<br />";
$mailszoveg .= "<br />Köszönjük érdeklõdését és megtisztelõ bizalmát!";
$mailszoveg .= "<br />";
$mailszoveg .= "<br />Foglalását regisztráltuk és visszaigazoljuk:";
$mailszoveg .= "<br />- Választott gépjármû: <B>".$jarmu."</B>";
$mailszoveg .= "<br />- Választott idõszak: <B>".$kezdtelj." - ".$vegetelj."</B>";
$mailszoveg .= "<br />- Megjegyzés: <B>".$megj."</B>";
$mailszoveg .= "<br />- Bérleti díj: ".$autoar." + ".$felvar." + ".$viszar." = <B>".($autoar+$felvar+$viszar)." Ft</B>";
$mailszoveg .= "<br />";
$mailszoveg .= "<br />Tájékoztatnánk továbbá, hogy a feltüntetett bérleti díj nem tartalmazza:";
$mailszoveg .= "<br />- a kedvezményeket (<i>hétvégi kedvezmény, hosszú távú bérlet kedvezmény, stb.</i>)";
$mailszoveg .= "<br />- a különbözõ szolgáltatások felárait (<i>babaülés, hólánc stb.</i>)";
$mailszoveg .= "<br />";
$mailszoveg .= "<br />Határátlépés: ".$hatar;
$mailszoveg .= "<br />Autópálya-használat: ".$apaly;
$mailszoveg .= "<br />Visszaadás után takarítás(+2500 Ft): ".$takar;
$mailszoveg .= "<br />GPS navigáció igénylése(+500 Ft/nap): ".$gps;
$mailszoveg .= "<br />";
$mailszoveg .= "<br />Bérlet kezdetekor szükséges okmányok:";
$mailszoveg .= "<br />";
$mailszoveg .= "<br />Az alábbi eredeti dokumentumok bemutatása szükségesek";
$mailszoveg .= "<br />(kiszállításkor fénymásolatokat is kérnénk):";
$mailszoveg .= "<br />";
$mailszoveg .= "<br />";
$mailszoveg .= "<br />";
$mailszoveg .= "<br />Magyar Magánszemély";
$mailszoveg .= "<br />";
$mailszoveg .= "<br />";
$mailszoveg .= "<br />1. érvényes személyi igazolvány";
$mailszoveg .= "<br />";
$mailszoveg .= "<br />2. érvényes jogosítvány";
$mailszoveg .= "<br />";
$mailszoveg .= "<br />3. állandó lakcím igazolásáról lakcímkártya";
$mailszoveg .= "<br />";
$mailszoveg .= "<br />4. vonalas telefonszám / ferihegyre érkezok esetén repülojegy";
$mailszoveg .= "<br />";
$mailszoveg .= "<br />5. 1 db 2 hónapnál nem régebbi befizetett közüzemi számla (mobiltelefont kivéve) / ferihegyre érkezok esetén repülojegy";
$mailszoveg .= "<br />";
$mailszoveg .= "<br />";
$mailszoveg .= "<br />";
$mailszoveg .= "<br />";
$mailszoveg .= "<br />";
$mailszoveg .= "<br />";
$mailszoveg .= "<br />";
$mailszoveg .= "<br />";
$mailszoveg .= "<br />";
$mailszoveg .= "<br />Külföldi Magánszemély";
$mailszoveg .= "<br />1. érvényes útlevél";
$mailszoveg .= "<br />";
$mailszoveg .= "<br />2. érvényes jogosítvány";
$mailszoveg .= "<br />";
$mailszoveg .= "<br />3. visszaigazolható magyarországi tartózkodási hely / ferihegyre érkezok esetén repülojegy";
$mailszoveg .= "<br />";
$mailszoveg .= "<br />4. vonalas telefonszám / ferihegyre érkezok esetén repülojegy";
$mailszoveg .= "<br />";
$mailszoveg .= "<br />";
$mailszoveg .= "<br />";
$mailszoveg .= "<br />";
$mailszoveg .= "<br />";
$mailszoveg .= "<br />";
$mailszoveg .= "<br />";
$mailszoveg .= "<br />";
$mailszoveg .= "<br />";
$mailszoveg .= "<br />Gazdasági társaság és egyéb szervezetek<br>";
$mailszoveg .= "<br />1. Társasági Szerzõdés vagy alapító okirat";
$mailszoveg .= "<br />";
$mailszoveg .= "<br />2. Aláírási Címpéldány";
$mailszoveg .= "<br />";
$mailszoveg .= "<br />3. utolsó bankszámla kivonat +vonalas telefonszám";
$mailszoveg .= "<br />";
$mailszoveg .= "<br />4. gépkocsit átvevõ személytõl:";
$mailszoveg .= "<br />";
$mailszoveg .= "<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a, érvényes személyi igazolvány vagy útlevél";
$mailszoveg .= "<br />";
$mailszoveg .= "<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b, érvényes jogosítvány";
$mailszoveg .= "<br />";
$mailszoveg .= "<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;c, állandó lakcím igazolásáról lakcímkártya + vonalas telefonszám";
$mailszoveg .= "<br />";
$mailszoveg .= "<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;d, aláírási jogosúltságot igazoló dokumentum";
$mailszoveg .= "<br />";
$mailszoveg .= "<br />";
$mailszoveg .= "<br />";
$mailszoveg .= "<br />Természetesen mi is rugalmasak vagyunk amennyiben nem rendelkezik valamivel kérjük telefonon érdeklodjön és megpróbálunk rá megoldást találni. ";
$mailszoveg .= "<br />";
$mailszoveg .= "<br />*Bizonyos esetekben egyéb feltételeket is kérhetünk.";
$mailszoveg .= "<br />";
$mailszoveg .= "<br />";
$mailszoveg .= "<br />Tájékoztatjuk, hogy irodánkban tetõcsomagtartó, tetõbox, sílécszállító, gyermekülés, ill. mobiltelefon feltöltõ kártyával is bérelhetõ (1000 Ft / nap / kiegészítõ)";
$mailszoveg .= "<br />";
$mailszoveg .= "<br />";
$mailszoveg .= "<br />Amennyiben bármilyen kérdése lenne a bérléssel kapcsolatban, szívesen állunk rendelkezésére.";
$mailszoveg .= "<br />";
$mailszoveg .= "<br />Üdvözlettel:";
$mailszoveg .= "<br /><b><font color='#ccd943'>Local</font>Rent</b> Autókölcsönzõ";
$mailszoveg .= "<br />(06 70) 418 6595";
$mailszoveg .= "<br />ugyfel@localrent.hu";
$mailszoveg .= "<br />www.localrent.hu";
$mailszoveg .= "<br />";
$mailszoveg .= "<br />EURO Brill Kft..";
$mailszoveg .= "<br />1037 Budapest Bojtár u. 9. szám";

    mail ($megrendmail, "LocalRent ON-LINE foglalás értesítés", $mailszoveg, "From: ugyfel@localrent.hu"."\r\n"."Content-Type: text/html; charset=iso-8859-2");

$mailertesit = "<center>Megrendelés érkezett!</center>";
$mailertesit .= "<br />";
$mailertesit .= "<br />Megrendelõ neve: ".$megrendnev;
$mailertesit .= "<br />Jármû: ".$jarmu." (".$kod.")";
$mailertesit .= "<br />Bérleti idõszak: ".$kezdtelj." - ".$vegetelj;
$mailertesit .= "<br />Felvétel helye: ".$hely;
$mailertesit .= "<br />Visszavétel helye: ".$vhely;
$mailertesit .= "<br />Megjegyzés: ".$megj;
$mailertesit .= "<br />GPS: ".$gps;


    mail ("ugyfel@localrent.hu", "Megrendelés érkezett!", $mailertesit, "From: rendeles@localrent.hu"."\r\n"."Content-Type: text/html; charset=iso-8859-2");

  include ("sys/footer.php");
?>