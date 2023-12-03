<?php
  
  class HomePageController extends Controller {
    function indexAction() {

      $dbh = DatabaseConnection::getInstance();
      $dbc = $dbh->getConnection();
      $food = new Food($dbc);
      $foods = $food->all();

      $table= '<table class="text-slate-200 mt-10 mb-5" >
      <thead class="shadow-lg" >
        <tr class="text-2xl rounded-xl" >
          <th class="text-left p-2 bg-slate-700 rounded-tl-md" >Name</th>
          <th class="text-left p-2 bg-slate-700 rounded-tr-md" >Category</th>
        </tr>
      </thead>
      <tbody>';

      $i = 0;
      foreach($foods as $food) {
        $i++;
        $table .= '<tr class="text-lg ' . ($i % 2 ? "" : "bg-slate-600") .'" >';
        $table .= '<td class="px-2 py-1 font-semibold ' .(($i === count($foods) ? "rounded-bl-md" : "")) . '" >' . $food['name'] . '</td>';
        $table .= '<td class="px-2 py-1 ' .(($i === count($foods) ? "rounded-br-md" : "")) . '" >' . $food['category'] . '</td>';
        $table .= '</tr>';
      }

      $table .= '</tbody></table>';
      
      $variables['title'] = "DP Foods";
      $variables['table'] = $table;
      $template = new Template("default");
      $template->view('home-page', $variables);
    }
  }