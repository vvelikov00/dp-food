<?php
require_once 'src/iDecorator.php';
class CardsDecorator implements iDecorator{

  private $data;
  public function __construct(iDecorator $data)
  {
    $this->data = $data;
  }

  public function getData()
  {
    $arr = $this->data->getData();
    $cards = '<div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-10">';
    foreach($arr as $obj) {
      $cards .= '<div class="p-4 bg-slate-700 rounded-lg shadow-lg flex flex-col justify-between">';
      $cards .= '<img class="w-full rounded-lg" src="' . $obj['image'] . '" alt="' . $obj['name'] . '">';
      $cards .= '<div class="flex justify-between flex-col">';
      $cards .= '<h2 class="text-2xl font-semibold text-center text-slate-200">' . $obj['name'] . '</h2>';
      $cards .= '<p class="text-lg font-semibold text-center text-slate-200">' . $obj['category'] . '</p>';
      $cards .= '</div>';
      $cards .= '</div>';
    }
    $cards .= '</div>';
    return $cards;
  }
}