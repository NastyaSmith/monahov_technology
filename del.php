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
   $query2="SELECT id_stud FROM student WHERE surname1='$surname' AND name4='$name' AND otchestvo1='$otchestvo'";
   $result2=mysql_query($query2);
  if(!$result2) die("problem quering database");
     while($line2=mysql_fetch_array($result2))
   {   
 $b=$line2["id_stud"];
   }
  $query1="DELETE FROM idstud WHERE id_stud='$b'";
$result1 = mysql_query($query1);  
  $query3="DELETE FROM usstud WHERE id_stud='$b'"; 
 $result3 = mysql_query($query3);  
  $query4="DELETE FROM student WHERE id_stud='$b'"; 
  $result4 = mysql_query($query4);  
  //echo "Новость добавлена!!!";
header("Location: 1.php?login=$login&id_class=$id_class&id_sub=$id_sub&status=$status");
?>
