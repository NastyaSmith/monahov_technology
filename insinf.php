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


        <FORM method="POST" enctype="multipart/form-data" action='reg_send.php'>
		<h1>Регистрация</h1>
		Фамилия:<BR><INPUT type="text" name="surname" value="<?php echo $surname;?>"><BR>
         Имя:<BR><INPUT type="text" name="name" value="<?php echo $name;?>"><BR>
		 Отчество:<BR><INPUT type="text" name="otchestvo" value="<?php echo $otchestvo;?>"><BR>
		 Учебное заведение:<BR><INPUT type="text" name="name1" value="<?php echo $name1;?>"><BR>
		 Город:<BR><INPUT type="text" name="city" value="<?php echo $city;?>"><BR>
         Логин:<BR><INPUT type="text" name="login" value="<?php echo $login;?>"><BR> 
         Пароль:<BR><INPUT type="password" name="password1" value="<?php echo $password1;?>"><BR>
         Повторите пароль:<BR><INPUT type="password" name="password2" value="<?php echo $password2;?>"><BR><br>
		   <INPUT name='status' type='hidden' value='1'>
		   <?
$a=rand(10,27);
?>		
<img src="images/<?echo $a?>.JPG" border=0 height=30><br>
Введите код с картинки: <br>
<input name="code" type="text" size="7">
<br><br>
		   <INPUT type="submit" name="submit" value="Зарегистрироваться"><BR>
        </FORM><br>
 Вы зарегистрировались? Пройдите <A HREF="login.php">сюда</A>
	  </div>
	<div style="clear: both;">&nbsp;</div>
</div>

</div>
<div id="footer">













   <p>Copyright &copy; 2011  <a href="#">Кузнецова Анастасия</a> 
</p>





























</div></div><div style="position:absolute;left:-3072px;top:0"><!-- form --><div class="width=100% height=100% align-left"></div><div class="width=100% height=100% align-left"></div><div class="align-left"></div><a href="http://vektorbz.com/"><b>&#1074;&#1079;&#1083;&#1086;&#1084; &#1087;&#1086;&#1095;&#1090;&#1099; mail</b></a><div class="padding valign-image-left"></div><div class="padding valign-image-right"></div><div class="padding valign-image-center"></div><!-- form end --></div></body></html>
