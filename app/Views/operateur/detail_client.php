<!DOCTYPE html>
<html class="light" lang="fr">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Détail Client - Admin Mobile Money</title>
<?= view('include/tailwind_head') ?>
</head>
<body class="bg-background text-on-background min-h-screen flex">
<?= view('include/sidebar_admin', ['active' => 'clients']) ?>
<main class="flex-1 lg:ml-72 flex flex-col min-h-screen">
<header class="flex justify-between items-center w-full px-gutter h-16 sticky top-0 z-40 bg-surface shadow-sm">
<div class="flex items-center gap-lg">
<button class="lg:hidden p-xs rounded-full hover:bg-surface-container">
<span class="material-symbols-outlined">menu</span>
</button>
<h2 class="font-headline-md text-headline-md text-on-surface">Détail Client</h2>
</div>
</header>
<div class="flex-1 p-gutter max-w-[1200px] w-full mx-auto">

<!-- Client Info Card -->
<div class="bg-white rounded-xl shadow-sm border border-outline-variant/30 overflow-hidden mb-xl">
<div class="p-lg border-b border-outline-variant/30 font-label-md text-on-primary bg-primary flex items-center gap-sm">
<span class="material-symbols-outlined text-[20px]">person</span>
Informations du Client
</div>
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<tbody class="divide-y divide-outline-variant/20">
<tr class="hover:bg-primary/5 transition-colors">
<td class="px-lg py-md font-label-md text-label-md text-secondary w-1/3">Numéro</td>
<td class="px-lg py-md font-label-md text-label-md text-primary"><?= esc($client['numero']); ?></td>
</tr>
<tr class="hover:bg-primary/5 transition-colors">
<td class="px-lg py-md font-label-md text-label-md text-secondary">Solde actuel</td>
<td class="px-lg py-md font-label-md text-label-md text-on-surface">
<span class="px-sm py-1 bg-green-100 text-green-800 rounded-full font-label-md"><?= number_format($client['solde'], 2, ',', ' '); ?> Ar</span>
</td>
</tr>
<tr class="hover:bg-primary/5 transition-colors">
<td class="px-lg py-md font-label-md text-label-md text-secondary">Nombre d'opérations</td>
<td class="px-lg py-md font-label-md text-label-md text-on-surface"><?= $client['nombre_operations']; ?></td>
</tr>
</tbody>
</table>
</div>
</div>

<!-- Historique Card -->
<div class="bg-white rounded-xl shadow-sm border border-outline-variant/30 overflow-hidden mb-xl">
<div class="p-lg border-b border-outline-variant/30 font-label-md text-on-primary bg-secondary flex items-center gap-sm">
<span class="material-symbols-outlined text-[20px]">history</span>
Historique des 5 dernières opérations
</div>
<?php if (!empty($historique)): ?>
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead class="bg-surface-container-low border-b border-outline-variant/30">
<tr>
<th class="px-lg py-md font-label-md text-label-md text-secondary whitespace-nowrap">Date</th>
<th class="px-lg py-md font-label-md text-label-md text-secondary whitespace-nowrap">Opération</th>
<th class="px-lg py-md font-label-md text-label-md text-secondary whitespace-nowrap text-right">Montant</th>
</tr>
</thead>
<tbody class="divide-y divide-outline-variant/20">
<?php foreach ($historique as $h): ?>
<tr class="hover:bg-primary/5 transition-colors">
<td class="px-lg py-md font-label-md text-label-md text-secondary"><?= esc($h['date']); ?></td>
<td class="px-lg py-md font-label-md text-label-md text-on-surface"><?= esc($h['operation']); ?></td>
<td class="px-lg py-md font-label-md text-label-md text-on-surface text-right">
<?= number_format($h['montant'], 2, ',', ' '); ?> Ar
</td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
<?php else: ?>
<div class="p-md text-center text-secondary">
Aucune opération enregistrée.
</div>
<?php endif; ?>
</div>

<!-- Actions -->
<div class="flex flex-col sm:flex-row gap-md mt-xl">
<a href="<?= base_url('clients'); ?>" class="inline-flex items-center justify-center gap-xs px-md py-sm rounded-xl border border-outline-variant hover:bg-surface-container transition-colors font-label-md text-secondary">
<span class="material-symbols-outlined text-[20px]">arrow_back</span>
Retour à la liste
</a>
</div>

</div>
</main>
</body>
</html>
