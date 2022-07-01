<?php

require_once "./view/layout/head.php";


function printTree($data, $level = 0)
{
    foreach ($data as $k => $v) {
        $level++;
        $isArray = is_array($v[0]) || isset($v[0]);
        if ($isArray) {
            echo ("<li class=''>" . $k);
            echo "<ul>";
            printTree($v[0], $level);
            echo "</ul></li>";
        } else {
            echo ("<li class=''>" . $k . "</li>");
        }
    }
}
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-7">
            <ul id="categories" class="card">
                <li class="">Корневой
                    <ul>
                        <?php printTree($rc_array); ?>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="col-5 border rounded">
            <ul class="nav nav-pills nav-fill border-bottom">
                <li class="nav-item">
                    <a class="nav-link" href="?controller=rating&action=create">+ категорию</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Редактировать категорию</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">+ уровень</a>
                </li>
            </ul>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">№</th>
                        <th scope="col">Уровень</th>
                        <th scope="col">Баллы</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>