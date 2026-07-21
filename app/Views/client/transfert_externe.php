<!DOCTYPE html>
<html class="light" lang="fr">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>NexusPay | Transfert Externe</title>
<?= view('include/tailwind_head') ?>
</head>
<body class="text-on-surface">
<?= view('include/sidebar_client', ['active' => 'transfert']) ?>
<header class="bg-white shadow-sm flex items-center px-4 h-16 w-full fixed top-0 z-50 md:pl-[300px]">
<a href="<?= base_url('accueil') ?>" class="p-2 hover:bg-surface-container rounded-full transition-colors md:hidden">
<span class="material-symbols-outlined">arrow_back</span>
</a>
<h1 class="ml-2 text-headline-md font-headline-md">Transfert Externe</h1>
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
<div class="bg-white rounded-xl shadow-sm border border-outline-variant p-6">
<div class="flex items-center gap-3 mb-6">
<div class="w-12 h-12 bg-tertiary-fixed text-tertiary rounded-full flex items-center justify-center">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">public</span>
</div>
<div>
<h2 class="text-headline-sm font-headline-sm">Transfert Externe</h2>
<p class="text-body-sm text-on-surface-variant">Envoyez vers un opérateur externe</p>
</div>
</div>

<?php
$selectedOp = null;
if (!empty($operateursExternes)) {
    $selectedOp = $operateursExternes[0];
}
?>

<?php if (empty($operateursExternes)): ?>
<div class="p-4 bg-red-100 text-red-800 rounded-xl flex items-center gap-2">
<span class="material-symbols-outlined">error</span>
Aucun opérateur externe disponible.
</div>
<?php else: ?>
<form method="POST" action="<?= base_url('clients/transfert-externe') ?>">
<?= csrf_field() ?>
<div class="mb-4">
<label class="block text-label-md font-label-md text-on-surface-variant mb-2">Opérateur externe</label>
<select name="operateur_externe_id" id="select-operateur" required
        class="w-full border border-outline-variant rounded-xl px-4 py-3 text-headline-sm focus:ring-2 focus:ring-primary focus:outline-none bg-white"
        onchange="updateCommission()">
<?php foreach ($operateursExternes as $op): ?>
<option value="<?= esc($op['id']) ?>"
        data-commission="<?= esc($op['commission_pct']) ?>"
        data-prefix="<?= esc($op['ext_prefix']) ?>"
        <?= ($selectedOp && $op['id'] == $selectedOp['id']) ? 'selected' : '' ?>>
<?= esc($op['nom']) ?> - <?= esc($op['op_nom']) ?> - <?= esc($op['commission_pct']) ?>% commission
</option>
<?php endforeach; ?>
</select>
</div>
<div class="mb-4">
<label class="block text-label-md font-label-md text-on-surface-variant mb-2">Numéro du destinataire</label>
<input type="text" name="numero" required
       class="w-full border border-outline-variant rounded-xl px-4 py-3 text-headline-sm focus:ring-2 focus:ring-primary focus:outline-none"
       placeholder="<?= $selectedOp ? 'Ex: ' . esc($selectedOp['ext_prefix']) . 'XXXXXXXX' : 'Ex: 0340000000' ?>">
</div>
<div class="mb-4">
<label class="block text-label-md font-label-md text-on-surface-variant mb-2">Montant (Ar)</label>
<input type="number" name="montant" id="montant-externe" min="1" required
       class="w-full border border-outline-variant rounded-xl px-4 py-3 text-headline-sm focus:ring-2 focus:ring-primary focus:outline-none"
       placeholder="Ex: 5000"
       oninput="updateCommission()">
</div>
<div class="mb-6 p-3 bg-surface-container rounded-xl text-body-sm text-on-surface-variant">
Commission : <span id="commission-info" class="font-label-md text-primary"><?= $selectedOp ? esc($selectedOp['commission_pct']) . '% soit 0 Ar' : '0% soit 0 Ar' ?></span>
</div>
<button type="submit" class="w-full bg-primary text-on-primary py-3 rounded-xl font-label-md hover:shadow-lg transition-all active:scale-95">
Effectuer le transfert externe
</button>
</form>
<?php endif; ?>
</div>
</main>
<script>
function updateCommission() {
    const select = document.getElementById('select-operateur');
    if (!select) return;
    const option = select.options[select.selectedIndex];
    const pct = parseFloat(option.dataset.commission) || 0;
    const montant = parseFloat(document.getElementById('montant-externe').value) || 0;
    const commissionMontant = Math.round(montant * pct / 100);
    const display = document.getElementById('commission-info');
    if (montant > 0) {
        display.textContent = pct + '% soit ' + new Intl.NumberFormat('fr-FR').format(commissionMontant) + ' Ar';
    } else {
        display.textContent = pct + '% soit 0 Ar';
    }
}
</script>
</body>
</html>
