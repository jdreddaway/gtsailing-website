<?php

namespace GTSailing\DI;

use DI\ContainerBuilder;
use \Interop\Container\ContainerInterface;
use \PDO;

/**
 * Uses PHP-DI as a dependency injection framework.
 */
class ProdContainerBuilderFactory {

  public function create() {
    $builder = new ContainerBuilder();

    $builder->addDefinitions([
      PDO::class => function(ContainerInterface $c) {
        require_once($_SERVER['DOCUMENT_ROOT'] . "/../includes/common/server-scripts.php");
        global $dbHost, $dbName, $dbUsername, $dbUserPassword;
        return new PDO("mysql:dbname=$dbName;host=$dbHost", $dbUsername, $dbUserPassword);
      }
    ]);

    return $builder;
  }
}

?>