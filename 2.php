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
      $id_class=$_POST["id_class"];
   $id_sub=$_POST["id_sub"];
   $status=$_POST["status"];
   header("Location: 1.php?login=$login&id_sub=$id_sub&id_class=$id_class&status=$status");
     $query3="SELECT id_user,name,surname,otchestvo FROM user WHERE login='$login'";
   $result3=mysql_query($query3);
  if(!$result3) die("problem quering database1");
  echo "<TABLE cellspacing=0 border=0><TR>";
   while($line3=mysql_fetch_array($result3))
   {
   $c=$line3["id_user"];
   }
  $query5="SELECT student.id_stud FROM student, usstud WHERE student.id_stud=usstud.id_stud AND usstud.id_user=$c AND student.id_class='$id_class'";
   $result5=mysql_query($query5);
  if(!$result5) die("problem quering database2");
     while($line5=mysql_fetch_array($result5))
   { 
   $a=$line5["id_stud"];
   $query6="SELECT id_idstud, mark, mark2, idz.id_idz FROM idstud, usidz, idz, idzsub WHERE id_stud=$a AND idzsub.id_sub=$id_sub AND idz.id_idz=usidz.id_idz AND idzsub.id_class=$id_class AND  idz.id_idz=idzsub.id_idz AND idz.id_idz=idstud.id_idz AND usidz.id_user=$c ORDER BY idstud.id_idz";
   $result6=mysql_query($query6);
  if(!$result6) die("problem quering database3");
     while($line6=mysql_fetch_array($result6))
   {
   $result7 = mysql_query("UPDATE idstud SET mark='".$_POST["$a".$line6["id_idstud"].""]."',mark2='".$_POST["400$a".$line6["id_idstud"].""]."' WHERE id_idstud=".$line6["id_idstud"]." AND id_stud=".$line5["id_stud"]."");
   }
   }
  ?>
