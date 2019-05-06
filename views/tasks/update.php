
<?php
/* echo '<pre>';
  print_r($data['task']);
  echo '</pre>'; */
?>
<h2>Редактирование задачи <?= $data['task']['id'] ?> </h2>
<div class="container">
    <div class="row">
        <form method="POST" id="formUpdate" enctype="multipart/form-data" action="/tasks/update">
            <input type="hidden" name="id" value="<?= $data['task']['id'] ?>" />
            <div class="text item">
                <textarea name="text" id="text" rows="10" cols="80">
                    <?= $data['task']['text'] ?>
                </textarea>
            </div>
            <div class="text item">
                <?php if ($data['task']['status_id'] == 2) { ?>
                    <input type=checkbox   id="status_uncheck" class="status_uncheck"  name="status"   />  <?= $data['task']['value'] ?>
                <?php } else { ?>
                    <input type=checkbox id="status_check" class="status_check" name="status" checked  />   <?= $data['task']['value'] ?>
                <?php } ?>
            </div>
            <input style="margin:20px 0 0 0" type="submit" name="saveTask" class="saveTask" value="Сохранить"/>

        </form>
    </div>
</div>



