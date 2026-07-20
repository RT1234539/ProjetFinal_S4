<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>NexusPay | Historique</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script>
    tailwind.config = {
        theme: {
            extend: {
                "colors": {
                    "primary": "#003f87",
                    "on-primary": "#ffffff",
                    "primary-container": "#0056b3",
                    "on-primary-container": "#bbd0ff",
                    "surface-container": "#edeeef",
                    "surface": "#f8f9fa",
                    "on-surface": "#191c1d",
                    "on-surface-variant": "#424752",
                    "outline-variant": "#c2c6d4",
                    "error": "#ba1a1a",
                    "secondary": "#575f67"
                }
            }
        }
    }
</script>
<style>
    body { font-family: 'Inter', sans-serif; background-color: #f8f9fa; }
</style>
</head>
<body class="text-on-surface min-h-screen">
<header class="bg-white shadow-sm flex items-center px-4 h-16 w-full fixed top-0 z-50">
<a href="<?= base_url('accueil') ?>" class="p-2 hover:bg-surface-container rounded-full transition-colors">
<span class="material-symbols-outlined">arrow_back</span>
</a>
<h1 class="ml-2 text-headline-md font-headline-md">Historique des op&eacute;rations</h1>
</header>
<main class="pt-24 pb-8 px-4 max-w-3xl mx-auto">
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
<p class="text-body-sm text-on-surface-variant">Aucune op&eacute;ration enregistr&eacute;e.</p>
</div>
<?php endif; ?>
</div>
<a href="<?= base_url('accueil') ?>" class="mt-4 block text-center text-primary font-label-md hover:underline">
&larr; Retour &agrave; l'accueil
</a>
</main>
</body>
</html>
