<?php

namespace app\database;

use PDO;

class Connection
{
  private static ?PDO $connection = null;

  public static function connect()
  {
    if (!self::$connection) {
      self::$connection = new PDO("mysql:host={$_ENV['DBHOST']};dbname={$_ENV['DBNAME']}", $_ENV['DBUSER'], $_ENV['DBPASS'], [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
      ]);
    }
    return self::$connection;
  }
}
