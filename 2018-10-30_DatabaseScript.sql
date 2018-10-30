-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema thePlan
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `thePlan` ;

-- -----------------------------------------------------
-- Schema thePlan
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `thePlan` DEFAULT CHARACTER SET utf8 ;
USE `thePlan` ;

-- -----------------------------------------------------
-- Table `thePlan`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `thePlan`.`user` (
  `id` INT NOT NULL,
  `email` VARCHAR(100) NULL,
  `firstname` VARCHAR(100) NULL,
  `lastname` VARCHAR(100) NULL,
  `usercol` VARCHAR(45) NULL,
  `password` TEXT NULL,
  `token` TEXT NULL,
  `log_date` DATETIME NULL,
  `status` TINYINT(4) NULL,
  `rolle` TINYINT(4) NULL,
  `profilepic` VARCHAR(100) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `thePlan`.`session`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `thePlan`.`session` (
  `id` INT NOT NULL,
  `date` DATETIME NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `thePlan`.`exercise`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `thePlan`.`exercise` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NULL,
  `description` VARCHAR(255) NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `thePlan`.`plan`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `thePlan`.`plan` (
  `id` INT NOT NULL,
  `isPublic` TINYINT NULL,
  `exercise_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `thePlan`.`set`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `thePlan`.`set` (
  `id` INT NOT NULL,
  `weight` INT NULL,
  `repetition` INT NULL,
  `exercise_id` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `thePlan`.`session_set`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `thePlan`.`session_set` (
  `session_id` INT NOT NULL,
  `set_id` INT NOT NULL,
  PRIMARY KEY (`session_id`, `set_id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


INSERT INTO `user` (`id`, `email`, `firstname`, `lastname`, `password`, `token`, `log_date`, `status`, `rolle`, `profilepic`) VALUES
(1, 'nelson.lopez@backup.one', 'Nelson', 'Widmer', '752d35d14b6fdffac3ff3d962bcdf7b77323c88cfd692e61c3d112ecbaf354ec', '3311aeca887fb24defecb22b00cfa8', '2017-06-29 02:02:12', 1, 0, 'IchAug2016.jpg'),
(2, 'nelson.lopez@filesync.ch', 'Nelson', 'LOKO', '94395302b8861a62c2e9552f667d007af057db31a81de387c96322ff2c43e358', '8e1bbfd8cbe48535d119c62dbc0dda', '2017-06-29 12:05:18', 1, 0, NULL),
(4, 'nelson.lopez1806@gmail.com', 'Nelson', 'Lopez', '0b55630f0d13cd0cad3caa65961da523b9b14e1db47852ec5e45cd0e7181d37a', 'a88e1248b0831c41c733237c3409fc', '2017-07-02 12:26:16', 1, 0, NULL),
(5, 'nelson.lopez1806@gmail.com', 'Nelson', 'Lopez', '85ea7f74dac1ad47de132462400ffa135a4a64742fea1b61d0823a8efd2614d4', '6cd3c8234fb6dfc9665201cba42f01', '2017-08-10 10:35:17', 1, 0, NULL),
(10, 'kingkoshtnex@gmail.com', 'Kenan', 'Tabinas', '4fbcf30780984d666b4c3d61c01f4d4e519268dc1b8938af9c4ee586dc99a14d', 'd6270954c0eee77aba0f1300d1dcfd', '2018-10-30 06:41:02', 1, 0, NULL);
