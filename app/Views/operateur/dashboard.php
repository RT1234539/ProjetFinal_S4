<?php
$numero = $user['numero'] ?? '0000000000';
?>
<!DOCTYPE html>
<html class="light" lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>NexusPay | Tableau de bord</title>
    <?= view('include/tailwind_head') ?>
</head>

<body class="bg-background text-on-background min-h-screen flex">
    <?= view('include/sidebar_admin', ['active' => 'dashboard']) ?>
    <main class="flex-1 lg:ml-72 flex flex-col min-h-screen">
        <header class="flex justify-between items-center w-full px-gutter h-16 sticky top-0 z-40 bg-surface shadow-sm">
            <div class="flex items-center gap-lg">
                <button class="lg:hidden p-xs rounded-full hover:bg-surface-container">
                    <span class="material-symbols-outlined">menu</span>
                </button>
                <h2 class="font-headline-md text-headline-md text-on-surface">Tableau de bord</h2>
            </div>
            <div class="flex items-center gap-sm">
                <div class="w-10 h-10 rounded-full bg-primary-container flex items-center justify-center border-2 border-surface-container-high">
                    <span class="text-on-primary-container font-label-md"><?= strtoupper(substr($numero, -2)) ?></span>
                </div>
            </div>
        </header>
        <div class="flex-1 p-gutter max-w-[1440px] w-full mx-auto">

            <?php if (session()->getFlashdata('success')): ?>
                <div class="mb-xl p-md bg-green-100 text-green-800 rounded-xl flex items-center gap-sm">
                    <span class="material-symbols-outlined">check_circle</span>
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <!-- Hero Welcome -->
            <section class="mb-xl">
                <div class="relative overflow-hidden bg-primary text-on-primary p-xl rounded-xl shadow-lg md:p-12">
                    <div class="relative z-10">
                        <p class="text-label-md font-label-md uppercase tracking-widest opacity-80 mb-xs">Bienvenue</p>
                        <h1 class="text-headline-lg-mobile md:text-headline-lg font-headline-lg">Administration NexusPay</h1>
                        <p class="text-body-md font-body-md opacity-80 mt-sm">Gérez votre plateforme Mobile Money</p>
                    </div>
                </div>
            </section>

            <!-- Stats Cards -->
            <section class="mb-xl">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-lg">
                    <!-- Clients -->
                    <a href="<?= base_url('clients') ?>" class="bg-white rounded-xl shadow-sm border border-outline-variant/30 p-lg hover:shadow-md hover:border-primary/30 transition-all group">
                        <div class="flex items-center gap-sm mb-md">
                            <div class="w-10 h-10 bg-primary-fixed-dim text-primary rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                                <span class="material-symbols-outlined">group</span>
                            </div>
                            <span class="font-label-md text-label-sm text-secondary uppercase">Clients</span>
                        </div>
                        <p class="text-headline-lg font-headline-lg text-on-surface"><?= $nbClients ?></p>
                        <p class="text-body-sm font-body-sm text-secondary mt-xs">Comptes enregistrés</p>
                    </a>
                    <!-- Opérations -->
                    <a href="<?= base_url('operations') ?>" class="bg-white rounded-xl shadow-sm border border-outline-variant/30 p-lg hover:shadow-md hover:border-secondary/30 transition-all group">
                        <div class="flex items-center gap-sm mb-md">
                            <div class="w-10 h-10 bg-secondary-container text-secondary rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                                <span class="material-symbols-outlined">receipt_long</span>
                            </div>
                            <span class="font-label-md text-label-sm text-secondary uppercase">Transactions</span>
                        </div>
                        <p class="text-headline-lg font-headline-lg text-on-surface"><?= $nbOperations ?></p>
                        <p class="text-body-sm font-body-sm text-secondary mt-xs">Opérations totales</p>
                    </a>
                    <!-- Gains -->
                    <a href="<?= base_url('gains') ?>" class="bg-white rounded-xl shadow-sm border border-outline-variant/30 p-lg hover:shadow-md hover:border-tertiary/30 transition-all group">
                        <div class="flex items-center gap-sm mb-md">
                            <div class="w-10 h-10 bg-tertiary-fixed text-tertiary rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                                <span class="material-symbols-outlined">leaderboard</span>
                            </div>
                            <span class="font-label-md text-label-sm text-secondary uppercase">Gains</span>
                        </div>
                        <p class="text-headline-lg font-headline-lg text-on-surface"><?= number_format($gainTotal, 0, ',', ' ') ?> <span class="text-body-sm font-body-sm">Ar</span></p>
                        <p class="text-body-sm font-body-sm text-secondary mt-xs">Revenus totaux</p>
                    </a>
                    <!-- Préfixes -->
                    <a href="<?= base_url('prefix') ?>" class="bg-white rounded-xl shadow-sm border border-outline-variant/30 p-lg hover:shadow-md hover:border-primary/30 transition-all group">
                        <div class="flex items-center gap-sm mb-md">
                            <div class="w-10 h-10 bg-primary-container text-on-primary-container rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                                <span class="material-symbols-outlined">phone_iphone</span>
                            </div>
                            <span class="font-label-md text-label-sm text-secondary uppercase">Préfixes</span>
                        </div>
                        <p class="text-headline-lg font-headline-lg text-on-surface"><?= $nbPrefixes ?></p>
                        <p class="text-body-sm font-body-sm text-secondary mt-xs">Préfixes actifs</p>
                    </a>
                </div>
            </section>

            <!-- Quick Actions -->
            <section class="mb-xl">
                <h3 class="text-headline-sm font-headline-sm mb-lg flex items-center gap-sm">
                    <span class="material-symbols-outlined text-primary">bolt</span> Accès rapides
                </h3>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-md">
                    <a href="<?= base_url('clients') ?>" class="flex flex-col items-center p-lg bg-white rounded-xl border border-outline-variant/30 hover:border-primary hover:shadow-md transition-all active:scale-95 group">
                        <div class="w-12 h-12 bg-primary-fixed-dim text-primary rounded-full flex items-center justify-center mb-sm group-hover:scale-110 transition-transform">
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">group</span>
                        </div>
                        <span class="text-label-md font-label-md text-primary">Clients</span>
                    </a>
                    <a href="<?= base_url('prefix') ?>" class="flex flex-col items-center p-lg bg-white rounded-xl border border-outline-variant/30 hover:border-primary hover:shadow-md transition-all active:scale-95 group">
                        <div class="w-12 h-12 bg-secondary-container text-secondary rounded-full flex items-center justify-center mb-sm group-hover:scale-110 transition-transform">
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">phone_iphone</span>
                        </div>
                        <span class="text-label-md font-label-md text-secondary">Préfixes</span>
                    </a>
                    <a href="<?= base_url('operations') ?>" class="flex flex-col items-center p-lg bg-white rounded-xl border border-outline-variant/30 hover:border-primary hover:shadow-md transition-all active:scale-95 group">
                        <div class="w-12 h-12 bg-tertiary-fixed text-tertiary rounded-full flex items-center justify-center mb-sm group-hover:scale-110 transition-transform">
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">category</span>
                        </div>
                        <span class="text-label-md font-label-md text-tertiary">Opérations</span>
                    </a>
                    <a href="<?= base_url('frais/ajouter') ?>" class="flex flex-col items-center p-lg bg-white rounded-xl border border-outline-variant/30 hover:border-primary hover:shadow-md transition-all active:scale-95 group">
                        <div class="w-12 h-12 bg-surface-container-high text-on-surface-variant rounded-full flex items-center justify-center mb-sm group-hover:scale-110 transition-transform">
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">payments</span>
                        </div>
                        <span class="text-label-md font-label-md text-on-surface-variant">Barèmes</span>
                    </a>
                    <a href="<?= base_url('gains') ?>" class="flex flex-col items-center p-lg bg-white rounded-xl border border-outline-variant/30 hover:border-primary hover:shadow-md transition-all active:scale-95 group">
                        <div class="w-12 h-12 bg-primary-container text-on-primary-container rounded-full flex items-center justify-center mb-sm group-hover:scale-110 transition-transform">
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">leaderboard</span>
                        </div>
                        <span class="text-label-md font-label-md text-on-primary-container">Gains</span>
                    </a>
                </div>
            </section>

            <!-- Dernières opérations -->
            <section class="mb-xl">
                <h3 class="text-headline-sm font-headline-sm mb-lg flex items-center gap-sm">
                    <span class="material-symbols-outlined text-primary">history</span> Dernières opérations
                </h3>
                <div class="bg-white rounded-xl shadow-sm border border-outline-variant/30 overflow-hidden">
                    <?php if (!empty($dernieresOps)): ?>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead class="bg-surface-container-low border-b border-outline-variant/30">
                                    <tr>
                                        <th class="px-lg py-md font-label-md text-label-md text-secondary">Date</th>
                                        <th class="px-lg py-md font-label-md text-label-md text-secondary">Client</th>
                                        <th class="px-lg py-md font-label-md text-label-md text-secondary">Opération</th>
                                        <th class="px-lg py-md font-label-md text-label-md text-secondary text-right">Montant</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-outline-variant/20">
                                    <?php foreach ($dernieresOps as $op): ?>
                                        <tr class="hover:bg-primary/5 transition-colors">
                                            <td class="px-lg py-md text-body-sm font-body-sm text-secondary"><?= esc($op['date']) ?></td>
                                            <td class="px-lg py-md text-body-sm font-body-sm text-on-surface"><?= esc($op['numero']) ?></td>
                                            <td class="px-lg py-md">
                                                <span class="px-sm py-1 text-label-sm font-label-sm rounded-full
<?php
                                        $lib = strtolower($op['operation'] ?? '');
                                        if ($lib === 'depot') echo 'bg-green-100 text-green-800';
                                        elseif ($lib === 'retrait') echo 'bg-red-100 text-red-800';
                                        elseif ($lib === 'transfert') echo 'bg-blue-100 text-blue-800';
                                        elseif ($lib === 'transfert_externe') echo 'bg-purple-100 text-purple-800';
                                        else echo 'bg-gray-100 text-gray-800';
?>
"><?= esc($op['operation']) ?></span>
                                            </td>
                                            <td class="px-lg py-md text-body-sm font-body-sm text-on-surface text-right font-semibold">
                                                <?= number_format($op['montant'], 0, ',', ' ') ?> Ar
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <div class="p-xl text-center text-secondary font-body-md">
                            <span class="material-symbols-outlined text-[48px] mb-sm block text-outline-variant">inbox</span>
                            Aucune opération enregistrée.
                        </div>
                    <?php endif; ?>
                </div>
            </section>

        </div>
    </main>
</body>

</html>