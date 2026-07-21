<!DOCTYPE html>
<html class="light" lang="fr">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>NexusPay | Transfert Multiple</title>
<?= view('include/tailwind_head') ?>
</head>
<body class="text-on-surface">
<?= view('include/sidebar_client', ['active' => 'transfert']) ?>
<header class="bg-white shadow-sm flex items-center px-4 h-16 w-full fixed top-0 z-50 md:pl-[300px]">
<a href="<?= base_url('accueil') ?>" class="p-2 hover:bg-surface-container rounded-full transition-colors md:hidden">
<span class="material-symbols-outlined">arrow_back</span>
</a>
<h1 class="ml-2 text-headline-md font-headline-md">Transfert Multiple</h1>
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
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">group_send</span>
</div>
<div>
<h2 class="text-headline-sm font-headline-sm">Transfert Multiple</h2>
<p class="text-body-sm text-on-surface-variant">Envoyez le même montant à plusieurs numéros</p>
</div>
</div>
<form method="POST" action="<?= base_url('clients/transfert-multiple') ?>">
<?= csrf_field() ?>
<div class="mb-4">
<label class="block text-label-md font-label-md text-on-surface-variant mb-2">Numéros destinataires (un par ligne)</label>
<textarea name="numeros" id="numeros-textarea" rows="5" required
          class="w-full border border-outline-variant rounded-xl px-4 py-3 text-body-sm focus:ring-2 focus:ring-primary focus:outline-none"
          placeholder="0340000001
0320000002
0330000003"
          oninput="updateMontantParDest()"></textarea>
<div class="mt-1 text-label-sm font-label-sm text-on-surface-variant">
<span id="nb-destinataires">0</span> destinataire(s) détecté(s)
</div>
</div>
<div class="mb-4">
<label class="block text-label-md font-label-md text-on-surface-variant mb-2">Montant total (Ar)</label>
<input type="number" name="montant" id="montant-total" min="1" required
       class="w-full border border-outline-variant rounded-xl px-4 py-3 text-headline-sm focus:ring-2 focus:ring-primary focus:outline-none"
       placeholder="Ex: 15000"
       oninput="updateMontantParDest()">
</div>
<div class="mb-6 p-3 bg-surface-container rounded-xl text-body-sm text-on-surface-variant">
Montant par destinataire : <span id="montant-par-dest" class="font-label-md text-primary">-</span>
</div>
<button type="submit" class="w-full bg-primary text-on-primary py-3 rounded-xl font-label-md hover:shadow-lg transition-all active:scale-95">
Effectuer le transfert multiple
</button>
</form>
</div>
</main>
<script>
function updateMontantParDest() {
    const textarea = document.getElementById('numeros-textarea');
    const montant = parseFloat(document.getElementById('montant-total').value) || 0;
    const lines = textarea.value.split('\n').filter(n => n.trim() !== '');
    const count = lines.length;
    document.getElementById('nb-destinataires').textContent = count;
    const display = document.getElementById('montant-par-dest');
    if (count > 0 && montant > 0) {
        display.textContent = new Intl.NumberFormat('fr-FR').format(montant / count) + ' Ar';
    } else {
        display.textContent = '-';
    }
}
</script>
</body>
</html>
