<!DOCTYPE html>
<html class="light" lang="fr">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Préfixes - Admin Mobile Money</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script>
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
    body { font-family: 'Inter', sans-serif; background-color: #f8f9fa; }
    .material-symbols-outlined {
        font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
    }
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
<a class="flex items-center px-lg py-sm text-secondary hover:bg-surface-container rounded-lg mx-2 my-1 transition-transform hover:translate-x-1" href="<?= base_url('clients') ?>">
<span class="material-symbols-outlined mr-sm">group</span>
<span class="font-label-md text-label-md">Comptes clients</span>
</a>
<a class="flex items-center px-lg py-sm bg-primary-container text-on-primary-container rounded-lg mx-2 my-1 transition-transform hover:translate-x-1" href="<?= base_url('prefix') ?>">
<span class="material-symbols-outlined mr-sm" style="font-variation-settings: 'FILL' 1;">phone_iphone</span>
<span class="font-label-md text-label-md">Préfixes</span>
</a>
<a class="flex items-center px-lg py-sm text-secondary hover:bg-surface-container rounded-lg mx-2 my-1 transition-transform hover:translate-x-1" href="<?= base_url('frais/ajouter') ?>">
<span class="material-symbols-outlined mr-sm">payments</span>
<span class="font-label-md text-label-md">Barèmes</span>
</a>
<a class="flex items-center px-lg py-sm text-secondary hover:bg-surface-container rounded-lg mx-2 my-1 transition-transform hover:translate-x-1" href="<?= base_url('gains') ?>">
<span class="material-symbols-outlined mr-sm">leaderboard</span>
<span class="font-label-md text-label-md">Gains</span>
</a>
</nav>
</aside>
<!-- Main Content -->
<main class="flex-1 lg:ml-72 flex flex-col min-h-screen">
<!-- TopNavBar -->
<header class="flex justify-between items-center w-full px-gutter h-16 sticky top-0 z-40 bg-surface shadow-sm">
<div class="flex items-center gap-lg">
<button class="lg:hidden p-xs rounded-full hover:bg-surface-container">
<span class="material-symbols-outlined">menu</span>
</button>
<h2 class="font-headline-md text-headline-md text-on-surface">Préfixes</h2>
</div>
<div class="flex items-center gap-md">
<button class="p-sm rounded-full hover:bg-surface-container text-on-surface-variant relative">
<span class="material-symbols-outlined">notifications</span>
<span class="absolute top-2 right-2 w-2 h-2 bg-error rounded-full"></span>
</button>
</div>
</header>
<div class="flex-1 p-gutter max-w-[1600px] w-full mx-auto">
<!-- Header Actions -->
<div class="flex flex-col md:flex-row md:items-center justify-between gap-md mb-xl">
<div>
<h2 class="font-headline-md text-headline-md text-on-surface">Gestion des Préfixes</h2>
<p class="font-body-sm text-body-sm text-secondary">Gérez les préfixes des opérateurs mobile money.</p>
</div>
<a href="<?= base_url('prefix/form') ?>" class="flex items-center gap-xs px-md py-sm bg-primary text-on-primary font-label-md rounded-xl hover:shadow-lg transition-all active:scale-95">
<span class="material-symbols-outlined text-[20px]">add</span>
    Ajouter un préfixe
</a>
</div>
<!-- Flash Messages -->
<?php if (session()->getFlashdata('success')): ?>
<div class="mb-xl p-md bg-green-100 text-green-800 rounded-xl flex items-center gap-sm">
<span class="material-symbols-outlined">check_circle</span>
<?= session()->getFlashdata('success') ?>
</div>
<?php endif; ?>
<!-- Table Card -->
<div class="bg-white rounded-xl shadow-sm border border-outline-variant/30 overflow-hidden flex flex-col">
<div class="p-lg border-b border-outline-variant/30 flex items-center justify-between">
<p class="text-body-sm text-secondary">
    <?php if (! empty($prefixes) && is_array($prefixes)): ?>
        <?= count($prefixes) ?> préfixe(s) enregistré(s)
    <?php else: ?>
        Aucun préfixe
    <?php endif; ?>
</p>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead class="bg-surface-container-low border-b border-outline-variant/30">
<tr>
<th class="px-lg py-md font-label-md text-label-md text-secondary whitespace-nowrap">#</th>
<th class="px-lg py-md font-label-md text-label-md text-secondary whitespace-nowrap">Préfixe</th>
<th class="px-lg py-md font-label-md text-label-md text-secondary whitespace-nowrap">Opérateur</th>
</tr>
</thead>
<tbody class="divide-y divide-outline-variant/20">
<?php if (! empty($prefixes) && is_array($prefixes)): ?>
    <?php foreach ($prefixes as $prefix): ?>
        <tr class="hover:bg-primary/5 transition-colors">
            <td class="px-lg py-md font-label-md text-label-md text-secondary"><?= esc($prefix->id) ?></td>
            <td class="px-lg py-md">
                <span class="inline-flex items-center gap-xs px-sm py-1 bg-primary/10 text-primary rounded-full font-label-md">
                    <span class="material-symbols-outlined text-[16px]">dialpad</span>
                    <?= esc($prefix->prefix) ?>
                </span>
            </td>
            <td class="px-lg py-md font-label-md text-label-md text-on-surface"><?= esc($prefix->nom) ?></td>
        </tr>
    <?php endforeach; ?>
<?php else: ?>
    <tr>
        <td colspan="3" class="px-lg py-md text-center text-secondary">
            Aucun préfixe trouvé.
        </td>
    </tr>
<?php endif; ?>
</tbody>
</table>
</div>
</div>
<!-- Footer -->
<footer class="flex justify-between items-center px-gutter w-full mt-auto py-4 bg-surface-container-low border-t border-outline-variant">
<p class="font-label-sm text-label-sm text-secondary">© 2024 Mobile Money - Tous droits réservés</p>
<div class="flex gap-lg">
<span class="font-label-sm text-label-sm text-on-surface-variant">Version 2.1.0</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Projet Admin</span>
</div>
</footer>
</div>
</main>
<!-- Mobile Navigation (Bottom Bar) -->
<nav class="lg:hidden fixed bottom-0 left-0 right-0 h-16 bg-surface border-t border-outline-variant/30 z-50 flex items-center justify-around px-md">
<a href="<?= base_url('clients') ?>" class="flex flex-col items-center gap-1 text-secondary">
<span class="material-symbols-outlined">group</span>
<span class="text-[10px] font-label-sm">Clients</span>
</a>
<a href="<?= base_url('prefix') ?>" class="flex flex-col items-center gap-1 text-primary">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">phone_iphone</span>
<span class="text-[10px] font-label-sm font-bold">Préfixes</span>
</a>
<a href="<?= base_url('frais/ajouter') ?>" class="flex flex-col items-center gap-1 text-secondary">
<span class="material-symbols-outlined">payments</span>
<span class="text-[10px] font-label-sm">Barèmes</span>
</a>
<a href="<?= base_url('gains') ?>" class="flex flex-col items-center gap-1 text-secondary">
<span class="material-symbols-outlined">leaderboard</span>
<span class="text-[10px] font-label-sm">Gains</span>
</a>
</nav>
</body>
</html>
