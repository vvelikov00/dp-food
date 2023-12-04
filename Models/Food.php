<?php
require_once 'src/iDecorator.php';
class Food implements iDecorator {
  private $dbc;

  public function __construct($dbc)
  {
    $this->dbc = $dbc;
  }

  public function getData()
  {
    $sql = "SELECT * FROM foods";
    $stmt = $this->dbc->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
  }
}