<?php
  $rentid = $_GET['rentid'];

  include ("sys/connect.php");

$result = mysql_query ("SELECT v3_rent.rentid, v3_rent.userid, v3_rent.autoid, v3_rent.eleje, v3_rent.vege, v3_rent.felvetel, v3_rent.vissza, v3_rent.autoar, v3_rent.felvar, v3_rent.visszar, v3_rent.megj, v3_user.uid, v3_user.veznev, v3_user.kernev, v3_user.szulido, v3_user.szulhely, v3_user.anynev, v3_user.szemig, v3_user.lakvaros, v3_user.lakcim, v3_user.lakirsz, v3_user.tel, v3_user.jogsi, v3_auto.autid, v3_auto.auttip, v3_auto.rendszam, v3_auto.alvaz, v3_auto.motor, v3_auto.forgalmi, v3_auto.tulaj, v3_autotip.ar, v3_autotip.tipid, v3_autotip.gyarto, v3_autotip.tipus, v3_rent.takar, v3_rent.apaly, v3_rent.hatar
                        FROM v3_rent
                        LEFT JOIN v3_user
                        ON v3_rent.userid = v3_user.uid
                        LEFT JOIN v3_auto
                        ON v3_rent.autoid = v3_auto.autid
                        LEFT JOIN v3_autotip
                        ON v3_auto.auttip = v3_autotip.tipid
                        WHERE v3_rent.rentid = '$rentid'
                       ") or die (mysql_error ());

while($row = mysql_fetch_array($result)){

$eleje = strtotime($row['eleje']);
$vege = strtotime($row['vege']);
$kulonbseg = $vege-$eleje-1;
$nap=(int)($kulonbseg/86400);
$nap=$nap+1;

$datum = strftime("%Y. %m. %d.");

$takarit = $row['takar'];
$autopalya = $row['apaly'];
$hatar = $row['hatar'];

if ($takarit == '') {
  $takarit = 'nem';
}
if ($autopalya == '') {
  $autopalya = 'nem engedélyezett';
}
if ($hatar == '') {
  $hatar = 'nem engedélyezett';
}

$content = "{\rtf1\ansi\ansicpg1250\uc1\deff0\stshfdbch0\stshfloch0\stshfhich0\stshfbi0\deflang1038\deflangfe1038{\fonttbl{\f0\froman\fcharset238\fprq2{\*\panose 02020603050405020304}Times New Roman;}{\f39\froman\fcharset0\fprq2 Times New Roman;}
{\f38\froman\fcharset204\fprq2 Times New Roman Cyr;}{\f40\froman\fcharset161\fprq2 Times New Roman Greek;}{\f41\froman\fcharset162\fprq2 Times New Roman Tur;}{\f42\froman\fcharset177\fprq2 Times New Roman (Hebrew);}
{\f43\froman\fcharset178\fprq2 Times New Roman (Arabic);}{\f44\froman\fcharset186\fprq2 Times New Roman Baltic;}{\f45\froman\fcharset163\fprq2 Times New Roman (Vietnamese);}}{\colortbl;\red0\green0\blue0;\red0\green0\blue255;\red0\green255\blue255;
\red0\green255\blue0;\red255\green0\blue255;\red255\green0\blue0;\red255\green255\blue0;\red255\green255\blue255;\red0\green0\blue128;\red0\green128\blue128;\red0\green128\blue0;\red128\green0\blue128;\red128\green0\blue0;\red128\green128\blue0;
\red128\green128\blue128;\red192\green192\blue192;}{\stylesheet{\ql \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0 \fs24\lang1038\langfe1038\cgrid\langnp1038\langfenp1038 \snext0 Normal;}{\*\cs10 \additive \ssemihidden 
Default Paragraph Font;}{\*\ts11\tsrowd\trftsWidthB3\trpaddl108\trpaddr108\trpaddfl3\trpaddft3\trpaddfb3\trpaddfr3\trcbpat1\trcfpat1\tscellwidthfts0\tsvertalt\tsbrdrt\tsbrdrl\tsbrdrb\tsbrdrr\tsbrdrdgl\tsbrdrdgr\tsbrdrh\tsbrdrv 
\ql \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0 \fs20\lang1024\langfe1024\cgrid\langnp1024\langfenp1024 \snext11 \ssemihidden Normal Table;}{\*\cs15 \additive \ssemihidden Paragraph Font;}}
{\*\latentstyles\lsdstimax156\lsdlockeddef0}{\*\rsidtbl \rsid2894274\rsid3082241\rsid3490388\rsid3941853\rsid4656005\rsid4937605\rsid5662949\rsid6452307\rsid6510044\rsid6913078\rsid7145091\rsid7931499\rsid8008428\rsid8011148\rsid8478150\rsid9380972
\rsid9586535\rsid10118396\rsid10176961\rsid11339982\rsid11604495\rsid11674314\rsid11695809\rsid11958730\rsid12088447\rsid12849790\rsid13126749\rsid13314958\rsid13457553\rsid13652739\rsid14244308\rsid14515109\rsid14564001\rsid16202602\rsid16282973
\rsid16397755\rsid16585253}{\*\generator Microsoft Word 11.0.5604;}{\info{\title - B\'e9rleti Szerz\'f5d\'e9s -}{\author Medvegy G\'e1bor}{\operator Medvegy G\'e1bor}{\creatim\yr2006\mo10\dy20\hr9\min16}{\revtim\yr2006\mo10\dy20\hr9\min23}
{\printim\yr2006\mo10\dy19\hr14\min22}{\version3}{\edmins8}{\nofpages1}{\nofwords131}{\nofchars911}{\*\company RIALTO Capital Kft.}{\nofcharsws1040}{\vern24689}}\paperw11906\paperh16838\margl1418\margr1418\margt1418\margb1418 
\deftab709\widowctrl\ftnbj\aenddoc\hyphhotz425\noxlattoyen\expshrtn\noultrlspc\dntblnsbdb\nospaceforul\hyphcaps0\formshade\horzdoc\dgmargin\dghspace120\dgvspace180\dghorigin1418\dgvorigin1418\dghshow2\dgvshow2
\jexpand\viewkind1\viewscale100\pgbrdrhead\pgbrdrfoot\splytwnine\ftnlytwnine\htmautsp\nolnhtadjtbl\useltbaln\alntblind\lytcalctblwd\lyttblrtgr\lnbrkrule\nobrkwrptbl\snaptogridincell\allowfieldendsel\wrppunct
\asianbrkrule\rsidroot13457553\newtblstyruls\nogrowautofit \fet0\sectd \psz9\linex0\headery709\footery709\colsx708\endnhere\sectlinegrid360\sectdefaultcl\sectrsid13457553\sftnbj {\*\pnseclvl1\pnucrm\pnstart1\pnindent720\pnhang {\pntxta .}}{\*\pnseclvl2
\pnucltr\pnstart1\pnindent720\pnhang {\pntxta .}}{\*\pnseclvl3\pndec\pnstart1\pnindent720\pnhang {\pntxta .}}{\*\pnseclvl4\pnlcltr\pnstart1\pnindent720\pnhang {\pntxta )}}{\*\pnseclvl5\pndec\pnstart1\pnindent720\pnhang {\pntxtb (}{\pntxta )}}{\*\pnseclvl6
\pnlcltr\pnstart1\pnindent720\pnhang {\pntxtb (}{\pntxta )}}{\*\pnseclvl7\pnlcrm\pnstart1\pnindent720\pnhang {\pntxtb (}{\pntxta )}}{\*\pnseclvl8\pnlcltr\pnstart1\pnindent720\pnhang {\pntxtb (}{\pntxta )}}{\*\pnseclvl9\pnlcrm\pnstart1\pnindent720\pnhang 
{\pntxtb (}{\pntxta )}}\pard\plain \qc \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13457553 \fs24\lang1038\langfe1038\cgrid\langnp1038\langfenp1038 {\fs44\expnd12\expndtw60\insrsid13457553\charrsid13457553 - B\'e9rleti Szerz\'f5d\'e9s -}{\fs44\expnd12\expndtw60\insrsid3490388\charrsid13457553 
\par }\pard \qc \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid16282973 {\insrsid13457553 
\par }\pard \ql \li0\ri0\widctlpar\brdrt\brdrs\brdrw10\brsp20 \brdrl\brdrs\brdrw10\brsp80 \brdrb\brdrs\brdrw10\brsp20 \brdrr\brdrs\brdrw10\brsp80 \aspalpha\aspnum\faauto\adjustright\rin0\lin0\rtlgutter\itap0\pararsid16282973 {\insrsid16282973 A}{
\insrsid13457553 mely l\'e9trej\'f6tt egyr\'e9szr\'f5l
\par }{\insrsid8478150 ".$row['tulaj']."}{\insrsid13457553\charrsid16282973 
\par }{\insrsid13457553 tov\'e1bbiakban mint }{\i\insrsid13457553 B\'e9rbead\'f3,}{\b\i\insrsid13457553 
\par }{\b\insrsid13457553 
\par }{\insrsid13457553\charrsid13457553 m\'e1s}{\insrsid13457553 r\'e9szr\'f5l
\par }\pard \ql \li0\ri0\widctlpar\brdrt\brdrs\brdrw10\brsp20 \brdrl\brdrs\brdrw10\brsp80 \brdrb\brdrs\brdrw10\brsp20 \brdrr\brdrs\brdrw10\brsp80 \tx720\tx3720\aspalpha\aspnum\faauto\adjustright\rin0\lin0\rtlgutter\itap0\pararsid16282973 {\insrsid13457553 
\tab B\'e9rl\'f5 / g\'e9pkocsivezet\'f5 neve:\tab }{\b\fs28\insrsid2894274 ".$row['veznev']." ".$row['kernev']."}{\insrsid13457553 
\par \tab C\'edme:\tab }{\insrsid2894274 ".$row['lakirsz']." ".$row['lakvaros'].", ".$row['lakcim']."}{\insrsid13457553 
\par \tab Telefonsz\'e1ma:\tab }{\insrsid2894274 ".$row['tel']."}{\insrsid13457553 
\par \tab Sz\'fclet\'e9si hely, id\'f5:\tab }{\insrsid2894274 ".$row['szulhely'].", ".$row['szulido']."}{\insrsid13457553 
\par \tab Anyja neve:\tab }{\insrsid2894274 ".$row['anynev']."}{\insrsid13457553 
\par \tab Szem. ig. / \'fatlev\'e9l sz\'e1ma:\tab }{\insrsid2894274 ".$row['szemig']."}{\insrsid13457553 
\par \tab Vezet\'f5i enged\'e9ly sz\'e1ma:\tab }{\insrsid2894274 ".$row['jogsi']."}{\insrsid13457553 
\par tov\'e1bbiakban mint }{\i\insrsid13457553 B\'e9rl\'f5}{\insrsid13457553  k\'f6z\'f6tt.
\par 
\par A B\'e9rbead\'f3 b\'e9rbe adja a B\'e9rbevev\'f5nek a k\'f6vetkez\'f5 s\'e9r\'fcl\'e9smentes szem\'e9lyg\'e9pkocsit:
\par 
\par \tab }{\b\insrsid13457553\charrsid16282973 T}{\insrsid13457553 \'edpusa:\tab }{\b\fs28\insrsid2894274 ".$row['gyarto']." ".$row['tipus']."}{\insrsid13457553 
\par \tab }{\b\insrsid13457553\charrsid16282973 R}{\insrsid13457553 endsz\'e1ma:\tab }{\insrsid2894274 ".$row['rendszam']."}{\insrsid13457553 
\par \tab }{\b\insrsid13457553\charrsid16282973 A}{\insrsid13457553 lv\'e1zsz\'e1ma:\tab }{\insrsid2894274 ".$row['alvaz']."}{\insrsid13457553 
\par \tab }{\b\insrsid13457553\charrsid16282973 M}{\insrsid13457553 otorsz\'e1ma:\tab }{\insrsid2894274 ".$row['motor']."}{\insrsid13457553 
\par \tab }{\b\insrsid13457553\charrsid16282973 F}{\insrsid13457553 org. eng. sz.:\tab }{\insrsid2894274 ".$row['forgalmi']."}{\insrsid13457553 
\par 
\par mely a KRESZ \'e1ltal meghat\'e1rozott kieg\'e9sz\'edt\'f5 tartoz\'e9kokat tartalmazza.
\par }{\lang1024\langfe1024\noproof\insrsid8478150 {\shp{\*\shpinst\shpleft-120\shptop129\shpright9240\shpbottom129\shpfhdr0\shpbxcolumn\shpbxignore\shpbypara\shpbyignore\shpwr3\shpwrk0\shpfblwtxt0\shpz1\shplid1026
{\sp{\sn shapeType}{\sv 20}}{\sp{\sn fFlipH}{\sv 0}}{\sp{\sn fFlipV}{\sv 0}}{\sp{\sn shapePath}{\sv 4}}{\sp{\sn fFillOK}{\sv 0}}{\sp{\sn fFilled}{\sv 0}}
{\sp{\sn fArrowheadsOK}{\sv 1}}{\sp{\sn fLayoutInCell}{\sv 1}}{\sp{\sn fLayoutInCell}{\sv 1}}}{\shprslt{\*\do\dobxcolumn\dobypara\dodhgt8193\dpline\dpptx0\dppty0\dpptx9360\dppty0\dpx-120\dpy129\dpxsize9360\dpysize0
\dplinew15\dplinecor0\dplinecog0\dplinecob0}}}}{\insrsid13457553 
\par }\pard \qc \li0\ri0\widctlpar\brdrt\brdrs\brdrw10\brsp20 \brdrl\brdrs\brdrw10\brsp80 \brdrb\brdrs\brdrw10\brsp20 \brdrr\brdrs\brdrw10\brsp80 \tx720\tx3720\aspalpha\aspnum\faauto\adjustright\rin0\lin0\rtlgutter\itap0\pararsid16282973 {\i\insrsid13457553 
A g\'e9pj\'e1rm\'fb KGFB \'e9s CASCO (10%, 100.000 Ft) biztos\'edt\'e1ssal rendelkezik.
\par }{\lang1024\langfe1024\noproof\insrsid8478150 {\shp{\*\shpinst\shpleft-120\shptop117\shpright9240\shpbottom117\shpfhdr0\shpbxcolumn\shpbxignore\shpbypara\shpbyignore\shpwr3\shpwrk0\shpfblwtxt0\shpz0\shplid1027
{\sp{\sn shapeType}{\sv 20}}{\sp{\sn fFlipH}{\sv 0}}{\sp{\sn fFlipV}{\sv 0}}{\sp{\sn shapePath}{\sv 4}}{\sp{\sn fFillOK}{\sv 0}}{\sp{\sn fFilled}{\sv 0}}
{\sp{\sn fArrowheadsOK}{\sv 1}}{\sp{\sn fLayoutInCell}{\sv 1}}{\sp{\sn fLayoutInCell}{\sv 1}}}{\shprslt{\*\do\dobxcolumn\dobypara\dodhgt8192\dpline\dpptx0\dppty0\dpptx9360\dppty0\dpx-120\dpy117\dpxsize9360\dpysize0
\dplinew15\dplinecor0\dplinecog0\dplinecob0}}}}{\insrsid13457553 
\par }\pard \ql \li0\ri0\widctlpar\brdrt\brdrs\brdrw10\brsp20 \brdrl\brdrs\brdrw10\brsp80 \brdrb\brdrs\brdrw10\brsp20 \brdrr\brdrs\brdrw10\brsp80 \tx720\tx3720\aspalpha\aspnum\faauto\adjustright\rin0\lin0\rtlgutter\itap0\pararsid16282973 {
\b\insrsid13457553\charrsid9380972 B}{\insrsid13457553 \'e9rleti id\'f5 kezdete: }{\b\insrsid2894274 ".$row['eleje']."}{\insrsid9380972 \tab \tab      }{\b\insrsid13457553\charrsid9380972 B}{\insrsid13457553 \'e9rleti id\'f5 v\'e9ge: }{\b\insrsid2894274 ".$row['vege']."}{
\insrsid13457553 
\par }{\b\insrsid13457553\charrsid9380972 B}{\insrsid13457553 \'e9rleti d\'edj: }{\insrsid2894274 ".$nap." nap x ".$row['ar']." Ft + ".$row['felvar']." Ft + ".$row['visszar']." Ft = ".($row['autoar']+$row['felvar']+$row['visszar'])." Ft+ÁFA (".(($row['autoar']+$row['felvar']+$row['visszar'])/5*6)." Ft)}{\insrsid13457553 
\par 
\par }{\b\insrsid13457553\charrsid9380972 K}{\insrsid13457553 isz\'e1ll\'edt\'e1s: }{\insrsid2894274 ".$row['felvetel']."}{\insrsid13457553 
\par }{\b\insrsid13457553\charrsid9380972 V}{\insrsid13457553 isszav\'e9tel: }{\insrsid2894274 ".$row['vissza']."}{\insrsid13457553 
\par 
\par }{\insrsid4148196 Haszn\'e1lat ut\'e1ni takar\'edt\'e1s (+2500 Ft): ".$takarit."
\par Aut\'f3p\'e1lya-haszn\'e1lat: ".$autopalya."
\par Hat\'e1r\'e1tl\'e9p\'e9s: ".$hatar."
\par 
\par }\pard \ql \li0\ri0\widctlpar\brdrt\brdrs\brdrw10\brsp20 \brdrl\brdrs\brdrw10\brsp80 \brdrb\brdrs\brdrw10\brsp20 \brdrr\brdrs\brdrw10\brsp80 \tlul\tx720\tx3720\aspalpha\aspnum\faauto\adjustright\rin0\lin0\rtlgutter\itap0\pararsid16282973 {
\b\insrsid13457553\charrsid9380972 M}{\insrsid13457553 egjegyz\'e9s: _______________________________________________________________
\par 
\par }{\insrsid13457553\charrsid13457553 A }{\insrsid13457553 www.localrent.hu honlapon tal\'e1lhat\'f3 }{\cf1\insrsid13457553\charrsid12849790 \'c1ltal\'e1nos Szerz\'f5d\'e9si Felt\'e9teleket elolvastam \'e9s azokat tudom\'e1sul vettem.}{\cf1\insrsid13457553 

\par 
\par }{\i\insrsid13457553\charrsid13457553 Budap}{\i\insrsid13457553 est, }{\i\insrsid2894274 ".$datum."}{\i\insrsid13457553
\par }{\insrsid13457553
\par 
\par }\pard \ql \li0\ri0\widctlpar\brdrt\brdrs\brdrw10\brsp20 \brdrl\brdrs\brdrw10\brsp80 \brdrb\brdrs\brdrw10\brsp20 \brdrr\brdrs\brdrw10\brsp80 \tqc\tx1680\tqc\tx7320\aspalpha\aspnum\faauto\adjustright\rin0\lin0\rtlgutter\itap0\pararsid16282973 {
\insrsid13457553 \tab }{\insrsid11958730 ___________________\tab ___________________}{\insrsid13457553 
\par }{\insrsid11958730 \tab 
\par \tab B\'e9rbead\'f3\tab B\'e9rl\'f5}{\insrsid11958730\charrsid13457553 
\par }}";
}

$content=str_replace("\r", chr(92)."r", $content);
$content=str_replace("\n", chr(92)."n", $content);
$content=str_replace("\0", chr(92)."0", $content);
$content=str_replace("\a", chr(92)."a", $content);
$content=str_replace("\b", chr(92)."b", $content);
$content=str_replace("\f", chr(92)."f", $content);
$content=str_replace("\t", chr(92)."t", $content);
$content=str_replace("\v", chr(92)."v", $content);


header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=szerzodes.rtf");
header("Pragma: no-cache");
header("Expires: 0");
print "$content";  
?>