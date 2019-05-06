<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Le styles -->
        <link href="/css/bootstrap.css" rel="stylesheet">
        <link href="/css/bootstrap-grid.min.css" rel="stylesheet">
        <script src="/js/jquery-1.10.1.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
          <link href="/css/style.css" rel="stylesheet">
        <script src="/ckeditor/ckeditor.js"></script>
        <script src="/js/validator_form_registration.js"></script>

    </head>
    <body>
          
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="brand" href="/">Главная</a>
                    <a class="brand" href="/tasks/add">Добавить задачу</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            
                            <?php 
                           
                            if($_SESSION['admin']) {
                            ?>
                            <li><a href="/main/logout">Выйти</a></li>
                            <?php } else { ?>
                             <li><a href="/main/login">Войти</a></li>
                            <?php } ?>
                          
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>

        <div class="container" style="margin-top: 80px">
            <?php $this->out($view, $data, true); /* echo $data */ ?> 
        </div> <!-- /container -->
    </body>
</html>









