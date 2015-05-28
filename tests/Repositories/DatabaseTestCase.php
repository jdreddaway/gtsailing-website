<?php

namespace Tests\Repositories;

use \PHPUnit_Extensions_Database_TestCase;
use \PHPUnit_Extensions_Database_DataSet_YamlDataSet;

/**
 * The database server must be running for this to work.
 */
class DatabaseTestCase extends PHPUnit_Extensions_Database_TestCase
{
  // only instantiate pdo once for test clean-up/fixture load
  static private $pdo = null;

  // only instantiate PHPUnit_Extensions_Database_DB_IDatabaseConnection once per test
  private $conn = null;

  public function getConnection()
  {
    if ($this->conn === null) {
      $this->conn = $this->createDefaultDBConnection(self::getPdo(), 'gtsail');
    }

    return $this->conn;
  }

  public function getDataSet() {
    return new PHPUnit_Extensions_Database_DataSet_YamlDataSet(__DIR__.'\data.yml');
  }

  protected static function getPdo() {
    if (self::$pdo == null) {
      self::$pdo = new \PDO('mysql:dbname=gtsail_test;host=localhost', 'gtsail_dev', 'gtsail');
    }

    return self::$pdo;
  }
}

?>