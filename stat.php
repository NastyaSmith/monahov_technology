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
   $id_stud=$_GET["id_stud"];
   $id_class=$_GET["id_class"];
   $id_sub=$_GET["id_sub"];
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
     echo "<TABLE cellspacing=0 border=1 width=100%><TR><TD>Школа</TD><TD>Преподаватель</TD><TD>Класс</TD><TD>Предмет</TD></TR>";
  echo "<TR><TD>";
     $query="SELECT id_school, name1 FROM school";
   $result=mysql_query($query);
  if(!$result) die("problem quering database");
   while($line=mysql_fetch_array($result))
   {
   echo "<A HREF=\"stat.php?id_school=".$line["id_school"]."&login=".$_GET["login"]."&status=".$status."\">".$line["name1"]."<BR></a>";
	 }
  echo "</TD>";
  if (isset($_GET["id_school"])){
   $query3="SELECT id_user,name,surname,otchestvo FROM user WHERE id_school=".$_GET["id_school"]."";
   $result3=mysql_query($query3);
  if(!$result3) die("problem quering database");
  echo "<TD>";
   while($line3=mysql_fetch_array($result3))
   {
   echo "<A HREF=\"stat.php?id_school=".$_GET["id_school"]."&id_user=".$line3["id_user"]."&login=".$_GET["login"]."&status=".$status."\">".$line3["surname"]." ".$line3["name"]." ".$line3["otchestvo"]."<BR></a>";
	 }
	 }
	 echo "</TD><TD>";
	 if (isset($_GET["id_user"])){
     $query5="SELECT id_class, name3 FROM class WHERE id_user=".$_GET["id_user"]."";
   $result5=mysql_query($query5);
  if(!$result5) die("problem quering database");
  while($line5=mysql_fetch_array($result5))
   {
      echo "<A HREF=\"stat.php?id_school=".$_GET["id_school"]."&id_user=".$_GET["id_user"]."&id_class=".$line5["id_class"]."&login=".$_GET["login"]."&status=".$status."\">".$line5["name3"]."<BR>";
   }
   }
   echo "</TD>";
   echo "<TD>";
	  if (isset($_GET["id_class"])){
/*     $query9="SELECT login FROM user WHERE id_user=".$_GET["id_user"]."";
   $result9=mysql_query($query9);
  if(!$result9) die("problem quering database");
  while($line9=mysql_fetch_array($result9))
   {
$login=$line9["login"];
   }
   */
   $query6="SELECT  subject.id_sub,name2 FROM subject, scl WHERE subject.id_sub=scl.id_sub AND scl.id_class=".$_GET["id_class"]."";
   $result6=mysql_query($query6);
  if(!$result6) die("problem quering database");
  while($line6=mysql_fetch_array($result6))
   {
echo "<A HREF=\"11.php?id_user=".$_GET["id_user"]."&id_class=".$_GET["id_class"]."&id_sub=".$line6["id_sub"]."&login=".$_GET["login"]."&status=".$status."\">".$line6["name2"]."<BR>";
   }
     }
 echo "</TD></TR></TABLE>";
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
