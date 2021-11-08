<?php
 /* include '../configs/db.php';  на рівень вище*/
 include 'configs/db.php'; 

  if (isset($_POST["otpravka_sms"])){
    $sql="INSERT INTO `soobsheniya`( `komu_polzovatel_id`, `vid_polzovatel_id`, `text`) VALUES ('".$_POST["komu_polzovatel_id"]."','". $_POST["vid_polzovatel_id"] . "',
    '". $_POST["text"]."')";
    mysqli_query($connect,$sql);
    
  }

$otpravleno_polzovatel_id = $_POST["komu_polzovatel_id"];
$polzovatel_id =$_POST["vid_polzovatel_id"];
include 'modules/messages.php';
?>