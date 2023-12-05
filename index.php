<?php
  require_once realpath(__DIR__ . '/vendor/autoload.php');
  require_once 'src/Controller.php';
  require_once 'src/Template.php';
  include 'src/DatabaseConnection.php';
  include 'models/Food.php';
  include 'controllers/homePage.php';
  $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
  $dotenv->load();

  DatabaseConnection::connect();

  $action = $_GET['action'] ?? 'index';

  $homePageController = new HomePageController();
  $homePageController->runAction($action);
?>