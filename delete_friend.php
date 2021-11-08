<?php
include 'configs/db.php';
include 'configs/nastroyki.php';
  if (isset($_GET["user_id"])){ 
$sql =  "DELETE FROM friends WHERE friends . user_1  = ".$polzovatel_id ." &&  friends . user_2  = ".$_GET["user_id"];
if (mysqli_query($connect,$sql)){
 include 'modules/friend_list.php';
}	else {
			echo "Помилка";
	}
}
?>