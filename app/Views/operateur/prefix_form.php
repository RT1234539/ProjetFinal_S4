<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un préfixe</title>
</head>
<body>
    <?php if (session()->has('success')): ?>
        <div style="color: green; border: 1px solid green; padding: 10px; margin-bottom: 10px;">
            <?= session('success') ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('prefix/save') ?>" method="post">
        <?= csrf_field() ?> <!-- Ajout de la protection CSRF -->
        
        <label>Préfixe :</label>
        <input
            type="text"
            name="prefix"
            maxlength="3"
            minlength="3"
            pattern="[0-9]{3}"
            placeholder="Ex : 034"
            required>
        
        <label>Nom de l'opérateur :</label>
        <input
            type="text"
            name="nom"
            maxlength="50"
            placeholder="Ex : Telma"
            required>

        <button type="submit">Ajouter</button>
    </form>

    <p><a href="<?= base_url('prefix') ?>">Voir la liste</a></p>
</body>
</html>