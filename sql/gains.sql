DROP VIEW IF EXISTS v_gains_complet;

CREATE VIEW v_gains_complet AS
SELECT 
    op.id,
    op.libelle AS operation,
    SUM(ou.montant) AS total_montant,
    SUM(f.frais) AS total_frais
FROM operation_utilisateur ou
JOIN operation op ON ou.id_operation = op.id
LEFT JOIN frais f ON ou.id_frais = f.id
GROUP BY op.id, op.libelle;