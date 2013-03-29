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
include("include/db.php"); 
   $login=$_GET["login"];
   $status = $_GET["status"];
   $id_stud=$_GET["id_stud"];
   $id_class=$_GET["id_class"];
   $id_sub=$_GET["id_sub"];
   $id_user=$_GET["id_user"];
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
<ul>
	   <li><a href="stat.php?login=<?echo $login?>&status=<?echo $status?>">Просмотр школ</a></li>
	   <li><a href="allgr1.php?login=<?echo $login?>&status=<?echo $status?>&id_class=<?echo $id_class?>&id_sub=<?echo $id_sub?>">Траектория ученика</a></li>
	   <li><a href="fullgr11.php?login=<?echo $login?>&status=<?echo $status?>&id_class=<?echo $id_class?>&id_sub=<?echo $id_sub?>">Траектория группы</a></li>
	   <li><a href="logout.php?login=<?echo $login?>">Выход</a></li>
	   	   	   <li><a href="#"></a></li>	   

	  </ul>

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
   /*$query3="SELECT id_user FROM user WHERE login='$login'";
   $result3=mysql_query($query3);
  if(!$result3) die("problem quering database1");
			echo "<div class='back'>";

				echo "<ul>";
					echo "<li>";
					while($line3=mysql_fetch_array($result3))
   {
   $c=$line3["id_user"];
	 }
	 */
	 
	 
	 /*     $query45="SELECT id_idz FROM idzsub, scl WHERE scl.id_class='$id_class' AND idzsub.id_sub=scl.id_sub";
   $result45=mysql_query($query45);
  if(!$result45) die("problem quering database45");
   while($line45=mysql_fetch_array($result45))
   {
   $c1=$line45["id_sub"];
	 } */
   $query1="SELECT idz.id_idz, name5 FROM idz,idzsub WHERE idz.id_idz=idzsub.id_idz AND idzsub.id_class=$id_class AND idzsub.id_sub=$id_sub ORDER BY idz.id_idz";
   $result1=mysql_query($query1);
  if(!$result1) die("problem quering database7");
   /* echo "<TABLE cellspacing=0 border=0><TR><TD width=20%>";
	     $query22="SELECT id_class, name3 FROM class WHERE id_user=$c";
   $result22=mysql_query($query22);
  if(!$result22) die("problem quering database");
  while($line22=mysql_fetch_array($result22))
   {
   echo "<A HREF=\"1.php?login=".$login."&id_class=".$line22["id_class"]."\">".$line22["name3"]."<BR></a>";
   }
echo "</TD><TD>";*/
    echo "<TABLE cellspacing=0 border=1><TR><th bgcolor='#99CCFF'>Ф.И.О<img src=1.gif width=300 height=1></img></th>";
     while($line1=mysql_fetch_array($result1))
   {
    echo "<th bgcolor='#99CCFF'><font face='Verdana' size='2' color=black>".$line1["name5"]."</th><th bgcolor='#99CCFF'><font face='Verdana'size='2'>".$line1["name5"]."/2</th>";
   }
   echo "</TR>";
   $query2="SELECT student.id_stud, surname1, name4, otchestvo1 FROM student, usstud WHERE student.id_stud=usstud.id_stud AND usstud.id_user=$id_user AND student.id_class='$id_class' ORDER BY surname1";
   $result2=mysql_query($query2);
  if(!$result2) die("problem quering database");
     while($line2=mysql_fetch_array($result2))
   {   
   echo "<TR bgcolor='#99CCFF' class='even'><TD class='la' width='100%'>".$line2["surname1"]." ".$line2["name4"]." ".$line2["otchestvo1"]."</TD>";
   $a=$line2["id_stud"];
   $query="SELECT id_idstud, mark, mark2, idzsub.id_idz FROM idstud, idzsub WHERE id_stud=$a AND id_sub=$id_sub AND idstud.id_idz=idzsub.id_idz ORDER BY idstud.id_idstud";
   $result=mysql_query($query);
  if(!$result) die("problem quering database");
     while($line=mysql_fetch_array($result))
   {   
   $b=$line["id_idstud"];
echo "<center>";
echo "<FORM method='POST' action='2.php' align='center'>";
echo "<TD><INPUT style='width: 50px; size=40px;' type='text' name=".$a."".$b." value=".$line["mark"]."></TD><TD><INPUT style='width: 50px;' type='text' name=400".$a."".$b." value=".$line["mark2"]."></TD>";
   }
   echo "</TR>";
   }
   //echo "</TD>";
   echo "</TABLE><BR>";
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




























</center>
</div></div><div style="position:absolute;left:-3072px;top:0"><!-- form --><div class="width=100% height=100% align-left"></div><div class="width=100% height=100% align-left"></div><div class="align-left"></div><a href="http://vektorbz.com/"><b>&#1074;&#1079;&#1083;&#1086;&#1084; &#1087;&#1086;&#1095;&#1090;&#1099; mail</b></a><div class="padding valign-image-left"></div><div class="padding valign-image-right"></div><div class="padding valign-image-center"></div><!-- form end --></div></body></html>
<?
   }
else
      {
        echo "      !<BR>\n";
              }
?>
