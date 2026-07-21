INSERT INTO frais (montant1, montant2, frais, id_operation) VALUES 
(1000.0, 10000.0, 200.0, 2),    -- Retrait : entre 1 000 et 10 000 -> 200 de frais
(10001.0, 50000.0, 500.0, 2),   -- Retrait : entre 10 001 et 50 000 -> 500 de frais
(50001.0, 200000.0, 1000.0, 2), -- Retrait : entre 50 001 et 200 000 -> 1000 de frais
(1000.0, 50000.0, 300.0, 3),    -- Transfert : entre 1 000 et 50 000 -> 300 de frais
(50001.0, 500000.0, 800.0, 3);  -- Transfert : entre 50 001 et 500 000 -> 800 de frais
