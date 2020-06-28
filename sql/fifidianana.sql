DROP DATABASE IF EXISTS FIFIDIANANA;
CREATE DATABASE FIFIDIANANA;
USE FIFIDIANANA;

CREATE TABLE CANDIDAT(
    candidatId INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    candidatNumero INT NOT NULL,
    candidatName VARCHAR (50) NOT NULL,
    candidatFirstName VARCHAR (100) NOT NULL,
    candidatNombreVote INT
);

CREATE TABLE VOTE(
    voteId INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    voteTotal INT NOT NULL,
    voteBlanc INT NOT NULL,
    voteMort INT NOT NULL
);