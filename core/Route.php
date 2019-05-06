<?php

class Route {

    public $dirView;
    public $params = [];

    public function __construct($path) {
        echo '<br/>';  echo '<br/>';  echo '<br/>';  echo '<br/>';  echo '<br/>';  echo '<br/>';  echo '<br/>';  echo '<br/>';
        echo $path;
        $path = substr($path,1);
       
        //echo '<br>';
        $this->route = explode("/", $path);
       /* echo '<pre>';
        print_r($this->route);
           echo '</pre>';*/
        $this->dirView = $this->run();
      
    }

    private function run() {
        $controller = 'Main';
        $action = 'index';
        
        echo $controller;
         //echo $this->route[0];
       // echo stristr($this->route[0],'?');
        if (!empty($this->route[0]) && !stristr($this->route[0],'?')) {
            $controller = $this->route[0];
        }
        if (!empty($this->route[1])) {
            $action = $this->route[1];
        }
        if ($controller == 'index.php') {
            $controller = 'Main';
            $action = 'index';
        }

        $actionName = 'action' . ucfirst($action);

        //  echo $controller.'<br>';
        // echo $actionName;

        if (file_exists('app/controllers/' . $controller . 'Controller.php')) {
            $this->runController($controller, $actionName);
        } else {
            $controller = 'MainController';
            $actionName = 'actionIndex';
            $this->runController($controllerName, $actionName);
        }
    }

    private function runController($controller, $actionName) {
        $controllerName = $controller . 'Controller';
        // $modelName = ucfirst($controller);

        if ($controller){
            echo 'jjkhjkjkh';
            include "app/controllers/" . $controller . 'Controller.php';
        }
        if (is_dir('views/' . $controller) === false)
            throw new Exception('Надо создать каталог  представления');

        $ctrl = new $controllerName($controller, $layout);

        if (method_exists($ctrl, $actionName)) {
            $ctrl->$actionName();
        } else {
         //   throw new Exception('error 404');
        }
        //}
    }

}