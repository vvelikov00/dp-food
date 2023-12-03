<?php

final class DatabaseConnection {
  private static $instance = null;
  private static $connection;

  public static function getInstance()
  {
    if (self::$instance === null) {
      self::$instance = new DatabaseConnection();
    }
    return self::$instance;
  }

  private function __construct() {}

  private function __clone() {}

  public static function connect() {
    $pdo = new PDO("mysql:host={$_ENV['DB_HOST']};port={$_ENV['DB_PORT']};dbname={$_ENV['DB_NAME']};charset=utf8mb4", $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    self::$connection = $pdo;
  }

  public static function getConnection() {
    return self::$connection;
  }
}