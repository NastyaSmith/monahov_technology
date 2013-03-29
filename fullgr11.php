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
                        width: 850, height: 400,colors:['red','yellow','green','blue'],
                        vAxis: {minValue:3,baseline: 0}}
                );
      }
      

      google.setOnLoadCallback(drawVisualization);
    </script>
  </head>
    <div id="visualization" style="width: 1200px; height: 400px;"></div>

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
			  }
?>
