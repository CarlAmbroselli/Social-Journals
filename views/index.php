<?php

include("../api/dbconnect.php");

$result = mysql_query("SELECT * FROM Journal WHERE creator = ".$fbid);

?>

<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="css/journals.css" type="text/css" media="screen" title="no title" charset="utf-8">
    
  </head>
  <body>
    <h1>Hi Max!</h1>
    
    <hr>
    <ul>
    <?php
    
    while($row = mysql_fetch_array($result))
    {
    echo '
     
      <li class="journal" onclick="window.location.href=\'journal.php?id='.$row["id"].'\'">
           <div class="meta">
            <ul class="participants">
              <li><a href="#"><img src="img/max.jpg"></img></a></li>
              <li><a href="#"><img src="img/max.jpg"></img></a></li>
              <li><a href="#"><img src="img/max.jpg"></img></a></li>
            </ul>
            <div class="clearfix"></div>
            <span class="title">'.$row["title"].'</span>
          </div>
          <ul class="stats">
            <li class="checkin">12 Check-Ins</li>
            <li class="status">177 Status-Messages</li>
            <li class="photos">12 Photos</li>
          </ul>
      </li>';
      }
      ?>
    </ul>
  </body>
</html>