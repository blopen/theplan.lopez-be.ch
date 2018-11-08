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
  `id` INT NOT NULL AUTO_INCREMENT,
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
  `id` INT NOT NULL AUTO_INCREMENT,
  `date` DATETIME NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `thePlan`.`exercise`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `thePlan`.`exercise` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `description` VARCHAR(255) NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `thePlan`.`plan`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `thePlan`.`plan` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `isPublic` TINYINT NULL,
  `exercise_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `thePlan`.`set`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `thePlan`.`set` (
  `id` INT NOT NULL AUTO_INCREMENT,
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
