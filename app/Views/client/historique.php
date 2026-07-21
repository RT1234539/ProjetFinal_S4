<!DOCTYPE html>
<html class="light" lang="fr">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>NexusPay | Historique</title>
<?= view('include/tailwind_head') ?>
</head>
<body class="text-on-surface">
<?= view('include/sidebar_client', ['active' => 'historique']) ?>
<header class="bg-white shadow-sm flex items-center px-4 h-16 w-full fixed top-0 z-50 md:pl-[300px]">
<a href="<?= base_url('accueil') ?>" class="p-2 hover:bg-surface-container rounded-full transition-colors md:hidden">
<span class="material-symbols-outlined">arrow_back</span>
</a>
<h1 class="ml-2 text-headline-md font-headline-md">Historique des opérations</h1>
</header>
<main class="pt-24 pb-24 md:pb-8 md:pl-[300px] px-4 md:px-8 min-h-screen max-w-[1440px] mx-auto">
<?php if (session()->getFlashdata('success')): ?>
<div class="mb-4 p-4 bg-green-100 text-green-800 rounded-xl flex items-center gap-2">
<span class="material-symbols-outlined">check_circle</span>
<?= session()->getFlashdata('success') ?>
</div>
<?php endif; ?>
<?php if (session()->getFlashdata('error')): ?>
<div class="mb-4 p-4 bg-red-100 text-red-800 rounded-xl flex items-center gap-2">
<span class="material-symbols-outlined">error</span>
<?= session()->getFlashdata('error') ?>
</div>
<?php endif; ?>
<div class="bg-white rounded-xl shadow-sm border border-outline-variant overflow-hidden">
<?php if (!empty($historique)): ?>
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead class="bg-surface-container-low border-b border-outline-variant">
<tr>
<th class="px-4 py-3 text-label-sm font-label-sm text-secondary uppercase tracking-wider">Type</th>
<th class="px-4 py-3 text-label-sm font-label-sm text-secondary uppercase tracking-wider">Montant</th>
<th class="px-4 py-3 text-label-sm font-label-sm text-secondary uppercase tracking-wider">Date</th>
</tr>
</thead>
<tbody class="divide-y divide-outline-variant">
<?php foreach ($historique as $op): ?>
<?php $montant = (float) $op['montant']; ?>
<tr class="hover:bg-primary/5 transition-colors">
<td class="px-4 py-3">
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded flex items-center justify-center <?= $montant >= 0 ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' ?>">
<span class="material-symbols-outlined text-[18px]"><?= $montant >= 0 ? 'arrow_downward' : 'arrow_upward' ?></span>
</div>
<span class="text-label-md font-label-md capitalize"><?= esc($op['operation']) ?></span>
</div>
</td>
<td class="px-4 py-3 text-label-md font-label-md <?= $montant >= 0 ? 'text-green-600' : 'text-error' ?>">
<?= $montant >= 0 ? '+' : '' ?><?= number_format($montant, 0, ',', ' ') ?> Ar
</td>
<td class="px-4 py-3 text-body-sm text-on-surface-variant"><?= esc($op['date']) ?></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
<?php else: ?>
<div class="p-8 text-center">
<span class="material-symbols-outlined text-4xl text-outline-variant mb-2">receipt_long</span>
<p class="text-body-sm text-on-surface-variant">Aucune opération enregistrée.</p>
</div>
<?php endif; ?>
</div>
</main>
</body>
</html>
