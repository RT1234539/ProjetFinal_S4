<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détail Client</title>
</head>
<body>

    <h2>Détail du Client</h2>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>Numéro</th>
            <td><?= esc($client['numero']); ?></td>
        </tr>
        <tr>
            <th>Solde actuel</th>
            <td><?= number_format($client['solde'], 2, ',', ' '); ?> Ar</td>
        </tr>
        <tr>
            <th>Nombre d'opérations</th>
            <td><?= $client['nombre_operations']; ?></td>
        </tr>
    </table>

    <h3>Historique des 5 dernières opérations</h3>

    <?php if(!empty($historique)): ?>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>Date</th>
                <th>Opération</th>
                <th>Montant</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($historique as $h): ?>
                <tr>
                    <td><?= esc($h['date']); ?></td>
                    <td><?= esc($h['operation']); ?></td>
                    <td><?= number_format($h['montant'], 2, ',', ' '); ?> Ar</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <p>Aucune opération enregistrée.</p>
    <?php endif; ?>

    <br>
    <a href="<?= base_url('login/'.$client['id_utilisateur']); ?>">Page accueil client</a> |
    <a href="<?= base_url('operateur/clients'); ?>">← Retour à la liste</a>

</body>
</html>
