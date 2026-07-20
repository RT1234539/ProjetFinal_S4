<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gains par opération</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
        }

        .card {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card-header {
            background-color: #28a745;
            color: white;
            font-weight: bold;
        }

        .card-header.total {
            background-color: #17a2b8;
        }

        .table th {
            background-color: #e9ecef;
        }

        .total-amount {
            font-size: 1.5em;
            font-weight: bold;
            color: #28a745;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center mb-4">📊 Gains par opération</h1>

        <!-- Affichage des gains par opération -->
        <?php if (isset($gainsParOperation)): ?>
            <div class="card">
                <div class="card-header">
                    Gains par opération
                    <span class="badge bg-light text-dark float-end"><?= count($gainsParOperation) ?> opération(s)</span>
                </div>
                <div class="card-body">
                    <?php if (!empty($gainsParOperation)): ?>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Opération</th>
                                    <th class="text-end">Montant total des gains</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($gainsParOperation as $gain): ?>
                                    <tr>
                                        <td><strong><?= $gain["operation"] ?></strong></td>
                                        <td class="text-end">
                                            <span class="badge bg-success">
                                                <?= $gain["total_montant"] ?> Ar
                                            </span>
                                        </td>
                                        <td class="text-end">
                                            <span class="badge bg-success">
                                                <?= $gain["total_frais"] ?> Ar
                                            </span>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <div class="alert alert-warning">
                            Aucun gain trouvé
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- Affichage du gain total -->
        <?php if (isset($gainTotal)): ?>
            <div class="card">
                <div class="card-header total">
                    Gain total
                </div>
                <div class="card-body text-center">
                    <div class="total-amount">
                        <?php
                        if (is_numeric($gainTotal)) {
                            echo number_format($gainTotal, 2, ',', ' ') . ' Ar';
                        } else {
                            var_dump($gainTotal);
                        }
                        ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- Lien de retour -->
        <div class="text-center mt-3">
            <a href="<?= base_url() ?>" class="btn btn-secondary">Retour</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>