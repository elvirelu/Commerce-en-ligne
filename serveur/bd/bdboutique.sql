CREATE DATABASE IF NOT EXISTS bdboutique DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE bdboutique;

DROP TABLE IF EXISTS membres;
CREATE TABLE membres (
  nom varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  prenom varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  courriel varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  sexe varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  datedenaissance date COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS connexion;
CREATE TABLE connexion (
  courriel varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  motdepass varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  role varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  statut varchar(2) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;