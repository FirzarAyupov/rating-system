<?php

require_once "model/User.php";
require_once "model/UserProvider.php";

$pdo = require("db.php");

$pdo->exec('CREATE TABLE `user` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(45) NOT NULL,
    `login` VARCHAR(45) NOT NULL,
    `password` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `login_UNIQUE` (`login` ASC))');


$pdo->exec('CREATE TABLE `role` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `name_UNIQUE` (`name` ASC))');


$pdo->exec('CREATE TABLE `rating_category` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `parent_id` INT NOT NULL DEFAULT 0,
  `default_points` INT NULL,
  PRIMARY KEY (`id`))');

$pdo->exec('CREATE TABLE `rating` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `point` INT NOT NULL,
  `comment` VARCHAR(45) NULL,
  `date` DATETIME NULL,
  `rating_category_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  `author` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_rating_rating_category1_idx` (`rating_category_id` ASC),
  INDEX `fk_rating_user1_idx` (`user_id` ASC),
  INDEX `fk_rating_user2_idx` (`author` ASC),
  CONSTRAINT `fk_rating_rating_category1`
    FOREIGN KEY (`rating_category_id`)
    REFERENCES `rating_category` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_rating_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_rating_user2`
    FOREIGN KEY (`author`)
    REFERENCES `user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
');

$pdo->exec('CREATE TABLE IF NOT EXISTS `user_has_role` (
  `user_id` INT NOT NULL,
  `role_id` INT NOT NULL,
  PRIMARY KEY (`user_id`, `role_id`),
  INDEX `fk_user_has_role_role1_idx` (`role_id` ASC),
  INDEX `fk_user_has_role_user_idx` (`user_id` ASC),
  CONSTRAINT `fk_user_has_role_user`
    FOREIGN KEY (`user_id`)
    REFERENCES `user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_has_role_role1`
    FOREIGN KEY (`role_id`)
    REFERENCES `role` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)');
