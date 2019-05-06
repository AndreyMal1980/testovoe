<form method="POST" action="">
    </br> </br>
    <div class="form-group">
        <label for="inputName" >Имя</label>
        <input type="text" name="login" placeholder="Имя">
    </div>
    </br>
    <div class="form-group">
        <label for="password">Пароль</label>
        <input type="password" name="password" placeholder="password">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-default" name="avtorization">Войти</button>
    </div>
    
    <div class="error"><?= $data ?></div>
</form>
