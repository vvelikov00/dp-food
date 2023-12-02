<?php
  require_once realpath(__DIR__ . '/vendor/autoload.php');

  $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
  $dotenv->load();

  // Remove next line later
  echo "Hello " . (@$_ENV['DB_USER'] ?? "User") . "!";
?>