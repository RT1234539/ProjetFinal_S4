<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>NexusPay | Retrait</title>
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
                    "secondary-container": "#d8e1ea",
                    "secondary": "#575f67",
                    "on-secondary-container": "#5b646b",
                    "error": "#ba1a1a"
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
<h1 class="ml-2 text-headline-md font-headline-md">Retrait</h1>
</header>
<main class="pt-24 pb-8 px-4 max-w-lg mx-auto">
<?php if (session()->getFlashdata('error')): ?>
<div class="mb-4 p-4 bg-red-100 text-red-800 rounded-xl flex items-center gap-2">
<span class="material-symbols-outlined">error</span>
<?= session()->getFlashdata('error') ?>
</div>
<?php endif; ?>
<div class="bg-white rounded-xl shadow-sm border border-outline-variant p-6">
<div class="flex items-center gap-3 mb-6">
<div class="w-12 h-12 bg-secondary-container text-secondary rounded-full flex items-center justify-center">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">payments</span>
</div>
<div>
<h2 class="text-headline-sm font-headline-sm">Retirer des fonds</h2>
<p class="text-body-sm text-on-surface-variant">Les frais seront appliqu&eacute;s automatiquement</p>
</div>
</div>
<form method="POST" action="<?= base_url('clients/retrait') ?>">
<?= csrf_field() ?>
<div class="mb-6">
<label class="block text-label-md font-label-md text-on-surface-variant mb-2">Montant (Ar)</label>
<input type="number" name="montant" min="1" required
       class="w-full border border-outline-variant rounded-xl px-4 py-3 text-headline-sm focus:ring-2 focus:ring-primary focus:outline-none"
       placeholder="Ex: 10000">
</div>
<button type="submit" class="w-full bg-primary text-on-primary py-3 rounded-xl font-label-md hover:shadow-lg transition-all active:scale-95">
Confirmer le retrait
</button>
</form>
<a href="<?= base_url('accueil') ?>" class="mt-4 block text-center text-primary font-label-md hover:underline">
&larr; Retour &agrave; l'accueil
</a>
</main>
</body>
</html>
