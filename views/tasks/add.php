<div class="container">
    <div class="row">
        <form method="POST" id="formAdd" enctype="multipart/form-data" action="/tasks/add">

            <div class="name item">
                <input required="" type="text" name="name" placeholder="Имя" value=""/>
            </div>

            <div class="email item">
                <input required="" type="email" name="email" placeholder="email" value=""/>
            </div>

            <div class="text item">
                <textarea placeholder="описание задачи" name="text" id="text" rows="10" cols="80"></textarea>
            </div>
            <input type="submit" name="addTask" class="addTask" value="Сохранить"/>

        </form>
    </div>
</div>
