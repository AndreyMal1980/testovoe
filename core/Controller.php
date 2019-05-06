<?php

class Controller {

    public $layout = 'main.php';
    public $data = array();

    function __construct($dirView, $layout) {
        //$db = new db();
        $this->dirView = $dirView;

        /*
          echo '<pre>';
          print_r($this);
          echo '</pre>';
         * 
         */

        function __autoload($model) {
            //echo $class;
            include 'app/models/' . $model . '.php';
           
        }
    }

    public function out($view, $data = false, $nested = false) {

        // echo $this->dirView;
        if (!$nested) {
            // echo $this->layout;
            include 'layouts/' . $this->layout;
        } else {
            include 'views/' . $this->dirView . '/' . $view;
        }
    }
}

