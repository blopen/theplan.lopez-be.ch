-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`user` (
  `id` INT NOT NULL,
  `email` VARCHAR(45) NULL,
  `password` VARCHAR(45) NULL,
  `surname` VARCHAR(45) NULL,
  `name` VARCHAR(45) NULL,
  `isPublic` TINYINT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`session`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`session` (
  `id` INT NOT NULL,
  `date` DATETIME NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`id`, `user_id`),
  INDEX `fk_session_user1_idx` (`user_id` ASC) VISIBLE,
  CONSTRAINT `fk_session_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `mydb`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`exercise`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`exercise` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NULL,
  `description` VARCHAR(255) NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`id`, `user_id`),
  INDEX `fk_exercise_user1_idx` (`user_id` ASC) VISIBLE,
  CONSTRAINT `fk_exercise_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `mydb`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`plan`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`plan` (
  `id` INT NOT NULL,
  `isPublic` VARCHAR(45) NULL,
  `user_id` INT NOT NULL,
  `exercise_id` INT NOT NULL,
  `isPublic` TINYINT NULL,
  PRIMARY KEY (`id`, `user_id`, `exercise_id`),
  INDEX `fk_plan_user1_idx` (`user_id` ASC) VISIBLE,
  INDEX `fk_plan_exercise1_idx` (`exercise_id` ASC) VISIBLE,
  CONSTRAINT `fk_plan_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `mydb`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_plan_exercise1`
    FOREIGN KEY (`exercise_id`)
    REFERENCES `mydb`.`exercise` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`set`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`set` (
  `id` INT NOT NULL,
  `weight` INT NULL,
  `repetition` INT NULL,
  `exercise_id` INT NOT NULL,
  `setcol` VARCHAR(45) NULL,
  PRIMARY KEY (`id`, `exercise_id`),
  INDEX `fk_set_exercise1_idx` (`exercise_id` ASC) VISIBLE,
  CONSTRAINT `fk_set_exercise1`
    FOREIGN KEY (`exercise_id`)
    REFERENCES `mydb`.`exercise` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`session_set`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`session_set` (
  `session_id` INT NOT NULL,
  `set_id` INT NOT NULL,
  INDEX `fk_session_has_set_set1_idx` (`set_id` ASC) VISIBLE,
  INDEX `fk_session_has_set_session1_idx` (`session_id` ASC) VISIBLE,
  PRIMARY KEY (`session_id`, `set_id`),
  CONSTRAINT `fk_session_has_set_session1`
    FOREIGN KEY (`session_id`)
    REFERENCES `mydb`.`session` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_session_has_set_set1`
    FOREIGN KEY (`set_id`)
    REFERENCES `mydb`.`set` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
