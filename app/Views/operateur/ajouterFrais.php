<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des frais</title>
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
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }

        .table th {
            background-color: #e9ecef;
        }

        .form-group {
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center mb-4">Gestion des frais</h1>

        <?php if (isset($message)): ?>
            <div class="alert alert-info">
                <strong>Message :</strong>
                <?php
                if (is_array($message) || is_object($message)) {
                    var_dump($message);
                } else {
                    echo htmlspecialchars($message);
                }
                ?>
            </div>
        <?php endif; ?>

        <?php if (isset($liste)): ?>
            <div class="card">
                <div class="card-header">
                    Liste des frais (<?= count($liste) ?> enregistrements)
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Montant min</th>
                                <th>Montant max</th>
                                <th>Frais</th>
                                <th>Opération</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($liste as $item): ?>
                                <tr>
                                    <td><?= $item['id'] ?></td>
                                    <td><?= $item['montant1'] ?> Ar</td>
                                    <td><?= $item['montant2'] ?> Ar</td>
                                    <td><strong><?= $item['frais'] ?> Ar</strong></td>
                                    <td>
                                        <?php
                                        $libelle = '';
                                        if (isset($operations)) {
                                            foreach ($operations as $o) {
                                                if ($o['id'] == $item['id_operation']) {
                                                    $libelle = $o['libelle'];
                                                    break;
                                                }
                                            }
                                        }
                                        echo $libelle ?: 'N/A';
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endif; ?>

        <!-- Formulaire d'ajout -->
        <div class="card">
            <div class="card-header">
                Ajouter un nouveau frais
            </div>
            <div class="card-body">
                <form action="<?= base_url() ?>frais/ajouter" method="post">
                    <?= csrf_field() ?>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Montant minimum</label>
                                <input name="min" type="number" min="0" step="0.01" class="form-control" placeholder="montant minimum">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Montant maximum</label>
                                <input name="max" type="number" min="0" step="0.01" class="form-control" placeholder="montant maximum">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Frais</label>
                                <input name="frais" type="number" min="0" step="0.01" class="form-control" placeholder="frais">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Opération</label>
                        <select name="operation" class="form-select">
                            <option value="">Sélectionner une opération</option>
                            <?php if (isset($operations)): ?>
                                <?php foreach ($operations as $o): ?>
                                    <option value="<?= $o['id'] ?>">
                                        <?= $o['libelle'] ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Valider</button>
                </form>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>