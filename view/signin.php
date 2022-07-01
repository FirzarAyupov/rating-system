<?php

include "head.php";

?>

<div class="container">
    <section class="row justify-content-center align-items-center h-100">
        <form class="col-4 align-items-center text-center p-4 mb-5" method="POST">
            <h3 class="fw-normal mb-3 pb-3">Авторизация</h3>

            <div class="form-outline mb-4">
                <input type="text" name="login" id="signin_form_login" class="form-control" placeholder="логин" />
            </div>

            <div class="form-outline mb-4">
                <input type="password" name="password" id="signin_form_pass" class="form-control" placeholder="пароль" />
            </div>

            <button type="submit" class="w-100 btn btn-primary btn-block">Войти</button>
        </form>
    </section>
</div>