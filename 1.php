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

<div id="leftbar" class="sidebar">
			<h2>Группы</h2>
            <?

   $query3="SELECT id_user FROM user WHERE login='$login'";
   $result3=mysql_query($query3);
  if(!$result3) die("problem quering database1");
			echo "<div class='back'>";

				echo "<ul>";
					echo "<li>";
					while($line3=mysql_fetch_array($result3))
   {
   $c=$line3["id_user"];
	 }
	   					$query21="SELECT id_class, name3 FROM class WHERE id_user=$c";
   $result21=mysql_query($query21);
  if(!$result21) die("problem quering database3");
 
      while($line21=mysql_fetch_array($result21))
   {
   echo "<A HREF=\"1.php?login=".$login."&status=$status&id_class=".$line21["id_class"]."\">".$line21["name3"]." ";
   echo " <br>";
   echo "</a>";
  }

					echo "</li>";
				echo "</ul>";
					   echo "</b><BR><FORM method='POST' action='addstud.php' align='left'>
<INPUT type='submit' value='Добавить' align='center'>
<INPUT name='login' type='hidden' value='".$login."'>
<INPUT name='status' type='hidden' value='".$status."'>
 </form>";
		echo "</div>";
			echo "<div class='bottom_small'></div>";
			echo "<h2>Предметы</h2>";
				echo "<div class='back'>";
				echo "<ul>";
					echo "<li>";

  //*******************************************************************************
  	 if (isset ($id_class)){
   $query6="SELECT  subject.id_sub,name2 FROM subject, scl WHERE subject.id_sub=scl.id_sub AND scl.id_class=$id_class";
   $result6=mysql_query($query6);
  if(!$result6) die("problem quering database222");
  while($line6=mysql_fetch_array($result6))
   {
   echo "<A HREF=\"1.php?login=".$login."&id_class=$id_class&status=$status&id_sub=".$line6["id_sub"]."\">".$line6["name2"]."</a>";
   echo "<br>";
   }
   }
					echo "</li>";
				  echo "</ul>";
       //echo "<br><A HREF=\"addstud.php?login=".$login."\"> </a>";

 echo "</div>";
 ?>
			<div class="bottom_small"></div>
	</div>

	<div id="content">
		<div class="post">
	      <div class="top"></div>
			 <div class="middle_back">
			 <h2 class="title">Просмотр успеваемости студентов</h2>
			 <br>



    <p>
    <?
	if (isset ($id_sub)){
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
   $query2="SELECT student.id_stud, surname1, name4, otchestvo1 FROM student, usstud WHERE student.id_stud=usstud.id_stud AND usstud.id_user=$c AND student.id_class='$id_class' ORDER BY surname1 ASC";
   $result2=mysql_query($query2);
  if(!$result2) die("problem quering database");
     while($line2=mysql_fetch_array($result2))
   {   
   echo "<TR bgcolor='#99CCFF' class='even'><TD class='la' width='100%'><A HREF=\"1.php?login=".$login."&id_class=$id_class&status=$status&id_sub=$id_sub&id_stud=".$line2["id_stud"]."\">".$line2["surname1"]." ".$line2["name4"]." ".$line2["otchestvo1"]."</a></TD>";
   $a=$line2["id_stud"];
   $query="SELECT id_idstud, mark, mark2, idzsub.id_idz FROM idstud, idzsub WHERE id_stud=$a AND id_sub=$id_sub AND idstud.id_idz=idzsub.id_idz ORDER BY idstud.id_idstud";
   $result=mysql_query($query);
  if(!$result) die("problem quering database");
     while($line=mysql_fetch_array($result))
   {   
   $b=$line["id_idstud"];
echo "<FORM method='POST' action='2.php' align='left'>";
echo "<TD><INPUT style='width: 50px; size=40px;' type='text' name=".$a."".$b." value=".$line["mark"]."></TD><TD><INPUT style='width: 50px;' type='text' name=400".$a."".$b." value=".$line["mark2"]."></TD>";
   }
   echo "</TR>";
   }
   //echo "</TD>";
   echo "</TABLE><BR>";
   
   }
   else 
   {
   if (!isset ($id_class)){
   echo "Выберите группу";
   }
   else {
   echo "Выберите предмет";
   }
   }

   
   ?>

    </p>


<br />
          </div><div class="bottom"></div>
		
		
		</div>
	</div>

	<div id="rightbar" class="sidebar">

				<h2>Управление</h2>
				<div class="back">
					<br>
<INPUT type="submit" value="Сохранить изменения">
   <INPUT name='login' type='hidden' value='<?echo $login?>'>
   <INPUT name='id_class' type='hidden' value='<?echo $id_class?>'>
   <INPUT name='status' type='hidden' value='<?echo $status?>'>
   <INPUT name='id_sub' type='hidden' value='<?echo $id_sub?>'>
  </form>
 <FORM method='POST' action='3.php'align='left'>
<INPUT name='login' type='hidden' value='<?echo $login?>'>
<INPUT name='id_class' type='hidden' value='<?echo $id_class?>'>
<INPUT name='status' type='hidden' value='<?echo $status?>'>
   <INPUT name='id_sub' type='hidden' value='<?echo $id_sub?>'>
   <INPUT type="submit" value="Добавить диагностику">
 </form>

                    <?
 //echo "</TABLE>";


			     if ($_GET["status"]==2)
   {
   echo "<BR><A HREF=\"stat.php?login=".$login."&status=".$status."\">Просмотреть школы</a><br></TD><TD>";
   echo "<A HREF=\"zayav.php?login=".$login."&status=".$status."\">Пользователи</a><br></TD><TD>";
   }
   ?>
     <p>
   <br>   

				   <div id="razdel">

			       <FORM name='form1' method='POST' action='del.php' align='left'>
   <b>Удалить студента</b><br>
   Фамилия:<INPUT type='text' name='surname'><br>
   Имя:<INPUT type='text' name='name'><br>
   Отчество:<INPUT type='text' name='otchestvo'><br>
    <INPUT name='login' type='hidden' value='<?echo $login?>'>
   <INPUT name='id_class' type='hidden' value='<?echo $id_class?>'>
   <INPUT name='status' type='hidden' value='<?echo $status?>'>
   <INPUT name='id_sub' type='hidden' value='<?echo $id_sub?>'>
   <INPUT type='submit' value='Удалить' align='center'>
 </form>
 </div>

 <div id="razdel">
  <FORM method='POST' action='add.php' align='left'>
   <b>Добавить студента</b><br>
   Фамилия:<INPUT type='text' name='surname'><br>
   Имя:<INPUT type='text' name='name'><br>
   Отчество:<INPUT type='text' name='otchestvo'><br>
   <INPUT name='login' type='hidden' value='<?echo $login?>'>
   <INPUT name='id_class' type='hidden' value='<?echo $id_class?>'>
   <INPUT name='status' type='hidden' value='<?echo $status?>'>
   <INPUT name='id_sub' type='hidden' value='<?echo $id_sub?>'>
<INPUT type='submit' value='Добавить' align='center'>
 </form>
 </div>
<br>

  
				</div>
			   <div class="bottom_small"></div>



				
				
			
	</div>

	<div style="clear: both;">&nbsp;</div>
</div>

</div>
<div id="footer">





				  <div id="visualization"></div>







   <p>Copyright &copy; 2011  <a href="#">Кузнецова Анастасия</a> 
</p>





























</div></div><div style="position:absolute;left:-3072px;top:0"><!-- form --><div class="width=100% height=100% align-left"></div><div class="width=100% height=100% align-left"></div><div class="align-left"></div><a href="http://vektorbz.com/"><b>&#1074;&#1079;&#1083;&#1086;&#1084; &#1087;&#1086;&#1095;&#1090;&#1099; mail</b></a><div class="padding valign-image-left"></div><div class="padding valign-image-right"></div><div class="padding valign-image-center"></div><!-- form end --></div></body></html>
    <?
  if(isset($_GET["id_stud"])){
 ?>
 
     <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load('visualization', '1', {packages: ['imagelinechart']});
    </script>
    <script type="text/javascript">
      function drawVisualization(){
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'x');
        data.addColumn('number', '');
        data.addColumn('number', ' 2');
 <?		
$i=0;
  $query7="SELECT COUNT(idzsub.id_idz) FROM idstud, idzsub WHERE id_stud=$id_stud AND id_sub=$id_sub AND id_class=$id_class AND idstud.id_idz=idzsub.id_idz";
  $result7=mysql_query($query7);
 if(!$result7) die("problem quering database");
  while($line7=mysql_fetch_array($result7))
   {
$a=$line7["0"];
   }
?>   
data.addRows(<?echo $a?>);
<?   
   $query8="SELECT id_idstud, mark, mark2, idzsub.id_idz FROM idstud, idzsub WHERE id_stud=$id_stud AND id_sub=$id_sub AND idstud.id_idz=idzsub.id_idz ORDER BY idstud.id_idstud";
   $result8=mysql_query($query8);
  if(!$result8) die("problem quering database777");
		  for ($j=0;$j<$a;$j++){
  while($line8=mysql_fetch_array($result8))
   {
   $query9="SELECT name5 FROM idz WHERE id_idz=".$line8["id_idz"]." ORDER BY id_idz";
   $result9=mysql_query($query9);
  if(!$result9) die("problem quering database");
  while($line9=mysql_fetch_array($result9))
   {
   if (($line8["mark"]==2) || ($line8["mark"]==0)){
   if ($line8["mark"]==2){
   ?>
   data.setCell(<?echo $j?>, 0, '<?echo $line9["name5"]?>');
   data.setCell(<?echo $j?>, 1, <?echo $line8["mark2"]?>);
  data.setCell(<?echo $j?>, 2, <?echo $line8["mark"]?>);	
   <?
   $j++;
   }
      if ($line8["mark"]==0){
   ?>
   data.setCell(<?echo $j?>, 0, '<?echo $line9["name5"]?>');
   data.setCell(<?echo $j?>, 1);
  data.setCell(<?echo $j?>, 2);	
   <?
   $j++;
   }
   }
   else{
   ?>
        data.setCell(<?echo $j?>, 0, '<?echo $line9["name5"]?>');
        data.setCell(<?echo $j?>, 1, <?echo $line8["mark"]?>);
		data.setCell(<?echo $j?>, 2);
		<?
		$j++;
		}
		}
		}
}
$query10="SELECT surname1, name4, otchestvo1 FROM student WHERE id_stud='$id_stud'";
  $result10=mysql_query($query10);
 if(!$result10) die("problem quering database");
  while($line10=mysql_fetch_array($result10))
   {
?>
         new google.visualization.ImageLineChart(document.getElementById('visualization')).
            draw(data, {width: 1000, height: 300, title: '<?echo "".$line10["surname1"]." ".$line10["name4"]." ".$line10["otchestvo1"].""?>',max: 5,min:1,valueLabelsInterval:1,fill:false});
      }
	            google.setOnLoadCallback(drawVisualization);
	  <?
	  }



}

 

?>

    </script>
<?
   }
else
      {
        echo "Вы не имеете доступ к этой странице!<BR>\n";
              }
?>
