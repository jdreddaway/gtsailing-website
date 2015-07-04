<?php

namespace Tests\Repositories;

use \PHPUnit_Extensions_Database_DataSet_YamlDataSet;
use \PHPUnit_Extensions_Database_Operation_Factory;
use \PHPUnit_Extensions_Database_TestCase;

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
      $this->conn = $this->createDefaultDBConnection(self::getRemotePdo(), 'gtsail_test');
    }

    return $this->conn;
  }

  public function getDataSet() {
    $filepath = __DIR__.'\data.yml';
    return new PHPUnit_Extensions_Database_DataSet_YamlDataSet($filepath);
  }

  /**
   * Fixes issue where test database gets corrupted by running the tests.
   */
  protected function getSetUpOperation() {
    return PHPUnit_Extensions_Database_Operation_Factory::CLEAN_INSERT(TRUE);
  }

  protected static function getRemotePdo() {
    if (self::$pdo == null) {
      self::$pdo = new \PDO('mysql:dbname=gtsail_test;host=localhost', 'gtsail_dev', 'gtsail');
    }

    return self::$pdo;
  }

  protected function getPdo() {
    return $this->getConnection()->getConnection();
  }
}

?>