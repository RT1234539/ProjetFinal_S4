DROP TABLE IF EXISTS operation_utilisateur;

DROP TABLE IF EXISTS frais;

DROP TABLE IF EXISTS operation;

DROP TABLE IF EXISTS utilisateur;

DROP TABLE IF EXISTS prefix;

CREATE TABLE
    utilisateur (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        numero VARCHAR(10) NOT NULL
    );

CREATE TABLE
    prefix (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        prefix VARCHAR(3) NOT NULL
    );

CREATE TABLE
    operation (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        libelle VARCHAR(10) NOT NULL
    );

INSERT INTO
    operation (libelle)
VALUES
    ('depot'),
    ('retrait'),
    ('transfert');

CREATE TABLE
    frais (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        montant1 REAL NOT NULL,
        montant2 REAL NOT NULL,
        frais REAL NOT NULL,
        id_operation INTEGER NOT NULL,
        FOREIGN KEY (id_operation) REFERENCES operation (id)
    );

CREATE TABLE
    operation_utilisateur (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        id_operation INTEGER NOT NULL,
        id_utilisateur INTEGER NOT NULL,
        montant REAL NOT NULL,
        id_frais INTEGER,
        date TEXT NOT NULL,
        FOREIGN KEY (id_operation) REFERENCES operation (id),
        FOREIGN KEY (id_utilisateur) REFERENCES utilisateur (id),
        FOREIGN KEY (id_frais) REFERENCES frais (id)
    );