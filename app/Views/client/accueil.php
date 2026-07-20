<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
</head>
<body>

    <h2><?= esc($client['numero']); ?></h2>

    <div style="border:2px solid #333; padding:20px; width:300px; margin:20px 0;">
        <h3>Solde actuel</h3>
        <p style="font-size:24px; font-weight:bold;">
            <?= number_format($client['solde'], 2, ',', ' '); ?> Ar
        </p>
    </div>
    <div>
        <a href="<?= base_url('client/solde'); ?>">
            <button style="padding:10px 20px; margin:5px;">Voir Solde</button>
        </a>

        <a href="<?= base_url('client/depot'); ?>">
            <button style="padding:10px 20px; margin:5px;">Dépôt</button>
        </a>

        <a href="<?= base_url('client/retrait'); ?>">
            <button style="padding:10px 20px; margin:5px;">Retrait</button>
        </a>

        <a href="<?= base_url('client/transfert'); ?>">
            <button style="padding:10px 20px; margin:5px;">Transfert</button>
        </a>

        <a href="<?= base_url('client/historique'); ?>">
            <button style="padding:10px 20px; margin:5px;">Historique</button>
        </a>
    </div>

    <br>
    <a href="<?= base_url('deconnexion'); ?>">Déconnexion</a>

</body>
</html>
