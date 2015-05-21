<?php

function __autoload($className) {
  $path = __DIR__ . "/../classes/$className.class.php";

  if (file_exists($path)) {
      require($path);
  } else {
    throw new Exception("Could not load $className");
  }
}

?>