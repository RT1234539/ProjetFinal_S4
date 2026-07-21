<!DOCTYPE html>
<html class="light" lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Barèmes des Frais - Admin Money</title>
    <?= view('include/tailwind_head') ?>
    <style>
        .bento-grid {
            display: grid;
            grid-template-columns: repeat(12, 1fr);
            gap: 1.5rem;
        }
    </style>
</head>

<body class="bg-background text-on-background min-h-screen flex">
<?= view('include/sidebar_admin', ['active' => 'frais']) ?>
<main class="flex-1 lg:ml-72 flex flex-col min-h-screen">
<!-- TopAppBar -->
<header class="flex justify-between items-center w-full px-gutter h-16 sticky top-0 z-40 bg-surface shadow-sm">
<div class="flex items-center gap-md">
<button class="lg:hidden p-xs">
<i class="bi-list"></i>
</button>
<div class="relative group">
<span class="absolute inset-y-0 left-0 flex items-center pl-3 text-outline">
<i class="bi-search"></i>
</span>
<input class="pl-10 pr-4 py-2 bg-surface-container-low border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary focus:border-primary w-64 transition-all" placeholder="Rechercher un barème..." type="text" />
</div>
</div>
<div class="flex items-center gap-md">
<div class="h-8 w-px bg-outline-variant"></div>
<div class="flex items-center gap-sm cursor-pointer hover:bg-surface-container p-1 rounded-lg transition-colors">
<div class="w-8 h-8 rounded-full border border-outline-variant bg-primary/10 flex items-center justify-center">
    <i class="bi-person text-primary text-[18px]"></i>
</div>
<div class="hidden md:block">
<p class="font-label-md text-label-md text-on-surface leading-none">Admin</p>
<p class="text-label-sm font-label-sm text-secondary">Operateur</p>
</div>
</div>
</div>
</header>
<!-- Content Body -->
<div class="p-gutter flex-grow space-y-gutter max-w-7xl mx-auto w-full">
<!-- Page Title Area -->
<div class="flex flex-col md:flex-row md:items-end justify-between gap-md">
<div>
<nav class="flex text-label-sm font-label-sm text-secondary mb-xs">
<span class="hover:text-primary cursor-pointer">Admin</span>
<span class="mx-2">/</span>
<span class="text-primary font-bold">Barèmes</span>
</nav>
<h2 class="font-headline-lg text-headline-lg text-on-surface">Barèmes des Frais</h2>
<p class="text-body-md font-body-md text-secondary mt-3">Configurez les paliers de tarification pour chaque type de transaction financière.</p>
</div>

</div>
<!-- Bento Layout Section -->
<div class="bento-grid">
<!-- Form Section: Card Style -->
<div class="col-span-12 lg:col-span-4 bg-white rounded-xl shadow-sm border border-outline-variant p-lg">
<div class="flex items-center gap-sm mb-lg">
<i class="bi-plus-square text-primary"></i>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Ajouter un palier</h3>
</div>
<form action="<?= base_url() ?>frais/ajouter" method="post" class="space-y-md" id="fee-form">
<?= csrf_field() ?>

                        <div class="space-y-xs">
                            <label class="font-label-md text-label-md text-on-surface-variant">Type d'opération</label>
                            <select name="operation" class="w-full bg-surface-container-low border border-outline-variant rounded-lg p-sm focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-all font-body-sm text-body-sm">
                                <?php if (isset($operations)) { ?>
                                    <?php for ($i = 1; $i < count($operations); $i++) {
                                        $o = $operations[$i]; ?>
                                        <option value="<?= $o['id'] ?>">
                                            <?= $o['libelle'] ?>
                                        </option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="grid grid-cols-2 gap-md">
                            <div class="space-y-xs">
                                <label class="font-label-md text-label-md text-on-surface-variant">Montant min.</label>
                                <div class="relative">
                                    <input name="min" class="w-full pl-sm pr-12 bg-surface-container-low border border-outline-variant rounded-lg p-sm focus:ring-2 focus:ring-primary outline-none font-body-sm text-body-sm" placeholder="0" type="number" />
                                    <span class="absolute right-3 top-2.5 text-secondary font-label-sm">Ar</span>
                                </div>
                            </div>
                            <div class="space-y-xs">
                                <label class="font-label-md text-label-md text-on-surface-variant">Montant max.</label>
                                <div class="relative">
                                    <input name="max" class="w-full pl-sm pr-12 bg-surface-container-low border border-outline-variant rounded-lg p-sm focus:ring-2 focus:ring-primary outline-none font-body-sm text-body-sm" placeholder="5000" type="number" />
                                    <span class="absolute right-3 top-2.5 text-secondary font-label-sm">Ar</span>
                                </div>
                            </div>
                        </div>
                        <div class="space-y-xs">
                            <label class="font-label-md text-label-md text-on-surface-variant">Frais appliqués</label>
                            <div class="relative">
                                <input name="frais" class="w-full pl-sm pr-12 bg-surface-container-low border border-outline-variant rounded-lg p-sm focus:ring-2 focus:ring-primary outline-none font-body-sm text-body-sm" placeholder="100" type="number" />
                                <span class="absolute right-3 top-2.5 text-secondary font-label-sm">Ar</span>
                            </div>
                        </div>
                        <div class="flex gap-sm pt-md">
                            <button class="flex-grow bg-primary text-on-primary py-sm rounded-lg font-label-md text-label-md hover:bg-primary-container transition-colors shadow-md" type="submit">
                                Ajouter
                            </button>
                            <button class="px-md py-sm bg-surface-container border border-outline-variant text-on-surface-variant rounded-lg font-label-md text-label-md hover:bg-outline-variant transition-colors" type="reset">
                                Réinitialiser
                            </button>
                        </div>
                    </form>
                    <!-- Quick Stats in the Form Column -->
                    <?php
                    $successMessage = session()->getFlashdata('success');
                    $displayMessage = $successMessage ?? $message ?? null;
                    ?>

                    <?php if ($displayMessage): ?>
                        <?php $isSuccess = !empty($successMessage); ?>

    <div class="mt-xl p-md rounded-lg border <?= $isSuccess ? 'bg-success-container/10 border-success/20' : 'bg-primary-container/10 border-primary-container/20' ?>">
        <div class="flex items-center gap-sm mb-xs">
            <i class="bi <?= $isSuccess ? 'bi-check-circle text-success' : 'bi-info-circle text-primary' ?> text-[20px]"></i>
            <p class="font-label-md text-label-md <?= $isSuccess ? 'text-success' : 'text-primary' ?>">
                <?= $isSuccess ? 'Succès' : 'Info Barèmes' ?>
            </p>
        </div>

        <div class="text-body-sm font-body-sm text-on-secondary-container">
            <?php if (is_array($displayMessage) || is_object($displayMessage)): ?>
                <ul class="list-disc list-inside space-y-1">
                    <?php foreach ($displayMessage as $msg): ?>
                        <li><?= htmlspecialchars(is_array($msg) ? implode(', ', $msg) : $msg) ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p><?= htmlspecialchars($displayMessage) ?></p>
            <?php endif; ?>
        </div>
    </div>
<?php else: ?>
    <!-- Bloc par défaut si aucun message dynamique n'est présent -->
    <div class="mt-xl p-md bg-primary-container/10 rounded-lg border border-primary-container/20">
        <div class="flex items-center gap-sm mb-xs">
            <i class="bi-info-circle text-primary text-[20px]"></i>
            <p class="font-label-md text-label-md text-primary">Info Barèmes</p>
        </div>
        <p class="text-body-sm font-body-sm text-on-secondary-container">
            Les frais sont prélevés instantanément sur le compte de l'émetteur lors de la validation.
        </p>
    </div>
<?php endif; ?>
</div>
<!-- Table Section: Card Style -->
<div class="col-span-12 lg:col-span-8 bg-white rounded-xl shadow-sm border border-outline-variant overflow-hidden flex flex-col">
<div class="px-lg py-md border-b border-outline-variant flex items-center justify-between bg-surface-container-lowest">
<div class="flex items-center gap-sm">
<i class="bi-list-ul text-secondary"></i>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Liste des barèmes actifs</h3>
</div>
<div class="flex items-center gap-xs">
<span class="text-label-sm font-label-sm text-secondary">Filtre:</span>
<select class="border-none bg-transparent font-label-md text-label-md text-primary focus:ring-0 cursor-pointer">
<option>Toutes les opérations</option>
<option>Transferts</option>
<option>Retraits</option>
</select>
</div>
</div>
<div class="overflow-x-auto flex-grow">
<table class="w-full text-left border-collapse">
<thead class="bg-surface-container-low">
<tr>
<th class="px-lg py-sm font-label-md text-label-md text-secondary border-b border-outline-variant">Type d'opération</th>
<th class="px-lg py-sm font-label-md text-label-md text-secondary border-b border-outline-variant">Montant minimal</th>
<th class="px-lg py-sm font-label-md text-label-md text-secondary border-b border-outline-variant">Montant maximal</th>
<th class="px-lg py-sm font-label-md text-label-md text-secondary border-b border-outline-variant">Frais</th>
<th class="px-lg py-sm font-label-md text-label-md text-secondary border-b border-outline-variant text-right">Actions</th>
</tr>
</thead>
<tbody class="divide-y divide-outline-variant">
<?php
if (isset($liste)) {
    foreach ($liste as $item) {
?>
        <tr class="hover:bg-primary/5 transition-colors group">
            <td class="px-lg py-md">
                <div class="flex items-center gap-sm">
                    <span class="font-body-md text-body-md text-on-surface"><?= $item['nom_operation'] ?></span>
                </div>
            </td>
            <td class="px-lg py-md font-body-md text-body-md text-on-surface"><?= $item['montant1'] ?> Ar</td>
            <td class="px-lg py-md font-body-md text-body-md text-on-surface"><?= $item['montant2'] ?> Ar</td>
            <td class="px-lg py-md">
                <span class="px-sm py-1 bg-green-100 text-green-700 rounded-pill font-label-md text-label-md"><?= $item['frais'] ?> Ar</span>
            </td>
            <td class="px-lg py-md text-right">
                <div class="flex justify-end gap-xs opacity-0 group-hover:opacity-100 transition-opacity">
                    <a href="<?= base_url('frais/edit/' . $item['id']) ?>" class="p-2 text-primary hover:bg-primary/10 rounded-full transition-colors" title="Modifier">
                        <i class="bi-pencil text-[20px]"></i>
                    </a>
                    <a href="<?= base_url('frais/delete/' . $item['id']) ?>" class="p-2 text-error hover:bg-error/10 rounded-full transition-colors" title="Supprimer" onclick="return confirm('Supprimer ce barème ?')">
                        <i class="bi-trash text-[20px]"></i>
                    </a>
                        <div class="mt-xl p-md rounded-lg border <?= $isSuccess ? 'bg-success-container/10 border-success/20' : 'bg-primary-container/10 border-primary-container/20' ?>">
                            <div class="flex items-center gap-sm mb-xs">
                                <span class="material-symbols-outlined <?= $isSuccess ? 'text-success' : 'text-primary' ?> text-[20px]">
                                    <?= $isSuccess ? 'check_circle' : 'info' ?>
                                </span>
                                <p class="font-label-md text-label-md <?= $isSuccess ? 'text-success' : 'text-primary' ?>">
                                    <?= $isSuccess ? 'Succès' : 'Info Barèmes' ?>
                                </p>
                            </div>

                            <div class="text-body-sm font-body-sm text-on-secondary-container">
                                <?php if (is_array($displayMessage) || is_object($displayMessage)): ?>
                                    <ul class="list-disc list-inside space-y-1">
                                        <?php foreach ($displayMessage as $msg): ?>
                                            <li><?= htmlspecialchars(is_array($msg) ? implode(', ', $msg) : $msg) ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php else: ?>
                                    <p><?= htmlspecialchars($displayMessage) ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php else: ?>
                        <!-- Bloc par défaut si aucun message dynamique n'est présent -->
                        <div class="mt-xl p-md bg-primary-container/10 rounded-lg border border-primary-container/20">
                            <div class="flex items-center gap-sm mb-xs">
                                <span class="material-symbols-outlined text-primary text-[20px]">info</span>
                                <p class="font-label-md text-label-md text-primary">Info Barèmes</p>
                            </div>
                            <p class="text-body-sm font-body-sm text-on-secondary-container">
                                Les frais sont prélevés instantanément sur le compte de l'émetteur lors de la validation.
                            </p>
                        </div>
                    <?php endif; ?>
                </div>
                <!-- Table Section: Card Style -->
                <div class="col-span-12 lg:col-span-8 bg-white rounded-xl shadow-sm border border-outline-variant overflow-hidden flex flex-col">
                    <div class="px-lg py-md border-b border-outline-variant flex items-center justify-between bg-surface-container-lowest">
                        <div class="flex items-center gap-sm">
                            <span class="material-symbols-outlined text-secondary">list_alt</span>
                            <h3 class="font-headline-sm text-headline-sm text-on-surface">Liste des barèmes actifs</h3>
                        </div>
                    </div>
                    <div class="overflow-x-auto flex-grow">
                        <table class="w-full text-left border-collapse">
                            <thead class="bg-surface-container-low">
                                <tr>
                                    <th class="px-lg py-sm font-label-md text-label-md text-secondary border-b border-outline-variant">Type d'opération</th>
                                    <th class="px-lg py-sm font-label-md text-label-md text-secondary border-b border-outline-variant">Montant minimal</th>
                                    <th class="px-lg py-sm font-label-md text-label-md text-secondary border-b border-outline-variant">Montant maximal</th>
                                    <th class="px-lg py-sm font-label-md text-label-md text-secondary border-b border-outline-variant">Frais</th>
                                    <th class="px-lg py-sm font-label-md text-label-md text-secondary border-b border-outline-variant text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-outline-variant">
                                <?php
                                if (isset($liste)) {
                                    foreach ($liste as $item) {
                                ?>
                                        <tr class="hover:bg-primary/5 transition-colors group">
                                            <td class="px-lg py-md">
                                                <div class="flex items-center gap-sm">
                                                    <span class="font-body-md text-body-md text-on-surface"><?= $item['nom_operation'] ?></span>
                                                </div>
                                            </td>
                                            <td class="px-lg py-md font-body-md text-body-md text-on-surface"><?= $item['montant1'] ?> Ar</td>
                                            <td class="px-lg py-md font-body-md text-body-md text-on-surface"><?= $item['montant2'] ?> Ar</td>
                                            <td class="px-lg py-md">
                                                <span class="px-sm py-1 bg-green-100 text-green-700 rounded-pill font-label-md text-label-md"><?= $item['frais'] ?> Ar</span>
                                            </td>
                                            <td class="px-lg py-md text-right">
                                                <div class="flex justify-end gap-xs opacity-0 group-hover:opacity-100 transition-opacity">
                                                    <a href="<?= base_url('frais/edit/' . $item['id']) ?>" class="p-2 text-primary hover:bg-primary/10 rounded-full transition-colors" title="Modifier">
                                                        <span class="material-symbols-outlined text-[20px]">edit</span>
                                                    </a>
                                                    <a href="<?= base_url('frais/delete/' . $item['id']) ?>" class="p-2 text-error hover:bg-error/10 rounded-full transition-colors" title="Supprimer" onclick="return confirm('Supprimer ce barème ?')">
                                                        <span class="material-symbols-outlined text-[20px]">delete</span>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                <?php }
                                }
                                ?>

</tbody>
</table>
</div>
<!-- Pagination Footer -->
<div class="px-lg py-md border-t border-outline-variant flex items-center justify-between bg-surface-container-low">
<span class="text-label-sm font-label-sm text-secondary">Affichage de 1 à 4 sur 28 entrées</span>
<div class="flex gap-xs">
<button class="p-2 border border-outline-variant bg-white rounded-lg hover:bg-surface-container transition-colors disabled:opacity-50" disabled="">
<i class="bi-chevron-left text-[20px]"></i>
</button>
<button class="w-10 h-10 bg-primary text-on-primary rounded-lg font-label-md text-label-md shadow-sm">1</button>
<button class="w-10 h-10 border border-outline-variant bg-white rounded-lg font-label-md text-label-md hover:bg-surface-container transition-colors">2</button>
<button class="w-10 h-10 border border-outline-variant bg-white rounded-lg font-label-md text-label-md hover:bg-surface-container transition-colors">3</button>
<button class="p-2 border border-outline-variant bg-white rounded-lg hover:bg-surface-container transition-colors">
<i class="bi-chevron-right text-[20px]"></i>
</button>
</div>
</div>
</div>
<!-- Side Feature Card (Bento style) -->
<div class="col-span-12 bg-primary-container text-on-primary-container rounded-xl p-lg relative overflow-hidden flex flex-col md:flex-row items-center justify-between">
<div class="z-10 text-center md:text-left">
<h4 class="font-headline-md text-headline-md mb-xs">Simulation des frais ?</h4>
<p class="text-body-md font-body-md opacity-90 max-w-xl">Utilisez notre outil de simulation pour tester l'impact de vos nouveaux barèmes sur les transactions utilisateurs avant de les appliquer officiellement.</p>
<button class="mt-md px-lg py-sm bg-white text-primary rounded-lg font-label-md text-label-md hover:shadow-xl transition-all">Accéder au Simulateur</button>
</div>
<div class="mt-md md:mt-0 relative w-48 h-32 opacity-20">
<i class="bi-calculator text-[120px] absolute -right-4 -bottom-4"></i>
</div>
<!-- Decorative element -->
<div class="absolute -top-12 -right-12 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
</div>
</div>
</div>
</main>
</body>

</html>