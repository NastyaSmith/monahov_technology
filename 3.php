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
   include("include/db.php"); 
   $login=$_POST["login"];
   $status=$_POST["status"];
   $id_class=$_POST["id_class"];
   $id_sub=$_POST["id_sub"];
   $query5="SELECT user.id_user, us.id_sub FROM user, us WHERE login='$login' AND user.id_user=us.id_user";
  $result5=mysql_query($query5);
  if(!$result5) die("problem quering database1");
  while($line5=mysql_fetch_array($result5))
  {   
  $c=$line5["id_user"];
}
   $query4="SELECT COUNT(id_idz) FROM idzsub WHERE id_sub=$id_sub AND id_class=$id_class";
  $result4=mysql_query($query4);
  if(!$result4) die("problem quering database2");
  while($line4=mysql_fetch_array($result4))
  {   
  $b=$line4["0"]+1;
  }
    /*$query22="SELECT id_idz FROM idz WHERE name5='$b'";
 $result22=mysql_query($query22);
  if(!$result22) die("problem quering database22");
     while($line22=mysql_fetch_array($result22))
   { 
   $p=$line22["id_sub"];
   }
   */
     $result1 = mysql_query("INSERT INTO idz (name5) VALUES ('D$b')"); 
$a=mysql_insert_id();
  $query2="SELECT student.id_stud FROM student, usstud WHERE student.id_stud=usstud.id_stud AND usstud.id_user=$c AND student.id_class='$id_class'";
  $result2=mysql_query($query2);
  if(!$result2) die("problem quering database4");
  while($line2=mysql_fetch_array($result2))
  {   
$result = mysql_query("INSERT INTO idstud (id_stud, id_idz, mark, mark2) VALUES ('".$line2["id_stud"]."','$a','','')"); 
}
$result = mysql_query("INSERT INTO usidz (id_user, id_idz) VALUES ('$c','$a')");
$result = mysql_query("INSERT INTO idzsub (id_sub, id_idz, id_class, id_user) VALUES ('$id_sub','$a','$id_class','$c')");

header("Location: 1.php?login=$login&id_class=$id_class&id_sub=$id_sub&status=$status");
?>
