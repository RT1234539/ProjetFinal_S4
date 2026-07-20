<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des clients</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        h1 {
            color: #333;
            margin-bottom: 30px;
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        table thead {
            background-color: #007bff;
            color: white;
        }
        
        table th,
        table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        table tbody tr:hover {
            background-color: #f9f9f9;
        }
        
        table tbody tr:nth-child(even) {
            background-color: #f5f5f5;
        }
        
        .solde {
            font-weight: bold;
            color: #28a745;
        }
        
        .operations {
            text-align: center;
            background-color: #e7f3ff;
            color: #0066cc;
            padding: 8px 12px;
            border-radius: 4px;
            display: inline-block;
            min-width: 50px;
        }
        
        .empty-message {
            padding: 40px;
            text-align: center;
            color: #999;
            font-size: 18px;
        }
        
        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 20px;
            background-color: #6c757d;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        
        .back-link:hover {
            background-color: #5a6268;
        }
        
        .stats {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }
        
        .stat-box {
            background-color: #f8f9fa;
            border-left: 4px solid #007bff;
            padding: 15px;
            border-radius: 4px;
            flex: 1;
            min-width: 200px;
        }
        
        .stat-box h3 {
            color: #666;
            font-size: 14px;
            margin-bottom: 8px;
            text-transform: uppercase;
        }
        
        .stat-box .value {
            font-size: 24px;
            font-weight: bold;
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="<?= base_url() ?>" class="back-link">← Retour</a>
        
        <h1>📊 Situation des comptes clients</h1>
        
        <?php if (!empty($clients) && is_array($clients)): ?>
            <div class="stats">
                <div class="stat-box">
                    <h3>Nombre de clients</h3>
                    <div class="value"><?= count($clients) ?></div>
                </div>
                <div class="stat-box">
                    <h3>Solde total</h3>
                    <div class="value"><?= number_format(array_sum(array_column($clients, 'solde')), 0, ',', ' ') ?> Ar</div>
                </div>
                <div class="stat-box">
                    <h3>Total d'opérations</h3>
                    <div class="value"><?= array_sum(array_column($clients, 'nombre_operations')) ?></div>
                </div>
            </div>
            
            <table>
                <thead>
                    <tr>
                        <th>Numéro de téléphone</th>
                        <th>Solde actuel</th>
                        <th>Nombre d'opérations</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($clients as $client): ?>
                        <tr>
                            <td>
                                <strong><?= esc($client['numero']) ?></strong>
                            </td>
                            <td class="solde">
                                <?= number_format($client['solde'], 0, ',', ' ') ?> Ar
                            </td>
                            <td>
                                <span class="operations"><?= esc($client['nombre_operations']) ?></span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="empty-message">
                <p>Aucun client trouvé pour le moment.</p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
