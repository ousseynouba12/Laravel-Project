-- Script SQL pour la création d'une base de données de gestion de dons
-- Création de la base de données
CREATE DATABASE IF NOT EXISTS gestion_dons;
USE gestion_dons;

-- Table des énumérations de sexe
CREATE TABLE sexe (
    id INT PRIMARY KEY AUTO_INCREMENT,
    libelle VARCHAR(10) NOT NULL
);

-- Insertion des valeurs d'énumération de sexe
INSERT INTO sexe (libelle) VALUES ('Masculin'), ('Feminin');

-- Table Administrateur
CREATE TABLE administrateur (
    idAdmin INT PRIMARY KEY AUTO_INCREMENT,
    passwd VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Table Association
CREATE TABLE association (
    idAssociation INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100) NOT NULL,
    montantTotal INT DEFAULT 0,
    idAdmin INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (idAdmin) REFERENCES administrateur(idAdmin)
);

-- Table Donateur
CREATE TABLE donateur (
    idDonateur INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    passwd VARCHAR(255) NOT NULL,
    ddn DATE NOT NULL,
    idSexe INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (idSexe) REFERENCES sexe(id)
);

-- Table Don
CREATE TABLE don (
    idDon INT PRIMARY KEY AUTO_INCREMENT,
    montant INT NOT NULL,
    date DATE NOT NULL,
    type VARCHAR(50) NOT NULL,
    idDonateur INT NOT NULL,
    idAssociation INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (idDonateur) REFERENCES donateur(idDonateur),
    FOREIGN KEY (idAssociation) REFERENCES association(idAssociation)
);

-- Procédure stockée pour mettre à jour le montant total d'une association après un don
DELIMITER //
CREATE TRIGGER update_montant_total_after_don
AFTER INSERT ON don
FOR EACH ROW
BEGIN
    UPDATE association
    SET montantTotal = montantTotal + NEW.montant
    WHERE idAssociation = NEW.idAssociation;
END //
DELIMITER ;

-- Procédure stockée pour mettre à jour le montant total d'une association après suppression d'un don
DELIMITER //
CREATE TRIGGER update_montant_total_after_delete
AFTER DELETE ON don
FOR EACH ROW
BEGIN
    UPDATE association
    SET montantTotal = montantTotal - OLD.montant
    WHERE idAssociation = OLD.idAssociation;
END //
DELIMITER ;

-- Vues pour les rapports

-- Vue des dons par donateur
CREATE VIEW v_dons_par_donateur AS
SELECT 
    d.idDonateur,
    d.nom,
    d.prenom,
    COUNT(don.idDon) AS nombre_dons,
    SUM(don.montant) AS montant_total
FROM 
    donateur d
LEFT JOIN 
    don ON d.idDonateur = don.idDonateur
GROUP BY 
    d.idDonateur, d.nom, d.prenom;

-- Vue des dons par association
CREATE VIEW v_dons_par_association AS
SELECT 
    a.idAssociation,
    a.nom,
    COUNT(don.idDon) AS nombre_dons,
    a.montantTotal
FROM 
    association a
LEFT JOIN 
    don ON a.idAssociation = don.idAssociation
GROUP BY 
    a.idAssociation, a.nom, a.montantTotal;

