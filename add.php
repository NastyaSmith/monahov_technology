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
  $surname=$_POST["surname"];
  $name=$_POST["name"];
  $otchestvo=$_POST["otchestvo"];
  $login=$_POST["login"];
  $status=$_POST["status"];
  $id_class=$_POST["id_class"];
  $id_sub=$_POST["id_sub"];
   include("include/db.php"); 
     	  $query22="SELECT id_user FROM user WHERE login='$login'";
   $result22=mysql_query($query22);
  if(!$result22) die("problem quering database22");
     while($line22=mysql_fetch_array($result22))
   {   
 $b=$line22["id_user"];
   }
   $result34 = mysql_query("INSERT INTO student (name4,surname1,otchestvo1,id_class) VALUES ('$name','$surname','$otchestvo','$id_class')");
$z1=mysql_insert_id();
$query2="SELECT id_idz FROM idzsub WHERE id_class='$id_class'";
   $result2=mysql_query($query2);
  if(!$result2) die("problem quering database");
     while($line2=mysql_fetch_array($result2))
   {   
$result4 = mysql_query("INSERT INTO idstud(id_idz,id_stud,mark,mark2) VALUES ('".$line2["id_idz"]."','$z1','0','0')");
   }
  $query3="INSERT INTO usstud(id_user,id_stud) VALUES ('$b','$z1')"; 
 $result3 = mysql_query($query3);  
  //echo "Новость добавлена!!!";
header("Location: 1.php?login=$login&id_class=$id_class&id_sub=$id_sub&status=$status");
?>
