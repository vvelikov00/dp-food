<?php
require_once 'src/iDecorator.php';
require_once 'src/iProxy.php';
class SortProxy implements iDecorator {
  private $data;
  private $sort;
  public function __construct(iProxy $data, $sort) {
    $this->data = $data;
    $this->sort = $sort;
  }
  private function sortByNameAsc($arr) {
    usort($arr, function($a, $b) {
      return strtolower($a['name']) <=> strtolower($b['name']);
    });
    return $arr;
  }
  private function sortByNameDesc($arr) {
    usort($arr, function($a, $b) {
      return strtolower($b['name']) <=> strtolower($a['name']);
    });
    return $arr;
  }
  private function sortByCategoryAsc($arr) {
    usort($arr, function($a, $b) {
      return  strtolower($a['category']) <=> strtolower($b['category']);
    });
    return $arr;
  }
  private function sortByCategoryDesc($arr) {
    usort($arr, function($a, $b) {
      return strtolower($b['category']) <=> strtolower($a['category']);
    });
    return $arr;
  }
  public function sortData() {
    $arr = $this->data->getData();
    if($this->sort === 'name-asc') {
      $arr = $this->sortByNameAsc($arr);
    } else if($this->sort === 'name-desc') {
      $arr = $this->sortByNameDesc($arr);
    } else if($this->sort === 'category-asc') {
      $arr = $this->sortByCategoryAsc($arr);
    } else if($this->sort === 'category-desc') {
      $arr = $this->sortByCategoryDesc($arr);
    }
    return $arr;
  }
}