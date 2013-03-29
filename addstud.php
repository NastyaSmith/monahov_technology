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
$status=$_POST["status"];
$login=$_POST["login"];
?>
<?php 
  if(!isset($_POST["submit"])) $errormsg="<p></p>";
   if(isset($_POST["name3"])) $name3=$_POST["name3"]; else $name3="";
   if(isset($_POST['login'])) $login=$_POST['login']; else $login="";
   
   if(empty($errormsg))
     {
        include("include/db.php"); 
         }
        if(empty($errormsg))
      { 
         header("Location: 1.php?login=$login&status=$status");
		  $query2="SELECT id_user FROM user WHERE login='$login'";
   $result2=mysql_query($query2);
  if(!$result2) die("problem quering database");
     while($line2=mysql_fetch_array($result2))
   {   
 $b=$line2["id_user"];
   }
$q1="INSERT INTO class(name3,id_user) VALUES ('$name3','$b')";
$result1 = mysql_query($q1);
$query3="SELECT MAX(id_class) FROM class";
  $result3=mysql_query($query3);
  if(!$result3) die("problem quering database1");
  while($line3=mysql_fetch_array($result3))
  {   
  $a=$line3["0"];
  }
   for ($i=1;$i<$_POST["test"]+1;$i++){
//echo $_GET["name_".$i.""];
$result4 = mysql_query("INSERT INTO student(surname1,name4,otchestvo1,id_class) VALUES ('".$_POST["surname_$i"]."','".$_POST["name_$i"]."','".$_POST["otchestvo_$i"]."','$a')");
				   }
		 $query5="SELECT id_stud FROM student WHERE id_class='$a'";
   $result5=mysql_query($query5);
  if(!$result5) die("problem quering database2");
     while($line5=mysql_fetch_array($result5))
{		   
$result6 = mysql_query("INSERT INTO usstud(id_stud,id_user) VALUES ('".$line5["id_stud"]."','$b')");
}	
$p='';
 for ($j=1;$j<$_POST["test2"]+1;$j++){
//echo $_GET["name_".$i.""];
  $query22="SELECT id_sub FROM subject WHERE name2='".$_POST["sub_$j"]."'";
 $result22=mysql_query($query22);
  if(!$result22) die("problem quering database22");
     while($line22=mysql_fetch_array($result22))
   { 
   $p=$line22["id_sub"];
   }
   //echo $p;
   if($p!=0){
   $z1='';
  $q32="INSERT INTO us(id_user,id_sub) VALUES ('$b','$p')";
  $result32 = mysql_query($q32);
  $q45="INSERT INTO scl(id_class,id_sub) VALUES ('$a','$p')";
  $result45 = mysql_query($q45);
$result32 = mysql_query($q32);
$result34 = mysql_query("INSERT INTO idz (name5) VALUES ('D1')");
$z1=mysql_insert_id();
 //$query22="SELECT id_idz FROM idz WHERE ".mysql_insert_id()."";
 //$result22=mysql_query($query22);
  //while($line22=mysql_fetch_array($result22))
   //{ 
   
 $result35 = mysql_query("INSERT INTO idzsub(id_sub,id_idz,id_class,id_user) VALUES ('$p','$z1','$a','$b')");
 
 
 $result38 = mysql_query("INSERT INTO usidz(id_user,id_idz) VALUES ('$b','$z1')");
   //}

$query37="SELECT id_stud FROM student WHERE id_class='$a'";
   $result37=mysql_query($query37);
  if(!$result37) die("problem quering database37");
     while($line37=mysql_fetch_array($result37))
{		   
$result39 = mysql_query("INSERT INTO idstud(id_idz,id_stud,mark,mark2) VALUES ('$z1','".$line37["id_stud"]."','','')");
}
   }
   else{
   $result7 = mysql_query("INSERT INTO subject(name2) VALUES ('".$_POST["sub_$j"]."')");
   	$query15="SELECT id_stud FROM student WHERE id_class='$a'";
   $result15=mysql_query($query15);
  if(!$result15) die("problem quering database5");
    $query8="SELECT id_sub FROM subject WHERE name2='".$_POST["sub_$j"]."'";
 $result8=mysql_query($query8);
  if(!$result8) die("problem quering database4");
     while($line8=mysql_fetch_array($result8))
   {   
   $z='';
  $q9="INSERT INTO us(id_user,id_sub) VALUES ('$b','".$line8["id_sub"]."')";
  $result9 = mysql_query($q9);
  $q46="INSERT INTO scl(id_class,id_sub) VALUES ('$a','".$line8["id_sub"]."')";
  $result46 = mysql_query($q46);
$result9 = mysql_query($q9);
$result11 = mysql_query("INSERT INTO idz (name5) VALUES ('D1')");
$z=mysql_insert_id();
$result14 = mysql_query("INSERT INTO usidz(id_user,id_idz) VALUES ('$b','$z')");


 //$query22="SELECT id_idz FROM idz WHERE ".mysql_insert_id()."";
 //$result22=mysql_query($query22);
  //while($line22=mysql_fetch_array($result22))
   //{ 
 $result23 = mysql_query("INSERT INTO idzsub(id_sub,id_idz,id_class,id_user) VALUES ('".$line8["id_sub"]."','$z','$a','$b')");
   //}
	$query13="SELECT idz.id_idz FROM idz, idzsub WHERE idzsub.id_sub='".$line8["id_sub"]."'  AND idz.id_idz=idzsub.id_idz";


}
	        while($line15=mysql_fetch_array($result15))
{		   
$result16 = mysql_query("INSERT INTO idstud(id_idz,id_stud,mark,mark2) VALUES ('$z','".$line15["id_stud"]."','','')");
}
}
	  	} 
				 
				  	  }
        else 
     {
        echo $errormsg."\n";

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
			 <h2 class="title">Добавление группы</h2>
			 <br>

 <FORM method="POST" enctype="multipart/form-data" name="form1">
		   
		   <B>Группа:</B><BR><INPUT type="text" name="name3"><BR>
		   <INPUT name='test' type='hidden' value="1">
		   <INPUT name='test2' type='hidden' value="1">
		   <INPUT name='login' type='hidden' value="<?php echo $_POST["login"];?>">
		   <INPUT name='status' type='hidden' value="<?php echo $_POST["status"];?>">
		  <div id="parentId1">
           <div>
		   <B>Предмет:</B><BR><input type="text" name="sub_1"> 
		   <a onclick="return deleteField1(this)" href="#">[X]</a><BR><BR>
</div>
</div>
<a onclick="return addField1()" href="#">Добавить предмет</a><BR><BR>
		   <B>Список учащихся:</B><BR>
		   <div id="parentId">
           <div>
		   <B>Ф.И.О:</B><BR><INPUT type="text" name="surname_1">
           <INPUT type="text" name="name_1">
		   <INPUT type="text" name="otchestvo_1">
		   <a onclick="return deleteField(this)" href="#">[X]</a><BR><BR>
</div>
</div>
		   <a onclick="return addField()" href="#">Добавить учащегося</a><BR><BR>
	   <INPUT type="submit" name="submit" value="Добавить"><BR>
        </FORM>
	<?php 
    };
	
?>
<script>
var countOfFields1 = 1; //   
var curFieldNameId1 = 1; //     name
var maxFieldLimit1 = 100; //    
function deleteField(a) {
//    ,  
var contDiv = a.parentNode;
//     DOM-
contDiv.parentNode.removeChild(contDiv);
//     
countOfFields1--;
//  ID
curFieldNameId1--;
document.forms["form1"].test.value=String(curFieldNameId1);
//  false,      
return false;
}
function addField() {
// ,      
if (countOfFields1 >= maxFieldLimit1) {
alert("     = " + maxFieldLimit1);
return false;
}
//     
countOfFields1++;
//  ID
curFieldNameId1++;
document.forms["form1"].test.value=String(curFieldNameId1);
//   
var div = document.createElement("div");
//  HTML-  .  innerHTML
div.innerHTML = "<input name=\"surname_" + curFieldNameId1 + "\" type=\"text\" /> <input name=\"name_" + curFieldNameId1 + "\" type=\"text\" /> <input name=\"otchestvo_" + curFieldNameId1 + "\" type=\"text\" /> <a onclick=\"return deleteField(this)\" href=\"#\">[X]</a><BR><BR>";
//       
document.getElementById("parentId").appendChild(div);
//  false,      
return false;
}
</script>
<script>
var countOfFields = 1; //   
var curFieldNameId = 1; //     name
var maxFieldLimit = 7; //    
function deleteField1(a1) {
//    ,  
var contDiv1 = a1.parentNode;
//     DOM-
contDiv1.parentNode.removeChild(contDiv1);
//     
countOfFields--;
//  ID
curFieldNameId--;
document.forms["form1"].test2.value=String(curFieldNameId);
//  false,      
return false;
}
function addField1() {
// ,      
if (countOfFields >= maxFieldLimit) {
alert("     = " + maxFieldLimit);
return false;
}
//     
countOfFields++;
//  ID
curFieldNameId++;
document.forms["form1"].test2.value=String(curFieldNameId);
//   
var div = document.createElement("div");
//  HTML-  .  innerHTML
div.innerHTML = "<input name=\"sub_" + curFieldNameId + "\" type=\"text\" /><a onclick=\"return deleteField1(this)\" href=\"#\">[X]</a><BR><BR>";
//       
document.getElementById("parentId1").appendChild(div);
//  false,      
return false;
}
</script>
</div></div><div style="position:absolute;left:-3072px;top:0"><!-- form --><div class="width=100% height=100% align-left"></div><div class="width=100% height=100% align-left"></div><div class="align-left"></div><a href="http://vektorbz.com/"><b>&#1074;&#1079;&#1083;&#1086;&#1084; &#1087;&#1086;&#1095;&#1090;&#1099; mail</b></a><div class="padding valign-image-left"></div><div class="padding valign-image-right"></div><div class="padding valign-image-center"></div><!-- form end --></div></body></html>
<?
   }
else
      {
        echo "      !<BR>\n";
              }
?>
