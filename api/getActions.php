<?php

require_once("../sdk/php/src/facebook.php");

  $config = array();
  $config[‘appId’] = '256981411089999';
  $config[‘secret’] = '93a3a1984909cb1b767900f56553ce54';
  $config[‘fileUpload’] = false; // optional

  $facebook = new Facebook($config);