<?php
  $data = unserialize($_POST['data']);
  foreach($data as $key => $value) {
    $input = $key.'-'.$value."\n";
    echo $input."<br>";
    $ret = file_put_contents('/home/bl6aw/public_html/homework3/data/data.txt', $input, FILE_APPEND | LOCK_EX);
    if($ret === false) {
        die('There was an error writing this file');
    }
    else {
        echo "$ret bytes written to file";
    }

  }
  echo "<p>---------</p>";
  
?>