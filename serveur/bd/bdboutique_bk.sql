CREATE DATABASE IF NOT EXISTS bdboutique DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE bdboutique;

DROP TABLE IF EXISTS membres;
CREATE TABLE membres (
  idm int(11) PRIMARY KEY AUTO_INCREMENT,
  prenom varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  nom varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  courriel varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  sexe varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  datedenaissance date COLLATE utf8_unicode_ci DEFAULT NULL,
  photo varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS connexion;
CREATE TABLE connexion (
  idm int(11) NOT NULL,
  courriel varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  motdepass varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  role varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  statut varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  CONSTRAINT connexion_idm_FK FOREIGN KEY(idm) REFERENCES membres(idm)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;