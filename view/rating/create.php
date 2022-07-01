<?php
require_once "View/layout/head.php";

function printTreeSelectOptions($data, $level = 0)
{
    foreach ($data as $k => $v) {
        $level++;
        $isArray = is_array($v[0]) || isset($v[0]);
        if ($isArray) {
            echo ("<option value={$v['id']}>" . str_repeat('-', --$level) . $k . "</option>");
            printTreeSelectOptions($v[0], $level);
        } else {
            echo ("<option value={$v['id']}>" . str_repeat('-', $level) . $k . "</option>");
        }
    }
}

?>

<div class="container mt-5">
    <form method="POST">
        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect">Родитель</label>
            <select name="parent_category" class="form-select" id="inputGroupSelect">
                <option selected disabled>Выберите родительский элемент</option>
                <option value="0">Корневая</option>
                <?php printTreeSelectOptions($rc_array); ?>
            </select>
        </div>
        <div class="input-group mb-3">
            <input name="category" type="text" class="form-control" placeholder="Название категории" aria-label="Название категории" aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Создать</button>
        </div>
    </form>
</div>
</div>