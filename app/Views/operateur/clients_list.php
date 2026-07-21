<!DOCTYPE html>
<html class="light" lang="fr">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Comptes Clients - Admin Mobile Money</title>
<?= view('include/tailwind_head') ?>
</head>
<body class="bg-background text-on-background min-h-screen flex">
<?= view('include/sidebar_admin', ['active' => 'clients']) ?>
<main class="flex-1 lg:ml-72 flex flex-col min-h-screen">
<!-- TopNavBar -->
<header class="flex justify-between items-center w-full px-gutter h-16 sticky top-0 z-40 bg-surface shadow-sm">
<div class="flex items-center gap-lg">
<button class="lg:hidden p-xs rounded-full hover:bg-surface-container">
<span class="material-symbols-outlined">menu</span>
</button>
<div class="relative w-64 md:w-96">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline">search</span>
<form action="<?= base_url('clients') ?>" method="get" class="w-full">
<input class="w-full bg-surface-container-low border-none rounded-xl pl-10 py-2 focus:ring-2 focus:ring-primary text-body-sm" placeholder="Rechercher par numéro..." type="text" name="search" value="<?= esc($search ?? '') ?>" />
</form>
</div>
</div>
<div class="flex items-center gap-md">
<button class="p-sm rounded-full hover:bg-surface-container text-on-surface-variant relative">
<span class="material-symbols-outlined">notifications</span>
<span class="absolute top-2 right-2 w-2 h-2 bg-error rounded-full"></span>
</button>
<div class="h-8 w-[1px] bg-outline-variant mx-xs"></div>
<button class="flex items-center gap-xs p-xs rounded-full hover:bg-surface-container">
<img class="w-8 h-8 rounded-full" data-alt="Small profile avatar circle showing a diverse user, part of a clean financial UI design. The image is bright with a clean white background, conveying trust and transparency." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBGiJKGk-aq1uZMKwTYv82tKM8alfLvEZkepK5gBRIg_ewqvAoAAID_SN0OYzxz2C8bN5y8jZFASLcI5L9Bqp2CcwiqGZFEfouDwr2gx16A16Nay2d4qLZ6Zpu-L8ckfLfZfKRNH6aeoRRjyJN-Dq0Ama61AIeNu1bV_lzXfA3_M06Nq9CHSFj3C2XOipmSO0RZQHiGXDMbAEtTNGWHE2jWThewu4nZvDUyekJK4ae3-TKBWoOp865urzNmTPgst-HHqfAybceKidtW"/>
<span class="material-symbols-outlined">expand_more</span>
</button>
</div>
</header>
<div class="flex-1 p-gutter max-w-[1600px] w-full mx-auto">
<!-- Header Actions -->
<?php
$clientsData = $clients ?? [];
$totalClients = count($clientsData);
$soldeTotal = array_sum(array_column($clientsData, 'solde'));
$totalOperations = array_sum(array_column($clientsData, 'nombre_operations'));
$clientsActifs = count(array_filter($clientsData, fn($client) => (float) ($client['solde'] ?? 0) > 0));
?>
<div class="flex flex-col md:flex-row md:items-center justify-between gap-md mb-xl">
<div>
<h2 class="font-headline-md text-headline-md text-on-surface">Comptes Clients</h2>
<p class="font-body-sm text-body-sm text-secondary">Gérez et suivez l'activité de vos <?= $totalClients ?> clients enregistrés.</p>
</div>
</div>
<!-- Dashboard Filters & Stats (Mini Bento) -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-lg mb-xl">
<div class="bg-white p-lg rounded-xl shadow-sm border border-outline-variant/30">
<div class="flex items-center justify-between mb-sm">
<span class="text-secondary font-label-sm uppercase tracking-wider">Total Clients</span>
<div class="w-8 h-8 bg-primary/10 text-primary rounded-lg flex items-center justify-center">
<span class="material-symbols-outlined text-[18px]">group</span>
</div>
</div>
<p class="text-headline-sm font-headline-sm"><?= $totalClients ?></p>
<p class="text-label-sm text-green-600 mt-xs">Clients enregistrés</p>
</div>
<div class="bg-white p-lg rounded-xl shadow-sm border border-outline-variant/30">
<div class="flex items-center justify-between mb-sm">
<span class="text-secondary font-label-sm uppercase tracking-wider">Comptes Actifs</span>
<div class="w-8 h-8 bg-green-100 text-green-700 rounded-lg flex items-center justify-center">
<span class="material-symbols-outlined text-[18px]">verified_user</span>
</div>
</div>
<p class="text-headline-sm font-headline-sm"><?= $clientsActifs ?></p>
<p class="text-label-sm text-secondary mt-xs">Sur les comptes disponibles</p>
</div>
<div class="bg-white p-lg rounded-xl shadow-sm border border-outline-variant/30">
<div class="flex items-center justify-between mb-sm">
<span class="text-secondary font-label-sm uppercase tracking-wider">Solde Total</span>
<div class="w-8 h-8 bg-amber-100 text-amber-700 rounded-lg flex items-center justify-center">
<span class="material-symbols-outlined text-[18px]">account_balance</span>
</div>
</div>
<p class="text-headline-sm font-headline-sm"><?= number_format($soldeTotal, 0, ',', ' ') ?> Ar</p>
<p class="text-label-sm text-secondary mt-xs">Liquidité disponible</p>
</div>
<div class="bg-white p-lg rounded-xl shadow-sm border border-outline-variant/30">
<div class="flex items-center justify-between mb-sm">
<span class="text-secondary font-label-sm uppercase tracking-wider">Opérations</span>
<div class="w-8 h-8 bg-blue-100 text-blue-700 rounded-lg flex items-center justify-center">
<span class="material-symbols-outlined text-[18px]">swap_horiz</span>
</div>
</div>
<p class="text-headline-sm font-headline-sm"><?= $totalOperations ?></p>
<p class="text-label-sm text-blue-600 mt-xs">Total des opérations</p>
</div>
</div>
<!-- Table Card -->
<div class="bg-white rounded-xl shadow-sm border border-outline-variant/30 overflow-hidden flex flex-col">
<!-- Table Controls -->
<div class="p-lg border-b border-outline-variant/30 flex flex-col md:flex-row md:items-center justify-between gap-md">
<div class="flex items-center gap-md">
<select class="bg-surface-container-low border-none rounded-lg text-body-sm py-2 px-4 focus:ring-1 focus:ring-primary">
<option>10 lignes</option>
<option selected="">25 lignes</option>
<option>50 lignes</option>
</select>
<div class="flex items-center gap-xs px-3 py-1 bg-surface-container-low rounded-lg text-secondary">
<span class="material-symbols-outlined text-[18px]">filter_list</span>
<span class="text-label-sm">Filtres</span>
</div>
</div>
<p class="text-body-sm text-secondary">Affichage de <?= min($totalClients, 25) ?> client(s) sur <?= $totalClients ?></p>
</div>
<!-- Responsive Table Container -->
<div class="overflow-x-auto custom-scrollbar">
<table class="w-full text-left border-collapse">
<thead class="bg-surface-container-low border-b border-outline-variant/30">
<tr>
<th class="px-lg py-md font-label-md text-label-md text-secondary whitespace-nowrap">Numéro</th>
<th class="px-lg py-md font-label-md text-label-md text-secondary whitespace-nowrap">Solde actuel</th>
<th class="px-lg py-md font-label-md text-label-md text-secondary whitespace-nowrap">Nombre d'opérations</th>
<th class="px-lg py-md font-label-md text-label-md text-secondary whitespace-nowrap text-right">Actions</th>
</tr>
</thead>
<tbody class="divide-y divide-outline-variant/20">
<?php if (! empty($clientsData)): ?>
    <?php foreach ($clientsData as $client): ?>
        <?php $solde = (float) ($client['solde'] ?? 0); ?>
        <?php $statut = $solde > 0 ? 'Actif' : 'Inactif'; ?>
        <tr class="hover:bg-primary/5 transition-colors group">
            <td class="px-lg py-md font-label-md text-label-md text-primary"><?= esc($client['numero'] ?? '') ?></td>
            <td class="px-lg py-md font-label-md text-label-md text-on-surface"><?= number_format($solde, 0, ',', ' ') ?> Ar</td>
            <td class="px-lg py-md font-label-md text-label-md text-secondary whitespace-nowrap"><?= esc($client['nombre_operations'] ?? 0) ?></td>
            
            <td class="px-lg py-md text-right">
                <button class="p-xs text-secondary hover:text-primary transition-colors" type="button">
                    <span class="material-symbols-outlined">more_vert</span>
                </button>
            </td>
        </tr>
    <?php endforeach; ?>
<?php else: ?>
    <tr>
        <td colspan="5" class="px-lg py-md text-center text-secondary">
            Aucun client trouvé pour le moment.
        </td>
    </tr>
<?php endif; ?>
</tbody>
</table>
</div>
<!-- Pagination -->
<!-- <div class="p-lg border-t border-outline-variant/30 flex items-center justify-between">
<button class="flex items-center gap-xs px-md py-sm rounded-lg border border-outline-variant hover:bg-surface-container-low transition-colors disabled:opacity-50" disabled="">
<span class="material-symbols-outlined text-[18px]">chevron_left</span>
                        Précédent
                    </button>
<div class="flex items-center gap-xs">
<button class="w-10 h-10 rounded-lg bg-primary text-on-primary font-label-md">1</button>
<button class="w-10 h-10 rounded-lg hover:bg-surface-container font-label-md">2</button>
<button class="w-10 h-10 rounded-lg hover:bg-surface-container font-label-md">3</button>
<span class="px-xs text-secondary">...</span>
<button class="w-10 h-10 rounded-lg hover:bg-surface-container font-label-md">124</button>
</div>
<button class="flex items-center gap-xs px-md py-sm rounded-lg border border-outline-variant hover:bg-surface-container-low transition-colors">
                        Suivant
                        <span class="material-symbols-outlined text-[18px]">chevron_right</span>
</button>
</div> -->
</div>
</div>
<script>
        // Simple micro-interactions
        document.querySelectorAll('tr').forEach(row => {
            row.addEventListener('mouseenter', () => {
                row.style.cursor = 'pointer';
            });
        });

        // Search Bar Focus Effect
        const searchInput = document.querySelector('input[type="text"]');
        const searchIcon = searchInput.previousElementSibling;
        
        searchInput.addEventListener('focus', () => {
            searchIcon.classList.add('text-primary');
            searchIcon.style.transition = 'color 0.2s ease';
        });
        
        searchInput.addEventListener('blur', () => {
            searchIcon.classList.remove('text-primary');
        });

        // Status Chip Colors Dynamic Adjustment (Simulation)
        const statusChips = document.querySelectorAll('td span.rounded-full');
        statusChips.forEach(chip => {
            if (chip.textContent === 'Actif') {
                chip.classList.add('bg-green-100', 'text-green-700');
            } else if (chip.textContent === 'Inactif') {
                chip.classList.add('bg-red-100', 'text-red-700');
            }
        });
    </script>
</main>
</body>
</html>
