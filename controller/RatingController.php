<?php

require_once "model/RatingProvider.php";
$pdo = require 'db.php';

session_start();

$rp = new RatingProvider($pdo);
$rc_array = $rp->getRatingCategories();

if (isset($_GET['action']) &&  $_GET['action'] == 'create') {
    if ($_POST['parent_category'] || $_POST['category']) {
        $category = new RatingCategory($_POST['category'], $_POST['parent_category']);
        $rp->addCategory($category);
        header('Location: /?controller=rating');
    }
    require_once 'View/rating/create.php';
} else {
    require_once 'View/rating/index.php';
}
