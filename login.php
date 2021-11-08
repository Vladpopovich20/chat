<?php
/*
1. Дизайн/мокап - готов
2. отправка формы - готово
3. Сделать обработку данных формы, проверить заполнил ли емейл и пароль - готово 
4. Сделать проверку есть ли такой пользователь в базе даных 
5.Если нет вывести ошибку
6. Авторизировать пользователя*/
include "configs/db.php";

	/*setcookie("polzovatel_id", "",0); онулення куків*/
if (
	isset($_POST["email"]) and isset($_POST["password"])
	&& $_POST["email"]!=" " && $_POST["password"]!= ""
) { //like сравнить
 $sql ="SELECT * FROM polzovateli WHERE email 
 LIKE '".$_POST["email"]."' AND password LIKE '".$_POST["password"]."'";
   
   $result =mysqli_query($connect,$sql);
$col_polzovateley=mysqli_num_rows($result);


   if ($col_polzovateley==1){
   	$polzovatel =mysqli_fetch_assoc($result);
   	// создаем куки для хранение данних пользователя
   	setcookie("polzovatel_id", $polzovatel["id"],
  time()+60*60*24);?>
    <?php


    
   	header("Location: index.php");//перенаправлення на сторінку
   } else { //якщо не авторизувався
    echo"<h2>Логин или пароль введены не верно</h2>";
    ?>
   
  


   <?php
   }
 }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/forma.css">

	<title>Авторизация</title>

</head>
<body>
	<?php
       include "chasty_site/shapka.php";
			 ?>
	


<form action="login.php" method="POST">
  <div class="container">
    <h1 id="h1_form">Авторизація</h1>
    <hr>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Введите свой email" name="email">
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Введите свой пароль:"name="password">
    
    <hr>
    <p> By logging in to your account, you agree to our. <a href="#">Terms & Privacy</a>.</p>

    <button type="submit" class="registerbtn">Увійти</button>
 
  
  <div class="signin">
    <p>Якщо ви не зареєстровані натисніть сюди <a href="register.php">Реєстрація</a>.</p>
  </div>
   </div>
</form>
</div>

	<!-- <div id="big-chat-block">
		<h2>Авторизация</h2>
 <form action="login.php" method="POST">
 	<p>
 	Введите свой email: </br>
 	<input type="text" name="email">
    </p>
    <p>
    Введите свой пароль: </br>
    <input type="password" name="password">
    </p>
    <p>
    	<button type = "submit">Войти</button>
    </p>
 </form> -->
 <!-- <a href ="register.php"> Регистрация</a> 
 </div>-->

</body>
</html>