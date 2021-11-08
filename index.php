<?php
include "configs/db.php";
include "configs/nastroyki.php";
// перевірка чи користувач увійшов
if ($polzovatel_id==null) {
	header("Location: login.php");
};
/*
========================
Отправка сообщения выбраному пользователю
*/


/*
========================
*/
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.min.css">
	<title><?php echo $nameSite; ?></title>
</head>
<body>

			
			<?php
			// Шапка
       include "chasty_site/shapka.php";
			 ?>

	<div id="big-chat-block">
		<div class="container">
			<div id="center-chat-block">
				<div id="user">
					<div id="poisk">
						<form action="index.php" method="GET">
						<input type="text" name="poisk-text">
						<button><img src="assets/image/search.png"></img></button>
					</div>
					<?php 
 					/*СПИСОК КОРИСТУВАЧІВ ЗЛІВА*/
					include ("modules/spisok.php");?>
				</form>
				</div>

				<?php
				/* СПИСОК повідомлень справа */
    			include("modules/messages.php");
  if (
  	

	isset($_POST["text"])  
) { 
	// Вставить в таблицу "название таблцы"
  $sql = "INSERT INTO soobsheniya ( text,komu_polzovatel_id,vid_polzovatel_id) VALUES ('" .$_POST["text"]."','".$_POST["komu_polzovatel_id"]."','".$_POST["vid_polzovatel_id"]."')";

 }
				?>	
					
					</div>

					<?php 

         if (isset($_GET["user"])){ // якщо користувач вибраний то появиться формочка для відправки повідомлення
         	?>
         	<form id="form"  action="http://localhost/chat11.4my/add_soobshenie.php" method="POST" >

						<input type="hidden" name ="komu_polzovatel_id" value = <?php echo $_GET["user"]; ?>>
						<input type="hidden" name ="vid_polzovatel_id" value =<?php echo $polzovatel_id;?> >
							<textarea name="text"  id="" cols="" rows="" onkeypress="clickPress(event)" ></textarea>
						<button type="submit" name="otpravka_sms" id ="otpravlenia_sms">
							<img src="assets/image/send.png" alt=""></img>
						</button>
							</form>
        <?php }
					?>
					
			
					
				
					
					
				</div>
			</div>
		</div>
  <?php include 'modules/contacts.php';?>



	<!-- 	<div class="popup" id="in-up_modal">	
	<div class="popup_overlay">	
    <div class="popup_body">
    	<a href="#" class="popup__close">
    	<img  src="assets/image/close.png" alt="">
    	</a>
      <form action="">
             <input type="login" placeholder="Логин">
             <input type="password" placeholder="Пароль">
             <input value="Вход" type="submit">
             <button id ="registration">Реєстрація</button>
         </form>
    	</div>
	</div>
	</div>

	<div class="popup_register" id="register_modal">	
	<div class="popup_overlay_register">	
    <div class="popup_body_register">
    	<a href="#" class="popup__close_register">
    	<img  src="assets/image/close.png" alt="">
    	</a>
      <form action="">
       	<input type="email" placeholder="Введіть mail">
             <input type="login" placeholder="Логин">
             <input type="password" placeholder="Пароль">
             <input type="password" placeholder="Введіть повторно пароль">
             <input value="Реєстрація" type="submit">
            
         </form>
    	</div>
	</div>
	</div> -->
	<script src="assets/js/checking.js"></script>
	<script src="assets/js/main.js"></script>
</body>
</html>