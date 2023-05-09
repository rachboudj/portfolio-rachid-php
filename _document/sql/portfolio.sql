-- MySQL Script generated by MySQL Workbench
-- Tue May  9 11:17:31 2023
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema portfolio-rachid
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema portfolio-rachid
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `portfolio-rachid` DEFAULT CHARACTER SET utf8 ;
USE `portfolio-rachid` ;

-- -----------------------------------------------------
-- Table `portfolio-rachid`.`commentaires`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `portfolio-rachid`.`commentaires` (
  `id_commentaire` INT NOT NULL AUTO_INCREMENT,
  `description` VARCHAR(255) NOT NULL,
  `auteur` VARCHAR(255) NOT NULL,
  `created_at` DATETIME NOT NULL,
  `modified_at` DATETIME NOT NULL,
  `status` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`id_commentaire`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `portfolio-rachid`.`categories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `portfolio-rachid`.`categories` (
  `id_categorie` INT NOT NULL AUTO_INCREMENT,
  `libelle` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_categorie`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `portfolio-rachid`.`projets`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `portfolio-rachid`.`projets` (
  `id_projet` INT NOT NULL AUTO_INCREMENT,
  `titre` VARCHAR(255) NOT NULL,
  `role` VARCHAR(255) NOT NULL,
  `description` VARCHAR(45) NOT NULL,
  `url_github` VARCHAR(255) NOT NULL,
  `url_site` VARCHAR(45) NOT NULL,
  `image` VARCHAR(45) NOT NULL,
  `created_at` DATETIME NOT NULL,
  `modified_at` DATETIME NOT NULL,
  `status` VARCHAR(20) NOT NULL,
  `commentaires_id_commentaire` INT NOT NULL,
  `categories_id_categorie` INT NOT NULL,
  PRIMARY KEY (`id_projet`, `commentaires_id_commentaire`, `categories_id_categorie`),
  INDEX `fk_projets_commentaires1_idx` (`commentaires_id_commentaire` ASC),
  INDEX `fk_projets_categories1_idx` (`categories_id_categorie` ASC),
  CONSTRAINT `fk_projets_commentaires1`
    FOREIGN KEY (`commentaires_id_commentaire`)
    REFERENCES `portfolio-rachid`.`commentaires` (`id_commentaire`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_projets_categories1`
    FOREIGN KEY (`categories_id_categorie`)
    REFERENCES `portfolio-rachid`.`categories` (`id_categorie`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `portfolio-rachid`.`utilisateurs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `portfolio-rachid`.`utilisateurs` (
  `id_utilisateur` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(255) NOT NULL,
  `prenom` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `mdp` VARCHAR(255) NOT NULL,
  `telephone` VARCHAR(12) NULL,
  `role` VARCHAR(45) NULL,
  PRIMARY KEY (`id_utilisateur`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `portfolio-rachid`.`utilisateurs_has_articles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `portfolio-rachid`.`utilisateurs_has_articles` (
  `utilisateurs_id_utilisateur` INT NOT NULL,
  `articles_id_article` INT NOT NULL,
  PRIMARY KEY (`utilisateurs_id_utilisateur`, `articles_id_article`),
  INDEX `fk_utilisateurs_has_articles_articles1_idx` (`articles_id_article` ASC),
  INDEX `fk_utilisateurs_has_articles_utilisateurs1_idx` (`utilisateurs_id_utilisateur` ASC),
  CONSTRAINT `fk_utilisateurs_has_articles_utilisateurs1`
    FOREIGN KEY (`utilisateurs_id_utilisateur`)
    REFERENCES `portfolio-rachid`.`utilisateurs` (`id_utilisateur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_utilisateurs_has_articles_articles1`
    FOREIGN KEY (`articles_id_article`)
    REFERENCES `portfolio-rachid`.`projets` (`id_projet`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `portfolio-rachid`.`articles_has_categories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `portfolio-rachid`.`articles_has_categories` (
  `articles_id_article` INT NOT NULL,
  `categories_id_categorie` INT NOT NULL,
  PRIMARY KEY (`articles_id_article`, `categories_id_categorie`),
  INDEX `fk_articles_has_categories_categories1_idx` (`categories_id_categorie` ASC),
  INDEX `fk_articles_has_categories_articles1_idx` (`articles_id_article` ASC),
  CONSTRAINT `fk_articles_has_categories_articles1`
    FOREIGN KEY (`articles_id_article`)
    REFERENCES `portfolio-rachid`.`projets` (`id_projet`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_articles_has_categories_categories1`
    FOREIGN KEY (`categories_id_categorie`)
    REFERENCES `portfolio-rachid`.`categories` (`id_categorie`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `portfolio-rachid`.`utilisateurs_has_projets`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `portfolio-rachid`.`utilisateurs_has_projets` (
  `utilisateurs_id_utilisateur` INT NOT NULL,
  `projets_id_projet` INT NOT NULL,
  PRIMARY KEY (`utilisateurs_id_utilisateur`, `projets_id_projet`),
  INDEX `fk_utilisateurs_has_projets_projets1_idx` (`projets_id_projet` ASC),
  INDEX `fk_utilisateurs_has_projets_utilisateurs1_idx` (`utilisateurs_id_utilisateur` ASC),
  CONSTRAINT `fk_utilisateurs_has_projets_utilisateurs1`
    FOREIGN KEY (`utilisateurs_id_utilisateur`)
    REFERENCES `portfolio-rachid`.`utilisateurs` (`id_utilisateur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_utilisateurs_has_projets_projets1`
    FOREIGN KEY (`projets_id_projet`)
    REFERENCES `portfolio-rachid`.`projets` (`id_projet`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `portfolio-rachid`.`commentaires_has_commentaires`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `portfolio-rachid`.`commentaires_has_commentaires` (
  `commentaires_id_commentaire` INT NOT NULL,
  `commentaires_id_commentaire1` INT NOT NULL,
  PRIMARY KEY (`commentaires_id_commentaire`, `commentaires_id_commentaire1`),
  INDEX `fk_commentaires_has_commentaires_commentaires2_idx` (`commentaires_id_commentaire1` ASC),
  INDEX `fk_commentaires_has_commentaires_commentaires1_idx` (`commentaires_id_commentaire` ASC),
  CONSTRAINT `fk_commentaires_has_commentaires_commentaires1`
    FOREIGN KEY (`commentaires_id_commentaire`)
    REFERENCES `portfolio-rachid`.`commentaires` (`id_commentaire`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_commentaires_has_commentaires_commentaires2`
    FOREIGN KEY (`commentaires_id_commentaire1`)
    REFERENCES `portfolio-rachid`.`commentaires` (`id_commentaire`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
