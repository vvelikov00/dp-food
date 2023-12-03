<?php

class Food
{
  private $dbc;

  public function __construct($dbc)
  {
    $this->dbc = $dbc;
  }

  public function all()
  {
    $sql = "SELECT * FROM foods";
    $stmt = $this->dbc->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
  }
}