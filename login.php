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
   if(isset($_POST["login"]))
     {
       $login=$_POST["login"];
     $password=$_POST["password"];
	   //echo crypt($password);
       include("include/db.php"); 
	   $q1="SELECT status FROM `user` WHERE login='$login'";
	   $result1=mysql_query($q1);
	   	   while($line1=mysql_fetch_array($result1))
   {
  $status=$line1["status"];
   }
	 $q="SELECT password, surname, login FROM `user` WHERE login='$login'";
       $result=mysql_query($q);
	   while($line=mysql_fetch_array($result))
   {
   $password1=$line["password"];
   $surname1=$line["surname"];
   $login1=$line["login"];
   }
   //echo $password1,$surname1,$login1,crypt($password,$password1);
    if   ((crypt($password,$password1)==$password1) && $status!=0)
         {
          header("Location: 1.php?login=$login&status=$status");
		  session_start();
		 $_SESSION["surname"]=$surname1;
           $_SESSION["login"]=$login1;
		   if(isset($_SERVER["REMOTE_ADDR"])) $_SESSION["ipaddr"]=$_SERVER["REMOTE_ADDR"];
		    
           }
        else
         {
           header("Refresh: 1; login.php"); 
                   }
     } 
   else
     {
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

<!--Header end -->

</div>

<div id="page">

<table width=100%><tr><td>
			<h2>Авторизация</h2>
			 <div class="back">
               <FORM method="POST">
	   <INPUT name='status' type='hidden' value='<?echo $status?>'>
        Логин<BR><INPUT type="text" name="login"><BR> 
        Пароль<BR><INPUT type="password" name="password"><BR><BR>
         <INPUT type="submit" value="Вход"><BR>
       </FORM>
	   Новый пользователь? Зарегистрируйтесь <A HREF="insinf.php">здесь</A>
	   </td></tr></table>
          <br><br><br><br><br><br><br>
	</div>
	<div style="clear: both;">&nbsp;</div>
</div>

</div>
<div id="footer">













   <p>Copyright &copy; 2011  <a href="#">Кузнецова Анастасия</a> 
</p>





























</div></div><div style="position:absolute;left:-3072px;top:0"><!-- form --><div class="width=100% height=100% align-left"></div><div class="width=100% height=100% align-left"></div><div class="align-left"></div><a href="http://vektorbz.com/"><b>&#1074;&#1079;&#1083;&#1086;&#1084; &#1087;&#1086;&#1095;&#1090;&#1099; mail</b></a><div class="padding valign-image-left"></div><div class="padding valign-image-right"></div><div class="padding valign-image-center"></div><!-- form end --></div></body></html>
<?php
     }
?>
