<!DOCTYPE html>
<html class="light" lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Opérateurs Externe - Admin Mobile Money</title>
    <?= view('include/tailwind_head') ?>
</head>

<body class="bg-background text-on-background min-h-screen flex">
    <?= view('include/sidebar_admin', ['active' => 'operateurs']) ?>
    <main class="flex-1 lg:ml-72 flex flex-col min-h-screen">
        <!-- TopNavBar -->
        <header class="flex justify-between items-center w-full px-gutter h-16 sticky top-0 z-40 bg-surface shadow-sm">
            <div class="flex items-center gap-lg">
                <button class="lg:hidden p-xs rounded-full hover:bg-surface-container">
                    <span class="material-symbols-outlined">menu</span>
                </button>
                <h2 class="font-headline-md text-headline-md text-on-surface">Opérateurs Externe</h2>
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
                    <h2 class="font-headline-md text-headline-md text-on-surface">Gestion des Opérateurs Externe</h2>
                    <p class="font-body-sm text-body-sm text-secondary">Gérez les opérateurs externes associés à un autre opérateur.</p>
                </div>
                <a href="<?= base_url('autre-operateur') ?>" class="flex items-center gap-xs px-md py-sm bg-secondary-container text-on-secondary-container font-label-md rounded-xl hover:shadow-lg transition-all active:scale-95">
                    <span class="material-symbols-outlined text-[20px]">arrow_back</span>
                    Retour aux opérateurs
                </a>
            </div>
            <!-- Flash Messages -->
            <?php if (session()->getFlashdata('success')): ?>
                <div class="mb-xl p-md bg-green-100 text-green-800 rounded-xl flex items-center gap-sm">
                    <span class="material-symbols-outlined">check_circle</span>
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('error')): ?>
                <div class="mb-xl p-md bg-red-100 text-red-800 rounded-xl flex items-center gap-sm">
                    <span class="material-symbols-outlined">error</span>
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <!-- Add Form Card -->
            <div class="bg-white rounded-xl shadow-sm border border-outline-variant/30 overflow-hidden mb-xl">
                <div class="p-lg border-b border-outline-variant/30">
                    <div class="flex items-center gap-sm">
                        <div class="w-10 h-10 bg-primary/10 text-primary rounded-lg flex items-center justify-center">
                            <span class="material-symbols-outlined text-[20px]">add_circle</span>
                        </div>
                        <div>
                            <h3 class="font-headline-sm text-headline-sm text-on-surface">Ajouter un opérateur externe</h3>
                            <p class="font-body-sm text-body-sm text-secondary">Associez un opérateur externe à un autre opérateur</p>
                        </div>
                    </div>
                </div>
                <form action="<?= base_url('autre-operateur/externe/save') ?>" method="post" class="p-lg space-y-lg">
                    <?= csrf_field() ?>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-lg">
                        <!-- Autre Opérateur -->
                        <div>
                            <label for="id_autre_operateur" class="block font-label-md text-label-md text-on-surface-variant mb-sm">Opérateur associé</label>
                            <select id="id_autre_operateur" name="id_autre_operateur" required
                                class="w-full bg-surface-container-low border border-outline-variant rounded-xl px-4 py-3 text-body-md focus:ring-2 focus:ring-primary focus:outline-none transition-all">
                                <option value="">-- Sélectionner --</option>
                                <?php if (!empty($autreOperateurs)): ?>
                                    <?php foreach ($autreOperateurs as $ao): ?>
                                        <option value="<?= esc($ao['id']) ?>"><?= esc($ao['prefix']) ?> - <?= esc($ao['nom']) ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <!-- Nom -->
                        <div>
                            <label for="nom" class="block font-label-md text-label-md text-on-surface-variant mb-sm">Nom</label>
                            <input type="text" id="nom" name="nom" maxlength="100" required
                                placeholder="Ex : Wave"
                                class="w-full bg-surface-container-low border border-outline-variant rounded-xl px-4 py-3 text-body-md focus:ring-2 focus:ring-primary focus:outline-none transition-all">
                        </div>
                        <!-- Commission -->
                        <div>
                            <label for="commission_pct" class="block font-label-md text-label-md text-on-surface-variant mb-sm">Commission (%)</label>
                            <input type="number" id="commission_pct" name="commission_pct" step="0.01" min="0" required
                                placeholder="Ex : 1.5"
                                class="w-full bg-surface-container-low border border-outline-variant rounded-xl px-4 py-3 text-body-md focus:ring-2 focus:ring-primary focus:outline-none transition-all">
                        </div>
                    </div>
                    <div class="flex items-center gap-md pt-md">
                        <button type="submit" class="flex items-center gap-xs px-lg py-sm bg-primary text-on-primary font-label-md rounded-xl hover:shadow-lg transition-all active:scale-95">
                            <span class="material-symbols-outlined text-[20px]">save</span>
                            Enregistrer
                        </button>
                    </div>
                </form>
            </div>

            <!-- Table Card -->
            <div class="bg-white rounded-xl shadow-sm border border-outline-variant/30 overflow-hidden flex flex-col">
                <div class="p-lg border-b border-outline-variant/30 flex items-center justify-between">
                    <p class="text-body-sm text-secondary">
                        <?php if (! empty($operateursExternes) && is_array($operateursExternes)): ?>
                            <?= count($operateursExternes) ?> opérateur(s) externe(s) enregistré(s)
                        <?php else: ?>
                            Aucun opérateur externe
                        <?php endif; ?>
                    </p>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-surface-container-low border-b border-outline-variant/30">
                            <tr>
                                <th class="px-lg py-md font-label-md text-label-md text-secondary whitespace-nowrap">#</th>
                                <th class="px-lg py-md font-label-md text-label-md text-secondary whitespace-nowrap">Nom</th>
                                <th class="px-lg py-md font-label-md text-label-md text-secondary whitespace-nowrap">Commission %</th>
                                <th class="px-lg py-md font-label-md text-label-md text-secondary whitespace-nowrap">Opérateur associé</th>
                                <th class="px-lg py-md font-label-md text-label-md text-secondary whitespace-nowrap text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-outline-variant/20">
                            <?php if (! empty($operateursExternes) && is_array($operateursExternes)): ?>
                                <?php foreach ($operateursExternes as $ext): ?>
                                    <tr class="hover:bg-primary/5 transition-colors group">
                                        <td class="px-lg py-md font-label-md text-label-md text-secondary"><?= esc($ext['id']) ?></td>
                                        <td class="px-lg py-md font-label-md text-label-md text-on-surface">
                                            <span class="inline-flex items-center gap-xs px-sm py-1 bg-tertiary/10 text-tertiary rounded-full font-label-md">
                                                <span class="material-symbols-outlined text-[16px]">cell_tower</span>
                                                <?= esc($ext['nom']) ?>
                                            </span>
                                        </td>
                                        <td class="px-lg py-md">
                                            <span class="inline-flex items-center gap-xs px-sm py-1 bg-green-100 text-green-800 rounded-full font-label-md">
                                                <?= esc($ext['commission_pct']) ?>%
                                            </span>
                                        </td>
                                        <td class="px-lg py-md font-label-md text-label-md text-on-surface">
                                            <span class="inline-flex items-center gap-xs px-sm py-1 bg-primary/10 text-primary rounded-full font-label-md">
                                                <span class="material-symbols-outlined text-[16px]">dialpad</span>
                                                <?= esc($ext['ext_prefix'] ?? '') ?> - <?= esc($ext['op_nom'] ?? '') ?>
                                            </span>
                                        </td>
                                        <td class="px-lg py-md text-right">
                                            <div class="flex justify-end gap-xs opacity-0 group-hover:opacity-100 transition-opacity">
                                                <a href="<?= base_url('autre-operateur/externe/delete/' . $ext['id']) ?>" class="p-2 text-error hover:bg-error/10 rounded-full transition-colors" title="Supprimer" onclick="return confirm('Supprimer cet opérateur externe ?')">
                                                    <span class="material-symbols-outlined text-[20px]">delete</span>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" class="px-lg py-md text-center text-secondary">
                                        Aucun opérateur externe trouvé.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</body>

</html>