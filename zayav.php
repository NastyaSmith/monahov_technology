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
   $status = $_GET["status"];
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
	<h2><a href="#" id="metamorph">АНО "Центр педагогических технологий"</a></h2>


  </div>
  <div id="menu">
<ul>
	   <li><a href="1.php?login=<?echo $login?>&status=<?echo $status?>">Журнал</a></li>
	   <li><a href="allgr.php?login=<?echo $login?>&status=<?echo $status?>&id_class=<?echo $id_class?>&id_sub=<?echo $id_sub?>">Траектория ученика</a></li>
	   <li><a href="fullgr1.php?login=<?echo $login?>&status=<?echo $status?>&id_class=<?echo $id_class?>&id_sub=<?echo $id_sub?>">Траектория группы</a></li>
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



    <p><?
   include("include/db.php"); 

     echo "<TABLE cellspacing=0 border=1 width=100%><TR><TD>Преподаватель</TD><TD>Школа</TD><TD>Город</TD><TD>Удалить</TD></TR>";
   $query3="SELECT id_user, name, surname, otchestvo  FROM user WHERE status=0";
   $result3=mysql_query($query3);
  if(!$result3) die("problem quering database");
   while($line3=mysql_fetch_array($result3))
   {
   echo "<TR><TD>".$line3["surname"]." ".$line3["name"]." ".$line3["otchestvo"]."</TD><BR>";
   $query12="SELECT  id_school FROM user WHERE id_user=".$line3["id_user"]."";
   $result12=mysql_query($query12);
  if(!$result12) die("problem quering database");
  while($line12=mysql_fetch_array($result12))
   {
	 $query5="SELECT name1, city FROM school WHERE id_school=".$line12["id_school"]."";
   $result5=mysql_query($query5);
  if(!$result5) die("problem quering database");
  while($line5=mysql_fetch_array($result5))
   {
      echo "<TD>".$line5["name1"]."</TD>";
	  echo "<TD>".$line5["city"]."</TD>";
	  echo "<TD><FORM method='GET' align='left'>
	  <INPUT name='login' type='hidden' value='$login'>
<INPUT name='del' type='hidden' value='1'>
<INPUT name='status' type='hidden' value='$status'>
<INPUT type='submit' value='Удалить' align='center'><INPUT name='id_user' type='hidden' value='".$line3["id_user"]."'></form></TD></TR>";
 //if(isset($_GET["submit"])){
$id_user=$_GET["id_user"];
if (isset ($_GET["del"])){
$query33="SELECT id_school FROM user WHERE id_user=".$_GET["id_user"]."";
   $result33=mysql_query($query33);
  if(!$result33) die("problem quering database");
  while($line33=mysql_fetch_array($result33))
   {
   $f=$line33["id_school"];
   }
$result88=mysql_query("DELETE FROM user WHERE id_user=".$_GET["id_user"]."");
$result89=mysql_query("DELETE FROM school WHERE id_school=$f");
}
   }
   }
   }
	 echo "</TABLE>";
 ?></p>


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
