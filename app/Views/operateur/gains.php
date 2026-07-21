<!DOCTYPE html>
<html class="light" lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Situation des Gains - Admin Mobile Money</title>
    <?= view('include/tailwind_head') ?>
</head>

<body class="bg-background text-on-background min-h-screen flex">
    <?= view('include/sidebar_admin', ['active' => 'gains']) ?>
    <main class="flex-1 lg:ml-72 flex flex-col min-h-screen">
        <header class="flex justify-between items-center w-full px-gutter h-16 sticky top-0 z-40 bg-surface shadow-sm">
            <div class="flex items-center gap-lg">
                <button class="lg:hidden p-xs rounded-full hover:bg-surface-container">
                    <span class="material-symbols-outlined">menu</span>
                </button>
                <h2 class="font-headline-md text-headline-md text-on-surface">Gains par opération</h2>
            </div>
        </header>
        <div class="flex-1 p-gutter max-w-[1200px] w-full mx-auto">

            <!-- Gains Interne -->
            <div class="mb-xl">
                <h3 class="font-headline-sm text-headline-sm text-on-surface mb-lg">Gains Opérateur Interne (frais retrait + transfert)</h3>
                <?php if (!empty($gainsInterne)): ?>
                    <div class="bg-white rounded-xl shadow-sm border border-outline-variant/30 overflow-hidden">
                        <div class="p-lg border-b border-outline-variant/30 font-label-md text-on-primary bg-green-600">
                            Gains internes
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead class="bg-surface-container-low border-b border-outline-variant/30">
                                    <tr>
                                        <th class="px-lg py-md font-label-md text-label-md text-secondary whitespace-nowrap">Opération</th>
                                        <th class="px-lg py-md font-label-md text-label-md text-secondary whitespace-nowrap text-right">Total Frais</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-outline-variant/20">
                                    <?php foreach ($gainsInterne as $g): ?>
                                        <tr class="hover:bg-primary/5 transition-colors">
                                            <td class="px-lg py-md font-label-md text-label-md text-on-surface"><?= esc($g['operation']) ?></td>
                                            <td class="px-lg py-md text-right">
                                                <span class="px-sm py-1 bg-green-100 text-green-800 rounded-full font-label-md"><?= number_format($g['total_frais'] ?? 0, 0, ',', ' ') ?> Ar</span>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="p-md bg-amber-100 text-amber-800 rounded-xl flex items-center gap-sm">
                        <span class="material-symbols-outlined">warning</span>
                        Aucun gain interne trouvé.
                    </div>
                <?php endif; ?>
            </div>

            <!-- Gains Externe -->
            <div class="mb-xl">
                <h3 class="font-headline-sm text-headline-sm text-on-surface mb-lg">Gains Opérateurs Externes (commissions)</h3>
                <?php if (!empty($gainsExterne)): ?>
                    <div class="bg-white rounded-xl shadow-sm border border-outline-variant/30 overflow-hidden">
                        <div class="p-lg border-b border-outline-variant/30 font-label-md text-on-purple bg-purple-600">
                            Gains externes par opérateur
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead class="bg-surface-container-low border-b border-outline-variant/30">
                                    <tr>
                                        <th class="px-lg py-md font-label-md text-label-md text-secondary whitespace-nowrap">Opérateur Externe</th>
                                        <th class="px-lg py-md font-label-md text-label-md text-secondary whitespace-nowrap text-right">Nombre transferts</th>
                                        <th class="px-lg py-md font-label-md text-label-md text-secondary whitespace-nowrap text-right">Gain Commission</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-outline-variant/20">
                                    <?php foreach ($gainsExterne as $g): ?>
                                        <tr class="hover:bg-primary/5 transition-colors">
                                            <td class="px-lg py-md font-label-md text-label-md text-on-surface"><?= esc($g['operateur']) ?></td>
                                            <td class="px-lg py-md font-label-md text-label-md text-secondary text-right"><?= $g['nombre_transferts'] ?></td>
                                            <td class="px-lg py-md text-right">
                                                <span class="px-sm py-1 bg-green-100 text-green-800 rounded-full font-label-md"><?= number_format($g['gain_commission'] ?? 0, 0, ',', ' ') ?> Ar</span>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="p-md bg-blue-100 text-blue-800 rounded-xl flex items-center gap-sm">
                        <span class="material-symbols-outlined">info</span>
                        Aucun gain externe pour le moment.
                    </div>
                <?php endif; ?>
            </div>

            <!-- Montants envoyés par opérateur externe -->
            <div class="mb-xl">
                <h3 class="font-headline-sm text-headline-sm text-on-surface mb-lg">Montants envoyés par opérateur externe (transfert sortant)</h3>
                <?php if (!empty($montantsEnvoyes)): ?>
                    <div class="bg-white rounded-xl shadow-sm border border-outline-variant/30 overflow-hidden">
                        <div class="p-lg border-b border-outline-variant/30 font-label-md text-on-orange bg-orange-600">
                            Montants envoyés
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead class="bg-surface-container-low border-b border-outline-variant/30">
                                    <tr>
                                        <th class="px-lg py-md font-label-md text-label-md text-secondary whitespace-nowrap">Opérateur</th>
                                        <th class="px-lg py-md font-label-md text-label-md text-secondary whitespace-nowrap text-right">Nombre transferts</th>
                                        <th class="px-lg py-md font-label-md text-label-md text-secondary whitespace-nowrap text-right">Montant Total Envoyé</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-outline-variant/20">
                                    <?php foreach ($montantsEnvoyes as $m): ?>
                                        <tr class="hover:bg-primary/5 transition-colors">
                                            <td class="px-lg py-md font-label-md text-label-md text-on-surface"><?= esc($m['operateur']) ?></td>
                                            <td class="px-lg py-md font-label-md text-label-md text-secondary text-right"><?= $m['nombre_transferts'] ?></td>
                                            <td class="px-lg py-md text-right">
                                                <span class="px-sm py-1 bg-blue-100 text-blue-800 rounded-full font-label-md"><?= number_format($m['montant_total'] ?? 0, 0, ',', ' ') ?> Ar</span>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="p-md bg-blue-100 text-blue-800 rounded-xl flex items-center gap-sm">
                        <span class="material-symbols-outlined">info</span>
                        Aucun transfert externe sortant.
                    </div>
                <?php endif; ?>
            </div>

            <!-- Gain Total Global -->
            <div class="bg-white rounded-xl shadow-sm border border-outline-variant/30 overflow-hidden">
                <div class="p-lg border-b border-outline-variant/30 font-label-md text-on-blue bg-blue-600">
                    Gain Total Global (Interne + Externe)
                </div>
                <div class="p-xl text-center">
                    <p class="font-headline-lg text-green-700">
                        <?= number_format($gainTotalGlobal ?? 0, 2, ',', ' ') ?> Ar
                    </p>
                    <p class="font-body-sm text-body-sm text-secondary mt-sm">
                        Interne: <?= number_format($gainTotal ?? 0, 2, ',', ' ') ?> Ar
                        <?php if (!empty($gainTotalGlobal) && $gainTotalGlobal > 0): ?>
                            | Externe: <?= number_format(($gainTotalGlobal ?? 0) - ($gainTotal ?? 0), 2, ',', ' ') ?> Ar
                        <?php endif; ?>
                    </p>
                </div>
            </div>

            <div class="mt-xl text-center">
                <a href="<?= base_url('gains') ?>" class="inline-flex items-center gap-xs px-md py-sm rounded-xl border border-outline-variant hover:bg-surface-container transition-colors font-label-md text-secondary">
                    <span class="material-symbols-outlined text-[20px]">arrow_back</span>
                    Retour
                </a>
            </div>

        </div>
    </main>
</body>

</html>