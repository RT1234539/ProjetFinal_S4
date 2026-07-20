<!DOCTYPE html>

<html class="light" lang="fr"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Comptes Clients - Admin Mobile Money</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                    "on-error-container": "#93000a",
                    "on-error": "#ffffff",
                    "primary-fixed-dim": "#acc7ff",
                    "secondary-fixed": "#dbe4ed",
                    "on-primary-container": "#bbd0ff",
                    "secondary-container": "#d8e1ea",
                    "inverse-primary": "#acc7ff",
                    "surface-container-high": "#e7e8e9",
                    "surface-container-low": "#f3f4f5",
                    "surface-container-lowest": "#ffffff",
                    "error-container": "#ffdad6",
                    "on-surface": "#191c1d",
                    "primary-fixed": "#d7e2ff",
                    "on-secondary-fixed": "#141d23",
                    "on-background": "#191c1d",
                    "background": "#f8f9fa",
                    "surface-variant": "#e1e3e4",
                    "on-tertiary-fixed-variant": "#7b2f00",
                    "surface-bright": "#f8f9fa",
                    "surface": "#f8f9fa",
                    "tertiary": "#722b00",
                    "on-secondary-fixed-variant": "#3f484f",
                    "on-secondary-container": "#5b646b",
                    "tertiary-fixed-dim": "#ffb694",
                    "surface-tint": "#115cb9",
                    "secondary-fixed-dim": "#bfc8d0",
                    "tertiary-fixed": "#ffdbcc",
                    "surface-container-highest": "#e1e3e4",
                    "on-tertiary": "#ffffff",
                    "error": "#ba1a1a",
                    "on-primary": "#ffffff",
                    "on-tertiary-fixed": "#351000",
                    "inverse-on-surface": "#f0f1f2",
                    "primary-container": "#0056b3",
                    "inverse-surface": "#2e3132",
                    "on-primary-fixed": "#001a40",
                    "secondary": "#575f67",
                    "surface-container": "#edeeef",
                    "outline-variant": "#c2c6d4",
                    "tertiary-container": "#983c00",
                    "on-tertiary-container": "#ffc2a7",
                    "primary": "#003f87",
                    "outline": "#727784",
                    "surface-dim": "#d9dadb",
                    "on-surface-variant": "#424752",
                    "on-primary-fixed-variant": "#004491",
                    "on-secondary": "#ffffff"
            },
            "borderRadius": {
                    "DEFAULT": "0.25rem",
                    "lg": "0.5rem",
                    "xl": "0.75rem",
                    "full": "9999px"
            },
            "spacing": {
                    "xl": "2rem",
                    "gutter": "1.5rem",
                    "margin-mobile": "1rem",
                    "md": "1rem",
                    "sm": "0.75rem",
                    "base": "4px",
                    "margin-desktop": "2rem",
                    "lg": "1.5rem",
                    "xs": "0.5rem"
            },
            "fontFamily": {
                    "label-sm": ["Inter"],
                    "body-md": ["Inter"],
                    "label-md": ["Inter"],
                    "headline-lg": ["Inter"],
                    "headline-md": ["Inter"],
                    "body-lg": ["Inter"],
                    "headline-lg-mobile": ["Inter"],
                    "body-sm": ["Inter"],
                    "headline-sm": ["Inter"]
            },
            "fontSize": {
                    "label-sm": ["12px", {"lineHeight": "1", "fontWeight": "500"}],
                    "body-md": ["16px", {"lineHeight": "1.5", "fontWeight": "400"}],
                    "label-md": ["14px", {"lineHeight": "1", "letterSpacing": "0.05em", "fontWeight": "600"}],
                    "headline-lg": ["32px", {"lineHeight": "1.2", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                    "headline-md": ["24px", {"lineHeight": "1.3", "letterSpacing": "-0.01em", "fontWeight": "600"}],
                    "body-lg": ["18px", {"lineHeight": "1.6", "fontWeight": "400"}],
                    "headline-lg-mobile": ["24px", {"lineHeight": "1.2", "fontWeight": "700"}],
                    "body-sm": ["14px", {"lineHeight": "1.5", "fontWeight": "400"}],
                    "headline-sm": ["20px", {"lineHeight": "1.4", "fontWeight": "600"}]
            }
          },
        },
      }
    </script>
<style>
        body { font-family: 'Inter', sans-serif; }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .active-nav { font-variation-settings: 'FILL' 1; }
        .custom-scrollbar::-webkit-scrollbar { width: 6px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #d1d5db; border-radius: 10px; }
    </style>
</head>
<body class="bg-background text-on-background min-h-screen flex">
<!-- SideNavBar -->
<aside class="hidden lg:flex flex-col h-screen border-r border-outline-variant bg-white w-72 fixed left-0 top-0 z-50">
<div class="p-lg flex items-center gap-sm">
<div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center text-on-primary">
<span class="material-symbols-outlined">account_balance_wallet</span>
</div>
<div>
<h1 class="font-headline-sm text-headline-sm text-primary">Admin Money</h1>
<p class="font-label-sm text-label-sm text-secondary">Gestionnaire Mobile</p>
</div>
</div>
<nav class="flex-1 mt-md space-y-1">
<!-- Navigation Items Mapping from JSON -->
<a class="flex items-center px-lg py-sm text-secondary hover:bg-surface-container rounded-lg mx-2 my-1 transition-transform hover:translate-x-1" href="#">
<span class="material-symbols-outlined mr-sm">dashboard</span>
<span class="font-label-md text-label-md">Dashboard</span>
</a>
<a class="flex items-center px-lg py-sm text-secondary hover:bg-surface-container rounded-lg mx-2 my-1 transition-transform hover:translate-x-1" href="#">
<span class="material-symbols-outlined mr-sm">phone_iphone</span>
<span class="font-label-md text-label-md">Préfixes</span>
</a>
<a class="flex items-center px-lg py-sm text-secondary hover:bg-surface-container rounded-lg mx-2 my-1 transition-transform hover:translate-x-1" href="#">
<span class="material-symbols-outlined mr-sm">payments</span>
<span class="font-label-md text-label-md">Barèmes</span>
</a>
<!-- Active State: Comptes clients -->
<a class="flex items-center px-lg py-sm bg-primary-container text-on-primary-container rounded-lg mx-2 my-1 transition-transform hover:translate-x-1" href="#">
<span class="material-symbols-outlined mr-sm" style="font-variation-settings: 'FILL' 1;">group</span>
<span class="font-label-md text-label-md">Comptes clients</span>
</a>
<a class="flex items-center px-lg py-sm text-secondary hover:bg-surface-container rounded-lg mx-2 my-1 transition-transform hover:translate-x-1" href="#">
<span class="material-symbols-outlined mr-sm">calculate</span>
<span class="font-label-md text-label-md">Simulation</span>
</a>
<a class="flex items-center px-lg py-sm text-secondary hover:bg-surface-container rounded-lg mx-2 my-1 transition-transform hover:translate-x-1" href="#">
<span class="material-symbols-outlined mr-sm">leaderboard</span>
<span class="font-label-md text-label-md">Statistiques</span>
</a>
<a class="flex items-center px-lg py-sm text-secondary hover:bg-surface-container rounded-lg mx-2 my-1 transition-transform hover:translate-x-1" href="#">
<span class="material-symbols-outlined mr-sm">settings</span>
<span class="font-label-md text-label-md">Paramètres</span>
</a>
</nav>
<div class="p-lg border-t border-outline-variant">
<div class="flex items-center gap-sm">
<img class="w-10 h-10 rounded-full border-2 border-primary-fixed" data-alt="A professional headshot of a financial administrator, looking confident and approachable, wearing a modern business casual outfit. The background is a blurred office environment with soft blue and white tones that match the corporate mobile money interface style. High quality lighting, sharp focus on the person, and minimalist aesthetics." src="https://lh3.googleusercontent.com/aida-public/AB6AXuD58Ilhh6mvgds-GLTF5uRZPyskgmx1UIFCqRgPbTQ4twwCmpvGte5r6EV_XtiZHDSaSwKHcbc3ihX8C3LnAeYOulSb5fQM_YPawpNoArWfOYWXcM3ux1kOTMfrYP0A3R9umIa-M7BOjBuW_0-PgxHiS59AMkFrwOHBKWvTh27NuEJftp4IAu_Isu2AEhkK1zN895E3WFrfnHbGu2oy9sbDsHahOLUp8cHtANR5PayaiCAZ2jxd-Wm1tryh8N90PbnzVREMwxAd8tmq"/>
<div class="overflow-hidden">
<p class="font-label-md text-label-md truncate">Jean Dupont</p>
<p class="font-label-sm text-label-sm text-secondary truncate">Super Administrateur</p>
</div>
</div>
</div>
</aside>
<!-- Main Content -->
<main class="flex-1 lg:ml-72 flex flex-col min-h-screen">
<!-- TopNavBar -->
<header class="flex justify-between items-center w-full px-gutter h-16 sticky top-0 z-40 bg-surface shadow-sm">
<div class="flex items-center gap-lg">
<button class="lg:hidden p-xs rounded-full hover:bg-surface-container">
<span class="material-symbols-outlined">menu</span>
</button>
<div class="relative w-64 md:w-96">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline">search</span>
<input class="w-full bg-surface-container-low border-none rounded-xl pl-10 py-2 focus:ring-2 focus:ring-primary text-body-sm" placeholder="Rechercher un compte..." type="text"/>
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
<th class="px-lg py-md font-label-md text-label-md text-secondary whitespace-nowrap">Statut</th>
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
            <td class="px-lg py-md">
                <span class="px-sm py-1 rounded-full text-label-sm font-semibold <?= $statut === 'Actif' ? 'bg-green-100 text-green-700' : 'bg-error-container text-on-error-container' ?>">
                    <?= esc($statut) ?>
                </span>
            </td>
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
<div class="p-lg border-t border-outline-variant/30 flex items-center justify-between">
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
</div>
</div>
</div>
<!-- Footer -->
<footer class="flex justify-between items-center px-gutter w-full mt-auto py-4 bg-surface-container-low border-t border-outline-variant">
<p class="font-label-sm text-label-sm text-secondary">© 2024 Mobile Money - Tous droits réservés</p>
<div class="flex gap-lg">
<span class="font-label-sm text-label-sm text-on-surface-variant">Version 2.1.0</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Projet Admin</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Janvier 2024</span>
</div>
</footer>
</main>
<!-- Mobile Navigation (Bottom Bar) -->
<nav class="lg:hidden fixed bottom-0 left-0 right-0 h-16 bg-surface border-t border-outline-variant/30 z-50 flex items-center justify-around px-md">
<button class="flex flex-col items-center gap-1 text-secondary">
<span class="material-symbols-outlined">dashboard</span>
<span class="text-[10px] font-label-sm">Board</span>
</button>
<button class="flex flex-col items-center gap-1 text-secondary">
<span class="material-symbols-outlined">payments</span>
<span class="text-[10px] font-label-sm">Flux</span>
</button>
<button class="flex flex-col items-center gap-1 text-primary">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">group</span>
<span class="text-[10px] font-label-sm font-bold">Clients</span>
</button>
<button class="flex flex-col items-center gap-1 text-secondary">
<span class="material-symbols-outlined">settings</span>
<span class="text-[10px] font-label-sm">Param.</span>
</button>
</nav>
<!-- Overlay for mobile drawer if implemented -->
<div class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden" id="sidebarOverlay"></div>
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
</body></html>

