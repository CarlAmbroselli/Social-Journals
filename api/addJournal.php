<?php

function randomstring($length = 6) {
  $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
              srand((double)microtime()*1000000);
  $i = 0;
  while ($i < $length) {
    $num = rand() % strlen($chars);
    $tmp = substr($chars, $num, 1);
        $pass = $pass . $tmp;
    $i++;
  }
  return $pass;
}

include("dbconnect.php");



$path= "../img/".randomstring(12).".jpg";
copy($HTTP_POST_FILES['Picture']['tmp_name'], $path);

$path = str_replace("../img/", "", $path);


mysql_query("INSERT INTO Journal (image, creator, title, description, timestamp) VALUES ('".$path."', '".$_POST["me"]."', '".$_POST["Title"]."', '".$_POST["Description"]."', '".time()."');");
mysql_close($dbhandle);

header('Location: ../addJournal.php?success=1');
?>