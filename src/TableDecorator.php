<?php
require_once 'src/iDecorator.php';
class TableDecorator implements iDecorator {
  private $data;
  public function __construct(iDecorator $data) {
    $this->data = $data;
  }

  public function sortData() {}

  public function getData() {
    $table= '<table class="text-slate-200 mt-10 mb-5" >
      <thead class="shadow-lg" >
        <tr class="text-2xl rounded-xl" >
          <th class="text-left p-2 bg-slate-700 rounded-tl-md" >Име</th>
          <th class="text-left p-2 bg-slate-700 rounded-tr-md" >Категория</th>
        </tr>
      </thead>
      <tbody>';

      $i = 0;
      $arr = $this->data->sortData();
      foreach($arr as $obj) {
        $i++;
        $table .= '<tr class="text-lg ' . ($i % 2 ? "" : "bg-slate-600") .'" >';
        $table .= '<td class="px-2 py-1 font-semibold ' .(($i === count($arr) ? "rounded-bl-md" : "")) . '" >' . $obj['name'] . '</td>';
        $table .= '<td class="px-2 py-1 ' .(($i === count($arr) ? "rounded-br-md" : "")) . '" >' . $obj['category'] . '</td>';
        $table .= '</tr>';
      }

      $table .= '</tbody></table>';
      return $table;
  }
}