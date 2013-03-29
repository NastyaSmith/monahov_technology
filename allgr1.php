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
 if(($id_sub=="") || ($id_class==""))
 {
echo "Выдолжны выбрать группу и предмет,вернитесь в журнал!";
 } 
 else
 {
  include("include/db.php");
  //$id_stud=70;

  $i=0;
  $query12="SELECT id_stud, surname1 FROM student WHERE id_class=$id_class ORDER BY surname1";
  $result12=mysql_query($query12);
  if(!$result12) die("problem quering database");
  while($line12=mysql_fetch_array($result12))
   {
  $i++;
   ?>

<link href="styles.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load('visualization', '1', {packages: ['imagelinechart']});
    </script>
    <script type="text/javascript">
      function drawVisualization(){
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'x');
        data.addColumn('number', '5, 4, 3');
        data.addColumn('number', '2');
 <?		
$j=0;
  $query7="SELECT COUNT(idzsub.id_idz) FROM idstud, idzsub WHERE id_stud=".$line12["id_stud"]." AND id_sub=$id_sub AND id_class=$id_class AND idstud.id_idz=idzsub.id_idz";
  $result7=mysql_query($query7);
 if(!$result7) die("problem quering database1");
  while($line7=mysql_fetch_array($result7))
   {
$a=$line7["0"];
   }
?>   
data.addRows(<?echo $a?>);
<?   
   $query8="SELECT id_idstud, mark, mark2, idzsub.id_idz FROM idstud, idzsub WHERE id_stud=".$line12["id_stud"]." AND id_sub=$id_sub AND id_class=$id_class AND idstud.id_idz=idzsub.id_idz ORDER BY idstud.id_idstud";
   $result8=mysql_query($query8);
   if(!$result8) die("problem quering database777");
		  for ($j=0;$j<$a;$j++){
   while($line8=mysql_fetch_array($result8))
   {
   $query9="SELECT name5 FROM idz WHERE id_idz=".$line8["id_idz"]." ORDER BY id_idz";
   $result9=mysql_query($query9);
   if(!$result9) die("problem quering database2");
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
   data.setCell(<?echo $j?>, 2, 0);
		<?
		$j++;
		}
		}
		}
}
$query10="SELECT surname1, name4, otchestvo1 FROM student WHERE id_stud=".$line12["id_stud"]."";
  $result10=mysql_query($query10);
 if(!$result10) die("problem quering database3");
  while($line10=mysql_fetch_array($result10))
   {
?>
       new google.visualization.ImageLineChart(document.getElementById('visualization<?echo $i?>')).
            draw(data, {width: 850, height: 200, title: '<?echo "".$line10["surname1"]." ".$line10["name4"]." ".$line10["otchestvo1"].""?>',max: 5,min:1,valueLabelsInterval:1,fill:false});
      }
	            google.setOnLoadCallback(drawVisualization);
	  <?
	  }
	  ?>
	      </script>

    <p><div id="visualization<?echo $i?>" style="width: 300px; height: 300px;"></div>

	  <?
	  	  }
	  ?>

	<BR><button onClick="window.print()">Распечать страницу</button></p>

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




























</center>
</div></div><div style="position:absolute;left:-3072px;top:0"><!-- form --><div class="width=100% height=100% align-left"></div><div class="width=100% height=100% align-left"></div><div class="align-left"></div><a href="http://vektorbz.com/"><b>&#1074;&#1079;&#1083;&#1086;&#1084; &#1087;&#1086;&#1095;&#1090;&#1099; mail</b></a><div class="padding valign-image-left"></div><div class="padding valign-image-right"></div><div class="padding valign-image-center"></div><!-- form end --></div></body></html>
<?
   }
else
      {
        echo "      !<BR>\n";
              }
?>
