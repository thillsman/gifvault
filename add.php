<?php

$url = $_POST['url'];
$name = $_POST['name'];

if($url != "" && $name != "") {
  file_put_contents($name.'.gif', file_get_contents($url));
  header("Location: index.php");
  exit();
}

?>
