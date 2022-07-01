<?php

try {
    return new PDO('mysql:host=localhost;dbname=rating', 'root', 'root');
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage();
    die();
}
