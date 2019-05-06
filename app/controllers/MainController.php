<?php

class MainController extends Controller {

    // public $layout = 'other.php';//так можно подключить другой шаблон к странице

    public function actionIndex() {
        session_start();
        $model = new Tasks();
        $data = [];
        $num = 3;
        $page = $_GET['page'];
        $count = $model->getTasksTotal();
        $total = intval(($count - 1) / $num) + 1;
        $page = intval($page);
        if (empty($page) or $page < 0)
            $page = 1;
        if ($page > $total)
            $page = $total;
        $start = $page * $num - $num;

        $data['tasks'] = $model->getTasks($start, $num, $sort = '');
        $data['page'] = $page;
        $data['total'] = $total;
        $data['tasks'] = $model->getTasks($start, $num);

        $this->out('index.php', $data);
    }

    public function actionLogin() {

        if (isset($_POST['avtorization'])) {
            $login = $_POST['login'];
            $password = $_POST['password'];
            $model = new Main;
            if ($model->avtorization($login, $password)) {
                header("location: /");
            } else {
                $data = "Ошибка авторизации";
            }
        }
        $this->out('login.php', $data);
    }

    public function actionLogout() {
        session_start();
        unset($_SESSION['admin']);
        header("location: /main", true, 301);
    }

}
