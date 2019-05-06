<?php

class TasksController extends Controller {

    // public $layout = 'other.php';//так можно подключить другой шаблон к странице
    public function actionIndex() {
        
    }

    public function actionAdd() {
        $model = new Tasks();
        $data = [];
        if (!empty($_POST['addTask'])) {
            $data['task'] = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'text' => $_POST['text'],
                'status_id' => 1
            ];

            if ($model->AddTask($data)) {
                header("Location:/");
            }
        }
     
        $this->out('add.php', $data);
    }

    public function actionUpdate() {

        $model = new Tasks();
        $data = [];
        $id = (int) $_POST['id'];
        $task = $model->getTask($id);
        $data['task'] = $task;

        if (!empty($_POST['saveTask'])) {
            $dataUpdate = $_POST;

            if ($model->Update($dataUpdate))
                header("Location:/");
        }

        $this->out('update.php', $data);
    }

}
