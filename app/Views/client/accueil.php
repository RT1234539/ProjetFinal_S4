<?php
$numero = $user['numero'] ?? '0000000000';
$soldeMontant = $solde['solde'] ?? 0;
?>
<!DOCTYPE html>
<html class="light" lang="fr">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>NexusPay | Dashboard</title>
<?= view('include/tailwind_head') ?>
<style>
.transaction-row:hover { background-color: rgba(0, 63, 135, 0.05); }
</style>
</head>
<body class="text-on-surface">
<?= view('include/sidebar_client', ['active' => 'accueil']) ?>
<!-- TopAppBar -->
<header class="bg-white shadow-sm flex justify-between items-center px-4 h-16 w-full fixed top-0 z-50 md:pl-[300px]">
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
<script>
document.querySelectorAll('button, a').forEach(el => {
    el.addEventListener('mousedown', () => { el.classList.add('scale-95'); });
    el.addEventListener('mouseup', () => { el.classList.remove('scale-95'); });
    el.addEventListener('mouseleave', () => { el.classList.remove('scale-95'); });
});
</script>
</body>
</html>
