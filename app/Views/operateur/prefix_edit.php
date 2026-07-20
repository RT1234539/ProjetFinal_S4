<!DOCTYPE html>
<html class="light" lang="fr">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Modifier un Préfixe - Admin Mobile Money</title>
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
<main class="flex-1 lg:ml-72 flex flex-col min-h-screen">
<header class="flex justify-between items-center w-full px-gutter h-16 sticky top-0 z-40 bg-surface shadow-sm">
<div class="flex items-center gap-lg">
<button class="lg:hidden p-xs rounded-full hover:bg-surface-container">
<span class="material-symbols-outlined">menu</span>
</button>
<h2 class="font-headline-md text-headline-md text-on-surface">Modifier un Préfixe</h2>
</div>
</header>
<div class="flex-1 p-gutter max-w-[800px] w-full mx-auto">
<div class="flex items-center gap-sm mb-xl">
<a href="<?= base_url('prefix') ?>" class="flex items-center gap-xs text-primary font-label-md hover:underline">
<span class="material-symbols-outlined text-[18px]">arrow_back</span>
    Retour à la liste
</a>
</div>
<?php if (session()->getFlashdata('error')): ?>
<div class="mb-xl p-md bg-red-100 text-red-800 rounded-xl flex items-center gap-sm">
<span class="material-symbols-outlined">error</span>
<?= session()->getFlashdata('error') ?>
</div>
<?php endif; ?>
<div class="bg-white rounded-xl shadow-sm border border-outline-variant/30 overflow-hidden">
<div class="p-lg border-b border-outline-variant/30">
<div class="flex items-center gap-sm">
<div class="w-10 h-10 bg-primary/10 text-primary rounded-lg flex items-center justify-center">
<span class="material-symbols-outlined text-[20px]">edit</span>
</div>
<div>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Modifier le préfixe</h3>
<p class="font-body-sm text-body-sm text-secondary">Modifiez les informations du préfixe #<?= esc($prefix->id) ?></p>
</div>
</div>
</div>
<form action="<?= base_url('prefix/update/' . $prefix->id) ?>" method="post" class="p-lg space-y-lg">
<?= csrf_field() ?>
<div>
<label for="prefix" class="block font-label-md text-label-md text-on-surface-variant mb-sm">Numéro de préfixe</label>
<input type="text" id="prefix" name="prefix" maxlength="3" minlength="3" pattern="[0-9]{3}" required
       value="<?= esc($prefix->prefix) ?>"
       class="w-full bg-surface-container-low border border-outline-variant rounded-xl px-4 py-3 text-body-md focus:ring-2 focus:ring-primary focus:outline-none transition-all">
<p class="mt-xs font-label-sm text-label-sm text-secondary">3 chiffres exactement</p>
</div>
<div>
<label for="nom" class="block font-label-md text-label-md text-on-surface-variant mb-sm">Nom de l'opérateur</label>
<input type="text" id="nom" name="nom" maxlength="50" required
       value="<?= esc($prefix->nom) ?>"
       class="w-full bg-surface-container-low border border-outline-variant rounded-xl px-4 py-3 text-body-md focus:ring-2 focus:ring-primary focus:outline-none transition-all">
<p class="mt-xs font-label-sm text-label-sm text-secondary">Nom complet de l'opérateur mobile</p>
</div>
<div class="flex items-center gap-md pt-md">
<button type="submit" class="flex items-center gap-xs px-lg py-sm bg-primary text-on-primary font-label-md rounded-xl hover:shadow-lg transition-all active:scale-95">
<span class="material-symbols-outlined text-[20px]">save</span>
    Mettre à jour
</button>
<a href="<?= base_url('prefix') ?>" class="flex items-center gap-xs px-lg py-sm bg-surface-container-highest text-on-surface-variant font-label-md rounded-xl hover:bg-outline-variant transition-colors">
    Annuler
</a>
</div>
</form>
</div>
</div>
</main>
</body>
</html>
