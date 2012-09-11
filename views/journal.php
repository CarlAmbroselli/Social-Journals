<?php

include("../api/dbconnect.php");

$result = mysql_query("SELECT * FROM Journal WHERE id = ".$_GET["id"]);
$row = mysql_fetch_array($result);

?>

<!DOCTYPE html>
<html>
  <head>
    <title>ggg</title>
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen" title="no title" charset="utf-8">
    
    <link rel="stylesheet" href="css/journals.css" type="text/css" media="screen" title="no title" charset="utf-8">
    
  </head>
  <body>
      <div class="journal">
        <a href="http://google.com/">
          <div class="meta">
            <ul class="participants">
              <li><a href="#"><img src="img/max.jpg"></img></a></li>
              <li><a href="#"><img src="img/max.jpg"></img></a></li>
              <li><a href="#"><img src="img/max.jpg"></img></a></li>
            </ul>
            <div class="clearfix"></div>
            <span class="title"><?php echo $row["title"]; ?></span>
          </div>
          <ul class="stats">
            <li class="checkin">12 Check-Ins</li>
            <li class="status">177 Status-Messages</li>
            <li class="photos">12 Photos</li>
          </ul>
        </a>
      </div>
      <div class="description">
        <p><?php echo $row["description"]; ?></p>
      </div>
  </body>
</html>