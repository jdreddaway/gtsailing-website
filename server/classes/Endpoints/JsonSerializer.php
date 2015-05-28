<?php

namespace GTSailing\Endpoints;

class JsonSerializer {

  function serialize($value) {
    return json_encode($value);
  }

  function deserialize($json) {
    return json_decode($json);
  }
}

?>