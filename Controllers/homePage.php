<?php
  
  class HomePageController extends Controller {
    function indexAction() {

      $dbh = DatabaseConnection::getInstance();
      $dbc = $dbh->getConnection();
      $food = new Food($dbc);
      $view = $_GET['view'] ?? 'table';
      $sort = $_GET['sort'] ?? 'name-asc';
      include 'src/SortProxy.php';
      $proxy = new SortProxy($food, $sort);
      $decorator = null;
      if($view === 'table') {
        include 'src/TableDecorator.php';
        $decorator = new TableDecorator($proxy);
      } else {
        include 'src/CardsDecorator.php';
        $decorator = new CardsDecorator($proxy);
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