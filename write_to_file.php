<?php
  $data = unserialize($_POST['data']);
  $x = 0;
  foreach($data as $key => $value) {
    if($x == 0) {
      $input = '*'.$value.PHP_EOL;
      $x = $x + 1;
    }
    else {
      $input = $value.PHP_EOL;
    }
    echo $input."<br>";
    $ret = file_put_contents('data/data.txt', $input, FILE_APPEND | LOCK_EX);
    if($ret === false) {
        die('There was an error writing this file');
    }
    else {
        echo "$ret bytes written to file: ";
    }

  }
  echo "<p>---------</p>";

?>
