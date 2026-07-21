DROP VIEW IF EXISTS v_solde;
DROP VIEW IF EXISTS v_gains_complet;
DROP TABLE IF EXISTS operation_utilisateur;
DROP TABLE IF EXISTS operateur_externe;
DROP TABLE IF EXISTS autre_operateur;
DROP TABLE IF EXISTS frais;
DROP TABLE IF EXISTS operation;
DROP TABLE IF EXISTS prefix;
DROP TABLE IF EXISTS utilisateur;
DROP TABLE IF EXISTS role;

CREATE TABLE role (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    role VARCHAR(20) NOT NULL
);

INSERT INTO role (id, role) VALUES (1, 'admin'), (2, 'client');

CREATE TABLE utilisateur (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    numero VARCHAR(10) NOT NULL,
    id_role INTEGER NOT NULL DEFAULT 2
);

CREATE TABLE prefix (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    prefix VARCHAR(3) NOT NULL,
    nom VARCHAR(50) NOT NULL
);

INSERT INTO prefix (prefix, nom) VALUES
    ('034', 'Telma'),
    ('033', 'Telma');

CREATE TABLE operation (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    libelle VARCHAR(20) NOT NULL
);

INSERT INTO operation (libelle) VALUES
    ('depot'),
    ('retrait'),
    ('transfert'),
    ('transfert_externe');

CREATE TABLE frais (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    montant1 REAL NOT NULL,
    montant2 REAL NOT NULL,
    frais REAL NOT NULL,
    id_operation INTEGER NOT NULL,
    FOREIGN KEY (id_operation) REFERENCES operation (id)
);

CREATE TABLE autre_operateur (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    prefix VARCHAR(3) NOT NULL,
    nom VARCHAR(50) NOT NULL
);

INSERT INTO autre_operateur (prefix, nom) VALUES
    ('032', 'Airtel'),
    ('033', 'Orange'),
    ('031', 'Bip');


CREATE TABLE operateur_externe (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nom VARCHAR(100) NOT NULL,
    commission_pct REAL NOT NULL DEFAULT 0,
    id_autre_operateur INTEGER NOT NULL,
    FOREIGN KEY (id_autre_operateur) REFERENCES autre_operateur(id)
);

INSERT INTO operateur_externe (nom, commission_pct, id_autre_operateur) VALUES
    ('Orange Money', 2.5, 1),
    ('Airtel Money', 1.5, 2),
    ('Bip Cash', 3.0, 3);

CREATE TABLE operation_utilisateur (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    id_operation INTEGER NOT NULL,
    id_utilisateur INTEGER NOT NULL,
    montant REAL NOT NULL,
    id_frais INTEGER,
    date TEXT NOT NULL,
    numero_dest VARCHAR(20) DEFAULT NULL,
    id_operateur_externe INTEGER DEFAULT NULL,
    FOREIGN KEY (id_operation) REFERENCES operation (id),
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateur (id),
    FOREIGN KEY (id_frais) REFERENCES frais (id),
    FOREIGN KEY (id_operateur_externe) REFERENCES operateur_externe (id)
);

DROP VIEW IF EXISTS v_gains_complet;

CREATE VIEW v_gains_complet AS
SELECT
    op.id,
    op.libelle AS operation,
    SUM(ou.montant) AS total_montant,
    SUM(f.frais) AS total_frais
FROM
    operation_utilisateur ou
    JOIN operation op ON ou.id_operation = op.id
    LEFT JOIN frais f ON ou.id_frais = f.id
GROUP BY
    op.id,
    op.libelle;

DROP VIEW IF EXISTS v_solde;

CREATE VIEW v_solde AS
SELECT
    u.id AS id_utilisateur,
    u.numero,
    u.id_role,
    COALESCE(SUM(ou.montant), 0) AS solde
FROM utilisateur u
LEFT JOIN operation_utilisateur ou
    ON u.id = ou.id_utilisateur
GROUP BY u.id, u.numero, u.id_role;
