<?php
/*
1. Дизайн/мокап - готов
2. отправка формы
3. Проверить есть ли пользователь с таким емайл
4. Проверить заполнрил ли пользователь поля формы
5. Если все предыдущие (3-4) шаги прошли то
5.1 добавить пользователя в базу даных*/


include "configs/db.php";
if (
	isset($_POST["email"]) and isset($_POST["password"]) and
  isset($_POST["phone"]) 
	&& $_POST["email"]!=" " && $_POST["password"]!= ""
  && $_POST["phone"]!= ""
) {

  // махінація з фото
if(!empty($_FILES['file']['tmp_name'])){ 
  $tmp = $_FILES['file']['tmp_name'];
  $name = $_FILES['file']['name'];
  $path = "assets/image/".$name;
  move_uploaded_file($tmp, $path);
}
else{
  $path="assets/image/user.png";
}

	// Вставить в таблицу "название таблцы"
  $sql = "INSERT INTO polzovateli ( email, password,name,photo,phone) VALUES ('" .$_POST["email"]. "', '".$_POST["password"]."','".$_POST["name"]."','".$_POST["photo"] = $path . "','".$_POST["phone"]."' )";

  if(mysqli_query($connect,$sql)){
  	echo "<h2>Добавлено</h2>";
  }else{
  	echo "<h2>ошибка бланk</h2>".mysqli_error($connect);
  }
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="assets/css/style.css">
      <link rel="stylesheet" href="assets/css/forma.css">
	<title>Регистрация</title>
</head>
<body>
	<?php
       include "chasty_site/shapka.php";
			 ?>
	<form action="register.php" method="POST" enctype="multipart/form-data">
  <div class="container">
    <h1 id="h1_form">Реєстрація</h1>
    <hr>
<label for="name"><b>Name</b></label>
    <input type="text" placeholder="Введите ваше имя" name="name">
<label for="phone"><b>Phone</b></label>
    <input type="text" placeholder="Введите ваш телефон" name="phone">

    <label for="email"><b>Email</b></label>
     
    <input type="text" placeholder ="Введите свой email" name="email" id="emailId" >

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Введите свой пароль "name="password">
  
  <label for="file"><b>Photo</b></label>
    <input type="file" placeholder="Виберіть своє фото" id="file "   name="file">
    
    <hr>
    <p> By creating an account you agree to our. <a href="#">Terms & Privacy</a>.</p>

    <button type="submit" onclick = "return ValidateEmail(document.getElementById('emailId').value)" class="registerbtn">Зареєструватися</button>
  
  
  <div class=" signin">
    <p>Якщо ви вже зареєстровані натисніть сюди <a href="login.php">Увійти</a>.</p>
  </div>
  </div>
</form>
</div>
  <script src="assets/js/checking.js"></script>
</body>
</html>