<?php
$numero = $user['numero'] ?? '0000000000';
$soldeMontant = $solde['solde'] ?? 0;
$nomDisplay = '+261 ' . substr($numero, 0, 3) . ' ' . substr($numero, 3, 2) . ' ' . substr($numero, 5);
?>
<!DOCTYPE html>
<html class="light" lang="fr"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>NexusPay | Dashboard</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                    "surface-container": "#edeeef",
                    "on-surface-variant": "#424752",
                    "surface-container-low": "#f3f4f5",
                    "surface-tint": "#115cb9",
                    "surface-container-lowest": "#ffffff",
                    "on-secondary-container": "#5b646b",
                    "inverse-primary": "#acc7ff",
                    "primary-fixed-dim": "#acc7ff",
                    "on-secondary": "#ffffff",
                    "surface-container-high": "#e7e8e9",
                    "on-primary-container": "#bbd0ff",
                    "inverse-on-surface": "#f0f1f2",
                    "surface-variant": "#e1e3e4",
                    "on-primary-fixed-variant": "#004491",
                    "on-primary-fixed": "#001a40",
                    "tertiary-fixed": "#ffdbcc",
                    "secondary-fixed": "#dbe4ed",
                    "surface-dim": "#d9dadb",
                    "primary-fixed": "#d7e2ff",
                    "on-tertiary": "#ffffff",
                    "primary": "#003f87",
                    "on-tertiary-fixed": "#351000",
                    "on-secondary-fixed": "#141d23",
                    "on-background": "#191c1d",
                    "on-primary": "#ffffff",
                    "on-error": "#ffffff",
                    "secondary-container": "#d8e1ea",
                    "on-tertiary-container": "#ffc2a7",
                    "background": "#f8f9fa",
                    "on-tertiary-fixed-variant": "#7b2f00",
                    "on-surface": "#191c1d",
                    "outline-variant": "#c2c6d4",
                    "surface": "#f8f9fa",
                    "surface-bright": "#f8f9fa",
                    "secondary": "#575f67",
                    "error-container": "#ffdad6",
                    "error": "#ba1a1a",
                    "inverse-surface": "#2e3132",
                    "tertiary-fixed-dim": "#ffb694",
                    "outline": "#727784",
                    "tertiary-container": "#983c00",
                    "tertiary": "#722b00",
                    "primary-container": "#0056b3",
                    "on-secondary-fixed-variant": "#3f484f",
                    "on-error-container": "#93000a",
                    "secondary-fixed-dim": "#bfc8d0",
                    "surface-container-highest": "#e1e3e4"
            },
            "borderRadius": {
                    "DEFAULT": "0.25rem",
                    "lg": "0.5rem",
                    "xl": "0.75rem",
                    "full": "9999px"
            },
            "spacing": {
                    "md": "1rem",
                    "margin-desktop": "2rem",
                    "gutter": "1.5rem",
                    "base": "4px",
                    "sm": "0.75rem",
                    "margin-mobile": "1rem",
                    "lg": "1.5rem",
                    "xs": "0.5rem",
                    "xl": "2rem"
            },
            "fontFamily": {
                    "label-md": ["Inter"],
                    "label-sm": ["Inter"],
                    "headline-lg-mobile": ["Inter"],
                    "body-lg": ["Inter"],
                    "headline-md": ["Inter"],
                    "headline-sm": ["Inter"],
                    "headline-lg": ["Inter"],
                    "body-md": ["Inter"],
                    "body-sm": ["Inter"]
            },
            "fontSize": {
                    "label-md": ["14px", {"lineHeight": "1", "letterSpacing": "0.05em", "fontWeight": "600"}],
                    "label-sm": ["12px", {"lineHeight": "1", "fontWeight": "500"}],
                    "headline-lg-mobile": ["24px", {"lineHeight": "1.2", "fontWeight": "700"}],
                    "body-lg": ["18px", {"lineHeight": "1.6", "fontWeight": "400"}],
                    "headline-md": ["24px", {"lineHeight": "1.3", "letterSpacing": "-0.01em", "fontWeight": "600"}],
                    "headline-sm": ["20px", {"lineHeight": "1.4", "fontWeight": "600"}],
                    "headline-lg": ["32px", {"lineHeight": "1.2", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                    "body-md": ["16px", {"lineHeight": "1.5", "fontWeight": "400"}],
                    "body-sm": ["14px", {"lineHeight": "1.5", "fontWeight": "400"}]
            }
          },
        },
      }
    </script>
<style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
        }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .transaction-row:hover {
            background-color: rgba(0, 63, 135, 0.05);
        }
    </style>
</head>
<body class="text-on-surface">
<!-- TopAppBar -->
<header class="bg-white shadow-sm flex justify-between items-center px-4 h-16 w-full fixed top-0 z-50 md:px-8">
<div class="flex items-center gap-4">
<span class="text-headline-md font-headline-md text-primary">NexusPay</span>
</div>
<div class="flex items-center gap-4">
<button class="material-symbols-outlined text-primary p-2 hover:bg-surface-container transition-colors rounded-full">notifications</button>
<div class="w-10 h-10 rounded-full bg-primary-container flex items-center justify-center border-2 border-surface-container-high">
<span class="text-on-primary-container font-label-md"><?= strtoupper(substr($numero, -2)) ?></span>
</div>
</div>
</header>
<!-- SideNavBar (Desktop Only) -->
<aside class="bg-white border-r border-outline-variant fixed left-0 top-0 h-full flex flex-col p-4 z-40 hidden md:flex w-[280px]">
<div class="mt-20 px-2 mb-8">
<div class="flex flex-col items-start p-4 bg-surface-container rounded-xl">
<span class="text-label-md font-label-md text-secondary"><?= esc($numero) ?></span>
<span class="text-headline-sm font-headline-sm text-primary mt-1"><?= number_format($soldeMontant, 0, ',', ' ') ?> Ar</span>
<span class="text-body-sm font-body-sm text-on-surface-variant opacity-70">Balance disponible</span>
<a href="<?= base_url('clients/depot') ?>" class="mt-4 w-full bg-primary text-on-primary py-2 rounded-lg font-label-md hover:scale-[1.02] active:scale-95 transition-all text-center block">Effectuer un d&eacute;p&ocirc;t</a>
</div>
</div>
<nav class="flex flex-col gap-1 flex-1">
<a class="flex items-center gap-4 p-4 bg-primary-container text-on-primary-container rounded-lg font-bold translate-x-1 duration-200" href="<?= base_url('accueil') ?>">
<span class="material-symbols-outlined">dashboard</span>
<span class="text-label-md font-label-md">Accueil</span>
</a>
<a class="flex items-center gap-4 p-4 text-on-surface-variant hover:bg-surface-container-high rounded-lg transition-all" href="<?= base_url('clients/depot') ?>">
<span class="material-symbols-outlined">add_circle</span>
<span class="text-label-md font-label-md">D&eacute;p&ocirc;t</span>
</a>
<a class="flex items-center gap-4 p-4 text-on-surface-variant hover:bg-surface-container-high rounded-lg transition-all" href="<?= base_url('clients/retrait') ?>">
<span class="material-symbols-outlined">payments</span>
<span class="text-label-md font-label-md">Retrait</span>
</a>
<a class="flex items-center gap-4 p-4 text-on-surface-variant hover:bg-surface-container-high rounded-lg transition-all" href="<?= base_url('clients/transfert') ?>">
<span class="material-symbols-outlined">swap_horiz</span>
<span class="text-label-md font-label-md">Transfert</span>
</a>
<a class="flex items-center gap-4 p-4 text-on-surface-variant hover:bg-surface-container-high rounded-lg transition-all" href="<?= base_url('clients/historique') ?>">
<span class="material-symbols-outlined">history</span>
<span class="text-label-md font-label-md">Historique</span>
</a>
</nav>
</aside>
<!-- Main Content Canvas -->
<main class="pt-24 pb-20 md:pb-8 md:pl-[300px] px-4 md:px-8 min-h-screen max-w-[1440px] mx-auto">
<!-- Flash Messages -->
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
<!-- Hero Section: Prominent Balance -->
<section class="mb-6">
<div class="relative overflow-hidden bg-primary text-on-primary p-6 rounded-xl shadow-lg md:p-12">
<div class="relative z-10">
<p class="text-label-md font-label-md uppercase tracking-widest opacity-80 mb-2">Compte Personnel</p>
<h2 class="text-headline-lg-mobile md:text-headline-lg font-headline-lg mb-1"><?= esc($numero) ?></h2>
<div class="flex items-baseline gap-2 mt-4">
<span class="text-label-md font-label-md opacity-90">Ar</span>
<span id="solde-display" class="text-[42px] md:text-[56px] font-extrabold leading-none tracking-tight"><?= number_format($soldeMontant, 0, ',', ' ') ?></span>
</div>
</div>
</div>
</section>
<!-- Quick Actions Bento Grid -->
<section class="mb-6">
<h3 class="text-headline-sm font-headline-sm mb-4 flex items-center gap-2">
<span class="material-symbols-outlined text-primary">bolt</span> Actions Rapides
</h3>
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
<a href="<?= base_url('clients/depot') ?>" class="flex flex-col items-center justify-center p-6 bg-white shadow-sm rounded-xl border border-outline-variant hover:border-primary hover:shadow-md transition-all active:scale-95 group">
<div class="w-12 h-12 bg-primary-fixed-dim text-primary rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">add_circle</span>
</div>
<span class="text-label-md font-label-md text-primary">D&eacute;p&ocirc;t</span>
</a>
<a href="<?= base_url('clients/retrait') ?>" class="flex flex-col items-center justify-center p-6 bg-white shadow-sm rounded-xl border border-outline-variant hover:border-primary hover:shadow-md transition-all active:scale-95 group">
<div class="w-12 h-12 bg-secondary-container text-secondary rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">payments</span>
</div>
<span class="text-label-md font-label-md text-secondary">Retrait</span>
</a>
<a href="<?= base_url('clients/transfert') ?>" class="flex flex-col items-center justify-center p-6 bg-white shadow-sm rounded-xl border border-outline-variant hover:border-primary hover:shadow-md transition-all active:scale-95 group">
<div class="w-12 h-12 bg-tertiary-fixed text-tertiary rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">send</span>
</div>
<span class="text-label-md font-label-md text-tertiary">Transfert</span>
</a>
<a href="<?= base_url('clients/historique') ?>" class="flex flex-col items-center justify-center p-6 bg-white shadow-sm rounded-xl border border-outline-variant hover:border-primary hover:shadow-md transition-all active:scale-95 group">
<div class="w-12 h-12 bg-surface-container-high text-on-surface-variant rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">receipt_long</span>
</div>
<span class="text-label-md font-label-md text-on-surface-variant">Historique</span>
</a>
</div>
</section>
</main>
<!-- BottomNavBar (Mobile Only) -->
<nav class="fixed bottom-0 left-0 w-full z-50 flex justify-around items-center px-4 py-2 md:hidden bg-white shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.1)] rounded-t-xl">
<a class="flex flex-col items-center justify-center bg-primary-container text-on-primary-container rounded-full px-4 py-1 active:scale-90 duration-150 transition-all" href="<?= base_url('accueil') ?>">
<span class="material-symbols-outlined">home</span>
<span class="text-label-sm font-label-sm">Accueil</span>
</a>
<a class="flex flex-col items-center justify-center text-on-secondary-container hover:text-primary transition-all active:scale-90 duration-150" href="<?= base_url('clients/transfert') ?>">
<span class="material-symbols-outlined">send</span>
<span class="text-label-sm font-label-sm">Transfert</span>
</a>
<a class="flex flex-col items-center justify-center text-on-secondary-container hover:text-primary transition-all active:scale-90 duration-150" href="<?= base_url('clients/historique') ?>">
<span class="material-symbols-outlined">receipt_long</span>
<span class="text-label-sm font-label-sm">Historique</span>
</a>
<a class="flex flex-col items-center justify-center text-on-secondary-container hover:text-primary transition-all active:scale-90 duration-150" href="<?= base_url('clients/depot') ?>">
<span class="material-symbols-outlined">add_circle</span>
<span class="text-label-sm font-label-sm">D&eacute;p&ocirc;t</span>
</a>
</nav>
<script>
        document.querySelectorAll('button, a').forEach(el => {
            el.addEventListener('mousedown', () => { el.classList.add('scale-95'); });
            el.addEventListener('mouseup', () => { el.classList.remove('scale-95'); });
            el.addEventListener('mouseleave', () => { el.classList.remove('scale-95'); });
        });
    </script>
</body></html>
