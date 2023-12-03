<?php

class Controller {
  function runAction($actionName) {
    $actionName .= 'Action';
    if(method_exists($this, $actionName)) {
      $this->$actionName();
    } else {
      $variables['title'] = "DP Foods";
      $template = new Template("default");
      $template->view('404', $variables);
    }
  }
}