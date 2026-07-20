<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des préfixes</title>
</head>
<body>

<h2>Liste des préfixes</h2>

<a href="<?= base_url('prefix/form') ?>">Ajouter un nouveau préfixe</a>

<?php if (! empty($prefixes) && is_array($prefixes)): ?>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Préfixe</th>
                <th>Opérateur</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($prefixes as $prefix): ?>
                <tr>
                    <!-- Selon le retourType défini dans le modèle -->
                    <td><?= esc($prefix->id) ?></td>
                    <td><?= esc($prefix->prefix) ?></td> <!-- Utilisez 'prefix' ou 'code' selon votre colonne -->
                    <td><?= esc($prefix->nom) ?></td> <!-- Utilisez 'nom' ou 'operateur' selon votre colonne -->
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Aucun préfixe trouvé.</p>
<?php endif; ?>
    
</body>
</html>