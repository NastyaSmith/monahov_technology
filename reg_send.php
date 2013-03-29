<?php 
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
    if(isset($_POST["name"])) $name=$_POST["name"]; else $name="";
  if(isset($_POST["surname"])) $surname=$_POST["surname"]; else $surname="";
	if(isset($_POST["otchestvo"])) $otchestvo=$_POST["otchestvo"]; else $otchestvo="";
	 if(isset($_POST["status"])) $status=$_POST["status"]; else $status="";
	 if(isset($_POST["name1"])) $name1=$_POST["name1"]; else $name1="";
	 if(isset($_POST["city"])) $city=$_POST["city"]; else $city="";
   if(isset($_POST['login']) && $_POST['login']!="") $login=$_POST['login']; else $login="";
   if(isset($_POST["password1"])) $password1=$_POST["password1"]; else $password1="";
   if(isset($_POST["password2"])) $password2=$_POST["password2"]; else $password2="";
if(isset($_POST["submit"]) && (empty($login) || empty($surname) || empty($password1) || empty($password2)))
       $errormsg.="Все поля должны быть заполнены.";
   if(empty($errormsg) && $password1!=$password2) $errormsg.="Пароли должны совпадать!!!<BR>";
   if (isset($_POST['code'])) $code=$_POST['code']; else $code='';
$arr[10]="28ivw";
$arr[11]="k4ez";
$arr[12]="jw62k";
$arr[13]="fh2de";
$arr[14]="gwprp";
$arr[15]="4d7ys";
$arr[16]="e5hb";
$arr[17]="xmqki";
$arr[18]="6ne3";
$arr[19]="xdhyn";
$arr[20]="8gdcg";
$arr[21]="6z4fa";
$arr[22]="9";
$arr[23]="phhd";
$arr[24]="e73f";
$arr[25]="rum4";
$arr[26]="q98p";
$arr[27]="hrai";
for($i=10;$i<28;$i++){
if ($code==$arr[$i]){
$w=$arr[$i];
}
	}
	if ($w==''){
	$errormsg.="Вы ввели не верный код!!!<br />";
	}
	else 
	{
	if (empty($code)) $errormsg.="Вы не ввели код защиты <br />";
	}
   if(empty($errormsg))
     {
         include("include/db.php");
         if(!($result=mysql_query("SELECT login FROM user WHERE login='$login'"))) die('Invalid query!');
         if(mysql_num_rows($result)>0) $errormsg.="Такой логин уже используется!Выберите другой!.<BR>";
     $q1="INSERT INTO school(name1,city) VALUES ('$name1','$city')";
$result1 = mysql_query($q1);
$q="INSERT INTO user(name,surname,otchestvo,login,password,status,id_school ) VALUES ('$name','$surname','$otchestvo','$login','".crypt($password1)."','$status',last_insert_id())";
$result = mysql_query($q);
         header("Location: login.php");
//header("Refresh: 1; login.php");
			       }
        else echo $errormsg."\n";
?>
