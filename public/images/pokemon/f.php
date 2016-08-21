<?php
$list = scandir('.');

foreach ($list as $key => $value) {
  if (pathinfo($value)['extension'] == 'png') {
    rename($value, intval($value) . '.png');
    var_dump($value);
  }
}
