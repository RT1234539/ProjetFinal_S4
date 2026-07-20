-- 1. Insertion des préfixes
INSERT INTO prefix (prefix) VALUES 
('034'),
('032'),
('038'),
('033');

-- 2. Insertion des utilisateurs (exemples de numéros de téléphone)
INSERT INTO utilisateur (numero) VALUES 
('0341234567'),
('0329876543'),
('0381122334'),
('0335566778');

-- Note : La table 'operation' contient déjà ('depot', 'retrait', 'transfert')
-- ID 1 = depot, ID 2 = retrait, ID 3 = transfert

-- 3. Insertion des règles de frais (tranches de montants)
-- Exemple : pour un retrait (id_operation = 2) ou un transfert (id_operation = 3)
INSERT INTO frais (montant1, montant2, frais, id_operation) VALUES 
(1000.0, 10000.0, 200.0, 2),    -- Retrait : entre 1 000 et 10 000 -> 200 de frais
(10001.0, 50000.0, 500.0, 2),   -- Retrait : entre 10 001 et 50 000 -> 500 de frais
(50001.0, 200000.0, 1000.0, 2), -- Retrait : entre 50 001 et 200 000 -> 1000 de frais
(1000.0, 50000.0, 300.0, 3),    -- Transfert : entre 1 000 et 50 000 -> 300 de frais
(50001.0, 500000.0, 800.0, 3);  -- Transfert : entre 50 001 et 500 000 -> 800 de frais

-- 4. Insertion d'opérations effectuées par des utilisateurs
INSERT INTO operation_utilisateur (id_operation, id_utilisateur, montant, id_frais, date) VALUES 
(1, 1, 50000.0, NULL, '2026-03-01 08:30:00'),   -- Dépôt de 50 000 par l'user 1 (aucun frais)
(2, 1, 8000.0, 1, '2026-03-01 10:15:00'),      -- Retrait de 8 000 par l'user 1 (frais id 1 : 200)
(3, 2, 25000.0, 4, '2026-03-02 14:00:00'),     -- Transfert de 25 000 par l'user 2 (frais id 4 : 300)
(1, 3, 100000.0, NULL, '2026-03-02 16:45:00'),  -- Dépôt de 100 000 par l'user 3 (aucun frais)
(2, 3, 60000.0, 3, '2026-03-03 09:20:00');     -- Retrait de 60 000 par l'user 3 (frais id 3 : 1000)