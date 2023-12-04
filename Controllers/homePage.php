<?php
  
  class HomePageController extends Controller {
    function indexAction() {

      $dbh = DatabaseConnection::getInstance();
      $dbc = $dbh->getConnection();
      $food = new Food($dbc);
      $view = $_GET['view'] ?? 'table';
      $sort = $_GET['sort'] ?? 'name-asc';
      $decorator = null;
      if($view === 'table') {
        include 'src/TableDecorator.php';
        $decorator = new TableDecorator($food);
      } else {
        include 'src/CardsDecorator.php';
        $decorator = new CardsDecorator($food);
      }
      

      $content= $decorator->getData();
      
      $variables['title'] = "DP Foods";
      $variables['content'] = $content;
      $variables['view'] = $view;
      $variables['sort'] = $sort;
      $template = new Template("default");
      $template->view('home-page', $variables);
    }
  }