<h1 style="text-align: center">Список Задач</h1>
<div class="container">
    <div class="row">
            <h4>Сортировать</h4>
            <form id="sort" name="sortName">
                <select id="sortName">
                    <option>Выберите из списка</option>
                    <option value="1">По имени</option>
                    <option value="2">По email</option>
                    <option value="3">По статусу</option>
                </select>
            </form>
        <?php if ($data) { 
            ?>
            <div class="tasksList">
            <?php foreach ($data['tasks'] as $task) { ?>
                <div class="col-lg-4">
                    <div class="task" style="margin: 30px 0 0 0">
                        <h3>Задача № <?= $task['id'] ?></h3>
                        <form method="POST" action="tasks/update">
                            <input type="hidden" name="id" value="<?= $task['id'] ?>" />
                            <div class="username">
                                <span>Имя :</span>   <span><?= $task['username'] ?></span>                    
                            </div>
                            <div class="useremail">
                                <span>Email :</span> <span><?= $task['useremail'] ?></span>
                            </div>
                            <div class="text">
                                <span>Описание :</span>
                                <span name="text" ><?= $task['text'] ?></span>
                            </div>

                            <div class="status">
                                <span>Статус :</span> 
                                <span><?= $task['value'] ?></span>
                            </div>
                            <?php if (!empty($_SESSION['admin'])) { ?>
                                <input type="submit" name="updateTask" class="updateTask"  id="<?= $task['id'] ?>" value="редактировать"/>
                            <?php } ?>
                        </form>
                    </div>
                </div>
            <?php } ?>
                </div>
        <?php } else { ?>
            <span>Нет ни одной задачи</span>
        <?php } ?>
    </div>
</div>


<?php 

// Проверяем нужны ли стрелки назад 
if ($data['page'] != 1) $pervpage = '<a href= ./?page=1><<</a> 
                               <a href= ./?page='. ($data['page'] - 1) .'><</a> '; 
// Проверяем нужны ли стрелки вперед 
if ($data['page'] != $data['total']) $nextpage = ' <a href= ./?page='. ($data['page'] + 1) .'>></a> 
                                   <a href= ./?page=' .$data['total']. '>>></a>'; 

// Находим две ближайшие станицы с обоих краев, если они есть 
if($data['page'] - 2 > 0) $page2left = ' <a href= ./?page='. ($data['page'] - 2) .'>'. ($data['page'] - 2) .'</a> | '; 
if($data['page'] - 1 > 0) $page1left = '<a href= ./?page='. ($data['page'] - 1) .'>'. ($data['page'] - 1) .'</a> | '; 
if($data['page'] + 2 <= $data['total']) $page2right = ' | <a href= ./?page='. ($data['page'] + 2) .'>'. ($data['page'] + 2) .'</a>'; 
if($data['page'] + 1 <= $data['total']) $page1right = ' | <a href= ./?page='. ($data['page'] + 1) .'>'. ($data['page'] + 1) .'</a>'; 

// Вывод меню 
echo $pervpage.$page2left.$page1left.'<b>'.$data['page'].'</b>'.$page1right.$page2right.$nextpage; 
?>


<script>
    $(function () {


        $('#sortName').on('change', function () {
            var sort = $(this).val();
            $.ajax({
                url: 'main/index',
                method: 'POST',
                data: {'sort': sort},

                success: function (data) {
                    $('body').empty();
                    $('body').append(data);
                },
                error: function (data) {
                    // console.log(data);
                    alert('Произошла ошибка');
                }
            }, sort);
        });
    });

</script>
