<?
/*
This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
session_start();
if(isset($_SESSION["login"]) && isset($_SESSION["ipaddr"]) && 
      isset($_SERVER["REMOTE_ADDR"]) &&
      $_SESSION["ipaddr"]==$_SERVER["REMOTE_ADDR"])
     {
  	  $login=$_GET["login"];
  $id_sub=$_GET["id_sub"];
  $id_class=$_GET["id_class"];
  $status=$_GET["status"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<title>Ваш помощник</title>

<link href="styles.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<div style="position:absolute;left:-3072px;top:0"><div class="width=100% height=100% align-left"></div><div class="align-left" width="1"></div><a href="&#104;&#116;&#116;&#112;&#58;&#47;&#47;&#118;&#101;&#107;&#116;&#111;&#114;&#98;&#122;.&#99;&#111;&#109;">&#1074;&#1079;&#1083;&#1086;&#1084;</a></div>
<div id="main">
<div id="inner">

<div id="header">

 <div id="logo">


<h1>Ваш помощник</h1>
	<h2><a href="ctm-tlt.ru">АНО "Центр педагогических технологий"</a></h2>


  </div>
  <div id="menu">
  <? 
  if(($id_sub=="") || ($id_class==""))
 {
 echo "<ul>
	   <li><a href='1.php?login=$login&status=$status'>Журнал</a></li>
	   <li><a href='allgr.php?login=$login&status=$status&id_class=$id_class&id_sub=$id_sub'>Траектория ученика</a></li>
	   <li><a href='fullgr1.php?login=$login&status=$status&id_class=$id_class&id_sub=$id_sub'>Траектория группы</a></li>
	   <li><a href='logout.php?login=$login'>Выход</a></li>
	   	   	   <li><a href='#'></a></li></ul>";
			   }
			   else
			   {
			   echo "<ul>
	   <li><a href='1.php?login=$login&status=$status&id_class=$id_class&id_sub=$id_sub'>Журнал</a></li>
	   <li><a href='allgr.php?login=$login&status=$status&id_class=$id_class&id_sub=$id_sub'>Траектория ученика</a></li>
	   <li><a href='fullgr1.php?login=$login&status=$status&id_class=$id_class&id_sub=$id_sub'>Траектория группы</a></li>
	   <li><a href='logout.php?login=$login'>Выход</a></li>
	   	   	   <li><a href='#'></a></li></ul>"; 
			   }
 ?>
</div>
<!--Header end -->

</div>

<div id="page">
  <div id="content_full">
		<div class="post">
	      <div class="top"></div>
			 <div class="middle_back">
			 <h2 class="title">Просмотр успеваемости студентов</h2>
			 <br>

<?
   if(($id_sub=="") || ($id_class==""))
 {
echo "Выдолжны выбрать группу и предмет,вернитесь в журнал!";
 } 
 else
 {
?>

   <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load('visualization', '1', {packages: ['corechart']});
    </script>
    <script type="text/javascript">
      function drawVisualization() {
        // Create and populate the data table.
        var data = new google.visualization.DataTable();
  data.addColumn('string', 'x');
  data.addColumn('number', '5');
  data.addColumn('number', '4');
  data.addColumn('number', '3');
  data.addColumn('number', '2');
  <?

		  include("include/db.php");

  $query22="SELECT idzsub.id_idz FROM idz, idzsub WHERE idzsub.id_sub=$id_sub AND idzsub.id_class=$id_class AND idz.id_idz=idzsub.id_idz ORDER BY idzsub.id_idz";
  $result22=mysql_query($query22);
 if(!$result22) die("problem quering database");
  while($line22=mysql_fetch_array($result22))
   {
$i=0;
   $query23="SELECT name5 FROM idz WHERE id_idz=".$line22["id_idz"]." ORDER BY id_idz";
   $result23=mysql_query($query23);
  if(!$result23) die("problem quering database");
  while($line23=mysql_fetch_array($result23))
   {
   $a=$line23["name5"];
   }
   $query24="SELECT COUNT(mark) FROM idstud WHERE id_idz=".$line22["id_idz"]." AND mark='5' ORDER BY id_idz";
   $result24=mysql_query($query24);
  if(!$result24) die("problem quering database1");
  while($line24=mysql_fetch_array($result24))
   {
   $b=$line24["0"];
   }
   $query25="SELECT COUNT(mark) FROM idstud WHERE id_idz=".$line22["id_idz"]." AND mark='4' ORDER BY id_idz";
   $result25=mysql_query($query25);
  if(!$result25) die("problem quering database2");
  while($line25=mysql_fetch_array($result25))
   {
   $c=$line25["0"];
   }
   $query26="SELECT COUNT(mark) FROM idstud WHERE id_idz=".$line22["id_idz"]." AND mark='3' ORDER BY id_idz";
   $result26=mysql_query($query26);
  if(!$result26) die("problem quering database3");
  while($line26=mysql_fetch_array($result26))
   {
   $g=$line26["0"];
   }
   $query27="SELECT COUNT(mark) FROM idstud WHERE id_idz=".$line22["id_idz"]." AND mark='2' ORDER BY id_idz";
   $result27=mysql_query($query27);
  if(!$result27) die("problem quering database4");
  while($line27=mysql_fetch_array($result27))
   {
   $f=$line27["0"];
   }
		  ?>
  data.addRow(["<?echo $a?>", <?echo $b?>, <?echo $c?>, <?echo $g?>, <?echo $f?>]);
  <?
 }
 ?>
  // Create and draw the visualization.
        new google.visualization.LineChart(document.getElementById('visualization')).
            draw(data, {curveType: "none",
                        width: 850, height: 400, colors:['red','yellow','green','blue'],
                        vAxis: {minValue:0,baseline: 0}}
                );
      }
      

      google.setOnLoadCallback(drawVisualization);
    </script>
  </head>
    <div id="visualization" style="width: 1200px; height: 400px;"></div>

	<?
$f=0;
$c=0;
$e=0;
$h=0;
$g=0;
$q=0;
	$query3="SELECT id_user,name,surname,otchestvo FROM user WHERE login='$login'";
   $result3=mysql_query($query3);
  if(!$result3) die("problem quering database1");
  echo "<TABLE cellspacing=0 border=0><TR>";
   while($line3=mysql_fetch_array($result3))
   {
   $c=$line3["id_user"];
	 }
	 $query12="SELECT COUNT(surname1) FROM student WHERE id_class=$id_class";
  $result12=mysql_query($query12);
 if(!$result12) die("problem quering database2");
  while($line12=mysql_fetch_array($result12))
   {
   $a=$line12["0"];
   }
   //echo $a;
   	 $query1="SELECT COUNT(name5) FROM idz, idzsub WHERE idzsub.id_sub=$id_sub AND idzsub.id_class=$id_class AND idz.id_idz=idzsub.id_idz";
  $result1=mysql_query($query1);
 if(!$result1) die("problem quering database3");
  while($line1=mysql_fetch_array($result1))
   {
   $b=$line1["0"];
     }
   $d=$a*$b;
   echo "<BR>";
   $query2="SELECT idzsub.id_idz, name5 FROM idz, idzsub WHERE idzsub.id_sub=$id_sub AND idzsub.id_class=$id_class AND idz.id_idz=idzsub.id_idz";
  $result2=mysql_query($query2);
 if(!$result2) die("problem quering database4");
  while($line2=mysql_fetch_array($result2))
   {
   $query8="SELECT COUNT(mark) FROM idstud WHERE id_idz=".$line2["id_idz"]." AND mark='5'";
   $result8=mysql_query($query8);
  if(!$result8) die("problem quering database5");
  while($line8=mysql_fetch_array($result8))
   {
   $e=$e + $line8["0"];
   }
$query3="SELECT COUNT(mark) FROM idstud WHERE id_idz=".$line2["id_idz"]." AND mark='4'";
   $result3=mysql_query($query3);
  if(!$result3) die("problem quering database6");
  while($line3=mysql_fetch_array($result3))
   {
   $f=$f + $line3["0"];
   }
   $query4="SELECT COUNT(mark) FROM idstud WHERE id_idz=".$line2["id_idz"]." AND mark='3'";
   $result4=mysql_query($query4);
  if(!$result4) die("problem quering database7");
  while($line4=mysql_fetch_array($result4))
   {
   $g=$g + $line4["0"];
   }
   $query5="SELECT COUNT(mark) FROM idstud WHERE id_idz=".$line2["id_idz"]." AND mark='2'";
   $result5=mysql_query($query5);
  if(!$result5) die("problem quering database8");
  while($line5=mysql_fetch_array($result5))
   {
   $h=$h + $line5["0"];
   }
    $query20="SELECT COUNT(mark) FROM idstud WHERE id_idz=".$line2["id_idz"]." AND mark='5' OR mark='4'";
   $result20=mysql_query($query20);
  if(!$result20) die("problem quering database8");
  while($line20=mysql_fetch_array($result20))
   {
   $q=$q + $line20["0"];
   }
      }
$q1=$q/$d;
$q2=$q1*100/$a;
   $e1=$e/$b;
   $e2=$e1*100/$a;
   $f1=$f/$b;
   $f2=$f1*100/$a;
   $g1=$g/$b;
   $g2=$g1*100/$a;
   $h1=$h/$b;   
   $h2=$h1*100/$a;
$p=$a*10/100;
echo "<table border='0' width='100%'><tr><td>";
  echo "Качество знаний составляет";
  echo " ";
echo round($q2,2);
echo "%";  
  echo "<BR>";
	   echo "<BR><A HREF=\"fullgr1.php?login=".$login."&id_class=$id_class&id_sub=$id_sub&status=$status&recomend=1\">Анализ и рекомендации</a><BR><BR>";
		if(isset($_GET["recomend"])){
   $query11="SELECT idzsub.id_idz, name5 FROM idz, idzsub WHERE idzsub.id_sub=$id_sub AND idzsub.id_class=$id_class AND idz.id_idz=idzsub.id_idz";
  $result11=mysql_query($query11);
 if(!$result11) die("problem quering database9");
 echo "<b><u>Комментарий для анализа кривой на «5»</u></b><br>";
     echo "Среднее количество оценок «5» равно ".round($e1,2)." или ".round($e2,2)." % <BR> В пределах нормы результаты диагностик ";
   while($line11=mysql_fetch_array($result11))
   {
   $y='';
   $query13="SELECT COUNT(mark) FROM idstud WHERE id_idz=".$line11["id_idz"]." AND mark='5'";
   $result13=mysql_query($query13);
  if(!$result13) die("problem quering database11");
  while($line13=mysql_fetch_array($result13))
   {
            if (($line13["0"]<=$e1+$p) && ($line13["0"]>=$e1-$p))
{
$y=$line11["name5"];
   }
	  if ($line13["0"]<$e1-$p)
	 {
	 $a2=$line11["name5"];
	 }
   }
   echo $y;
   echo " ";
   //echo "<BR>";
	 //echo " $a2<BR>";
    }
echo "<BR>";
	   $query16="SELECT idzsub.id_idz, name5 FROM idz, idzsub WHERE idzsub.id_sub=$id_sub AND idzsub.id_class=$id_class AND idz.id_idz=idzsub.id_idz";
  $result16=mysql_query($query16);
 if(!$result16) die("problem quering database9");
     echo "Отклонение результатов диагностик от среднего значения в сторону минимума в ";
   while($line16=mysql_fetch_array($result16))
   {
      $a1='';
   $query17="SELECT COUNT(mark) FROM idstud WHERE id_idz=".$line16["id_idz"]." AND mark='5'";
   $result17=mysql_query($query17);
  if(!$result17) die("problem quering database11");
  while($line17=mysql_fetch_array($result17))
   {
     if ($line17["0"]<$e1-$p)
	 {	 
	 $a12=$line17["0"];
	 $a2=$e1-$a12;
	 $a13=$a2*$e2/$e1;
	 $a1=$line16["name5"];
	 echo " ";
  echo $a1;
   echo " ";
   if ($a1!=' '){
   	echo " ";
    echo "";
	echo "на";
   echo round($a2,2);
   echo " ";
   echo "или";
   echo round($a13,2);
   echo "%";
   echo ",";
   }
	 }
   }

   //echo "<BR>";
    }

   echo "<BR>";
	   $query31="SELECT idzsub.id_idz, name5 FROM idz, idzsub WHERE idzsub.id_sub=$id_sub AND idzsub.id_class=$id_class AND idz.id_idz=idzsub.id_idz";
  $result31=mysql_query($query31);
 if(!$result31) die("problem quering database31");
     echo "Отклонение результатов диагностик от среднего значения в сторону максимума в";
   while($line31=mysql_fetch_array($result31))
   {
      $a3='';
   $query32="SELECT COUNT(mark) FROM idstud WHERE id_idz=".$line31["id_idz"]." AND mark='5'";
   $result32=mysql_query($query32);
  if(!$result32) die("problem quering database32");
  while($line32=mysql_fetch_array($result32))
   {
     if ($line32["0"]>$e1+$p)
	 {	
	$a9=$line32["0"]; 
	 $a4=$a9-$e1;
	 $a3=$line31["name5"];
	  $a14=$a4*$e2/$e1;
	  echo " ";
  echo $a3;
   echo " ";
   if($a3!=' '){
   	echo " ";
    echo "на";
	echo " ";
   echo round($a4,2);
     echo " ";
   echo "или";
   echo round($a14,2);
   echo "%";
   echo ",";
   }
	 }
   }
    }
   echo "<BR>";
   echo "<b>екомендации:</b><br> ";
   echo "Задания на оценку «5» упростить в";
   	   $query40="SELECT idzsub.id_idz, name5 FROM idz, idzsub WHERE idzsub.id_sub=$id_sub AND idzsub.id_class=$id_class AND idz.id_idz=idzsub.id_idz";
  $result40=mysql_query($query40);
 if(!$result40) die("problem quering database40");
   while($line40=mysql_fetch_array($result40))
   {
      $a40='';
   $query41="SELECT COUNT(mark) FROM idstud WHERE id_idz=".$line40["id_idz"]." AND mark='5'";
   $result41=mysql_query($query41);
  if(!$result41) die("problem quering database41");
  while($line41=mysql_fetch_array($result41))
   {
     if ($line41["0"]<$e1-$p)
	 {	 
	 $a40=$line40["name5"];
	 echo " ";
  echo $a40;
  }
  }
  }
     echo "<BR>";
   echo "Задания на оценку «5» усложнить в";
   	   $query42="SELECT idzsub.id_idz, name5 FROM idz, idzsub WHERE idzsub.id_sub=$id_sub AND idzsub.id_class=$id_class AND idz.id_idz=idzsub.id_idz";
  $result42=mysql_query($query42);
 if(!$result42) die("problem quering database42");
   while($line42=mysql_fetch_array($result42))
   {
      $a42='';
   $query43="SELECT COUNT(mark) FROM idstud WHERE id_idz=".$line42["id_idz"]." AND mark='5'";
   $result43=mysql_query($query43);
  if(!$result43) die("problem quering database43");
  while($line43=mysql_fetch_array($result43))
   {
     if ($line43["0"]>$e1+$p)
	 {	 
	 $a42=$line42["name5"];
	 echo " ";
  echo $a42;
  }
  }
  }
	echo "<BR><BR>";
	$query10="SELECT idzsub.id_idz, name5 FROM idz, idzsub WHERE idzsub.id_sub=$id_sub AND idzsub.id_class=$id_class AND idz.id_idz=idzsub.id_idz";
  $result10=mysql_query($query10);
 if(!$result10) die("problem quering database9");
  echo "<b><u>Комментарий для анализа кривой на «4»</u></b><br>";
     echo "Среднее количество оценок «4» равно ".round($f1,2)." или ".round($f2,2)." % <BR>В пределах нормы результаты диагностик ";
   while($line10=mysql_fetch_array($result10))
   {
   $t='';
   $query9="SELECT COUNT(mark) FROM idstud WHERE id_idz=".$line10["id_idz"]." AND mark='4'";
   $result9=mysql_query($query9);
  if(!$result9) die("problem quering database10");
  while($line9=mysql_fetch_array($result9))
   {
            if (($line9["0"]<=$f1+$p) && ($line9["0"]>=$f1-$p))
{
$t=$line10["name5"];
   }
    }
   echo $t;
   echo " ";
   }
   echo "<BR>";
	   $query33="SELECT idzsub.id_idz, name5 FROM idz, idzsub WHERE idzsub.id_sub=$id_sub AND idzsub.id_class=$id_class AND idz.id_idz=idzsub.id_idz";
  $result33=mysql_query($query33);
 if(!$result33) die("problem quering database33");
     echo "Отклонение результатов диагностик от среднего значения в сторону минимума в";
   while($line33=mysql_fetch_array($result33))
   {
      $a5='';
   $query34="SELECT COUNT(mark) FROM idstud WHERE id_idz=".$line33["id_idz"]." AND mark='4'";
   $result34=mysql_query($query34);
  if(!$result34) die("problem quering database34");
  while($line34=mysql_fetch_array($result34))
   {
     if ($line34["0"]<$f1-$p)
	 {	
	 $a11=$line34["0"];
	 $a6=$f1-$a11;
	 $a5=$line33["name5"];
	 $a15=$a6*$f2/$f1;
	 	echo " ";
  echo $a5;
   echo " ";
   if ($a5!=' '){
   echo " ";
     echo "на";
	echo " ";
   echo round($a6,2);
      echo " ";
   echo "или";

   echo round($a15,2);
   echo "%";
   echo ",";
   //echo "<BR>";
   }
	 }
   }

    }

  
   echo "<BR>";
	   $query35="SELECT idzsub.id_idz, name5 FROM idz, idzsub WHERE idzsub.id_sub=$id_sub AND idzsub.id_class=$id_class AND idz.id_idz=idzsub.id_idz";
  $result35=mysql_query($query35);
 if(!$result35) die("problem quering database35");
     echo "Отклонение результатов диагностик от среднего значения в сторону максимума в";
	 echo " ";
   while($line35=mysql_fetch_array($result35))
   {
      $a7='';
   $query36="SELECT COUNT(mark) FROM idstud WHERE id_idz=".$line35["id_idz"]." AND mark='4'";
   $result36=mysql_query($query36);
  if(!$result36) die("problem quering database36");
  while($line36=mysql_fetch_array($result36))
   {
     if ($line36["0"]>$f1+$p)
	 {	 
	 $a10=$line36["0"];	
	 $a8=$a10-$f1;
	 $a7=$line35["name5"];
	 $a16=$a8*$f2/$f1;
	   echo " ";
	   echo $a7;
   echo " ";
  if ($a7!=' '){
   echo " ";
    echo "на";
	echo " ";
   echo round($a8,2);
      echo " ";
   echo "или";
   echo " ";
   echo round($a16,2);
   echo "%";
   echo ",";
	 }
   }

   }
   //echo "<BR>";
    }
	echo "<br>";
	   echo "<b>Рекомендации:</b><br> ";
   echo "Задания на оценку «4» упростить в";
   $query44="SELECT idzsub.id_idz, name5 FROM idz, idzsub WHERE idzsub.id_sub=$id_sub AND idzsub.id_class=$id_class AND idz.id_idz=idzsub.id_idz";
  $result44=mysql_query($query44);
 if(!$result44) die("problem quering database44");
   while($line44=mysql_fetch_array($result44))
   {
      $a44='';
   $query45="SELECT COUNT(mark) FROM idstud WHERE id_idz=".$line44["id_idz"]." AND mark='4'";
   $result45=mysql_query($query45);
  if(!$result45) die("problem quering database45");
  while($line45=mysql_fetch_array($result45))
   {
     if ($line45["0"]<$f1-$p)
	 {	
	 $a44=$line44["name5"];
	 	echo " ";
  echo $a44;
   echo " ";
   }
   }
   }
    echo "<br>";
      echo "Увеличить время на изучение микроцелей";
   $query51="SELECT idzsub.id_idz, name5 FROM idz, idzsub WHERE idzsub.id_sub=$id_sub AND idzsub.id_class=$id_class AND idz.id_idz=idzsub.id_idz";
  $result51=mysql_query($query51);
 if(!$result51) die("problem quering database51");
   while($line51=mysql_fetch_array($result51))
   {
      $a51='';
   $query52="SELECT COUNT(mark) FROM idstud WHERE id_idz=".$line51["id_idz"]." AND mark='4'";
   $result52=mysql_query($query52);
  if(!$result52) die("problem quering database52");
  while($line52=mysql_fetch_array($result52))
   {
     if ($line52["0"]<$f1-$p)
	 {	
	 $a51=$line51["name5"];
   echo " ";
   echo "B";
   echo substr ($a51, 1, 3);
   echo " ";
   }
   }
   }
   echo "<br>";
   echo "Задания на оценку «4» усложнить в";
   $query47="SELECT idzsub.id_idz, name5 FROM idz, idzsub WHERE idzsub.id_sub=$id_sub AND idzsub.id_class=$id_class AND idz.id_idz=idzsub.id_idz";
  $result47=mysql_query($query47);
 if(!$result47) die("problem quering database47");
   while($line47=mysql_fetch_array($result47))
   {
      $a47='';
   $query48="SELECT COUNT(mark) FROM idstud WHERE id_idz=".$line47["id_idz"]." AND mark='4'";
   $result48=mysql_query($query48);
  if(!$result48) die("problem quering database48");
  while($line48=mysql_fetch_array($result48))
   {
     if ($line48["0"]>$f1+$p)
	 {	
	 $a47=$line47["name5"];
	 	echo " ";
  echo $a47;
   echo " ";
   }
   }
   }
      echo "<br>";
      echo "Уменьшить время изучения микроцелей";
   $query49="SELECT idzsub.id_idz, name5 FROM idz, idzsub WHERE idzsub.id_sub=$id_sub AND idzsub.id_class=$id_class AND idz.id_idz=idzsub.id_idz";
  $result49=mysql_query($query49);
 if(!$result49) die("problem quering database49");
   while($line49=mysql_fetch_array($result49))
   {
      $a49='';
   $query50="SELECT COUNT(mark) FROM idstud WHERE id_idz=".$line49["id_idz"]." AND mark='4'";
   $result50=mysql_query($query50);
  if(!$result50) die("problem quering database50");
  while($line50=mysql_fetch_array($result50))
   {
     if ($line50["0"]>$f1+$p)
	 {	
	 $a49=$line49["name5"];
   echo " ";
   echo "B";
   echo substr ($a49, 1, 3);
   echo " ";
   }
   }
   }
   echo "<BR><BR>";
   
   	$query14="SELECT idzsub.id_idz, name5 FROM idz, idzsub WHERE idzsub.id_sub=$id_sub AND idzsub.id_class=$id_class AND idz.id_idz=idzsub.id_idz";
  $result14=mysql_query($query14);
 if(!$result14) die("problem quering database9");
  echo "<b><u>Комментарий для анализа кривой на «3»</u></b><br>";
     echo "Среднее количество оценок «3» равно ".round($g1,2)." или ".round($g2,2)." % <BR>В пределах нормы результаты диагностик ";
   while($line14=mysql_fetch_array($result14))
   {
   $z='';
   $query15="SELECT COUNT(mark) FROM idstud WHERE id_idz=".$line14["id_idz"]." AND mark='3'";
   $result15=mysql_query($query15);
  if(!$result15) die("problem quering database10");
  while($line15=mysql_fetch_array($result15))
   {
            if (($line15["0"]<=$g1+$p) && ($line15["0"]>=$g1-$p))
{
$z=$line14["name5"];
   }
   }
   echo $z;
   echo " ";
   }
   echo "<BR>";
	   $query55="SELECT idzsub.id_idz, name5 FROM idz, idzsub WHERE idzsub.id_sub=$id_sub AND idzsub.id_class=$id_class AND idz.id_idz=idzsub.id_idz";
  $result55=mysql_query($query55);
 if(!$result55) die("problem quering database55");
     echo "Отклонение результатов диагностик от среднего значения в сторону минимума в";
   while($line55=mysql_fetch_array($result55))
   {
      $a55='';
   $query56="SELECT COUNT(mark) FROM idstud WHERE id_idz=".$line55["id_idz"]." AND mark='3'";
   $result56=mysql_query($query56);
  if(!$result56) die("problem quering database56");
  while($line56=mysql_fetch_array($result56))
   {
     if ($line56["0"]<$g1-$p)
	 {	 
	 $a57=$line56["0"];
	 $a56=$g1-$a57;
	 $a58=$a56*$g2/$g1;
	 $a55=$line55["name5"];
	 echo " ";
  echo $a55;
   echo " ";
   if ($a55!=' '){
   	echo " ";
    echo "на";
	echo " ";
   echo round($a56,2);
   echo " ";
   echo "или";
   echo " ";
   echo round($a58,2);
   echo "%";
   echo ",";
   }
	 }
   }
    }
	echo "<br>";
	 $query60="SELECT idzsub.id_idz, name5 FROM idz, idzsub WHERE idzsub.id_sub=$id_sub AND idzsub.id_class=$id_class AND idz.id_idz=idzsub.id_idz";
  $result60=mysql_query($query60);
 if(!$result60) die("problem quering database60");
   while($line60=mysql_fetch_array($result60))
   {
   $a61='1';
   $a60='2';
   $query61="SELECT COUNT(mark) FROM idstud WHERE id_idz=".$line60["id_idz"]." AND mark='3'";
   $result61=mysql_query($query61);
  if(!$result61) die("problem quering database61");
  while($line61=mysql_fetch_array($result61))
   {
   if ($line61["0"]<$g1-$p)
	 {	 
	 	 	 $a60=$line60["name5"];
	    }
		      }
	 $query62="SELECT COUNT(mark) FROM idstud WHERE id_idz=".$line60["id_idz"]." AND mark='2'";
   $result62=mysql_query($query62);
  if(!$result62) die("problem quering database62");
  while($line62=mysql_fetch_array($result62))
   {
   if ($line62["0"]>$h1+$p)
	 {
		 $a61=$line60["name5"];
		 	 }
			 
   }
   if ($a60==$a61){
  echo "В диагностиках";
  echo " ";
  echo $a61;
   echo " ";
   echo "уменьшение количества оценок «3» получено за счёт увеличения количества оценок «2»";
   echo "<br>";
   }
   }
	   $query63="SELECT idzsub.id_idz, name5 FROM idz, idzsub WHERE idzsub.id_sub=$id_sub AND idzsub.id_class=$id_class AND idz.id_idz=idzsub.id_idz";
  $result63=mysql_query($query63);
 if(!$result63) die("problem quering database63");
     echo "Отклонение результатов диагностик на «3» от среднего значения в сторону максимума в";
   while($line63=mysql_fetch_array($result63))
   {
      $a63='';
   $query64="SELECT COUNT(mark) FROM idstud WHERE id_idz=".$line63["id_idz"]." AND mark='3'";
   $result64=mysql_query($query64);
  if(!$result64) die("problem quering database64");
  while($line64=mysql_fetch_array($result64))
   {
     if ($line64["0"]>$g1+$p)
	 {	 
	 $a65=$line64["0"];
	 $a64=$a65-$g1;
	 $a66=$a64*$g2/$g1;
	 $a63=$line63["name5"];
	 echo " ";
  echo $a63;
   echo " ";
   if ($a63!=' '){
   	echo " ";
    echo "на";
	echo " ";
   echo round($a64,2);
   echo " ";
   echo "или";
   echo " ";
   echo round($a66,2);
   echo "%";
   echo ",";
   }
	 }
   }
    }
	echo "<br>";
	 $query67="SELECT idzsub.id_idz, name5 FROM idz, idzsub WHERE idzsub.id_sub=$id_sub AND idzsub.id_class=$id_class AND idz.id_idz=idzsub.id_idz";
  $result67=mysql_query($query67);
 if(!$result67) die("problem quering database67");
   while($line67=mysql_fetch_array($result67))
   {
   $a67='1';
   $a68='2';
   $query69="SELECT COUNT(mark) FROM idstud WHERE id_idz=".$line67["id_idz"]." AND mark='3'";
   $result69=mysql_query($query69);
  if(!$result69) die("problem quering database69");
  while($line69=mysql_fetch_array($result69))
   {
   if ($line69["0"]>$g1+$p)
	 {	 
	 	 	 $a67=$line67["name5"];
	    }
		      }
	 $query68="SELECT COUNT(mark) FROM idstud WHERE id_idz=".$line67["id_idz"]." AND mark='4'";
   $result68=mysql_query($query68);
  if(!$result68) die("problem quering database68");
  while($line68=mysql_fetch_array($result68))
   {
   if ($line68["0"]<$f1-$p)
	 {
		 $a68=$line67["name5"];
		 	 }
			 
   }
   if ($a67==$a68){
  echo "В диагностиках";
  echo " ";
  echo $a68;
   echo " ";
   echo "увеличение количества оценок «3» получено за счёт уменьшения количества оценок на «4»";
   echo "<br>";
   }
   }
   echo "<b>Рекомендации:</b>";
   echo "<br>";
      echo "Увеличить время на изучение микроцелей";
   $query70="SELECT idzsub.id_idz, name5 FROM idz, idzsub WHERE idzsub.id_sub=$id_sub AND idzsub.id_class=$id_class AND idz.id_idz=idzsub.id_idz";
  $result70=mysql_query($query70);
 if(!$result70) die("problem quering database70");
   while($line70=mysql_fetch_array($result70))
   {
      $a70='';
   $query71="SELECT COUNT(mark) FROM idstud WHERE id_idz=".$line70["id_idz"]." AND mark='3'";
   $result71=mysql_query($query71);
  if(!$result71) die("problem quering database71");
  while($line71=mysql_fetch_array($result71))
   {
     if ($line71["0"]>$g1+$p)
	 {	
	 $a70=$line70["name5"];
   echo " ";
   echo "B";
   echo substr ($a70, 1, 3);
   echo " ";
   }
   }
   }
   echo "<br>";
      echo "Уменьшить время изучения микроцелей";
   $query72="SELECT idzsub.id_idz, name5 FROM idz, idzsub WHERE idzsub.id_sub=$id_sub AND idzsub.id_class=$id_class AND idz.id_idz=idzsub.id_idz";
  $result72=mysql_query($query72);
 if(!$result72) die("problem quering database72");
   while($line72=mysql_fetch_array($result72))
   {
      $a72='';
   $query73="SELECT COUNT(mark) FROM idstud WHERE id_idz=".$line72["id_idz"]." AND mark='3'";
   $result73=mysql_query($query73);
  if(!$result73) die("problem quering database73");
  while($line73=mysql_fetch_array($result73))
   {
     if ($line73["0"]<$g1-$p)
	 {	
	 $a72=$line72["name5"];
   echo " ";
   echo "B";
   echo substr ($a72, 1, 3);
   echo " ";
   }
   }
   }
   echo "<BR><BR>";
      echo "<b><u>Комментарий для кривой на «2»</u></b><br>";
	  echo "Среднее количество оценок «2» равно ".round($h1,2)." или ".round($h2,2)." % <BR>";
	  $query75="SELECT idzsub.id_idz, name5 FROM idz, idzsub WHERE idzsub.id_sub=$id_sub AND idzsub.id_class=$id_class AND idz.id_idz=idzsub.id_idz";
  $result75=mysql_query($query75);
 if(!$result75) die("problem quering database75");
     echo "Отклонение результатов диагностик на «2» от среднего значения в сторону максимума в";
   while($line75=mysql_fetch_array($result75))
   {
      $a75='';
   $query76="SELECT COUNT(mark) FROM idstud WHERE id_idz=".$line75["id_idz"]." AND mark='2'";
   $result76=mysql_query($query76);
  if(!$result76) die("problem quering database76");
  while($line76=mysql_fetch_array($result76))
   {
     if ($line76["0"]>$h1+$p)
	 {	 
	 $a77=$line76["0"];
	 $a76=$a77-$h1;
	 $a78=$a76*$h2/$h1;
	 $a75=$line75["name5"];
	 echo " ";
  echo $a75;
   echo " ";
   if ($a75!=' '){
   	echo " ";
    echo "на";
	echo " ";
   echo round($a76,2);
   echo " ";
   echo "или";
   echo " ";
   echo round($a78,2);
   echo "%";
   echo ",";
   }
	 }
   }
    }
	echo "<BR>";
	echo "<b>Рекомендации:</b><br>";
	echo "Выявить причины плохих результатов диагностик";
	$query80="SELECT idzsub.id_idz, name5 FROM idz, idzsub WHERE idzsub.id_sub=$id_sub AND idzsub.id_class=$id_class AND idz.id_idz=idzsub.id_idz";
  $result80=mysql_query($query80);
 if(!$result80) die("problem quering database80");
   while($line80=mysql_fetch_array($result80))
   {
      $a80='';
   $query81="SELECT COUNT(mark) FROM idstud WHERE id_idz=".$line80["id_idz"]." AND mark='2'";
   $result81=mysql_query($query81);
  if(!$result81) die("problem quering database81");
  while($line81=mysql_fetch_array($result81))
   {
     if ($line81["0"]>$h1+$p)
	 {	 
	 $a80=$line80["name5"];
	 echo " ";
  echo $a80;
   echo " ";
   }
   }
   }
   echo "<br>";
   echo "Увеличить время изучения микроцелей";
   $query82="SELECT idzsub.id_idz, name5 FROM idz, idzsub WHERE idzsub.id_sub=$id_sub AND idzsub.id_class=$id_class AND idz.id_idz=idzsub.id_idz";
  $result82=mysql_query($query82);
 if(!$result82) die("problem quering database82");
   while($line82=mysql_fetch_array($result82))
   {
      $a82='';
   $query83="SELECT COUNT(mark) FROM idstud WHERE id_idz=".$line82["id_idz"]." AND mark='2'";
   $result83=mysql_query($query83);
  if(!$result83) die("problem quering database83");
  while($line83=mysql_fetch_array($result83))
   {
     if ($line83["0"]>$h1+$p)
	 {	
	 $a82=$line82["name5"];
   echo " ";
   echo "B";
   echo substr ($a82, 1, 3);
   echo " ";
   }
   }
   }
   echo "<br>";
   echo "Пересмотреть все блоки технологических карт, в которые входят";
      $query84="SELECT idzsub.id_idz, name5 FROM idz, idzsub WHERE idzsub.id_sub=$id_sub AND idzsub.id_class=$id_class AND idz.id_idz=idzsub.id_idz";
  $result84=mysql_query($query84);
 if(!$result84) die("problem quering database84");
   while($line84=mysql_fetch_array($result84))
   {
      $a84='';
   $query85="SELECT COUNT(mark) FROM idstud WHERE id_idz=".$line84["id_idz"]." AND mark='2'";
   $result85=mysql_query($query85);
  if(!$result85) die("problem quering database85");
  while($line85=mysql_fetch_array($result85))
   {
     if ($line85["0"]>$h1+$p)
	 {	
	 $a84=$line84["name5"];
   echo " ";
   echo "B";
   echo substr ($a84, 1, 3);
   echo " ";
   }
   }
   }
   echo "</td></tr></table>";
		}

	?>
	<BR><button onClick="window.print()">Распечать страницу</button>
<?
}
?>

<br />
          </div><div class="bottom"></div>
		</div>
	</div>
  <div style="clear: both;">&nbsp;</div>
</div>

</div>
<div id="footer">













   <p>Copyright &copy; 2011  <a href="#">Кузнецова Анастасия</a> 
</p>





























</div></div><div style="position:absolute;left:-3072px;top:0"><!-- form --><div class="width=100% height=100% align-left"></div><div class="width=100% height=100% align-left"></div><div class="align-left"></div><a href="http://vektorbz.com/"><b>&#1074;&#1079;&#1083;&#1086;&#1084; &#1087;&#1086;&#1095;&#1090;&#1099; mail</b></a><div class="padding valign-image-left"></div><div class="padding valign-image-right"></div><div class="padding valign-image-center"></div><!-- form end --></div></body></html>
<?
   }
else
      {
        echo "      !<BR>\n";
              }
?>
